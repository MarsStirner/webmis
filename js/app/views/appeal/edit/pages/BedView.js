define([
	"text!templates/appeal/edit/pages/bed.tmpl"
], function (bedTemplate) {

	App.Views.Bed = View.extend({
		className: "item",
		template: bedTemplate,

		events: {
			"click .bedBox": "onBedClick"
		},


		onBedClick: function (event) {

			var beds = $('.bedBox');
			var bed = this.$(event.currentTarget);




			if(bed.hasClass('disabledBed')){
				return false;
			}


			var checkbox = bed.find(".bedCheckbox");

			console.log(checkbox.prop('checked'));
			if(!checkbox.prop('checked')){
				bed.removeClass('checkedBed');
				checkbox.removeClass("DoneIcon").removeAttr("checked");

			}else{
				beds.removeClass('checkedBed');
				beds.find(".bedCheckbox").removeClass("DoneIcon").removeAttr("checked");
				bed.addClass('checkedBed');
				checkbox.addClass("DoneIcon").attr("checked", "checked");
				this.trigger('bedChecked', checkbox.val());
			}


		},

		render: function () {

			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			return this;
		}
	});
});
