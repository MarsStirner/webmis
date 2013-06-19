/**
 * User: FKurilov
 * Date: 09.04.13
 */
define([
		"text!templates/appeal/edit/pages/monitoring/layout.tmpl",
		"text!templates/appeal/edit/pages/monitoring/header.tmpl",
		"text!templates/appeal/edit/pages/monitoring/patient-info.tmpl",
		"text!templates/appeal/edit/pages/monitoring/patient-blood-type-row.tmpl",
		"text!templates/appeal/edit/pages/monitoring/patient-blood-type-history-row.tmpl",
		"text!templates/appeal/edit/pages/monitoring/signal-info.tmpl",
		"text!templates/appeal/edit/pages/monitoring/assign-exec-person-dialog.tmpl",
		"text!templates/appeal/edit/pages/monitoring/patient-diagnoses-list.tmpl",
		"text!templates/appeal/edit/pages/monitoring/monitoring-info.tmpl",
		"text!templates/appeal/edit/pages/monitoring/monitoring-info-item.tmpl",
		"text!templates/appeal/edit/pages/monitoring/express-analyses.tmpl",
		"text!templates/appeal/edit/pages/monitoring/express-analyses-item.tmpl",

	"views/appeal/edit/pages/card",

	"collections/moves/moves",
		"collections/dictionary-values"
], function(
	monitoringTmpl,
	headerTmpl,
	patientInfoTmpl,
	patientBloodTypesRowTmpl,
	patientBloodTypeHistoryRowTmpl,
	signalInfoTmpl,
	assignExecPersonDialogTmpl,
	patientDiagnosesListTmpl,
	monitoringInfoGridTmpl,
	monitoringInfoItemTmpl,
	expressAnalysesTmpl,
	expressAnalysesItemTmpl,

Card,

Moves,
	DictionaryValues
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

	/**
	 * Экземпляры моделей/коллекций общих для нескольких классов
	 */
	var appeal;
	var appealJSON;
	var bloodTypes;

	// Коллекции
	//////////////////////////////////////////////////////

	/**
	 * Группа крови пациента
	 * @type {*}
	 */
	Monitoring.Models.PatientBloodType = Model.extend({
		/*idAttribute: "id",

		defaults: {
			"id": -1,
			"bloodDate": "",
			"bloodType": {
				"id": "",
				"name": ""
			},
			"person": null
		}*/
	});

	/**
	 * История изменения группы крови пациента
	 * @type {*}
	 */
	Monitoring.Collections.PatientBloodTypes = Collection.extend({
		model: Monitoring.Models.PatientBloodType,

		initialize: function(models, options) {
			this.patientId = options.patientId;
		},

		comparator: function(a, b) {
			var aDatetime = parseInt(a.get("id"));
			var bDatetime = parseInt(b.get("id"));

			if (aDatetime < bDatetime) {
				return 1;
			} else if (aDatetime > bDatetime) {
				return -1;
			} else {
				return 0;
			}
		},

		url: function() {
			return DATA_PATH + "patients/" + this.patientId + "/bloodtypes";
		}
	});

	/**
	 * Модель для таблицы "Мониторинг"
	 * @type {*}
	 */
	Monitoring.Models.MonitoringInfo = Model.extend({
		defaults: {
			datetime: "",
			temperature: "",
			bpras: "",
			bprad: "",
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

		url: function() {
			return DATA_PATH + "appeals/" + appeal.get("id") + "/monitoring";
			//return "/monitoring-info.json";
		},

		getParseMap: function (rawByDate) {
			return _.map(rawByDate, function(rawRow, date) {
				return {
					datetime: +date,
					temperature: rawRow["TEMPERATURE"],
					bpras: rawRow["BPRAS"],
					bprad: rawRow["BPRAS"],
					heartRate: rawRow["PULS"],
					spo2: rawRow["SPO2"],
					breathRate: rawRow["RR"],
					state: rawRow["STATE"],
					health: rawRow["WB"]
				};
			});
		},

		parse: function(raw) {
			var rawByDate = {};

			_.each(raw.data, function(param) {
				_.each(param.values, function(paramValue) {
					if (!rawByDate.hasOwnProperty(paramValue.date)) {
						rawByDate[paramValue.date] = {};
					}
					rawByDate[paramValue.date][param.code] = (paramValue.value !== "0.0" ? paramValue.value : "");
				});
			});

			var parsed = this.getParseMap(rawByDate);

			parsed = parsed
				.sort(function(a, b) {
				var adt = a.datetime;
				var bdt = b.datetime;

				if (adt > bdt) return 1;
				else if (adt < bdt) return -1;
				else return 0;
			})
				.filter(function(row) {
				return _.some(row, function(field, fieldName) {
					return fieldName !== "datetime" && field && field.toString().length;
				});
			})
				.slice(0, 5);

			console.log(rawByDate);
			console.log(parsed);

			return parsed;
		}
	});

	/**
	 * Модель для таблицы "Экспресс-анализы"
	 * @type {*}
	 */
	Monitoring.Models.ExpressAnalysis = Monitoring.Models.MonitoringInfo.extend({
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
	Monitoring.Collections.ExpressAnalyses = Monitoring.Collections.MonitoringInfos.extend({
		model: Monitoring.Models.ExpressAnalysis,

		getParseMap: function(rawByDate) {
			console.log('getParseMap', rawByDate)
			return _.map(rawByDate, function(rawRow, date) {
				return {
					"datetime": +date,
					"k": rawRow["K"],
					"na": rawRow["NA"],
					"ca": rawRow["CA"],
					"glucose": rawRow["GLUCOSE"],
					"protein": rawRow["TP"],
					"urea": rawRow["UREA"],
					"bilubrinOb": rawRow["TB"],
					"bilubrinPr": rawRow["CB"]
				};
			});
		},

		url: function() {
			return DATA_PATH + "appeals/" + appeal.get("id") + "/analyzes";
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
			"assignment": {
				priority: 0,
				title: "Направительный диагноз"
			},
			"admission": {
				priority: 1,
				title: "Диагноз при поступлении"
			},
			"clinical": {
				priority: 2,
				title: "Клинический"
			},
			"final": {
				priority: 3,
				title: "Заключительный"
			},
			"aftereffect": {
				priority: 4,
				title: "Сопутствующий к направительному"
			},
			"attendant": {
				priority: 5,
				title: "Осложнения к направительному"
			},
			"secondaryToClinical": {
				priority: 6,
				title: "Сопутствующий к клиническому"
			},
			"complicateToClinical": {
				priority: 7,
				title: "Осложнения к клиническому"
			}
		},

		url: function() {
			return DATA_PATH + "appeals/" + appeal.get("id") + "/diagnoses/";
		},

		comparator: function(a, b) {
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

		parse: function(raw) {
			var data = Collection.prototype.parse.call(this, raw);

			_.each(data, function(diag) {
				diag.diagnosisKindLabel = this.diagKinds[diag.diagnosisKind].title;
			}, this);

			return data;
		}
	});

	/**
	 * Облегчённая коллекция персонала ЛПУ (без bb.relational)
	 * @type {*}
	 */
	var Persons = Collection.extend({
		model: Backbone.Model.extend({}),

		url: function() {
			return DATA_PATH + "dir/persons";
		}
	});

	var AppealExecPerson = Backbone.Model.extend({
		idAttribute: "id",

		sync: function(method, model, options) {
			options.dataType = "jsonp";
			options.url = model.url();
			options.contentType = 'application/json';

			/*if (method == "create" || method == "update") {
				options.data = JSON.stringify({
					requestData: {},
					data: model.toJSON()
				});
			}*/
			return Backbone.sync(method, model, options);
		},

		url: function() {
			return DATA_PATH + "appeals/" + appeal.get("id") + "/execPerson"
		}
	});

	// Лэйаут
	//////////////////////////////////////////////////////

	/**
	 * Главная вьюха, контейнер для виджетов
	 * @type {*}
	 */
	Monitoring.Views.Layout = Card.extend({
		className: "monitoring-layout",

		template: monitoringTmpl,

		initialize: function() {
			appeal = this.model = this.options.appeal;
			appealJSON = appeal.toJSON();
			this.canPrint = false;
		},

		render: function() {
			this.trigger("change:printState");

			console.time("layout render time");

			this.$el.html(_.template(this.template));

			this.assign({
				".monitoring-layout-header": new Monitoring.Views.Header(),
				".patient-info": new Monitoring.Views.PatientInfo(),
				".signal-info": new Monitoring.Views.SignalInfo(),
				".patient-diagnoses-list": new Monitoring.Views.PatientDiagnosesList(),
				".monitoring-info": new Monitoring.Views.MonitoringInfoGrid(),
				".express-analyses": new Monitoring.Views.ExpressAnalyses()
			});

			console.timeEnd("layout render time");

			return this;
		}
	});


	// Базовые вью для виджетов
	//////////////////////////////////////////////////////

	/**
	 * Базовый класс для простых вьюшек
	 * @type {*}
	 */
	Monitoring.Views.BaseView = Backbone.View.extend({
		template: "",

		data: function() {
			return {};
		},

		initialize: function() {
			this._template = _.template(this.template);
		},

		render: function() {
			this.$el.empty().append(this._template(this.data()));
			return this;
		}
	});

	/**
	 * Базовый класс для виджетов-таблиц сортируемых на клиенте
	 * @type {*}
	 */
	Monitoring.Views.ClientSortableGrid = Backbone.View.extend({
		events: {
			"click th.sortable": "onThSortableClick"
		},

		initialize: function() {
			//вызывается и после фетча и после сорта
			this.collection.on("reset", this.render, this).fetch();
			//в нашей версии бэкбона - нету :(
			//this.collection.on("sort", this.renderItems, this);
		},

		onThSortableClick: function(event) {
			var $target = $(event.currentTarget);

			var sortConditions = this.updateSortConditions($target);
			this.applySort(sortConditions);
		},

		/**
		 * Применяет сортировку коллекции по переданным памметрам
		 * @param sortConditions {{sortField: string, sortType: string, sortDirection: "desc" || "asc"}}
		 */
		applySort: function(sortConditions) {
			this.collection.comparator = this.getComparator(sortConditions.sortField, sortConditions.sortType, sortConditions.sortDirection);
			this.collection.sort({
				sortRequest: true
			});
		},

		/**
		 * Добавляет визуальную индикацию текущей сортировки, извлекает и возвращает выбранные параметры сортировки
		 * @param $targetTh
		 * @returns {{sortField: string, sortType: string, sortDirection: "desc" || "asc"}}
		 */
		updateSortConditions: function($targetTh) {
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
		getComparator: function(fieldName, sortType, sortDirection) {
			switch (sortType) {
				case "datetime":
				case "numeric":
					return function(itemA, itemB) {
						var a = parseFloat(itemA.get(fieldName)),
							b = parseFloat(itemB.get(fieldName));

						if (a > b || isNaN(b)) return sortDirection === "asc" ? 1 : -1;
						else if (a < b || isNaN(a)) return sortDirection === "asc" ? -1 : 1;
						else return 0;
					};
				default:
					return function(itemA, itemB) {
						var a = itemA.get(fieldName).toString(),
							b = itemB.get(fieldName).toString();

						if (a > b) return sortDirection === "asc" ? 1 : -1;
						else if (a < b) return sortDirection === "asc" ? -1 : 1;
						else return 0;
					};
			}
		},

		/**
		 * Перерисовывает только ряды таблицы
		 */
		renderItems: function() {
			/*this.$("tbody").empty().append(this.collection.map(function (item) {
				return _.template(this.itemTemplate, {item: item});
			}, this));*/
			this.$("tbody").empty().append(_.template(this.itemTemplate, {
				collection: this.collection
			}));
		},

		render: function(c, options) {
			//этот параметр передаётся только при сортировке, и в этом случае
			//мы хотим отрендерить только ряды
			options = options || {
				sortRequest: false
			};
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
	 * Заголовок страницы
	 * @type {*}
	 */
	Monitoring.Views.Header = Monitoring.Views.BaseView.extend({
		template: headerTmpl,

		data: function() {
			return {
				appealNumber: appeal.get("number"),
				appealIsUrgent: appeal.get("urgent"),
				appealIsClosed: appeal.closed
			};
		}
	});

	/**
	 * Сведения о пациенте
	 * @type {*}
	 */
	Monitoring.Views.PatientInfo = Monitoring.Views.BaseView.extend({
		template: patientInfoTmpl,

		data: function() {
			return {
				appeal: appealJSON,
				patient: appealJSON.patient
			};
		},

		render: function() {
			Monitoring.Views.BaseView.prototype.render.apply(this);

			this.assign({
				".patient-blood-type": new Monitoring.Views.PatientBloodTypeRow(),
				".patient-blood-type-history": new Monitoring.Views.PatientBloodTypeHistoryRow()
			});

			this.$(".patient-blood-type-history").hide();

			return this;
		}
	});

	/**
	 * Текущая группа крови пациента
	 * @type {*}
	 */
	Monitoring.Views.PatientBloodTypeRow = Monitoring.Views.BaseView.extend({
		template: patientBloodTypesRowTmpl,

		data: function() {
			return {
				currentBloodType: appeal.get("patient").get("medicalInfo").get("blood"),
				bloodTypes: this.bloodTypesDict,
				canChangeBloodType:this.canChangeBloodType
			};
		},

		events: {
			"click .edit-blood": "onEditBloodClick",
			"click .save-blood": "onSaveBloodClick",
			"click .cancel-blood": "onCancelBloodClick",
			"click .show-patient-blood-history": "onShowPatientBloodHistory"
		},

		historyShown: false,

		initialize: function(options) {
			Monitoring.Views.BaseView.prototype.initialize.apply(this);

			if (!bloodTypes) {
				bloodTypes = new Monitoring.Collections.PatientBloodTypes([], {
					patientId: appeal.get("patient").get("id")
				});
			}
			this.collection = bloodTypes;

			this.bloodTypesDict = new DictionaryValues([], {
				name: "bloodTypes"
			});

			this.bloodTypesDict.on("reset", this.render, this).fetch();

			if (appeal.closed) {
				this.canChangeBloodType = false;
			}else{
				this.canChangeBloodType = true;
			}
		},

		onEditBloodClick: function(event) {
			event.preventDefault();

			this.toggleEditState(true);
		},

		onSaveBloodClick: function(event) {
			event.preventDefault();

			var self = this;
			var newBloodId = parseInt(this.$(".blood-type").val());
			var newBloodName = this.$(".blood-type option:selected").text();

			if (newBloodId != this.data().currentBloodType.get("id")) {
				this.collection.create({
					"bloodDate": new Date().getTime(),
					"bloodType": {
						"id": newBloodId,
						"name": newBloodName
					}
				}, {
					success: function() {
						pubsub.trigger("noty", {
							text: "Группа крови пациента изменена."
						});
						self.collection.fetch();
					},
					error: function() {
						pubsub.trigger("noty", {
							text: "Ошибка при изменении группы крови."
						});
						self.collection.fetch();
					}
				});
			}

			//this.$(".show-patient-blood-history").text(this.$(".blood-type option:selected").html());
			appeal.get("patient").get("medicalInfo").get("blood").set({
				id: newBloodId,
				group: newBloodName
			});

			this.toggleEditState(false);
		},

		onCancelBloodClick: function(event) {
			event.preventDefault();

			this.toggleEditState(false);
		},

		onShowPatientBloodHistory: function(event) {
			event.preventDefault();
			var $target = $(event.currentTarget);

			this.historyShown = !this.historyShown;

			$target.prop("title", this.historyShown ? "Скрыть историю изменения" : "Показать историю изменения");

			this.collection.trigger(this.historyShown ? "request:show" : "request:hide");
		},

		toggleEditState: function(enabled) {
			if (enabled) {
				this.$("td").first().prop("colspan", 2);
				this.$("td").last().hide();
				this.$(".current-blood-type").hide();
				this.$(".blood-type-selector").show();
				this.$(".blood-type").focus();

				this.$el.css({
					"background-color": "whitesmoke"
				});
			} else {
				this.$("td").first().prop("colspan", 1);
				this.$("td").last().show();
				this.$el.css({
					"background-color": "white"
				});
				this.render();
			}
		},

		render: function() {
			Monitoring.Views.BaseView.prototype.render.apply(this);

			this.$(".blood-type-selector").hide();

			this.$(".save-blood").button();

			this.$(".edit-blood").button();

			return this;
		}
	});

	/**
	 * Истрория изменения группы крови
	 * @type {*}
	 */
	Monitoring.Views.PatientBloodTypeHistoryRow = Monitoring.Views.BaseView.extend({
		template: patientBloodTypeHistoryRowTmpl,

		data: function() {
			return {
				bloodTypeHistory: this.collection
			};
		},

		events: {

		},

		initialize: function(options) {
			Monitoring.Views.BaseView.prototype.initialize.apply(this);

			if (!bloodTypes) {
				bloodTypes = new Monitoring.Collections.PatientBloodTypes([], {
					patientId: appeal.get("patient").get("id")
				});
			}
			this.collection = bloodTypes;
			this.collection
				.on("request:show", this.toggleVisible, this)
				.on("request:hide", this.toggleVisible, this)
			//.on("add", this.render, this)
			.on("reset", this.render, this)
				.fetch();
		},

		toggleVisible: function(event) {
			this.$el.toggle();
		}
	});

	/**
	 * Блок сигнальной информации о пациенте
	 * @type {*}
	 */
	Monitoring.Views.SignalInfo = Monitoring.Views.BaseView.extend({
		template: signalInfoTmpl,

		data: function() {
			return {
				lastMove: this.moves.last(),
				appeal: appealJSON,
				appealExtraData: Core.Data.appealExtraData.toJSON(),
				days: this.days,
				canAssign:this.canAssign
			};
		},

		events: {
			"click .assign-exec-person": "onAssignExecPersonClick"
		},

		initialize: function() {
			Monitoring.Views.BaseView.prototype.initialize.apply(this);

			this.moves = new Moves();
			this.moves.appealId = appeal.get("id");
			//console.log("fetching moves");
			this.moves.on("reset", this.render, this).fetch();
			//продолжительность лечения
			if (appealJSON.appealType.requestType.id === 1) {
				//дневной стационар
				this.days = moment().diff(moment(appealJSON.rangeAppealDateTime.start), "days") + 1;
			} else if (appealJSON.appealType.requestType.id === 2) {
				//круглосуточный стационар
				this.days = moment().diff(moment(appealJSON.rangeAppealDateTime.start), "days");
			}


			if (appeal.closed) {
				this.canAssign = false;
			}else{
				this.canAssign = true;
			}


			Core.Data.appealExtraData.get("execPerson").on("change:doctor", this.onExecPersonDoctorChange, this);

			if (!Core.Data.appealExtraData.get("execPerson").get("doctor").get("id")) {
				pubsub.trigger("noty", {
					text: "Требуется назначить лечащего врача.",
					type: "alert"
				});
			}
		},

		onAssignExecPersonClick: function(event) {
			event.preventDefault();
			this.openExecPersonAssignmentDialog();
		},

		onExecPersonDoctorChange: function() {
			this.render();
		},

		openExecPersonAssignmentDialog: function() {
			new Monitoring.Views.ExecPersonAssignmentDialog().render().open();
		},

		render: function() {
			this.$el.empty().append(this._template(this.data()));

			this.$('.assign-exec-person').button();
			return this;
		}
	});

	/**
	 * Диалог назначения врача
	 * @type {*}
	 */
	Monitoring.Views.ExecPersonAssignmentDialog = Monitoring.Views.BaseView.extend({
		template: assignExecPersonDialogTmpl,

		data: function () {
			return {
				assignMe: this.assignMe
			};
		},

		events: {
			"change input[name='filter-persons']": "onFilterPersonsChange",
			"click .assign-on-me": "onAssignOnMeClick"
		},

		initialize: function(options) {
			Monitoring.Views.BaseView.prototype.initialize.apply(this);
			_.bindAll(this);

			//Все врачи
			this.allPersons = new Persons();
			this.allPersons.setParams({
				limit: 999,
				sortingField:'lastname'
			});
			this.allPersons.on("reset", this.addAllPersons, this).fetch();

			//Врачи отделения
			this.departmentPersons = new Persons();
			this.departmentPersons.setParams({
				limit: 999,
				sortingField:'lastname',
				filter: {
					departmentId: appeal.get("currentDepartment").id
				}
			});
			this.departmentPersons.on("reset", this.addDepartmentPersons, this).fetch();

			this.assignMe = true;

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				this.assignMe = false;
			}

		},

		open: function() {
			this.$el.dialog({
				title: "Назначение лечащего врача",
				modal: true,
				width: "50em",
				dialogClass: "webmis",
				resizable: false,
				buttons: [{
						text: "Назначить",
						click: this.assignExecPerson,
						"class": "button-color-green"
					}, {
						text: "Отмена",
						click: this.close
					}
				],
				close: this.close
			});

			this.$el.css({
				"min-height": "11em"
			});
		},

		close: function() {
			this.allPersons.off(null, null, this);
			this.departmentPersons.off(null, null, this);
			this.off(null, null, this).remove();
		},

		onFilterPersonsChange: function(event) {
			this.$(".all-persons,.department-persons").select2("val", "");

			var selectedFilter = this.getSelectedFilter();

			if (selectedFilter === "all") {
				this.$(".all-persons.select2-container").show();
				this.$(".department-persons.select2-container").hide();
			} else if (selectedFilter === "dep") {
				this.$(".all-persons.select2-container").hide();
				this.$(".department-persons.select2-container").show();
			}
		},

		onAssignOnMeClick: function(event) {
			event.preventDefault();

			var currentUserId = Core.Cookies.get("userId");

			this.$("input[name='filter-persons'][value='all']").prop("checked", true).change();
			this.$(".all-persons").select2("val", currentUserId).change();
		},

		getSelectedFilter: function() {
			return this.$("input[name='filter-persons']:checked").val();
		},

		assignExecPerson: function() {
			var selectedFilter = this.getSelectedFilter();

			var selectedExecPersonId;

			if (selectedFilter === "all") {
				selectedExecPersonId = this.$(".all-persons").select2("val");
			} else if (selectedFilter === "dep") {
				selectedExecPersonId = this.$(".department-persons").select2("val");
			}

			if (selectedExecPersonId) {
				var appealExecPerson = new AppealExecPerson();
				appealExecPerson.save({
					id: selectedExecPersonId
				});

				Core.Data.appealExtraData.get("execPerson").set({
					doctor: this.allPersons.get(selectedExecPersonId).toJSON()
				});

				this.close();
			}
		},

		addAllPersons: function() {
			this.$(".all-persons").append(this.allPersons.map(function(person) {
				return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
			})).select2("enable");
		},

		addDepartmentPersons: function() {
			this.$(".department-persons").append(this.departmentPersons.map(function(person) {
				return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
			})).select2("enable");
		},

		render: function() {
			Monitoring.Views.BaseView.prototype.render.apply(this);

			this.$("#filter-persons-container").buttonset();
			this.$(".all-persons, .department-persons").select2().select2("disable");
			this.$(".all-persons").hide();

			return this;
		}
	});

	/**
	 * Список диагнозов пациента
	 * @type {*}
	 */
	Monitoring.Views.PatientDiagnosesList = Monitoring.Views.BaseView.extend({
		template: patientDiagnosesListTmpl,

		data: function() {
			return {
				diagnoses: this.collection
			};
		},

		initialize: function(options) {
			Monitoring.Views.BaseView.prototype.initialize.apply(this);

			this.collection = new Monitoring.Collections.PatientDiagnoses();
			console.log("fetching diagnoses");
			this.collection.on("reset", this.render, this).fetch();
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

		initialize: function(options) {
			this.collection = new Monitoring.Collections.MonitoringInfos();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.apply(this);
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

		initialize: function(options) {
			this.collection = new Monitoring.Collections.ExpressAnalyses();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.apply(this);
		}
	});

	return Monitoring;
});
