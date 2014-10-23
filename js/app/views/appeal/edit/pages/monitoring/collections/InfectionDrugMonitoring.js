define(function(require) {

	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var infectionDrugMonitoring = Collection.extend({
		model: Model,

		url: function() {
			return DATA_PATH + "appeals/" + shared.models.appeal.get("id") + "/infection-drug-monitoring";
		},

		parse: function(raw) {
			var parsed = []
			_.each(raw, function(infection){
				parsed.push({
					'drug': infection[0],
					'beginDate': infection[1],
					'endDate': infection[2],
					'therapy': infection[3],
					'documents': infection[4]
				});
			});
			return parsed;
		}
	});

	return infectionDrugMonitoring;
});
