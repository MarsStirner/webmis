define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/pages/BiomaterialsCountsView',
  'collections/dictionary-values',
  'collections/departments'], function (biomaterialsTemplate, BiomaterialsCollection, GridView, CountView) {

	var BiomaterialsView = View.extend({
		///className: "ContentHolder",
		template: biomaterialsTemplate,
		events: {
			"click .Actions.Decrease": "decreaseDate",
			"click .Actions.Increase": "increaseDate"
		},

		initialize: function () {
			var view = this;

			var biomaterialsCollection = new BiomaterialsCollection;
			this.collection = biomaterialsCollection;

			this.grid = new GridView({
				collection: this.collection,
				template: "grids/biomaterials",
				gridTemplateId: "#biomaterials-grid",
				rowTemplateId: "#biomaterials-grid-row",
				defaultTemplateId: "#biomaterials-grid-row-default",
				errorTemplateId: "#biomaterials-grid-row-error"
			});
			this.depended(this.grid);

			this.counts = new CountView({ collection: this.collection});

//			this.collection.once('reset', function(){
//				console.log('reset', view.collection);
//			});

			this.collection.fetch();

			//Получаем список типов биоматериалов
			this.tissues = new App.Collections.DictionaryValues("", {
				name: "tissueTypes"
			});
			this.tissues.on("reset", this.onTissuesLoaded, this);
			this.tissues.fetch();


			//Получаем список отделений
			this.departments = new App.Collections.Departments();
//			this.departments.setParams({
//				filter: {
//					hasBeds: true
//				}
//			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();


		},

		onTissuesLoaded: function (coll) {

			_(this.tissues.toJSON()).each(function (item) {
				this.$(".biomaterial").append($("<option/>", {
					"text": item.value,
					"value": item.id
				}));
			}, this);

			this.$(".biomaterial").select2();

		},

		onDepartmentsLoaded: function (departments) {

			this.departmentsJSON = departments.toJSON();

			_(this.departments.toJSON()).each(function (item) {
				this.$(".departments").append($("<option/>", {
					"text": item.name,
					"value": item.id
				}));

			}, this);


			this.$(".departments").select2();
			this.$(".departments").select2('val', this.collection.departmentId);

		},

		setDepartment: function(){

		},

		initStatusButtonset: function(){
			var view = this;

			view.$( "#status_buttonset").buttonset();
			//view.$("#status_buttonset :radio").click(function(e) {});
		},

		initFilters: function(){
			var view = this;

			view.$('#biomaterials-table-filter').on('change', function(event){
				view.filterCollection();
			});

			view.$('#biomaterials-head-filter').on('change', function(event){
				view.filterCollection();
			});
		},

		filterCollection: function(){
			var view = this;

			var filter1 = Core.Forms.serializeToObject($('#biomaterials-table-filter'));
			var filter2 = Core.Forms.serializeToObject($('#biomaterials-head-filter'));

			var filter = _.extend(filter1,filter2);

			view.collection.setParams({
				filter:filter
			});

			if (_.size(filter)) {
				view.collection.fetch();
			} else {
				view.collection.requestData = {};
				view.collection.reset();
			}

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

			var $startDateTime = this.$("#start-date");
			var $endDateTime = this.$("#end-date");

			var startDate = $startDateTime.datepicker("getDate");
			var endDate = $endDateTime.datepicker("getDate");

			if (_.isDate(startDate)) startDate.setDate(startDate.getDate() + increment);
			if (_.isDate(endDate)) endDate.setDate(endDate.getDate() + increment);

			$startDateTime.datepicker("setDate", startDate);
			$endDateTime.datepicker("setDate", endDate);

			this.$("#start-date").change();
		},

		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template));


			view.initStatusButtonset();
			view.initFilters();

			view.$("#biomaterial-grid").html(view.grid.el);
			view.$("#biomaterial-count table").append(view.counts.el);


			UIInitialize(view.el);

			var now = new Date();
			var startDate = new Date();
			var endDate = new Date();

			if (now.getHours() >= 0 && now.getHours() < 8) {
				startDate.setDate(startDate.getDate() - 1);
			}

			endDate.setDate(startDate.getDate() + 1);

			view.$("#start-date").datepicker("setDate", startDate);
			view.$("#end-date").datepicker("setDate", endDate);

			view.setDate();


			//UIInitialize(view.el);
//			this.delegateEvents();
//			this.grid.delegateEvents();

			return view;
		}

	});

	return BiomaterialsView;

});
