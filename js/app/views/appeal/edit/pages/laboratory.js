/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/laboratory.tmpl",
	"collections/diagnostics/laboratory-diags",
	"views/grid",
	"views/appeal/edit/popups/laboratory"
], function (template) {

	App.Views.Laboratory = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-lab-diag": "onNewDiagnosticClick"
		},

		initialize: function () {
			this.collection = new App.Collections.LaboratoryDiags;
			this.collection.appealId = this.options.appealId;

			this.grid = new App.Views.Grid({
				collection: this.collection,
				template: "grids/diagnostics",
				gridTemplateId: "#lab-diagnostic-grid",
				rowTemplateId: "#lab-diagnostic-grid-row",
				defaultTemplateId: "#lab-diagnostic-grid-default"
			});

			this.newAssignPopup = new App.Views.LaboratoryPopup;

			this.collection.on("reset", this.onCollectionLoaded, this);
			this.collection.fetch();
		},

		toggleFilters: function (event) {
			$(event.currentTarget).toggleClass("Pushed");
			this.$(".Grid thead tr" ).toggleClass("EditTh");
			this.$(".Grid .Filter").toggle();
		},

		onCollectionLoaded: function () {

		},

		render: function () {
			this.$el.empty().html($.tmpl(this.template));
			this.$("#lab-grid").html(this.grid.el);

			return this;
		},

		onNewDiagnosticClick: function () {

			this.newAssignPopup.render();
			this.newAssignPopup.open();
		}
	});

	return App.Views.Laboratory
});
