define(function () {

	return Model.extend({


		urlRoot: function () {
			return '/api/v1/appeals/' + this.appealId + '/client_quoting';
		},
		parse: function (data) {
			console.log('data',data)
			return data.data;
		}


	})
});
