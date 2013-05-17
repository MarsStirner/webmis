//окошко со списком лабораторий

define(function(require) {
	var template = require('text!templates/laboratory/labs-list-item.html');

	LabsCollectionView = View.extend({

		initialize: function() {

			this.collection.on('reset', function() {
				this.render();
			}, this);

		},

		render: function() {
			var view = this;
			var treeData = view.collection.toJSON();

			view.$el.html('<div class="labs-list tree"></div>');
			view.$labs_list = view.$('.labs-list');


			view.$labs_list
			.append(_.template(template,{items:treeData, template: template}))
			.on('click','li', function(){
				view.$labs_list.find('.clicked').removeClass('clicked');
				$(this).addClass('clicked');

				var code = $(this).data('code');
				pubsub.trigger('lab:click', code);
			})

		},
		close: function() {
			pubsub.off('lab:click');
		}

	});


	return LabsCollectionView;


});
