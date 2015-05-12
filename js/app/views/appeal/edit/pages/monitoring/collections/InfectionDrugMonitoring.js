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
				var isDupe = false;
				_.each(parsed, function(drug){
					if (drug.therapyName == infection.therapyName && drug.drugName == infection.drugName && drug.begDate == infection.begDate) {
						if ( (drug.endDate == infection.endDate) || (!drug.endDate && infection.endDate) ) {
							drug = infection;
						}
						isDupe = true;
					}
				});
				!isDupe && parsed.push(infection);
			});
			return parsed;
		}
	});

	return infectionDrugMonitoring;
});
