/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory-edit-popup.tmpl",
	"views/ui/SelectView",
	"text!templates/laboratory/node-test4edit.html"],
	function (tmpl, SelectView, test4EditTmpl) {

		return View.extend({
			template: tmpl,
			className: "popup",

			events: {
				"click .ShowHidePopup": "close",
				//"click .save": "onSave",
				//"click .cancel": "close",
				"click .MKBLauncher": "toggleMKB"
			},
			initialize: function () {
				_.bindAll(this);

				var view = this;

				view.doctor = view.getDoctor();
				view.appeal = view.options.appeal;
				view.diagnosis = view.appeal.getDiagnosis();


				view.model = this.options.model;
				view.model.eventId = view.options.appeal.get('id');
				console.log('popup init', view.model);


			},

			initFinanseSelect: function (elSelector) {
				var view = this;
				var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

				view.financeDictionary = new App.Collections.DictionaryValues([], {name: 'finance'});


				var modelFinanceAttr = _.find(view.model.get('group')[0].attribute, function (attr) {
					return attr.name == 'finance';
				});
				var modelFinanceId = modelFinanceAttr.properties[0].value;

				console.log('modelFinanceId', modelFinanceId, appealFinanceId);

				view.financeSelect = new SelectView({
					collection: view.financeDictionary,
					el: view.$(elSelector),
					initSelection: modelFinanceId ? modelFinanceId : appealFinanceId
				});

				view.depended(view.financeSelect);


			},

			getDoctor: function () {
				var view = this;

				var doctorLastName = view.getProperty('doctorLastName');
				var doctorFirstName = view.getProperty('doctorFirstName');

				return  {
					name: {
						first: doctorFirstName ? doctorFirstName : Core.Cookies.get("doctorFirstName"),
						last: doctorLastName ? doctorLastName : Core.Cookies.get("doctorLastName")
					}
				};

			},
			getProperty: function (name, propertyName) {
				var view = this;

				if(!propertyName) propertyName = 'value';

				var attributes = view.model.get('group')[0].attribute.concat(view.model.get('group')[1].attribute);

				var attr = _.find(attributes, function (attribute) {
					return attribute.name == name;
				});

				if (!attr) return;

				var property = _.find(attr.properties, function (property) {
					return property.name == propertyName;
				});

				if (!property) return;

				var value = property.value;

				return value;
			},

			toggleMKB: function (event) {
				event.preventDefault();

				this.mkbAttrId = $(event.currentTarget).data("mkb-examattr-id");

				this.mkbDirectory.open();
			},
			onMKBConfirmed: function (event) {
				var sd = event.selectedDiagnosis;
				console.log('sd', sd, sd.get("id"));

				this.mkbAttrId = sd.get("id");

				this.setExamAttr({
					attrId: this.mkbAttrId,
					propertyType: "valueId",
					value: sd.get("id") || sd.get("code"),
					displayText: sd.get("code") || sd.get("id")
				});

				this.$("input[name='diagnosis[mkb][code]']").val(sd.get("code"));
				this.$("input[name='diagnosis[mkb][diagnosis]']").val(sd.get("diagnosis"));
				this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', sd.get("id"));
			},

			onMKBCodeKeyUp: function (event) {
				$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
			},
			setExamAttr: function (opts) {


//                var examAttr = this.examAttributes.find(function (a) {
//                    return a.get("typeId") == opts.attrId;
//                });

				console.log('setExamAttr', opts);

				var $input = this.$("[data-examattr-id=" + opts.attrId + "]");

				if ($input.val() != opts.value || opts.displayText) {
					$input.val(opts.displayText || opts.value).change();
				}
			},
			modelToTree: function () {
				var view = this;
				var tree = [];
				var root = {};
				root.title = view.model.get('name');
				root.expand = true;
				root.icon = false;
				root.select = true;
				root.unselectable = true;
				var plannedEndDate = moment(view.getProperty('plannedEndDate'), "YYYY-MM-DD HH:mm:ss");//2013-03-30 07:00:00
				console.log('plannedEndDate', plannedEndDate);
				root.date = moment(plannedEndDate).format('DD.MM.YYYY');
				root.time = moment(plannedEndDate).format('HH:mm');

				root.cito = view.getProperty('urgent');


				root.children = [];

				var attributes = view.model.get('group')[1].attribute;
				var stringAttributes = _.filter(attributes, function (attr) {
					return attr.type == "String";
				});

				root.children = _.map(stringAttributes, function (attr) {
					return {
						title: attr.name,
						noCustomRender: true,
						icon: false,
						select: attr.properties[0].value == 'true' ? true : false
					};
				});


				//
				console.log('modelToTree', root);
				return [root];
			},

			render: function () {
				var view = this;

				///if ($(view.$el.parent().length).length === 0) {

				view.$el.html($.tmpl(view.template, {doctor: view.doctor}));

				this.mkbDirectory = new App.Views.MkbDirectory();
				this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
				this.mkbDirectory.render();

				var patientSex = Cache.Patient.get("sex").length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;


				view.$('.edit-tree').dynatree({
					clickFolderMode: 2,
					minExpandLevel: 2,

					generateIds: true,
					noLink: true,
					checkbox: true,
					children: view.modelToTree(),
					onRender: function (node, nodeSpan) {
						//console.log(node, nodeSpan)
						UIInitialize($(nodeSpan));

						$(nodeSpan).find(".HourPicker").mask("99:99").timepicker({showPeriodLabels: false});

					},
					onCustomRender: function (node) {

						var html = '';
						if (node.data.noCustomRender) {

							html += '<span class="title-col">';
							html += node.data.title;
							html += '</span>';

						} else {

							if (node.data.cito == "true") {
								node.data.checked = 'checked="checked"';
							}else{
								node.data.checked = '';
							}
							html= _.template(test4EditTmpl, node.data);
						}

						return html;
					}
				});


				//автокомплит для кода диагноза
				this.$("input[name='diagnosis[mkb][code]']").autocomplete({
					source: function (request, response) {
						$.ajax({
							url: "/data/dir/mkbs/",
							dataType: "jsonp",
							data: {
								filter: {
									view: "mkb",
									code: request.term,
									sex: patientSex
								}
							},
							success: function (raw) {
								response($.map(raw.data, function (item) {
									return {
										label: item.code + " " + item.diagnosis,
										value: item.code,
										id: item.id,
										diagnosis: item.diagnosis
									};
								}));
							}
						});
					},
					minLength: 2,
					select: function (event, ui) {
						view.mkbAttrId = $(this).data("mkb-examattr-id");

						view.setExamAttr({
							attrId: self.mkbAttrId,
							propertyType: "valueId",
							value: ui.item.id,
							displayText: ui.item.value
						});

						console.log('ui.item', ui.item);

						view.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);
						view.$("input[name='diagnosis[mkb][code]']").val(ui.item.displayText);
						view.$("input[name='diagnosis[mkb][code]']").data('mkb-id', ui.item.id);

					}
				}).on("keyup", function () {
						if (!$(this).val().length) {
							view.setExamAttr({
								attrId: self.mkbAttrId,
								propertyType: "valueId",
								value: "",
								displayText: ""
							});

							view.$("input[name='diagnosis[mkb][diagnosis]']").val("");
						}
					});


				//Вид оплаты
				view.initFinanseSelect('#finance');

				UIInitialize(this.el);

				//Диагноз
				var diagnosis = view.getProperty('Направительный диагноз');
				var diagnosisId = view.getProperty('Направительный диагноз','valueId');
				if (diagnosis) {
					console.log('diagnosis',diagnosis);
					diagnosis = diagnosis.split(/\s+/);
					var diagnosisCode = diagnosis[0];
					var diagnosisText = (diagnosis.splice(1)).join(' ');
					view.$("input[name='diagnosis[mkb][diagnosis]']").val(diagnosisText);
					view.$("input[name='diagnosis[mkb][code]']").val(diagnosisCode);
					view.$("input[name='diagnosis[mkb][code]']").data('mkb-id',diagnosisId);
				}


				//Дата и время создания
				var assessmentBeginDate = view.getProperty('assessmentBeginDate');
				var date = new Date(assessmentBeginDate);
				this.$("#start-date").datepicker("setDate", date);
				this.$("#start-time").val(date.getHours() + ':' + date.getMinutes()).mask("99:99").timepicker({showPeriodLabels: false});


				//view.$('.save,.cancel').button();

				//$("body").append(this.el);

				view.$el.dialog({
					autoOpen: false,
					width: "116em",
					modal: true,
					dialogClass: "webmis",
					title: "Редактирование направления",
					onClose: view.close,
					buttons: [
						{
							text: "Сохранить",
							click: this.onSave
						},
						{
							text: "Отмена",
							click: this.close
						}
					]
				});


				// }

				return view;
			},

			onSave: function () {
				var view = this;


				var tree = view.$('.edit-tree').dynatree("getTree");

//				var selected = _.filter(tree.toDict().children.children, function (node) {
//					return node.select == true
//				});
//
				var modelTree = tree.toDict().children[0];
				//console.log('modelTree', modelTree)
				var $dateInput = view.$('#date' + modelTree.key);
				var date = moment($dateInput.datepicker("getDate")).format('YYYY-MM-DD');

				var $timeInput = view.$('#time' + modelTree.key);
				var time = $timeInput.val() + ':00';

				var $citoInput = view.$('#cito' + modelTree.key);
				var cito = $citoInput.prop('checked');

				//console.log('node inputs', date, time, cito)

				var selected_params = _.filter(modelTree.children, function (node) {
					return node.select === true;
				});

				var unselected_params = _.filter(modelTree.children, function (node) {
					return node.select === false;
				});

				var group = view.model.get('group');

				//выбранные тесты
				console.log('modelTree ', view.model.get('group'), modelTree, selected_params);
				_.each(selected_params, function (param) {
					_.each(group[1].attribute, function (attribute, index) {
						if (attribute.name == param.title) {
							group[1].attribute[index].properties[0].value = 'true';
						}
					});
				});

				_.each(unselected_params, function (param) {
					_.each(group[1].attribute, function (attribute, index) {
						if (attribute.name == param.title) {
							group[1].attribute[index].properties[0].value = 'false';
						}
					});
				});

				view.setParam(view.model, 'doctorFirstName', 'value', view.doctor.name.first);
				//group[0].attribute[4].properties[0].value = view.doctor.name.last;//doctorLastName
				view.setParam(view.model, 'doctorLastName', 'value', view.doctor.name.last);
				//group[0].attribute[5].properties[0].value = '';//doctorMiddleName

				view.setParam(view.model, 'doctorMiddleName', 'value', '');
				//group[0].attribute[7].properties[0].value = cito;//urgent
				view.setParam(view.model, 'urgent', 'value', cito);

				view.setParam(view.model, 'plannedEndDate', 'value', date + ' ' + time);

				var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
				console.log('mkbId',mkbId);
				view.setParam(view.model, 'Направительный диагноз', 'valueId', mkbId);

				view.setParam(view.model, 'finance', 'value', $($('#finance option:selected')[0]).val());

				//console.log(model.get('group'))
				view.model.set('group', group);

				view.model.save({}, {success: function () {
					pubsub.trigger('lab-diagnostic:added');
					view.close();

				}});

				console.log('model111', view.model.toJSON());


			},

			setParam: function (model, attributeName, propertyName, value) {

				var group = model.get('group');

				var find = false;
				_.each(group, function (g, groupIndex) {
					_.each(g.attribute, function (a, attributeIndex) {
						if (a.name == attributeName) {
							_.each(a.properties, function (p, propertyIndex) {
								if (p.name == propertyName) {
									console.log('нашли', groupIndex, attributeIndex, propertyIndex);
//									if(_.has(object, key) ){
//
//									}
									group[groupIndex].attribute[attributeIndex].properties[propertyIndex]['value'] = value;
									find = true;
								}

							});

							if (!find) {//нет нужного проперти, вставляем его
								group[groupIndex].attribute[attributeIndex].properties.push({name: propertyName, value: value});
								console.log('не нашли', groupIndex, attributeIndex, group[groupIndex].attribute[attributeIndex].properties);
							}

						}
					});
				});

				model.set('group', group);

				console.log('setParam', attributeName, propertyName, value, group);

			},

			open: function () {
				this.$el.dialog("open");
				//$(".ui-dialog-titlebar").hide();

			},

			close: function () {
				this.$el.dialog("close");
				//$(".ui-dialog-titlebar").hide();
				this.$el.remove();

			}
		});

	});
