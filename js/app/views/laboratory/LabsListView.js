define([],
	function () {

		LabsListView = View.extend({

			initialize: function () {
				var view = this;

				view.collection.setParams({
					sortingField: "name",
					sortingMethod: "asc"
				});

				view.collection.on('reset', function () {
					view.render();
				});


			},

			render: function () {
				var view = this;

				view.$el.html('<div class="labs-list"></div>');

				view.$('.labs-list').dynatree({
					onClick: function(node) {

						pubsub.trigger('lab-selected', node.data.code)

					},
					children: view.collection.toJSON()
				});


			}

		});


		return LabsListView;

	});
