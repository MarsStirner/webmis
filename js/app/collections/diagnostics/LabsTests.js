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

					if (item.groups.length) {
						node.children = convert(item.groups);
						node.isFolder = true;

					}

					return node;

				});
			};



			//_.each([1, 2, 3], alert);
			//var evens = _.filter([1, 2, 3, 4, 5, 6], function(num){ return num % 2 == 0; });

			function onlyParents(list) {
				var results = [];

				_.each(list, function (item, index, list) {

					if (item.children && item.children.length) {
						item.children = onlyParents(item.children);
						results[results.length] = item;
					}

				});

				return results;

			}

			tree = convert(raw.data);
			//console.log('onlyParents', onlyParents(tree))


			return tree;
		}

	});


	return LabsTests;

});
