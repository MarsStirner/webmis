/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(["models/diagnostics/instrumental-diag"], function (InstDiagnostic) {
	return Collection.extend({
		model: InstDiagnostic,

		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/consultations/";
		}
	});
});