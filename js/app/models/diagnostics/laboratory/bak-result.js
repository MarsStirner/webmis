define(["models/model-base"], function (ModelBase) {
	//return ModelBase.extend({
	return Backbone.Model.extend({
		url: function () {
			//return DATA_PATH + "diagnostics/laboratory/bak/" + this.diagnosticId;
			return "/bak-results.json"
		}
	});
});