define(function (require) {
	var Prescription = require('models/prescriptions/Prescription');

	var Prescriptions = Collection.extend({
		model: Prescription,
		initialize: function (models, options) {
		},
		url: function () {
				return "/api/v1/prescriptions/?eventId=205014";
		}
	});

	return Prescriptions;

});
