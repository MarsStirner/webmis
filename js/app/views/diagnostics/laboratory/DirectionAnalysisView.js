define(function(require) {
	var analysisTemplate = require('text!templates/diagnostics/laboratory/direction-analysis.html');
	var Analysis = require('models/diagnostics/laboratory/Analysis');

	var AnalysisView = Backbone.View.extend({
		tagName: 'tr',
		events: {
			'change .select_date': 'onChangePlannedEndDate',
			'change .select_time': 'onChangePlannedEndDate',
			'change .cito': 'onChangeCito',
			'change .test-select': 'onSelectTest',
			'click .icon': 'onClickArrow',
			'click .title2': 'onClickTitle'
		},
		initialize: function(options) {
			//console.log('options', options);
			this.$el.attr('data-code', this.model.get('code'));
			this.$el.attr('data-cid', this.model.cid);
			this.$el.addClass('context-menu-' + this.cid);

			this.model.on('change:urgent change:plannedEndDate', function(model, value) {
				console.log('change', value)
			}, this);

		},

		analysisData: function() {

			var urgent = (this.model.getProperty('urgent', 'value') == 'true') ? true : false;

			var date, time;

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

		onSelectTest: function(event) {
			var $target = $(event.target);
			var name = $target.val();
			var value = $target.prop('checked');

			this.model.setProperty(name, 'isAssigned', "" + value);
		},

		onChangeCito: function() {
			var view = this;
			var value = this.ui.$cito.prop('checked');

			view.model.setProperty('urgent', 'value', "" + value);

		},

		onChangePlannedEndDate: function() {
			var view = this;
			var rawDate = this.ui.$plannedDatepicker.val();
			var rawTime = this.ui.$plannedTimepicker.val();

			var date = moment(rawDate, 'DD.MM.YYYY').format('YYYY-MM-DD');
			var time = rawTime + ':00';

			view.model.setProperty('plannedEndDate', 'value', date + ' ' + time);

			console.log('onChangePlannedEndDate', date + ' ' + time, view.model);

		},

		onClickTitle: function() {
			var closed = this.$el.find('.icons').hasClass('closed');
			var open = this.$el.find('.icons').hasClass('open');

			if (closed || open) {
				if (closed) {
					this.expand();
				} else {
					this.collapse();
				}
			}

		},

		onClickArrow: function(e) {
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
			this.triggerTestsList(true);
			this.triggerIcons(true);
		},

		collapse: function() {
			this.triggerTestsList(false);
			this.triggerIcons(false);
		},

		render: function() {
			var view = this;


			this.$el.html(_.template(analysisTemplate, this.analysisData(), {
				variable: 'data'
			}));


			view.ui = {};

			view.ui.$plannedDatepicker = view.$el.find(".select_date");
			view.ui.$plannedTimepicker = view.$el.find(".select_time");

			view.ui.$cito = view.$el.find(".cito");
			// view.ui.$select = view.$el.find(".select");
			view.ui.$tests = view.$el.find(".tests");
			view.ui.$icons = view.$el.find(".icons");


			view.ui.$plannedDatepicker.datepicker({
				minDate: new Date(),
				onSelect: function(dateText, inst) {
					var day = moment(view.$(this).datepicker("getDate")).startOf('day');
					var currentDay = moment().startOf('day');
					var currentHour = moment().hour();
					var hour = view.ui.$plannedTimepicker.timepicker('getHour');
					//если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
					if (day.diff(currentDay, 'days') === 0) {
						if (hour <= currentHour) {
							view.ui.$plannedTimepicker.val('').trigger('change');
						}
					}

					$(this).change();
				}
			});

			view.ui.$plannedTimepicker.timepicker({
				defaultTime: 'now',
				onHourShow: function(hour) {
					var day = moment(view.ui.$plannedDatepicker.datepicker("getDate")).startOf('day');
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
					var day = moment(view.ui.$plannedDatepicker.datepicker("getDate")).startOf('day');
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
				showOn: 'both'
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
						name: "Выбрать все тесты",
						callback: function() {
							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', true)
								.trigger('change');
						}
					},
					"deselect": {
						name: "Снять выделение со всех тестов",
						callback: function() {
							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', false)
								.trigger('change');
						}
					},
					"delete": {
						name: "Удалить исследование из списка",
						callback: function() {
							view.model.collection.remove(view.model);
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
