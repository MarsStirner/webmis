/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(["models/diagnostics/instrumental-diag"], function () {
	App.Collections.InstrumentalDiags = Collection.extend({
		model: App.Models.InstrumentalDiag,

		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/instrumental/";
		}
	});

	return App.Collections.InstrumentalDiags
});