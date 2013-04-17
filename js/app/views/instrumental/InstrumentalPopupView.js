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
			"click .EventList li": "onRootTypeSelected",
			"click .SelectAnalysis li": "onSelectAnalysis",
			"click .test": "test"
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

			this.diagnosticTypes = new App.Collections.DiagnosticTypes({
				type: "inst"
			});
			this.diagnosticTypes.on("reset", this.onDiagnosticTypesLoaded, this);
			this.diagnosticTypes.fetch();

			var groups = new InstrumntalGroups();
			groups.on('reset', function(collection) {
				console.log(collection.toJSON());
			});
			groups.setParams({
				'filter[view]': 'tree'
			});

			groups.fetch()

		},

		test: function() {
			console.log(this);
			var patientId =  this.options.appeal.get('patient').get('id');
			var appealId = this.options.appeal.get('id');
			var tests = new InstrumentalResearchs(null,{appealId: appealId});
			var testTemplate= new InstrumentalResearchTemplate({},{code:'20.6.5',patientId: patientId});
			console.log('test',testTemplate);


			testTemplate.fetch().done(function() {
				testTemplate.setProperty('finance', 'value', 5)
				tests.add(testTemplate);
				console.log('fetch test', arguments, tests, testTemplate);

				tests.saveAll({success: function(raw, status){
					console.log('success saveall', arguments);
				}});

			});
		},

		onDiagnosticTypesLoaded: function() {
			this.$(".EventList").empty();
			this.diagnosticTypes.each(function(dType) {
				this.$(".EventList").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			}, this);
		},

		onRootTypeSelected: function(event) {
			var selectedCode = $(event.currentTarget).data("code");
			var selectedType = this.diagnosticTypes.find(function(type) {
				return type.get("code") == selectedCode;
			});
			console.log(selectedCode, this.diagnosticTypes, selectedType);

			selectedType.subTypes = new App.Collections.DiagnosticTypes({
				type: "inst"
			});

			selectedType.subTypes.setParams({
				filter: {
					code: selectedCode
				}
			});

			this.selectedSubTypes = selectedType.subTypes;

			selectedType.subTypes.on("reset", this.onSubTypesLoaded, this);
			selectedType.subTypes.fetch();
		},

		onSubTypesLoaded: function() {
			this.$(".SelectAnalysis").empty();
			this.selectedSubTypes.each(function(dType) {
				// TODO: Исправить
				this.$(".SelectAnalysis").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			}, this);
		},

		onSelectAnalysis: function(e) {
			var selectedCode = $(event.currentTarget).data("code");
			console.log(selectedCode, event, event.currentTarget);

		},

		render: function() {

			this.$("#dp").datepicker();
			this.$el.closest(".ui-dialog").find('.save').button("disable");

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},

		onSave: function() {
			console.log('onSave instrumental');
		}
	}).mixin([popupMixin]);

	return InstrumentalPopup;
});
