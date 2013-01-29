/**
 * User: VKondratev
 * Date: 28.11.12
 */
define(["models/Bed"], function () {
	App.Collections.Beds = Collection.extend({
		model: App.Models.Bed,
		url: function () {
			return DATA_PATH + "hospitalbed/vacant?filter[departmentId]=17";
		}
	});
});
