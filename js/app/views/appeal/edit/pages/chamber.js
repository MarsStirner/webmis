/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/chamber.tmpl",
	"text!templates/appeal/edit/pages/bed.tmpl"
], function (template, bedTemplate) {

	App.Views.Chamber = View.extend({
		template: template,

		events: {
			"click .bedBox": "onBedClick"
		},

		initialize: function (options) {
            console.log('chamber init')
			 this.bedList = options.bedList || [];
		},

		onBedClick: function (event) {
			var bed = this.$(event.currentTarget);
			bed.toggleClass("checkedBed");

			if(bed.hasClass("checkedBed")) {
				bed.find(".bedCheckbox").addClass("DoneIcon").attr("checked", "checked");
			} else {
				bed.find(".bedCheckbox").removeClass("DoneIcon").removeAttr("checked");
			}

		},

		render: function () {
			this.$el.html($.tmpl(this.template));
			var chamber = this.$el.find(".Chamber");

			_.each(this.bedList, function (bed) {
				chamber.append($.tmpl(bedTemplate, bed));
			});

			return this;
		}
	});
});