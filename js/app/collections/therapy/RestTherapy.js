define(function(require) {

	return Collection.extend({
		initialize: function(models, options) {
			//console.log('arguments',arguments)
			this.eventId = options.eventId;
		},
		url: function() {
			return '/api/v1/therapy/rest4event/' + this.eventId;
		},
	});

})
