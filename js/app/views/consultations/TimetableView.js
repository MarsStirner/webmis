define(["text!views/consultations/timetable.html"],function (tmpl) {
	return View.extend({
		template: tmpl,

		render: function(data) {
			console.log('timetable render')
			this.$el.html(_.template(this.template, data));

			return this;
		}
	})
});
