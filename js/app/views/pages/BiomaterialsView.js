define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/appeal/edit/popups/BiomaterialPopupView',
	'views/pages/BiomaterialsCountsView',
	'collections/JobTickets',
	'collections/Barcodes',
	'collections/dictionary-values',
	'collections/departments',
	"views/print"], function (biomaterialsTemplate, BiomaterialsCollection, GridView, JobTicketPopupView, CountView, JobTicketsCollection, BarcodesCollection) {

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
			"change .id": "jobTicketonCheckboxChange"
		},

		initialize: function () {
			var view = this;

			view.collection = new BiomaterialsCollection;

			view.collection.on('reset', function () {
				view.countSelectedJobTickets();
				view.updateButtons();
				view.resetSelectAllCheckbox();
			})

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

		},

		onGridRowClick: function (bio, event) {
			var view = this,
				$eventTarget = $(event.target);

			if (!$eventTarget.hasClass('id') && (bio.get('status') == 0)) {
				view.openJobTicketPopup(bio);
			}

		},

		openJobTicketPopup: function (biomaterial) {
			var jobTicketPopupView = new JobTicketPopupView({biomaterial: biomaterial});

			jobTicketPopupView.render();
			jobTicketPopupView.open();
		},

		jobTicketonCheckboxChange: function (event) {

			var view = this;
			var selected = false;
			$checkbox = $(event.target);

			if ($checkbox.prop('checked')) {
				selected = true;
			}

			var model = view.collection.get($checkbox.val());
			model.set({'selected': selected}, {silent: true});

			view.countSelectedJobTickets();

			view.updateButtons();

		},

		countSelectedJobTickets: function () {
			var view = this;

			var status0 = view.collection.filter(function (jobTicket) {
				return ((jobTicket.get("selected") == true) && (jobTicket.get('status') == 0));
			});

			var status1 = view.collection.filter(function (jobTicket) {
				return ((jobTicket.get("selected") == true) && (jobTicket.get('status') == 1));
			});

			var status2 = view.collection.filter(function (jobTicket) {
				return ((jobTicket.get("selected") == true) && (jobTicket.get('status') == 2));
			});

			view.selectedJobTicketCount = {
				'status0': status0,
				'status1': status1,
				'status2': status2
			}

		},

		selectAll: function (event) {
			var view = this;
			var $select_all_button = $(event.target);

			view.$('.id').attr('checked', $select_all_button.prop("checked")).trigger('change')

			view.updateButtons();
		},
		resetSelectAllCheckbox: function () {
			var view = this;

			view.$('#select-all').prop('checked', false);
		},

		executeJobTikets: function () {
			var view = this;

			view.jobTicketsCollection.reset();

			view.collection.each(function (jobTicket) {
				if (jobTicket.get('selected')) {
					view.jobTicketsCollection.add({'id': jobTicket.get('id'), 'status': 1});
				}
			});

			view.jobTicketsCollection.updateAll();

		},

		resetAllStatuses: function () {
			var view = this;

			view.jobTicketsCollection.reset();

			view.collection.each(function (jobTicket) {
				view.jobTicketsCollection.add({'id': jobTicket.get('id'), 'status': 0});
			});

			view.jobTicketsCollection.updateAll();
		},
		updateButtons: function () {
			var view = this;

			view.updateExecuteButton();
			view.updateSendToLabButton();
		},

		updateExecuteButton: function () {
			var view = this;
			var disabled = true;
			var jtc = view.selectedJobTicketCount;

			if (jtc.status0.length > 0
				&& jtc.status1.length == 0
				&& jtc.status2.length == 0) {

				disabled = false;
			}

			view.$('#execute').button({ disabled: disabled });
		},

		updateSendToLabButton: function () {
			var view = this;
			var disabled = true;
			var jtc = view.selectedJobTicketCount;

			if (jtc.status0.length == 0
				&& jtc.status1.length > 0
				&& jtc.status2.length == 0) {

				disabled = false;
			}

			view.$('#send-to-lab').button({ disabled: disabled });
		},

		/***
		 * Возвращает отфильтрованный список лаб.исследований
		 *
		 * @param {Function} filterFunction - получает jobTicket, если возвращает true,
		 * то лаб.исследования из этого тикета попадают в возвращаемый массив
		 * @returns {Array} - массив лаб.исследований
		 */
		getLabTests: function (filterFunction) {
			var view = this;
			var labTests = [];

			view.collection.each(function (jobTicket) {

				if (filterFunction(jobTicket)) {
					_.each(jobTicket.get('actions'), function (labTest) {
						labTests.push(labTest);
					});
				}

			});

			return labTests;
		},

		selectedAndStatus10: function (jobTicket) {
			if (jobTicket.get('selected') && (jobTicket.get('status') < 2)) {
				return true;
			}
		},

		/***
		 * Готовит данные для печати журнала выполнения работ
		 * @returns {Array}
		 */
		makeWorkList: function () {
			var view = this;
			var labTests = view.getLabTests(view.selectedAndStatus10);
			var workList = [];

			_.each(labTests, function (labTest, index) {

				workList.push({
					'index': index + 1,
					'jobTicketDate': labTest.jobTicket.date,
					'orgStructure': 'где это брать??',
					'patientFio': labTest.patient.name.raw,
					'patientSex': labTest.patient.sex,
					'patientBirthDate': labTest.patient.birthDate,
					'labTestName': labTest.actionType.name,
					'tissueTypeName': labTest.biomaterial.tissueType.name,
					'tubeTypeName': labTest.tubeType.name,
					'jobTicketLabel': labTest.jobTicket.label,
					'jobTicketNote': labTest.jobTicket.note,
					'takenTissueJournalId': labTest.id
				});
			});

			return workList;
		},

		/***
		 * Запускает печать журнала выполнения работ
		 */
		printWorkList: function () {
			var view = this;
			var workList = view.makeWorkList();

			if (workList.length) {
				console.log('workList', workList);
				new App.Views.Print({
					data: workList,
					template: "WorkList"
				});

			} else {

			}

		},

		makeBarcodes: function (labTests) {
			var view = this;
			var barcodes = [];

			_.each(labTests, function (labTest) {

				barcodes.push({
					datetime: labTest.jobTicket.date,
					barcode: labTest.id,
					fio: labTest.patient.name.raw
				});

			});

			return barcodes;
		},

		printBarcodes: function () {
			var view = this;
			var labTests = view.getLabTests(view.selectedAndStatus10);
			var barcodes = view.makeBarcodes(labTests);

			if (barcodes.length) {
				//статус заборов биоматериала для которых начали печатать штрихкод меняется на "Выполняется"
				view.executeJobTikets();

				console.log('print barcodes', barcodes);
				new App.Views.Print({
					data: barcodes,
					template: "WorkListBCode"
				});
			} else {
				pubsub.trigger('noty', {text: 'Выберите хотя бы один забор биоматериала!', type: 'alert'});
			}


		},

		sendToLab: function () {
			var view = this;

			view.jobTicketsCollection.reset();

			view.collection.each(function (biomaterial) {
				if (biomaterial.get('selected')) {
					view.jobTicketsCollection.add({'id': biomaterial.get('id'), 'status': 2});
				}
			});

			view.jobTicketsCollection.updateAll();
		},

		print: function () {

			//this.printBarcodes();
			this.printWorkList();
		},

		initJobTickets: function () {
			var view = this;

			view.jobTicketsCollection = new JobTicketsCollection;

			view.jobTicketsCollection.on('updateAll:success', function () {
				//pubsub.trigger('noty', {text: 'Статус обновлён', type: 'success'});
				view.collection.fetch();
			});

			view.jobTicketsCollection.on('updateAll:error', function () {
				pubsub.trigger('noty', {text: 'Не удалось обновить статус', type: 'error'});
			});

		},


		initCounts: function () {
			var view = this;

			view.counts = new CountView({ collection: view.collection});

			view.depended(view.counts);
		},

		initTissues: function () {
			var view = this;

			//Получаем список типов биоматериалов
			view.tissues = new App.Collections.DictionaryValues("", {
				name: "tissueTypes"
			});
			view.tissues.on("reset", this.onTissuesLoaded, this);
			view.tissues.fetch();

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

		initResetAllButton: function () {
			var view = this,
				$resetAllButton = view.$('#reset-all');

			$resetAllButton
				.button()
				.on('click', function () {
					view.resetAllStatuses();
				});

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

				})
				.next()
				.button({
					text: false,
					icons: {
						primary: "ui-icon-triangle-1-s"
					}
				})
				.click(function () {
					var menu = $(this).parent().next().children().show().position({
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
			view.countSelectedJobTickets();
			view.initSendToLabButton();
			view.initExecuteButton();
			view.initResetAllButton();

			view.initPrintButton();

			view.$("#biomaterial-grid").html(view.grid.el);
			view.$("#biomaterial-count").append(view.counts.el);


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
