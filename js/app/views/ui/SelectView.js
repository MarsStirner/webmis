define([], function () {

	var SelectView = View.extend({
		initialize: function () {
			var view = this;
			view.collection = view.options.collection;
			view.collection.on("reset", view.render, view);
			view.collection.fetch();

			view.selectValue = view.options.selectText ? view.options.selectText : 'value';

		},
		render: function () {
			var view = this;

			_(view.collection.toJSON()).each(function (item) {

				view.$el.append($("<option/>", {
					"text": item[view.selectText],
					"value": item.id
				}));
			}, view);

			view.$el.select2();

		}

	});

	return SelectView;

});
