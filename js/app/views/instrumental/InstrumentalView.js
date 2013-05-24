/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/pages/instrumental.tmpl",
	"collections/diagnostics/InstrumentalResearchs",
	"models/diagnostics/InstrumentalResearch",
	"views/instrumental/InstrumentalPopupView",
	"views/instrumental/InstrumentalEditPopupView",
	"views/grid",
	"views/paginator"],

function(template,
InstrumentalResearchs,
InstrumentalResearch,
InstrumentalPopupView,
InstrumentalEditPopupView) {

	var InstrumentalView = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click #assign-inst-diag": "onNewDiagnosticClick"
		},

		initialize: function(options) {
			console.log('view', options);
			this.collection = new InstrumentalResearchs([], {
				appealId: options.appealId
			});

			this.collection.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "desc"
			});

			this.collection.extra = {
				doctorId: (options.appeal.get('execPerson')).id,
				userId: Core.Cookies.get("userId")
			};

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


			//this.collection.on("reset", function(collection) {
			//	console.log('reset collection', collection);
			//}, this);


			this.collection.fetch({});

			pubsub.on('instrumental-diagnostic:added', function() {
				this.collection.fetch();
			}, this);



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
			var self = this;
			model.destroy({
				success: function(model, response) {
					if (response === true) {
						self.collection.trigger('reset');
						pubsub.trigger('noty', {
							text: 'Направление удалено'
						});
					} else {
						console.log('cancelDirection error', arguments);
					}
				},
				error: function() {
					console.log('cancelDirection error', arguments);
				}
			});


		},

		editDirection: function(model) {
			var self = this;

			var testId = model.get('id');
			var test = new InstrumentalResearch({
				"id": testId
			}, {
				appealId: this.options.appealId
			});

			test.fetch({
				success: function() {
					console.log('editDirection success', arguments);
					this.newEditPopup = new InstrumentalEditPopupView({
						appeal: self.options.appeal,
						model: test
					});
					this.newEditPopup.render().open();
				},
				error: function() {
					console.log('editDirection error', arguments);
				}
			});

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
		},

		cleanUp: function() {
			this.collection.off(null, null, this);

		}
	});

	return InstrumentalView;
});
