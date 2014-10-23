define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var infectionMonitoringItemTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-monitoring-item.tmpl');
	var infectionMonitoringTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-monitoring.tmpl');

	var ClientSortableGrid = require('views/appeal/edit/pages/monitoring/views/ClientSortableGrid');
	var InfectionMonitoring = require('views/appeal/edit/pages/monitoring/collections/InfectionMonitoring');

	var InfectionMonitoringView = ClientSortableGrid.extend({
		template: infectionMonitoringTmpl,
		itemTemplate: infectionMonitoringItemTmpl,

		data: function() {
			return {
				collection: this.collection.models,
				appealId: shared.models.appeal.get('id'),
			};
		},

		initialize: function(options) {
			this.collection = new InfectionMonitoring();
			ClientSortableGrid.prototype.initialize.apply(this);
		}
	});

	return InfectionMonitoringView;
});
