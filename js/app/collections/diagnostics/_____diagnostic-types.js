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
					this.typePath = "dir/actionTypes?filter[mnem]=LAB";
					break;
				case "inst":
					this.typePath = "dir/actionTypes?filter[mnem]=DIAG";
					break;
				default:
					this.typePath = "dir/actionTypes";
			}
		},

		url: function () {
			return DATA_PATH + this.typePath;
		}
	});

	return App.Collections.DiagnosticTypes;
});
