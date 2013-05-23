/**
 * User: FKurilov
 * Date: 20.05.13
 */
/*define(["text!templates/documents-layout.html"], function (documentsLayoutTmpl) {
	var _documentsLayoutTmpl = _.template(documentsLayoutTmpl);*/

define(function (require) {
	var Backbone = window.Backbone;
	var _ = window._;

	var templates = {
		_listLayout: _.template(require("text!templates/documents/list/layout.html")),
		_docTypeSelector: _.template(require("text!templates/documents/list/doc-type-selector.html")),
		_docsTable: _.template(require("text!templates/documents/list/docs-table.html")),
		_docsTableRow: _.template(require("text!templates/documents/list/docs-table-row.html"))
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

	//Коллекции
	//---------------------
	//---------------------

	//Модели
	//---------------------
	//---------------------

	//Представления
	//---------------------
	//---------------------

	//Базовый класс
	var BaseView = Documents.Views.Base = Backbone.View.extend({
		template: "",
		data: function () { return {}; },
		render: function () {
			this.$el.html(this.template(this.data())); return this;
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

	Documents.Views.List.Layout = BaseView.extend({
		template: templates._listLayout,
		render: function () {
			BaseView.prototype.render.apply(this);
			this.assign({
				".documents-controls": new Documents.Views.List.Controls(),
				".documents-table": new Documents.Views.List.DocsTable()
			});
			return this;
		}
	});

	//Элементы управления (кнопка "Новый документ" и пр.)
	Documents.Views.List.Controls = BaseView.extend({});

	//Выбор шаблона документа
	Documents.Views.List.DocTypeSelector = BaseView.extend({});

	//Список созданных документов
	Documents.Views.List.DocsTable = BaseView.extend({});

	//Элемент списка
	Documents.Views.List.DocsTableRow = BaseView.extend({});


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