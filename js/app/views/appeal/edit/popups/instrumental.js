/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/instrumental.tmpl",
	"collections/diagnostics/diagnostic-types"
], function (tmpl) {

	App.Views.InstrumentalPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close",
			"click .EventList li": "onRootTypeSelected"
		},

		initialize: function () {
			this.diagnosticTypes = new App.Collections.DiagnosticTypes({type: "inst"});
			this.diagnosticTypes.on("reset", this.onDiagnosticTypesLoaded, this);
			this.diagnosticTypes.fetch();
		},

		onDiagnosticTypesLoaded: function () {
			this.$(".EventList").empty();
			this.diagnosticTypes.each(function (dType) {
				this.$(".EventList").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			}, this);
		},

		onRootTypeSelected: function (event) {
			var selectedCode = $(event.currentTarget).data("code");
			var selectedType = this.diagnosticTypes.find(function (type) {
				return type.get("code") === selectedCode;
			});

			selectedType.subTypes = new App.Collections.DiagnosticTypes({type: "inst"});

			selectedType.subTypes.setParams({
				filter:{
					code: selectedCode
				}
			});

			this.selectedSubTypes = selectedType.subTypes;

			selectedType.subTypes.on("reset", this.onSubTypesLoaded, this);
			selectedType.subTypes.fetch();
		},

		onSubTypesLoaded: function () {
			this.$(".SelectAnalysis").empty();
			this.selectedSubTypes.each(function (dType) {
				// TODO: Исправить
				this.$(".SelectAnalysis").append("<li data-code='" + dType.get("code") + "'><label>" + dType.get("name") + "</label></li>");
			}, this);
		},

		render: function () {
			if ($(this.$el.parent()).length === 0) {
				this.$el.html($.tmpl(this.template, {}));
				$("body").append(this.el);
				$(this.el).dialog({
					autoOpen: false,
					width: "116em",
					modal: true,
					dialogClass: "webmis"
				});
				this.$("#dp").datepicker();
				this.$("a").click(function (event) {
					event.preventDefault();
				});
			}

			return this;
		},

		open: function () {
			$(".ui-dialog-titlebar").hide();
			this.$el.dialog("open");
		},

		close: function () {
			$(".ui-dialog-titlebar").show();
			this.$el.dialog("close");
		}
	});

	return App.Views.InstrumentalPopup
});