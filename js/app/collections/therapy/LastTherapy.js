define(function(require){

	return Collection.extend({
		initialize: function(options){
			console.log('arguments',arguments)
			this.eventId = options.eventId;
		},
		url: function () {
			return '/api/v1/therapy/last4event/'+this.eventId;
		},
	});

})
