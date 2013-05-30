/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(function(require) {


	var template = require('text!templates/appeal/edit/pages/consultations.tmpl')
	var Consultations = require('collections/diagnostics/consultations/Consultations')
	var Grid = require('views/grid')
	var NewConsultationView = require('views/consultations/NewConsultationView');
	var EditConsultationView = require('views/consultations/EditConsultationView');

	ConsultationView = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			//"click .Actions.ToggleFilters": "toggleFilters",
			"click #assign-consult": "onNewConsultClick"
		},

		initialize: function() {

			this.canAddDirection = true; //this.options.appeal.closed ? false : true;

			this.collection = new Consultations();
			this.collection.appealId = this.options.appealId;


			this.collection.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "desc"
			});

			this.collection.extra = {
				userId: Core.Cookies.get("userId")
			};

			this.grid = new Grid({
				popUpMode: true,
				collection: this.collection,
				template: "grids/consultations",
				gridTemplateId: "#consult-diagnostic-grid",
				rowTemplateId: "#consult-diagnostic-grid-row",
				defaultTemplateId: "#consult-diagnostic-grid-default"
			});

			this.grid.on('grid:rowClick', this.onGridRowClick, this);
			this.depended(this.grid);


			this.paginator = new App.Views.Paginator({
				collection: this.collection
			});
			this.depended(this.paginator);

			this.collection.fetch({
				// url: "/js/app/views/consultations/consultations.json",
				// dataType: 'json'
			});

			this.collection.on('remove', function() {
				this.collection.fetch({});
			}, this);

			pubsub.on('consultation:added', function() {
				this.collection.fetch();
			}, this);
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

		editDirection: function(model) {
			console.log('editDirection', model);
			this.editConsultationView = new EditConsultationView(_.extend(this.options, {
				title: 'Редактирование направления',
				id: model.get('id')
			}));
			//this.editConsultationView.render().open();
		},

		cancelDirection: function(model) {
			console.log('cancelDirection ', model);
			model.destroy({
				wait: true,
				success: function(model, response) {
					pubsub.trigger('noty', {
						text: 'Направлениеудалено',
						type: 'alert'
					});
					// this.collection.fetch();
				},
				error: function(x, error) {
					//console.log(arguments);

					var response = $.parseJSON(error.responseText);
					pubsub.trigger('noty', {
						text: 'Ошибка: ' + response.errorMessage,
						type: 'error'
					});
				}
			});

		},

		onNewConsultClick: function() {
			this.newConsultationView = new NewConsultationView(this.options);
			this.newConsultationView.render().open();
		},

		render: function() {
			this.$el.html($.tmpl(this.template, {
				canAddDirection: this.canAddDirection
			}));

			this.$("#assign-consult").button({
				icons: {
					primary: "icon-plus icon-color-green"
				}
			});


			this.$el.append(this.grid.el);
			this.grid.delegateEvents();
			this.delegateEvents();

			return this;
		}
	});

	return ConsultationView;
});
