define(['text!templates/appeal/edit/popups/labs-list.tmpl',
	'views/laboratory/LabsListItemView'],
	function (labsListTemplate, labsListItemView) {

		LabsListView = View.extend({
			template: labsListTemplate,

			initialize: function () {
				var view = this;

				view._listItemViews = [];

				view.collection.each(function (labModel) {

					view._listItemViews.push(new labsListItemView({
						model: labModel,
						tagName: 'li'
					}));

				});

			},

			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));

				_(view._listItemViews).each(function (labView) {
					view.$('.labs-list').append(labView.render().el);
				});

			}

		});


		return LabsListView;

	});
