//окошко со списком лабораторий

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
				//console.log('render labs', view.collection.toJSON());

				view.$el.html('<div class="labs-list"></div>');

				view.$('.labs-list').dynatree({
					onClick: function(node) {
						pubsub.trigger('lab:click', node.data.code);
					},
					children: view.collection.toJSON()
				});
			},
			close: function(){
				pubsub.off('lab:click');
			}

		});


		return LabsCollectionView;

	});
