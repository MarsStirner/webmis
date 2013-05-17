//окошко с деревом лабтестов
define(function(require) {

	var setOfTestsViewTemplate = require('text!templates/appeal/edit/popups/set-of-tests.tmpl');
	var SetOfTests = require('models/diagnostics/SetOfTests');
	var nodeTestTmpl = require('text!templates/laboratory/node-test.html');
	var template = require('text!templates/laboratory/test-list-item.html')

	var SetOfTestsView = View.extend({
		template: setOfTestsViewTemplate,
		el: 'ul',
		initialize: function() {
			var view = this;

			view.collection.on('reset', function() {
				view.render();
			});

			pubsub.on('lab:click group:parent:click group:click', function() {
				view.$el.html('');
			});

			pubsub.on('group:click', function(code) {
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

			view.testCollection.remove(model);

		},

		collectionData: function() {
			var data = this.collection.map(function(model) {
				return _.extend(model.toJSON(), {
					cid: model.cid
				});
			}, this);

			return data;
		},


		render: function() {
			var view = this;
			var testsListJson = view.collectionData();

			view.$el.html('<div class="list"></div>');
			view.$tests_list = view.$('.list');

			view.$tests_list.append(_.template(template, {
				items: testsListJson,
				template: template
			}));

			view.$tests_list.find(".select_date").each(function(index, item){
				$(item).datepicker();
				$(item).datepicker("setDate", "+1");
			})

			view.$tests_list.find(".select_time").mask("99:99").timepicker({
				showPeriodLabels: false
			});

						// 		if (select && code) {
			// 			view.loadTest(code, function(tree) {
			// 				node.addChild(tree);
			// 				//node.expand(true);
			// 			});
			// 		}

			// 		if (!select && code) {
			// 			view.removeTest(code);
			// 			node.removeChildren();
			// 		}

			$.contextMenu({
				autoHide: true,
				selector: '.context-menu',
				callback: function(key, options) {
					//var m = "clicked: " + key + " " + options.$trigger.data("cid");

					console.log(arguments, options.$trigger.data("cid"));
				},
				items: {
					"edit": {
						name: "Выбрать все"
					}
				}
			});
			//console.log('render .lab-tests-list',view.collection.toJSON())

			//view.$el.html('<table><tr><td class="title-col"></td><td class="cito-col">cito</td><td class="time-col"></td></tr></table><div class="lab-tests-list2"></div>');


			// view.$('.lab-tests-list2').dynatree({
			// 	clickFolderMode: 2,
			// 	generateIds: true,
			// 	noLink: true,
			// 	checkbox: true,
			// 	onCustomRender: function(node) {
			// 		var html = '';

			// 		if (node.data.noCustomRender) {
			// 			html = _.template('<span class="title-col"><%=title%></span>', node.data);
			// 		} else {
			// 			html = _.template(nodeTestTmpl, node.data);
			// 		}

			// 		return html;
			// 	},

			// 	onRender: function(node, nodeSpan) {
			// 		//console.log(node, nodeSpan)
			// 		var $nodeSpan = $(nodeSpan);
			// 		UIInitialize($nodeSpan);


			// 		$nodeSpan.find(".SelectDate").datepicker("setDate", "+1");

			// 		$nodeSpan.find(".HourPicker").mask("99:99").timepicker({
			// 			showPeriodLabels: false
			// 		});

			// 		var $citoCheckbox = $nodeSpan.find("input[name='cito']");

			// 		$citoCheckbox.on('click', function(e) {
			// 			//.dynatree("option", "autoCollapse", true);
			// 			node.data.cito = $citoCheckbox.prop('checked');
			// 			if (node.data.code) {
			// 				pubsub.trigger('test:cito:changed', node.data.code, $citoCheckbox.prop('checked'));
			// 			}
			// 		});
			// 	},
			// 	fx: {
			// 		height: "toggle",
			// 		duration: 200
			// 	},
			// 	autoFocus: false,
			// 	onBlur: function(node) {


			// 		setTimeout(function() {
			// 			var $dateInput = $(node.span).find('#date' + node.data.key);
			// 			var time = $(node.span).find('#time').val();

			// 			var date = $.datepicker.formatDate("yy-mm-dd", $dateInput.datepicker("getDate"));
			// 			pubsub.trigger('test:date:changed', node.data.code, date);

			// 			//console.log('onblur',date,time, arguments);

			// 		}, 100);


			// 	},

			// 	onFocus: function() {
			// 		// console.log('onFocus',arguments);
			// 	},

			// 	onSelect: function(select, node) {
			// 		var code = node.data.code;
			// 		//console.log('select', select, node)

			// 		if (select && code) {
			// 			view.loadTest(code, function(tree) {
			// 				node.addChild(tree);
			// 				//node.expand(true);
			// 			});
			// 		}

			// 		if (!select && code) {
			// 			view.removeTest(code);
			// 			node.removeChildren();
			// 		}
			// 	},

			// 	children: view.collection.toJSON()
			// });

			//UIInitialize(this.el);
			return view;
		},
		close: function() {

			pubsub.off('lab:click group:parent:click group:click');
			this.collection.off();

		}

	});


	return SetOfTestsView;

});
