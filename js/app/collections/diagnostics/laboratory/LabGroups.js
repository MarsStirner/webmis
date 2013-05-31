define(["models/diagnostics/laboratory/LabGroup"],

function(LabGroup) {

	var LabGroups = Collection.extend({

		model: LabGroup,

		url: function() {
			var path = DATA_PATH + "dir/actionTypes?filter[mnem]=LAB";

			return path;
		},

		/**
		 * конвертирует данные в нужный нам формат дерева, для dynatree
		 * @param  {array} data
		 * @return {array}
		 */
		convertToTree: function(data) {
			var convertToTree = arguments.callee;

			return _.map(data, function(item) {
				var node = {};

				node.title = item.name;
				node.code = item.code;
				node.icon = false;

				if (item.groups && item.groups.length) {
					node.children = convertToTree(item.groups);
					node.isFolder = true;
				}

				return node;
			});
		},

		/**
		 * удаляет из дерева элементы у которых нет дочерних элементов
		 * @param  {array} tree древовидная структура из convertToTree
		 * @return {array}
		 */
		onlyParents: function(tree) {
			var results = [];
			var onlyParents = arguments.callee;

			_.each(tree, function(item, index, list) {

				if (item.children && item.children.length) {
					item.children = onlyParents(item.children);
					results[results.length] = item;
				}

			});

			return results;
		},

		parse: function(raw) {
			var tree = [];

			tree = this.convertToTree(raw.data);
			var parents = this.onlyParents(tree);

			return parents;
		}

	});


	return LabGroups;

});
