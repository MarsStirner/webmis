/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/laboratory.tmpl",
	"models/diagnostics/labAnalysisDirection",
	"collections/diagnostics/laboratory-diags",
	"views/grid",
	"views/appeal/edit/popups/laboratory"
], function (template,labAnalysisDirection) {

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
			this.collection.setParams({
				sortingField: "directionDate",
				sortingMethod: "desc"
			});

			this.grid = new App.Views.Grid({
				popUpMode: true,
				collection: this.collection,
				template: "grids/diagnostics",
				gridTemplateId: "#lab-diagnostic-grid",
				rowTemplateId: "#lab-diagnostic-grid-row",
				defaultTemplateId: "#lab-diagnostic-grid-default"
			});

			this.depended(this.grid);


			this.newAssignPopup = new App.Views.LaboratoryPopup;

			this.collection.on("reset", this.onCollectionLoaded, this);
			this.collection.fetch();
		},
		onGridRowClick: function (model,event){
			console.log('grid click',model)
			event.preventDefault();

			if (_.indexOf(event.target.classList, 'cancel-direction') >= 0) {
				this.cancelAnalysisDirection(model);
			}
			if (_.indexOf(event.target.classList, 'bed-registration') >= 0) {
				//this.newHospitalBed(move);
			}
		},

		cancelAnalysisDirection: function(model){
			var id = model.get('id');
			var direction = new labAnalysisDirection();
			direction._id = id;
			direction.eventId = 62577;
			direction.fetch({success: function(model, response) {
				direction.destroy({success: function(model, response) {
					console.log('destroy',response);
				}});
			}});
			console.log('direction',direction)
			console.log('cancelAnalysisDirection',model)

		},

		toggleFilters: function (event) {
			$(event.currentTarget).toggleClass("Pushed");
			this.$(".Grid thead tr" ).toggleClass("EditTh");
			this.$(".Grid .Filter").toggle();
		},

		onCollectionLoaded: function () {

		},

		render: function () {
			var view = this;

			this.grid.on('grid:rowClick', this.onGridRowClick, this);

			view.$el.empty().html($.tmpl(view.template));
			view.$("#lab-grid").html(view.grid.el);

			view.paginator = new App.Views.Paginator({
				collection: view.collection
			});
			view.depended(view.paginator);

			view.$el.append(view.paginator.render().el);

			view.delegateEvents();
			view.grid.delegateEvents();
			view.paginator.delegateEvents();

			return view;
		},

		onNewDiagnosticClick: function () {

			this.newAssignPopup.render();
			this.newAssignPopup.open();
		}
	});

	return App.Views.Laboratory
});
