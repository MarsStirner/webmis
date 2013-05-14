define([
	"models/appeal"
], function () {

	App.Models.PrintAppeal = App.Models.Appeal.extend({
		url: function() {
			return DATA_PATH + "appeals/" + this.get("id") + "/print/";
		},

		toJSON: function () {
			var json = App.Models.Appeal.prototype.toJSON.apply(this);
			if (json.diagnoses.length) {
				_.each(json.diagnoses, function (d) {
					var tags = $(d.description);
					if (tags.length) d.description = tags.map(function (t) { return $(t).text(); }).join(" ");
				});
			}
			console.log(json);
			return json;
		}
	});

	return App.Models.PrintAppeal;
} );