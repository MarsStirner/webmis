/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(["models/diagnostics/instrumental-diag"], function (InstrumentalDiag) {
	var InstrumentalDiags = Collection.extend({
		model: InstrumentalDiag,

		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/instrumental/";
		}
	});

	return InstrumentalDiags;
});
