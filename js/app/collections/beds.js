/**
 * User: VKondratev
 * Date: 28.11.12
 */
define(["models/Bed"], function () {
	App.Collections.Beds = Collection.extend({
		model: App.Models.Bed
	});
});