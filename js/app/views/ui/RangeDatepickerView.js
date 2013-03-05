define(['text!templates/ui/range-datetime-picker.tmpl',
				'inputmask'], function (template) {

	var RangeDatepickerView = View.extend({
		template: template,

		events: {
			"click .Actions.Decrease": "decreaseDates",
			"click .Actions.Increase": "increaseDates"
		},

		initialize: function () {
			var view = this;
			console.log('datepicker options', view.options)

			view.startTimestamp = view.options.startTimestamp ? view.options.startTimestamp * 1000 : moment().format('X') * 1000;
			view.endTimestamp = view.options.endTimestamp ? view.options.endTimestamp * 1000 : moment().format('X') * 1000;

			view.timeFormat = view.options.timeFormat ? view.options.timeFormat : 'HH:mm';
			view.dateFormat = view.options.dateFormat ? view.options.dateFormat : 'DD.MM.YYYY';


			//moment(1362467878000).format('DD.MM.YYYY');
			//moment(1362467878000).format('HH:mm');

		},

		increaseDates: function (event) {
			event.preventDefault();
			var $startDateTime = this.$(".start-date");
			var $endDateTime = this.$(".end-date");

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");
			var newMinEndDate = moment(startDate.setDate(startDate.getDate() - 1)).format(this.dateFormat);
			var newMaxStartDate = moment(endDate.setDate(endDate.getDate() + 1)).format(this.dateFormat);

			$endDateTime.datepicker("option", "minDate", newMinEndDate);
			$startDateTime.datepicker("option", "maxDate", newMaxStartDate);
			$startDateTime.datepicker( "refresh" );

			this.setDates(1);
		},

		decreaseDates: function (event) {
			event.preventDefault();
			var view = this;

			var $startDateTime = this.$(".start-date");
			var $endDateTime = this.$(".end-date");

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");
			var newMinEndDate = moment(startDate.setDate(startDate.getDate() - 1)).format(this.dateFormat);
			var newMaxStartDate = moment(endDate.setDate(endDate.getDate() - 1)).format(this.dateFormat);

			$endDateTime.datepicker("option", "minDate", newMinEndDate);
			$startDateTime.datepicker("option", "maxDate", newMaxStartDate);
			$endDateTime.datepicker( "refresh" );

			this.setDates(-1);
		},

		setDates: function (increment) {
			increment = increment || 0;

			var $startDateTime = this.$(".start-date");
			var $endDateTime = this.$(".end-date");

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");

			if (_.isDate(startDate)) startDate.setDate(startDate.getDate() + increment);
			if (_.isDate(endDate)) endDate.setDate(endDate.getDate() + increment);

			$startDateTime.datepicker("setDate", startDate);
			$endDateTime.datepicker("setDate", endDate);

			console.log('startDate', startDate.getDate())

			this.$("#start-date").change();
		},

		/***
		 *
		 * @param {string} time
		 */
		_setStartTime: function () {
			var view = this;

			var time = moment(view.startTimestamp).format(view.timeFormat);
			view.$('.start-time').val(time)
		},

		/***
		 *
		 * @param {string} time
		 */
		_setEndTime: function () {
			var view = this;

			var time = moment(view.endTimestamp).format(view.timeFormat);
			view.$('.end-time').val(time)
		},

		_setStartDate: function () {
			var view = this;

			var date = moment(view.startTimestamp).format(view.dateFormat);
			view.$('.start-date').val(date)
		},

		_setEndDate: function () {
			var view = this;

			var date = moment(view.endTimestamp).format(view.dateFormat);
			view.$('.end-date').val(date)
		},



		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template));

//			view.$(".SelectDate").each(function () {
//				var $this = $(this);
//
////				if ( $this.data ( "datepicker" ) )
////				{
////					//return true
////				}
////				$this.data ( "datepicker", true );
//
//
//				$this.datepicker({
//					inline: true,
//					changeYear: true,
//					changeMonth: true,
//					maxDate: $this.data("maxdate"),
//					minDate: $this.data("mindate")
//				});
//
//				$this.mask("99.99.9999");
//
//				$this.focus(function () {
//					$this.closest(".DatePeriod").addClass("Focused");
//				}).blur(function () {
//						$this.closest(".DatePeriod").removeClass("Focused");
//					});
//
//				$this.closest(".FromTo").siblings(".DateIcon").click(function () {
////					if ($this.is(":disabled")) {
////						return false;
////					}
//					$("#ui-datepicker-div").stop(true, true);
//					$this.focus();
//				});
//
//				$this.keydown(function (event) {
//					if (event.keyCode == 40) { // DOWN
//						$this.datepicker("show");
//					}
//					if (event.keyCode == 38) { // UP
//						$this.datepicker("hide");
//					}
//				});
//
//				$this.attr("autocomplete", "off");
//
//				var $relation = $($this.data("relation"));
//
//				if ($relation) {
//					$relation.timePicker();
//				}
//
//			});




			view._setStartTime();
			view._setEndTime();
			view._setEndDate();
			view._setStartDate();

			view.$('.start-date').datepicker({
				//inline: true,
				changeYear: true,
				changeMonth: true,
				showOtherMonths: true,
				selectOtherMonths: true,
//				onSelect: function (){
//					console.log('onSelect',view.$('.start-date').datepicker('option','maxDate'))
//				},
				onClose: function (selectedDate) {
					console.log('endMinDate',selectedDate)
					view.$(".end-date").datepicker("option", "minDate", selectedDate);
				}
			});


			view.$('.end-date').datepicker({
				///inline: true,
				changeYear: true,
				changeMonth: true,
				showOtherMonths: true,
				selectOtherMonths: true,
//				onSelect: function (){
//					console.log('onSelect',view.$('.end-date').datepicker('option','minDate'))
//				},
				onClose: function (selectedDate) {
					console.log('startMaxDate',selectedDate)
					view.$(".start-date").datepicker("option", "maxDate", selectedDate);
				}
			});

			view.$(".end-date").datepicker("option", "minDate", view.$(".start-date").datepicker("getDate"));
			view.$(".start-date").datepicker("option", "maxDate", view.$(".end-date").datepicker("getDate"));




			view.$(".start-date").inputmask("dd.mm.yyyy",{ "placeholder": "дд.мм.гггг" });
			view.$(".end-date").inputmask("dd.mm.yyyy",{ "placeholder": "дд.мм.гггг" });

			//view.$(".start-time").inputmask("hh:mm",{ "placeholder": "чч:мм" });
			//view.$(".end-time").inputmask("hh:mm",{ "placeholder": "чч:мм" });

			return view;
		}

	});

	return RangeDatepickerView;
});
