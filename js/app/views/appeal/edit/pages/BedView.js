define([
	"text!templates/appeal/edit/pages/bed.tmpl"
], function (bedTemplate) {

	App.Views.Bed = View.extend({
		template: bedTemplate,

		events: {
			"click .bedBox": "onBedClick"
		},

//		initialize: function (options) {
//
//		},

		onBedClick: function (event) {

			var beds = $('.bedBox');
			var bed = this.$(event.currentTarget);

			beds.removeClass('checkedBed');
			beds.find(".bedCheckbox").removeClass("DoneIcon").removeAttr("checked");

			bed.addClass('checkedBed');
			bed.find(".bedCheckbox").addClass("DoneIcon").attr("checked", "checked");

		},

		render: function () {
			this.$el.html($.tmpl(this.template, this.model.toJSON()));
			return this;
		}
	});
});
