define([
	"models/appeal"
], function () {

	App.Models.PrintAppeal = App.Models.Appeal.extend({
		urlRoot: function(){
			return DATA_PATH + "print/appeals/"
		}
	});

	return App.Models.Appeal;
} );