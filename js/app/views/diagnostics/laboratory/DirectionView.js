/**
 * User: FKurilov
 * Date: 25.06.12
 */
//попап создания направления на лабисследование
define(function(require) {

	var popupMixin = require('mixins/PopupMixin');
	var tmpl = require('text!templates/diagnostics/laboratory/direction.tmpl');

	var Analyzes = require('collections/diagnostics/laboratory/Analyzes');
	var AnalyzesTreeView = require('views/diagnostics/laboratory/DirectionAnalyzesTreeView');

	var AnalyzesSelected = require('collections/diagnostics/laboratory/AnalyzesSelected')
	var AnalyzesSelectedView = require('views/diagnostics/laboratory/DirectionAnalyzesSelectedView');

	var MkbInputView = require('views/ui/MkbInputView');
	var PersonDialogView = require('views/ui/PersonDialog');
	var SelectView = require('views/ui/SelectView');


	var DirectionPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close",
			"click #assigner-outer": "openAssignerSelectPopup",
			"click #executor-outer": "openExecutorSelectPopup",
			"change #start-time": "validateForm",
			"keyup #tree-search": "onSearchKeyup",
		},
		detach_event: function(e_name) {
			delete this.events[e_name]
			this.delegateEvents();
		},
		initialize: function() {
			_.bindAll(this);

			var view = this;
			var appealDoctor = this.options.appeal.get('execPerson');
			//назначивший исследование
			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//если юзер не врач
				view.assigner = {
					id: appealDoctor.id,
					name: {
						first: appealDoctor.name.first,
						last: appealDoctor.name.last,
						middle: appealDoctor.name.middle
					}
				};

			} else {
				//если юзер врач
				view.assigner = {
					id: Core.Cookies.get("userId"),
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName"),
						middle: ''
					}
				};
			}

			//исполнитель
			view.executor = {
				id: '',
				name: {
					first: '',
					last: '',
					middle: ''
				}
			};


			view.appeal = view.options.appeal;


			//диагнозы из госпитализации
			view.appealDiagnosis = view.appeal.getDiagnosis();


			// коллекция с деревом лаб.исследований
			view.analyzes = new Analyzes();

			view.analyzes.setParams({
				'filter[view]': 'tree',
				sortingField: "name",
				sortingMethod: "asc"
			});

			// вью для коллекции с деревом лаб.исследований
			view.analyzesTreeView = new AnalyzesTreeView({
				collection: view.analyzes,
				patientId: view.options.appeal.get('patient').get('id')
			});

			view.depended(view.analyzesTreeView);

			//коллекция с выбранными лаб.исследованиями
			view.analyzesSelected = new AnalyzesSelected([], {
				appeal: view.options.appeal
			});

			view.analyzesSelected.on('updateAll:success', function() {
				pubsub.trigger('lab-diagnostic:added');
				view.close();
			});

			view.analyzesSelected.on('reset add remove', this.executorInputState, this);

			view.analyzesSelected.on('all', function() {
				view.validateForm();
			});

			view.analyzesSelected.on('updateAll:error', function(response) {
				pubsub.trigger('noty', {
					text: 'Ошибка при создании направления',
					// text: 'Ошибка: ' + response.exception + ', errorCode: ' + response.errorCode,
					type: 'error'
				});
			});

			//вью для коллекции с выбранными лаб.исследованиями
			view.analyzesSelectedView = new AnalyzesSelectedView({
				collection: view.analyzesSelected,
				patientId: view.options.appeal.get('patient').get('id')
			});

			view.depended(view.analyzesSelectedView);

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
				if (view.analyzesSelected.length === 1) {
					view.executor = executor;
					view.ui.$executor.val(executor.name.last + ' ' + executor.name.first + ' ' + executor.name.middle);
				}

			});

		},
		onSearchKeyup: function(event){
			var $target = $(event.currentTarget);

			this.analyzes.search($target.val());
		},
		validateForm: function() {
			var view = this;
			var valid = true;

			if (!view.ui.$assessmentTimepicker.val()) {
				valid = false;
			}
			if (view.analyzesSelected.length === 0) {
				valid = false;
			}

			view.analyzesSelected.each(function(analysis) {
				var plannedEndDate = analysis.getProperty('plannedEndDate', 'value');

				if (!plannedEndDate) {
					valid = false;
				}

				if (!moment(plannedEndDate, "YYYY-MM-DD HH:mm:ss").isValid()) {
					valid = false;
				}


			});


			view.saveButton(valid);


		},


		//открывает попап для выбора направившего врача
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

		//открывает попап для выбора исполнителя
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

		executorInputState: function() {
			if (this.analyzesSelected.length > 1) {
				this.detach_event("click #executor-outer");
				this.ui.$executor.val('');
				this.$('.change-executor').button('disable');
				this.executor = {
					id: '',
					name: {
						first: '',
						last: '',
						middle: ''
					}
				};

			} else {
				this.events['click #executor-outer'] = "openExecutorSelectPopup";
				this.delegateEvents();
				this.$('.change-executor').button('enable');
			}
		},

		//селект выбора типа финансирования
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

		//создание выбранных исследований
		onSave: function() {
			var view = this;

			// var selected = []; //_.filter(view.groupTestsCollection.models, function(model) {
			// // 	return model.get('selected') === true;
			// // });

			// _.each(selected, function(item) {
			// 	view.analyzesSelected.add(item.tests)
			// });
			// view.analyzesSelected;


			var startDate = moment(view.ui.$assessmentDatepicker.datepicker("getDate")).format('YYYY-MM-DD');
			var startTime = view.ui.$assessmentTimepicker.val() + ':00';

			view.analyzesSelected.forEach(function(model) {
				console.log('model', model)
				var id = model.get('id');


				//var $datepicker = view.$('#start-date-' + id);
				//console.log('$datepicker', $datepicker.datepicker("getDate"))
				//var date = moment($datepicker.datepicker("getDate")).format('YYYY-MM-DD');
				//var $timepicker = view.$('#start-time-' + id);
				//console.log('timepicker', $timepicker)
				//var time = $timepicker.val() + ':00';
				//model.setProperty('plannedEndDate', 'value', date + ' ' + time);



				model.setProperty('assessmentDate', 'value', startDate + ' ' + startTime);

				if (view.analyzesSelected.length === 1) {
					model.setProperty('executorId', 'value', view.executor.id);
					// model.setProperty('doctorFirstName', 'value', view.executor.name.first);
					// model.setProperty('doctorLastName', 'value', view.executor.name.last);
					// model.setProperty('doctorMiddleName', 'value', view.executor.name.middle);
				}


				model.setProperty('assignerId', 'value', view.assigner.id);
				// model.setProperty('assignerFirstName', 'value', view.assigner.name.first);
				// model.setProperty('assignerLastName', 'value', view.assigner.name.last);
				// model.setProperty('assignerMiddleName', 'value', view.assigner.name.middle);


				model.setProperty('finance', 'value', view.ui.$finance.val());

				var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
				if (mkbId) {
					model.setProperty('Направительный диагноз', 'valueId', mkbId);
				}


			});

			//console.log('view.analyzesSelected', view.analyzesSelected);

			view.saveButton(false, 'Сохраняем...');
			view.analyzesSelected.updateAll();

		},


		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			var view = this;

			view.$el.html(_.template(this.template, {
				executor: this.executor,
				assigner: this.assigner
			}));

			view.renderNested(view.mkbInputView, ".mkb");

			view.ui = {};
			view.ui.$assessmentDatepicker = this.$("#start-date");
			view.ui.$assessmentTimepicker = this.$("#start-time");
			view.ui.$mbkCode = view.$("input[name='diagnosis[mkb][code]']");
			view.ui.$mbkDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.ui.$finance = view.$('#finance');
			view.ui.$assigner = view.$('#assigner');
			view.ui.$executor = view.$('#executor');

			this.$('.change-assigner,.change-executor').button();



			//селект вида оплаты
			view.initFinanseSelect();

			view.analyzesTreeView.setElement(this.$el.find('.groups'));

			view.analyzesSelectedView.setElement(this.$el.find('.group-tests'));

			pubsub.trigger('lab:click');



			//установка диагноза
			if (view.appealDiagnosis) {
				view.ui.$mbkDiagnosis.val(view.appealDiagnosis.get('mkb').get('diagnosis'));
				view.ui.$mbkCode.val(view.appealDiagnosis.get('mkb').get('code'));
				view.ui.$mbkCode.data('mkb-id', view.appealDiagnosis.get('mkb').get('id'));
			}


			//Дата и время создания
			var now = new Date();

			view.ui.$assessmentDatepicker.datepicker({
				minDate: now,
				onSelect: function(dateText, inst) {

					var day = moment(view.$(this).datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var hour = view.ui.$assessmentTimepicker.timepicker('getHour');
					//если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
					if (day.diff(currentDay, 'days') === 0) {
						if (hour <= currentHour) {
							view.ui.$assessmentTimepicker.val('').trigger('change');
						}
					}
				}
			}).datepicker("setDate", now);


			view.ui.$assessmentTimepicker.mask("99:99").timepicker({
				showPeriodLabels: false,
				defaultTime: 'now',
				onHourShow: function(hour) {
					var day = moment(view.ui.$assessmentDatepicker.datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					//если выбран текущий день, то часы меньше текущего нельзя выбрать
					if (day.diff(currentDay, 'days') === 0) {
						if (hour < currentHour) {
							return false;
						}
					}

					return true;
				},
				onMinuteShow: function(hour, minute) {
					var day = moment(view.ui.$assessmentDatepicker.datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var currentMinute = moment().minute();
					//если выбран текущий день и час, то минуты меньше текущего времени нельзя выбрать
					if (day.diff(currentDay, 'days') === 0) {
						if (hour === currentHour && minute <= currentMinute) {
							return false;
						}
					}
					return true;
				},
				showPeriodLabels: false,
				showOn: 'both' //,
				//button: '.bottom-form .icon-time'
			}).timepicker('setTime', now);

			this.$el.closest(".ui-dialog").find('.save');


			return view;
		},

		//закрытие попапа
		close: function() {
			var view = this;
			view.ui.$assessmentDatepicker.datepicker('destroy');
			view.$el.dialog("close");
			view.$el.remove();
			view.remove();

			view.analyzesTreeView.close();
			view.analyzesSelectedView.close();

			view.mkbInputView.close();
			view.financeSelect.close();

			pubsub.off('executor:changed');
			pubsub.off('assigner:changed');

		}

	}).mixin([popupMixin]);

	return DirectionPopup;
});
