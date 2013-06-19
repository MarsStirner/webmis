//список лабораторий

define(function(require) {


	var LabTest = Model.extend();

	var LabsTests = Collection.extend({

		model: LabTest,

		url: function() {
			var path = DATA_PATH + "dir/actionTypes?filter[mnem]=LAB&filter[view]=tree";

			return path;
		},

		convert: function(list) {
			var withoutParents = [];
			 _.each(list, function(item) {

				var node = {};
				node.title = item.name;
				node.code = item.code;
				node.icon = false;
				node.cito = '';

				if (item.groups && (item.groups.length === 0)) {
					withoutParents.push(node);
				}

			});

			//console.log('withoutParents',withoutParents);

			return withoutParents;
		},

		parse: function(raw) {
			var tree = [];
			//console.log('raw',raw);

			tree = this.convert(raw.data);
			return tree;
		}

	});


	return LabsTests;

});
