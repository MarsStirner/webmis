/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/consultations.tmpl",
	"collections/diagnostics/consultations",
	"views/grid",
	"views/appeal/edit/popups/consultation"
], function (template, Consultations, Grid, NewAssignPopup) {

	App.Views.Consultation = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-consult": "onNewConsultClick"
		},

		initialize: function () {
			this.collection = new Consultations();
			this.collection.appealId = this.options.appealId;

			this.grid = new Grid({
				collection: this.collection,
				template: "grids/diagnostics",
				gridTemplateId: "#consult-diagnostic-grid",
				rowTemplateId: "#consult-diagnostic-grid-row",
				defaultTemplateId: "#consult-diagnostic-grid-default"
			});

			this.newAssignPopup = new NewAssignPopup()

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

		onNewConsultClick : function () {
			this.newAssignPopup.open();
		},

		render: function () {
			this.$el.html($.tmpl(this.template));

			if (this.grid) {
				this.$el.append(this.grid.el);
			}

			//UIInitialize(this.el);

			this.newAssignPopup.render();

			this.grid.delegateEvents();

			this.delegateEvents();

			return this;
		}
	});
});