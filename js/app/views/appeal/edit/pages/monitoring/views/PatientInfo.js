define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var patientInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/patient-info.tmpl');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');
	var PatientBloodTypeHistoryRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeHistoryRow');
	var PatientBloodTypeRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeRow');
	var PatientBsaRow = require('views/appeal/edit/pages/monitoring/views/PatientBsaRow');

	var PatientBloodTypes = require('views/appeal/edit/pages/monitoring/collections/PatientBloodTypes');

	var PatientInfo = BaseView.extend({
		template: patientInfoTmpl,

		data: function() {
			var appealJSON = shared.appealJSON;
			var bsa = this.getBSA();
			var weight = appealJSON.physicalParameters.weight;

			if (weight && weight > 500) { //если вес больше 500, то наверно это граммы...
				weight = weight + ' г';
			} else if (weight && weight <= 500) {
				weight = weight + ' кг';
			}


			return {
				weight: weight,
				bsa: bsa,
				appeal: appealJSON,
				patient: appealJSON.patient
			};
		},

		getBSA: function() {
			var appealJSON = shared.appealJSON;
			var height = appealJSON.physicalParameters.height;
			var weight = appealJSON.physicalParameters.weight;
			var bsa;

			if (weight > 500) { //если вес больше 500, то наверно это граммы...
				weight = weight / 1000;
			}

			if (height || weight) {
				bsa = Math.sqrt((height * weight) / 3600);

				bsa = bsa.toFixed(2);
			}

			return bsa;

		},


		render: function() {
			BaseView.prototype.render.apply(this);

			this.assign({
				".patient-blood-type": new PatientBloodTypeRow({
					PatientBloodTypes: PatientBloodTypes
				}),
				".patient-blood-type-history": new PatientBloodTypeHistoryRow({
					PatientBloodTypes: PatientBloodTypes
				}),
				".patient-bsa": new PatientBsaRow()
			});

			this.$(".patient-blood-type-history").hide();

			return this;
		}
	});

	return PatientInfo;
});
