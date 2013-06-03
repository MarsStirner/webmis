/**
 * User: VKondratev
 * Date: 28.11.12
 */
define(function () {
	App.Models.Bed = Model.extend({
		defaults: {
			bedId: "",
			busy: "",
			bed:"",
			room: "",
			code: ""
		}
	});

    return App.Models.Bed;
});
