define(function() {

	return Model.extend({


		urlRoot: function() {
			return '/api/v1/appeals/' + this.appealId + '/client_quoting';
		},
		parse: function(raw) {

			return raw.data;
		}


	})
});
