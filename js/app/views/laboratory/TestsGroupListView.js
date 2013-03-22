define(['text!templates/appeal/edit/popups/lab-tests-list.tmpl',
	'collections/diagnostics/LabsTestsGroups'],
	function (testsGroupTemplate, GroupsOfTests) {

		var GroupOfTestsListView = View.extend({
			template: testsGroupTemplate,

			el: 'ul',

			initialize: function () {
				var view = this;
				view.collection = new GroupsOfTests();

				view.collection.setParams({
					'filter[view]': 'tree',
					sortingField: "name",
					sortingMethod: "asc"
				})

				//	console.log('init LabTestsListView');

				pubsub.on('lab-selected', function (labCode) {
					view.$el.html('');
					view.collection.fetch({data: {'filter[code]': labCode}});

				});


				view.collection.on('reset', function () {
					view.render();
				});


			},


			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));

				view.$('.lab-tests-list').dynatree({
					onClick: function (node) {
						// A DynaTreeNode object is passed to the activation handler
						// Note: we also get this event, if persistence is on, and the page is reloaded.
						if (!node.data.children.length) {
							console.log("load-group-tests " + node.data.code);

							pubsub.trigger('load-group-tests', node.data.code)
						} else {
							pubsub.trigger('tg-parent:click')
						}

					},
					children: view.collection.toJSON()
				});


			}

		});


		return GroupOfTestsListView;

	});
