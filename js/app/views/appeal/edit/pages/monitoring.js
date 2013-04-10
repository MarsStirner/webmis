/**
 * User: FKurilov
 * Date: 09.04.13
 */
define([
	"text!templates/appeal/edit/pages/monitoring/layout.tmpl",
	"text!templates/appeal/edit/pages/monitoring/monitoring-info.tmpl",
	"text!templates/appeal/edit/pages/monitoring/monitoring-info-item.tmpl",
	"text!templates/appeal/edit/pages/monitoring/express-analyses.tmpl",
	"text!templates/appeal/edit/pages/monitoring/express-analyses-item.tmpl"
], function (monitoringTmpl, monitoringInfoTmpl, monitoringInfoItemTmpl, expressAnalysesTmpl, expressAnalysesItemTmpl) {
	var Monitoring = {
		Views: {},
		Collections: {},
		Models: {}
	};

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

	Monitoring.Models.ExpressAnalysis = Model.extend({
		defaults: {
			"datetime": 1365514653953,
			"k": 186.1,
			"na": 132.5,
			"ca": 168.2,
			"glucose": 111.3,
			"protein": 321.12,
			"urea": 156.31,
			"bilubrinOb": 123.4,
			"bilubrinPr": 153.1
		}
	});

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

	Monitoring.Views.Layout = View.extend({
		className: "monitoring-layout",

		template: monitoringTmpl,

		events: {
			//Изменть группу крови, назначить врача
		},

		initialize: function () {
			this.monitoringInfo = new Monitoring.Views.MonitoringInfo();
			this.expressAnalyses = new Monitoring.Views.ExpressAnalyses();
		},

		data: function () {
			var appealJSON = this.options.appeal.toJSON();
			return {
				appeal: appealJSON,
				patient: appealJSON.patient,
				appealExtraData: Core.Data.appealExtraData.toJSON(),
				diagnoses: []
			};
		},

		render: function () {
			this.$el.html(_.template(monitoringTmpl, this.data()));

			this.assign({
				".monitoring-info": this.monitoringInfo,
				".express-analyses": this.expressAnalyses
			});

			return this;
		}
	});

	Monitoring.Views.ClientSortableGrid = View.extend({
		events: {
			"click th.sortable": "onThSortableClick"
		},

		initialize: function () {
			this.collection.on("reset", this.render, this);
			this.collection.on("sort", this.renderItems, this);
			this.collection.fetch();
		},

		onThSortableClick: function (event) {
			this.applySort($(event.currentTarget).data("sort-field"), $(event.currentTarget).data("sort-type"));
			this.updateSortCaret($(event.currentTarget));
		},

		applySort: function (sortField, sortType) {
			this.collection.comparator = this.getComparator(sortField, sortType);
			this.collection.sort({sortRequest: true});
		},

		updateSortCaret: function ($targetTh) {
			if (!this.$caret) {
				this.$caret = $('<i/>');
			}

			this.$caret.detach().removeClass();

			if ($targetTh.hasClass("sorted")) {
				if ($targetTh.hasClass("asc")) {
					$targetTh.removeClass("asc").addClass("desc");
					this.$caret.addClass("icon-caret-up");
				} else if ($targetTh.hasClass("desc")) {
					$targetTh.removeClass("desc").addClass("asc");
					this.$caret.addClass("icon-caret-down");
				}
			} else {
				this.$("th").removeClass("sorted asc desc");
				$targetTh.addClass("sorted asc");
				this.$caret.addClass("icon-caret-down");
			}

			this.$caret.appendTo($targetTh);
		},

		getComparator: function (fieldName, sortType) {
			return function (item) {
				return item.get(fieldName);
			};
		},

		renderItems: function () {
			this.$("tbody").empty().append(this.collection.map(function (item) {
				return _.template(this.itemTemplate, {item: item});
			}, this));
		},

		render: function (c, options) {
			options = options || {sortRequest: false};
			if (!options.sortRequest) {
				this.$el.html(_.template(this.template, this.data()));
			}

			this.renderItems();

			return this;
		}
	});

	Monitoring.Views.MonitoringInfo = Monitoring.Views.ClientSortableGrid.extend({
		template: monitoringInfoTmpl,
		itemTemplate: monitoringInfoItemTmpl,

		data: function () {
			return {infos: this.collection};
		},

		initialize: function (options) {
			this.collection = new Monitoring.Collections.MonitoringInfos();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.call(this);
		}
	});

	Monitoring.Views.ExpressAnalyses = Monitoring.Views.ClientSortableGrid.extend({
		template: expressAnalysesTmpl,
		itemTemplate: expressAnalysesItemTmpl,

		data: function () {
			return {analyses: this.collection};
		},

		initialize: function (options) {
			this.collection = new Monitoring.Collections.ExpressAnalyses();
			Monitoring.Views.ClientSortableGrid.prototype.initialize.call(this);
		}
	});

	return Monitoring;
});