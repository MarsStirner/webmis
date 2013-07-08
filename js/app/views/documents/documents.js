/**
 * User: FKurilov
 * Date: 20.05.13
 */

define(function (require) {
	//Структура модуля
	var Documents = {
		Views: {
			List: {
				Base: {},
				Common: {},
				Examination: {},
				Therapy: {}
			},
			Review: {
				Base: {},
				Common: {},
				Examination: {},
				Therapy: {}
			},
			Edit: {
				UIElement: {},
				Base: {},
				Common: {},
				Examination: {},
				Therapy: {}
			}
		},
		Collections: {},
		Models: {}
	};

	//константы
	var HIDDEN_TYPES = ['JobTicket', 'RLS'];//типы полей, которые не выводятся в ui.
	var INPUT_DATE_FORMAT = 'DD.MM.YYYY';
	var CD_DATE_FORMAT = 'YYYY-MM-DD HH:mm:ss';//Формат даты в коммон дата


	//region BOOTSTRAP
	var Backbone = window.Backbone;
	var _ = window._;
	var appealId = 0;
	var appeal = null;
	var dispatcher = _.extend({}, Backbone.Events);
	//endregion


	//region DEPENDENCIES
	var templates = {
		_listLayout: _.template(require("text!templates/documents/list/layout.html")),
		_listControlsBase: _.template(require("text!templates/documents/list/controls.html")),
		_listControlsCommon: _.template(require("text!templates/documents/list/controls-common.html")),
		_listExaminationControls: _.template(require("text!templates/documents/list/examination-controls.html")),
		_listTableControls: _.template(require("text!templates/documents/list/table-controls.html")),
		_documentTypeDateFilters: _.template(require("text!templates/documents/list/type-date-filter.html")),
		_documentDateFilter: _.template(require("text!templates/documents/list/date-filter.html")),
		_documentTypeSelector: _.template(require("text!templates/documents/list/doc-type-selector.html")),
		_documentTypeSearch: _.template(require("text!templates/documents/list/doc-type-search.html")),
		_documentTypesTree: _.template(require("text!templates/documents/list/doc-types-tree.html")),
		_documentsTableHead: _.template(require("text!templates/documents/list/docs-table-head.html")),
		_documentsTable: _.template(require("text!templates/documents/list/docs-table.html")),
		_documentsTablePaging: _.template(require("text!templates/documents/list/paging.html")),
		_editLayout: _.template(require("text!templates/documents/edit/layout.html")),
		_editNavControls: _.template(require("text!templates/documents/edit/nav-controls.html")),
		_editHeading: _.template(require("text!templates/documents/edit/heading.html")),
		_editDates: _.template(require("text!templates/documents/edit/dates.html")),
		_editDocumentControls: _.template(require("text!templates/documents/edit/document-controls.html")),
		_editCopySourceSelector: _.template(require("text!templates/documents/edit/copy-source-selector.html")),
		_editGrid: _.template(require("text!templates/documents/edit/grid.html")),
		//_editGridSpan: _.template(require("text!templates/documents/edit/span.html")),
		_reviewLayout: _.template(require("text!templates/documents/review/layout.html")),
		_reviewControls: _.template(require("text!templates/documents/review/controls.html")),
		_reviewSheet: _.template(require("text!templates/documents/review/sheet.html")),
		uiElements: {
			_base: _.template(require("text!templates/documents/edit/ui-elements/base.html")),
			_constructor: _.template(require("text!templates/documents/edit/ui-elements/constructor.html")),
			_text: _.template(require("text!templates/documents/edit/ui-elements/text.html")),
			_date: _.template(require("text!templates/documents/edit/ui-elements/date.html")),
			_time: _.template(require("text!templates/documents/edit/ui-elements/time.html")),
			_double: _.template(require("text!templates/documents/edit/ui-elements/double.html")),
			_integer: _.template(require("text!templates/documents/edit/ui-elements/integer.html")),
			_string: _.template(require("text!templates/documents/edit/ui-elements/string.html")),
			_mkb: _.template(require("text!templates/documents/edit/ui-elements/mkb.html")),
			_flatDirectory: _.template(require("text!templates/documents/edit/ui-elements/flat-directory.html")),
			_select: _.template(require("text!templates/documents/edit/ui-elements/select.html"))
		}
	};

	var Thesaurus = require("views/appeal/edit/popups/thesaurus");
	var FlatDirectory = require("models/flat-directory");
	var MKB = require("views/mkb-directory");
	//endregion


	//region MODELS
	//---------------------

	Documents.Models.FetchableModelBase = Backbone.Model.extend({});
	Documents.Models.FetchableModelBase.prototype.sync = Model.prototype.sync;

	Documents.Models.DocumentBase = Documents.Models.FetchableModelBase.extend({
		initialize: function (options) {
			this.id = options.id;
			this.appealId = options.appealId || appealId;
		},

		groupedByRow: null,

		groupByRow: function () {
			var attributes = this.get("group")[1].attribute;

			attributes = _.reject(attributes, function (attribute) {
				return _.contains(HIDDEN_TYPES, attribute.type)
			}, this);


			var groupedByRow = _(attributes).groupBy(function (item) {
				//return item.layoutAttributes[]; //TODO: groupBy ROW attr
				//var rowValue = _(item.layoutAttributeValues).where("layoutAttribute_id", layoutAttributesDir[item.type]).value;
				return "UNDEFINED";
			}, this);

			var rows = [];

			for (var i = 0; i < groupedByRow.UNDEFINED.length; i++) {
				if (i == 0 || i % 2 == 0) {
					rows.push({spans: new Backbone.Collection()});
				}

				rows[rows.length - 1].spans.add(new Documents.Models.TemplateAttribute(groupedByRow.UNDEFINED[i]));
			}

			//console.log("rows", rows);

			return rows;
		},

		getGroupedByRow: function () {
			if (!this.groupedByRow) {
				this.groupedByRow = this.groupByRow();
			}

			return this.groupedByRow;
		},

		copyAttributes: function (document) {
			_(document.get("group")[1].attribute).each(function (copyAttr) {
				_(this.getGroupedByRow()).each(function (row) {
					row.spans.each(function (attr) {
						if (attr.get("typeId") == copyAttr.typeId) {
							attr.copyValue(copyAttr);
						}
					});
				});
			}, this);

			return this;
		},

		getDates: function () {
			if (this.get("group")) {
				if (!this.dates) {
					this.dates = {
						begin: new Documents.Models.TemplateAttribute(_(this.get("group")[0].attribute).find(function (attr) {
							return attr.name == 'assessmentBeginDate';
						})),
						end: new Documents.Models.TemplateAttribute(_(this.get("group")[0].attribute).find(function (attr) {
							return attr.name == 'assessmentEndDate';
						}))
					};
				}
				return this.dates;
			} else {
				return {};
			}

		},

		parse: function (raw) {
			//console.log(raw);
			return raw.data[0];
		},

		toJSON: function () {
			return [Model.prototype.toJSON.apply(this)];
		},

		setCloseDate: function () {
			this.getDates().end.setValue(this.shouldBeClosed ? moment().format(CD_DATE_FORMAT) : "");
		}
	});

	Documents.Models.Document = Documents.Models.DocumentBase.extend({
		urlRoot: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/documents/";
		},

		getFilledAttrs: function () {
			if (this.get("group").length) {
				var examAttributes = this.get("group")[1].attribute;
				var examFlatJSON = [];
				if (examAttributes) {
					_(examAttributes).each(function (a) {
						var valueProp = _(a.properties).find(function (p) {
							return p.name === "value";
						});

						if (valueProp && valueProp.value && valueProp.value !== "0.0") {
							examFlatJSON.push({
								id: a.typeId,
								name: a.name,
								value: valueProp.value
							});
						}
					});
				}
				return examFlatJSON;
			} else {
				return [];
			}
		},

		save: function (attrs, options) {
			this.setCloseDate();
			Documents.Models.DocumentBase.prototype.save.call(this, attrs, options);
		}
	});

	Documents.Models.DocumentTemplate = Documents.Models.DocumentBase.extend({
		urlRoot: DATA_PATH + "dir/actionTypes/",

		save: function (attrs, options) {
			options.dataType = "jsonp";
			options.url = Documents.Models.Document.prototype.urlRoot.apply(this);
			options.contentType = 'application/json';

			var method = "create";

			this.setCloseDate();

			options.data = JSON.stringify({
				requestData: {},
				data: this.toJSON()
			});

			return Backbone.sync(method, this, options);
		}
	});

	Documents.Models.DocumentLastByType = Documents.Models.DocumentBase.extend({
		urlRoot: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/documents/lastByType/";
		}
	});

	Documents.Models.DocumentType = Backbone.Model.extend({});

	Documents.Models.DocumentListItem = Backbone.Model.extend({
		initialize: function (options) {
			if (options && options.appealId) {
				this.appealId = options.appealId
			} else {
				this.appealId = appealId;
			}
		}
	});

	Documents.Models.LayoutAttributesDir = Documents.Models.FetchableModelBase.extend({
		url: function () {
			return DATA_PATH + "dir/layoutAttributes/";
		},

		parse: function (raw) {
			return _(raw.data).groupBy("typeName");
		}
	});

	Documents.Models.TemplateAttribute = Backbone.Model.extend({
		getValuePropertyIndex: function (props, type) {
			var propName;
			var valuePropertyIndex;

			if (["MKB", "FlatDirectory"].indexOf(this.get("type")) != -1) {
				propName = "value";
			} else {
				propName = "value";
			}

			for (var i = 0; i < props.length; i++) {
				if (props[i].name == propName) {
					valuePropertyIndex = i;
					break;
				}
			}

			if (_.isUndefined(valuePropertyIndex)) {
				console.log("value property added to attribute");
				valuePropertyIndex = props.push({name: propName, value: ""}) - 1;
			}

			return valuePropertyIndex;
		},

		getValueProperty: function () {
			//TODO: Выяснить почему так падает хром....
			if (_.isUndefined(this.valuePropertyIndex)) {
				this.valuePropertyIndex = this.getValuePropertyIndex(this.get("properties"), this.get("type"));
			}
			return this.get("properties")[this.valuePropertyIndex];

			/*if (_.isUndefined(this.valuePropertyIndex)) {
			 this.valuePropertyIndex = this.getValuePropertyIndex(this.get("properties"), this.get("type"));
			 return this.get("properties")[this.valuePropertyIndex];
			 } else {
			 return this.get("properties")[this.valuePropertyIndex];
			 }*/
		},

		getValue: function () {
			return this.getValueProperty().value;
		},

		setValue: function (value) {
			this.getValueProperty().value = value;
			this.trigger("change:value");
			return this;
		},

		copyValue: function (copyAttr) {
			this.setValue(this.getCopyValueProperty(copyAttr));
			this.trigger("copy");
		},

		getCopyValueProperty: function (copyAttr) {
			return copyAttr.properties[this.getValuePropertyIndex(copyAttr.properties, copyAttr.type)].value;
		}

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		, getPropertyValueFor: function (name) {
			var properties = this.get('properties');
			var property = _.find(properties, function (prop) {
				return prop.name === name;
			});

			return property.value;
		}, setPropertyValueFor: function (name, value) {
			console.log(name, value)
			var properties = this.get('properties');
			var property = _.find(properties, function (prop) {
				return prop.name === name;
			});

			property.value = value;


		}
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	});
	//endregion


	//region COLLECTIONS
	Documents.Collections.DocumentList = Collection.extend({
		model: Documents.Models.DocumentListItem,
		mnems: ["EXAM", "EPI", "JOUR", "ORD", "NOT", "OTH"],
		dateRange: null,
		typeId: null,
		pageNumber: 1,
		initialize: function (models, options) {
			Collection.prototype.initialize.call(this);
			this.appealId = options.appealId || appealId;
			if (options.defaultMnems) {
				this.mnems = options.defaultMnems;
			}
		},
		url: function () {
			var url = DATA_PATH + "appeals/" + this.appealId + "/documents/?";

			var params = [];

			if (this.mnems.length) {
				this.mnems.map(function (mnem) {
					return params.push("filter[mnem]=" + mnem);
				});
			}

			if (this.dateRange) {
				params.push("filter[begDate]=" + this.dateRange.start);
				params.push("filter[endDate]=" + this.dateRange.end);
			}

			if (this.typeId) {
				params.push("filter[actionTypeId]=" + this.typeId);
			}

			if (this.pageNumber) {
				params.push("page=" + this.pageNumber);
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

		mnems: ["EXAM", "EPI", "JOUR", "ORD", "NOT", "OTH"],

		lastCrtiteria: "",

		url: function () {
			//filter[view]=tree
			var url = DATA_PATH + "dir/actionTypes/?filter[view]=tree&";
			var params = [];

			if (this.mnems.length) {
				this.mnems.map(function (mnem) {
					return params.push("filter[mnem]=" + mnem);
				});
			}

			return url + params.join("&");
		},

		extractResult: function (groups, result, criteriaRE) {
			_.each(groups, function (model) {
				if (!model.groups.length && criteriaRE.test(model.name)) {
					result.push(model);
				}
				if (model.groups.length) {
					this.extractResult(model.groups, result, criteriaRE);
				}
			}, this);
		},

		search: function (criteria) {
			this.lastCrtiteria = criteria;

			if (!this.originalModels) {
				this.originalModels = this.toJSON();
			}
			if (this.lastCrtiteria) {
				var criteriaRE = new RegExp(this.lastCrtiteria, "gi");
				var result = [];
				this.extractResult(this.originalModels, result, criteriaRE);
				this.reset(result);
			} else {
				this.reset(this.originalModels);
			}

			/*this.collection.reset(criteria ?
			 _.filter(this.options.originalModels, function (model) {
			 return criteriaRE.test(model.get("name"))
			 }) :
			 this.options.originalModels);*/
		},

		searchByMnem: function (mnems) {
			this.mnems = mnems;
			this.fetch().then(_.bind(function () {
				this.originalModels = null;
				this.search(this.lastCrtiteria);
			}, this));
		}
	});
	//endregion


	//region VIEWS
	//---------------------

	//region VIEWS BASE
	//Базовые классы
	var ViewBase = Documents.Views.Base = Backbone.View.extend({
		template: _.template(""),

		data: function () {
			return {};
		},

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
			this.$("button,[data-display-as=button]").each(function () {
				var $this = $(this);
				var icons = {};
				if ($this.data("icon-primary")) {
					icons.primary = $this.data("icon-primary");
				}
				if ($this.data("icon-secondary")) {
					icons.secondary = $this.data("icon-secondary");
				}
				$this.button({
					icons: icons,
					text: !$this.data("notext")
				});
			});
			//this.$("select").select2();
			return this;
		},

		tearDown: function () {
			//console.log("tearing down " + this.$el.attr("class"));
			this.tearDownSubviews();
			this.stopListening();
			this.undelegateEvents();
			this.remove();
		},

		tearDownSubviews: function () {
			if (this.subViews) _.each(this.subViews, function (subView) {
				subView.tearDown();
			});
		},

		on: function (event, callback, context) {
			return dispatcher.on(event, callback, context);
		}
	});

	var PopUpBase = Documents.Views.PopUpBase = ViewBase.extend({
		dialogOptions: {},

		tearDown: function () {
			this.$el.dialog("close");
			ViewBase.prototype.tearDown.call(this);
		},

		render: function (subViews) {
			ViewBase.prototype.render.call(this, subViews);
			this.$el.dialog(this.dialogOptions).dialog("open");
			return this;
		}
	});

	var LayoutBase = Documents.Views.LayoutBase = ViewBase.extend({
		className: "container-fluid",

		topLevel: false,

		initialize: function () {
			this.topLevel = !this.options.included;
		},

		tearDown: function () {
			if (this.topLevel) {
				//console.log("dispatcher off");
				dispatcher.off();
			}
			ViewBase.prototype.tearDown.call(this);
		}
	});

	var RepeaterBase = Documents.Views.RepeaterBase = ViewBase.extend({
		initialize: function () {
			this.subViews = [];
		},

		getRepeatOptions: function (item) {
			var options;
			if (this.repeat instanceof Documents.Views.RepeaterBase) {
				options = {collection: item};
			} else {
				options = {model: item};
			}
			return options;
		},

		/**
		 * OVERRIDE THIS METHOD to return instance of repeat view
		 * @param repeatOptions
		 * @returns {www.js.app.views.documents.documents.Views.Base}
		 */
		getRepeatView: function (repeatOptions) {
			return new ViewBase(repeatOptions);
		},

		render: function () {
			this.$el.html(this.collection.map(function (item) {
				var repeatOptions = this.getRepeatOptions(item);

				var repeatView = this.getRepeatView(repeatOptions);

				this.subViews.push(repeatView);

				return repeatView.render().el;
			}, this));

			return this;
		}
	});
	//endregion


	//region VIEWS LIST BASE
	//---------------------
	/**
	 * Базовый лэйаут списка созданных документов
	 * @type {*}
	 */
	var ListLayoutBase = Documents.Views.List.Base.Layout = LayoutBase.extend({
		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			if (this.options.appealId) {
				appealId = this.options.appealId;
				appeal = this.options.appeal;
				console.log("appeal", appeal);
			}
			this.appealId = appealId;

			this.documents = new Documents.Collections.DocumentList([], {appealId: this.appealId, defaultMnems: this.getDefaultDocumentsMnems()});
			this.documents.fetch();

			this.selectedDocuments = new Backbone.Collection();
			this.listenTo(this.selectedDocuments, "review:enter", this.onEnteredReviewState);
			this.listenTo(this.selectedDocuments, "review:quit", this.onQuitReviewState);

			this.reviewStateToggles = [".documents-table", ".documents-paging", ".controls-filters"];
		},

		getDefaultDocumentsMnems: function () {
			return Documents.Collections.DocumentList.prototype.mnems;
		},

		onEnteredReviewState: function () {
			this.toggleReviewState(true);
		},

		onQuitReviewState: function () {
			this.toggleReviewState(false);
		},

		toggleReviewState: function (enabled) {
			//this.$(".documents-table, .controls-filters, .documents-paging").toggle(!enabled);
			this.$(this.reviewStateToggles.join(",")).toggle(!enabled);

			if (enabled) {
				this.$el.append('<div class="row-fluid review-area-row"><div class="span12 review-area"></div></div>');
				this.reviewLayout = this.getReviewLayout();
				this.assign({
					".review-area": this.reviewLayout
				});
			} else {
				this.reviewLayout.tearDown();
				this.$(".review-area-row").remove();
			}
		},

		getReviewLayout: function () {
			return new Documents.Views.Review.Base.Layout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		render: function (subViews) {
			return LayoutBase.prototype.render.call(this, _.extend({
				".table-controls": new Documents.Views.List.Base.TableControls({collection: this.selectedDocuments}),
				".documents-table-tbody": new Documents.Views.List.Base.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments,
					included: !!this.options.included
				}),
				".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					included: !!this.options.included
				}),
				".documents-paging": new Documents.Views.List.Base.Paging({collection: this.documents})
			}, subViews));
		}
	});

	/**
	 * Таблица со списком созданных документов
	 * @type {*}
	 */
	Documents.Views.List.Base.DocumentsTableHead = ViewBase.extend({
		template: templates._documentsTableHead,

		events: {
			"click th.sortable": "onThSortableClick"
		},

		data: function () {
			return {
				documents: this.collection,
				showIcons: !this.options.included && !appeal.isClosed(),
				isSortedBy: this.isSortedBy
			};
		},

		initialize: function () {

			this.listenTo(this.collection, "reset", this.onCollectionReset);
			_.bindAll(this, 'data');
		},
		// render: function (subViews) {
		//  this.$el.html(this.template(this.data()));
		// },

		onCollectionReset: function () {
			console.log('reset', this.collection)
			//this.render();
		},

		onThSortableClick: function (event) {
			console.log(event)
			var $targetTh = $(event.currentTarget);
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

			var sortingField = $targetTh.data('sort-field');
			var sortingMethod = $targetTh.hasClass("desc") ? "desc" : "asc";

			this.collection.fetch({data: {
				sortingField: sortingField,
				sortingMethod: sortingMethod
			}})
		}
	});

	/**
	 * Таблица со списком созданных документов
	 * @type {*}
	 */
	Documents.Views.List.Base.DocumentsTable = ViewBase.extend({
		template: templates._documentsTable,

		events: {
			"change .selected-flag": "onSelectedFlagChange",
			"click .duplicate-document": "onDuplicateDocumentClick",
			"click .edit-document": "onEditDocumentClick",
			"click .single-item-select": "onItemClick",
			"click th.sortable": "onThSortableClick"
		},

		data: function () {
			return {documents: this.collection, showIcons: !this.options.included && !appeal.isClosed()};
		},

		initialize: function () {
			this.listenTo(this.collection, "reset", this.onCollectionReset);
			this.listenTo(this.options.selectedDocuments, "review:quit", this.onCollectionReset);
		},

		onCollectionReset: function () {
			this.options.selectedDocuments.reset();
			this.render();
		},

		onQuitReviewState: function () {
			this.options.selectedDocuments.reset();
			this.render();
		},

		onSelectedFlagChange: function (event) {
			this.updatedSelectedItems($(event.currentTarget).is(":checked"), parseInt($(event.currentTarget).val()));
			$(event.currentTarget).parent().siblings().toggleClass("selected", $(event.currentTarget).is(":checked"));
		},

		onEditDocumentClick: function (event) {
			if ($(event.currentTarget).data('document-id')) {
				dispatcher.trigger("change:viewState", {
					type: this.getEditPageTypeName(),
					options: {documentId: $(event.currentTarget).data('document-id')}
				});
			}
		},

		onDuplicateDocumentClick: function (event) {
			if ($(event.currentTarget).data('template-id')) {
				dispatcher.trigger("change:viewState", {
					type: this.getEditPageTypeName(),
					options: {templateId: $(event.currentTarget).data('template-id')}
				});
			}
		},

		onItemClick: function (event) {
			console.log($(event.currentTarget).siblings(".selected-flag-col").find(".selected-flag").val());
			this.updatedSelectedItems(true, $(event.currentTarget).siblings(".selected-flag-col").find(".selected-flag").val());
			this.options.selectedDocuments.trigger("review:enter");
		},

		onThSortableClick: function (event) {
			var $targetTh = $(event.currentTarget);
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

			var sortField = $targetTh.data('sort-field')
			console.log('sort by', sortField);
			this.collection.fetch({data: {sortingField: sortField}})
		},

		getEditPageTypeName: function () {
			return "document-edit";
		},

		updatedSelectedItems: function (selected, itemId) {
			if (selected) {
				this.options.selectedDocuments.add(new Documents.Models.Document({id: itemId}));
			} else {
				this.options.selectedDocuments.remove(this.options.selectedDocuments.get(itemId));
			}
			//console.log(this.options.selectedDocuments);
		}
	});

	/**
	 * Элементы управления данными таблицы
	 * @type {*}
	 */
	Documents.Views.List.Base.TableControls = ViewBase.extend({
		template: templates._listTableControls,

		data: function () {
			return {selectedDocuments: this.collection};
		},

		events: {
			"click .review-selected": "onReviewSelectedClick"
		},

		initialize: function () {
			this.listenTo(this.collection, "add remove reset", this.onCollectionChange);
		},

		onReviewSelectedClick: function (event) {
			this.collection.trigger("review:enter");
		},

		onCollectionChange: function () {
			this.render();
		}

		/*onSelectedDocumentsAdd: function () {
		 this.render();
		 //this.toggleReviewSelectedDisabled(this.collection.length > 0);
		 },

		 onSelectedDocumentsRemove: function () {
		 this.render();
		 //this.toggleReviewSelectedDisabled(this.collection.length > 0);
		 },

		 toggleReviewSelectedDisabled: function (enabled) {
		 //this.$(".review-selected").button(!!enabled ? "enable" : "disable");
		 }*/
	});

	/**
	 * Пэйджинг
	 * @type {*}
	 */
	Documents.Views.List.Base.Paging = ViewBase.extend({
		template: templates._documentsTablePaging,
		data: function () {
			console.log(this.collection);
			if (this.collection.requestData) {
				return {
					currentPage: this.collection.requestData.page,
					pageCount: Math.ceil(this.collection.requestData.recordsCount / this.collection.requestData.limit)
				};
			} else {
				return {
					currentPage: 0,
					pageCount: 0
				}
			}

		},
		events: {
			"click .page-number": "onPageNumberClick"
		},
		initialize: function () {
			ViewBase.prototype.initialize.call(this, this.options);
			this.listenTo(this.collection, "reset", this.onCollectionReset);
		},
		onCollectionReset: function () {
			this.render();
		},
		onPageNumberClick: function (event) {
			event.preventDefault();
			this.collection.pageNumber = $(event.currentTarget).data("page-number");
			this.collection.fetch();
		}
	});

	/**
	 * Фильтр по дате
	 * @type {*}
	 */
	Documents.Views.List.Base.Filters = ViewBase.extend({
		template: templates._documentDateFilter,

		events: {
			"change [name='document-create-date-filter']": "onDocumentCreateDateFilterChange"
		},

		onDocumentCreateDateFilterChange: function (event) {
			var rangeMnem = $(event.currentTarget).val();

			this.applyDocumentCreateDateFilter(rangeMnem);
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
			this.collection.pageNumber = 1;
			this.collection.fetch();
		},

		render: function () {
			ViewBase.prototype.render.apply(this);
			this.$(".document-create-date-filter-buttonset").buttonset();
		}
	});

	/**
	 * Элементы управления созданием доков
	 * @type {*}
	 */
	Documents.Views.List.Base.Controls = ViewBase.extend({
		template: templates._listControlsBase,

		events: {
			"click .new-document": "onNewDocumentClick"
		},

		initialize: function () {
			//if (this.options.documentTypes) {
			this.documentTypes = this.options.documentTypes;
			//} else {
			/*this.documentTypes = new Documents.Collections.DocumentTypes();
			 this.documentTypes.fetch();*/
			//}

			this.listenTo(this.documentTypes, "reset", function () {
				if (!appeal.isClosed()) {
					this.$(".new-document,.new-duty-doc-exam").button("enable");
				}
				//console.log(this.documentTypes);
			});

			this.listenTo(this.documentTypes, "document-type:selection-confirmed", this.onDocumentTypeSelected);
		},

		onDocumentTypeSelected: function (event) {
			dispatcher.trigger("change:viewState", {
				type: "document-edit",
				options: {templateId: event.selectedType}
			});
		},

		onNewDocumentClick: function () {
			this.showDocumentTypeSelector();
		},

		showDocumentTypeSelector: function () {
			new Documents.Views.List.Base.DocumentTypeSelector({collection: this.documentTypes}).render();
		}
	});

	/**
	 * Выбор шаблона документа
	 * @type {*}
	 */
	Documents.Views.List.Base.DocumentTypeSelector = PopUpBase.extend({
		template: templates._documentTypeSelector,

		className: "Tree popup",

		initialize: function () {
			this.dialogOptions = this.getDialogOptions();

			this.origCollection = this.collection;

			this.collection = new Documents.Collections.DocumentTypes(this.collection.models);

			//this.collection.originalModels = this.collection.models;

			this.listenTo(this.collection, "document-type:selected", this.onDocumentTypeSelected);

			this.docTypeSearch = this.getSearchView();

			this.subViews = {".doc-type-search": this.docTypeSearch};
		},

		getDialogOptions: function () {
			return {
				title: "Выберите тип документа",
				modal: true,
				width: 800,
				height: 600,
				resizable: false,
				close: _.bind(this.tearDown, this),
				buttons: [
					{text: "Создать", click: _.bind(this.onCreateDocumentClick, this)},
					{text: "Отмена", click: _.bind(this.tearDown, this)}
				]
			};
		},

		getSearchView: function () {
			return new Documents.Views.List.Base.DocumentTypeSearch({collection: this.collection, showTypeMnem: true});
		},

		onDocumentTypeSelected: function (event) {
			this.selectedType = event.selectedType;
		},

		onCreateDocumentClick: function () {
			if (this.selectedType) {
				this.origCollection.trigger("document-type:selection-confirmed", {selectedType: this.selectedType});
				this.tearDown();
			}
		},

		render: function () {
			PopUpBase.prototype.render.call(this, {
				".document-types-tree": new Documents.Views.List.Base.DocumentTypesTree({collection: this.collection})
			});
			this.$el.before(this.docTypeSearch.render().el);
			return this;
		}
	});

	Documents.Views.List.Base.DocumentTypeSearch = ViewBase.extend({
		className: "doc-type-search",
		template: templates._documentTypeSearch,
		data: function () {
			return {showTypeMnem: !!this.options.showTypeMnem};
		},
		events: {
			"keyup .document-type-search": "onDocumentTypeSearchKeyup",
			"change .document-type-mnem": "onDocumentTypeMnemChange"
		},
		onDocumentTypeSearchKeyup: function (event) {
			this.applySearchFilter($(event.currentTarget).val());
		},
		onDocumentTypeMnemChange: function (event) {
			this.collection.searchByMnem($(event.currentTarget).val().split(","));
		},
		applySearchFilter: function (criteria) {
			this.collection.search(criteria);

			/*var criteriaRE = new RegExp(criteria, "gi");
			 this.collection.reset(criteria ?
			 _.filter(this.options.originalModels, function (model) {
			 return criteriaRE.test(model.get("name"))
			 }) :
			 this.options.originalModels);*/
		},
		render: function () {
			return ViewBase.prototype.render.call(this, {
				".search-result-count": new Documents.Views.List.Base.DocumentTypeSearchResultCount({collection: this.collection})
			});
		}
	});

	Documents.Views.List.Base.DocumentTypeSearchResultCount = ViewBase.extend({
		template: _.template("Найдено шаблонов: <%=resultsCount%>"),
		data: function () {
			return {resultsCount: this.collection.length};
		},
		initialize: function () {
			ViewBase.prototype.initialize.call(this, this.options);
			this.listenTo(this.collection, "reset", function () {
				this.render();
			});
		}
	});

	/**
	 * Дерево типов документов
	 * @type {*}
	 */
	Documents.Views.List.Base.DocumentTypesTree = ViewBase.extend({
		template: templates._documentTypesTree,

		events: {
			"click .document-type-node": "onDocumentTypeNodeClick"
		},

		data: function () {
			return {documentTypes: this.collection.toJSON(), template: this.template};
		},

		initialize: function () {
			this.listenTo(this.collection, "reset", this.onCollectionReset)
		},

		onCollectionReset: function () {
			this.render();
		},

		onDocumentTypeNodeClick: function (event) {
			event.stopPropagation();
			var $node = $(event.currentTarget);
			if ($node.is(".Opened")) {
				$node.removeClass("Opened").siblings().removeClass("Opened");
				$node.children().removeClass("Opened");
				$node.find(".icon-minus").addClass("icon-plus").removeClass("icon-minus");
			} else {
				$node.addClass("Opened").siblings().removeClass("Opened");
				$node.children().removeClass("Opened");
				$node.find(".icon-plus").addClass("icon-minus").removeClass("icon-plus");
			}

			this.collection.trigger("document-type:selected", {selectedType: $node.data("document-type-id")});

			/*$(event.currentTarget).toggleClass("Opened").siblings().removeClass("Opened");
			 $(event.currentTarget).find(".icon-plus,icon-minus").toggleClass("icon-plus icon-minus");*/
			//$(event.currentTarget).addClass("Opened");
			/*var nodeHasChildren;
			 if (nodeHasChildren) {
			 this.toggleNodeCollapse();
			 } else {
			 this.markNodeSelected();
			 }*/
		},

		render: function () {
			ViewBase.prototype.render.call(this);
			this.$("ul").first().show();
		}
	});
	//endregion


	//region VIEWS LIST COMMON
	//---------------------
	/**
	 * Лэйаут без отображения контролов для создания/редактирования доков
	 * @type {*}
	 */
	Documents.Views.List.Common.LayoutHistory = ListLayoutBase.extend({
		template: templates._listLayout,

		render: function (subViews) {
			return ListLayoutBase.prototype.render.call(this, _.extend({
				".documents-filters": new Documents.Views.List.Common.Filters({collection: this.documents})
			}, subViews));
		}
	});

	/**
	 * Лэйаут со всеми контролами
	 * @type {*}
	 */
	Documents.Views.List.Common.Layout = Documents.Views.List.Common.LayoutHistory.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			Documents.Views.List.Common.LayoutHistory.prototype.initialize.call(this, this.options);

			this.documentTypes = new Documents.Collections.DocumentTypes();
			this.documentTypes.fetch();

			this.reviewStateToggles.push(".documents-controls");
		},

		render: function () {
			return Documents.Views.List.Common.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Common.Controls({
					collection: this.documents,
					documentTypes: this.documentTypes
				})
			});
		}
	});

	/**
	 * Элементы управления (кнопка "Новый документ" и пр.)
	 * @type {*}
	 */
	Documents.Views.List.Common.Controls = Documents.Views.List.Base.Controls.extend({
		template: templates._listControlsCommon,

		events: _.extend({
			"click .new-duty-doc-exam": "onNewDutyDocExamClick"
		}, Documents.Views.List.Base.Controls.prototype.events),

		onNewDutyDocExamClick: function () {
			this.openDutyDocExamTemplate();
		},

		openDutyDocExamTemplate: function () {
			//TODO: HARCODED
			dispatcher.trigger("change:viewState", {type: "document-edit", options: {templateId: 2844}});
		}
	});

	/**
	 * Фильтры
	 * @type {*}
	 */
	Documents.Views.List.Common.Filters = Documents.Views.List.Base.Filters.extend({
		template: templates._documentTypeDateFilters,

		events: _.extend({
			"change .document-type-filter": "onDocumentTypeFilterChange"
		}, Documents.Views.List.Base.Filters.prototype.events),

		onDocumentTypeFilterChange: function (event) {
			var type = $(event.currentTarget).val();
			//console.log(type);
			this.applyDocumentTypeFilter(type);
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
			this.collection.pageNumber = 1;
			this.collection.fetch();
		}
	});
	//endregion


	//region VIEWS LIST EXAMINATION
	//---------------------
	Documents.Views.List.Examination.LayoutHistory = ListLayoutBase.extend({
		template: templates._listLayout,

		getDefaultDocumentsMnems: function () {
			return ["EXAM"];
		},

		getReviewLayout: function () {
			return new Documents.Views.Review.Examination.Layout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		render: function (subViews) {
			return ListLayoutBase.prototype.render.call(this, _.extend({
				".documents-table-body": new Documents.Views.List.Examination.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments
				}),
				".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					included: !!this.options.included
				}),
				".documents-filters": new Documents.Views.List.Base.Filters({collection: this.documents})
			}, subViews));
		}
	});

	Documents.Views.List.Examination.Layout = Documents.Views.List.Examination.LayoutHistory.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			Documents.Views.List.Examination.LayoutHistory.prototype.initialize.call(this, this.options);
			this.reviewStateToggles.push(".documents-controls");
		},

		render: function () {
			return Documents.Views.List.Examination.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Examination.Controls()
			});
		}
	});

	Documents.Views.List.Examination.Controls = ViewBase.extend({
		template: templates._listExaminationControls,

		data: function () {
			return {creationAllowed: !appeal.isClosed()};
		},

		events: {
			"click .new-examination-primary": "onNewExaminationPrimaryClick",
			"click .new-examination-primary-repeated": "onNewExaminationPrimaryRepeatedClick"
		},

		onNewExaminationPrimaryClick: function () {
			//TODO: HARCODED
			dispatcher.trigger("change:viewState", {type: "examination-edit", options: {templateId: 139}});
		},

		onNewExaminationPrimaryRepeatedClick: function () {
			//TODO: HARCODED
			dispatcher.trigger("change:viewState", {type: "examination-edit", options: {templateId: 2456}});
		}
	});

	Documents.Views.List.Examination.DocumentsTable = Documents.Views.List.Base.DocumentsTable.extend({
		getEditPageTypeName: function () {
			return "examination-edit";
		}
	});
	//endregion


	//region VIEWS LIST THERAPY
	//---------------------
	Documents.Views.List.Therapy.LayoutHistory = ListLayoutBase.extend({
		template: templates._listLayout,

		getDefaultDocumentsMnems: function () {
			return ["THER"];
		},

		getReviewLayout: function () {
			return new Documents.Views.Review.Therapy.Layout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		render: function (subViews) {
			return ListLayoutBase.prototype.render.call(this, _.extend({
				".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					included: !!this.options.included
				}),
				".documents-table-body": new Documents.Views.List.Therapy.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments
				}),
				".documents-filters": new Documents.Views.List.Base.Filters({collection: this.documents})
			}, subViews));
		}
	});

	Documents.Views.List.Therapy.Layout = Documents.Views.List.Therapy.LayoutHistory.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			Documents.Views.List.Therapy.LayoutHistory.prototype.initialize.call(this, this.options);

			this.documentTypes = new Documents.Collections.DocumentTypes();
			this.documentTypes.mnems = ["THER"];
			this.documentTypes.fetch();

			this.reviewStateToggles.push(".documents-controls");
		},

		render: function () {
			return Documents.Views.List.Therapy.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Therapy.Controls({
					collection: this.documents,
					documentTypes: this.documentTypes
				})
			});
		}
	});

	Documents.Views.List.Therapy.Controls = Documents.Views.List.Base.Controls.extend({
		showDocumentTypeSelector: function () {
			new Documents.Views.List.Therapy.DocumentTypeSelector({collection: this.documentTypes}).render();
		}
	});

	Documents.Views.List.Therapy.DocumentsTable = Documents.Views.List.Base.DocumentsTable.extend({
		getEditPageTypeName: function () {
			return "therapy-edit";
		}
	});

	Documents.Views.List.Therapy.DocumentTypeSelector = Documents.Views.List.Base.DocumentTypeSelector.extend({
		getSearchView: function () {
			return new Documents.Views.List.Base.DocumentTypeSearch({collection: this.collection, showTypeMnem: false});
		}
	});
	//endregion


	//region VIEWS EDIT BASE
	//---------------------
	/**
	 * Верхний блок элементов управления и навигации
	 * @type {*}
	 */
	Documents.Views.Edit.NavControls = ViewBase.extend({
		template: templates._editNavControls,

		events: {
			"change .toggle-divided-state": "onToggleDividedStateClick",
			"click .copy-from-prev": "onCopyFromPrevClick",
			"click .copy-from": "onCopyFromClick"
		},

		onToggleDividedStateClick: function () {
			this.model.trigger("toggle:dividedState");
			/*if (this.$(".toggle-divided-state .ui-button-text").text() == "История") {
			 this.$(".toggle-divided-state .ui-button-text").text("Скрыть историю");
			 } else {
			 this.$(".toggle-divided-state .ui-button-text").text("История");
			 }*/
		},

		onCopyFromPrevClick: function () {
			var documentLastByType = new Documents.Models.DocumentLastByType({id: this.getDocumentTypeId()});
			this.fetchCopySource(documentLastByType);
		},

		onCopyFromClick: function () {
			this.copySourceList = new Documents.Collections.DocumentList([], {});
			this.listenTo(this.copySourceList, "copy-source:selected", this.onCopySourceSelected);

			new Documents.Views.Edit.CopySourceSelector({
				typeId: this.getDocumentTypeId(),
				collection: this.copySourceList
			});
		},

		onCopySourceSelected: function (event) {
			this.stopListening(this.copySourceList, "copy-source:selected", this.onCopySourceSelected);
			this.fetchCopySource(new Documents.Models.Document({id: event.documentId}));
		},

		fetchCopySource: function (copySource) {
			this.listenTo(copySource, "change", this.onCopySourceReset);
			copySource.fetch();
		},

		onCopySourceReset: function (copySource) {
			this.stopListening(copySource, "change", this.onCopySourceReset);
			this.model.copyAttributes(copySource);
		},

		getDocumentTypeId: function () {
			var documentTypeId;
			if (this.model instanceof Documents.Models.DocumentTemplate) {
				documentTypeId = this.model.id;
			} else if (this.model instanceof Documents.Models.Document) {
				documentTypeId = this.model.get("typeId");
			} else {
				console.error("can't resolve documentTypeId for ", this.model);
			}

			return documentTypeId;
		}
	});

	Documents.Views.Edit.Heading = ViewBase.extend({
		template: templates._editHeading,
		data: function () {
			return {name: this.model.get("name")};
		},
		initialize: function () {
			this.listenTo(this.model, "change", this.onModelReset);
		},
		onModelReset: function () {
			this.stopListening(this.model, "change", this.onModelReset);
			this.render();
		}
	});

	Documents.Views.Edit.Dates = ViewBase.extend({
		template: templates._editDates,
		events: {
			"change .document-create-date,.document-create-time": "onDocumentCreateDateChange",
			"change .document-set-close-date": "onDocumentSetCloseDateChange"
		},
		data: function () {
			return {dates: this.model.getDates()};
		},
		initialize: function () {
			this.listenTo(this.model, "change", this.onModelReset);
		},
		onModelReset: function () {
			this.stopListening(this.model, "change", this.onModelReset);
			if (!this.model.getDates().begin.getValue()) {
				this.model.getDates().begin.setValue(moment().format(CD_DATE_FORMAT))
			}
			this.model.shouldBeClosed = !!this.model.getDates().end.getValue();
			this.render();
		},
		onDocumentCreateDateChange: function () {
			this.model.getDates().begin.setValue(
				moment(this.$(".document-create-date").datepicker("getDate"))
					.hour(this.$(".time-input").timepicker("getHour"))
					.minute(this.$(".time-input").timepicker("getMinute"))
					.format(CD_DATE_FORMAT)
			);
			console.log(this.model.getDates().begin.getValue());
		},
		onDocumentSetCloseDateChange: function () {
			this.model.shouldBeClosed = this.$(".document-set-close-date").is(":checked");
		},
		render: function () {
			ViewBase.prototype.render.call(this);
			this.$(".date-input").datepicker();
			this.$(".time-input").timepicker({showPeriodLabels: false, defaultTime: 'now'});
		}
	});

	Documents.Views.Edit.CopySourceSelector = PopUpBase.extend({
		template: templates._editCopySourceSelector,

		events: {
			"click .document-item-row": "onDocumentItemRowClick"
		},

		data: function () {
			return {documents: this.collection};
		},

		initialize: function () {
			this.dialogOptions = {
				title: "Выберите документ для копирования",
				modal: true,
				width: 900,
				height: 600,
				resizable: false,
				close: _.bind(this.tearDown, this),
				buttons: [
					{
						text: "Копировать",
						click: _.bind(this.onDoumentSelectedClick, this)
					},
					{
						text: "Отмена",
						click: _.bind(this.tearDown, this)
					}
				]
			};

			PopUpBase.prototype.initialize.apply(this);
			//this.collection = new Documents.Collections.DocumentList([], {});
			this.collection.typeId = this.options.typeId;
			this.collection.fetch();
			this.listenTo(this.collection, "reset", this.onCollectionReset);
		},

		onCollectionReset: function () {
			this.render();
		},

		onDocumentItemRowClick: function (event) {
			var $row = $(event.currentTarget);
			this.selectedDocumentId = $row.data("document-id");

			this.$(".icon-check").addClass("transparent");
			$row.find(".icon-check").removeClass("transparent");
		},

		onDoumentSelectedClick: function () {
			if (this.selectedDocumentId) {
				this.collection.trigger("copy-source:selected", {documentId: this.selectedDocumentId});
				this.tearDown();
			}
		}

		//,

		/*render: function () {
		 PopUpBase.prototype.render.call(this);
		 var documentsTable = new Documents.Views.List.Base.DocumentsTable({collection: this.collection});
		 this.subViews = [documentsTable];
		 documentsTable.setElement(this.el).render();
		 }*/
	});

	//Управление сохранением документа
	Documents.Views.Edit.DocControls = ViewBase.extend({
		template: templates._editDocumentControls,

		events: {
			"click .save": "onSaveClick",
			"click .cancel": "onCancelClick"
		},

		initialize: function () {
			_.bindAll(this);
			this.listenTo(this.model, "change", function () {
				this.$("button").button("enable");
			});
		},

		onSaveClick: function (event) {
			//debugger;
			this.saveDocument();
		},

		onCancelClick: function (event) {
			this.returnToList();
		},

		onSaveDocumentSuccess: function () {
			this.returnToList();
		},

		onSaveDocumentError: function () {
			console.log(arguments);
		},

		saveDocument: function () {
			this.model.save({}, {success: this.onSaveDocumentSuccess, error: this.onSaveDocumentError});
		},

		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			dispatcher.trigger("change:viewState", {type: "documents"});
		}
	});
	//endregion


	//region VIEWS EDIT COMMON
	//---------------------
	var layoutAttributesDir = new Documents.Models.LayoutAttributesDir();

	Documents.Views.Edit.Common.Layout = LayoutBase.extend({
		template: templates._editLayout,

		dividedStateEnabled: false,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			if (!this.model) {
				if (this.options.templateId) {
					this.model = new Documents.Models.DocumentTemplate({id: this.options.templateId});
					//this.model.id = this.options.templateId;
				} else if (this.options.documentId) {
					this.model = new Documents.Models.Document({id: this.options.documentId});
					//this.model.id = this.options.documentId;
				} else {
					console.error("no doc or tmpl id!");
					dispatcher.trigger("change:viewState", {type: "documents"});
				}
			}

			$.when(layoutAttributesDir.fetch()).then(_.bind(function () {
				this.model.fetch();
			}, this));

			this.listenTo(this.model, "toggle:dividedState", this.toggleDividedState);
		},

		toggleDividedState: function (enabled) {
			enabled = _.isUndefined(enabled) ? !this.dividedStateEnabled : enabled;
			this.dividedStateEnabled = enabled;

			if (enabled) {
				this.$el.parent().css({"margin-left": "0"});
				dispatcher.trigger("change:mainState", {stateName: "documentEditor"});

				this.$(".document-edit-side").removeClass("span12").addClass("span6 vertical-delim");

				this.$(".divided").prepend(
					"<div class='document-list-side span6'>" +
						"<div class='row-fluid'>" +
						"<div class='span12 document-list'></div>" +
						"</div>" +
						"</div>"
				);

				this.listLayoutHistory = this.getListLayoutHistory();

				this.assign({".document-list": this.listLayoutHistory});

				this.listLayoutHistory.$(".documents-controls").remove();
				this.listLayoutHistory.$(".documents-filters").removeClass("span6").addClass("span12");
			} else {
				if (this.listLayoutHistory) this.listLayoutHistory.tearDown(); //ViewBase.prototype.tearDown.call(this.listLayoutLight);
				this.$el.parent().css({"margin-left": "20em"});

				this.$(".document-list-side").remove();
				this.$(".document-edit-side").removeClass("span6 vertical-delim").addClass("span12");

				dispatcher.trigger("change:mainState", {stateName: "default"});
			}
		},

		getListLayoutHistory: function () {
			return new Documents.Views.List.Common.LayoutHistory({included: true});
		},

		render: function (subViews) {
			return ViewBase.prototype.render.call(this, _.extend({
				".nav-controls": new Documents.Views.Edit.NavControls({model: this.model}),
				".heading": new Documents.Views.Edit.Heading({model: this.model}),
				".dates": new Documents.Views.Edit.Dates({model: this.model}),
				".document-grid": new Documents.Views.Edit.Grid({model: this.model}),
				".document-controls": new Documents.Views.Edit.DocControls({model: this.model})
			}, subViews));
		}
	});
	//endregion


	//region VIEWS EDIT EXAMINATION
	//---------------------
	Documents.Views.Edit.Examination.Layout = Documents.Views.Edit.Common.Layout.extend({
		getListLayoutHistory: function () {
			return new Documents.Views.List.Examination.LayoutHistory({included: true});
		},
		render: function () {
			return Documents.Views.Edit.Common.Layout.prototype.render.call(this, {
				".document-controls": new Documents.Views.Edit.Examination.DocControls({model: this.model})
			});
		}
	});

	Documents.Views.Edit.Examination.DocControls = Documents.Views.Edit.DocControls.extend({
		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			dispatcher.trigger("change:viewState", {type: "examinations"});
		}
	});
	//endregion


	//region VIEWS EDIT THERAPY
	//---------------------
	Documents.Views.Edit.Therapy.Layout = Documents.Views.Edit.Common.Layout.extend({
		getListLayoutHistory: function () {
			return new Documents.Views.List.Therapy.LayoutHistory({included: true});
		},
		render: function () {
			return Documents.Views.Edit.Common.Layout.prototype.render.call(this, {
				".document-controls": new Documents.Views.Edit.Therapy.DocControls({model: this.model})
			});
		}
	});

	Documents.Views.Edit.Therapy.DocControls = Documents.Views.Edit.DocControls.extend({
		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			dispatcher.trigger("change:viewState", {type: "therapy"});
		}
	});
	//endregion


	//region VIEWS EDIT GRID BASE
	//---------------------
	Documents.Views.Edit.GridSpanList = RepeaterBase.extend({
		initialize: function () {
			this.UIElementFactory = new UIElementFactory();
			RepeaterBase.prototype.initialize.call(this, this.options);
		},

		getRepeatView: function (repeatOptions) {
			return this.UIElementFactory.make(repeatOptions);
		}
	});

	/**
	 * Ряд в сетке
	 * @type {*}
	 */
	Documents.Views.Edit.GridRow = ViewBase.extend({
		className: "row-fluid",

		render: function () {
			//console.log("GridRow", this);
			var gridSpanList = new Documents.Views.Edit.GridSpanList({collection: this.model.get("spans")});
			this.subViews = [gridSpanList];
			gridSpanList.setElement(this.el);
			gridSpanList.render();
			return this;
		}
	});

	/**
	 * Сетка (12 колонок по умолчанию)
	 * @type {*}
	 */
	Documents.Views.Edit.Grid = RepeaterBase.extend({
		initialize: function () {
			this.collection = new Backbone.Collection();
			this.listenTo(this.collection, "reset", this.onCollectionReset);
			this.listenTo(this.model, "change", this.onModelReset);
			RepeaterBase.prototype.initialize.call(this, this.options);
		},

		getRepeatView: function (repeatOptions) {
			return new Documents.Views.Edit.GridRow(repeatOptions);
		},

		onModelReset: function () {
			this.stopListening(this.model, "change", this.onModelReset);

			this.collection.reset(this.model.getGroupedByRow());
		},

		onCollectionReset: function () {
			this.tearDownSubviews();
			this.render();
		},

		render: function () {
			RepeaterBase.prototype.render.call(this);

			var i = 0;
			this.$("input[type=text],select,.RichText").each(function () {
				$(this).prop("tabindex", ++i);
			});

			return this;
		}
	});
	//endregion


	//region VIEWS UI_ELEMENT
	//---------------------
	/**
	 * Базовый класс UI элемента для поля документа
	 * @type {*}
	 */
	var UIElementBase = Documents.Views.Edit.UIElement.Base = ViewBase.extend({
		template: templates.uiElements._base,

		events: {
			"change .attribute-value": "onAttributeValueChange",
			"input [contenteditable].attribute-value": "onAttributeValueChange"
		},

		data: function () {
			return {model: this.model}
		},

		layoutAttributes: {
			width: 6
		},

		initialize: function () {
			this.mapLayoutAttributes();
			this.listenTo(this.model, "copy", this.setAttributeValue);
			//common attrs to fit into grid
			this.$el.addClass("span" + this.layoutAttributes.width);
			//this.model.set('readOnly', true)

		},

		mapLayoutAttributes: function () {
			//TODO: MAP ALL ATTRIBUTES
			_(this.model.get('layoutAttributeValues')).each(function (value) {
				var layoutAttributeParams = _(layoutAttributesDir.get(this.model.get('type'))).where({id: value.layoutAttribute_id})[0];
				this.layoutAttributes[layoutAttributeParams.code.toLowerCase()] = value.value;
			}, this);
		},

		getAttributeValue: function () {
			var $attributeValueEl = this.$(".attribute-value");
			if ($attributeValueEl.is(".RichText")) {
				return $attributeValueEl.html();
			} else {
				return $attributeValueEl.val();
			}
		},

		setAttributeValue: function () {
			var $attributeValueEl = this.$(".attribute-value");
			var value = this.model.getValue();
			if ($attributeValueEl.is(".RichText")) {
				return $attributeValueEl.html(value);
			} else {
				return $attributeValueEl.val(value);
			}
		},

		onAttributeValueChange: function (event) {
			this.model.setValue(this.getAttributeValue());
		}
	});

	/**
	 * Поле типа Text
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Text = UIElementBase.extend({
		template: templates.uiElements._text,

		events: _.extend({
			"change .field-toggle": "onFieldToggleChange"
		}, UIElementBase.prototype.events),

		onFieldToggleChange: function (event) {
			this.$(".field").toggle($(event.currentTarget).is(":checked"));
		}
	});

	/**
	 * Поле типа Constructor
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Constructor = Documents.Views.Edit.UIElement.Text.extend({
		template: templates.uiElements._constructor,

		events: _.extend({
			"click .thesaurus-open": "onThesaurusOpenClick"
		}, Documents.Views.Edit.UIElement.Text.prototype.events),

		onThesaurusOpenClick: function (event) {
			event.preventDefault();
			//var thesaurusCode = $(event.currentTarget).parent().find(".ExamAttr").data("thesaurus-code");

			this.thesaurus = new ThesaurusPopUp().render().open({
				code: this.model.get("scope"),
				terms: this.model.getValue(),
				attrId: this.model.get("typeId"),
				propertyType: "value"
			});

			this.listenTo(this.thesaurus, "thesaurus:confirmed", this.onThesaurusConfirmed);
		},

		onThesaurusConfirmed: function (event) {
			this.model.setValue(event.selectedTerms);
			this.$(".attribute-value").html(event.selectedTerms);
		}
	});

	/**
	 * Поле типа String
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.String = UIElementBase.extend({
		template: templates.uiElements._string,

		render: function () {
			UIElementBase.prototype.render.call(this);

			//TODO: move this shit to the template

			this.$(".Combo").each(function () {
				var $comboInput = $(this).wrap(
					'<div class="DDList DDSelect ComboWrapper">' +
						'<div class="Title">' +
						'<span class="Actions"></span>' +
						'</div>' +
						'</div>'
				);
				var $wrapper = $comboInput.parents(".DDList").append('<div class="Content"><ul></ul></div>');

				if ($comboInput.hasClass("Mandatory")) $wrapper.addClass("Mandatory");

				$wrapper.find("ul").append($comboInput.data("options").split("|").map(function (opt) {
					return $('<li>' + opt + '</li>');
				}));

				$wrapper.on("click", function (event) {
					event.stopPropagation();
					$(".DDList.Active").not($wrapper).removeClass("Active");
					$(this).toggleClass("Active");
				});

				$wrapper.find("li").on("click", function () {
					$comboInput.val($(this).html()).change();
				});

				$comboInput.on("keyup", function () {
					$wrapper.removeClass("Active");
				});
			});

			return this;
		}
	});

	/**
	 * Поле типа Time
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Time = UIElementBase.extend({
		template: templates.uiElements._time,
		data: function () {

			return {
				model: this.model,
				time: this.getTime()
			};
		},

		getAttributeValue: function () {
			return "1970-01-01 " + this.ui.$attributeValueEl.val() + ':00';
		},

		getTime: function () {
			var time = this.model.getValue();

			return time ? moment(time, CD_DATE_FORMAT).format('HH:mm') : '';
		},

		setAttributeValue: function () {
			var time = this.getTime();

			this.ui.$attributeValueEl.val(time);
		},

		render: function () {
			this.ui = {};
			this.ui.$attributeValueEl = this.$el.find(".attribute-value");

			UIElementBase.prototype.render.call(this);

			this.ui.$attributeValueEl.mask("99:99");

			return this;
		}
	});

	/**
	 * Поле типа Date
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Date = UIElementBase.extend({
		template: templates.uiElements._date,

		data: function () {
			return {
				model: this.model,
				date: this.getDate()
			};
		},
		inputFormat: 'DD.MM.YYYY',
		inputMaskFormat: '99.99.9999',

		getDate: function () {
			var date = this.model.getValue();

			return date ? moment(date, CD_DATE_FORMAT).format(this.inputFormat) : '';
		},

		setAttributeValue: function () {
			var date = this.getDate();

			this.ui.$input.val(date);
		},

		getAttributeValue: function () {
			var date = moment(this.ui.$input.val(), this.inputFormat).format(CD_DATE_FORMAT);

			return date;
		},

		render: function () {
			this.ui = {};
			this.ui.$input = this.$el.find(".attribute-value");

			UIElementBase.prototype.render.call(this);
			this.ui.$input.mask(this.inputMaskFormat);

			return this;
		}
	});

	/**
	 * Поле типа Integer
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Integer = UIElementBase.extend({
		template: templates.uiElements._integer,

		events: _.extend({
			"keypress .integer": "onIntegerKeypress"
		}, UIElementBase.prototype.events),

		onIntegerKeypress: function (eve) {
			if (eve.which < 48 || eve.which > 57) {
				eve.preventDefault();
			}
		}
	});

	/**
	 * Поле типа Double
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Double = UIElementBase.extend({
		template: templates.uiElements._double,

		events: _.extend({
			"keypress .format-double": "onFormatDoubleKeypress",
			"keyup .format-double": "onFormatDoubleKeyup"
		}, UIElementBase.prototype.events),

		onFormatDoubleKeypress: function (eve) {
			var $ct = $(eve.currentTarget);

			if ((eve.which != 46 || $ct.val().indexOf('.') != -1) &&
				(eve.which < 48 || eve.which > 57) ||
				(eve.which == 46 && $ct.caret().start == 0)) {
				eve.preventDefault();
			}
		},

		onFormatDoubleKeyup: function (event) {
			var $ct = $(event.currentTarget);

			if ($ct.val().indexOf('.') == 0) {
				$ct.val($ct.val().substring(1));
			}
		}
	});

	/**
	 * Поле типа MKB
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.MKB = UIElementBase.extend({
		template: templates.uiElements._mkb,
		events: {
			"click .MKBLauncher": "onMKBLauncherClick",
			"keyup .mkb-code": "onMKBCodeKeyUp",
			"change .mkb-code": "onMKBCodeChange"
		},

		data: function () {
			var data = {};
			data.name = this.model.get('name');
			data.mkbId = this.model.getPropertyValueFor('valueId');
			data.mkbCode = '';
			data.diagnosis = '';

			var value = this.model.getPropertyValueFor('value');
			if (value) {
				var array = value.split(/\s+/);
				data.mkbCode = array[0];
				data.diagnosis = (array.splice(1)).join(' ');
			}

			return data;
		},

		onMKBLauncherClick: function () {
			this.mkbDirectory = new App.Views.MkbDirectory();
			this.mkbDirectory.render().open();
			this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
		},

		onMKBConfirmed: function (event) {
			var sd = event.selectedDiagnosis;
			console.log('onMKBConfirmed', sd, arguments);

			this.ui.$diagnosis.val(sd.get("diagnosis"));
			this.ui.$code.val(sd.get("code"));
			this.ui.$code.data('mkb-id', sd.get("id")).trigger('change');
		},
		onMKBCodeKeyUp: function (event) {
			$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
		},

		onMKBCodeChange: function () {
			var mkbId = this.ui.$code.data('mkb-id');
			this.model.setPropertyValueFor('valueId', mkbId);

		},
		render: function () {
			var self = this;


			UIElementBase.prototype.render.call(this);

			this.ui = {};
			this.ui.$diagnosis = this.$el.find(".mkb-diagnosis");
			this.ui.$code = this.$el.find(".mkb-code");

			var patientSex = Cache.Patient.get("sex").length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;

			this.ui.$code.autocomplete({
				source: function (request, response) {
					$.ajax({
						url: "/data/dir/mkbs/",
						dataType: "jsonp",
						data: {
							filter: {
								view: "mkb",
								code: request.term,
								sex: patientSex
							}
						},
						success: function (raw) {
							response($.map(raw.data, function (item) {
								return {
									label: item.code + " " + item.diagnosis,
									value: item.code,
									id: item.id,
									diagnosis: item.diagnosis
								};
							}));
						}
					});
				},
				minLength: 2,
				select: function (event, ui) {
					console.log('ui', ui)

					self.ui.$diagnosis.val(ui.item.diagnosis);
					self.ui.$code.val(ui.item.value);
					self.ui.$code.data('mkb-id', ui.item.id).trigger('change');
				}
			}).on("keyup", function () {
					if (!$(this).val().length) {
						self.ui.$diagnosis.val("");
					}
				});


			return this;
		}
	});

	/**
	 * Поле типа FlatDirectory
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.FlatDirectory = UIElementBase.extend({
		template: templates.uiElements._flatDirectory,
		data: function () {
			//debugger;
			return {model: this.model, directoryEntries: _(this.directoryEntries.toBeautyJSON())}
		},
		initialize: function () {
			this.directoryEntries = new FlatDirectory();
			this.directoryEntries.set({id: this.model.get("scope")});
			$.when(this.directoryEntries.fetch()).then(_.bind(function () {
				this.model.setValue(this.directoryEntries.toBeautyJSON()[0].id);
				this.render();
			}, this));
			UIElementBase.prototype.initialize.apply(this);
		}
	});

	/**
	 * Поле типа Html
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Html = Documents.Views.Edit.UIElement.Text.extend({});

	/**
	 * Поле типа Select
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Select = UIElementBase.extend({
		template: templates.uiElements._select,
		getOptionText: function (model) {
			throw new Error("Documents.Views.Edit.UIElement.Select: не переопределён getOptionText");
		},
		getOptionValue: function (model) {
			throw new Error("Documents.Views.Edit.UIElement.Select: не переопределён getOptionValue");
		},
		getSelectedValue: function () {
			return this.model.getPropertyValueFor(this.getPropertyName());
		},
		getPropertyName: function () {
			return 'value';
		},
		getCollectionPath: function () {
			throw new Error("Documents.Views.Edit.UIElement.Select: не переопределён getCollectionPath");
		},
		data: function () {
			var data = {
				model: this.model,
				options: this.options,
				selected: this.selected
			}
			//console.log('data', data);
			return data;
		},
		initialize: function () {
			var self = this;
			UIElementBase.prototype.initialize.apply(self);

			require([self.getCollectionPath()], function (Options) {
				var options = new Options();
				self.selected = self.getSelectedValue();

				$.when(options.fetch({
						data: {limit: 0}
					}))
					.then(_.bind(function () {

						self.options = options.map(function (option) {
							return {
								val: self.getOptionValue(option),
								text: self.getOptionText(option)
							}
						}, self);

						//console.log('options',options, self.options);

						self.render();
					}, self));

			});


		},
		onAttributeValueChange: function () {
			var value = this.$el.find("select").val();
			this.model.setPropertyValueFor(this.getPropertyName(), value);
		},
		render: function () {
			UIElementBase.prototype.render.call(this);
			this.$el.find('select').select2();

			return this;
		}
	});

	/**
	 * Поле типа OrgStructure
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.OrgStructure = Documents.Views.Edit.UIElement.Select.extend({
		getOptionText: function (model) {
			return model.get('name');
		},
		getOptionValue: function (model) {
			return model.get('id');
		},
		getPropertyName: function () {
			return 'valueId';
		},
		getCollectionPath: function () {
			return 'collections/departments';
		}
	});

	/**
	 * Поле типа OperationType
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.OperationType = Documents.Views.Edit.UIElement.Select.extend({
		getOptionText: function (model) {
			return model.get('value');
		},
		getOptionValue: function (model) {
			return model.get('id');
		},
		getPropertyName: function () {
			return 'value';
		},
		getCollectionPath: function () {
			return 'collections/OperationType';
		}
	});

	/**
	 * Фабрика для создания элементов шаблона соответсвующего типа
	 * @type {Function}
	 */
	var UIElementFactory = Documents.Views.Edit.UIElementFactory = function () {
	};
	UIElementFactory.prototype.UIElementClass = Documents.Views.Edit.UIElement.Base;
	UIElementFactory.prototype.make = function (options) {
		//Регистрация типов
		switch (options.model.get('type').toLowerCase()) {
			case "constructor":
				this.UIElementClass = Documents.Views.Edit.UIElement.Constructor;
				break;
			case "string":
				this.UIElementClass = Documents.Views.Edit.UIElement.String;
				break;
			case "text":
				this.UIElementClass = Documents.Views.Edit.UIElement.Text;
				break;
			case "time":
				this.UIElementClass = Documents.Views.Edit.UIElement.Time;
				break;
			case "date":
				this.UIElementClass = Documents.Views.Edit.UIElement.Date;
				break;
			case "integer":
				this.UIElementClass = Documents.Views.Edit.UIElement.Integer;
				break;
			case "double":
				this.UIElementClass = Documents.Views.Edit.UIElement.Double;
				break;
			case "mkb":
				this.UIElementClass = Documents.Views.Edit.UIElement.MKB;
				break;
			case "flatdirectory":
				this.UIElementClass = Documents.Views.Edit.UIElement.FlatDirectory;
				break;
			case "html":
				this.UIElementClass = Documents.Views.Edit.UIElement.Html;
				break;
			case "orgstructure":
				this.UIElementClass = Documents.Views.Edit.UIElement.OrgStructure;
				break;
			case "operationtype":
				this.UIElementClass = Documents.Views.Edit.UIElement.OperationType;
				break;
			default:
				this.UIElementClass = Documents.Views.Edit.UIElement.Base;
				break;
		}
		return new this.UIElementClass(options);
	};

	/**
	 * Patched thesaurus view, supporting safe tear down
	 * @type {*}
	 */
	var ThesaurusPopUp = Documents.Views.Edit.ThesaurusPopUp = Thesaurus.Thesaurus.extend({
		initialize: function () {
			this.model = new (Backbone.Model.extend({
				rootCode: "",
				selectedTerms: "",
				attrId: ""
			}))();

			this.model.on("change:rootCode", this.onRootCodeChange, this);
			this.model.on("change:selectedTerms", this.onSelectedTermsChange, this);

			this.termTree = new Documents.Views.Edit.ThesaurusPopUpTree({
				collection: new App.Collections.ThesaurusTerms(),
				className: "Tree",
				isRoot: true
			});

			Thesaurus.termDispatcher.on("term:selected", this.appendTerm, this);

			this.subViews = [this.termTree];
		},
		tearDown: function () {
			this.model.off();
			Thesaurus.termDispatcher.off();
			this.close();
			ViewBase.prototype.tearDown.call(this);
		},
		open: function (options) {
			Thesaurus.Thesaurus.prototype.open.call(this, options);
			return this;
		},
		onCancel: function () {
			this.tearDown();
		},
		onConfirm: function () {
			this.trigger("thesaurus:confirmed", this.model.toJSON());
			this.tearDown();
		},
		tearDownSubviews: ViewBase.prototype.tearDownSubviews
	});
	Documents.Views.Edit.ThesaurusPopUpTree = Thesaurus.ThesaurusTree.extend({
		tearDown: function () {
			this.collection.off("reset", this.onTermTreeReset, this);
			ViewBase.prototype.tearDown.call(this);
		},
		render: function () {
			if (!this.subViews) this.subViews = [];
			this.$el.html(this.collection.map(function (term) {
				var termTreeItem = new Documents.Views.Edit.ThesaurusPopUpTreeNode({model: term, parent: this.options.parent});
				termTreeItem.on("term:selected", this.onTermSelected, this);
				this.subViews.push(termTreeItem);
				return termTreeItem.render().el;
			}, this));
			return this;
		},
		tearDownSubviews: ViewBase.prototype.tearDownSubviews
	});
	Documents.Views.Edit.ThesaurusPopUpTreeNode = Thesaurus.ThesaurusTreeNode.extend({
		tearDown: function () {
			this.model.get("childrenTerms").off("reset", this.onChildrenTermsReset, this);
			ViewBase.prototype.tearDown.call(this);
		},
		createBranch: function () {
			if (!this.subViews) this.subViews = [];
			var branch = new Documents.Views.Edit.ThesaurusPopUpTree({collection: this.model.get("childrenTerms"), parent: this});
			this.subViews.push(branch);
			branch.render().$el.appendTo(this.$el.addClass("Opened"));
		},
		tearDownSubviews: ViewBase.prototype.tearDownSubviews
	});
	//endregion


	//region VIEWS REVIEW BASE
	//---------------------
	Documents.Views.Review.Base.Layout = LayoutBase.extend({
		template: templates._reviewLayout,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);
			this.listenTo(this.collection, "review:next", this.onDocumentsReviewNext);
			this.listenTo(this.collection, "review:prev", this.onDocumentsReviewPrev);
		},

		tearDown: function () {
			this.tearDownSubviews();
			this.stopListening(this.collection, "review:next", this.onDocumentsReviewNext);
			this.stopListening(this.collection, "review:prev", this.onDocumentsReviewPrev);
			this.undelegateEvents();
			this.remove();
		},

		onDocumentsReviewNext: function () {
			var nextDocumentListItem = this.options.documents.at(this.getListItemIndex() + 1);
			var nextDocument = new Documents.Models.Document({id: nextDocumentListItem.id});

			this.collection.reset([nextDocument]);
		},

		onDocumentsReviewPrev: function () {
			var prevDocumentListItem = this.options.documents.at(this.getListItemIndex() - 1);
			var prevDocument = new Documents.Models.Document({id: prevDocumentListItem.id});

			this.collection.reset([prevDocument]);
		},

		getListItemIndex: function () {
			var currentDocument = this.collection.first();
			var currentDocumentListItem = this.options.documents.get(currentDocument.id);

			return this.options.documents.indexOf(currentDocumentListItem);
		},

		getEditPageTypeName: function () {
			return "document-edit";
		},

		render: function () {
			return LayoutBase.prototype.render.call(this, {
				".review-controls": new Documents.Views.Review.Base.Controls({collection: this.collection}),
				".sheets": new Documents.Views.Review.Base.SheetList({
					collection: this.collection,
					showIcons: this.options.showIcons && !appeal.isClosed(),
					editPageTypeName: this.getEditPageTypeName()
				})
			});
		}
	});

	/**
	 * Элементы управления
	 * @type {*}
	 */
	Documents.Views.Review.Base.Controls = ViewBase.extend({
		template: templates._reviewControls,

		data: function () {
			return {selectedDocuments: this.collection};
		},

		events: {
			"click .back-to-document-list": "onBackToDocumentListClick",
			"click .next-document": "onNextDocumentClick",
			"click .prev-document": "onPrevDocumentClick",
			"click .print-documents.single-page": "onPrintDocumentsSinglePageClick",
			"click .print-documents.multiple-pages": "onPrintDocumentsMultiplePagesClick"
		},

		onBackToDocumentListClick: function () {
			this.collection.trigger("review:quit");
		},

		onNextDocumentClick: function () {
			this.collection.trigger("review:next");
		},

		onPrevDocumentClick: function () {
			this.collection.trigger("review:prev");
		},

		onPrintDocumentsSinglePageClick: function () {
			new App.Views.Print({
				data: this.getPrintData(),
				template: "documentsToPrintTogether"
			});
		},

		onPrintDocumentsMultiplePagesClick: function () {
			new App.Views.Print({
				data: this.getPrintData(),
				template: "documentsToPrintSeparately"
			});
		},

		getPrintData: function () {
			return {documents: this.collection.map(function (document) {
				var summaryAttrs = document.get("group")[0]["attribute"];

				return {
					patientId: appeal.get("patient").get("id"),
					patientName: appeal.get("patient").get("name").toJSON(),

					appealId: appealId,
					appealNumber: appeal.get("number"),

					id: document.get("id"),
					name: summaryAttrs[1]["properties"][0]["value"],
					endDate: moment(document.getDates().begin.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:ss"),
					doctorName: [
						summaryAttrs[4]["properties"][0]["value"],
						summaryAttrs[5]["properties"][0]["value"],
						summaryAttrs[6]["properties"][0]["value"]
					].join(" "),
					doctorSpecs: summaryAttrs[7]["properties"][0]["value"],
					attributes: document.getFilledAttrs()
				};


				/*var pointType = _(data.attributes).where({id: 96});

				 if (pointType.length) {
				 var pointTypeId = pointType[0].value;
				 var directoryValue = _(this.hospitalizationPointTypes.toBeautyJSON()).find(function (type) {
				 return type.id == pointTypeId;
				 });
				 if (directoryValue) {
				 _(data.attributes).where({id: 96})[0].value = directoryValue['49'];
				 //pointType.value = directoryValue['49'];
				 }
				 }*/
			}, this)};
		},

		render: function () {
			ViewBase.prototype.render.call(this);

			/*this.$(".buttonset").buttonset();
			 this.$(".print-options").hide().menu();
			 this.$(".show-print-options").on("click", _.bind(function () {
			 this.$(".print-options").show().position({
			 my: "right top",
			 at: "left bottom",
			 of: this.$(".show-print-options")
			 });
			 }, this));*/
		}

		/*initialize: function () {
		 this.listenTo(this.collection, "reset", this.onCollectionReset);
		 },

		 tearDown: function () {
		 this.tearDownSubviews();
		 this.stopListening(this.collection, "reset", this.onCollectionReset);
		 this.undelegateEvents();
		 this.remove();
		 },

		 onCollectionReset: function () {

		 }*/
	});

	/**
	 * Значения полей из документа
	 * @type {*}
	 */
	Documents.Views.Review.Base.Sheet = ViewBase.extend({
		template: templates._reviewSheet,

		data: function () {
			var tmplData = {};
			var documentJSON = this.model.toJSON()[0];

			if (!_.isUndefined(documentJSON.version)) {
				var summaryAttrs = documentJSON["group"][0]["attribute"];

				tmplData = {
					id: documentJSON.id,
					typeId: documentJSON.typeId,
					attributes: this.model.getFilledAttrs(),
					name: summaryAttrs[1]["properties"][0]["value"],
					//endDate: summaryAttrs[3]["properties"][0]["value"],
					beginDate: moment(this.model.getDates().begin.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:ss"),
					endDate: this.model.getDates().end.getValue() ?
						moment(this.model.getDates().end.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:ss") :
						false,
					doctorName: [
						summaryAttrs[4]["properties"][0]["value"],
						summaryAttrs[5]["properties"][0]["value"],
						summaryAttrs[6]["properties"][0]["value"]
					].join(" "),
					doctorSpecs: summaryAttrs[7]["properties"][0]["value"],
					loaded: true,
					showIcons: this.options.showIcons
				};
			} else {
				tmplData = {
					loaded: false
				};
			}

			console.log(tmplData);

			return {document: tmplData};
		},

		events: {
			"click .edit-document": "onEditDocumentClick",
			"click .duplicate-document": "onDuplicateDocumentClick"
		},

		initialize: function () {
			this.listenTo(this.model, "change:version", this.onModelReset);
			this.model.fetch();
		},

		onModelReset: function () {
			this.render();
		},

		onEditDocumentClick: function (event) {
			event.preventDefault();
			if ($(event.currentTarget).data('document-id')) {
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					options: {documentId: $(event.currentTarget).data('document-id')}
				});
			}
		},

		onDuplicateDocumentClick: function (event) {
			event.preventDefault();
			if ($(event.currentTarget).data('template-id')) {
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					options: {templateId: $(event.currentTarget).data('template-id')}
				});
			}
		}
	});

	/**
	 * Значения полей из документа
	 * @type {*}
	 */
	Documents.Views.Review.Base.SheetList = RepeaterBase.extend({
		initialize: function () {
			RepeaterBase.prototype.initialize.call(this, this.options);
			this.listenTo(this.collection, "reset", this.onCollectionReset);
		},

		tearDown: function () {
			this.tearDownSubviews();
			this.stopListening(this.collection, "reset", this.onCollectionReset);
			this.undelegateEvents();
			this.remove();
		},

		getRepeatView: function (repeatOptions) {
			if (repeatOptions.model &&
				repeatOptions.model.collection &&
				(repeatOptions.model.collection.indexOf(repeatOptions.model) % 2 == 0)) {
				repeatOptions.className = "sheet odd-sheet";
			} else {
				repeatOptions.className = "sheet even-sheet";
			}
			repeatOptions.showIcons = !!this.options.showIcons;
			repeatOptions.editPageTypeName = this.options.editPageTypeName;

			return new Documents.Views.Review.Base.Sheet(repeatOptions);
		},

		onCollectionReset: function () {
			this.tearDownSubviews();
			this.render();
		}
	});
	//endregion

	//region REVIEW EXAMINATION
	Documents.Views.Review.Examination.Layout = Documents.Views.Review.Base.Layout.extend({
		getEditPageTypeName: function () {
			return "examination-edit";
		}
	});
	//endregion

	//region REVIEW THERAPY
	Documents.Views.Review.Therapy.Layout = Documents.Views.Review.Base.Layout.extend({
		getEditPageTypeName: function () {
			return "therapy-edit";
		}
	});
	//endregion
	//endregion


	return Documents;
});
