define(['text!templates/pages/biomaterials-counts-table.tmpl'], function (countsTableTmpl) {

	var BiomaterialsCountView = View.extend({
		template: countsTableTmpl,

		initialize: function () {

			this.collection.bind('reset', function () {
				this.render();
			}, this);

		},
		countItems: function () {
			var view = this;
			var counts = [];
			var actions = [];

			//в модели есть actions, внутри  actions есть тип пробирки, надо сосчитать все типы пробирок...
			_.each(view.collection.models, function(model){
				actions.push(model.get('actions'));
			});
			actions = _.flatten(actions, true);

			var groupedItems = _.groupBy(actions, function (action) {
				return action.tubeType.name;
			});

			_.each(groupedItems, function (element) {
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

			if(countItems.length > 0){
				view.$el.html($.tmpl(view.template, {items: countItems}));
			}

			return view;
		}

	});

	return BiomaterialsCountView;

});
