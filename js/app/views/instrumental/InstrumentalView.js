/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/instrumental.tmpl",
	"collections/diagnostics/instrumental-diags",
	"views/instrumental/InstrumentalPopupView",
	"views/instrumental/InstrumentalEditPopupView",
	"views/grid",
	"views/paginator"], function(template, InstrumentalDiags, InstrumentalPopupView, InstrumentalEditPopupView) {

	var InstrumentalView = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click #assign-inst-diag": "onNewDiagnosticClick"
		},

		initialize: function() {
			this.collection = new InstrumentalDiags();
			this.collection.appealId = this.options.appealId;
			this.collection.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "asc"
			});

			this.grid = new App.Views.Grid({
				popUpMode: true,
				collection: this.collection,
				template: "grids/instrumental-grid",
				gridTemplateId: "#inst-diagnostic-grid",
				rowTemplateId: "#inst-diagnostic-grid-row",
				defaultTemplateId: "#inst-diagnostic-grid-default"
			});

			this.grid.on('grid:rowClick', this.onGridRowClick, this);
			this.depended(this.grid);


			this.paginator = new App.Views.Paginator({
				collection: this.collection
			});
			this.depended(this.paginator);


			this.collection.on("reset", function(collection) {
				console.log('reset collection', collection);
			}, this);


			this.collection.fetch({
				dataType: 'json',
				url: "/js/app/views/instrumental/instrumental.json"
			});


		},

		onNewDiagnosticClick: function() {
			this.newAssignPopup = new InstrumentalPopupView({
				appeal: this.options.appeal
			});
			this.newAssignPopup.render().open();
		},

		onGridRowClick: function(model, event) {
			event.preventDefault();

			if (_.indexOf(event.target.classList, 'cancel-direction') >= 0) {
				this.cancelDirection(model);
			}

			if (_.indexOf(event.target.classList, 'edit-direction') >= 0) {
				this.editDirection(model);
			}

		},

		cancelDirection: function(model) {
			console.log('cancelDirection', model);
			pubsub.trigger('noty', {text:'функционал ещё не реализован',type:'alert'});

		},

		editDirection: function(model) {
			console.log('editDirection', model);
			this.newEditPopup = new InstrumentalEditPopupView({
				appeal: this.options.appeal
			});
			this.newEditPopup.render().open();

		},

		render: function() {
			this.$el.html($.tmpl(this.template));
			this.$("#grid").html(this.grid.el);
			this.$("#grid-pager").html(this.paginator.render().el);

			this.$("#assign-inst-diag").button({
				icons: {
					primary: "icon-plus icon-color-green"
				}
			});

			this.delegateEvents();
			this.grid.delegateEvents();
			this.paginator.delegateEvents();

			return this;
		}
	});

	return InstrumentalView;
});
