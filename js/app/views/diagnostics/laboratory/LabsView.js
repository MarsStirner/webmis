//окошко со списком лабораторий

define(function(require) {
	var template = require('text!templates/diagnostics/laboratory/labs-list-item.html');

	LabsCollectionView = View.extend({

		initialize: function() {

			this.collection.on('reset', function() {
				this.render();
			}, this);

			this.collection.on('fetch', function() {
				this.renderOnFetch();
			}, this);

		},

		renderAll: function(treeData) {
			var view = this;
			view.$el.html('<div class="labs-list tree"></div>');
			view.$labs_list = view.$('.labs-list');


			view.$labs_list
				.append(_.template(template, {
				items: treeData,
				template: template
			}))
				.on('click', 'li', function() {
				view.$labs_list.find('.clicked').removeClass('clicked');
				$(this).addClass('clicked');

				var code = $(this).data('code');
				pubsub.trigger('lab:click', code);
			})
		},
		renderNoResults: function() {
			this.$el.html('<div class="msg">Нет результатов</div>');
		},

		renderOnFetch: function () {
			this.$el.html('<div class="msg">Загрузка...</div>');
		},

		render: function() {
			var view = this;
			var treeData = view.collection.toJSON();
			if(_.isArray(treeData) && treeData.length > 0){
				view.renderAll(treeData);
			}else{
				view.renderNoResults();
			}




		},
		close: function() {
			pubsub.off('lab:click');
		}

	});


	return LabsCollectionView;


});
