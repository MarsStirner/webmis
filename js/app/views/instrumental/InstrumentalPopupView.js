/**
 * User: FKurilov
 * Date: 25.06.12
 */

define(function(require) {
	var tmpl = require('text!templates/appeal/edit/popups/instrumental.tmpl');
	var popupMixin = require('mixins/PopupMixin');
	var BFView = require('views/instrumental/InstrumentalPopupBottomFormView');
	var InstrumntalGroups = require('collections/diagnostics/InstrumntalGroups');
	var InstrumentalResearchs = require('collections/diagnostics/InstrumentalResearchs');
	var InstrumentalResearchTemplate = require('models/diagnostics/InstrumentalResearchTemplate');


	var ViewModel = require('views/instrumental/InstrumentalPopupViewModel');

	var InstrumentalPopup = View.extend({

		template: tmpl,
		events: {},

		initialize: function(options) {

			_.bindAll(this);

			this.instrumntalResearchs = new InstrumntalGroups();
			this.viewModel = new ViewModel({}, {
				appeal: this.options.appeal
			});


			this.bfView = new BFView({
				data: this.viewModel.toJSON()
			});
			this.depended(this.bfView);
		},

		loadGroups: function(code) {
			var view = this;

			view.$instrumentalGroups.html('<li>Загружается...</li>');
			this.viewModel.instrumntalGroups.fetch().done(function() {
				view.makeGroupsTree();
			});

		},

		makeGroupsTree: function() {
			var view = this;

			view.$instrumentalGroups.dynatree({
				onClick: function(node) {
					view.$instrumentalResearchs.html('');
					view.testCode = false;
					view.updateSaveButton();

					if (node.data.children && node.data.children.length > 0) {} else {
						view.loadResearchs(node.data.code);
					}

					view.updateSaveButton();
				},
				children: this.viewModel.instrumntalGroups.toJSON()
			});

			if (!view.groupsTree) {
				view.groupsTree = view.$instrumentalGroups.dynatree("getTree");
			}
			view.groupsTree.reload();
		},

		loadResearchs: function(code) {
			var view = this;

			this.viewModel.instrumntalResearchs.setParams({
				'filter[code]': code
			});

			view.$instrumentalResearchs.html('<li>Загружается...</li>');
			this.viewModel.instrumntalResearchs.fetch().done(function() {
				view.makeResearchsTree();
			});

		},

		makeResearchsTree: function() {
			var view = this;

			view.$instrumentalResearchs.dynatree({
				checkbox: true,
				selectMode: 1,
				onSelect: function(select, node) {
					if (select) {
						//view.testCode = node.data.code;
						view.viewModel.set('code', node.data.code);
					} else {
						view.viewModel.set('code', false);
					}
					view.updateSaveButton();
				},
				children: this.viewModel.instrumntalResearchs.toJSON()
			});

			if (!view.researchsTree) {
				view.researchsTree = view.$instrumentalResearchs.dynatree("getTree");
			}
			view.researchsTree.reload();
		},

		updateSaveButton: function() {
			this.$saveButton.button(this.viewModel.get('saveButtonState'));
		},

		onSave: function() {
			var view = this;

			if (!view.viewModel.get('code')) {
				return;
			}

			//шаблон данных в формате commonData
			view.testTemplate = new InstrumentalResearchTemplate({}, {
				code: view.viewModel.get('code'),
				patientId: view.viewModel.get('patientId')
			});

			view.testTemplate.fetch().done(function() {
				view.saveTest();
			});

		},

		saveTest: function() {
			var view = this;

			//doctorFirstName - имя врача назначившего исследование
			view.testTemplate.setProperty('doctorFirstName', 'value', view.viewModel.get('doctorFirstName'));
			//doctorMiddleName - отчество врача назначившего исследование
			view.testTemplate.setProperty('doctorMiddleName', 'value', view.viewModel.get('doctorMiddleName'));
			//doctorLastName - фамилия врача назначившего исследование
			view.testTemplate.setProperty('doctorLastName', 'value', view.viewModel.get('doctorLastName'));

			//assessmentDate - дата создания направления на исследование
			var assessmentDate = moment(view.viewModel.get('assessmentDate')).format('YYYY-MM-DD');
			var assessmentTime = view.viewModel.get('assessmentTime') + ':00';
			view.testTemplate.setProperty('assessmentDate', 'value', assessmentDate + ' ' + assessmentTime);

			//plannedEndDate - планируемая дата выполнения иследования
			var plannedDate = moment(view.viewModel.get('plannedDate')).format('YYYY-MM-DD');
			var plannedTime = view.viewModel.get('plannedTime') + ':00';
			view.testTemplate.setProperty('plannedEndDate', 'value', plannedDate + ' ' + plannedTime);

			//finance - идентификатор типа оплаты
			view.testTemplate.setProperty('finance', 'value', view.viewModel.get('finance'));

			//urgent - срочность
			view.testTemplate.setProperty('urgent', 'value', view.viewModel.get('urgent'));

			//идентификатор направительного диагноза
			view.testTemplate.setProperty('Направительный диагноз', 'valueId', view.viewModel.get('mkbId'));

			view.viewModel.set('saveButtonState','disable');

			//создание направления сейчас реализованно только для группы тестов.... 
			//поэтому создаём коллекцию и добавляем в неё модель...
			view.tests = new InstrumentalResearchs(null, {
				appealId: view.viewModel.get('appealId')
			});

			view.tests.add(view.testTemplate);

			view.tests.saveAll({
				success: function(raw, status) {
					view.close();
					pubsub.trigger('instrumental-diagnostic:added');
				},
				error: function() {

				}
			});

		},

		render: function() {
			var view = this;
			view.renderNested(this.bfView, ".bottom-form");
			return this;
		},
		afterRender: function() {
			var view = this;

			view.$assessmentDatepicker = $('#start-date');
			view.$assessmentTimepicker = $('#start-time');
			view.$instrumentalGroups = view.$('.instrumental-groups');
			view.$instrumentalResearchs = view.$('.instrumental-researchs');
			view.$plannedDatepicker = view.$("#dp");
			view.$plannedTimepicker = view.$("#tp");
			view.$saveButton = view.$el.closest(".ui-dialog").find('.save');

			view.loadGroups();

			view.$plannedDatepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					view.viewModel.set('plannedDate', moment(dateText, 'DD.MM.YYYY').toDate());
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

			view.$plannedDatepicker.datepicker("setDate", this.viewModel.get('plannedDate'));

			view.$plannedTimepicker.timepicker({
				onSelect: function(time) {
					//view.viewModel.set('plannedTime', time)
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
				button: '.icon-time'
			});

			view.$plannedTimepicker.val(this.viewModel.get('plannedTime'));

			view.$plannedTimepicker.on('change', function() {
				view.viewModel.set('plannedTime', view.$plannedTimepicker.val());
			});

			view.$('input[name=urgent]').on('change', function() {
				view.viewModel.set('urgent', view.$('input[name=urgent]:checked').prop('checked'));
			});
			view.$('#finance').on('change', function() {
				view.viewModel.set('finance', view.$(view.$('#finance option:selected')[0]).val());
			});
			this.$("input[name='diagnosis[mkb][code]']").on('change', function() {
				view.viewModel.set('mkbId', view.$("input[name='diagnosis[mkb][code]']").data('mkb-id'));
			});

			


			view.$saveButton.button(view.viewModel.get('saveButtonState'));
			view.viewModel.on('change', view.updateSaveButton, view);

		}

	}).mixin([popupMixin]);

	return InstrumentalPopup;
});
