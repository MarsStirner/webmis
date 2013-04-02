define([],
	function () {

		LabsCollectionView = View.extend({

			initialize: function () {

				this.collection.on('reset', function () {
					this.render();
				},this);

			},

			render: function () {
				var view = this;

				view.$el.html('<div class="labs-list"></div>');

				view.$('.labs-list').dynatree({
					onClick: function(node) {
						pubsub.trigger('lab:selected', node.data.code);
					},
					children: view.collection.toJSON()
				});

			}

		});


		return LabsCollectionView;

	});
