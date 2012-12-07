define(["models/id-card"], function () {
	App.Collections.IdCards = Collection.extend ({
		model: App.Models.IdCard
	});
});