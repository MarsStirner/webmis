/**
 * User: FKurilov
 * Date: 26.06.12
 */
define(function () {
	App.Models.DiagnosticType = Model.extend({
		defaults: {
			groupId: "",
			code: "",
			name: "",
			subTypes: []
		}
	});

	return App.Models.DiagnosticType;
});