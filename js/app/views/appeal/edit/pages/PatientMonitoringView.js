define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');
	var template = require('text!templates/appeal/edit/pages/patient-monitoring.html');

	var MonitoringInfoGrid = require('views/appeal/edit/pages/monitoring/views/MonitoringInfoGrid');
	var ExpressAnalyses = require('views/appeal/edit/pages/monitoring/views/ExpressAnalysesView');

	return Backbone.View.extend({
		ui: {},
		events: {},
		className: "monitoring-layout",
		initialize: function() {
			shared.models.appeal = this.model = this.options.appeal;
			//shared.appealJSON = shared.models.appeal.toJSON();

		},
		render: function() {

			this.$el.html(_.template(template,this.options.appeal.toJSON()));

			this.assign({
				".monitoring-info": new MonitoringInfoGrid(),
				".express-analyses": new ExpressAnalyses()
			});

			return this;
		}

	});

});
