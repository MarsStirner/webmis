//список лабораторий

define(["models/diagnostics/Lab"], function (Lab) {

	var Labs = Collection.extend({

		model: Lab,

		url: function () {

			var path = DATA_PATH + "actionTypes/laboratory/";

			return path;
		},

		parse: function (raw) {
			var tree = [];

			function convert(list) {
				return _.map(list, function (item) {

					var node = {};
					node.title = item.name;
					node.code = item.code;
					node.icon = false;

					if (item.groups && item.groups.length) {
						node.children = convert(item.groups);
						node.isFolder = true;

					}

					return node;

				});
			};

			tree = convert(raw.data);
			//console.log(tree)

			return  tree;
		}

	});

	return Labs;

});
