define(["models/model-base"], function (ModelBase) {
	return ModelBase.extend({
		url: function () {
			return DATA_PATH + "/diagnostics/laboratory/bak/" + this.options.diagnosticId;
		}
	});
});