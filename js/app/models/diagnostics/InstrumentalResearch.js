define(["mixins/commonData"], function(commonData) {
	var InstrumentalResearch = Model.extend({
		initialize: function(attr, options) {
			
			var appealId = false;
			if (options.appealId) {//если модель создаётся самостоятельно
				appealId = options.appealId;
			}

			if (options.collection && options.collection.appealId) {//если модель создаётся коллекцией
				appealId = options.collection.appealId;
			}

			if (!appealId) {//для создания модели нужен appealId
				throw new Error("Нет appealId для InstrumentalResearch");
			} else {
				this.appealId = appealId;
			}
		},
		url: function() {
			return DATA_PATH + 'appeals/' + this.appealId + '/diagnostics/instrumental';
		}

	}).mixin([commonData]);

	return InstrumentalResearch;
});
