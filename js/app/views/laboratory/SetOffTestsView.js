define([ 'text!templates/appeal/edit/popups/set-of-tests.tmpl',
	'models/diagnostics/SetOfTests'],
	function (setOfTestsViewTemplate, SetOfTests) {

		var SetOfTestsView = View.extend({
			template: setOfTestsViewTemplate,
			el: 'ul',
			initialize: function () {
				var view = this;

				view.collection = view.options.collection;
				view.collection.setParams({
					sortingField: "name",
					sortingMethod: "asc"
				})

				view.collection.on('reset', function () {
					view.render();
				});

				pubsub.on('lab-selected tg-parent:click', function (labCode) {
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
			loadTest: function (code, callback) {
				var view = this;

				var setOfTests = new SetOfTests({code: code, patientId: view.options.patientId});

				setOfTests.on('change', function (event,model) {
					var tree = setOfTests.getTree();

					callback(tree);
					//console.log('tree',tree)

				});
//
				setOfTests.fetch();




			},


			render: function () {
				var view = this;
				console.log('render .lab-tests-list')

				view.$el.html('<div class="lab-tests-list"></div>');

				view.$('.lab-tests-list').dynatree({
					checkbox: true,
					isLazy: true,
					fx: { height: "toggle", duration: 200 },
					autoFocus: false,
					onSelect: function (select, node) {
						var code = node.data.code;
						//console.log('select', select, node)

						if (select && code) {

							view.loadTest(code, function (tree) {

								node.addChild(tree);
								//node.expand(true);
							});
						} else {
							node.removeChildren();
						}
					},
					children: view.collection.toJSON()
				});

				//UIInitialize(this.el);
				return view;
			}

		});


		return SetOfTestsView;

	});
