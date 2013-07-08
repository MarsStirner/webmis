/**
 * User: FKurilov
 * Date: 25.06.12
 */
//попап создания направления на лабисследование
define(function(require) {

	var popupMixin = require('mixins/PopupMixin');
	var tmpl = require('text!templates/diagnostics/laboratory/laboratory-popup.tmpl');

	var GroupsCollection = require('collections/diagnostics/laboratory/LabGroups');
	var GroupTestsCollection = require('collections/diagnostics/laboratory/LabGroupTests');
	var LabsCollection = require('collections/diagnostics/laboratory/Labs');

	var GroupsView = require('views/diagnostics/laboratory/LabGroupsView');
	var GroupTestsView = require('views/diagnostics/laboratory/LabGroupTestsView');
	var LabsCollectionView = require('views/diagnostics/laboratory/LabsView');
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
			console.log('initialize add lab popup', this.options.appeal.toJSON());

			var view = this;
			var appealDoctor = this.options.appeal.get('execPerson');

			//console.log('Core.Cookies.get("currentRole")', Core.Cookies.get("currentRole"));

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//юзер не врач
				view.assigner = {
					name: {
						first: appealDoctor.name.first,
						last: appealDoctor.name.last,
						middle: appealDoctor.name.middle
					}
				};

			} else {
				//юзер врач

				view.assigner = {
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName"),
						middle: ''
					}
				};
			}

			view.executor = {
				name: {
					first: '',
					last: '',
					middle: ''
				}
			};



			// view.data = {
			// 	'doctor': view.doctor
			// };


			view.appeal = view.options.appeal;
			//console.log('appeal', view.appeal);


			var TestsCollection = Collection.extend({
				url: DATA_PATH + 'appeals/' + this.appeal.get('id') + '/diagnostics/laboratory',
				updateAll: function() {
					var collection = this;
					options = {
						dataType: "jsonp",
						contentType: 'application/json',
						success: function(data, status) {
							//console.log('updateAll success', arguments);
							if (status == 'success') {
								collection.trigger('updateAll:success', arguments);
							} else {
								//collection.trigger('updateAll:error',status);
							}
						},
						error: function(x, status) {

							var response = $.parseJSON(x.responseText);
							collection.trigger('updateAll:error', response);
							//console.log('updateAll error', response.exception, response.errorCode, response.errorMessage, arguments);
						},
						data: JSON.stringify({
							data: collection.toJSON()
						})
					};

					return Backbone.sync('create', this, options);
				}

			});

			view.testsCollection = new TestsCollection();


			view.testsCollection.on('updateAll:success', function() {
				pubsub.trigger('lab-diagnostic:added');

				view.close();
			});

			view.testsCollection.on('updateAll:error', function(response) {
				pubsub.trigger('noty', {
					text: 'Ошибка: ' + response.exception + ', errorCode: ' + response.errorCode,
					type: 'error'
				});
			});

			pubsub.on('group:click group:parent:click', function() {
				view.testsCollection.reset();
			}, view);


			//диагнозы из госпитализации
			view.appealDiagnosis = view.appeal.getDiagnosis();


			//лаборатории
			view.labsCollection = new LabsCollection();

			view.labsCollection.setParams({
				'filter[code]': 2,
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.labsCollectionView = new LabsCollectionView({
				collection: view.labsCollection
			});

			view.depended(view.labsCollectionView);


			//группы лаб.исследований
			view.groupsCollection = new GroupsCollection();

			view.groupsCollection.setParams({
				'filter[view]': 'tree',
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.groupsView = new GroupsView({
				collection: view.groupsCollection
			});


			view.depended(view.groupsView);


			//лаб.исследования из определённой группы
			view.groupTestsCollection = new GroupTestsCollection();

			view.groupTestsCollection.setParams({
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.groupTestsView = new GroupTestsView({
				collection: view.groupTestsCollection,
				patientId: view.options.appeal.get('patient').get('id') //,
				//testCollection: view.testCollection
			});

			view.depended(view.groupTestsView);

			//инпут классификатора диагнозов
			view.mkbInputView = new MkbInputView();
			view.depended(view.mkbInputView);


			view.groupTestsCollection.on('change', function() {
				var selected = view.groupTestsCollection.filter(function(model) {
					return model.get('selected') === true;
				});

				view.saveButton(selected.length);

			});


			view.groupTestsCollection.on('change:selected', function(model, value, options) {
				console.log('change:selected', arguments);
				if (!view.executor) { //если исполнитель не задан взять исполнителя из исследования
					//view.executor = model.getProperty('sdhlkhshfsa','value');
					//pubsub.trigger('assigner:changed',view.executor);

				}
			});


			pubsub.on('assigner:changed', function(assigner) {
				view.assigner = assigner;
				view.ui.$assigner.val(assigner.name.raw);
			});

			pubsub.on('executor:changed', function(executor) {
				view.executor = executor;
				view.ui.$executor.val(executor.name.raw);
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

			//financeDictionary.fetch();

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

			var selected = _.filter(view.groupTestsCollection.models, function(model) {
				return model.get('selected') === true;
			});

			_.each(selected, function(item) {
				view.testsCollection.add(item.tests)
			});


			var startDate = moment(view.ui.$startDate.datepicker("getDate")).format('YYYY-MM-DD');
			var startTime = view.ui.$startTime.val() + ':00';

			view.testsCollection.forEach(function(model) {
				console.log('model', model)
				var id = model.get('id');


				var $datepicker = view.$('#start-date-' + id);
				console.log('$datepicker', $datepicker.datepicker("getDate"))
				var date = moment($datepicker.datepicker("getDate")).format('YYYY-MM-DD');
				var $timepicker = view.$('#start-time-' + id);
				console.log('timepicker', $timepicker)
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

			console.log('view.testsCollection', view.testsCollection);

			view.saveButton(false, 'Сохраняем...');
			view.testsCollection.updateAll();

		},


		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		close: function() {
			var view = this;
			view.$el.dialog("close");
			view.remove();

			view.labsCollectionView.close();
			view.groupsView.close();
			view.groupTestsView.close();
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

			view.renderNested(view.mkbInputView, ".mbk");

			view.renderNested(view.labsCollectionView, ".labs");
			view.labsCollection.fetch();

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

			view.groupsView.setElement(this.$el.find('.groups'));
			view.groupTestsView.setElement(this.$el.find('.group-tests'));



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
