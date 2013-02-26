define([
	"collections/appeals",
	"collections/doctors",
	"collections/departments",
	"views/grid",
	"views/filter",
	"views/filter-dictionaries",
	"views/paginator",
	"collections/department-patients",
	"views/appeal/edit/popups/send-to-department",
	"models/print/form007",
	"views/print"
], function () {
	App.Views.AppealsList = View.extend({
		id: "main",

		initialize: function () {
			this.clearAll();

			this.on("template:loaded", this.ready, this);
			this.loadTemplate("pages/appeals-list");
		},

		events: {
			"click .Actions.Decrease": "decreaseDate",
			"click .Actions.Increase": "increaseDate",
			"click .Actions.ToggleFilters": "toggleFilters"
		},

		increaseDate: function (event) {
			event.preventDefault();

			this.setDate(1);
		},

		decreaseDate: function (event) {
			event.preventDefault();

			this.setDate(-1);
		},

		setDate: function (increment) {
			increment = increment || 0;

			var $startDateTime = this.$("#appeal-start-date");
			var $endDateTime = this.$("#appeal-end-date");

			/*var date = new Date;

			 var startDayDifference = 1;
			 var endDayDifference = 0;

			 if ( $startDateTime.length > 0 && $endDateTime.length > 0 && $startDateTime.datepicker("getDate") && $endDateTime.datepicker("getDate") ) {
			 var startDifference = Core.Date.differenceBetweenDates( date, $startDateTime.datepicker("getDate" ) );
			 var endDifference = Core.Date.differenceBetweenDates( date, $endDateTime.datepicker("getDate") );

			 startDayDifference = Math.floor(startDifference.difference / (1000*60*60*24));
			 endDayDifference = Math.floor(endDifference.difference / (1000*60*60*24));
			 }

			 var startDays = - startDayDifference + increment,
			 endDays = - endDayDifference + increment;*/

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");

			if (_.isDate(startDate)) startDate.setDate(startDate.getDate() + increment);
			if (_.isDate(endDate)) endDate.setDate(endDate.getDate() + increment);

			$startDateTime.datepicker("setDate", startDate);
			$endDateTime.datepicker("setDate", endDate);

			this.collection.setParams({page: 1});

			this.$("#appeal-start-date").change();
			//this.$("#appeal-end-date").change();
		},

		toggleFilters: function (event) {
			$(event.currentTarget).toggleClass("Pushed");
			this.$(".Grid thead tr").toggleClass("EditTh");
			this.$(".Grid .Filter").toggle();
		},
		//Новое мероприятие/направление или перевод в отделение
		newSendToDepartment: function (appeal) {
			console.log('newSendToDepartment');
			var sendPopUp = new App.Views.SendToDepartment({
				appealId: appeal.get("id"),
				clientId: appeal.get("patient").get("id"),
				moveDatetime: appeal.get("createDatetime"),
				popupTitle: "Направление в отделение"
			}).render().open();

			sendPopUp.on("closed", function () {
				this.collection.fetch();
			}, this);
		},
		newHospitalBed: function (appealId) {
			this.trigger("change:viewState", {type: 'hospitalbed', options: {}});
			App.Router.updateUrl("appeals/" + appealId + "/hospitalbed/");
		},

		ready: function () {
			var view = this;

			this.$el.html($("#appeals-list-page").tmpl());

			var Collection;
			this.collection = Collection;

			var Filter;
			var AppealsGrid;

			this.separateRoles(ROLES.DOCTOR_RECEPTIONIST, function () {
				Collection = new App.Collections.Appeals;

				Filter = new App.Views.Filter({
					collection: Collection,
					templateId: "#appeals-list-filters-reception",
					path: this.options.path
				});

				AppealsGrid = new App.Views.Grid({
					collection: Collection,
					template: "grids/appeals",
					gridTemplateId: "#appeals-grid-doctor",
					rowTemplateId: "#appeals-grid-doctor-row",
					defaultTemplateId: "#appeals-grid-row-default"
				});

			}, this);

			this.separateRoles(ROLES.NURSE_RECEPTIONIST, function () {
				Collection = new App.Collections.Appeals;

				/*	Filter = new App.Views.Filter(
				 {
				 collection: Collection,
				 templateId: "#appeals-list-filters-reception",
				 path: this.options.path
				 });*/

				var DepCollection = new App.Collections.Departments();
				Collection.on("reset", function resetHandler() {
					Collection.off("reset", resetHandler);

					DepCollection.fetch();
				});

				Filter = new App.Views.FilterDictionaries({
					collection: Collection,
					templateId: "#appeals-list-filters-reception",
					path: this.options.path,
					dictionaries: {
						departments: {
							collection: DepCollection,
							elementId: "deps-dictionary",
							getText: function (model) {
								return model.get("name");
							},
							getValue: function (model) {
								return model.get("id");
							}
						}
					}
				});

				AppealsGrid = new App.Views.Grid({
					collection: Collection,
					popUpMode: true,
					template: "grids/appeals",
					gridTemplateId: "#appeals-grid-nurse",
					rowTemplateId: "#appeals-grid-nurse-row",
					defaultTemplateId: "#appeals-grid-row-default"
				});

				AppealsGrid.on('grid:rowClick', function (model, event) {
					if (event.target.localName != 'a') {
						App.Router.navigate('/appeals/' + model.get('id') + '/', {trigger: true});
					} else {
						view.newSendToDepartment(model);
					}
				});

			}, this);

			this.separateRoles(ROLES.DOCTOR_DEPARTMENT, function () {
				Collection = new App.Collections.DepartmentPatients({role: "doctor"});
				Collection.reset();

				var DocCollection = new App.Collections.Doctors();
				var DepCollection = new App.Collections.Departments();

				Filter = new App.Views.FilterDictionaries({
					collection: Collection,
					templateId: "#appeals-list-filters-doctor-department",
					path: this.options.path,
					dictionaries: {
						doctors: {
							collection: DocCollection,
							elementId: "docs-dictionary",
							getText: function (model) {
								return model.get("name").get("raw");
							},
							getValue: function (model) {
								return model.get("id");
							}
						},
						departments: {
							collection: DepCollection,
							elementId: "deps-dictionary",
							getText: function (model) {
								return model.get("name");
							},
							getValue: function (model) {
								return model.get("id");
							}
						}
					}
				});

				AppealsGrid = new App.Views.Grid({
					collection: Collection,
					template: "grids/appeals",
					gridTemplateId: "#appeals-grid-doctor-department",
					rowTemplateId: "#appeals-grid-doctor-department-row",
					defaultTemplateId: "#appeals-grid-row-default"
				});
			}, this);

			this.separateRoles(ROLES.NURSE_DEPARTMENT, function () {
				Collection = new App.Collections.DepartmentPatients({role: "nurse"});
				/*Collection.setParams({'filter[date]':1334300400000})*/
				Collection.reset();

				Filter = new App.Views.Filter({
					collection: Collection,
					templateId: "#appeals-list-filters-nurse-department",
					path: this.options.path
				});

				AppealsGrid = new App.Views.Grid({
					collection: Collection,
					popUpMode: true,
					template: "grids/appeals",
					gridTemplateId: "#appeals-grid-nurse-department",
					rowTemplateId: "#appeals-grid-nurse-department-row",
					defaultTemplateId: "#appeals-grid-row-default"
				});

				AppealsGrid.on('grid:rowClick', function (model, event) {
					var target = $(event.target);

					if (target.hasClass('bed-registration')) {
						console.log(model);
						console.log('bed-registration', model.get('id'));
						view.newHospitalBed(model.get('id'));
					} else {
						App.Router.navigate('/appeals/' + model.get('id') + '/', {trigger: true});
					}

				});


			}, this);

			this.collection = Collection;

			this.depended(Filter);

			this.$el.prepend(Filter.render().el);

			this.depended(AppealsGrid);

			this.$el.find(".Container").html(AppealsGrid.render().el);


			// Пэйджинатор
			var Paginator = new App.Views.Paginator({
				collection: Collection
			});
			this.depended(Paginator);

			this.$el.find(".Container").append(Paginator.render().el);

			UIInitialize(this.el);

			var now = new Date();
			var startDate = new Date();
			var endDate = new Date();

			if (now.getHours() >= 0 && now.getHours() < 8) {
				startDate.setDate(startDate.getDate() - 1);
			}

			endDate.setDate(startDate.getDate() + 1);

			this.$("#appeal-start-date").datepicker("setDate", startDate);
			this.$("#appeal-end-date").datepicker("setDate", endDate);

			this.setDate();
		}
	});
});
