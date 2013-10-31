define(function(require) {

	var DrugBalance = Collection.extend({
		initialize: function(models, options) {

		},
		url: function() {
			return "/api/v1/rls/balance/"+this.nomenId;
		}
	});

	return DrugBalance;

});
