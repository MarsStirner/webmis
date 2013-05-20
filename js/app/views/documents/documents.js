/**
 * User: FKurilov
 * Date: 20.05.13
 */
define(function (require) {
	/**
	 * Структура модуля
	 * @type {{Views: {}, Collections: {}, Models: {}}}
	 */
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

	//Модели

	//Представления

	//Базовый класс
	Documents.Views.Base = Backbone.View.extend({});

	//Лэйаут верхнего уровня
	Documents.Views.Layout = Backbone.View.extend({});

	//Список
	Documents.Views.List.Layout = Backbone.View.extend({});
	//Элементы управления (кнопка "Новый документ" и пр.)
	Documents.Views.List.Controls = Backbone.View.extend({});
	//Выбор шаблона
	Documents.Views.List.DocTypeSelector = Backbone.View.extend({});
	//Список созданных документов
	Documents.Views.List.DocsTable = Backbone.View.extend({});
	//Элемент списка
	Documents.Views.List.DocsTableRow = Backbone.View.extend({});

	//Редактирование
	Documents.Views.Edit.Layout = Backbone.View.extend({});
	Documents.Views.Edit.NavControls = Backbone.View.extend({});
	Documents.Views.Edit.DocControls = Backbone.View.extend({});
	Documents.Views.Edit.Grid = Backbone.View.extend({});
	Documents.Views.Edit.GridRow = Backbone.View.extend({});
	Documents.Views.Edit.GridRowSpan = Backbone.View.extend({});

	Documents.Views.Edit.UIElement.Base = Backbone.View.extend({});

	//Shortcut
	var UIElementBase = Documents.Views.Edit.UIElement.Base;

	Documents.Views.Edit.UIElement.Constructor = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.String = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.Text = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.Time = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.Date = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.Integer = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.Double = UIElementBase.extend({});
	Documents.Views.Edit.UIElement.MKB = UIElementBase.extend({});

	//Просмотр
	Documents.Views.Review.Layout = Backbone.View.extend({});
	Documents.Views.Review.Controls = Backbone.View.extend({});
	Documents.Views.Review.DocValues = Backbone.View.extend({});

	return Documents;
});