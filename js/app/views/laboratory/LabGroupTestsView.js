//окошко с деревом лабтестов
define(['text!templates/appeal/edit/popups/set-of-tests.tmpl',
	'models/diagnostics/SetOfTests',
	'text!templates/laboratory/node-test.html'],

function(setOfTestsViewTemplate, SetOfTests, nodeTestTmpl) {

	var SetOfTestsView = View.extend({
		template: setOfTestsViewTemplate,
		el: 'ul',
		initialize: function() {
			var view = this;

			//view.collection = view.options.collection;


			view.collection.on('reset', function() {
				view.render();
			});

			pubsub.on('lab:click parent-group:click', function(labCode) {
				view.$el.html('');
			});

			pubsub.on('group:click', function(code) {
				// console.log('load-group-tests')

				view.$el.html('');
				view.collection.fetch({
					data: {
						'patientId': view.options.patientId,
						'filter[code]': code
					}
				});
			});


			view.testCollection = view.options.testCollection;


		},

		loadTest: function(code, callback) {
			var view = this;

			var setOfTests = new SetOfTests({
				code: code,
				patientId: view.options.patientId
			});

			setOfTests.on('change', function(event, model) {

				var tree = setOfTests.getTree();

				callback(tree);
				//console.log('tree',tree)

				view.testCollection.add(setOfTests.toJSON());

				// console.log('view.testCollection add', view.testCollection);
			});
			//
			setOfTests.fetch();

		},

		removeTest: function(code) {
			var view = this;

			var model = view.testCollection.filter(function(model) {
				return model.get('code') == code;
			});

			//console.log('removeTest',model)

			view.testCollection.remove(model);
			//console.log('view.testCollection remove', view.testCollection);
		},


		render: function() {
			var view = this;
			//console.log('render .lab-tests-list',view.collection.toJSON())

			view.$el.html('<table><tr><td class="title-col"></td><td class="cito-col">cito</td><td class="time-col"></td></tr></table><div class="lab-tests-list2"></div>');


			view.$('.lab-tests-list2').dynatree({
				clickFolderMode: 2,
				generateIds: true,
				noLink: true,
				checkbox: true,
				onCustomRender: function(node) {
					var html = '';

					if (node.data.noCustomRender) {
						html = _.template('<span class="title-col"><%=title%></span>', node.data);
					} else {
						html = _.template(nodeTestTmpl, node.data);
					}

					return html;
				},

				onRender: function(node, nodeSpan) {
					//console.log(node, nodeSpan)
					var $nodeSpan = $(nodeSpan);
					UIInitialize($nodeSpan);


					$nodeSpan.find(".SelectDate").datepicker("setDate", "+1");

					$nodeSpan.find(".HourPicker").mask("99:99").timepicker({
						showPeriodLabels: false
					});

					var $citoCheckbox = $nodeSpan.find("input[name='cito']");

					$citoCheckbox.on('click', function(e) {
						//.dynatree("option", "autoCollapse", true);
						node.data.cito = $citoCheckbox.prop('checked');
						if (node.data.code) {
							pubsub.trigger('test:cito:changed', node.data.code, $citoCheckbox.prop('checked'));
						}
					});
				},
				fx: {
					height: "toggle",
					duration: 200
				},
				autoFocus: false,
				onBlur: function(node) {


					setTimeout(function() {
						var $dateInput = $(node.span).find('#date' + node.data.key);
						var time = $(node.span).find('#time').val();

						var date = $.datepicker.formatDate("yy-mm-dd", $dateInput.datepicker("getDate"));
						pubsub.trigger('test:date:changed', node.data.code, date);

						//console.log('onblur',date,time, arguments);

					}, 100);


				},

				onClick: function(node, event) {
					//event.preventDefault();
					//
					//                        if(event.target.name == 'sito'){
					//                            var $checkbox = $(event.target);
					//                            //$checkbox.prop('checked',true)
					//                            console.log('checkbox', $checkbox,$checkbox.prop('checked'));
					//
					//
					//                            console.log('checkbox', $checkbox,$checkbox.prop('checked'));
					////                            $checkbox.attr('checked',!$checkbox.is(':checked')).addClass('blablabla');
					//                        }
					//
					//                        console.log('onclick',arguments);
				},

				onFocus: function() {
					// console.log('onFocus',arguments);
				},

				onSelect: function(select, node) {
					var code = node.data.code;
					//console.log('select', select, node)

					if (select && code) {
						view.loadTest(code, function(tree) {
							node.addChild(tree);
							//node.expand(true);
						});
					}

					if (!select && code) {
						view.removeTest(code);
						node.removeChildren();
					}
				},

				children: view.collection.toJSON()
			});

			//UIInitialize(this.el);
			return view;
		},
		close: function(){

			pubsub.off('lab:click parent-group:click');
			pubsub.off('group:click');
			view.collection.off();

		}

	});


	return SetOfTestsView;

});
