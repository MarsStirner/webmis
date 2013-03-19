define(['text!templates/appeal/edit/popups/lab-tests-list.tmpl',
	'collections/diagnostics/LabsTests',
	'views/laboratory/TestsGroupView'],
	function (testsGroupTemplate, TestsGroups, TestsGroupView) {

        TestsGroupListView = View.extend({
			template: testsGroupTemplate,

			el: 'ul',

			initialize: function () {
				var view = this;
				view.collection = new TestsGroups();
                view.collection.setParams({
                    'filter[view]': 'tree'
                })

				console.log('init LabTestsListView');

				pubsub.on('lab-selected', function (labCode) {
					view.render();
					view.collection.fetch({data: {'filter[code]': labCode}});

				});


				view.collection.on('reset', function () {

					view.collection.each(function (testsGroup) {
						console.log('TestsGroup',testsGroup);

						if(testsGroup.get('groups').length){

						}else{
							var testsGroupView = new TestsGroupView({
								model : testsGroup,
								tagName:'li'
							});

							view.$('.lab-tests-list').append(testsGroupView.render().el);
						}



					});

				});


			},


			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));


			}

		});


		return TestsGroupListView;

	});
