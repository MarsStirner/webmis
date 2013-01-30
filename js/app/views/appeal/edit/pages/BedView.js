define([
	"text!templates/appeal/edit/pages/bed.tmpl"
], function (bedTemplate) {

	App.Views.Bed = View.extend({
		className: "item",
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
			if(bed.hasClass('disabledBed')){
				return false;
			}

			bed.addClass('checkedBed');
			var checkbox = bed.find(".bedCheckbox");
			checkbox.addClass("DoneIcon").attr("checked", "checked");
			this.trigger('bedChecked', checkbox.val());

		},

		render: function () {
			this.$el.html($.tmpl(this.template, this.model.toJSON()));
			return this;
		}
	});
});
