define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var infectionDrugMonitoringItemTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-drug-monitoring-item.tmpl');
	var infectionDrugMonitoringTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-drug-monitoring.tmpl');

	var ClientSortableGrid = require('views/appeal/edit/pages/monitoring/views/ClientSortableGrid');
	var infectionDrugMonitoring = require('views/appeal/edit/pages/monitoring/collections/InfectionDrugMonitoring');

	var infectionDrugMonitoringView = ClientSortableGrid.extend({
		template: infectionDrugMonitoringTmpl,
		itemTemplate: infectionDrugMonitoringItemTmpl,

		events: {
			'click .showInfectionDrugMonitoring': 'showInfectionDrugMonitoring'
		},

		showInfectionDrugMonitoring: function(e){
			var view = this;
			$(e.target).fadeOut();
			this.wasLoaded = true;
			Backbone.Collection.prototype.fetch.apply(this.collection).done(function(){
				view.render();
			});
		},

		data: function() {
			return {
				collection: this.collection.models,
				appealId: shared.models.appeal.get('id'),
				wasLoaded: this.wasLoaded
			};
		},

		initialize: function(options) {
			this.collection = new infectionDrugMonitoring();
			ClientSortableGrid.prototype.initialize.apply(this);
		}
	});

	return infectionDrugMonitoringView;
});
