define(["models/lab"], function ()
{
	App.Collections.Labs = Collection.extend({
		model: App.Models.Lab,
		url: function () {
			return DATA_PATH + "labs/"
		}
	});

	return App.Collections.Labs;
});
