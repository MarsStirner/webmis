//окошко с деревом групп лабораторных исследований
define(function(require) {
	var template = require('text!templates/laboratory/labs-list-item.html');

	var GroupOfTestsListView = View.extend({
		initialize: function() {
			var view = this;

			pubsub.on('lab:click', function(labCode) {
				view.$el.html('');
				view.collection.fetch({
					data: {
						'filter[code]': labCode
					}
				});

			});

			view.collection.on('reset', function() {
				view.render();
			});

		},


		render: function() {
			var view = this;
			var treeData = view.collection.toJSON();

			view.$el.html('<div class="tree"></div>');
			view.$groups_list = view.$('.tree');

			view.$groups_list.append(_.template(template, {
				items: treeData,
				template: template
			})).on('click', 'li', function(event) {
				event.stopPropagation();
				var $this = $(this);
				var code = $this.data('code');

				$this.siblings().removeClass('open').addClass('closed');
				$this.toggleClass('open').toggleClass('closed').addClass('clicked');

				view.$groups_list.find('.clicked').removeClass('clicked');
				$this.addClass('clicked');

				if($this.hasClass('parent')){
					pubsub.trigger('group:parent:click');
				}else{
					pubsub.trigger('group:click', code);
				}

				var code = $(this).data('code');
				console.log('code', code, treeData);
			});

			return this;
		},
		close: function() {
			pubsub.off('group:click');
			pubsub.off('group:parent:click');
			this.collection.off();
		}

	});


	return GroupOfTestsListView;

});
