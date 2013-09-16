define(function(require) {
	var template = require('text!templates/chief/index.html');

	return View.extend({
		className: "ContentHolder",
		template: template,
		render: function() {
			this.$el.html(_.template(this.template));
			return this;
		}
	});

});
