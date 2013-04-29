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


	var InstrumentalPopup = View.extend({
		template: tmpl,
		events: {},

		initialize: function(options) {

			_.bindAll(this);

			//юзер
			this.doctor = {
				name: {
					first: Core.Cookies.get("doctorFirstName"),
					last: Core.Cookies.get("doctorLastName")
				}
			};
			this.data = {
				'doctor': this.doctor
			};

			this.bfView = new BFView({
				data: this.data,
				appeal: this.options.appeal
			});
			this.depended(this.bfView);

			this.instrumntalGroups = new InstrumntalGroups();
			this.instrumntalGroups.parents = true;

			this.instrumntalResearchs = new InstrumntalGroups();

		},

		loadGroups: function(code) {
			var view = this;

			view.instrumntalGroups.setParams({
				'filter[view]': 'tree'
			});

			view.$instrumentalGroups.html('<li>Загружается...</li>');
			view.instrumntalGroups.fetch().done(function() {
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

					if (node.data.children && node.data.children.length > 0) {
					} else {
						view.loadResearchs(node.data.code);
					}

					view.updateSaveButton();
				},
				children: view.instrumntalGroups.toJSON()
			});

			if (!view.groupsTree) {
				view.groupsTree = view.$instrumentalGroups.dynatree("getTree");
			}
			view.groupsTree.reload();
		},

		loadResearchs: function(code) {
			var view = this;

			view.instrumntalResearchs.setParams({
				'filter[code]': code
			});

			view.$instrumentalResearchs.html('<li>Загружается...</li>');
			view.instrumntalResearchs.fetch().done(function(){
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
						view.testCode = node.data.code;
					} else {
						view.testCode = false;
					}
					view.updateSaveButton();
				},
				children: view.instrumntalResearchs.toJSON()
			});

			if (!view.researchsTree) {
				view.researchsTree = view.$instrumentalResearchs.dynatree("getTree");
			}
			view.researchsTree.reload();
		},

		updateSaveButton: function() {
			var view = this;

			if (view.testCode) {
				view.$saveButton.button("enable");
			} else {
				view.$saveButton.button("disable");
			}

		},

		onSave: function() {
			var view = this;
			if (!view.testCode) {
				return;
			}

			var patientId = view.options.appeal.get('patient').get('id');
			var appealId = this.options.appeal.get('id');

			view.testTemplate = new InstrumentalResearchTemplate({}, {
				code: view.testCode,
				patientId: patientId
			});

			view.testTemplate.fetch().done(function() {
				view.saveTest();
			});

		},

		saveTest: function() {
			//doctorFirstName - имя врача назначившего исследование
			view.testTemplate.setProperty('doctorFirstName', 'value', view.doctor.name.first);
			//doctorMiddleName - отчество врача назначившего исследование
			view.testTemplate.setProperty('doctorMiddleName', 'value', '');
			//doctorLastName - фамилия врача назначившего исследование
			view.testTemplate.setProperty('doctorLastName', 'value', view.doctor.name.last);

			//assessmentDate - дата создания направления на исследование
			var assessmentDate = moment(view.$assessmentDatepicker.datepicker("getDate")).format('YYYY-MM-DD');
			var assessmentTime = view.$assessmentTimepicker.val() + ':00';
			view.testTemplate.setProperty('assessmentDate', 'value', assessmentDate + ' ' + assessmentTime);

			//plannedEndDate - планируемая дата выполнения иследования
			var plannedDate = moment(view.$plannedDatepicker.datepicker("getDate")).format('YYYY-MM-DD');
			var plannedTime = view.$plannedTimepicker.val() + ':00';
			view.testTemplate.setProperty('plannedEndDate', 'value', plannedDate + ' ' + plannedTime);

			//finance - идентификатор типа оплаты
			var financeId = $($('#finance option:selected')[0]).val();
			view.testTemplate.setProperty('finance', 'value', financeId);

			//urgent - срочность
			var urgent = $('input[name=urgent]:checked').prop('checked');
			view.testTemplate.setProperty('urgent', 'value', urgent);

			//идентификатор направительного диагноза
			var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
			view.testTemplate.setProperty('Направительный диагноз', 'valueId', mkbId);

			view.$saveButton.button("disable");

			view.tests = new InstrumentalResearchs(null, {
				appealId: appealId
			});


			view.tests.add(view.testTemplate);

			view.tests.saveAll({
				success: function(raw, status) {
					console.log('success saveall', arguments);
					view.close();
					pubsub.trigger('instrumental-diagnostic:added');
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

			view.$instrumentalGroups = view.$('.instrumental-groups');
			view.$instrumentalResearchs = view.$('.instrumental-researchs');
			view.$saveButton = view.$el.closest(".ui-dialog").find('.save');

			view.$plannedDatepicker = view.$("#dp");
			view.$plannedTimepicker = view.$("#tp");

			view.$assessmentDatepicker = $('#start-date');
			view.$assessmentTimepicker = $('#start-time');

			view.loadGroups();

			view.$plannedDatepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					var day = moment(view.$(this).datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var hour = view.$plannedTimepicker.timepicker('getHour');
					//если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
					if (day.diff(currentDay, 'days') === 0) {
						if (hour <= currentHour) {
							view.$plannedTimepicker.val('');
						}
					}
				}
			});

			view.$plannedTimepicker.timepicker({
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

			view.$plannedTimepicker.val('09:00');

			view.$saveButton.button("disable");
		}

	}).mixin([popupMixin]);

	return InstrumentalPopup;
});
