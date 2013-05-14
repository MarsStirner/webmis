/**
 * User: FKurilov
 * Date: 08.06.12
 */

//страница со списком назначенных лабораторных исследований
define([
	"text!templates/appeal/edit/pages/laboratory.tmpl",
	"views/laboratory/AddDirectionPopupView",
	"views/laboratory/EditDirectionPopupView",
	"models/diagnostics/laboratory-diag-form",
	"collections/diagnostics/laboratory-diags",
	"views/grid"],
	function (template, AddDirectionPopupView, EditDirectionPopupView, laboratoryDiagsForm) {

	var Laboratory = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-lab-diag": "onNewDiagnosticClick"
		},

		initialize: function (options) {
			var view = this;


			view.canAddDirection = view.options.appeal.closed ? false : true;


			console.log('can addd', view.options.appeal.closed,view.canAddDiagnostic,view.options.appeal);

			this.collection = new App.Collections.LaboratoryDiags();
			this.collection.appealId = this.options.appealId;
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
				template: "grids/laboratory",
				gridTemplateId: "#lab-diagnostic-grid",
				rowTemplateId: "#lab-diagnostic-grid-row",
				defaultTemplateId: "#lab-diagnostic-grid-default"
			});

			this.grid.on('grid:rowClick', this.onGridRowClick, this);
			this.grid.on('grid:rowDbClick', this.onGridRowDbClick, this);

			this.depended(this.grid);


			///this.addDirectionPopupView = new AddDirectionPopupView({appeal: this.options.appeal});

			pubsub.on('lab-diagnostic:added', function () {
				view.collection.fetch();
			});

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
		onGridRowDbClick: function(model, event){
			console.log('onGridRowDbClick', arguments, this, this.options.mainView);
			this.trigger("change:viewState", {type: "diagnostics-laboratory-result", options: {modelId: model.get('id')}});


		},

		editDirection: function (model) {
			var view = this;

			view.ldf = new laboratoryDiagsForm();
			view.ldf.id = model.get('id');
			view.ldf.eventId = view.collection.appealId;

			view.ldf.fetch({success: function (model) {

				console.log('model.eventId', model.eventId);

				view.editDirectionPopupView = new EditDirectionPopupView({
					title: 'Редактирование направления',
					model: model,
					appeal: view.options.appeal});
				view.editDirectionPopupView.render().open();
			}});


		},

		cancelDirection: function (model) {
			var view = this;

			model.eventId = view.collection.appealId;

			var id = model.get('id');

			model.destroy({success: function () {
				pubsub.trigger('noty', {text: 'Направление удалено', type: 'alert'});
				view.collection.fetch();
				//console.log('cancelDirection success',arguments)
			}, error: function (x, error) {

				var response = $.parseJSON(x.responseText);
				pubsub.trigger('noty', {text: 'Ошибка: ' + response.exception+', errorCode: '+response.errorCode+', id:' + id, type: 'error'});
				//console.log('cancelDirection error',responce.responseText,arguments)
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


			view.$el.empty().html($.tmpl(view.template,{canAddDirection:view.canAddDirection}));
			view.$("#grid").html(view.grid.el);

			view.$("#assign-lab-diag").button({icons: {primary: "icon-plus icon-color-green"}});
			view.$(".ToggleFilters").button({icons: {primary: "icon-filter"}});


			console.log('view.collection',view.collection);

			view.paginator = new App.Views.Paginator({
				collection: view.collection
			});
			view.depended(view.paginator);

			view.$("#grid-pager").html(view.paginator.render().el);

			view.delegateEvents();
			view.grid.delegateEvents();
			view.paginator.delegateEvents();

			return view;
		},

		onNewDiagnosticClick: function () {

			this.addDirectionPopupView = new AddDirectionPopupView({appeal: this.options.appeal});
			this.addDirectionPopupView.render().open();
		}
	});

	return Laboratory;
});
