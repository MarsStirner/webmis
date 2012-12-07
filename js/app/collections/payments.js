define(["models/payment"], function () {
	App.Collections.Payments = Collection.extend ({
		model: App.Models.Payment,
		getDms: function () {
			return this.filter(function(model){
				return ( parseInt(model.get("policyType").get("id")) == 3 )
			})
		},
		getOms: function () {
			return this.filter(function(model){
				return ( parseInt(model.get("policyType").get("id")) != 3 )
			})
		}
	});
});