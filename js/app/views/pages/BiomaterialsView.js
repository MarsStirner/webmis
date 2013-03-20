define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/ui/RangeDatepickerView',
	'views/appeal/edit/popups/BiomaterialPopupView',
	'views/pages/BiomaterialsCountsView',
	'views/ui/SelectView',
	'collections/JobTickets',
	'collections/Barcodes',
	'collections/dictionary-values',
	'collections/departments',
	"views/print"], function (biomaterialsTemplate, BiomaterialsCollection, GridView,DatetimePikerView, JobPopupView, CountView, SelectView, JobsCollection, BarcodesCollection) {

	var BiomaterialsView = View.extend({
		///className: "ContentHolder",
		template: biomaterialsTemplate,
		events: {
			//"click .Actions.Decrease": "decreaseDate",
			//"click .Actions.Increase": "increaseDate",
			"click #select-all": "selectAll",

			"change .id": "onCheckboxChange"
		},

		initialize: function () {
			var view = this;

			view.collection = new BiomaterialsCollection;

			view.collection.on('reset', function () {
				view.updateButtons();
				view.resetSelectAllCheckbox();
			});


			view.initGrid();

			view.initCounts();

			view.collection.fetch();

			view.initJobs();

			pubsub.on('departments:change', function (id) {
				console.log('departments:change', id)
			});

			pubsub.on('biomaterial:change', function (id) {
				console.log('biomaterial:change', id)
			})


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
				errorTemplateId: "#biomaterials-grid-row-error"//,
				//fetchTemplateId: "#biomaterials-grid-row-on-fetch"
			});

			view.depended(view.grid);

			view.grid.on('grid:rowClick', view.onGridRowClick, view);

		},

		onGridRowClick: function (model, event) {
			var view = this,
				$eventTarget = $(event.target);

			if (!$eventTarget.hasClass('id') && (model.get('status') == 0)) {
				view.openJobPopup(model);
			}

		},

		openJobPopup: function (model) {
			var jobPopupView = new JobPopupView({biomaterial: model});

			jobPopupView.render().open();
		},

		onCheckboxChange: function (event) {
			var view = this;
			var selected = false;

			var $checkbox = $(event.target);

			if ($checkbox.prop('checked')) {
				selected = true;
			}

			var model = view.collection.get($checkbox.val());
			model.set({'selected': selected});

			view.updateButtons();

		},

		selectAll: function (event) {
			var view = this;
			var $select_all_button = $(event.target);

			view.$('.id').attr('checked', $select_all_button.prop("checked")).trigger('change')

			//view.updateButtons();
		},

		resetSelectAllCheckbox: function () {
			var view = this;

			view.$('#select-all').prop('checked', false);
		},

		setStatus: function (modelsArray, status) {
			var view = this;

			view.jobs.reset();

			_.each(modelsArray, function (model) {
				view.jobs.add({'id': model.get('id'), 'status': status});
			});

			view.jobs.updateAll();
		},

		updateButtons: function () {
			var view = this;

			view.updateExecuteButton();
			view.updateSendToLabButton();
		},

		updateExecuteButton: function () {
			var view = this;
			var disabled = true;
			var jtc = view.collection.selected;

			if (jtc.status_0.length > 0 && jtc.status_1.length == 0 && jtc.status_2.length == 0) {
				disabled = false;
			}

			view.$('#execute').button({ disabled: disabled });
		},

		updateSendToLabButton: function () {
			var view = this;
			var disabled = true;
			var jtc = view.collection.selected;

			if (jtc.status_0.length == 0 && jtc.status_1.length > 0 && jtc.status_2.length == 0) {
				disabled = false;
			}

			view.$('#send-to-lab').button({ disabled: disabled });
		},


		selectedAndStatus10: function (model) {
			if (model.get('selected') && (model.get('status') < 2)) {
				return true;
			}
		},

		/***
		 * Запускает печать журнала выполнения работ
		 */
		printWorkList: function () {
			var view = this;
			var labTests = view.collection.getLabTests(view.selectedAndStatus10);
			var workList = view.collection.makeWorkList(labTests);

			if (workList.length) {

				new App.Views.Print({
					data: {'jobs': workList},
					template: "WorkList"
				});

			} else {
				pubsub.trigger('noty', {text: 'Выберите хотя бы один забор биоматериала!', type: 'alert'});
			}

		},

		printBarcodes: function () {
			var view = this;
			var labTests = view.collection.getLabTests(view.selectedAndStatus10);
			var barcodes = view.collection.makeBarcodes(labTests);

			if (barcodes.length) {
				//статус заборов биоматериала для которых начали печатать штрихкод меняется на "Выполняется"
				view.setStatus(view.collection.getSelectedModels(), 1);

				new App.Views.Print({
					data: {'barcodes': barcodes},
					template: "WorkListBCode"
				});

			} else {
				pubsub.trigger('noty', {text: 'Выберите хотя бы один забор биоматериала!', type: 'alert'});
			}


		},

		initJobs: function () {
			var view = this;

			view.jobs = new JobsCollection;

			view.jobs.on('updateAll:success', function () {
				//pubsub.trigger('noty', {text: 'Статус обновлён', type: 'success'});
				view.collection.fetch();
			});

			view.jobs.on('updateAll:error', function () {
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

			view.tissues.setParams({
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			view.tissueSelect = new SelectView({
				collection: view.tissues,
				el: view.$('#biomaterial')
			});

			view.depended(view.tissueSelect);

		},

		initDepartments: function () {
			var view = this;

			//список отделений
			view.departments = new App.Collections.Departments();

			view.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			view.departmentSelect = new SelectView({
				collection: view.departments,
				el: view.$('#departments'),
				selectText: 'name',
				initSelection: view.collection.departmentId
			});

			view.depended(view.departmentSelect);

		},


		initStatusFilterButtonset: function () {
			var view = this;

            view.$("#status_buttonset").buttonset();
            view.collection.on('reset', function () {
                var all = view.collection.count.all;
                var status_0 = view.collection.count.status_0;
                var status_1 = view.collection.count.status_1;
                var status_2 = view.collection.count.status_2;

                view.$('#status-all-count').html(all ? '(' + all + ')' : '');
                view.$('#status-0-count').html(status_0 ? '(' + status_0 + ')' : '');
                view.$('#status-1-count').html(status_1 ? '(' + status_1 + ')' : '');
                view.$('#status-2-count').html(status_2 ? '(' + status_2 + ')' : '');
            });
		},
		initExecuteButton: function () {
			var view = this;

			view.$('#execute').button().on('click', function () {
				view.setStatus(view.collection.getSelectedModels(), 1);
			});

			//view.updateExecuteButton();
		},

		initResetAllButton: function () {
			var view = this;

			view.$('#reset-all').button().on('click', function () {
				view.setStatus(view.collection.models, 0);
			});

		},

		initSendToLabButton: function () {
			var view = this;

			view.$('#send-to-lab').button().on('click', function () {
				view.setStatus(view.collection.getSelectedModels(), 2);
			});

			//view.updateSendToLabButton();
		},

		initPrintButton: function () {
			var view = this;

			var options = {
				label: 'Печать',
				handler: view.printBarcodes,
				scope: view,
				dropDownItems: [
					{
						label: 'Печать штрихкодов',
						handler: view.printBarcodes
					},
					{
						label: 'Печать журнала выполнений работ',
						handler: view.printWorkList
					}
				]
			}

			var $list = view.$('.split-button-dropdown');

			_(options.dropDownItems).each(function (ddi) {
				$list.append($("<li><a href='#' class='SubPrint'>" + ddi.label + "</a></li>").click(function () {
					console.log('пятница!!!!')
					event.preventDefault();
					ddi.handler.apply(options.scope);
				}));
			});


			view.$('#print').button({
				label: options.label
			})
				.click(function () {
					options.handler.apply(options.scope);
				})
				.next().button({
					text: false,
					icons: {
						primary: "ui-icon-triangle-1-s"
					}
				})
				.click(function () {
					var menu = $(this)
						.parent().next('.split-button-dropdown')
						.show()
						.position({
							my: "right top",
							at: "right bottom",
							of: this,
							collision: "fit"
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
				.menu().css({'position': 'absolute'});

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





		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template));

			view.initFilters();
			view.initStatusFilterButtonset();
			view.initSendToLabButton();
			view.initExecuteButton();
			view.initResetAllButton();

			view.initPrintButton();

			view.initTissues();
			view.initDepartments();


			var now = moment();
			var startTimestamp = now.subtract('days', 1).hours(0).minutes(0).format('X');
			var endTimestamp = now.subtract('days', 1).hours(23).minutes(59).format('X');

			view.datepicker = new DatetimePikerView({
				startTimestamp: startTimestamp,
				endTimestamp: endTimestamp
			});

			view.$('#biomaterials-head-filter').prepend(view.datepicker.render().el)
			//.biomaterials-datatime

			view.$("#biomaterial-grid").html(view.grid.el);
			view.$("#biomaterial-count").append(view.counts.el);





			//UIInitialize(view.el);
//			this.delegateEvents();
			this.grid.delegateEvents();

			return view;
		}

	});

	return BiomaterialsView;

});
