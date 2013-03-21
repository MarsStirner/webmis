define([ 'text!templates/appeal/edit/popups/set-of-tests.tmpl',
	'models/diagnostics/SetOfTests'],
	function (setOfTestsViewTemplate, SetOfTests) {

		var SetOfTestsView = View.extend({
			template: setOfTestsViewTemplate,
			el: 'ul',
			initialize: function () {
				var view = this;

				view.collection = view.options.collection;

				view.collection.on('reset', function () {
					view.render();
				});

				pubsub.on('lab-selected group-of-tests', function (labCode) {
					view.$el.html('');
				});

				pubsub.on('load-group-tests', function (code) {
					console.log('load-group-tests')

					view.$el.html('');
					view.collection.fetch({data: {
						'patientId': view.options.patientId,
						'filter[code]': code
					}});
				});




			},


			render: function () {
				var view = this;

				view.$el.html($.tmpl(view.template));

				view.$('.lab-tests-list').dynatree({
//					onClick: function(node) {
//						// A DynaTreeNode object is passed to the activation handler
//						// Note: we also get this event, if persistence is on, and the page is reloaded.
//						//if(!node.data.children){
//						console.log("load-group-tests " + node.data.code);
//
//						pubsub.trigger('load-group-tests', node.data.code)
//						//}
//
//					},
					children: view.collection.toJSON()
				});

				//UIInitialize(this.el);
				return view;
			}

		});


		return SetOfTestsView;

	});
