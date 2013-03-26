//список лабораторий

define(["models/diagnostics/LabTest"], function (LabTest) {

	var LabsTests = Collection.extend({

		model: LabTest,


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
                    node.cito = '';

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


	return LabsTests;

});
