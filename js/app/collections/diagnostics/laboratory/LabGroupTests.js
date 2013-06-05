//список лабораторий

define(function(require) {


	var LabTest = Model.extend();

	var LabsTests = Collection.extend({

		model: LabTest,

		url: function() {
			var path = DATA_PATH + "dir/actionTypes?filter[mnem]=LAB";

			return path;
		},

		convertToTree: function(list) {
			return _.map(list, function(item) {

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
		},

		parse: function(raw) {
			var tree = [];

			tree = this.convertToTree(raw.data);
			return tree;
		}

	});


	return LabsTests;

});
