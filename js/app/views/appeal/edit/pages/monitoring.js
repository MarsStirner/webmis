/**
 * User: FKurilov
 * Date: 09.04.13
 */
define(["text!templates/monitoring.tmpl"], function (monitoringTmpl) {
	var Monitoring = {
		Views: {},
		Collections: {},
		Models: {}
	};

	Monitoring.Views.Layout = Backbone.View.extend({
		render: function () {
			this.$el.html(_.template(monitoringTmpl, this.model.toJSON()));
		}
	});

	return Monitoring;
});