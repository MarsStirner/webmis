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
	var HIDDEN_TYPES = ['JobTicket', 'RLS']; //типы полей, которые не выводятся в ui.
	var ID_TYPES = ["MKB", "FLATDIRECTORY", "PERSON"];
	var INPUT_DATE_FORMAT = 'DD.MM.YYYY';
	var CD_DATE_FORMAT = 'YYYY-MM-DD HH:mm:ss'; //Формат даты в коммон дата
	var FLAT_CODES = {
		PANIC: "panic",
		DUTY_DOCTOR: "dutyDoctor"
	};


	//region BOOTSTRAP
	var Backbone = window.Backbone;
	var _ = window._;
	var appealId = 0;
	var appeal = null;
	var dispatcher = _.extend({}, Backbone.Events);
	var fds = {};
	//endregion


	//region DEPENDENCIES
	var templates = {
		_panicBtn: _.template(require("text!templates/documents/panic-btn.html")),
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
		//_editGrid: _.template(require("text!templates/documents/edit/grid.html")),
		//_editGridSpan: _.template(require("text!templates/documents/edit/span.html")),
		_reviewLayout: _.template(require("text!templates/documents/review/layout.html")),
		_reviewControls: _.template(require("text!templates/documents/review/controls.html")),
		_reviewSheet: _.template(require("text!templates/documents/review/sheet.html")),
		_reviewSheetRow: _.template(require("text!templates/documents/review/sheet-row.html")),
		uiElements: {
			_base: _.template(require("text!templates/documents/edit/ui-elements/base.html")),
			_constructor: _.template(require("text!templates/documents/edit/ui-elements/constructor.html")),
			_text: _.template(require("text!templates/documents/edit/ui-elements/text.html")),
			_htmlHelper: _.template(require("text!templates/documents/edit/ui-elements/html-helper.html")),
			_date: _.template(require("text!templates/documents/edit/ui-elements/date.html")),
			_time: _.template(require("text!templates/documents/edit/ui-elements/time.html")),
			_double: _.template(require("text!templates/documents/edit/ui-elements/double.html")),
			_integer: _.template(require("text!templates/documents/edit/ui-elements/integer.html")),
			_string: _.template(require("text!templates/documents/edit/ui-elements/string.html")),
			_mkb: _.template(require("text!templates/documents/edit/ui-elements/mkb.html")),
			_flatDirectory: _.template(require("text!templates/documents/edit/ui-elements/flat-directory.html")),
			_select: _.template(require("text!templates/documents/edit/ui-elements/select.html")),
			_person: _.template(require("text!templates/documents/edit/ui-elements/person.html"))
		}
	};

	var Thesaurus = require("views/appeal/edit/popups/thesaurus");
	var FlatDirectory = require("models/flat-directory");
	var MKB = require("views/mkb-directory");
	var PersonDialog = require("views/ui/PersonDialog");
	var LabResult = require('models/diagnostics/laboratory/laboratory-diag-form');
	var LaboratoryResultView = require("views/diagnostics/laboratory/AnalysisResultView");
	var InstrumentalResearchs = require('collections/diagnostics/instrumental/InstrumentalResearchs');
	var InstrumentalResultView = require("views/diagnostics/instrumental/InstrumentalResultView");
	var Consultations = require('collections/diagnostics/consultations/Consultations');
	var ConsultationsResultView = require("views/diagnostics/consultations/ConsultationsResultView");

	var FDLoader = {
		fds: {},
		get: function (id, cb, context) {
			if (!this.fds[id]) {
				var directoryEntries = new FlatDirectory();
				directoryEntries.set({id: id});
				$.when(this.directoryEntries.fetch()).then(cb);
			}

			return this.fds[id] ;
		}
	};
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

		anyCopiedAttrHasValue: false,

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

			if (!groupedByRow.UNDEFINED) {
				groupedByRow.UNDEFINED = [];
			}

			var rows = [];

			for (var i = 0; i < groupedByRow.UNDEFINED.length; i++) {
				if (i == 0 || i % 2 == 0) {
					rows.push({spans: new Backbone.Collection()});
				}

				rows[rows.length - 1].spans.add(new Documents.Models.TemplateAttribute(groupedByRow.UNDEFINED[i]));
			}

			return rows;
		},

		getGroupedByRow: function () {
			if (!this.groupedByRow) {
				this.groupedByRow = this.groupByRow();
			}

			return this.groupedByRow;
		},

		copyAttributes: function (document) {
			this.anyCopiedAttrHasValue = false;
			_(document.get("group")[1].attribute).each(function (copyAttr) {
				_(this.getGroupedByRow()).each(function (row) {
					row.spans.each(function (attr) {
						if (attr.get("typeId") == copyAttr.typeId) {
							attr.copyValue(copyAttr);
							if (attr.hasValue()) {
								this.anyCopiedAttrHasValue = true;
							}
						}
					}, this);
				}, this);
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
			return raw.data[0];
		},

		toJSON: function () {
			return [Model.prototype.toJSON.apply(this)];
		},

		setCloseDate: function () {
			this.getDates().end.setValue(this.shouldBeClosed ? moment().format(CD_DATE_FORMAT) : "");
		},

		validate: function (arg1, arg2) {
			if (!arg2) {
				var requiredValidationFail = false;

				_(this.getGroupedByRow()).each(function (row) {
					row.spans.each(function (templateAttr) {
						if (templateAttr.isMandatory() && !templateAttr.hasValue()) {
							templateAttr.trigger("requiredValidation:fail");
							requiredValidationFail = true;
						}
					});
				});

				if (requiredValidationFail) return requiredValidationFail;
			}
		}
	});

	Documents.Models.Document = Documents.Models.DocumentBase.extend({
		urlRoot: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/documents/";
		},

		getFilledAttrs: function () {
			if (this.get("group") && this.get("group").length) {
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
								value: valueProp.value,
								type: a.type,
								scope: a.scope
							});
						}
					});
				}
				return examFlatJSON;
			} else {
				return [];
			}
		},

		/*collectTextNodes: function (element, texts) {
			for (var child = element.firstChild; child !== null; child = child.nextSibling) {
				if (child.nodeType === 3)
					texts.push(child);
				else if (child.nodeType === 1)
					this.collectTextNodes(child, texts);
			}
		},

		getTextWithSpaces: function (element) {
			var texts = [];
			this.collectTextNodes(element, texts);
			for (var i = texts.length; i-- > 0;)
				texts[i] = texts[i].data;
			return texts.join(' ');
		},*/

		getCleanHtmlFilledAttrs: function () {
			var filledAttrs = this.getFilledAttrs();
			_.each(filledAttrs, function (attr) {
				attr.value = Core.Strings.cleanTextMarkup(attr.value);
			}, this);
			return filledAttrs;
		},

		getTypeId: function () {
			return this.get("typeId");
		},

		save: function (attrs, options) {
			this.setCloseDate();
			Documents.Models.DocumentBase.prototype.save.call(this, attrs, options);
		}
	});

	Documents.Models.DocumentTemplate = Documents.Models.DocumentBase.extend({
		urlRoot: DATA_PATH + "dir/actionTypes/",

		getTypeId: function () {
			return this.id;
		},

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

			if (this.isIdType()) {
				propName = "valueId";
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
				valuePropertyIndex = props.push({name: propName, value: ""}) - 1;
			}

			return valuePropertyIndex;
		},

		getValueProperty: function () {
			if (_.isUndefined(this.valuePropertyIndex)) {
				this.valuePropertyIndex = this.getValuePropertyIndex(this.get("properties"), this.get("type"));
			}
			return this.get("properties")[this.valuePropertyIndex];
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
			if (this.isIdType()) {
				this.setPropertyValueFor("value", this.getPropertyByName("value", copyAttr.properties).value);
			}
			this.trigger("copy");
		},

		getCopyValueProperty: function (copyAttr) {
			return copyAttr.properties[this.getValuePropertyIndex(copyAttr.properties, copyAttr.type)].value;
		},

		isReadOnly: function () {
			return this.get("readOnly") === 'true';
		},

		isMandatory: function () {
			return this.get("mandatory") === 'true';
		},

		isIdType: function () {
			return ID_TYPES.indexOf(this.get("type").toUpperCase()) != -1;
		},

		hasValue: function () {
			return !_.isEmpty(this.getValue());
		},

		cleanValue: function () {
			return this.
				setPropertyValueFor("value", "").
				setPropertyValueFor("valueId", "");
		},

		/*convertValueToHtml: function () {
			return this.setValue(
				this.getValue().
					replace(/\r\n/g, '<br>').
					replace(/\s/g, '&nbsp;')

			);
		},*/

		getPropertyByName: function (name, props) {
			props = props || this.get('properties');
			return _.find(props, function (prop) {
				return prop.name === name;
			}) || props[props.push({name: name, value: ""}) - 1];
		},

		getPropertyValueFor: function (name) {
			return this.getPropertyByName(name).value;
		},

		setPropertyValueFor: function (name, value) {
			this.getPropertyByName(name).value = value;
			return this;
		}
	});
	//endregion


	//region COLLECTIONS
	Documents.Collections.DocumentList = Collection.extend({
		model: Documents.Models.DocumentListItem,
		mnems: ["EXAM", "EPI", "JOUR", "ORD", "NOT", "OTH"],
		dateRange: null,
		typeId: null,
		doctorId: null,
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

			if (this.doctorId) {
				params.push("filter[doctorId]=" + this.doctorId);
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

		lastCriteria: "",

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

		extractResult: function (groups, result, criteriaRE, testTargetProp) {
			_.each(groups, function (model) {
				if (!model.groups.length && criteriaRE.test(model[testTargetProp])) {
					result.push(model);
				}
				if (model.groups.length) {
					this.extractResult(model.groups, result, criteriaRE, testTargetProp);
				}
			}, this);
		},

		search: function (criteria) {
			this.lastCriteria = criteria;

			if (!this.originalModels) {
				this.originalModels = this.toJSON();
			}
			if (this.lastCriteria) {
				var criteriaRE = new RegExp(this.lastCriteria, "i");
				var result = [];
				this.extractResult(this.originalModels, result, criteriaRE, "name");
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
				this.search(this.lastCriteria);
			}, this));
		},

		findByFlatCode: function (flatCode) {
			if (!this.originalModels) {
				this.originalModels = this.toJSON();
			}
			var result = [];
			this.extractResult(this.originalModels, result, new RegExp(flatCode, "gi"), "flatCode");
			return result[0];
		},

		comparator: function (model) {
			return model.get("name");
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
			if (this.options.appealId) {
				appealId = this.options.appealId;
				appeal = this.options.appeal;
			}
			this.appealId = appealId;

			this.topLevel = !this.options.included;
		},

		tearDown: function () {
			if (this.topLevel) {
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

	var PanicBtn = Documents.Views.PanicBtn = ViewBase.extend({
		template: templates._panicBtn,

		events: {
			"click .panic": "onPanicClick"
		},

		data: function () {
			return {btnsDisabled: !this.documentTypes.length || appeal.isClosed()};
		},

		initialize: function () {
			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.fetch({data: {filter: {flatCode: FLAT_CODES.PANIC}}});
				console.log("documentTypes.fetch");
			}

			this.listenTo(this.documentTypes, "reset", function () {
				if (!appeal.isClosed()) {
					this.$(".panic").button("enable");
				}
			});
		},

		onPanicClick: function () {
			var panicType = this.documentTypes.findByFlatCode(FLAT_CODES.PANIC);
			if (panicType) {
				if (this.options.currentDocument) {
					pubsub.trigger('noty', {
						text: 'Текущий документ будет сохранён.',
						type: 'information'
					});
					this.options.currentDocument.save({}, {success: this.onSaveCurrentDocumentSuccess, error: this.onSaveCurrentDocumentError});
				}

				App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", panicType.id].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					mode: "SUB_EDIT",
					options: {templateId: panicType.id, force: true}
				});
			} else {
				alert("Шаблон документа для экстренной записи не определён.");
			}
		},

		onSaveCurrentDocumentSuccess: function () {
			console.info("SaveCurrentDocumentSuccess");
			pubsub.trigger('noty', {
				text: 'Документ успешно сохранён.',
				type: 'success'
			});
		},

		onSaveCurrentDocumentError: function () {
			console.info("SaveCurrentDocumentError");
			pubsub.trigger('noty', {
				text: 'При сохранении документа произошла ошибка.',
				type: 'error'
			});
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

			if (this.options.documents) {
				this.documents = this.options.documents;
			} else {
				this.documents = new Documents.Collections.DocumentList([], {appealId: this.appealId, defaultMnems: this.getDefaultDocumentsMnems()});
				this.documents.fetch({data: {sortingField: "assesmentDate", sortingMethod: "desc"}});
			}

			if (this.options.selectedDocuments) {
				this.selectedDocuments = this.options.selectedDocuments;
			} else {
				this.selectedDocuments = new Backbone.Collection();
			}
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
			return new Documents.Views.Review.Base.NoControlsLayout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		getEditPageTypeName: function () {
			return "documents";
		},

		render: function (subViews) {
			return LayoutBase.prototype.render.call(this, _.extend({
				".table-controls": new Documents.Views.List.Base.TableControls({
					collection: this.selectedDocuments,
					listItems: this.documents
				}),
				".documents-table-tbody": new Documents.Views.List.Base.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments,
					included: !!this.options.included,
					editPageTypeName: this.getEditPageTypeName()
				}),
				".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments,
					included: !!this.options.included
				}),
				".documents-paging": new Documents.Views.List.Base.Paging({collection: this.documents})
			}, subViews));
		}
	});

	/**
	 * Заголовок таблицы
	 * @type {*}
	 */
	Documents.Views.List.Base.DocumentsTableHead = ViewBase.extend({
		template: templates._documentsTableHead,

		events: {
			"click th.sortable": "onThSortableClick",
			"change .select-all-flag": "onSelectAllFlagChange"
		},

		data: function () {
			return {
				documents: this.collection,
				showIcons: !this.options.included && !appeal.isClosed(),
				isSortedBy: this.isSortedBy
			};
		},

		initialize: function () {
			_.bindAll(this, 'data');
			this.listenTo(this.options.selectedDocuments, "reset", this.onSelectedDocumentsReset);
		},

		onSelectedDocumentsReset: function () {
			this.$(".select-all-flag").prop("checked", false);
		},

		onThSortableClick: function (event) {
			var sortParams = this.getUpdatedSortParams($(event.currentTarget));

			this.collection.fetch({data: {
				sortingField: sortParams.sortingField,
				sortingMethod: sortParams.sortingMethod
			}})
		},

		getUpdatedSortParams: function ($targetTh, sortDirection) {
			if (!this.$caret) {
				this.$caret = $('<i style="color: black;margin-left: .3em;"/>');
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
				sortingField: $targetTh.data('sort-field'),
				sortingMethod: $targetTh.hasClass("desc") ? "desc" : "asc"
			};
		},

		onSelectAllFlagChange: function (event) {
			this.markAllItems($(event.currentTarget).is(":checked"));
		},

		markAllItems: function (selected) {
			if (selected) {
				this.collection.each(function (document) {
					this.options.selectedDocuments.add(new Documents.Models.Document({id: document.get("id")}));
				}, this);
			} else {
				this.options.selectedDocuments.reset();
			}
			this.collection.trigger("mark-all", {selected: selected});
		},

		render: function () {
			ViewBase.prototype.render.call(this);
			if (this.collection.requestData && this.collection.requestData.sortingField) {
				this.getUpdatedSortParams(
					this.$("[data-sort-field="+this.collection.requestData.sortingField+"]")
						.addClass("sorted "+(this.collection.requestData.sortingMethod == "asc" ? "desc" : "asc"))
				);
			}
			return this;
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
			this.listenTo(this.collection, "mark-all", this.onCollectionMarkAll);
			this.listenTo(this.options.selectedDocuments, "review:quit", this.onCollectionReset);
		},

		onCollectionReset: function () {
			this.options.selectedDocuments.reset();
			this.render();
		},

		onCollectionMarkAll: function (event) {
			this.$(".selected-flag").prop("checked", event.selected);
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
				App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, $(event.currentTarget).data('document-id'), "edit"].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					mode: "SUB_EDIT",
					options: {documentId: $(event.currentTarget).data('document-id')}
				});
			}
		},

		onDuplicateDocumentClick: function (event) {
			if ($(event.currentTarget).data('template-id')) {
				App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", $(event.currentTarget).data('template-id')].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					mode: "SUB_EDIT",
					options: {templateId: $(event.currentTarget).data('template-id')}
				});
			}
		},

		onItemClick: function (event) {
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

			var sortField = $targetTh.data('sort-field');
			this.collection.fetch({data: {sortingField: sortField}})
		},

		updatedSelectedItems: function (selected, itemId) {
			if (selected) {
				this.options.selectedDocuments.add(new Documents.Models.Document({id: itemId}));
			} else {
				this.options.selectedDocuments.remove(this.options.selectedDocuments.get(itemId));
			}
		}
	});

	/**
	 * Элементы управления данными таблицы
	 * @type {*}
	 */
	Documents.Views.List.Base.TableControls = ViewBase.extend({
		template: templates._listTableControls,

		data: function () {
			return {
				selectedDocuments: this.collection,
				filteredbyExecPerson: !!this.options.listItems.doctorId
			};
		},

		events: {
			"click .review-selected": "onReviewSelectedClick",
			"change .by-exec-person": "onByExecPersonChange"
		},

		initialize: function () {
			this.listenTo(this.collection, "add remove reset", this.onCollectionChange);
		},

		onReviewSelectedClick: function (event) {
			this.collection.trigger("review:enter");
		},

		onCollectionChange: function () {
			this.render();
		},

		//TODO: this should be in filters
		////////
		onByExecPersonChange: function (event) {
			this.applyExecPersonFilter($(event.currentTarget).is(":checked"));
		},

		applyExecPersonFilter: function (enabled) {
			this.options.listItems.doctorId = enabled ? appeal.get("execPerson").id : null;
			this.options.listItems.fetch();
		}
		///////

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

			this.collection.dateFilter = rangeMnem;
			this.collection.dateRange = dateRange;
			this.collection.pageNumber = 1;
			this.collection.fetch();
		},

		render: function () {
			ViewBase.prototype.render.apply(this);
			this.$("[name=document-create-date-filter][value="+(this.collection.dateFilter || "ALL")+"]").prop("checked", true).parent().buttonset();
		}
	});

	/**
	 * Элементы управления созданием доков
	 * @type {*}
	 */
	Documents.Views.List.Base.Controls = ViewBase.extend({
		template: templates._listControlsBase,

		data: function () {
			return {btnsDisabled: !this.documentTypes.length || appeal.isClosed()};
		},

		events: {
			"click .new-document": "onNewDocumentClick"
		},

		initialize: function () {
			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.fetch();
				console.log("documentTypes.fetch");
			}

			this.listenTo(this.documentTypes, "reset", function () {
				if (!appeal.isClosed()) {
					this.$(".new-document,.new-duty-doc-exam").button("enable");
				}
			});

			this.listenTo(this.documentTypes, "document-type:selection-confirmed", this.onDocumentTypeSelected);
		},

		onDocumentTypeSelected: function (event) {
			App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", event.selectedType].join("/"));
			dispatcher.trigger("change:viewState", {
				type: this.options.editPageTypeName,
				mode: "SUB_EDIT",
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
				height: 550,
				resizable: false,
				close: _.bind(this.tearDown, this),
				buttons: [
					{text: "Создать", "class": "button-color-green", click: _.bind(this.onCreateDocumentClick, this)},
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
			ViewBase.prototype.render.call(this, {
				".search-result-count": new Documents.Views.List.Base.DocumentTypeSearchResultCount({collection: this.collection})
			});
			setTimeout(_.bind(function () {
				this.$(".document-type-search").focus();
			}, this), 100);
			return this;
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

			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.fetch();
				console.log("documentTypes.fetch");
			}

			//this.reviewStateToggles.push(".documents-controls");
		},

		toggleReviewState: function () {
			App.Router.updateUrl(["appeals",appealId,this.getEditPageTypeName(),this.selectedDocuments.pluck("id").join(",")].join("/"));
			dispatcher.trigger("change:viewState", {
				type: this.getEditPageTypeName(),
				mode: "SUB_REVIEW",
				options: {
					collection: this.selectedDocuments,
					documents: this.documents,
					documentTypes: this.documentTypes,
					included: false,
					showIcons: !this.options.included
				}
			});
		},

		/*getReviewLayout: function () {
			return new Documents.Views.Review.Base.NoControlsLayout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},*/

		render: function () {
			return Documents.Views.List.Common.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Common.Controls({
					collection: this.documents,
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
				}),
				".panic-btn": new PanicBtn({
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
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
			dispatcher.trigger("change:viewState", {type: this.options.editPageTypeName, mode: "SUB_EDIT", options: {templateId: 2844}});
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
			this.applyDocumentTypeFilter($(event.currentTarget).val());
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
			this.collection.mnemFilter = type;
			this.collection.mnems = mnems;
			this.collection.pageNumber = 1;
			this.collection.fetch();
		},

		render: function () {
			Documents.Views.List.Base.Filters.prototype.render.apply(this);
			this.$(".document-type-filter").val(this.collection.mnemFilter || "ALL");
			return this;
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
			return new Documents.Views.Review.Examination.NoControlsLayout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		getEditPageTypeName: function () {
			return "examinations";
		},

		render: function (subViews) {
			return ListLayoutBase.prototype.render.call(this, _.extend({
				".documents-table-body": new Documents.Views.List.Examination.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments,
					included: !!this.options.included,
					editPageTypeName: this.getEditPageTypeName()
				}),
				/*".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					included: !!this.options.included
				}),*/
				".documents-filters": new Documents.Views.List.Base.Filters({collection: this.documents})
			}, subViews));
		}
	});

	Documents.Views.List.Examination.Layout = Documents.Views.List.Examination.LayoutHistory.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			Documents.Views.List.Examination.LayoutHistory.prototype.initialize.call(this, this.options);
			//this.reviewStateToggles.push(".documents-controls");
		},

		toggleReviewState: Documents.Views.List.Common.Layout.prototype.toggleReviewState,

		render: function () {
			return Documents.Views.List.Examination.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Examination.Controls({editPageTypeName: this.getEditPageTypeName()})
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
			App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", 139].join("/"));
			dispatcher.trigger("change:viewState", {type: this.options.editPageTypeName, mode: "SUB_EDIT", options: {templateId: 139}});
		},

		onNewExaminationPrimaryRepeatedClick: function () {
			//TODO: HARCODED
			App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", 2456].join("/"));
			dispatcher.trigger("change:viewState", {type: this.options.editPageTypeName, mode: "SUB_EDIT", options: {templateId: 2456}});
		}
	});

	Documents.Views.List.Examination.DocumentsTable = Documents.Views.List.Base.DocumentsTable.extend({});
	//endregion


	//region VIEWS LIST THERAPY
	//---------------------
	Documents.Views.List.Therapy.LayoutHistory = ListLayoutBase.extend({
		template: templates._listLayout,

		getDefaultDocumentsMnems: function () {
			return ["THER"];
		},

		getReviewLayout: function () {
			return new Documents.Views.Review.Therapy.NoControlsLayout({
				collection: this.selectedDocuments,
				documents: this.documents,
				included: true,
				showIcons: !this.options.included
			});
		},

		getEditPageTypeName: function () {
			return "therapy";
		},

		render: function (subViews) {
			return ListLayoutBase.prototype.render.call(this, _.extend({
				/*".documents-table-head": new Documents.Views.List.Base.DocumentsTableHead({
					collection: this.documents,
					included: !!this.options.included
				}),*/
				".documents-table-body": new Documents.Views.List.Therapy.DocumentsTable({
					collection: this.documents,
					selectedDocuments: this.selectedDocuments,
					included: !!this.options.included,
					editPageTypeName: this.getEditPageTypeName()
				}),
				".documents-filters": new Documents.Views.List.Base.Filters({collection: this.documents})
			}, subViews));
		}
	});

	Documents.Views.List.Therapy.Layout = Documents.Views.List.Therapy.LayoutHistory.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			Documents.Views.List.Therapy.LayoutHistory.prototype.initialize.call(this, this.options);

			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.mnems = ["THER"];
				this.documentTypes.fetch();
				console.log("documentTypes.fetch");
			}

			//this.reviewStateToggles.push(".controls-block");
		},

		toggleReviewState: Documents.Views.List.Common.Layout.prototype.toggleReviewState,

		render: function () {
			return Documents.Views.List.Therapy.LayoutHistory.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Therapy.Controls({
					collection: this.documents,
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
				})
			});
		}
	});

	Documents.Views.List.Therapy.Controls = Documents.Views.List.Base.Controls.extend({
		showDocumentTypeSelector: function () {
			new Documents.Views.List.Therapy.DocumentTypeSelector({collection: this.documentTypes}).render();
		}
	});

	Documents.Views.List.Therapy.DocumentsTable = Documents.Views.List.Base.DocumentsTable.extend({});

	Documents.Views.List.Therapy.DocumentTypeSelector = Documents.Views.List.Base.DocumentTypeSelector.extend({
		getSearchView: function () {
			return new Documents.Views.List.Base.DocumentTypeSearch({collection: this.collection, showTypeMnem: false});
		}
	});
	//endregion


	//region VIEWS EDIT BASE
	//---------------------
	Documents.Views.Edit.Base.Layout = LayoutBase.extend({
		template: templates._editLayout,

		dividedStateEnabled: false,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			if (!this.model) {
				if (this.options.templateId || this.options.mode === "SUB_NEW" && this.options.subId) {
					this.model = new Documents.Models.DocumentTemplate({
						id: this.options.templateId || this.options.subId
					});
				} else if (this.options.documentId || this.options.mode === "SUB_EDIT" && this.options.subId) {
					this.model = new Documents.Models.Document({
						id: this.options.documentId || this.options.subId
					});
				} else {
					console.error("Oops! No template or document id!");
					/*App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", 139].join("/"));
					dispatcher.trigger("change:viewState", {type: "documents", mode: "REVIEW"});*/
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

				this.listLayoutHistory.$(".documents-controls").parent().remove();
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

		//getEditPageTypeName: Documents.Views.List.Common.Layout.prototype.getEditPageTypeName,

		persistenceCheck: function (callback) {
			var checkPopUp = new PopUpBase();
			checkPopUp.template = _.template("При переходе на другую страницу введённые данные будут утеряны.<br>Сохранить редактируемый документ?");
			checkPopUp.dialogOptions = {
				title: "Внимание",
				modal: true,
				width: 600,
				height: 200,
				resizable: false,
				//close: _.bind(checkPopUp.tearDown, checkPopUp),
				buttons: [
					{text: "Сохранить", "class": "button-color-green", click: _.bind(function () {
						this.persistDoc();
						checkPopUp.tearDown();
						callback(true);
					}, this)},
					{text: "Не сохранять", click:  function () {
						checkPopUp.tearDown();
						callback(true);
					}},
					{text: "Отмена", click:  function () {
						checkPopUp.tearDown();
						callback(false);
						//App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, $(event.currentTarget).data('document-id'), "edit"].join("/"));
					}}
				]
			};
			checkPopUp.render();
		},

		persistDoc: function () {
			pubsub.trigger('noty', {
				text: 'Текущий документ будет сохранён.',
				type: 'information'
			});
			this.model.save({}, {success: this.onSaveCurrentDocumentSuccess, error: this.onSaveCurrentDocumentError});
		},

		onSaveCurrentDocumentSuccess: function () {
			console.info("SaveCurrentDocumentSuccess");
			pubsub.trigger('noty', {
				text: 'Документ успешно сохранён.',
				type: 'success'
			});
		},

		onSaveCurrentDocumentError: function () {
			console.info("SaveCurrentDocumentError");
			pubsub.trigger('noty', {
				text: 'При сохранении документа произошла ошибка.',
				type: 'error'
			});
		},

		render: function (subViews) {
			return ViewBase.prototype.render.call(this, _.extend({
				/*".new-document-controls": new Documents.Views.Edit.Common.Controls({
				 editPageTypeName: this.getEditPageTypeName()
				 }),*/
				".nav-controls": new Documents.Views.Edit.NavControls({model: this.model}),
				".heading": new Documents.Views.Edit.Heading({model: this.model}),
				".dates": new Documents.Views.Edit.Dates({model: this.model}),
				".document-grid": new Documents.Views.Edit.Grid({model: this.model}),
				".document-controls": new Documents.Views.Edit.DocControls({model: this.model})
			}, subViews));
		}
	});

	/**
	 * Верхний блок элементов управления и навигации
	 * @type {*}
	 */
	Documents.Views.Edit.NavControls = ViewBase.extend({
		template: templates._editNavControls,

		events: {
			"change .toggle-divided-state": "onToggleDividedStateClick",
			"click .copy-from": "onCopyFromClick",
			"click .copy-from-prev": "onCopyFromPrevClick",
			"click .copy-from-selected": "onCopyFromSelectedClick"
		},

		onToggleDividedStateClick: function () {
			this.model.trigger("toggle:dividedState");
			/*if (this.$(".toggle-divided-state .ui-button-text").text() == "История") {
			 this.$(".toggle-divided-state .ui-button-text").text("Скрыть историю");
			 } else {
			 this.$(".toggle-divided-state .ui-button-text").text("История");
			 }*/
		},

		onCopyFromClick: function () {
			var menu = this.$(".copy-options");

			menu.css({"min-width": this.$(".copy-from").width()}).show().position({
				my: "right top",
				at: "right bottom",
				of: this.$(".copy-from")
			});

			$(document).one("click", function() {
				menu.hide();
			});

			return false;
		},

		onCopyFromPrevClick: function () {
			var documentLastByType = new Documents.Models.DocumentLastByType({id: this.model.getTypeId()});
			this.fetchCopySource(documentLastByType);
		},

		onCopyFromSelectedClick: function () {
			this.copySourceList = new Documents.Collections.DocumentList([], {});
			this.listenTo(this.copySourceList, "copy-source:selected", this.onCopySourceSelected);

			new Documents.Views.Edit.CopySourceSelector({
				typeId: this.model.getTypeId(),
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
			if (!this.model.anyCopiedAttrHasValue) {
				alert("Скопированный документ не содержит заполненных полей.");
			}
		},

		render: function () {
			ViewBase.prototype.render.call(this);
			this.$(".copy-options").hide().menu();
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
			this.collection.fetch({data: {
				limit: 999,
				sortingField: "assesmentDate",
				sortingMethod: "desc"
			}});
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
			this.saveDocument();
		},

		onCancelClick: function (event) {
			this.returnToList();
		},

		onSaveDocumentSuccess: function (result) {
			var resultId = result.id || result.data[0].id;
			this.goToDocReview(resultId);
		},

		onSaveDocumentError: function (resultId) {
			this.$('button').button('enable');
			alert("При сохранении документа произошла ошибка. Повторите попытку.");
			console.log(arguments);
		},

		saveDocument: function () {
			//this.model.save({}, {success: this.onSaveDocumentSuccess, error: this.onSaveDocumentError});
			if (this.model.isValid()) {
				this.$('button').button('disable');
				//console.log(JSON.stringify(this.model.toJSON()));
				this.model.save({}, {success: this.onSaveDocumentSuccess, error: this.onSaveDocumentError});
			}
		},

		goToDocReview: function (resultId) {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "documents", resultId].join("/"));
			dispatcher.trigger("change:viewState", {mode: "SUB_REVIEW", type: "documents", options: {
				subId: resultId
			}});
		},

		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "documents"].join("/"));
			dispatcher.trigger("change:viewState", {mode: "REVIEW", type: "documents"});
		}
	});
	//endregion


	//region VIEWS EDIT COMMON
	//---------------------
	var layoutAttributesDir = new Documents.Models.LayoutAttributesDir();

	Documents.Views.Edit.Common.Layout = Documents.Views.Edit.Base.Layout.extend({
		//template: templates._editLayout,

		getEditPageTypeName: Documents.Views.List.Common.Layout.prototype.getEditPageTypeName,

		render: function (subViews) {
			return Documents.Views.Edit.Base.Layout.prototype.render.call(this, _.extend({
				".panic-control": new Documents.Views.PanicBtn({
					editPageTypeName: this.getEditPageTypeName(),
					currentDocument: this.model
				})
			}, subViews));
		}
	});

	//Documents.Views.Edit.Common.Controls = Documents.Views.List.Common.Controls.extend({});
	//endregion


	//region VIEWS EDIT EXAMINATION
	//---------------------
	Documents.Views.Edit.Examination.Layout = Documents.Views.Edit.Base.Layout.extend({
		getListLayoutHistory: function () {
			return new Documents.Views.List.Examination.LayoutHistory({included: true});
		},
		//getEditPageTypeName: Documents.Views.List.Examination.Layout.prototype.getEditPageTypeName,
		render: function () {
			return Documents.Views.Edit.Base.Layout.prototype.render.call(this, {
				/*".new-document-controls": new Documents.Views.Edit.Examination.Controls({
					editPageTypeName: this.getEditPageTypeName()
				}),*/
				".document-controls": new Documents.Views.Edit.Examination.DocControls({model: this.model})
			});
		}
	});

	Documents.Views.Edit.Examination.DocControls = Documents.Views.Edit.DocControls.extend({
		goToDocReview: function (resultId) {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "examinations", resultId].join("/"));
			dispatcher.trigger("change:viewState", {mode: "SUB_REVIEW", type: "examinations", options: {
				subId: resultId
			}});
		},
		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "examinations"].join("/"));
			dispatcher.trigger("change:viewState", {mode: "REVIEW", type: "examinations"});
		}
	});

	//Documents.Views.Edit.Examination.Controls = Documents.Views.List.Examination.Controls.extend({});
	//endregion


	//region VIEWS EDIT THERAPY
	//---------------------
	Documents.Views.Edit.Therapy.Layout = Documents.Views.Edit.Base.Layout.extend({
		/*initialize: function () {
			Documents.Views.Edit.Common.Layout.prototype.initialize.call(this, this.options);
			this.documentTypes = new Documents.Collections.DocumentTypes();
			this.documentTypes.mnems = ["THER"];
			this.documentTypes.fetch();
		},*/
		getListLayoutHistory: function () {
			return new Documents.Views.List.Therapy.LayoutHistory({included: true});
		},
		//getEditPageTypeName: Documents.Views.List.Therapy.Layout.prototype.getEditPageTypeName,
		render: function () {
			return Documents.Views.Edit.Base.Layout.prototype.render.call(this, {
				/*".new-document-controls": new Documents.Views.Edit.Therapy.Controls({
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
				}),*/
				".document-controls": new Documents.Views.Edit.Therapy.DocControls({model: this.model})
			});
		}
	});

	Documents.Views.Edit.Therapy.DocControls = Documents.Views.Edit.DocControls.extend({
		goToDocReview: function (resultId) {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "therapy", resultId].join("/"));
			dispatcher.trigger("change:viewState", {mode: "SUB_REVIEW", type: "therapy", options: {
				subId: resultId
			}});
		},
		returnToList: function () {
			this.model.trigger("toggle:dividedState", false);
			App.Router.updateUrl(["appeals", appealId, "therapy"].join("/"));
			dispatcher.trigger("change:viewState", {mode: "REVIEW", type: "therapy"});
		}
	});

	//Documents.Views.Edit.Therapy.Controls = Documents.Views.List.Therapy.Controls.extend({});
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
			this.collection.hasAnyValue = this.model.hasAnyValue;
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

			this.$(".doc-sub-header").each(function () {
				$(this).parent().before($(this).detach());
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
			"input [contenteditable].attribute-value": "onAttributeValueChange",
			"change .field-toggle": "onFieldToggleChange"
		},

		data: function () {
			return {
				model: this.model
			}
		},

		layoutAttributes: {
			width: 6
		},

		initialize: function () {
			if (!this.model.isIdType()) {
				this.model.setPropertyValueFor("valueId", "");
			}
			this.mapLayoutAttributes();
			this.listenTo(this.model, "copy", this.onModelCopy);
			this.listenTo(this.model, "requiredValidation:fail", this.onRequiredValidationFail);
			//common attrs to fit into grid
			this.$el.addClass("span" + this.layoutAttributes.width);
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
			//console.log('onAttributeValueChange',this.getAttributeValue())
			this.model.setValue(this.getAttributeValue());
			this.$(".Mandatory").removeClass("WrongField");
		},

		onRequiredValidationFail: function () {
			this.$(".Mandatory").addClass("WrongField");
		},

		onFieldToggleChange: function (event) {
			this.toggleField($(event.currentTarget).is(":checked"));
		},

		onModelCopy: function () {
			this.setAttributeValue();
			this.updateFieldCollapse();
		},

		toggleField: function (visible) {
			this.$(".field").toggle(visible);
		},

		updateFieldCollapse: function () {
			var fieldIsVisible = this.model.isMandatory() || this.model.hasValue();
			this.$(".field-toggle").prop("checked", fieldIsVisible);
			this.toggleField(fieldIsVisible);
		},

		render: function (subViews) {
			ViewBase.prototype.render.call(this, subViews);
			this.updateFieldCollapse();
			return this;
		}
	});

	/**
	 * Поле типа Text
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Text = UIElementBase.extend({
		template: templates.uiElements._text,

		events: _.extend({
			"click .wysisyg a": "onWysisygAClick"
		}, UIElementBase.prototype.events),

		onWysisygAClick: function (e) {
			e.preventDefault();

			var command = $(e.currentTarget).data('role');

			switch(command) {
				case 'h1':
				case 'h2':
				case 'p':
					document.execCommand('formatBlock', false, command);
					break;
				default:
					document.execCommand(command, false, null);
					break;
			}
		},

		toggleField: function (visible) {
			this.$(".editor-controls").toggle(visible);
			UIElementBase.prototype.toggleField.call(this, visible);
		}

		//,
		/*initialize: function () {
			this.model.convertValueToHtml();
			UIElementBase.prototype.initialize.call(this, this.options);
		},*/
		/*onModelCopy: function () {
			this.model.convertValueToHtml();
			UIElementBase.prototype.onModelCopy.call(this);
		}*/
	});

	/**
	 * Поле типа Constructor
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Constructor = Documents.Views.Edit.UIElement.Text.extend({
		template: templates.uiElements._constructor,

		events: _.extend({
			"click .thesaurus-open": "onThesaurusOpenClick",
			"focus [contenteditable]": "onFocus"//,
			//"blur [contenteditable]": "onBlur"
		}, Documents.Views.Edit.UIElement.Text.prototype.events),

		onFocus: function () {
			//wysisyg.showAt(this.$el);
		},

		/*onBlur: function () {
			wysisyg.hide();
		},*/

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
			console.log('getAttributeValue',this,this.ui,this.ui.$attributeValueEl.val() )
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
			UIElementBase.prototype.render.call(this);

			this.ui = {};
			this.ui.$attributeValueEl = this.$el.find(".attribute-value");

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
			this.ui.$input.val(this.getDate());
		},

		getAttributeValue: function () {
			return moment(this.ui.$input.val(), this.inputFormat).format(CD_DATE_FORMAT);
		},

		render: function () {
			UIElementBase.prototype.render.call(this);

			this.ui = {};
			this.ui.$input = this.$el.find(".attribute-value");
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

		initialize: function () {
			UIElementBase.prototype.initialize.call(this, this.options);
			this.model.setPropertyValueFor("valueId", "");
		},

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

		events: _.extend({
			"click .MKBLauncher": "onMKBLauncherClick",
			"keyup .mkb-code": "onMKBCodeKeyUp",
			"change .mkb-code": "onMKBCodeChange"
		}, UIElementBase.prototype.events),

		data: function () {
			var data = {model: this.model};
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

		/*initialize: function () {
			this.model.cleanValue();
		},*/

		setAttributeValue: function () {
			var data = this.data();
			this.ui.$code.val(data.mkbCode);
			this.ui.$code.data('mkb-id', data.mkbId);
			this.ui.$diagnosis.val(data.diagnosis);
		},

		onMKBLauncherClick: function () {
			this.mkbDirectory = new App.Views.MkbDirectory();
			this.mkbDirectory.render().open();
			this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
		},

		onMKBConfirmed: function (event) {
			var sd = event.selectedDiagnosis;
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
					self.ui.$diagnosis.val(ui.item.diagnosis);
					self.ui.$code.val(ui.item.value);
					self.ui.$code.data('mkb-id', ui.item.id).trigger('change');
				}
			}).on("keyup", function () {
					if (!$(this).val().length) {
						self.ui.$diagnosis.val("");
						self.ui.$code.data('mkb-id', "").trigger('change');
						self.model.setPropertyValueFor('value', "");
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
			return {
				model: this.model,
				directoryEntries: _(fds[this.model.get("scope")].toBeautyJSON())
			};
		},
		initialize: function () {
			if (!fds[this.model.get("scope")]) {
				fds[this.model.get("scope")] = new FlatDirectory();
				fds[this.model.get("scope")].set({id: this.model.get("scope")});
				$.
					when(fds[this.model.get("scope")].fetch()).
					then(_.bind(this.onDirectoryReady, this));
			} else {
				this.onDirectoryReady();
			}
			/*this.directoryEntries = new FlatDirectory();
			this.directoryEntries.set({id: this.model.get("scope")});
			$.when(this.directoryEntries.fetch()).then(_.bind(function () {
				this.model.setValue(this.directoryEntries.toBeautyJSON()[0].id);
				this.render();
			}, this));*/
			UIElementBase.prototype.initialize.apply(this);
		},
		onDirectoryReady: function () {
			//this.model.setValue(fds[this.model.get("scope")].toBeautyJSON()[0].id);
			this.render();
		},
		onAttributeValueChange: function (event) {
			if (_.isEmpty(this.getAttributeValue())) {
				this.model.setPropertyValueFor("value", "");
			}
			UIElementBase.prototype.onAttributeValueChange.call(this, event);
		}
	});

	/**
	 * Поле типа Html
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Html = Documents.Views.Edit.UIElement.Text.extend({});

	/**
	 * Поле типа Html и scope(valueDomain) подходящим под паттерн *[1234]
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.HtmlHelper = Documents.Views.Edit.UIElement.Html.extend({
		template: templates.uiElements._htmlHelper,

		events: _.extend({
			"click .helper-open": "onHelperOpenClick"
		}, Documents.Views.Edit.UIElement.Html.prototype.events),

		data: function () {
			return {
				helperLabel: "helper",
				model: this.model
			};
		},

		renderResults: function (coll) {
			var results = $("<table/>");
			
			if (coll.length) {
				coll.each(function (item) {
					results.append(
						"<tr class='helper-item'>"+
							"<td class='helper-item-checker-col'><input type='checkbox' class='helper-item-checker' checked></td>"+
							"<td class='helper-item-info' data-id='"+item.get("id")+"'>"+
								"<div class='helper-item-name'><span>"+item.get("diagnosticName").name+"</span></div>"+
								"<div class='helper-item-attrs-toggler'><i class='icon-chevron-down'></i></div>"+
							"</td>"+
						"</tr>"+
						"<tr class='helper-item-attrs'>"+
							"<td class='helper-item-attr-spacer'>&nbsp;</td>"+
							"<td>"+
								"<table class='helper-item-attrs-grid'>"+
									"<tr class='helper-item-attr'><td class='helper-item-attr-checker'><i class='icon-spinner'></i></td><td class='helper-item-attr-info'><div class='helper-item-attr-name'>Загрузка...</div></td></tr>"+									
								"</table>"+
							"</td>"+
						"</tr>"
						);
				});
			} else {
				results.append(
					"<tr class='helper-item'>"+
						"<td class='helper-item-checker-col'>&nbsp;</td>"+
						"<td class='helper-item-info'>"+
							"<div class='helper-item-name'><span>Нет записей</span></div>"+
							"<div class='helper-item-attrs-toggler' style='height: 1em;'></div>"+
						"</td>"+
					"</tr>"
					);
			}
			

			var $helperResults = this.$el.css({padding: 0}).find(".helper-results");
			$helperResults.find(".init-loader").remove();

			$helperResults.append(
				"<h3 style='padding: .5em 1em;border-bottom: 1px solid gray;'>"+coll.extra.displayLabel+"</h3>", 
				results);

			$(".helper-item-info", results).on("click", function () {
				$(this).find(".helper-item-attrs-toggler").toggleClass("open");

				var $attrsTr = $(this).parent().next().toggle();

				if (!$attrsTr.data("loaded")) {
					var $attrsGrid = $attrsTr.data("loaded", true).find(".helper-item-attrs-grid");

					var lrv = new coll.extra.ResultView({
						appeal: appeal,
						appealId: appealId,
						modelId: $(this).data("id")
					});

					lrv.getResult(function () {
							var resultData = lrv.resultData();
							console.log(resultData);
							if (resultData.tests.length) {
								$attrsGrid.html(resultData.tests.map(function (test) {
									return "<tr class='helper-item-attr'>"+
														"<td class='helper-item-attr-checker'>"+
															"<input type='checkbox' checked>"+
														"</td>"+
														"<td class='helper-item-attr-info'>"+
															"<div class='helper-item-attr-name'>"+
																"<b>"+test.name+":&nbsp;</b>"+
																(test.value ? test.value + " " + (test.unit || "") +  (test.norm ? " (норма: " + test.norm + ")" : "") : "-")+
															"</div>"+
														"</td>"+
													"</tr>";
								}));
							} else {
								$attrsGrid.html("<tr class='helper-item-attr'><td class='helper-item-attr-checker'>&nbsp;</td><td class='helper-item-attr-info'><div class='helper-item-attr-name'><b>Нет тестов для вставки</b></div></td></tr>");
							}								
						}, function () {
							console.log(arguments);
						});
				}
			});

			this.$(".helper-item-checker").on("change", function () {
				console.log("hey, I was changed! did I?");
			});
		},

		onHelperOpenClick: function (event) {
			event.preventDefault();

			var helper = new PopUpBase();
			helper.template = _.template("<div class='helper-results'><span class='init-loader'>Загрузка...</span></div>");
			helper.dialogOptions = {
				title: "Выберите исследования для вставки",
				modal: true,
				width: 900,
				height: 650,
				resizable: true,
				//close: _.bind(helper.tearDown, helper),
				buttons: [
					{text: "Вставить", "class": "button-color-green", click: _.bind(function () {
						//TODO: 
					}, this)},
					{text: "Отмена", click:  _.bind(function () {
						helper.tearDown();
					}, this)}
				]
			};
			helper.render();

			this.labs.fetch({data: {
				limit: 9999,
				filter: {
					statusId: 2
				}
			}});

			this.insts.fetch({data: {
				limit: 9999,
				filter: {
					statusId: 2
				}
			}});

			this.cons.fetch({data: {
				limit: 9999,
				filter: {
					statusId: 2
				}
			}});

			helper.listenTo(this.labs, "reset", this.renderResults);
			helper.listenTo(this.insts, "reset", this.renderResults);
			helper.listenTo(this.cons, "reset", this.renderResults);
		}
	});

	/**
	 * Поле типа Html и scope(valueDomain) = *1
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.HtmlDiagnostics = Documents.Views.Edit.UIElement.HtmlHelper.extend({
		data: function () {
			return {
				helperLabel: "Обследования",
				model: this.model
			};
		},

		initialize: function () {			
			Documents.Views.Edit.UIElement.HtmlHelper.prototype.initialize.call(this, this.options)
			//LABS
			//-----------------------
			this.labs = new App.Collections.LaboratoryDiags();
			this.labs.appealId = appealId;
			this.labs.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "desc"
			});

			this.labs.extra = {
				appealClosed: appeal.get('closed'),
				displayLabel: "Лабораторные исследования",
				ResultView: LaboratoryResultView
			};

			//INSTS
			//-----------------------
			this.insts = new InstrumentalResearchs([], {
				appealId: appealId
			});
			this.insts.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "desc"
			});
			this.insts.extra = {
				appealClosed: appeal.get('closed'),
				displayLabel: "Инструментальные исследования",
				ResultView: InstrumentalResultView
			};

			//CONS
			//-----------------------
			this.cons = new Consultations();
			this.cons.appealId = appealId;


			this.cons.setParams({
				sortingField: "plannedEndDate",
				sortingMethod: "desc"
			});

			this.cons.extra = {
				appealClosed: appeal.get('closed'),
				displayLabel: "Консультации",
				ResultView: ConsultationsResultView
			};
		}
	});

	/**
	 * Поле типа Html и scope(valueDomain) = *2
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.HtmlTherapy = Documents.Views.Edit.UIElement.HtmlHelper.extend({
		data: function () {
			return {
				helperLabel: "Лечение",
				model: this.model
			};
		}
	});

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
			return {
				model: this.model,
				options: this.options,
				selected: this.selected
			};
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
	 * Поле типа Person
	 * @type {*}
	 */
	Documents.Views.Edit.UIElement.Person = UIElementBase.extend({
		template: templates.uiElements._person,

		events: _.extend({
			"click .person-dialog-launcher": "onPersonDialogLauncherClick",
			"click .clean-person": "onCleanPersonClick"
		}, UIElementBase.prototype.events),

		onPersonDialogLauncherClick: function (event) {
			(new PersonDialog({
				title: this.model.get("name"),
				appeal: appeal,
				callback: _.bind(this.onPersonSelected, this)
			})).render().open();
		},

		onPersonSelected: function (person) {
			this.setPerson(person);
		},

		onCleanPersonClick: function () {
			this.setPerson(false);
		},

		setPerson: function (person) {
			if (person) {
				this.model.setValue(person.id);
			} else {
				this.model.setValue("");
				this.model.setPropertyValueFor("value", "");
			}
			this.model.setValue(person ? person.id : "");
			this.setAttributeValue();
			this.$('.person-name').val(person ? person.name.raw : "");
			this.$('.clean-person').toggle(!!person);
		},

		render: function () {
			UIElementBase.prototype.render.call(this);
			this.$(".person-dialog-launcher .ui-button-text").css({padding:'.25em'});
			return this;
		}
	});

	/**
	 * Подзаголовок, создаётся для полей типа String с valueDomain(scope)="''"
	 * @type {Function}
	 */
	Documents.Views.Edit.UIElement.SubHeader = ViewBase.extend({
		className: "row-fluid doc-sub-header",
		template: _.template("<h3><%=model.get('name')%></h3>"),
		data: function () {
			return {
				model: this.model
			}
		}/*,
		render: function () {
			ViewBase.prototype.render.call(this);
			//this.$el.parent().prepend(this.$el.detach());
			return this;
		}*/
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
				if (options.model.get("scope") === "''") {
					this.UIElementClass = Documents.Views.Edit.UIElement.SubHeader;
				} else {
					this.UIElementClass = Documents.Views.Edit.UIElement.String;
				}
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
				if (options.model.get("scope") === "*1") {
					this.UIElementClass = Documents.Views.Edit.UIElement.HtmlDiagnostics;
				} else if (options.model.get("scope") === "*2") {
					this.UIElementClass = Documents.Views.Edit.UIElement.HtmlTherapy;					
				} else {
					this.UIElementClass = Documents.Views.Edit.UIElement.Html;					
				}
				break;
			case "orgstructure":
				this.UIElementClass = Documents.Views.Edit.UIElement.OrgStructure;
				break;
			case "operationtype":
				this.UIElementClass = Documents.Views.Edit.UIElement.OperationType;
				break;
			case "person":
				this.UIElementClass = Documents.Views.Edit.UIElement.Person;
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
	Documents.Views.Review.Base.NoControlsLayout = LayoutBase.extend({
		template: templates._reviewLayout,

		initialize: function () {
			LayoutBase.prototype.initialize.call(this, this.options);

			if (!this.options.collection) {
				this.collection = new Backbone.Collection();
				if (this.options.subId) {
					if (!_.isArray(this.options.subId)) {
						this.options.subId = [this.options.subId];
					}
					_.each(this.options.subId, function (subId) {
						this.collection.add(new Documents.Models.Document({id: subId}));
					}, this);
				}
			}

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
			this.reviewDocumentAtIndex(this.getListItemIndex() + 1);
		},

		onDocumentsReviewPrev: function () {
			this.reviewDocumentAtIndex(this.getListItemIndex() - 1);
		},

		reviewDocumentAtIndex: function (index) {
			if (index >= 0 && index < this.options.documents.length) {
				var documentListItem = this.options.documents.at(index);
				var document = new Documents.Models.Document({id: documentListItem.id});

				this.collection.reset([document]);
			} else {
				//TODO: fetch next list page
			}
		},

		getListItemIndex: function () {
			var currentDocument = this.collection.first();
			var currentDocumentListItem = this.options.documents.get(currentDocument.id);

			return this.options.documents.indexOf(currentDocumentListItem);
		},

		getEditPageTypeName: function () {
			return "documents";
		},

		render: function (subViews) {
			return LayoutBase.prototype.render.call(this, _.extend({
				".review-controls": new Documents.Views.Review.Base.Controls({
					collection: this.collection,
					documents: this.options.documents,
					reviewPageTypeName: this.getEditPageTypeName(),
					included: this.options.included
				}),
				".sheets": new Documents.Views.Review.Base.SheetList({
					collection: this.collection,
					showIcons: !this.options.included && !appeal.isClosed(),
					editPageTypeName: this.getEditPageTypeName()
				})
			}, subViews));
		}
	});

	Documents.Views.Review.Base.Layout = Documents.Views.Review.Base.NoControlsLayout.extend({
		attributes: {style: "display: table; width: 100%;"},

		initialize: function () {
			if (this.options.documentTypes) {
				this.documentTypes = this.options.documentTypes;
			} else {
				this.documentTypes = new Documents.Collections.DocumentTypes();
				this.documentTypes.mnems = this.getDefaultDocumentsMnems();
				this.documentTypes.fetch();
				console.log("documentTypes.fetch");
			}

			Documents.Views.Review.Base.NoControlsLayout.prototype.initialize.call(this, this.options);
		},

		getDefaultDocumentsMnems: function () {
			return Documents.Collections.DocumentTypes.prototype.mnems;
		},

		tearDown: LayoutBase.prototype.tearDown,

		render: function (subViews) {
			Documents.Views.Review.Base.NoControlsLayout.prototype.render.call(this, _.extend({
				".documents-controls": new Documents.Views.List.Common.Controls({
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
				}),
				".review-controls": new Documents.Views.Review.Base.Controls({
					collection: this.collection,
					documents: this.options.documents,
					documentTypes: this.documentTypes,
					reviewPageTypeName: this.getEditPageTypeName(),
					included: this.options.included
				})
			}, subViews || {}));

			this.$(".controls-block-row").show();

			return this;
		}
	});

	/**
	 * Элементы управления
	 * @type {*}
	 */
	Documents.Views.Review.Base.Controls = ViewBase.extend({
		template: templates._reviewControls,

		data: function () {
			return {
				selectedDocuments: this.collection,
				showStepper: (this.collection.length == 1) && (this.options.documents && this.options.documents.length > 1)
			};
		},

		events: {
			"click .back-to-document-list": "onBackToDocumentListClick",
			"click .next-document": "onNextDocumentClick",
			"click .prev-document": "onPrevDocumentClick",
			"click .print-documents.single-page": "onPrintDocumentsSinglePageClick",
			"click .print-documents.multiple-pages": "onPrintDocumentsMultiplePagesClick"
		},

		onBackToDocumentListClick: function () {
			console.log(this.options);
			if (this.options.included) {
				this.collection.trigger("review:quit");
			} else {
				App.Router.updateUrl(["appeals",appealId,this.options.reviewPageTypeName].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.reviewPageTypeName,
					mode: "REVIEW",
					options: {
						documentTypes: this.options.documentTypes,
						documents: this.options.documents
					}
				});
			}
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
					endDate: moment(document.getDates().begin.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:mm"),
					doctorName: [
						summaryAttrs[4]["properties"][0]["value"],
						summaryAttrs[5]["properties"][0]["value"],
						summaryAttrs[6]["properties"][0]["value"]
					].join(" "),
					doctorSpecs: summaryAttrs[7]["properties"][0]["value"],
					attributes: document.getCleanHtmlFilledAttrs()
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

			console.log(this.options);
			var tmplData = {};
			var documentJSON = this.model.toJSON()[0];

			if (!_.isUndefined(documentJSON.version)) {
				var summaryAttrs = documentJSON["group"][0]["attribute"];

				tmplData = {
					id: documentJSON.id,
					typeId: documentJSON.typeId,
					//attributes: this.model.getFilledAttrs(),
					name: summaryAttrs[1]["properties"][0]["value"],
					//endDate: summaryAttrs[3]["properties"][0]["value"],
					beginDate: this.model.getDates().begin.getValue() ?
						moment(this.model.getDates().begin.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:mm") :
						false,
					endDate: this.model.getDates().end.getValue() ?
						moment(this.model.getDates().end.getValue(), CD_DATE_FORMAT).format("DD.MM.YYYY HH:mm") :
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
				App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, $(event.currentTarget).data('document-id'), "edit"].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					mode: "SUB_EDIT",
					options: {subId: $(event.currentTarget).data('document-id')}
				});
			}
		},

		onDuplicateDocumentClick: function (event) {
			event.preventDefault();
			if ($(event.currentTarget).data('template-id')) {
				App.Router.updateUrl(["appeals", appealId, this.options.editPageTypeName, "new", $(event.currentTarget).data('template-id')].join("/"));
				dispatcher.trigger("change:viewState", {
					type: this.options.editPageTypeName,
					mode: "SUB_EDIT",
					options: {templateId: $(event.currentTarget).data('template-id')}
				});
			}
		},

		render: function () {
			return ViewBase.prototype.render.call(this, {
				".sheet-rows": new Documents.Views.Review.Base.SheetRows({
					collection: new Backbone.Collection(this.model.getFilledAttrs())
				})
			});
		}
	});

	Documents.Views.Review.Base.SheetRows = RepeaterBase.extend({
		getRepeatView: function (repeatOptions) {
			return new Documents.Views.Review.Base.SheetRow(repeatOptions);
		}
	});

	Documents.Views.Review.Base.SheetRow = ViewBase.extend({
		tagName: "li",
		template: templates._reviewSheetRow,
		data: function () {
			var value = this.model.get("value"), displayValue;
			switch (this.model.get("type").toUpperCase()) {
				case 'TIME':
					displayValue = moment(value, 'YYYY-MM-DD HH:mm:ss').format('HH:mm');
					break;
				case 'DATE':
					displayValue = moment(value, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
					break;
				case 'FLATDIRECTORY':
					displayValue = this.model.get("fdValue") ? this.model.get("fdValue") : value;
					break;
				default:
					displayValue = value;
					break;
			}

			return {
				attr: {
					name: this.model.get("name"),
					value: displayValue
				}
			};
		},
		initialize: function () {
			ViewBase.prototype.initialize.call(this, this.options);

			if (this.model.get("type").toUpperCase() == "FLATDIRECTORY") {
				if (!fds[this.model.get("scope")]) {
					fds[this.model.get("scope")] = new FlatDirectory();
					fds[this.model.get("scope")].set({id: this.model.get("scope")});
					$.
						when(fds[this.model.get("scope")].fetch()).
						then(_.bind(this.onDirectoryReady, this));
				} else {
					this.onDirectoryReady();
				}
			}
		},

		onDirectoryReady: function () {
			var directoryValue = _(fds[this.model.get("scope")].toBeautyJSON()).find(function (type) {
				return type.id == this.model.get("value");
			}, this);

			if (directoryValue) {
				this.model.set({fdValue: directoryValue['Наименование']});
			}

			this.render();
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


	//region REVIEW COMMON
	Documents.Views.Review.Common.Layout = Documents.Views.Review.Base.Layout.extend({
		render: function () {
			return Documents.Views.Review.Base.Layout.prototype.render.call(this, {
				".panic-btn": new PanicBtn({
					documentTypes: this.documentTypes,
					editPageTypeName: this.getEditPageTypeName()
				})
			});
		}
	});
	//endregion


	//region REVIEW EXAMINATION
	Documents.Views.Review.Examination.NoControlsLayout = Documents.Views.Review.Base.NoControlsLayout.extend({
		getEditPageTypeName: function () {
			return "examinations";
		}
	});

	Documents.Views.Review.Examination.Layout = Documents.Views.Review.Base.Layout.extend({
		getEditPageTypeName: Documents.Views.Review.Examination.NoControlsLayout.prototype.getEditPageTypeName,
		getDefaultDocumentsMnems: function () {
			return ["EXAM"];
		},
		render: function () {
			Documents.Views.Review.Base.Layout.prototype.render.call(this, {
				".documents-controls": new Documents.Views.List.Examination.Controls({editPageTypeName: this.getEditPageTypeName()})
			});

			this.$(".controls-block-row").show();

			return this;
		}
	});
	//endregion


	//region REVIEW THERAPY
	Documents.Views.Review.Therapy.NoControlsLayout = Documents.Views.Review.Base.NoControlsLayout.extend({
		getEditPageTypeName: function () {
			return "therapy";
		}
	});

	Documents.Views.Review.Therapy.Layout = Documents.Views.Review.Base.Layout.extend({
		getEditPageTypeName: Documents.Views.Review.Therapy.NoControlsLayout.prototype.getEditPageTypeName,
		getDefaultDocumentsMnems: function () {
			return ["THER"];
		}
	});
	//endregion
	//endregion


	return Documents;
});
