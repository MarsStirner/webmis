/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/instrumental.tmpl",
	"collections/diagnostics/instrumental-diags",
	"views/grid",
	"views/appeal/edit/popups/instrumental"
], function (template) {

	App.Views.Instrumental = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-inst-diag": "onNewDiagnosticClick"
		},

		initialize: function () {
			this.collection = new App.Collections.InstrumentalDiags;
			this.collection.appealId = this.options.appealId;

			this.grid = new App.Views.Grid({
				collection: this.collection,
				template: "grids/diagnostics",
				gridTemplateId: "#inst-diagnostic-grid",
				rowTemplateId: "#inst-diagnostic-grid-row",
				defaultTemplateId: "#inst-diagnostic-grid-default"
			});

			this.newAssignPopup = new App.Views.InstrumentalPopup;

			this.collection.on("reset", this.onCollectionLoaded, this);
			this.collection.fetch();
		},

		toggleFilters: function (event) {
			$(event.currentTarget ).toggleClass("Pushed");
			this.$(".Grid thead tr" ).toggleClass("EditTh");
			this.$(".Grid .Filter" ).toggle();
		},

		onCollectionLoaded: function () {
			//this.render();
		},

		onNewDiagnosticClick: function () {
			this.newAssignPopup.open();
		},

		render: function () {
			this.$el.html($.tmpl(this.template));
			this.$el.append(this.grid.el);

			this.newAssignPopup.render();

			this.grid.delegateEvents();
			this.delegateEvents();

			return this;
		}
	});

	return App.Views.Instrumental
});