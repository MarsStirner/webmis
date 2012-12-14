/**
 * User: FKurilov
 * Date: 13.12.12
 */
define(function () {
	App.Collections.Quotas = Collection.extend({
		model: App.Models.Quota,

		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/quotas";
		}
	});

	return App.Collections.Quotas;
});