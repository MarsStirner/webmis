//список лабораторий

define(["models/diagnostics/LabTest"], function (LabTest) {

	var LabsTests = Collection.extend({

		model: LabTest,


		url: function () {
			var path = DATA_PATH + "actionTypes/laboratory/";

			return path;
		}

	});


	return LabsTests;

});
