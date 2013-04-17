/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/instrumental.tmpl",
	"mixins/PopupMixin",
	"views/instrumental/InstrumentalPopupBottomFormView",
	"collections/diagnostics/InstrumntalGroups",
	"collections/diagnostics/InstrumentalResearchs",
	"models/diagnostics/InstrumentalResearchTemplate",
	"collections/diagnostics/diagnostic-types"], function(
tmpl,
popupMixin,
BFView,
InstrumntalGroups,
InstrumentalResearchs,
InstrumentalResearchTemplate) {


	var InstrumentalPopup = View.extend({
		template: tmpl,
		events: {
			//"click .ShowHidePopup": "close",
			//"click .EventList li": "onRootTypeSelected",
			//"click .SelectAnalysis li": "onSelectAnalysis",
			//"click .test": "test"
		},

		initialize: function(options) {
			//this.constructor.__super__.initialize.apply(this, options);
			_.bindAll(this);

			//юзер
			this.doctor = {
				name: {
					first: Core.Cookies.get("doctorFirstName"),
					last: Core.Cookies.get("doctorLastName")
				}
			};
			this.data = {
				'doctor': this.doctor
			};

			this.bfView = new BFView({
				data: this.data,
				appeal: this.options.appeal
			});
			this.depended(this.bfView);

			// this.diagnosticTypes = new App.Collections.DiagnosticTypes({
			// 	type: "inst"
			// });
			// this.diagnosticTypes.on("reset", this.onDiagnosticTypesLoaded, this);
			// this.diagnosticTypes.fetch();



			this.groups = new InstrumntalGroups();
			// this.groups.on('reset', function(collection) {
			// 	console.log(collection.toJSON());
			// });
			this.groups.setParams({
				'filter[view]': 'tree'
			});



		},

		loadResearch: function(code) {
			console.log('loadResearch', code);
			var view = this;

			var patientId = this.options.appeal.get('patient').get('id');
			view.testTemplate = new InstrumentalResearchTemplate({}, {
				code: code,
				patientId: patientId
			});
			view.$el.closest(".ui-dialog").find('.save').button("disable");

			view.testTemplate.fetch().done(function() {
				view.$el.closest(".ui-dialog").find('.save').button("enable");
				var treeData = view.getTree(view.testTemplate);



				view.$('.SelectAnalysis').dynatree({
					generateIds: true,
					noLink: true,
					checkbox: true,
					children: treeData
				});

				if (!view.testTree) {
					view.testTree = view.$('.SelectAnalysis').dynatree("getTree");

				}
				view.testTree.reload();



			});

		},

		getTree: function(testTemplate) {

			//var tests = testTemplate.get('group')[0].attribute.concat(testTemplate.get('group')[1].attribute);

			var tests = testTemplate.get('group')[1].attribute;
			console.log('tests', tests);
			var testList = [];

			_.each(tests, function(test) {


				if (true){//test.type == "String") {

					var unselectable = false;
					var select = true;

					if (test.properties[0].value == 'false') {
						unselectable = true;
					} else {
						unselectable = false;
					}


					testList.push({
						title: test.name + ' - ' + test.type,
						icon: false,
						noCustomRender: true,
						unselectable: unselectable,
						select: select,
						onCustomRender: function(node) {
							var html = '';
							html += "<a class='dynatree-title' href='#'>";
							html += node.data.title;
							html += "</a>";

							return html;
						}
					});

				}

			});


			return testList;
		},

		onSave: function() {
			var view = this;
			var appealId = this.options.appeal.get('id');

			view.tests = new InstrumentalResearchs(null, {
				appealId: appealId
			});
			console.log('onSave instrumental');

			view.testTemplate.setProperty('finance', 'value', 5);
			view.tests.add(view.testTemplate);
			console.log('fetch test', arguments, view.tests, view.testTemplate);

			view.tests.saveAll({
				success: function(raw, status) {
					console.log('success saveall', arguments);
					view.close();
					pubsub.trigger('instrumental-diagnostic:added');
				}
			});


		},

		// test: function() {
		// 	console.log(this);
		// 	var patientId = this.options.appeal.get('patient').get('id');
		// 	var appealId = this.options.appeal.get('id');
		// 	var tests = new InstrumentalResearchs(null, {
		// 		appealId: appealId
		// 	});
		// 	var testTemplate = new InstrumentalResearchTemplate({}, {
		// 		code: '20.6.5',
		// 		patientId: patientId
		// 	});
		// 	console.log('test', testTemplate);


		// 	testTemplate.fetch().done(function() {
		// 		testTemplate.setProperty('finance', 'value', 5)
		// 		tests.add(testTemplate);
		// 		console.log('fetch test', arguments, tests, testTemplate);

		// 		tests.saveAll({
		// 			success: function(raw, status) {
		// 				console.log('success saveall', arguments);
		// 			}
		// 		});

		// 	});
		// },

		onDiagnosticTypesLoaded: function() {
			// this.$(".EventList").empty();
			// this.diagnosticTypes.each(function(dType) {
			// 	this.$(".EventList").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			// }, this);
		},

		onRootTypeSelected: function(event) {
			// var selectedCode = $(event.currentTarget).data("code");
			// var selectedType = this.diagnosticTypes.find(function(type) {
			// 	return type.get("code") == selectedCode;
			// });
			// console.log(selectedCode, this.diagnosticTypes, selectedType);

			// selectedType.subTypes = new App.Collections.DiagnosticTypes({
			// 	type: "inst"
			// });

			// selectedType.subTypes.setParams({
			// 	filter: {
			// 		code: selectedCode
			// 	}
			// });

			// this.selectedSubTypes = selectedType.subTypes;

			// selectedType.subTypes.on("reset", this.onSubTypesLoaded, this);
			// selectedType.subTypes.fetch();
		},

		onSubTypesLoaded: function() {
			// this.$(".SelectAnalysis").empty();
			// this.selectedSubTypes.each(function(dType) {
			// 	// TODO: Исправить
			// 	this.$(".SelectAnalysis").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			// }, this);
		},

		onSelectAnalysis: function(e) {
			// var selectedCode = $(event.currentTarget).data("code");
			// console.log(selectedCode, event, event.currentTarget);

		},

		render: function() {
			var view = this;


			view.groups.fetch().done(function() {
				view.$('.EventList').dynatree({
					onClick: function(node) {
						if (node.data.children && node.data.children.length > 0) {
							//console.log("группа" + node.data.code);
							//pubsub.trigger('group:click', node.data.code);
						} else {
							view.loadResearch(node.data.code);
							//console.log("исследование " + node.data.code);
							//pubsub.trigger('parent-group:click');
						}

					},
					children: view.groups.toJSON()
				});

			});

			this.$("#dp").datepicker();
			this.$el.closest(".ui-dialog").find('.save').button("disable");

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		}

	}).mixin([popupMixin]);

	return InstrumentalPopup;
});
