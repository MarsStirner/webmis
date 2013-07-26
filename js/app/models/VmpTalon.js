define(function() {

	return Model.extend({
		idAttribute: 'id',
		initialize: function() {



		},

		onChange: function(){
			this.on('change:MKB', function() {
				this.resetQuotaType();
				this.resetPacientModel();
				this.resetTreatment();
			}, this);

			this.on('change:quotaType_id', function() {
				this.resetPacientModel();
				this.resetTreatment();
			}, this);

			this.on('change:pacientModel_id', function() {
				this.resetTreatment();
			}, this);
		},

		resetQuotaType: function() {
			this.set('quotaType_id', '');
			this.set('quotaTypeName', '');
		},

		resetPacientModel: function() {
			this.set('pacientModel_id', '');
			this.set('patientModelName', '');
		},

		resetTreatment: function() {
			this.set('treatment_id', '');
			this.set('treatmentName', '');
		},

		urlRoot: function() {
			return '/api/v1/appeals/' + this.appealId + '/client_quoting';
		},
		parse: function(raw) {

			return raw.data;
		}


	})
});
