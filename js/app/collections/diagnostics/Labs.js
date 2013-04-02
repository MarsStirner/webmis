//список лабораторий

define(["models/diagnostics/Lab"], function(Lab) {

	var Labs = Collection.extend({

		model: Lab,

		url: function() {
			var path = DATA_PATH + "actionTypes/laboratory/";

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

		parse: function(raw) {
			var tree = [];

			tree = this.convertToTree(raw.data);
			return tree;
		}

	});

	return Labs;

});