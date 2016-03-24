define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var infectionMonitoringItemTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-monitoring-item.tmpl');
	var infectionMonitoringTmpl = require('text!templates/appeal/edit/pages/monitoring/infection-monitoring.tmpl');

	var ClientSortableGrid = require('views/appeal/edit/pages/monitoring/views/ClientSortableGrid');
	var InfectionMonitoring = require('views/appeal/edit/pages/monitoring/collections/InfectionMonitoring');

	var InfectionMonitoringView = ClientSortableGrid.extend({
		template: infectionMonitoringTmpl,
		itemTemplate: infectionMonitoringItemTmpl,

		events: {
			'click .showInfectionMonitoring': 'showInfectionMonitoring'
		},

		showInfectionMonitoring: function(e){
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
			this.collection = new InfectionMonitoring();
			ClientSortableGrid.prototype.initialize.apply(this);
		}
	});

	return InfectionMonitoringView;
});
