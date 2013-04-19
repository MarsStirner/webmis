/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/instrumental.tmpl",
	"mixins/PopupMixin",
	"views/instrumental/InstrumentalPopupBottomFormView",
	"collections/diagnostics/InstrumntalGroups",
	"collections/diagnostics/InstrumentalResearchs",
	"models/diagnostics/InstrumentalResearchTemplate",
	"collections/diagnostics/diagnostic-types"], function(
tmpl,
popupMixin,
BFView,
InstrumntalGroups,
InstrumentalResearchs,
InstrumentalResearchTemplate) {


	var InstrumentalPopup = View.extend({
		template: tmpl,
		events: {
			//"click .ShowHidePopup": "close",
			//"click .EventList li": "onRootTypeSelected",
			//"click .SelectAnalysis li": "onSelectAnalysis",
			//"click .test": "test"
		},

		initialize: function(options) {
			//this.constructor.__super__.initialize.apply(this, options);
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
			console.log('loadGroups', code);

			view.instrumntalGroups.setParams({
				'filter[view]': 'tree'
				//,'filter[code]': code
			});

			view.$instrumentalGroups.html('<li>Загружается...</li>');
			view.instrumntalGroups.fetch().done(function() {

				view.$instrumentalGroups.html('');

				view.$instrumentalGroups.dynatree({
					onClick: function(node) {
						view.$instrumentalResearchs.html('');
						view.testCode = false;
						view.updateSaveButton();

						if (node.data.children && node.data.children.length > 0) {

						} else {
							view.$instrumentalResearchs.html('<li>Загружается...</li>');
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

			});

		},

		loadResearchs: function(code) {
			var view = this;
			view.instrumntalResearchs.setParams({
				'filter[code]': code
			});

			view.instrumntalResearchs.fetch().done(function() {

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
					onClick: function(node) {
						//if (node.data.children && node.data.children.length > 0) {
						//} else {
						//	console.log('instrumntalResearch',node.data.code);
						//}
					},
					children: view.instrumntalResearchs.toJSON()
				});

				if (!view.researchsTree) {
					view.researchsTree = view.$instrumentalResearchs.dynatree("getTree");
				}
				view.researchsTree.reload();
			});

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

				view.testTemplate.setProperty('finance', 'value', 5);

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
			})



		},



		render: function() {
			var view = this;
			view.$instrumentalGroups = view.$('.instrumental-groups');
			view.$instrumentalResearchs = view.$('.instrumental-researchs');
			view.$saveButton = view.$el.closest(".ui-dialog").find('.save');
			view.$datepicker = view.$("#dp");
			view.$timepicker = view.$("#tp");

			view.loadGroups();

			view.$datepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					var day = moment(view.$(this).datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var hour = view.$timepicker.timepicker('getHour');
					//если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
					if (day.diff(currentDay, 'days') === 0) {
						if (hour < currentHour) {
							view.$timepicker.val('');
						}
					}
				}
			});

			view.$timepicker.timepicker({
				onHourShow: function(hour) {
					var day = moment(view.$datepicker.datepicker("getDate")).startOf('day');
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
					var day = moment(view.$datepicker.datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var currentMinute = moment().minute();
					//если выбран текущий день и час, то минуты меньше текущего времени нельзя выбрать
					if (day.diff(currentDay, 'days') === 0) {
						if (hour === currentHour && minute < currentMinute) {
							return false;
						}
					}
					return true;
				},
				showPeriodLabels: false,
				showOn: 'both',
				button: '.icon-time'
			});

			view.$saveButton.button("disable");
			view.renderNested(this.bfView, ".bottom-form");



			return this;
		}

	}).mixin([popupMixin]);

	return InstrumentalPopup;
});
