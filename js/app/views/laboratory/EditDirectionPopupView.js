/**
 * User: FKurilov
 * Date: 25.06.12
 */

//попап редактирования направления на лабисследование

define(function(require) {
	var tmpl = require('text!templates/appeal/edit/popups/laboratory-edit-popup.tmpl');
	var popupMixin = require('mixins/PopupMixin');
	var SelectView = require("views/ui/SelectView");
	var test4EditTmpl = require('text!templates/laboratory/node-test4edit.html');
	var MkbInputView = require("views/ui/MkbInputView");
	var PersonDialogView = require('views/ui/PersonDialog');

	return View.extend({
		template: tmpl,
		events: {
			'click #doctor-outer': 'openDoctorSelectPopup'
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

			pubsub.on('person:changed', function(doctor) {
				console.log('assign-person: changed', doctor);
				view.doctor = doctor;
				view.ui.$doctor.val(doctor.name.raw);

			});

		},
		openDoctorSelectPopup: function() {
			console.log('openDoctorSelectPopup');
			this.personDialogView = new PersonDialogView({
				appeal: this.options.appeal
			});

			this.personDialogView.render().open();

		},

		initFinanseSelect: function(elSelector) {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			view.financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			var modelFinanceId = view.model.getProperty('finance');

			view.financeSelect = new SelectView({
				collection: view.financeDictionary,
				el: view.$(elSelector),
				initSelection: modelFinanceId ? modelFinanceId : appealFinanceId
			});

			view.depended(view.financeSelect);

		},

		getDoctor: function() {
			var view = this;

			var doctorLastName = view.model.getProperty('doctorLastName');
			var doctorFirstName = view.model.getProperty('doctorFirstName');
			var doctorMiddleName = view.model.getProperty('doctorMiddleName');

			return {
				name: {
					first: doctorFirstName ? doctorFirstName : Core.Cookies.get("doctorFirstName"),
					last: doctorLastName ? doctorLastName : Core.Cookies.get("doctorLastName"),
					middle: doctorMiddleName ? doctorMiddleName : ''
				}
			};

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
			var plannedEndDate = moment(view.model.getProperty('plannedEndDate'), "YYYY-MM-DD HH:mm:ss"); //2013-03-30 07:00:00
			console.log('plannedEndDate', plannedEndDate);
			root.date = moment(plannedEndDate).format('DD.MM.YYYY');
			root.time = moment(plannedEndDate).format('HH:mm');

			root.cito = view.model.getProperty('urgent');


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

			view.ui = {};
			view.ui.$mkbDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.ui.$mkbCode = view.$("input[name='diagnosis[mkb][code]']");
			view.ui.$startDate = view.$("#start-date");
			view.ui.$startTime = view.$("#start-time");
			view.ui.$finance = view.$('#finance');
			view.ui.$doctor = view.$('#doctor');

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

			view.renderNested(view.mkbInputView, ".mbk");

			//Диагноз
			var diagnosis = view.model.getProperty('Направительный диагноз', 'value');
			var diagnosisId = view.model.getProperty('Направительный диагноз', 'valueId');
			if (diagnosis) {
				//console.log('diagnosis',diagnosis);
				diagnosis = diagnosis.split(/\s+/);
				var diagnosisCode = diagnosis[0];
				var diagnosisText = (diagnosis.splice(1)).join(' ');
				view.ui.$mkbDiagnosis.val(diagnosisText);
				view.ui.$mkbCode.val(diagnosisCode);
				view.ui.$mkbCode.data('mkb-id', diagnosisId);
			}


			//Дата и время создания
			var assessmentBeginDate = view.model.getProperty('assessmentBeginDate');
			var date = new Date(assessmentBeginDate);
			view.ui.$startDate.datepicker();
			view.ui.$startDate.datepicker("setDate", date);
			view.ui.$startTime.val(('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});



			return view;
		},

		onSave: function() {
			var view = this;


			var tree = view.$('.edit-tree').dynatree("getTree");


			var startDate = moment(view.ui.$startDate.datepicker("getDate")).format('YYYY-MM-DD');
			var startTime = view.ui.$startTime.val() + ':00';


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
			_.each(selected_params, function(param) {
				//view.model.setProperty(param.title, 'isAssigned', "true");
				_.each(group[1].attribute, function(attribute, index) {
					if (attribute.name == param.title) {
						group[1].attribute[index].properties[0].value = 'true';
					}
				});
			});

			_.each(unselected_params, function(param) {
				//view.model.setProperty(param.title, 'isAssigned', "false");
				_.each(group[1].attribute, function(attribute, index) {
					if (attribute.name == param.title) {
						group[1].attribute[index].properties[0].value = 'false';
					}
				});
			});

			view.model.setProperty('doctorFirstName', 'value', view.doctor.name.first);
			view.model.setProperty('doctorLastName', 'value', view.doctor.name.last);
			view.model.setProperty('doctorMiddleName', 'value', '');
			view.model.setProperty('urgent', 'value', cito);
			view.model.setProperty('plannedEndDate', 'value', date + ' ' + time);
			view.model.setProperty('assessmentBeginDate', 'value', startDate + ' ' + startTime);
			view.model.setProperty('finance', 'value', view.ui.$finance.val());
			if(view.ui.$mkbCode.data('mkb-id')){
				view.model.setProperty('Направительный диагноз', 'valueId', view.ui.$mkbCode.data('mkb-id'));
			}



			console.log(view.model.get('group'))
			view.model.set('group', group);

			view.model.save({}, {
				success: function() {
					pubsub.trigger('lab-diagnostic:added');
					//pubsub.trigger('noty', {text:'Направление обновлено'});
					view.close();
				},
				error: function(a,b,c){
					var errorMessage = (JSON.parse(b.responseText)).errorMessage;

					pubsub.trigger('noty', {text:errorMessage,type:'error'});
					//console.log('save error', (JSON.parse(b.responseText)).errorMessage);

				}
			});



		},

		close: function() {
			this.$el.dialog("close");
			this.$el.remove();

			this.mkbInputView.close();
			this.financeSelect.close();


		}

	}).mixin([popupMixin]);

});
