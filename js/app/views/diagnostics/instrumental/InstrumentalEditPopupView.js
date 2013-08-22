define(function(require) {
	var tmpl = require('text!templates/diagnostics/instrumental/instrumental-edit-popup.tmpl');
	var popupMixin = require('mixins/PopupMixin');

	var BFView = require('views/diagnostics/instrumental/InstrumentalPopupBottomFormView');
	var PersonDialogView = require('views/ui/PersonDialog');
	var ViewModel = require('views/diagnostics/instrumental/InstrumentalEditPopupViewModel');

	//require('models/DeepModel');


	return View.extend({
		template: tmpl,
		events: {
			'click #assigner-outer': 'openAssignerSelectPopup',
			'click #executor-outer': 'openExecutorSelectPopup'
		},

		initialize: function(options) {
			_.bindAll(this);

			this.viewModel = new ViewModel({}, {
				appeal: this.options.appeal,
				model: this.options.model
			});

			this.model = this.options.model;
			this.data = this.model.toJSON();

			this.bfView = new BFView({
				data: this.viewModel.toJSON()
			});


			this.depended(this.bfView);

			pubsub.on('assigner:changed', function(assigner) {
				console.log('assign-person: changed', assigner);

				this.viewModel.set('assignerId', assigner.id);
				this.viewModel.set('assignerFirstName', assigner.name.first);
				this.viewModel.set('assignerMiddleName', assigner.name.middle);
				this.viewModel.set('assignerLastName', assigner.name.last);

				this.$assigner.val(assigner.name.raw);

			}, this);

			pubsub.on('executor:changed', function(executor) {
				// this.executor = executor;

				this.viewModel.set('executorId', executor.id);
				this.viewModel.set('executorFirstName', executor.name.first);
				this.viewModel.set('executorMiddleName', executor.name.middle);
				this.viewModel.set('executorLastName', executor.name.last);

				this.$executor.val(executor.name.raw);

			}, this);

		},

		openAssignerSelectPopup: function() {
			console.log('openAssignerSelectPopup');
			this.personDialogView = new PersonDialogView({
				title: 'Направивший врач',
				appeal: this.options.appeal,
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

		modelToTree: function() {
			var view = this;
			var tree = [];
			var root = {};
			root.title = view.model.get('name');
			root.expand = true;
			root.icon = false;
			root.select = true;
			root.unselectable = true;
			return [root];
		},

		render: function() {
			var view = this;



			// this.$('.instrumental-researchs').dynatree({
			// 	checkbox: true,
			// 	children: view.modelToTree()
			// });

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},
		afterRender: function() {
			var view = this;

			view.$assessmentDatepicker = view.bfView.$el.find('#start-date');
			view.$assessmentTimepicker = view.$('#start-time');
			view.$plannedDatepicker = view.$("#dp");
			view.$plannedTimepicker = view.$("#tp");
			view.$urgent = view.$('input[name=urgent]');
			view.$assigner = view.$('input[name=assigner]');
			view.$executor = view.$('input[name=executor]');
			view.$finance = view.$('#finance');
			view.$mkbDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.$mkbCode = view.$("input[name='diagnosis[mkb][code]']");
			this.$('.change-assigner,.change-executor').button();

			view.$saveButton = view.$el.closest(".ui-dialog").find('.save');

			view.$assessmentDatepicker
				.val(moment(view.viewModel.get('assessmentDay'), 'YYYY-MM-DD').format('DD.MM.YYYY'))
				.addClass('Disabled')
				.prop('disabled', true);
			//datepicker().datepicker("setDate", moment(view.viewModel.get('assessmentDay'), 'YYYY-MM-DD').toDate());
			view.$assessmentTimepicker
				.val(view.viewModel.get('assessmentTime'))
				.addClass('Disabled')
				.prop('disabled', true);

			// .mask("99:99").timepicker({
			// 	showPeriodLabels: false
			// });
			view.$assessmentDatepicker.datepicker('disable');
			view.$assessmentTimepicker.datepicker('disable');

			// view.$assessmentDatepicker.on('change', function() {
			// 	console.log('$assessmentDatepicker',view.$assessmentDatepicker.val())
			// 	view.viewModel.set('assessmentDay', moment(view.$assessmentDatepicker.val(), 'DD.MM.YYYY').format('YYYY-MM-DD'));
			// });

			// view.$assessmentTimepicker.on('change', function() {
			// 	console.log('$assessmentTimepicker',view.$assessmentTimepicker.val())
			// 	view.viewModel.set('assessmentTime', view.$assessmentTimepicker.val());
			// });


			view.$plannedDatepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					// view.viewModel.set('plannedDate', moment(dateText, 'DD.MM.YYYY').toDate());
					view.viewModel.set('plannedEndDay', moment(dateText, 'DD.MM.YYYY').format('YYYY-MM-DD'));
					var day = moment(view.$(this).datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var hour = view.$plannedTimepicker.timepicker('getHour');
					//если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
					if (day.diff(currentDay, 'days') === 0) {
						if (hour <= currentHour) {
							view.$plannedTimepicker.val('').trigger('change');
						}
					}
				}
			});

			// view.$plannedDatepicker.datepicker("setDate", this.viewModel.get('plannedDate'));
			view.$plannedDatepicker.datepicker("setDate", moment(view.viewModel.get('plannedEndDay'), 'YYYY-MM-DD').toDate());

			view.$plannedTimepicker.timepicker({
				onSelect: function(time) {
					view.viewModel.set('plannedEndTime', time);
				},
				defaultTime: 'now',
				onHourShow: function(hour) {
					var day = moment(view.$plannedDatepicker.datepicker("getDate")).startOf('day');
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
					var day = moment(view.$plannedDatepicker.datepicker("getDate")).startOf('day');
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
				showOn: 'both',
				button: '.timepicker .icon-time'
			});


			view.$plannedTimepicker.val(this.viewModel.get('plannedEndTime'));

			if (this.viewModel.get('urgent') == 'true') {
				view.$urgent.prop('checked', true);
			}

			//view.$doctor.val(view.viewModel.get('doctorFirstName') + ' ' + view.viewModel.get('doctorLastName'));

			view.$mkbDiagnosis.val(view.viewModel.get('mkbText'));
			view.$mkbCode.val(view.viewModel.get('mkbCode'));
			view.$mkbCode.data('mkb-id', view.viewModel.get('mkbId'));

			//console.log('finance',view.viewModel.get('finance'));
			view.$finance.select2("val", parseInt(view.viewModel.get('finance')));



			view.$urgent.on('change', function() {
				view.viewModel.set('urgent', '' + view.$urgent.prop('checked'));
			});
			view.$finance.on('change', function() {
				view.viewModel.set('finance', view.$(view.$('#finance option:selected')[0]).val());
			});
			view.$mkbCode.on('change', function() {
				view.viewModel.set('mkbId', view.$mkbCode.data('mkb-id'));
			});



		},

		onSave: function() {
			var view = this;

			view.model.setProperty('executorId', 'value', view.viewModel.get('executorId'));
			//doctorFirstName - имя врача назначившего исследование
			view.model.setProperty('doctorFirstName', 'value', view.viewModel.get('doctorFirstName'));
			//doctorMiddleName - отчество врача назначившего исследование
			view.model.setProperty('doctorMiddleName', 'value', view.viewModel.get('doctorMiddleName'));
			//doctorLastName - фамилия врача назначившего исследование
			view.model.setProperty('doctorLastName', 'value', view.viewModel.get('doctorLastName'));

			view.model.setProperty('assignerId', 'value', view.viewModel.get('assignerId'));
			//assignerFirstName - имя врача назначившего исследование
			view.model.setProperty('assignerFirstName', 'value', view.viewModel.get('assignerFirstName'));
			//assignerMiddleName - отчество врача назначившего исследование
			view.model.setProperty('assignerMiddleName', 'value', view.viewModel.get('assignerMiddleName'));
			//assignerLastName - фамилия врача назначившего исследование
			view.model.setProperty('assignerLastName', 'value', view.viewModel.get('assignerLastName'));

			//assessmentDate - дата создания направления на исследование
			var assessmentDay = view.viewModel.get('assessmentDay');
			var assessmentTime = view.viewModel.get('assessmentTime') + ':00';
			view.model.setProperty('assessmentBeginDate', 'value', assessmentDay + ' ' + assessmentTime);

			//plannedEndDate - планируемая дата выполнения иследования
			var plannedEndDay = view.viewModel.get('plannedEndDay');
			var plannedEndTime = view.viewModel.get('plannedEndTime') + ':00';
			view.model.setProperty('plannedEndDate', 'value', plannedEndDay + ' ' + plannedEndTime);

			//finance - идентификатор типа оплаты
			view.model.setProperty('finance', 'value', view.viewModel.get('finance'));

			//urgent - срочность
			view.model.setProperty('urgent', 'value', view.viewModel.get('urgent'));

			//идентификатор направительного диагноза
			view.model.setProperty('Направительный диагноз', 'valueId', view.viewModel.get('mkbId'));


			view.model.save({}, {
				success: function(raw, status) {
					view.close();
					pubsub.trigger('instrumental-diagnostic:added');
				},
				error: function() {

				}
			});


		},
		close: function() {

			this.$plannedDatepicker.datepicker('destroy');
			this.$el.dialog("close");
			this.bfView.close();
			this.$el.remove();
			this.remove();
		}
	}).mixin([popupMixin]);


});
