/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/instrumental.tmpl",
	"views/ui/PopupView",
	"views/instrumental/InstrumentalPopupBottomFormView",
	"collections/diagnostics/diagnostic-types"], function(tmpl, PopupView, BFView) {

	var InstrumentalPopup = PopupView.extend({
		template: tmpl,
		events: {
			//"click .ShowHidePopup": "close",
			//"click .EventList li": "onRootTypeSelected"
		},

		initialize: function(options) {
			this.constructor.__super__.initialize.apply(this, options);
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

			this.bfView = new BFView({data: this.data, appeal: this.options.appeal});
			this.depended(this.bfView);

			// this.diagnosticTypes = new App.Collections.DiagnosticTypes({
			// 	type: "inst"
			// });
			//this.diagnosticTypes.on("reset", this.onDiagnosticTypesLoaded, this);
			//this.diagnosticTypes.fetch();
			//

		},

		// onDiagnosticTypesLoaded: function() {
		// 	this.$(".EventList").empty();
		// 	this.diagnosticTypes.each(function(dType) {
		// 		this.$(".EventList").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
		// 	}, this);
		// },

		// onRootTypeSelected: function(event) {
		// 	var selectedCode = $(event.currentTarget).data("code");
		// 	var selectedType = this.diagnosticTypes.find(function(type) {
		// 		return type.get("code") === selectedCode;
		// 	});

		// 	selectedType.subTypes = new App.Collections.DiagnosticTypes({
		// 		type: "inst"
		// 	});

		// 	selectedType.subTypes.setParams({
		// 		filter: {
		// 			code: selectedCode
		// 		}
		// 	});

		// 	this.selectedSubTypes = selectedType.subTypes;

		// 	selectedType.subTypes.on("reset", this.onSubTypesLoaded, this);
		// 	selectedType.subTypes.fetch();
		// },

		// onSubTypesLoaded: function() {
		// 	this.$(".SelectAnalysis").empty();
		// 	this.selectedSubTypes.each(function(dType) {
		// 		// TODO: Исправить
		// 		this.$(".SelectAnalysis").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
		// 	}, this);
		// },

		render: function() {

			this.$("#dp").datepicker();
			this.$el.closest(".ui-dialog").find('.save').button("disable");

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},

		onSave: function() {
			console.log('onSave instrumental');
		}
	});

	return InstrumentalPopup;
});
