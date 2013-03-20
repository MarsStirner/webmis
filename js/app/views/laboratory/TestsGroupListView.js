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

					console.log('view.collection.models',view.collection.toJSON())
					view.render()

//					view.collection.each(function (testsGroup) {
//
//
//						//if(testsGroup.get('groups').length){
//
//						//}else{
//							var testsGroupView = new TestsGroupView({
//								model : testsGroup,
//								tagName:'li'
//							});
//
//							view.$('.lab-tests-list').append(testsGroupView.render().el);
//						//}
//
//
//
//					});

				});


			},


			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));

				view.$('.lab-tests-list').dynatree({
//					onActivate: function(node) {
//						// A DynaTreeNode object is passed to the activation handler
//						// Note: we also get this event, if persistence is on, and the page is reloaded.
//						alert("You activated " + node.data.title);
//					},
					children: view.collection.toJSON()
				});


			}

		});


		return TestsGroupListView;

	});
