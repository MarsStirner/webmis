define(['text!templates/ui/range-datetime-picker.tmpl',
	'inputmask'], function(template) {

	var RangeDatepickerView = View.extend({
		template: template,

		events: {
			"click .decrease": "decreaseDates",
			"click .increase": "increaseDates",
			"change .from-date": "onFromDateChange",
			"change .to-date": "onToDateChange",
			"change .from-time": "onFromTimeChange",
			"change .to-time": "onToTimeChange"
		},

		initialize: function() {
			var view = this;

			var Range = Backbone.Model.extend({});
			view.range = new Range();

			view.range.set({
				'from': view.options.startTimestamp * 1000
			}, {
				silent: true
			});
			view.range.set({
				'to': view.options.endTimestamp * 1000
			}, {
				silent: true
			});


			view.startTimestamp = view.options.startTimestamp ? view.options.startTimestamp * 1000 : moment().format('X') * 1000;
			view.endTimestamp = view.options.endTimestamp ? view.options.endTimestamp * 1000 : moment().format('X') * 1000;

			view.timeFormat = view.options.timeFormat ? view.options.timeFormat : 'HH:mm';
			view.dateFormat = view.options.dateFormat ? view.options.dateFormat : 'DD.MM.YYYY';

		},
		onFromDateChange: function() {
			var view = this;
			var ddmmyyyy = view.$fromDateInput.val().split('.');
			var dd = parseInt(ddmmyyyy[0], 10);
			var mm = parseInt(ddmmyyyy[1], 10) - 1;
			var yyyy = parseInt(ddmmyyyy[2], 10);

			var from = moment(view.range.get('from')).date(dd).month(mm).year(yyyy).format('X') * 1000;

			view.range.set('from', from);
		},
		onFromTimeChange: function() {
			var view = this;

			var hhmm = view.$fromTimeInput.val().split(':');
			var hh = parseInt(hhmm[0], 10);
			var mm = parseInt(hhmm[1], 10);

			var from = moment(view.range.get('from')).hours(hh).minutes(mm).format('X') * 1000;

			view.range.set('from', from);
		},

		onToDateChange: function() {
			var view = this;
			var ddmmyyyy = view.$toDateInput.val().split('.');
			var dd = parseInt(ddmmyyyy[0], 10);
			var mm = parseInt(ddmmyyyy[1], 10) - 1;
			var yyyy = parseInt(ddmmyyyy[2], 10);

			var from = moment(view.range.get('to')).date(dd).month(mm).year(yyyy).format('X') * 1000;

			view.range.set('to', from);
		},


		onToTimeChange: function() {
			var view = this;

			var hhmm = view.$toTimeInput.val().split(':');
			var hh = parseInt(hhmm[0], 10);
			var mm = parseInt(hhmm[1], 10);

			var from = moment(view.range.get('to')).hours(hh).minutes(mm).format('X') * 1000;

			view.range.set('to', from);
		},

		increaseDates: function(event) {
			event.preventDefault();

			this.setDates(1);
		},

		decreaseDates: function(event) {
			event.preventDefault();

			this.setDates(-1);
		},

		setDates: function(increment) {
			increment = increment || 0;

			var $startDateTime = this.$(".from-date");
			var $endDateTime = this.$(".to-date");

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");

			startDate.setDate(startDate.getDate() + increment);
			endDate.setDate(endDate.getDate() + increment);

			$endDateTime.datepicker("option", "minDate", moment(startDate).format(this.dateFormat));
			$startDateTime.datepicker("option", "maxDate", moment(endDate).format(this.dateFormat));
			$endDateTime.datepicker("refresh");

			$startDateTime.datepicker("setDate", startDate);
			$endDateTime.datepicker("setDate", endDate);

			console.log('startDate', startDate.getDate())

			this.$(".from-date").change();
		},

		setFromTime: function() {
			var view = this;

			var time = moment(view.range.get('from')).format(view.timeFormat);
			view.$('.from-time').val(time)
		},

		setToTime: function() {
			var view = this;

			var time = moment(view.range.get('to')).format(view.timeFormat);
			view.$('.to-time').val(time)
		},

		setFromDate: function() {
			var view = this;

			var date = moment(view.range.get('from')).format(view.dateFormat);
			view.$('.from-date').val(date)
		},

		setToDate: function() {
			var view = this;

			var date = moment(view.range.get('to')).format(view.dateFormat);
			view.$('.to-date').val(date)
		},

		render: function() {
			var view = this;

			view.$el.html($.tmpl(view.template));

			view.$fromDateInput = view.$(".from-date");
			view.$fromTimeInput = view.$(".from-time");
			view.$toDateInput = view.$(".to-date");
			view.$toTimeInput = view.$(".to-time");
                                view.$(".increase, .decrease").button();


			view.setFromTime();
			view.setToTime();
			view.setToDate();
			view.setFromDate();

			view.$('.from-date').datepicker({
				//inline: true,
				changeYear: true,
				changeMonth: true,
				showOtherMonths: true,
				selectOtherMonths: true,
				beforeShowDay: function(date) {
					return [true, (date.getTime() >= view.range.get('from')) && (date.getTime() <= view.range.get('to')) ? 'date-range-selected' : ''];
				},
				onClose: function(selectedDate) {
					view.$(".to-date").datepicker("option", "minDate", selectedDate);
				}
			});


			view.$('.to-date').datepicker({
				///inline: true,
				changeYear: true,
				changeMonth: true,
				showOtherMonths: true,
				selectOtherMonths: true,
				beforeShowDay: function(date) {
					return [true, ((date.getTime() >= view.range.get('from')) && (date.getTime() <= view.range.get('to'))) ? 'date-range-selected' : ''];
				},
				onClose: function(selectedDate) {
					view.$(".from-date").datepicker("option", "maxDate", selectedDate);
				}
			});

			view.$(".to-date").datepicker("option", "minDate", view.$(".from-date").datepicker("getDate"));
			view.$(".from-date").datepicker("option", "maxDate", view.$(".to-date").datepicker("getDate"));


			view.$(".from-date").inputmask("dd.mm.yyyy", {
				"placeholder": "дд.мм.гггг"
			});
			view.$(".to-date").inputmask("dd.mm.yyyy", {
				"placeholder": "дд.мм.гггг"
			});

			return view;
		}

	});

	return RangeDatepickerView;
});
