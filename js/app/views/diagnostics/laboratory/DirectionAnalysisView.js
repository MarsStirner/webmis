define(function(require) {
	var analysisTemplate = require('text!templates/diagnostics/laboratory/direction-analysis.html');
	var Analysis = require('models/diagnostics/laboratory/Analysis');

	var AnalysisView = Backbone.View.extend({
		tagName: 'tr',
		// className: 'context-menu-'+this.cid,
		events: {
			'change .select_date': 'setPlannedEndDate',
			'change .select_time': 'setPlannedEndDate',
			'change .cito': 'onCitoChange',
			'change .tests-checkbox': 'onTestSelect',
			'click .icon': 'onArrowClick',
			'click .title2': 'onTitleClick'
		},
		initialize: function(options) {
			//console.log('options', options);
			this.$el.attr('data-code', this.model.get('code'));
			this.$el.attr('data-cid', this.model.cid);
			this.$el.addClass('context-menu-' + this.cid);

		},

		analysisData: function() {
			//console.log('this.model',this.model)
			var urgent = false;
			if (this.model.getProperty('urgent', 'value') == 'true') {
				urgent = true;
			}


			//view.$plannedDatepicker.datepicker("setDate", "+1");
			var date = ''

			if (this.model.getProperty('plannedEndDate', 'value')) {
				var plannedEndDate = moment(this.model.getProperty('plannedEndDate', 'value'), 'YYYY-MM-DD HH:mm:ss');
				date = plannedEndDate.format('DD.MM.YYYY');
				time = plannedEndDate.format('HH:mm');
			} else {
				date = moment(new Date()).add('days', 1).format('DD.MM.YYYY');
				time = '07:00';
			}


			var data = _.extend(this.model.toJSON(), {
				cid: this.model.cid,
				date: date,
				time: time,
				urgent: urgent,
				tests: this.model.getTests()
			});
			return data;
		},

		onTestSelect: function(event) {
			var $target = $(event.target);
			var name = $target.val();
			var value = $target.prop('checked');
			console.log('value',value)
			if (value) {
				$target.parents('li').addClass('selected');
			} else {
				$target.parents('li').removeClass('selected');
			}
			this.model.setProperty(name, 'isAssigned', "" + value);
		},

		onTitleClick: function() {
			console.log('onTitleClick', this.model);
		},

		onCitoChange: function() {
			var view = this;
			var value = this.ui.$cito.prop('checked');

			view.model.setProperty('urgent', 'value', "" + value);

		},

		setPlannedEndDate: function() {
			var view = this;
			var rawDate = this.$plannedDatepicker.val();
			var rawTime = this.$plannedTimepicker.val();

			var date = moment(rawDate, 'DD.MM.YYYY').format('YYYY-MM-DD');
			var time = rawTime + ':00';

			view.model.setProperty('plannedEndDate', 'value', date + ' ' + time);

			console.log('setPlannedEndDate', date + ' ' + time, view.model)
			// if (!view.ui.$select.prop('checked')) {
			// 	view.ui.$select.prop('checked', true).trigger('change');
			// }

		},

		onArrowClick: function(e) {
			var $target = $(e.target);


			if ($target.hasClass('icon-open')) {
				this.collapse();
			} else {
				this.expand();
			}

		},

		triggerIcons: function(select) {
			if (select) {
				this.ui.$icons.removeClass('closed').addClass('open');
			} else {
				this.ui.$icons.removeClass('open').addClass('closed');
			}
		},

		triggerTestsList: function(select) {
			if (select) {
				this.ui.$tests.show();
			} else {
				this.ui.$tests.hide();
			}
		},

		expand: function() {
			//console.log('expand');
			this.triggerTestsList(true);
			this.triggerIcons(true);

		},
		collapse: function() {
			//console.log('collapse');
			this.triggerTestsList(false);
			this.triggerIcons(false);

		},

		render: function() {
			var view = this;


			this.$el.html(_.template(analysisTemplate, this.analysisData(), {
				variable: 'data'
			}));


			view.ui = {};
			// view.$plannedDatepicker = view.$el.find(".select_date");
			view.$plannedDatepicker = view.$el.find("#start-date-" + view.model.cid);
			console.log("#start-date-" + view.model.cid)

			view.$plannedTimepicker = view.$el.find(".select_time");
			view.ui.$cito = view.$el.find(".cito");
			view.ui.$select = view.$el.find(".select");
			view.ui.$tests = view.$el.find(".tests");
			view.ui.$icons = view.$el.find(".icons");


			// view.$plannedDatepicker.datepicker({
			// 	minDate: 0
			// });


			// view.$plannedTimepicker.mask("99:99").timepicker({
			// 	showPeriodLabels: false
			// });

			view.$plannedDatepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					//view.viewModel.set('plannedDate', moment(dateText, 'DD.MM.YYYY').toDate());
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

			//view.$plannedDatepicker.datepicker("setDate", this.viewModel.get('plannedDate'));

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
				showOn: 'both' //,
				//button: '.icon-time'
			});

			$.contextMenu({
				autoHide: true,
				selector: '.context-menu-' + view.cid,
				callback: function(key, options) {
					//var m = "clicked: " + key + " " + options.$trigger.data("cid");

					//console.log(arguments, options.$trigger.data("cid"));
				},
				items: {
					"select": {
						name: "Выбрать все",
						callback: function() {
							//console.log('select all')
							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', true)
								.trigger('change');
						}
					},
					"deselect": {
						name: "Снять выделение",
						callback: function() {
							//console.log('deselect all')

							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', false)
								.trigger('change');

						}
					}
				}
			});


			return this;
		},

		close: function() {
			var view = this;
			view.$el.remove();
			view.remove();
		}
	});

	return AnalysisView;

});
