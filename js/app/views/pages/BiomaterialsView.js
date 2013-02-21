define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/pages/BiomaterialsCountsView',
	'collections/JobTickets',
	'collections/dictionary-values',
	'collections/departments'], function (biomaterialsTemplate, BiomaterialsCollection, GridView, CountView, JobTicketsCollection) {

	var BiomaterialsView = View.extend({
		///className: "ContentHolder",
		template: biomaterialsTemplate,
		events: {
			"click .Actions.Decrease": "decreaseDate",
			"click .Actions.Increase": "increaseDate",
			"click #select-all": "selectAll",
			//"click #execute": "executeJobTikets",
			//"click #send-to-lab": "sendToLab",
			"click #print": "print",
			"change .id": "biomaterialSelected"
		},

		initialize: function () {
			var view = this;

			view.on("all", function (eventName) {
				console.log('view', eventName);
			});

			view.collection = new BiomaterialsCollection;

			view.collection.on("all", function (eventName) {
				console.log('view.collection', eventName);
			});

			view.initGrid();

			view.initCounts();

			view.collection.fetch();

			view.initJobTickets();

			view.initTissues();

			view.initDepartments();

		},

		initGrid: function () {
			var view = this;

			view.grid = new GridView({
				popUpMode: true,
				collection: view.collection,
				template: "grids/biomaterials",
				gridTemplateId: "#biomaterials-grid",
				rowTemplateId: "#biomaterials-grid-row",
				defaultTemplateId: "#biomaterials-grid-row-default",
				errorTemplateId: "#biomaterials-grid-row-error"
			});

			view.depended(view.grid);

			view.grid.on('grid:rowClick', view.onGridRowClick, view);

			view.grid.on("all", function (eventName) {
				console.log('view.grid', eventName);
			});
		},

		onGridRowClick: function (bio, event) {
			var view = this;
			var checkbox = view.$(event.target).parent('tr').find('.id');

			checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');


//			if ($(event.target).hasClass('biomaterial_id')) {
//				var $select = $(event.target);
//
//				if ($select.is(':checked')) {
//					console.log('bio checked', bio, event);
//					view.selectedJobTickets.add({
//						id: bio.get('jobTicket').id,
//						status: bio.get('jobTicket').status
//					}, {silent: true})
//
//				} else {
//					console.log('bio unchecked', bio, event);
//					view.selectedJobTickets.remove(bio.get('jobTicket').id, {silent: true});
//				}
//
//				console.log('selectedJobTickets', view.selectedJobTickets);
//			}

		},


		biomaterialSelected: function () {
			console.log('change .id');
			var view = this;

			view.updateExecuteButton();

			view.updateSendToLabButton();
		},

		selectAll: function (event) {
			var view = this;
			var $select_all_button = $(event.target);

			view.$('.id').attr('checked', $select_all_button.prop("checked")).trigger('change')


			view.updateExecuteButton();

			view.updateSendToLabButton();


		},

		getSelectedCheckboxes: function () {
			var view = this;

			return view.$('.id:checked');
		},

		executeJobTikets: function () {
			var view = this;


			console.log('executeJobTikets', view.getSelectedCheckboxes());

		},
		updateExecuteButton: function () {
			var view = this;

			view.$('#execute').button({ disabled: !view.getSelectedCheckboxes().length });
		},

		updateSendToLabButton: function () {
			var view = this;

			view.$('#send-to-lab').button({ disabled: !view.getSelectedCheckboxes().length });
		},

		sendToLab: function () {
			var view = this;

			console.log('sendToLab');

		},

		print: function () {
			console.log('print');
		},

		initJobTickets: function () {
			var view = this;

			view.selectedJobTickets = new JobTicketsCollection;

//			view.selectedJobTickets.on('remove', function () {
//				console.log('selectedJobTickets remove');
//			}, view);
//
//			view.selectedJobTickets.on('relational:add relational:remove', function () {
//				console.log('selectedJobTickets add remove');
//
//			}, view);

			view.selectedJobTickets.on("all", function (eventName) {
				console.log('view.selectedJobTickets', eventName);
			});
		},

		initCounts: function () {
			var view = this;

			view.counts = new CountView({ collection: view.collection});

			view.depended(view.counts);

			view.counts.on("all", function (eventName) {
				console.log('view.counts', eventName);
			});

		},

		initTissues: function () {
			var view = this;

			//Получаем список типов биоматериалов
			view.tissues = new App.Collections.DictionaryValues("", {
				name: "tissueTypes"
			});
			view.tissues.on("reset", this.onTissuesLoaded, this);
			view.tissues.fetch();

			view.tissues.on("all", function (eventName) {
				console.log('view.tissues', eventName);
			});
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

		initDepartments: function () {
			var view = this;

			//Получаем список отделений
			view.departments = new App.Collections.Departments();
			view.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			view.departments.on("reset", view.onDepartmentsLoaded, view);
			view.departments.fetch();

			view.departments.on("all", function (eventName) {
				console.log('view.departments', eventName);
			});

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


		initStatusFilterButtonset: function () {
			var view = this;

			view.$("#status_buttonset").buttonset();
		},
		initExecuteButton: function () {
			var view = this,
				$executeButton = view.$('#execute');

			$executeButton
				.button()
				.on('click', function () {
					view.executeJobTikets();
				});

			view.updateExecuteButton();

		},

		initSendToLabButton: function () {
			var view = this,
				$sendToLabButton = view.$('#send-to-lab');

			$sendToLabButton
				.button()
				.on('click', function () {
					view.sendToLab();
				});

			view.updateSendToLabButton();

		},

		initPrintButton: function () {
			var view = this;

			view.$('#print').button()
				.click(function () {
					alert("печать");
				})
				.next()
				.button({
					text: false,
					icons: {
						primary: "ui-icon-triangle-1-s"
					}
				})
				.click(function () {
					var menu = $(this).parent().next().show().position({
						my: "left top",
						at: "left bottom",
						of: this
					});
					$(document).one("click", function () {
						menu.hide();
					});
					return false;
				})
				.parent()
				.buttonset()
				.next()
				.hide()
				.menu();

		},

		initFilters: function () {
			var view = this;

			view.$('#biomaterials-table-filter').on('change', function () {
				view.filterCollection();
			});

			view.$('#biomaterials-head-filter').on('change', function () {
				view.filterCollection();
			});
		},

		filterCollection: function () {
			var view = this;

			var filter1 = Core.Forms.serializeToObject($('#biomaterials-table-filter'));
			var filter2 = Core.Forms.serializeToObject($('#biomaterials-head-filter'));

			var filter = _.extend(filter1, filter2);

			view.collection.setParams({
				filter: filter
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

			view.initFilters();
			view.initStatusFilterButtonset();
			view.initSendToLabButton();
			view.initExecuteButton();

			view.initPrintButton();

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
			this.grid.delegateEvents();

			return view;
		}

	});

	return BiomaterialsView;

});
