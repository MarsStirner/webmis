/**
 * User: FKurilov
 * Date: 20.05.13
 */
/*define(["text!templates/documents-layout.html"], function (documentsLayoutTmpl) {
	var _documentsLayoutTmpl = _.template(documentsLayoutTmpl);*/

define(function (require) {
	var Backbone = window.Backbone;
	var _ = window._;
	var appealId = 123;

	var dispatcher = _.extend({}, Backbone.Events);

	var templates = {
		_listLayout: _.template(require("text!templates/documents/list/layout.html")),
		_listControls: _.template(require("text!templates/documents/list/controls.html")),
		_documentTypeSelector: _.template(require("text!templates/documents/list/doc-type-selector.html")),
		_docsTable: _.template(require("text!templates/documents/list/docs-table.html"))/*,
		_docsTableRow: _.template(require("text!templates/documents/list/docs-table-row.html")),
		_docsTableBody: _.template(require("text!templates/documents/list/docs-table-body.html"))*/
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
	Documents.Models.Document = Documents.Models.DocumentBase.extend({});
	Documents.Models.DocumentTemplate = Documents.Models.DocumentBase.extend({
		urlRoot: DATA_PATH + "dir/actionTypes/"
	});

	Documents.Models.DocumentType = Backbone.Model.extend({});

	//Коллекции
	//---------------------
	//---------------------

	Documents.Collections.Documents = Collection.extend({
		model: Documents.Models.Document,
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
			return DATA_PATH + "dir/actionTypes/?filter[view]=tree&filter[mnem]=EXAM&filter[mnem]=EPI&filter[mnem]=JOUR&filter[mnem]=ORD";
		}
	});

	//Представления
	//---------------------
	//---------------------

	//Базовый класс
	var BaseView = Documents.Views.Base = Backbone.View.extend({
		template: _.template(""),

		data: function () { return {}; },

		subViews: {},

		render: function (subViews) {
			this.$el.html(this.template(this.data()));
			if (subViews) {
				this.subViews = subViews;
				this.assign(subViews);
			}
			return this;
		},

		tearDown: function () {
			if (this.model) this.model.off(null, null, this);
			if (this.collection) this.collection.off(null, null, this);
			if (this.subViews) _.each(this.subViews, function (subView) { subView.tearDown(); });
			this.undelegateEvents();
			this.remove();
		}
	});

	var BasePopUp = BaseView.extend({
		tearDown: function () {
			console.log("tearing down popup");
			this.$el.dialog("close");
			BaseView.prototype.tearDown.call(this);
		},

		render: function (subViews) {
			BaseView.prototype.render.call(this, subViews);
			this.$el.dialog({close: _.bind(this.tearDown, this)}).dialog("open");
			return this;
		}
	});

	//Базовый класс для лэйаутов
	/*Documents.Views.Layout = Documents.Views.Base.extend({
		views: {},
		render: function () {
			Documents.Views.Base.prototype.render.apply(this);
			this.assign(this.views);
			return this;
		}
	});*/

	/*Documents.Views.Layout = BaseView.extend({
		initialize: function () {
			dispatcher.on("setState", this.setState, this);
		},

		tearDown: function () {
			dispatcher.off(null);
			BaseView.prototype.tearDown.call(this);
		},

		setState: function (event) {
			this.tearDown();

			switch (event.state) {
				case "LIST":
					this.render();
					break;
				case "EDIT":
					this.render({".right-container": new Documents.Views.Edit.Layout(this.options)});
					break;
				case "LIST_AND_EDIT":
					this.render({
						".right-container": new Documents.Views.Edit.Layout(this.options),
						".left-container": new Documents.Views.Edit.Layout(this.options)
					});
					break;
				case "REVIEW":
					this.render({".right-container": new Documents.Views.Review.Layout(this.options)});
					break;
			}
		},

		render: function (stateViews) {
			if (stateViews) {
				return BaseView.prototype.render.call(this, stateViews);
			} else {
				return BaseView.prototype.render.call(this, {
					".right-container": new Documents.Views.List.Layout(this.options)
				});
			}
		}
	});*/

	//Список
	//---------------------

	Documents.Views.List.Layout = BaseView.extend({
		class: "documents-layout",

		attributes: {style: "display: table;"},

		template: templates._listLayout,

		initialize: function () {
			this.documents = new Documents.Collections.Documents([], {appealId: this.options.appealId});
			this.documents.fetch();

			this.documentTypes = new Documents.Collections.DocumentTypes();
			this.documentTypes.fetch();

			dispatcher.on("change:viewState", function (event) {
				this.trigger("change:viewState", event);
			}, this);
		},

		tearDown: function () {
			dispatcher.off("change:viewState");
			BaseView.prototype.tearDown.call(this);
		},

		render: function () {
			return BaseView.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Controls({collection: this.documents, documentTypes: this.documentTypes}),
				".documents-table": new Documents.Views.List.DocsTable({collection: this.documents})
			});
		}
	});

	//Элементы управления (кнопка "Новый документ" и пр.)
	Documents.Views.List.Controls = BaseView.extend({
		template: templates._listControls,

		events: {
			"click .new-document": "onNewDocumentClick",
			"click .new-duty-doc-exam": "onNewDutyDocExamClick",
			"change .document-type-filter": "onDocumentTypeFilterChange",
			"change [name='document-create-date-filter']": "onDocumentCreateDateFilterChange"
		},

		initialize: function () {
			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.fetch();
			}
			this.documentTypes.on("reset", function () {
				this.$(".new-document,.new-duty-doc-exam").prop("disabled", false);
			}, this);
		},

		onNewDocumentClick: function () {
			this.showDocumentTypeSelector();
		},

		onNewDutyDocExamClick: function () {
			this.openDutyDocExamTemplate();
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

		showDocumentTypeSelector: function () {
			new Documents.Views.List.DocumentTypeSelector({collection: this.documentTypes}).render();
		},

		openDutyDocExamTemplate: function () {
			//TODO: HARCODED
			dispatcher.trigger("change:viewState", {type: "document-edit", options: {templateId: 139}});
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
	Documents.Views.List.DocumentTypeSelector = BasePopUp.extend({
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
			}
			else {
				this.markNodeSelected();
			}
		},

		applySearchFilter: function () { console.log("stub:applySearchFilter"); },

		toggleNodeCollapse: function (collapse) { console.log("stub:toggleNodeCollapse"); },

		markNodeSelected: function () { console.log("stub:markNodeSelected"); }
	});

	//Список созданных документов
	Documents.Views.List.DocsTable = BaseView.extend({
		template: templates._docsTable,

		data: function () {
			return {documents: this.collection};
		},

		initialize: function () {
			this.collection.on("reset", this.onCollectionReset, this)
		},

		onCollectionReset: function () {
			this.render();
		}
		/*,

		render: function () {
			return BaseView.prototype.call(this, {
				"tbody": new Documents.Views.List.DocsTableBody({collection: this.collection})
			});
		}*/
	});

	/*//Элемент списка
	Documents.Views.List.DocsTableRow = BaseView.extend({
		template: templates._docsTableRow
	});

	//Тело таблицы
	Documents.Views.List.DocsTableBody = BaseView.extend({
		template: templates._docsTableBody
	});*/


	//Редактирование
	//---------------------

	Documents.Views.Edit.Layout = BaseView.extend({
		attributes: {style: "display: table;"},

		initialize: function () {
			this.model = new Documents.Models.DocumentTemplate();
			this.model.id = this.options.templateId;
			this.model.fetch();
		},

		render: function () {
			return BaseView.prototype.render.call(this, {
				".nav-controls": new Documents.Views.Edit.NavControls({model: this.model}),
				".document-grid": new Documents.Views.Edit.Grid({model: this.model}),
				".document-controls": new Documents.Views.Edit.DocControls({model: this.model})
			});
		}
	});

	//Верхний блок элементов управления и навигации
	Documents.Views.Edit.NavControls = BaseView.extend({});

	//Управление сохранением документа
	Documents.Views.Edit.DocControls = BaseView.extend({});

	//Сетка (12 колонок по умолчанию)
	Documents.Views.Edit.Grid = BaseView.extend({});

	//Ряд в сетке
	Documents.Views.Edit.GridRow = BaseView.extend({});

	//Ячейка в сетке
	Documents.Views.Edit.GridRowSpan = BaseView.extend({});

	//Базовый класс UI элемента для поля документа
	Documents.Views.Edit.UIElement.Base = BaseView.extend({});

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

	Documents.Views.Review.Layout = BaseView.extend({});

	//Элементы управления
	Documents.Views.Review.Controls = BaseView.extend({});

	//Значения полей из документа
	Documents.Views.Review.DocumentValues = BaseView.extend({});

	return Documents;
});