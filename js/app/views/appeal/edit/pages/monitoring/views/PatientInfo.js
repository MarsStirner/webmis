define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var patientInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/patient-info.tmpl');
	var AllergiesView = require('views/appeal/edit/popups/AllergiesEdit');
	var IntolerancesView = require('views/appeal/edit/popups/Intolerances');
	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');
	// var PatientBloodTypeHistoryRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeHistoryRow');
	// var PatientBloodTypeRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeRow');
	// var PatientBsaRow = require('views/appeal/edit/pages/monitoring/views/PatientBsaRow');

	// var PatientBloodTypes = require('views/appeal/edit/pages/monitoring/collections/PatientBloodTypes');


	var PatientInfo = BaseView.extend({
		template: patientInfoTmpl,
		events: {
			"click  .edit-allergies": "onAllergiesClick",
			"click  .edit-intolerances": "onIntolerancesClick"
		},
		initialize: function(options){
			var self = this;
			this.appealJSON = options.appealJSON;
			this.patientBsaRow = options.patientBsaRow;
			this.patientBloodTypeRow = options.patientBloodTypeRow;
			this.patientBloodTypeHistoryRow = options.patientBloodTypeHistoryRow;

			Cache.Patient.on('change', function(){
				self.appealJSON.patient = Cache.Patient.toJSON();
				self.render();
			});

			BaseView.prototype.initialize.apply(this);
		},

		data: function() {
			var appealJSON = this.appealJSON;
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

		onAllergiesClick: function(){
			var view = this;
			var allergiesView = new AllergiesView({
                title: 'Аллергия',
                width: '73em',
                saveText: 'Сохранить',
                collection: Cache.Patient.get('medicalInfo').get('allergies')
            });
            allergiesView.render().open();
		},

		onIntolerancesClick: function(){
			var intolerancesView = new IntolerancesView({
                title: 'Медикаментозная непереносимость',
                width: '73em',
                saveText: 'Сохранить',
                collection: Cache.Patient.get('medicalInfo').get('drugIntolerances'),
            });
            intolerancesView.render().open();
		},

		getBSA: function() {
			var appealJSON = this.appealJSON;
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
				".patient-blood-type": this.patientBloodTypeRow,
				".patient-blood-type-history": this.patientBloodTypeHistoryRow,
				".patient-bsa": this.patientBsaRow
			});

			this.$(".patient-blood-type-history").hide();

			return this;
		}
	});

	return PatientInfo;
});
