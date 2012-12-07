define(["models/patient"], function () {

	App.Collections.Patients = Collection.extend ({
		url: DATA_PATH + "patients/",
		model: App.Models.Patient
	});

});
