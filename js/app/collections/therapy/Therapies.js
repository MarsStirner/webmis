define(function(require) {


	var Therapy = Backbone.Model.extend({
		getCurrentPhases: function() {
			return _.filter(this.get('phases'), function(phase){
				return !phase.endDate;
			});
		},

		getClosedPhases: function() {
			return _.filter(this.get('phases'), function(phase){
				return phase.endDate
			});
		},

	});

	var Therapies = Collection.extend({
		model: Therapy,

		initialize: function(models, options) {
			this.patientId = options.patientId;
		},

		url: function() {
			return '/api/v1/patients/' + this.patientId + '/therapies';
		},
	});

	return Therapies;

})
