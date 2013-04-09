define([], function () {

	var SelectView = View.extend({
		initialize: function () {
			var view = this;
			view.collection = view.options.collection;
			view.collection.on("reset", view.render, view);
			view.collection.fetch();

			view.selectText = view.options.selectText ? view.options.selectText : 'value';


		},

		val: function (value) {
			var view = this;
			console.log('value',value,view.$el.select2('val'))

			if (value) {
				view.$el.select2('val', value);
			} else {
				return  view.$el.select2('val');
			}

		},
		onChange: function () {
			var view = this;

			pubsub.trigger('select:change', view.select2.val())
		},
		render: function () {
			var view = this;
			var id = view.$el.prop('id');

			_(view.collection.toJSON()).each(function (item) {

				view.$el.append($("<option/>", {
					"text": item[view.selectText],
					"value": item.id
				}));
			}, view);

			view.select2 = view.$el.select2();

			if (view.options.initSelection) {
				view.val(view.options.initSelection)
			}

			view.select2.on('change', function () {

				pubsub.trigger(id + ':change', view.select2.val());
			});

			return view;
		}

	});

	return SelectView;

});
