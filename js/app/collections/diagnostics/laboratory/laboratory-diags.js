/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(["models/diagnostics/laboratory/laboratory-diag"], function (LabDiagnostic) {
	App.Collections.LaboratoryDiags = Collection.extend({
		model: App.Models.LaboratoryDiag,
		pageFilter: function(){
			if (App.Router.paginatorPage && App.Router.paginatorPage > 1) {
				return '?page='+App.Router.paginatorPage;
			} else {
				return '';
			}
		},
		url: function () {
			console.log(this);
			return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/laboratory/";
		}

	});
});
