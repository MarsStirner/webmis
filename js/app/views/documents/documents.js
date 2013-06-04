/**
 * User: FKurilov
 * Date: 20.05.13
 */
/*define(["text!templates/documents-layout.html"], function (documentsLayoutTmpl) {
	var _documentsLayoutTmpl = _.template(documentsLayoutTmpl);*/

define(function (require) {
	var Backbone = window.Backbone;
	var _ = window._;
	var appealId = 0;

	var dispatcher = _.extend({}, Backbone.Events);

	var templates = {
		_listLayout: _.template(require("text!templates/documents/list/layout.html")),
		_listControls: _.template(require("text!templates/documents/list/controls.html")),
		_listTableControls: _.template(require("text!templates/documents/list/table-controls.html")),
		_documentFilters: _.template(require("text!templates/documents/list/filters.html")),
		_documentTypeSelector: _.template(require("text!templates/documents/list/doc-type-selector.html")),
		_documentsTable: _.template(require("text!templates/documents/list/docs-table.html"))/*,
		_documentsTableRow: _.template(require("text!templates/documents/list/docs-table-row.html")),
		_documentsTableBody: _.template(require("text!templates/documents/list/docs-table-body.html"))*/,
		_editLayout: _.template(require("text!templates/documents/edit/layout.html")),
		_editNavControls: _.template(require("text!templates/documents/edit/nav-controls.html")),
		_editDocumentControls: _.template(require("text!templates/documents/edit/document-controls.html")),
		_editGrid: _.template(require("text!templates/documents/edit/grid.html")),
		_reviewLayout: _.template(require("text!templates/documents/review/layout.html")),
		_reviewControls: _.template(require("text!templates/documents/review/controls.html")),
		_reviewSheet: _.template(require("text!templates/documents/review/sheet.html"))
	};

	/*var rootEl = $('#wrapper');

	var prefix = "test/" + appealId;

	var DocsRouter = Backbone.Router.extend({
		navigate: function (path) {
			return Backbone.Router.prototype.navigate.call(this);
		},

		routes: {
			"": "list",
			"new/:typeId/": "new",
			":id/": "review",
			":id/edit/": "edit"
		},

		list: function () {
			rootEl.html(new Documents.Views.List.Layout().render().el);
		},

		new: function () {
			rootEl.html(new Documents.Views.Edit.Layout().render().el);
		},

		review: function () {
			rootEl.html(new Documents.Views.Review.Layout().render().el);
		},

		edit: function () {
			rootEl.html(new Documents.Views.List.Layout().render().el);
		}
	});

	var docsRouter = new DocsRouter();*/

	/*$(".documents-layout a").on("click", function (event) {
		event.preventDefault();
		docsRouter.navigate($(this).prop("href"));
	});*/


	//Структура модуля
	var Documents = {
		Views: {
			List: {},
			Review: {},
			Edit: {
				UIElement: {}
			}
		},
		Collections: {},
		Models: {}
	};

	//Модели
	//---------------------
	//---------------------

	Documents.Models.DocumentBase = Backbone.Model.extend({});
	Documents.Models.DocumentBase.prototype.sync = Model.prototype.sync;

	Documents.Models.Document = Documents.Models.DocumentBase.extend({
		urlRoot: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/documents/";
		},

		initialize: function (options) {
			this.id = options.id;
			this.appealId = options.appealId || appealId;
		},

		parse: function (raw) {
			var data = Documents.Models.DocumentBase.prototype.parse.call(this, raw);
			return data[0];
		}
	});

	Documents.Models.DocumentTemplate = Documents.Models.DocumentBase.extend({
		urlRoot: DATA_PATH + "dir/actionTypes/"
	});

	Documents.Models.DocumentType = Backbone.Model.extend({});

	Documents.Models.DocumentListItem = Backbone.Model.extend({
		initialize: function (options) {
			if (options && options.appealId) {
				this.appealId = options.appealId
			} else {
				this.appealId = appealId;
			}
		}/*,

		parse: function (raw) {
			var data = Documents.Models.DocumentBase.prototype.parse.call(this, raw);
			return data[0];
		}*/
	});

	//Коллекции
	//---------------------
	//---------------------

	Documents.Collections.DocumentList = Collection.extend({
		model: Documents.Models.DocumentListItem,
		mnems: ["EXAM", "EPI", "JOUR", "ORD"],
		dateRange: null,
		initialize: function (models, options) {
			Collection.prototype.initialize.call(this);
			this.appealId = options.appealId;
		},
		url: function () {
			var url = DATA_PATH + "appeals/" + this.appealId + "/documents/?";

			var params = [];

			if (this.mnems.length) {
				this.mnems.map(function (mnem) { return params.push("filter[mnem]=" + mnem); });
			}

			if (this.dateRange) {
				params.push("filter[begDate]=" + this.dateRange.start);
				params.push("filter[endDate]=" + this.dateRange.end);
			}

			return url + params.join("&");
		}
	});

	Documents.Collections.DocumentTemplates = Collection.extend({
		model: Documents.Models.DocumentTemplate,
		url: function () {
			return DATA_PATH + "dir/actionTypes/";
		}
	});

	Documents.Collections.DocumentTypes = Collection.extend({
		model: Documents.Models.DocumentType,

		url: function () {
			//filter[view]=tree
			return DATA_PATH + "dir/actionTypes/?&filter[mnem]=EXAM&filter[mnem]=EPI&filter[mnem]=JOUR&filter[mnem]=ORD";
		}
	});

	//Представления
	//---------------------
	//---------------------

	//Базовые классы
	var ViewBase = Documents.Views.Base = Backbone.View.extend({
		template: _.template(""),

		data: function () { return {}; },

		//subViews: {},

		assign: function (subViews) {
			this.subViews = _.extend(this.subViews || {}, subViews);
			Backbone.View.prototype.assign.call(this, subViews);
		},

		render: function (subViews) {
			this.$el.html(this.template(this.data()));
			if (subViews) {
				this.subViews = {};
				this.assign(subViews);
			}
			//this.$("button").button();
			return this;
		},

		tearDown: function () {
			/*if (this.model) this.model.off(null, null, this);
			if (this.collection) this.collection.off(null, null, this);*/
			this.stopListening();
			this.tearDownSubviews();
			this.undelegateEvents();
			this.remove();
		},

		tearDownSubviews: function () {
			if (this.subViews) _.each(this.subViews, function (subView) { subView.tearDown(); });
		},

		on: function (event, callback, context) {
			return dispatcher.on(event, callback, context);
		}
	});

	var PopUpBase = Documents.Views.PopUpBase =  ViewBase.extend({
		tearDown: function () {
			console.log("tearing down popup");
			this.$el.dialog("close");
			ViewBase.prototype.tearDown.call(this);
		},

		render: function (subViews) {
			ViewBase.prototype.render.call(this, subViews);
			this.$el.dialog({close: _.bind(this.tearDown, this)}).dialog("open");
			return this;
		}
	});

	var LayoutBase = Documents.Views.LayoutBase = ViewBase.extend({
		className: "container-fluid",

		attributes: {style: "display: table; width: 100%;"},

		topLevel: false,

		initialize: function () {
			this.topLevel = !this.options.included;
		},

		tearDown: function () {
			if (this.topLevel) {
				console.log("dispatcher off");
				dispatcher.off();
			}
			ViewBase.prototype.tearDown.call(this);
		}
	});
	
	var RepeaterBase = Documents.Views.RepeaterBase = ViewBase.extend({

	});

	//Список
	//---------------------

	Documents.Views.List.LayoutLight = LayoutBase.extend({
		template: templates._listLayout,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			if (this.options.appealId) {
				appealId = this.options.appealId;
			}
			this.appealId = appealId;

			this.documents = new Documents.Collections.DocumentList([], {appealId: this.appealId});
			this.documents.fetch();

			this.selectedDocuments = new Backbone.Collection();
			//TODO: listenTo
			//this.selectedDocuments.on("enteredReviewState", this.onEnteredReviewState, this);
			//this.selectedDocuments.on("quitReviewState", this.onQuitReviewState, this);
			this.listenTo(this.selectedDocuments, "enteredReviewState", this.onEnteredReviewState);
			this.listenTo(this.selectedDocuments,"quitReviewState", this.onQuitReviewState);
		},

		onEnteredReviewState: function () {
			this.toggleReviewState(true);
		},

		onQuitReviewState: function () {
			this.toggleReviewState(false);
		},

		toggleReviewState: function (enabled) {
			this.$(".documents-table, .documents-filters, .table-controls").toggle(!enabled);

			if (enabled) {
				this.$el.append('<div class="row-fluid review-area-row"><div class="span12 review-area"></div></div>');
				this.reviewLayout = new Documents.Views.Review.Layout({collection: this.selectedDocuments, included: true});
				this.assign({
					".review-area": this.reviewLayout
				});
			} else {
				this.reviewLayout.tearDown();
				this.$(".review-area-row").remove();
			}
		},

		/*showSelectedDocuments: function () {

			*//*this.selectedDocuments.each(function (selectedDocument) {
				this.$el.append('<div class="row-fluid review-sheet-' + selectedDocument.id + '"></div>');

				var subView = {};
				subView[".review-sheet-" + selectedDocument.id] = new Documents.Views.Review.Sheet({model: selectedDocument});

				this.assign(subView);
			}, this);*//*
		},*/

		render: function (subViews) {
			return LayoutBase.prototype.render.call(this, _.extend({
				".documents-table": new Documents.Views.List.DocumentsTable({collection: this.documents, selectedDocuments: this.selectedDocuments}),
				".documents-filters": new Documents.Views.List.Filters({collection: this.documents}),
				".table-controls": new Documents.Views.List.TableControls({collection: this.selectedDocuments})
				//".review-area": new Documents.Views.Review.Layout({collection: this.selectedDocuments, included: true})
			}, subViews));
		}
	});

	Documents.Views.List.Layout = Documents.Views.List.LayoutLight.extend({
		initialize: function () {
			Documents.Views.List.LayoutLight.prototype.initialize.call(this, this.options);

			this.documentTypes = new Documents.Collections.DocumentTypes();
			this.documentTypes.fetch();
		},

		toggleReviewState: function (enabled) {
			Documents.Views.List.LayoutLight.prototype.toggleReviewState.call(this, enabled);
			this.$(".documents-controls").toggle(!enabled);
		},

		render: function () {
			//this.$(".top-row").prepend('<div class="span6 documents-controls"></div>');

			return Documents.Views.List.LayoutLight.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Controls({collection: this.documents, documentTypes: this.documentTypes})
			});
		}
	});

	//Элементы управления (кнопка "Новый документ" и пр.)
	Documents.Views.List.Controls = ViewBase.extend({
		template: templates._listControls,

		events: {
			"click .new-document": "onNewDocumentClick",
			"click .new-duty-doc-exam": "onNewDutyDocExamClick"
		},

		initialize: function () {
			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.fetch();
			}

			this.listenTo(this.documentTypes, "reset", function () {
				this.$(".new-document,.new-duty-doc-exam").prop("disabled", false);
			});
		},

		onNewDocumentClick: function () {
			this.showDocumentTypeSelector();
		},

		onNewDutyDocExamClick: function () {
			this.openDutyDocExamTemplate();
		},

		showDocumentTypeSelector: function () {
			new Documents.Views.List.DocumentTypeSelector({collection: this.documentTypes}).render();
		},

		openDutyDocExamTemplate: function () {
			//TODO: HARCODED
			dispatcher.trigger("change:viewState", {type: "document-edit", options: {templateId: 139}});
		}
	});

	Documents.Views.List.Filters = ViewBase.extend({
		template: templates._documentFilters,

		events: {
			"change .document-type-filter": "onDocumentTypeFilterChange",
			"change [name='document-create-date-filter']": "onDocumentCreateDateFilterChange"
		},

		onDocumentTypeFilterChange: function (event) {
			var type = $(event.currentTarget).val();
			console.log(type);
			this.applyDocumentTypeFilter(type);
		},

		onDocumentCreateDateFilterChange: function (event) {
			var rangeMnem = $(event.currentTarget).val();

			this.applyDocumentCreateDateFilter(rangeMnem);
		},

		applyDocumentTypeFilter: function (type) {
			var mnems = [];

			switch (type) {
				case "ALL":
					mnems = ["EXAM", "EPI", "ORD", "JOUR", "NOT", "OTH"];
					break;
				case "EXAM":
					mnems = ["EXAM"];
					break;
				case "EPI":
					mnems = ["EPI"];
					break;
				case "ORD":
					mnems = ["ORD"];
					break;
				case "JOUR":
					mnems = ["JOUR"];
					break;
				case "NOT":
					mnems = ["NOT"];
					break;
				case "OTH":
					mnems = ["OTH"];
					break;
			}
			this.collection.mnems = mnems;
			this.collection.fetch();
		},

		applyDocumentCreateDateFilter: function (rangeMnem) {
			var dateRange;

			switch (rangeMnem) {
				case "ALL":
					dateRange = null;
					break;
				case "TODAY":
					dateRange = {
						start: moment().hours(0).minutes(0).seconds(0).toDate().getTime(),
						end: moment().hours(23).minutes(59).seconds(59).toDate().getTime()
					};
					break;
				case "YESTERDAY":
					dateRange = {
						start: moment().subtract("d", 1).hours(0).minutes(0).seconds(0).toDate().getTime(),
						end: moment().subtract("d", 1).hours(23).minutes(59).seconds(59).toDate().getTime()
					};
					break;
				case "FIVE_DAYS":
					dateRange = {
						start: moment().subtract("d", 5).hours(0).minutes(0).seconds(0).toDate().getTime(),
						end: moment().hours(23).minutes(59).seconds(59).toDate().getTime()
					};
					break;
			}

			this.collection.dateRange = dateRange;
			this.collection.fetch();
		}
	});

	//Выбор шаблона документа
	Documents.Views.List.DocumentTypeSelector = PopUpBase.extend({
		template: templates._documentTypeSelector,

		data: function () {
			return {documentTypes: this.collection}
		},

		events: {
			"change .document-type-search-field": "onDocumentTypeSearchFieldChange",
			"click .document-type-node": "onDocumentTypeNodeClick"
		},

		onDocumentTypeSearchFieldChange: function () {
			this.applySearchFilter();
		},

		onDocumentTypeNodeClick: function () {
			var nodeHasChildren;
			if (nodeHasChildren) {
				this.toggleNodeCollapse();
			} else {
				this.markNodeSelected();
			}
		},

		applySearchFilter: function () { console.log("stub:applySearchFilter"); },

		toggleNodeCollapse: function (collapse) { console.log("stub:toggleNodeCollapse"); },

		markNodeSelected: function () { console.log("stub:markNodeSelected"); }
	});

	//Список созданных документов
	Documents.Views.List.DocumentsTable = ViewBase.extend({
		template: templates._documentsTable,

		events: {
			"change .selected-flag": "onSelectedFlagChange"//,
			//"click .document-item-row td": "onDocumentItemRowClick"
		},

		data: function () {
			return {documents: this.collection};
		},

		initialize: function () {
			//TODO: listenTo
			this.listenTo(this.collection, "reset", this.onCollectionReset);
		},

		onCollectionReset: function () {
			this.options.selectedDocuments.reset();
			this.render();
		},

		onSelectedFlagChange: function (event) {
			this.updatedSelectedItems($(event.currentTarget).is(":checked"), parseInt($(event.currentTarget).val()));
		},

		updatedSelectedItems: function (selected, itemId) {
			if (selected) {
				this.options.selectedDocuments.add(new Documents.Models.Document({id: itemId}));
			} else {
				this.options.selectedDocuments.remove(this.options.selectedDocuments.get(itemId));
			}
			console.log(this.options.selectedDocuments);
		}
	});

	Documents.Views.List.TableControls = ViewBase.extend({
		template: templates._listTableControls,

		events: {
			"click .review-selected": "onReviewSelectedClick"
		},

		initialize: function () {
			//TODO: listenTo
			/*this.collection.on("add", this.onSelectedDocumentsAdd, this);
			 this.collection.on("remove", this.onSelectedDocumentsRemove, this);*/
			this.listenTo(this.collection, "add", this.onSelectedDocumentsAdd);
			this.listenTo(this.collection, "remove", this.onSelectedDocumentsRemove);
		},

		onReviewSelectedClick: function (event) {
			this.collection.trigger("enteredReviewState");
		},

		onSelectedDocumentsAdd: function () {
			this.toggleReviewSelectedDisabled(this.collection.length > 0);
		},

		onSelectedDocumentsRemove: function () {
			this.toggleReviewSelectedDisabled(this.collection.length > 0);
		},

		toggleReviewSelectedDisabled: function (enabled) {
			this.$(".review-selected").prop("disabled", !enabled);
		}
	});


	//Редактирование
	//---------------------

	Documents.Views.Edit.Layout = LayoutBase.extend({
		template: templates._editLayout,

		dividedStateEnabled: false,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			this.model = new Documents.Models.DocumentTemplate();
			this.model.id = this.options.templateId;
			this.model.fetch();

			this.listenTo(this.model, "toggle:dividedState", this.toggleDividedState);
		},

		toggleDividedState: function (enabled) {
			enabled = _.isUndefined(enabled) ? !this.dividedStateEnabled : enabled;
			this.dividedStateEnabled = enabled;

			if (enabled) {
				this.$el.parent().css({"margin-left": "0"});
				dispatcher.trigger("change:mainState", {stateName: "documentEditor"});

				this.$(".document-edit-side").removeClass("span12").addClass("span6");

				this.$(".divided").prepend(
					"<div class='document-list-side span6'>" +
						"<div class='row-fluid'>" +
							"<div class='span12 document-list'></div>" +
						"</div>" +
					"</div>"
				);

				this.listLayoutLight =  new Documents.Views.List.LayoutLight({included: true});

				this.assign({".document-list": this.listLayoutLight});

				this.listLayoutLight.$(".documents-controls").remove();
				this.listLayoutLight.$(".documents-filters").removeClass("span6").addClass("span12");
			} else {
				if (this.listLayoutLight) this.listLayoutLight.tearDown(); //ViewBase.prototype.tearDown.call(this.listLayoutLight);
				this.$el.parent().css({"margin-left": "20em"});

				this.$(".document-list-side").remove();
				this.$(".document-edit-side").removeClass("span6").addClass("span12");

				dispatcher.trigger("change:mainState", {stateName: "default"});
			}
		},

		render: function () {
			return ViewBase.prototype.render.call(this, {
				".nav-controls": new Documents.Views.Edit.NavControls({model: this.model}),
				".document-grid": new Documents.Views.Edit.Grid({model: this.model}),
				".document-controls": new Documents.Views.Edit.DocControls({model: this.model})
			});
		}
	});

	//Верхний блок элементов управления и навигации
	Documents.Views.Edit.NavControls = ViewBase.extend({
		template: templates._editNavControls,

		events: {
			"click .toggleDividedState": "onToggleDividedStateClick"
		},

		onToggleDividedStateClick: function () {
			this.model.trigger("toggle:dividedState");
		}
	});

	//Управление сохранением документа
	Documents.Views.Edit.DocControls = ViewBase.extend({
		template: templates._editDocumentControls,

		events: {
			"click .save": "onSaveClick",
			"click .cancel": "onCancelClick"
		},

		initialize: function () {
			this.listenTo(this.model, "change", function () { this.$("button").prop("disabled", false); });
		},

		onSaveClick: function (event) {
			this.model.trigger("toggle:dividedState", false);
			dispatcher.trigger("change:viewState", {type: "documents"});
		},

		onCancelClick: function (event) {
			this.model.trigger("toggle:dividedState", false);
			dispatcher.trigger("change:viewState", {type: "documents"});
		}
	});

	//Сетка (12 колонок по умолчанию)
	Documents.Views.Edit.Grid = ViewBase.extend({
		template: templates._editGrid,

		initialize: function () {
			this.listenTo(this.model, "change", function () { this.$el.html("Готово"); });
		}
	});

	//Ряд в сетке
	Documents.Views.Edit.GridRow = ViewBase.extend({});

	//Ячейка в сетке
	Documents.Views.Edit.GridRowSpan = ViewBase.extend({});

	//Базовый класс UI элемента для поля документа
	Documents.Views.Edit.UIElement.Base = ViewBase.extend({});

	//Shortcut
	var UIElementBase = Documents.Views.Edit.UIElement.Base;

	//Поле типа Constructor
	Documents.Views.Edit.UIElement.Constructor = UIElementBase.extend({});

	//Поле типа String
	Documents.Views.Edit.UIElement.String = UIElementBase.extend({});

	//Поле типа Text
	Documents.Views.Edit.UIElement.Text = UIElementBase.extend({});

	//Поле типа Time
	Documents.Views.Edit.UIElement.Time = UIElementBase.extend({});

	//Поле типа Date
	Documents.Views.Edit.UIElement.Date = UIElementBase.extend({});

	//Поле типа Integer
	Documents.Views.Edit.UIElement.Integer = UIElementBase.extend({});

	//Поле типа Double
	Documents.Views.Edit.UIElement.Double = UIElementBase.extend({});

	//Поле типа MKB
	Documents.Views.Edit.UIElement.MKB = UIElementBase.extend({});

	//Поле типа FlatDirectory
	Documents.Views.Edit.UIElement.FlatDirectory = UIElementBase.extend({});


	//Просмотр
	//---------------------

	Documents.Views.Review.Layout = LayoutBase.extend({
		template: templates._reviewLayout,

		render: function () {
			return LayoutBase.prototype.render.call(this, {
				".review-controls": new Documents.Views.Review.Controls({collection: this.collection}),
				".sheets": new Documents.Views.Review.SheetList({collection: this.collection})
			});
		}
	});

	//Элементы управления
	Documents.Views.Review.Controls = ViewBase.extend({
		template: templates._reviewControls,

		events: {
			"click .back-to-document-list": "onBackToDocumentListClick"
		},

		onBackToDocumentListClick: function () {
			//this.toggleControls();
			this.collection.trigger("quitReviewState");
		}//,

		/*toggleControls: function () {
			this.$(".review-nav").toggle();
		}*/
	});

	//Значения полей из документа
	Documents.Views.Review.SheetList = RepeaterBase.extend({
		initialize: function () {
			this.repeatView = Documents.Views.Review.Sheet;
			this.subViews = [];

		},

		render: function () {
			this.$el.html(this.collection.map(function (item) {
				var itemView = new this.repeatView({model: item});
				this.subViews.push(itemView);
				return itemView.render().el;
			}, this));
		}
	});

	//Значения полей из документа
	Documents.Views.Review.Sheet = ViewBase.extend({
		template: templates._reviewSheet,

		data: function () {
			return {document: this.model};
		},

		initialize: function () {
			this.listenTo(this.model, "reset", this.onModelReset);
			this.model.fetch();
		},

		onModelReset: function () {
			this.render();
		}
	});

	return Documents;
});