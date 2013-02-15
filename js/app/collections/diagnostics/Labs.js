//список лабораторий

define(["models/diagnostics/Lab"], function (Lab) {

	Labs = Collection.extend({

		model: Lab,

		initialize: function (options) {

			if (options) this.patientId = options.patientId;

		},

		url: function () {

			var path = DATA_PATH + "actionTypes/laboratory/";

			if (this.patientId) {
				path += this.patientId;
			} else {
				throw new Error("Нет айди пациента");
			}

			return path;
		}

	});

	return Labs;

});
