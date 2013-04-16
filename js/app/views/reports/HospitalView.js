define(["text!templates/reports/hospital.html"], function(tmpl){

	return View.extend({
		template: tmpl,
		render: function () {
			console.log('hospital render');

			this.$el.html($.tmpl(this.template));
			return this;
		}

	});
});
