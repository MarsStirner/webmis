/**
 * User: FKurilov
 * Date: 25.06.12
 */
//попап создания направления на лабисследование
define(function(require) {

	var popupMixin = require('mixins/PopupMixin');
	var tmpl = require('text!templates/diagnostics/laboratory/laboratory-popup.tmpl');

	var LabTests = require('collections/diagnostics/laboratory/LabTests');
	var LabTestsView = require('views/diagnostics/laboratory/LabTestsView');

	var SelectedLabTests = require('collections/diagnostics/laboratory/SelectedLabTests')
	var SelectedLabTestsView = require('views/diagnostics/laboratory/SelectedLabTestsView');

	var MkbInputView = require('views/ui/MkbInputView');
	var PersonDialogView = require('views/ui/PersonDialog');
	var SelectView = require('views/ui/SelectView');




	var LaboratoryPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close",
			"click #assigner-outer": "openAssignerSelectPopup",
			"click #executor-outer": "openExecutorSelectPopup"
		},
		initialize: function() {
			_.bindAll(this);
			//console.log('initialize add lab popup', this.options.appeal.toJSON());

			var view = this;
			var appealDoctor = this.options.appeal.get('execPerson');

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//юзер не врач
				view.assigner = {
					id: appealDoctor.id,
					name: {
						first: appealDoctor.name.first,
						last: appealDoctor.name.last,
						middle: appealDoctor.name.middle
					}
				};

			} else {
				//юзер врач

				view.assigner = {
					id: Core.Cookies.get("userId"),
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName"),
						middle: ''
					}
				};
			}

			view.executor = {
				id: '',
				name: {
					first: '',
					last: '',
					middle: ''
				}
			};


			view.appeal = view.options.appeal;
			//console.log('appeal', view.appeal);




			//диагнозы из госпитализации
			view.appealDiagnosis = view.appeal.getDiagnosis();


			// лаб.исследования
			view.laboratoryTests = new LabTests();

			view.laboratoryTests.setParams({
				'filter[view]': 'tree',
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.labTestsView = new LabTestsView({
				collection: view.laboratoryTests,
				patientId: view.options.appeal.get('patient').get('id')
			});


			view.depended(view.labTestsView);

			//выбранные исследования

			view.selectedLabTests = new SelectedLabTests([], {
				appeal: view.options.appeal
			});

			view.selectedLabTests.on('updateAll:success', function() {
				pubsub.trigger('lab-diagnostic:added');
				view.close();
			});

			view.selectedLabTests.on('updateAll:error', function(response) {
				pubsub.trigger('noty', {
					text: 'Ошибка при создании направления',
					// text: 'Ошибка: ' + response.exception + ', errorCode: ' + response.errorCode,
					type: 'error'
				});
			});

			view.selectedLabTestsView = new SelectedLabTestsView({
				collection: view.selectedLabTests,
				patientId: view.options.appeal.get('patient').get('id')
			});

			view.depended(view.selectedLabTestsView);

			//инпут классификатора диагнозов
			view.mkbInputView = new MkbInputView();
			view.depended(view.mkbInputView);

			//изменение назначившего исследование
			pubsub.on('assigner:changed', function(assigner) {
				//console.log('assigner:changed', assigner)
				view.assigner = assigner;
				view.ui.$assigner.val(assigner.name.last + ' ' + assigner.name.first + ' ' + assigner.name.middle);
			});

			//изменение исполнителя исследования
			pubsub.on('executor:changed', function(executor) {
				//console.log('executor:changed', executor)
				view.executor = executor;
				view.ui.$executor.val(executor.name.last + ' ' + executor.name.first + ' ' + executor.name.middle);
			});

		},

		openAssignerSelectPopup: function() {
			this.personDialogView = new PersonDialogView({
				appeal: this.options.appeal,
				title: 'Направивший врач',
				callback: function(person) {
					pubsub.trigger('assigner:changed', person);
				}
			});

			this.personDialogView.render().open();
		},


		openExecutorSelectPopup: function() {
			this.personDialogView = new PersonDialogView({
				appeal: this.options.appeal,
				title: 'Исполнитель',
				callback: function(person) {
					pubsub.trigger('executor:changed', person);
				}
			});

			this.personDialogView.render().open();
		},

		initFinanseSelect: function() {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			var financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			view.financeSelect = new SelectView({
				collection: financeDictionary,
				el: view.$('#finance'),
				initSelection: appealFinanceId
			});

			view.depended(view.financeSelect);
		},

		saveButton: function(enabled, msg) {
			var $saveButton = this.$el.closest(".ui-dialog").find('.save');

			if (enabled) {
				$saveButton.button("enable");
			} else {
				$saveButton.button("disable");
			}
			if (msg) {
				$saveButton.button("option", "label", msg);
			} else {
				$saveButton.button("option", "label", 'Сохранить');
			}

		},

		onSave: function() {
			var view = this;

			 var selected = [];//_.filter(view.groupTestsCollection.models, function(model) {
			// 	return model.get('selected') === true;
			// });

			_.each(selected, function(item) {
				view.selectedLabTests.add(item.tests)
			});


			var startDate = moment(view.ui.$startDate.datepicker("getDate")).format('YYYY-MM-DD');
			var startTime = view.ui.$startTime.val() + ':00';

			view.selectedLabTests.forEach(function(model) {
				console.log('model', model)
				var id = model.get('id');


				var $datepicker = view.$('#start-date-' + id);
				//console.log('$datepicker', $datepicker.datepicker("getDate"))
				var date = moment($datepicker.datepicker("getDate")).format('YYYY-MM-DD');
				var $timepicker = view.$('#start-time-' + id);
				//console.log('timepicker', $timepicker)
				var time = $timepicker.val() + ':00';
				model.setProperty('plannedEndDate', 'value', date + ' ' + time);



				model.setProperty('assessmentDate', 'value', startDate + ' ' + startTime);

				model.setProperty('executorId', 'value', view.executor.id);
				model.setProperty('doctorFirstName', 'value', view.executor.name.first);
				model.setProperty('doctorLastName', 'value', view.executor.name.last);
				model.setProperty('doctorMiddleName', 'value', view.executor.name.middle);

				model.setProperty('assignerId', 'value', view.assigner.id);
				model.setProperty('assignerFirstName', 'value', view.assigner.name.first);
				model.setProperty('assignerLastName', 'value', view.assigner.name.last);
				model.setProperty('assignerMiddleName', 'value', view.assigner.name.middle);


				model.setProperty('finance', 'value', view.ui.$finance.val());

				var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
				if (mkbId) {
					model.setProperty('Направительный диагноз', 'valueId', mkbId);
				}


			});

			//console.log('view.selectedLabTests', view.selectedLabTests);

			view.saveButton(false, 'Сохраняем...');
			view.selectedLabTests.updateAll();

		},


		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		close: function() {
			var view = this;
			view.ui.$startDate.datepicker('destroy');
			view.$el.dialog("close");
			view.remove();

			// view.labsCollectionView.close();
			view.labTestsView.close();
			view.selectedLabTestsView.close();

			view.mkbInputView.close();
			view.financeSelect.close();

			pubsub.off('person:changed');

			//console.log('close', view);

		},

		render: function() {
			var view = this;

			//if ($(view.$el.parent().length).length === 0) {

			view.$el.html(_.template(this.template, {
				executor: this.executor,
				assigner: this.assigner
			}));

			view.renderNested(view.mkbInputView, ".mkb");

			// view.renderNested(view.labsCollectionView, ".labs");
			// view.labsCollection.fetch();

			view.ui = {};
			view.ui.$startDate = this.$("#start-date");
			view.ui.$startTime = this.$("#start-time");
			view.ui.$mbkCode = view.$("input[name='diagnosis[mkb][code]']");
			view.ui.$mbkDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.ui.$finance = view.$('#finance');
			view.ui.$assigner = view.$('#assigner');
			view.ui.$executor = view.$('#executor');

			this.$('.change-assigner,.change-executor').button();



			//селект вида оплаты
			view.initFinanseSelect();

			view.labTestsView.setElement(this.$el.find('.groups'));

			view.selectedLabTestsView.setElement(this.$el.find('.group-tests'));

			pubsub.trigger('lab:click');



			//установка диагноза
			if (view.appealDiagnosis) {
				console.log('view.appealDiagnosis', view.appeal, view.appealDiagnosis.get('mkb').get('diagnosis'));
				view.ui.$mbkDiagnosis.val(view.appealDiagnosis.get('mkb').get('diagnosis'));
				view.ui.$mbkCode.val(view.appealDiagnosis.get('mkb').get('code'));
				view.ui.$mbkCode.data('mkb-id', view.appealDiagnosis.get('mkb').get('id'));
			}


			//Дата и время создания
			var now = new Date();
			view.ui.$startDate.datepicker();
			view.ui.$startDate.datepicker("setDate", now);
			view.ui.$startTime.val(('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});


			//до того как выбран тест кнопка сохранить не активна
			this.$el.closest(".ui-dialog").find('.save').button("disable");


			return view;
		}

	}).mixin([popupMixin]);

	return LaboratoryPopup;
});
