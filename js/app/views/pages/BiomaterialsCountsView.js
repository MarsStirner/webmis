define(['text!templates/pages/biomaterials-count.tmpl'], function (countTmpl) {

	var BiomaterialsCountView = View.extend({
		template: countTmpl,

		initialize: function () {

			this.collection.bind('reset', function () {
				this.render();

			}, this);

		},
		countItems: function () {
			var view = this;
			var counts = [];

			var groupedItems = _.groupBy(view.collection.models, function (model) {
				return model.get('tubeTypeName')
			});

			_.each(groupedItems, function (element, index, list) {
				var item = {};

				var first = _.first(element)
				item.name = first.get('tubeType').shortName;
				item.volume = first.get('tubeType').volume;
				item.color = first.get('tubeType').color;
				item.count = element.length;

				counts.push(item);
			});



			return counts;
		},

		render: function () {

			var view = this;

			var countItems = view.countItems();

			view.$el.html('');

			view.$el.html($.tmpl(view.template, countItems));

			return view;
		}

	});

	return BiomaterialsCountView;

});
