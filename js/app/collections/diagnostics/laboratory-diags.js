/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(["models/diagnostics/laboratory-diag"], function (LabDiagnostic) {
	App.Collections.LaboratoryDiags = Collection.extend({
		model: App.Models.LaboratoryDiag,

		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/laboratory/";
		}
		,parse:function (response, options) {
			//console.log('COLLECTION',response, options)
//			if (data.requestData && data.requestData.coreVersion) {
//				CORE_VERSION = data.requestData.coreVersion;
//				VersionInfo.show();
//			}
			return response.data ? response.data : response
		}
	});
});
