define([
	"collections/patient-appeals",
	"models/patient",
	"views/breadcrumbs",
	"views/grid",
	"views/paginator"
], function () {
	App.Views.PatientAppeals = View.extend({
		events: {
			"click .NewAppeal": "onNewAppealClick"
		},

		collection: App.Collections.Appeals,

		initialize: function () {
			this.on("template:loaded", this.ready, this);
			this.loadTemplate("pages/patient-appeals");
		},

		onNewAppealClick: function (event) {
			var self = this;

			if (this.haveUnclosedAppeals) {
				event.preventDefault();
				//alert("Создание госпитализации невозможно, имеется незакрытая история болезни.");
				var notClosedAlert = $("<div>" +
					"<span style='font-size: 1.2em'>Имеется незакрытая история болезни.</span></div>").dialog({
						modal: true,
						resizable: false,
						dialogClass: "webmis",
						width: '50em',
						buttons: {
							"Игнорировать": function () {
								App.Router.navigate("patients/" + self.model.get("id") + "/appeals/new/", {trigger: true});
								//App.Router.navigate("patients/" + self.model.get("id") + "/appeals/new/?ignored=true", {trigger: true});
								$(this).dialog("close");
							},
							"Отмена": function () {
								$(this).dialog("close");
							}
						},
						title: "Новая госпитализация"
					});
				notClosedAlert.dialog("open");
			}
		},

		ready: function () {
			var view = this;

			var Patient = new App.Models.Patient({
				id: this.options.id
			});

			view.model = Patient;

			Patient.fetch({
				success: function () {
					window.document.title = view.model.get("name").get("raw");
					var data = Patient.toJSON();

					data.allowCreateAppeal = Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST;

					view.$el.html($("#patient-appeals").tmpl(data));

					var Breadcrumbs = new App.Views.Breadcrumbs;
					this.$("#page-head").append(Breadcrumbs.render().el);

					Breadcrumbs.on("template:loaded", function () {
						Breadcrumbs.setStructure([
							App.Router.cachedBreadcrumbs.PATIENTS,
							App.Router.compile(App.Router.cachedBreadcrumbs.PATIENT, Patient.toJSON())
						]);
					});

					var patientAppeals = new App.Collections.PatientAppeals;
					patientAppeals.patient = Patient;
					patientAppeals.setParams({
						sortingField: "number",
						sortingMethod: "desc"
					});

					var AppealsGrid = new App.Views.Grid({
						collection: patientAppeals,
						template: "grids/appeals",
						gridTemplateId: "#patient-appeals-grid",
						rowTemplateId: "#patient-appeals-grid-row"
					});
					patientAppeals.fetch();
					patientAppeals.on("reset", function () {
						view.haveUnclosedAppeals = Boolean(patientAppeals.find(function (a) {
							return !a.get("rangeAppealDateTime").get("end");
						}));
					});

					view.depended(AppealsGrid);

					view.$el.find(".ContentHolder").append(AppealsGrid.render().el);


					// Пэйджинатор
					var Paginator = new App.Views.Paginator({
						collection: patientAppeals
					});

					view.$el.find(".ContentHolder").append(Paginator.render().el);

					this.$(".NewAppeal").button({icons: {primary: "icon-plus icon-color-green"}});
				}
			});
		}
	});
});