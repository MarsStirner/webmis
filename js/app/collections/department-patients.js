/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(["models/department-patient"], function () {
	App.Collections.DepartmentPatients = Collection.extend({
		model: App.Models.DepartmentPatient,

		initialize: function (options) {
			Collection.prototype.initialize.call(this);

			switch (options.role) {
				case "doctor":
					this.rolePath = "patients/";
					break;
				case "nurse":
					this.rolePath = "patients/nurse/";
					break;
				default:
					this.rolePath = "patients/";
			}
		},
		url: function (){
			return DATA_PATH + "departments/" + this.rolePath;
		}
	});
});