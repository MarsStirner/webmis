/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(["models/department-patient"], function () {
	App.Collections.DepartmentPatients = Collection.extend({
		model: App.Models.DepartmentPatient,

		initialize: function (options) {
			Collection.prototype.initialize.call(this);


		},
		url: function (){
			return DATA_PATH + "departments/patients/";
		}
	});
});
