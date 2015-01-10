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
				parsed.push(infection);
			});
			return parsed;
		}
	});

	return infectionDrugMonitoring;
});
