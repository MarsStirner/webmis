define(function (require) {
	var Prescription = require('../models/Prescription');
    var Collection = require('./Collection');

	var Prescriptions = Collection.extend({
		model: Prescription,
		initialize: function (models, options) {
		},
		url: function () {
				return "/api/v1/prescriptions/";
		}
	});

	return Prescriptions;
});
