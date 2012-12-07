/**
 * User: FKurilov
 * Date: 26.06.12
 */
define(["models/diagnostics/diagnostic-type"], function () {
	App.Collections.DiagnosticTypes = Collection.extend({
		model: App.Models.DiagnosticType,

		initialize: function (options) {
			Collection.prototype.initialize.call(this);

			switch (options.type) {
				case "lab":
					this.typePath = "actionTypes/laboratory/";
					break;
				case "inst":
					this.typePath = "actionTypes/instrumental/";
					break;
				default:
					this.typePath = "actionTypes/";
			}
		},

		url: function () {
			return DATA_PATH + this.typePath;
		}
	});

	return App.Collections.DiagnosticTypes;
});