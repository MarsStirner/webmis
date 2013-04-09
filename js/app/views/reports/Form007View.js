define(["text!templates/reports/f007.html"], function(tmpl){

	return View.extend({
		template: tmpl,
		render: function () {
			console.log('007 render');

			this.$el.html($.tmpl(this.template));
			return this;
		}

	});
});
