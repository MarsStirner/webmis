define(function(require) {

	return Collection.extend({
		initialize: function(models, options) {
			//console.log('arguments',arguments)
			this.patientId = options.patientId;
		},
		url: function() {
			return '/api/v1/therapy/rest4patient/' + this.patientId;
		},
	});

})
