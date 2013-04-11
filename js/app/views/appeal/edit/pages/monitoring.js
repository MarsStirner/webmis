/**
 * User: FKurilov
 * Date: 09.04.13
 */
define([
	"text!templates/appeal/edit/pages/monitoring/layout.tmpl",
	"text!templates/appeal/edit/pages/monitoring/patient-info.tmpl",
	"text!templates/appeal/edit/pages/monitoring/signal-info.tmpl",
	"text!templates/appeal/edit/pages/monitoring/patient-diagnoses-list.tmpl",
	"text!templates/appeal/edit/pages/monitoring/monitoring-info.tmpl",
	"text!templates/appeal/edit/pages/monitoring/monitoring-info-item.tmpl",
	"text!templates/appeal/edit/pages/monitoring/express-analyses.tmpl",
	"text!templates/appeal/edit/pages/monitoring/express-analyses-item.tmpl",

	"collections/moves"
], function (
	monitoringTmpl,
	patientInfoTmpl,
	signalInfoTmpl,
	patientDiagnosesListTmpl,
	monitoringInfoGridTmpl,
	monitoringInfoItemTmpl,
	expressAnalysesTmpl,
	expressAnalysesItemTmpl,
	Moves
	) {

	/**
	 * Структура модуля
	 * @type {{Views: {}, Collections: {}, Models: {}}}
	 */
	var Monitoring = {
		Views: {},
		Collections: {},
		Models: {}
	};


	// Коллекции
	//////////////////////////////////////////////////////

	/**
	 * Модель для таблицы "Мониторинг"
	 * @type {*}
	 */
	Monitoring.Models.MonitoringInfo = Model.extend({
		defaults: {
			datetime: "",
			temperature: "",
			bloodPressure: {
				left: {
					syst: "",
					diast: ""
				},
				right: {
					syst: "",
					diast: ""
				}
			},
			heartRate: "",
			spo2: "",
			breathRate: "",
			state: "",
			health: ""
		}
	});

	/**
	 * Коллекция для таблицы "Мониторинг"
	 * @type {*}
	 */
	Monitoring.Collections.MonitoringInfos = Collection.extend({
		model: Monitoring.Models.MonitoringInfo,

		sync:function (method, model, options) {
			return Backbone.sync(method, model, options);
		},

		url: function () {
			//return DATA_PATH + "";
			return "/monitoring-info.json";
		}
	});

	/**
	 * Модель для таблицы "Экспресс-анализы"
	 * @type {*}
	 */
	Monitoring.Models.ExpressAnalysis = Model.extend({
		defaults: {
			"datetime": "",
			"k": "",
			"na": "",
			"ca": "",
			"glucose": "",
			"protein": "",
			"urea": "",
			"bilubrinOb": "",
			"bilubrinPr": ""
		}
	});

	/**
	 * Коллекция для таблицы "Экспресс-анализы"
	 * @type {*}
	 */
	Monitoring.Collections.ExpressAnalyses = Collection.extend({
		model: Monitoring.Models.MonitoringInfo,

		sync:function (method, model, options) {
			return Backbone.sync(method, model, options);
		},

		url: function () {
			//return DATA_PATH + "";
			return "/express-analyses.json";
		}
	});

	/**
	 * Модель диагноза пациента
	 * @type {*}
	 */
	Monitoring.Models.PatientDiagnosis = Model.extend({
		defaults: {
			"diagnosticId": "",
			"diagnosisKind": "",
			"datetime": "",
			"description": "",
			"injury": "",
			"doctor": {
				"name": {
					"first": "",
					"last": "",
					"middle": "",
					"raw": ""
				}
			},
			"mkb": {
				"id": "",
				"code": "",
				"diagnosis": ""
			}
		}
	});

	/**
	 * Коллекция диагнозов пациента
	 * @type {*}
	 */
	Monitoring.Collections.PatientDiagnoses = Collection.extend({
		model: Monitoring.Models.PatientDiagnosis,

		diagKinds: {
			"assignment": {priority: 0, title: "Направительный диагноз"},
			"admission": {priority: 1, title: "Диагноз при поступлении"},
			"clinical": {priority: 2, title: "Клинический"},
			"final": {priority: 3, title: "Заключительный"}
		},

		sync:function (method, model, options) {
			return Backbone.sync(method, model, options);
		},

		url: function () {
			return "/patient-diagnoses.json";
			//return DATA_PATH + "";
		},

		comparator: function (a, b) {
			var apr = this.diagKinds[a.get("diagnosisKind")].priority;
			var bpr = this.diagKinds[b.get("diagnosisKind")].priority;

			if (apr > bpr) {
				return 1;
			} else if (apr < bpr) {
				return -1;
			} else {
				return 0;
			}
		},

		parse: function (raw) {
			var data = Collection.prototype.parse.call(this, raw);

			/*data.sort(function (a, b) {
				var apr = diagKinds[a.diagnosisKind].priority;
				var bpr = diagKinds[b.diagnosisKind].priority;

				if (apr > bpr) {
					return 1;
				} else if (apr < bpr) {
					return -1;
				} else {
					return 0;
				}
			});*/

			_.each(data, function (diag) {
				diag.diagnosisKindLabel = this.diagKinds[diag.diagnosisKind].title;
			}, this);

			return data;
		}
	});


	// Лэйаут
	//////////////////////////////////////////////////////

	/**
	 * Главная вьюха, контейнер для виджетов
	 * @type {*}
	 */
	Monitoring.Views.Layout = View.extend({
		className: "monitoring-layout",

		template: monitoringTmpl,

		events: {
			//Изменть группу крови, назначить врача
		},

		initialize: function () {
		},

		data: function () {
			return {
				appealNumber: this.options.appeal.get("number")
			};
		},

		render: function () {
			//Было бы хорошо вынести каждый блок-виджет в свой вью, но сейчас нет надобности
			this.$el.html(_.template(monitoringTmpl, this.data()));

			this.assign({
				".patient-info": new Monitoring.Views.PatientInfo({appeal: this.options.appeal}),
				".signal-info": new Monitoring.Views.SignalInfo({appeal: this.options.appeal}),
				".patient-diagnoses-list": new Monitoring.Views.PatientDiagnosesList({appeal: this.options.appeal}),
				".monitoring-info": new Monitoring.Views.MonitoringInfoGrid(),
				".express-analyses": new Monitoring.Views.ExpressAnalyses()
			});

			return this;
		}
	});


	// Базовые вью для виджетов
	//////////////////////////////////////////////////////

	/**
	 * Базовый класс для виджетов-таблиц сортируемых на клиенте
	 * @type {*}
	 */
	Monitoring.Views.ClientSortableGrid = View.extend({
		events: {
			"click th.sortable": "onThSortableClick"
		},

		initialize: function () {
			//вызывается и после фетча и после сорта
			this.collection.on("reset", this.render, this).fetch();
			//в нашей версии бэкбона - нету :(
			//this.collection.on("sort", this.renderItems, this);
		},

		onThSortableClick: function (event) {
			var $target = $(event.currentTarget);

			var sortConditions = this.updateSortConditions($target);
			this.applySort(sortConditions);
		},

		/**
		 * Применяет сортировку коллекции по переданным памметрам
		 * @param sortConditions {{sortField: string, sortType: string, sortDirection: "desc" || "asc"}}
		 */
		applySort: function (sortConditions) {
			this.collection.comparator = this.getComparator(sortConditions.sortField, sortConditions.sortType, sortConditions.sortDirection);
			this.collection.sort({sortRequest: true});
		},

		/**
		 * Добавляет визуальную индикацию текущей сортировки, извлекает и возвращает выбранные параметры сортировки
		 * @param $targetTh
		 * @returns {{sortField: string, sortType: string, sortDirection: "desc" || "asc"}}
		 */
		updateSortConditions: function ($targetTh) {
			if (!this.$caret) {
				this.$caret = $('<i/>');
			}

			this.$caret.detach().removeClass();

			if ($targetTh.hasClass("sorted")) {
				if ($targetTh.hasClass("asc")) {
					$targetTh.removeClass("asc").addClass("desc");
					this.$caret.addClass("icon-caret-down");
				} else if ($targetTh.hasClass("desc")) {
					$targetTh.removeClass("desc").addClass("asc");
					this.$caret.addClass("icon-caret-up");
				}
			} else {
				this.$("th").removeClass("sorted asc desc");
				$targetTh.addClass("sorted asc");
				this.$caret.addClass("icon-caret-up");
			}

			this.$caret.appendTo($targetTh);

			return {
				sortField: $targetTh.data("sort-field"),
				sortType: $targetTh.data("sort-type"),
				sortDirection: ($targetTh.hasClass("desc") ? "desc" : "asc")
			};
		},

		/**
		 * Возвращает фукцию сортировки коллекции по заданным параметрам
		 * @param fieldName
		 * @param sortType
		 * @param sortDirection
		 * @returns {Function}
		 */
		getComparator: function (fieldName, sortType, sortDirection) {
			switch (sortType) {
				case "datetime":
				case "numeric":
					return function (itemA, itemB) {
						var a = parseFloat(itemA.get(fieldName)), b =  parseFloat(itemB.get(fieldName));

						if (a > b) return sortDirection === "asc" ? 1 : -1;
						else if (a < b) return sortDirection === "asc" ? -1 : 1;
						else return 0;
					};
				default:
					return function (itemA, itemB) {
						var a = itemA.get(fieldName).toString(), b = itemB.get(fieldName).toString();

						if (a > b) return sortDirection === "asc" ? 1 : -1;
						else if (a < b) return sortDirection === "asc" ? -1 : 1;
						else return 0;
					};
			}
		},

		/**
		 * Перерисовывает только ряды таблицы
		 */
		renderItems: function () {
			/*this.$("tbody").empty().append(this.collection.map(function (item) {
				return _.template(this.itemTemplate, {item: item});
			}, this));*/
			this.$("tbody").empty().append(_.template(this.itemTemplate, {collection: this.collection}));
		},

		render: function (c, options) {
			//этот параметр передаётся только при сортировке, и в этом случае
			//мы хотим отрендерить только ряды
			options = options || {sortRequest: false};
			if (!options.sortRequest) {
				//сейчас в теле таблицы данных нет
				//this.$el.html(_.template(this.template, this.data()));
				this.$el.html(_.template(this.template));
			}

			this.renderItems();

			return this;
		}
	});


	// Виджеты
	//////////////////////////////////////////////////////

	/**
	 * Сведения о пациенте
	 * @type {*}
	 */
	Monitoring.Views.PatientInfo = View.extend({
		template: patientInfoTmpl,

		events: {
			"click .edit-blood": "onEditBloodClick"
		},

		data: function () {
			var appealJSON = this.options.appeal.toJSON();
			return {
				appeal: appealJSON,
				patient: appealJSON.patient
			};
		},

		onEditBloodClick: function (event) {
			event.preventDefault();
			console.log("edit blood");
		},

		render: function () {
			this.$el.html(_.template(this.template, this.data()));

			return this;
		}
	});

	/**
	 * Блок сигнальной информации о пациенте
	 * @type {*}
	 */
	Monitoring.Views.SignalInfo = View.extend({
		template: signalInfoTmpl,

		initialize: function () {
			this.moves = new Moves();
			this.moves.appealId = this.options.appeal.get("id");
			this.moves.on("reset", this.render, this).fetch();
		},

		data: function () {
			return {
				lastMove: this.moves.last(),
				appeal: this.options.appeal.toJSON(),
				appealExtraData: Core.Data.appealExtraData.toJSON()
			};
		},

		render: function () {
			this.$el.html(_.template(this.template, this.data()));

			return this;
		}
	});

	/**
	 * Список диагнозов пациента
	 * @type {*}
	 */
	Monitoring.Views.PatientDiagnosesList = View.extend({
		template: patientDiagnosesListTmpl,

		data: function () {
			return {
				diagnoses: this.collection
			};
		},

		initialize: function (options) {
			this.collection = new Monitoring.Collections.PatientDiagnoses();
			this.collection.on("reset", this.render, this).fetch();
		},

		render: function () {
			this.$el.html(_.template(this.template, this.data()));

			return this;
		}
	});

	/**
	 * Вью таблицы-виджета "Мониторинг"
	 * @type {*}
	 */
	Monitoring.Views.MonitoringInfoGrid = Monitoring.Views.ClientSortableGrid.extend({
		template: monitoringInfoGridTmpl,
		itemTemplate: monitoringInfoItemTmpl,

		/*data: function () {
			return {infos: this.collection};
		},*/

		initialize: function (options) {
			this.collection = new Monitoring.Collections.MonitoringInfos();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.call(this);
		}
	});

	/**
	 * Вью таблицы-виджета "Экспресс-анализы"
	 * @type {*}
	 */
	Monitoring.Views.ExpressAnalyses = Monitoring.Views.ClientSortableGrid.extend({
		template: expressAnalysesTmpl,
		itemTemplate: expressAnalysesItemTmpl,

		/*data: function () {
			return {analyses: this.collection};
		},*/

		initialize: function (options) {
			this.collection = new Monitoring.Collections.ExpressAnalyses();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.call(this);
		}
	});

	return Monitoring;
});