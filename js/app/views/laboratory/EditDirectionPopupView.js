/**
 * User: FKurilov
 * Date: 25.06.12
 */

//попап редактирования направления на лабисследование

define(["text!templates/appeal/edit/popups/laboratory-edit-popup.tmpl",
	"mixins/PopupMixin",
	"views/ui/SelectView",
	"text!templates/laboratory/node-test4edit.html",
	"views/ui/MkbInputView"],

function(tmpl, popupMixin, SelectView, test4EditTmpl, MkbInputView) {

	return View.extend({
		template: tmpl,
		className: "popup",

		events: {
			//"click .ShowHidePopup": "close" //,
			//"click .save": "onSave",
			//"click .cancel": "close",
			//"click .MKBLauncher": "toggleMKB"
		},
		initialize: function() {
			_.bindAll(this);

			var view = this;

			view.doctor = view.getDoctor();

			this.data = {
				'doctor': view.doctor
			}

			view.appeal = view.options.appeal;
			view.diagnosis = view.appeal.getDiagnosis();


			view.model = this.options.model;
			view.model.eventId = view.options.appeal.get('id');
			console.log('popup init', view.model);

			//инпут классификатора диагнозов
			view.mkbInputView = new MkbInputView();
			view.depended(view.mkbInputView);


		},

		initFinanseSelect: function(elSelector) {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			view.financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});


			var modelFinanceAttr = _.find(view.model.get('group')[0].attribute, function(attr) {
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

		getDoctor: function() {
			var view = this;

			var doctorLastName = view.getProperty('doctorLastName');
			var doctorFirstName = view.getProperty('doctorFirstName');

			return {
				name: {
					first: doctorFirstName ? doctorFirstName : Core.Cookies.get("doctorFirstName"),
					last: doctorLastName ? doctorLastName : Core.Cookies.get("doctorLastName")
				}
			};

		},
		getProperty: function(name, propertyName) {
			var view = this;

			if (!propertyName) propertyName = 'value';

			var attributes = view.model.get('group')[0].attribute.concat(view.model.get('group')[1].attribute);

			var attr = _.find(attributes, function(attribute) {
				return attribute.name == name;
			});

			if (!attr) return;

			var property = _.find(attr.properties, function(property) {
				return property.name == propertyName;
			});

			if (!property) return;

			var value = property.value;

			return value;
		},

		modelToTree: function() {
			var view = this;
			var tree = [];
			var root = {};
			root.title = view.model.get('name');
			root.expand = true;
			root.icon = false;
			root.select = true;
			root.unselectable = true;
			var plannedEndDate = moment(view.getProperty('plannedEndDate'), "YYYY-MM-DD HH:mm:ss"); //2013-03-30 07:00:00
			console.log('plannedEndDate', plannedEndDate);
			root.date = moment(plannedEndDate).format('DD.MM.YYYY');
			root.time = moment(plannedEndDate).format('HH:mm');

			root.cito = view.getProperty('urgent');


			root.children = [];

			var attributes = view.model.get('group')[1].attribute;
			var stringAttributes = _.filter(attributes, function(attr) {
				return attr.type == "String";
			});

			root.children = _.map(stringAttributes, function(attr) {
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

		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			var view = this;

			view.$el.html($.tmpl(view.template, {
				doctor: view.doctor
			}));

			view.$('.edit-tree').dynatree({
				clickFolderMode: 2,
				minExpandLevel: 2,

				generateIds: true,
				noLink: true,
				checkbox: true,
				children: view.modelToTree(),
				onRender: function(node, nodeSpan) {
					//console.log(node, nodeSpan)
					UIInitialize($(nodeSpan));

					$(nodeSpan).find(".HourPicker").mask("99:99").timepicker({
						showPeriodLabels: false
					});

				},
				onCustomRender: function(node) {

					var html = '';
					if (node.data.noCustomRender) {

						html += '<span class="title-col">';
						html += node.data.title;
						html += '</span>';

					} else {

						if (node.data.cito == "true") {
							node.data.checked = 'checked="checked"';
						} else {
							node.data.checked = '';
						}
						html = _.template(test4EditTmpl, node.data);
					}

					return html;
				}
			});



			//Вид оплаты
			view.initFinanseSelect('#finance');

			UIInitialize(this.el);

			view.renderNested(view.mkbInputView, ".mbk");

			//Диагноз
			var diagnosis = view.getProperty('Направительный диагноз');
			var diagnosisId = view.getProperty('Направительный диагноз', 'valueId');
			if (diagnosis) {
				//console.log('diagnosis',diagnosis);
				diagnosis = diagnosis.split(/\s+/);
				var diagnosisCode = diagnosis[0];
				var diagnosisText = (diagnosis.splice(1)).join(' ');
				view.$("input[name='diagnosis[mkb][diagnosis]']").val(diagnosisText);
				view.$("input[name='diagnosis[mkb][code]']").val(diagnosisCode);
				view.$("input[name='diagnosis[mkb][code]']").data('mkb-id', diagnosisId);
			}


			//Дата и время создания
			var assessmentBeginDate = view.getProperty('assessmentBeginDate');
			var date = new Date(assessmentBeginDate);
			this.$("#start-date").datepicker("setDate", date);
			console.log('date.getHours()', date, date.getHours(), date.getMinutes());
			this.$("#start-time").val(('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});



			return view;
		},

		onSave: function() {
			var view = this;


			var tree = view.$('.edit-tree').dynatree("getTree");

			var $startDateInput = $('#start-date');
			var startDate = moment($startDateInput.datepicker("getDate")).format('YYYY-MM-DD');
			var $startTimeInput = $('#start-time');
			var startTime = $startTimeInput.val() + ':00';

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

			var selected_params = _.filter(modelTree.children, function(node) {
				return node.select === true;
			});

			var unselected_params = _.filter(modelTree.children, function(node) {
				return node.select === false;
			});

			var group = view.model.get('group');

			//выбранные тесты
			console.log('modelTree ', view.model.get('group'), modelTree, selected_params);
			_.each(selected_params, function(param) {
				_.each(group[1].attribute, function(attribute, index) {
					if (attribute.name == param.title) {
						group[1].attribute[index].properties[0].value = 'true';
					}
				});
			});

			_.each(unselected_params, function(param) {
				_.each(group[1].attribute, function(attribute, index) {
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
			view.setParam(view.model, 'assessmentBeginDate', 'value', startDate + ' ' + startTime);

			var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
			console.log('mkbId', mkbId);
			view.setParam(view.model, 'Направительный диагноз', 'valueId', mkbId);

			view.setParam(view.model, 'finance', 'value', $($('#finance option:selected')[0]).val());

			//console.log(model.get('group'))
			view.model.set('group', group);

			view.model.save({}, {
				success: function() {
					pubsub.trigger('lab-diagnostic:added');
					view.close();

				}
			});

			console.log('model111', view.model.toJSON());


		},

		setParam: function(model, attributeName, propertyName, value) {

			var group = model.get('group');

			var find = false;
			_.each(group, function(g, groupIndex) {
				_.each(g.attribute, function(a, attributeIndex) {
					if (a.name == attributeName) {
						_.each(a.properties, function(p, propertyIndex) {
							if (p.name == propertyName) {
								console.log('нашли', groupIndex, attributeIndex, propertyIndex);
								//									if(_.has(object, key) ){
								//
								//									}
								group[groupIndex].attribute[attributeIndex].properties[propertyIndex]['value'] = value;
								find = true;
							}

						});

						if (!find) { //нет нужного проперти, вставляем его
							group[groupIndex].attribute[attributeIndex].properties.push({
								name: propertyName,
								value: value
							});
							console.log('не нашли', groupIndex, attributeIndex, group[groupIndex].attribute[attributeIndex].properties);
						}

					}
				});
			});

			model.set('group', group);

			console.log('setParam', attributeName, propertyName, value, group);

		}

	}).mixin([popupMixin]);

});
