//окошко с деревом групп лабораторных исследований
define(['text!templates/appeal/edit/popups/lab-tests-list.tmpl'],
	function (testsGroupTemplate) {

		var GroupOfTestsListView = View.extend({
			template: testsGroupTemplate,

			el: 'ul',

			initialize: function () {
				var view = this;
				//	console.log('init LabTestsListView');

				pubsub.on('lab:click', function (labCode) {
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

							pubsub.trigger('group:click', node.data.code);
						} else {
							pubsub.trigger('parent-group:click');
						}

					},
					children: view.collection.toJSON()
				});


			}

		});


		return GroupOfTestsListView;

	});
