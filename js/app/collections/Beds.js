/**
 * User: VKondratev
 * Date: 28.11.12
 */
define(["models/Bed"], function () {
	App.Collections.Beds = Collection.extend({
		model: App.Models.Bed,
		initialize: function (models, options) {
			//this.departmentId = options.departmentId;
		},
		url: function () {
			if (this.departmentId) {
				return DATA_PATH + "hospitalbed/vacant?filter[departmentId]=" + this.departmentId;
			} else {
				throw new Error("No departmentId for bed collection");
			}
		}
	});
});
