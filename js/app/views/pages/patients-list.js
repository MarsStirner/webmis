define(["collections/patients", "views/grid", "views/filter", "views/paginator"], function (){

	App.Views.PatientsList = View.extend ({
		events: {
			"click .AddButton": "onAddButtonClick"
		},

		initialize: function () {
			this.clearAll();
			checkForErrors (this.options.path, "path is mandatory");
			//checkForErrors (this.options.params, "params is mandatory");

			this.on ("template:loaded", this.ready, this);
			this.loadTemplate ( "pages/patients-list" );
		},

		// Загрузился шаблон списка пациентов
		ready: function () {
			var view = this;

			var data = {allowCreateAppeal: Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST};

			this.$el.html( $("#patients-list-page").tmpl (data) );

			// Получим список пациентов
			var PatientsCollection = new App.Collections.Patients;
			this.collection = PatientsCollection;


			// Вставка блока с фильтрами
			var Filter = new App.Views.Filter ({
				collection: PatientsCollection,
				templateId: "#patients-list-filters",
				path: this.options.path
			});
			this.depended(Filter);

			this.$el.prepend( Filter.render().el );

			// Построим таблицу на основе списка
			var PatientsGrid = new App.Views.Grid (
			{
				collection: PatientsCollection,
				template: "grids/patients",
				gridTemplateId: "#patients-grid",
				rowTemplateId: "#patients-grid-row",
				defaultTemplateId: "#patients-grid-row-default",
				errorTemplateId: "#patients-grid-row-error",
				popUpMode: this.options.popUpMode
			});
			this.depended(PatientsGrid);

			this.$el.find(".Container").html( PatientsGrid.render().el );

			PatientsGrid.on("grid:rowClick", function (patient) {
				this.trigger("patient:selected", patient);
			}, this);

			// Пэйджинатор
			var Paginator = new App.Views.Paginator (
			{
				collection: PatientsCollection
			});
			this.depended(Paginator);
			//this.depended(view.tooltip);

			this.$el.find(".Container").append( Paginator.render().el );

			UIInitialize(this.el);

			this.$("input[name='patientCode']").on("keypress", function (event) {
				if (event.which < 48 || event.which > 57) {
					event.preventDefault();
					event.stopPropagation();
				}
			});

		},

		onAddButtonClick: function (event) {
			if (this.options.popUpMode) {
				event.preventDefault();
				this.trigger("patient:newClick");
			}
		},

		render: function () {
			return this
		}
	});


});