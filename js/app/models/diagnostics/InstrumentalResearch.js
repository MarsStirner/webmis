define(["mixins/commonData"], function(commonData) {
	var InstrumentalResearch = Model.extend({
		idAttribute:"id",
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
		urlRoot: function(){
			return DATA_PATH + 'appeals/' + this.appealId + '/diagnostics/instrumental';
		},
		parse: function(raw){
			return raw.data?raw.data[0]:raw;
			//raw когда парсим модель в коллекции, raw.data[0] - когда получаем отдельную модель
		}

	}).mixin([commonData]);

	return InstrumentalResearch;
});
