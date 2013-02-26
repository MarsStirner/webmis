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

			var actions = [];

			_.each(view.collection.models, function(model){
				console.log('each',model)
				actions.push(model.get('actions'));
			});

			actions = _.flatten(actions, true);
			var groupedItems = _.groupBy(actions, function (action) {
				console.log('action',action.tubeType.name)
				return action.tubeType.name;
			});

			console.log('actions', actions)
			console.log('groupedItems',groupedItems)

			_.each(groupedItems, function (element, index, list) {
				var item = {};

				var first = _.first(element)
				item.name = first.tubeType.name;
				item.volume = first.tubeType.volume;
				item.color = first.tubeType.color;
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
