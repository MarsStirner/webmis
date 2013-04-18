define([
	"text!templates/appeal/edit/popups/instrumental-edit.tmpl",
	"mixins/PopupMixin",
	"views/instrumental/InstrumentalPopupBottomFormView",
	"collections/diagnostics/diagnostic-types"], function(tmpl, popupMixin, BFView) {

	return View.extend({
		template: tmpl,
		events: {},

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
				appeal: this.options.appeal,
				model: this.options.model
			});
			this.depended(this.bfView);

		},



		render: function() {

			this.$("#dp").datepicker();
			this.$el.closest(".ui-dialog").find('.save').button("disable");

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},

		onSave: function() {
			console.log('onSave instrumental');
		}
	}).mixin([popupMixin]);


});
