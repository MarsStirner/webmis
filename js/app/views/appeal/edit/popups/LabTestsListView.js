define(['text!templates/appeal/edit/popups/lab-tests-list.tmpl',
	'collections/diagnostics/LabsTests',
	'views/appeal/edit/popups/LabTestsListItemView'],
	function (labTestsListTemplate, LabsTests, LabTestsListItemView) {

		LabTestsListView = View.extend({
			template: labTestsListTemplate,

			el: 'ul',

			initialize: function () {
				var view = this;
				view.collection = new LabsTests();

				console.log('init LabTestsListView');

				pubsub.on('lab-selected', function (labCode) {

					view.render();
					view.collection.fetch({data: {'filter[code]': labCode}});

				});

				view.collection.on('reset', function () {

					view.collection.each(function (labTestModel) {

						var labTestsListItemView = new LabTestsListItemView({
							model : labTestModel//,
							//el:'li'
						});

						view.$('.lab-tests-list').append(labTestsListItemView.render().el);
						//lab-tests-list

					});

				});

//				view._listItemViews = [];
//
//				view.collection.each(function (labModel) {
//
//					view._listItemViews.push(new labsListItemView({
//						model: labModel,
//						tagName: 'li'
//					}));
//
//				});

			},


			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));

//				_(view._listItemViews).each(function (labView) {
//					view.$('.labs-list').append(labView.render().el);
//				});

			}

		});


		return LabTestsListView;

	});
