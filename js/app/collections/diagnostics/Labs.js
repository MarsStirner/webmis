//список лабораторий

define(["models/diagnostics/Lab"], function (Lab) {

	Labs = Collection.extend({

		model: Lab,

		url: function () {
			return DATA_PATH + "actionTypes/laboratory";
		}

	});

	return Labs;

});
