//список лабораторий

define(["models/diagnostics/Lab"], function (Lab) {

	Labs = Collection.extend({

		model: Lab,

		url: function () {

			var path = DATA_PATH + "actionTypes/laboratory/";

			return path;
		}

	});

	return Labs;

});
