/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/laboratory.tmpl"
	, "views/laboratory/AddDirectionPopupView"
	, "views/laboratory/EditDirectionPopupView"
	, "models/diagnostics/labAnalysisDirection"
	, "collections/diagnostics/laboratory-diags"
	, "views/grid"

], function (template, AddDirectionPopupView, EditDirectionPopupView, labDirectionModel) {

	var Laboratory = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-lab-diag": "onNewDiagnosticClick"
		},

		initialize: function () {

			console.log('this.options', this.options)
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

			this.grid.on('grid:rowClick', this.onGridRowClick, this);

			this.depended(this.grid);


			this.addDirectionPopupView = new AddDirectionPopupView({appeal: this.options.appeal});

			//this.collection.on("reset", this.onCollectionLoaded, this);
			this.collection.fetch();
		},

		onGridRowClick: function (model, event) {
			event.preventDefault();

			if (_.indexOf(event.target.classList, 'cancel-direction') >= 0) {
				this.cancelDirection(model);
			}

			if (_.indexOf(event.target.classList, 'edit-direction') >= 0) {
				this.editDirection(model);
			}

		},

		editDirection: function (model) {
			var view = this;

			view.ld = new App.Models.LaboratoryDiag();
			view.ld.id = model.get('id');

			view.ld.on('reset', function(model){
				console.log('model',model);
				this.editDirectionPopupView = new EditDirectionPopupView({model: model});
				this.editDirectionPopupView.render().open();
			});

			view.ld.fetch();


		},

		cancelDirection: function (model) {
			var view = this;

			model.eventId = view.collection.appealId;

			model.destroy({success: function () {
				view.collection.fetch();
			}});

		},

		toggleFilters: function (event) {
			$(event.currentTarget).toggleClass("Pushed");
			this.$(".Grid thead tr").toggleClass("EditTh");
			this.$(".Grid .Filter").toggle();
		},

		onCollectionLoaded: function () {

		},

		render: function () {
			var view = this;



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
			this.addDirectionPopupView.render().open();
		}
	});

	return Laboratory;
});
