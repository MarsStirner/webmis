define(function(require) {

	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var InfectionsMonitoring = Collection.extend({
		model: Model,

		url: function() {
			return DATA_PATH + "appeals/" + shared.models.appeal.get("id") + "/infection-monitoring";
		},

		parse: function(raw) {
			var parsed = []
			_.each(raw, function(infection){
				parsed.push({
					'name': infection[0],
					'beginDate': infection[1],
					'endDate': infection[2],
					'documents': infection[3]
				});
			});
			return parsed;
		}
	});

	return InfectionsMonitoring;
});
