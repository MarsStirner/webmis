define([
	"models/appeal"
], function () {

	App.Models.PrintAppeal = App.Models.Appeal.extend({
		url: function() {
			return DATA_PATH + "appeals/" + this.get("id") + "/print/";
		}
	});

	return App.Models.PrintAppeal;
} );