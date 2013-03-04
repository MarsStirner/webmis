define(["models/Biomaterial"], function (Biomaterial) {
	var Biomaterials = Collection.extend({
		model: Biomaterial,
		url: function () {
			return DATA_PATH + "biomaterial/info?";//filter[beginDate]=1354305600000&filter[endDate]=1354478400000"
		},
		initialize: function () {
			var collection = this;

			collection.countSelected();
			collection.on("change:selected reset", collection.countSelected, collection);

		},

		/***
		 * Считает выбранные джоб тикеты с разными статусами
		 */
		countSelected: function () {
			var collection = this;

			collection.selected = {};
			collection.selected.status_0 = [];
			collection.selected.status_1 = [];
			collection.selected.status_2 = [];

			collection.selected.status_0 = collection.filter(function (model) {
				return ((model.get("selected") == true) && (model.get('status') == 0));
			});

			collection.selected.status_1 = collection.filter(function (model) {
				return ((model.get("selected") == true) && (model.get('status') == 1));
			});

			collection.selected.status_2 = collection.filter(function (model) {
				return ((model.get("selected") == true) && (model.get('status') == 2));
			});

			console.log('что-то выбрали', collection.selected);

		},

		getSelectedModels: function() {
			var collection = this;

			return collection.filter(function(model){
				return model.get('selected');
			});
		},

		/***
		 * Возвращает отфильтрованный список лаб.исследований
		 *
		 * @param {Function} filterFunction - получает jobTicket, если возвращает true,
		 * то лаб.исследования из этого тикета попадают в возвращаемый массив
		 * @returns {Array} - массив лаб.исследований
		 */

		getLabTests: function (filterFunction) {
			var collection = this;
			var labTests = [];

			if (!_.isFunction(filterFunction)) {
				throw new Error("No 'filterFunction' for 'Biomaterials.getLabTests'");
			}

			collection.each(function (model) {

				if (filterFunction(model)) {
					_.each(model.get('actions'), function (labTest) {
						labTests.push(labTest);
					});
				}

			});

			return labTests;
		},

		/***
		 * Готовит данные для печати журнала выполнения работ
		 * @returns {Array}
		 */
		makeWorkList: function (labTests) {
			var collection = this;
			var workList = [];

			_.each(labTests, function (labTest, index) {

				workList.push({
					'index': index + 1,
					'jobTicketDate': labTest.jobTicket.date,
					'orgStructure': labTest.department.name,
					'patientName': labTest.patient.name,
					'patientSex': labTest.patient.sex,
					'patientBirthDate': labTest.patient.birthDate,
					'labTestName': labTest.actionType.name,
					'tissueTypeName': labTest.biomaterial.tissueType.name,
					'tubeTypeName': labTest.tubeType.name,
					'jobTicketLabel': labTest.jobTicket.label,
					'jobTicketNote': labTest.jobTicket.note,
					'takenTissueJournalId': labTest.takenTissueJournal
				});
			});

			return workList;
		},

		/***
		 * Готовит данные для печати штрихкодов
		 * @param labTests - массив с лабораторными исследованиями
		 * @returns {Array}
		 */
		makeBarcodes: function (labTests) {
			var collection = this;
			var barcodes = [];

			_.each(labTests, function (labTest) {

				barcodes.push({
					datetime: labTest.jobTicket.date,
					barcode: labTest.takenTissueJournal,
					name: labTest.patient.name
				});

			});

			return barcodes;
		},

		parse: function (response) {
			checkForWarnings(response.requestData, "requestData was not found in the JSON");
			this.requestData = response.requestData || {};
			this.requestData.filter = this.requestData.filter || {};

			if (response.requestData && this.requestData.coreVersion) {
				CORE_VERSION = response.requestData.coreVersion;
				VersionInfo.show();
			}
			this.departmentId = response.requestData.filter.departmentId;

			return this.normilize(response.data);
		},

		normilize: function (response) {
			return _.map(response, function (model) {

				model.patient = model.actions[0].patient;
				model.urgent = model.actions[0].urgent;
				model.assigner = model.actions[0].assigner;
				model.biomaterial = model.actions[0].biomaterial;


				//var biomaterials = _.pluck(model.actions, 'biomaterial');
				var volume = 0;

				_.each(model.actions, function (action, key, list) {
					action.department = model.laboratory;
					action.jobTicket = {
						'id': model.id,
						'date': model.date,
						'label': model.label,
						'note': model.note
					}

					volume = volume + action.biomaterial.amount;

				});

				model.volume = volume;
				if (model.actions[0].patient.sex == 'male') {
					model.patient.sex = 'М';
				}
				if (model.actions[0].patient.sex == 'female') {
					model.patient.sex = 'Ж';
				}


				if (model.status == 0) {
					model.statusName = 'ожидание';
				}
				if (model.status == 1) {
					model.statusName = 'выполнение';
				}
				if (model.status == 2) {
					model.statusName = 'закончено';
				}

				model.selected = false;

				return model;
			});

		}


	});

	return Biomaterials;
});
