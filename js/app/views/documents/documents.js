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

	/*var docsRouter = new (Backbone.Router.extend({
		routes: {

		}
	}));*/

	var templates = {
		_listLayout: _.template(require("text!templates/documents/list/layout.html")),
		_listControls: _.template(require("text!templates/documents/list/controls.html")),
		_documentTypeSelector: _.template(require("text!templates/documents/list/doc-type-selector.html")),
		_docsTable: _.template(require("text!templates/documents/list/docs-table.html"))/*,
		_docsTableRow: _.template(require("text!templates/documents/list/docs-table-row.html")),
		_docsTableBody: _.template(require("text!templates/documents/list/docs-table-body.html"))*/
	};

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
	Documents.Models.DocumentTemplate = Documents.Models.DocumentBase.extend({});

	Documents.Models.DocumentType = Backbone.Model.extend({});

	//Коллекции
	//---------------------
	//---------------------

	Documents.Collections.Documents = Collection.extend({
		model: Documents.Models.Document,
		urlRoot: DATA_PATH + "appeals/" + appealId + "/documents/"
	});

	Documents.Collections.DocumentTemplates = Collection.extend({
		model: Documents.Models.DocumentTemplate,
		urlRoot: DATA_PATH + "/dir/actionTypes/"
	});

	Documents.Collections.DocumentTypes = Collection.extend({
		model: Documents.Models.DocumentType,
		url: function () { return DATA_PATH + "/dir/actionTypes/"; }
	});

	//Представления
	//---------------------
	//---------------------

	//Базовый класс
	var BaseView = Documents.Views.Base = Backbone.View.extend({
		template: _.template(""),

		data: function () { return {}; },

		render: function (subViews) {
			this.$el.html(this.template(this.data()));
			if (subViews) this.assign(subViews);
			return this;
		},

		cleanUp: function () {
			if (this.model) this.model.off(null, null, this);
			if (this.collection) this.collection.off(null, null, this);
			this.undelegateEvents();
			this.remove();
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

	//Список
	//---------------------

	var documents = new Documents.Collections.Documents([
		{id: 1, name: "Документ 1", createDate: 1369315701540},
		{id: 2, name: "Документ 2", createDate: 1369315701545},
		{id: 3, name: "Документ 3", createDate: 1369315701546},
		{id: 4, name: "Документ 4", createDate: 1369315701547},
		{id: 5, name: "Документ 5", createDate: 1369315701548}
	]);

	Documents.Views.List.Layout = BaseView.extend({
		template: templates._listLayout,

		render: function () {
			return BaseView.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Controls({collection: documents}),
				".documents-table": new Documents.Views.List.DocsTable({collection: documents})
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

		onNewDocumentClick: function () {
			this.showDocumentTypeSelector();
		},

		onNewDutyDocExamClick: function () {
			this.openDutyDocExamTemplate();
		},

		onDocumentTypeFilterChange: function () {
			var type = 'EXAM';
			this.applyDocumentTypeFilter(type);
		},

		onDocumentCreateDateFilterChange: function () {
			var date = new Date();
			this.applyDocumentCreateDateFilter(date);
		},

		showDocumentTypeSelector: function () { console.log("stub:showDocumentTypeSelector", arguments); },

		openDutyDocExamTemplate: function () { console.log("stub:openDutyDocExamTemplate", arguments); },

		applyDocumentTypeFilter: function (type) { console.log("stub:applyDocumentTypeFilter", arguments); },

		applyDocumentCreateDateFilter: function (date) { console.log("stub:applyDocumentCreateDateFilter", arguments); }
	});

	//Выбор шаблона документа
	Documents.Views.List.DocumentTypeSelector = BaseView.extend({
		template: templates._documentTypeSelector,

		data: function () {
			return {documentTypes: this.collection}
		},

		events: {
			"change .document-type-search-field": "onDocumentTypeSearchFieldChange",
			"click .document-type-node": "onDocumentTypeNodeClick"
		},

		initialize: function () {
			this.collection = new Documents.Collections.DocumentTypes([
				{id:1, name: "Документ 1"},
				{id:2, name: "Документ 2", children: [
					{id:1, name: "Документ 3"}
				]}
			]);
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
			this.collection.on("reset", this.render, this)
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

	Documents.Views.Edit.Layout = Backbone.View.extend({});

	//Верхний блок элементов управления и навигации
	Documents.Views.Edit.NavControls = Backbone.View.extend({});

	//Управление сохранением документа
	Documents.Views.Edit.DocControls = Backbone.View.extend({});

	//Сетка (12 колонок по умолчанию)
	Documents.Views.Edit.Grid = Backbone.View.extend({});

	//Ряд в сетке
	Documents.Views.Edit.GridRow = Backbone.View.extend({});

	//Ячейка в сетке
	Documents.Views.Edit.GridRowSpan = Backbone.View.extend({});

	//Базовый класс UI элемента для поля документа
	Documents.Views.Edit.UIElement.Base = Backbone.View.extend({});

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

	Documents.Views.Review.Layout = Backbone.View.extend({});

	//Элементы управления
	Documents.Views.Review.Controls = Backbone.View.extend({});

	//Значения полей из документа
	Documents.Views.Review.DocValues = Backbone.View.extend({});

	return Documents;
});