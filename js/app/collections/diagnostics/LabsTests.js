//список лабораторий

define(["models/diagnostics/LabTest"], function (LabTest) {

	var LabsTests = Collection.extend({

		model: LabTest,
		initialize: function (models, options) {
//			if (options) this.code = options.code;
		},

		url: function () {
			var path = DATA_PATH + "actionTypes/laboratory";

//			if (this.code) {
//				path += "?filter[code]=" + this.code;
//			}else{
//				throw new Error("Нет code для группы иследований");
//			}

			return path;
		}

	});


	return LabsTests;

});
