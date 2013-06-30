/**
 * User: FKurilov
 * Date: 20.05.13
 */

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
            _double: _.template(require("text!templates/documents/edit/ui-elements/double.html")),
            _integer: _.template(require("text!templates/documents/edit/ui-elements/integer.html")),
            _string: _.template(require("text!templates/documents/edit/ui-elements/string.html")),
            _mkb: _.template(require("text!templates/documents/edit/ui-elements/mkb.html")),
            _flatDirectory: _.template(require("text!templates/documents/edit/ui-elements/flat-directory.html"))
        }
    };

    var Thesaurus = require("views/appeal/edit/popups/thesaurus");
    var FlatDirectory = require("models/flat-directory");
    var MKB = require("views/mkb-directory");

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

    Documents.Models.FetchableModelBase = Backbone.Model.extend({});
    Documents.Models.FetchableModelBase.prototype.sync = Model.prototype.sync;

    Documents.Models.DocumentBase = Documents.Models.FetchableModelBase.extend({
        initialize: function (options) {
            this.id = options.id;
            this.appealId = options.appealId || appealId;
        },

        groupedByRow: null,

        groupByRow: function () {
            var groupedByRow = _(this.get("group")[1].attribute).groupBy(function (item) {
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
            this.getDates().end.setValue(this.shouldBeClosed ? moment().format("YYYY-MM-DD HH:mm:ss") : "");
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
    });

    //Коллекции
    //---------------------
    //---------------------

    Documents.Collections.DocumentList = Collection.extend({
        model: Documents.Models.DocumentListItem,
        mnems: ["EXAM", "EPI", "JOUR", "ORD", "NOT", "OTH"],
        dateRange: null,
        typeId: null,
        pageNumber: 1,
        initialize: function (models, options) {
            Collection.prototype.initialize.call(this);
            this.appealId = options.appealId || appealId;
        },
        url: function () {
            var url = DATA_PATH + "appeals/" + this.appealId + "/documents/?sortingField=assessmentDate&sortingMethod=desc&";

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

        url: function () {
            //filter[view]=tree
            return DATA_PATH + "dir/actionTypes/?filter[view]=tree&filter[mnem]=EXAM&filter[mnem]=EPI&filter[mnem]=JOUR&filter[mnem]=ORD";
        }
    });

    //Представления
    //---------------------
    //---------------------

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
            this.$("button").each(function () {
                var $this = $(this);
                var icons = {};
                if ($this.data("icon-primary")) {
                    icons.primary = $this.data("icon-primary");
                }
                if ($this.data("icon-secondary")) {
                    icons.secondary = $this.data("icon-secondary");
                }
                $this.button({icons: icons});
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
            this.listenTo(this.selectedDocuments, "enteredReviewState", this.onEnteredReviewState);
            this.listenTo(this.selectedDocuments, "quitReviewState", this.onQuitReviewState);
        },

        onEnteredReviewState: function () {
            this.toggleReviewState(true);
        },

        onQuitReviewState: function () {
            this.toggleReviewState(false);
        },

        toggleReviewState: function (enabled) {
            this.$(".documents-table, .controls-filters, .documents-paging").toggle(!enabled);

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

        render: function (subViews) {
            return LayoutBase.prototype.render.call(this, _.extend({
                ".documents-table": new Documents.Views.List.DocumentsTable({collection: this.documents, selectedDocuments: this.selectedDocuments}),
                ".documents-filters": new Documents.Views.List.Filters({collection: this.documents}),
                ".table-controls": new Documents.Views.List.TableControls({collection: this.selectedDocuments}),
                ".documents-paging": new Documents.Views.List.Paging({collection: this.documents})
                //".review-area": new Documents.Views.Review.Layout({collection: this.selectedDocuments, included: true})
            }, subViews));
        }
    });

    Documents.Views.List.Layout = Documents.Views.List.LayoutLight.extend({
        attributes: {style: "display: table; width: 100%;"},

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
                this.$(".new-document,.new-duty-doc-exam").button("enable");
                //console.log(this.documentTypes);
            });

            this.listenTo(this.documentTypes, "document-type:selected", this.onDocumentTypeSelected);
        },

        onDocumentTypeSelected: function (event) {
            dispatcher.trigger("change:viewState", {type: "document-edit", options: {templateId: event.selectedType}});
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
            dispatcher.trigger("change:viewState", {type: "document-edit", options: {templateId: 2844}});
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
            //console.log(type);
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
        },

        render: function () {
            ViewBase.prototype.render.apply(this);
            this.$(".document-create-date-filter-buttonset").buttonset();
        }
    });

    //Выбор шаблона документа
    Documents.Views.List.DocumentTypeSelector = PopUpBase.extend({
        template: templates._documentTypeSelector,

        className: "Tree popup",

        data: function () {
            return {documentTypes: this.collection.toJSON(), template: this.template}
        },

        events: {
            //"change .document-type-search-field": "onDocumentTypeSearchFieldChange",
            "click .document-type-node": "onDocumentTypeNodeClick"
        },

        initialize: function () {
            this.dialogOptions = {
                title: "Выберите тип документа",
                modal: true,
                width: 800,
                height: 600,
                resizable: false,
                close: _.bind(this.tearDown, this),
                buttons: [
                    {
                        text: "Создать",
                        click: _.bind(this.onCreateDocumentClick, this)
                    },
                    {
                        text: "Отмена",
                        click: _.bind(this.tearDown, this)
                    }
                ]
            };
        },

        /*onDocumentTypeSearchFieldChange: function () {
         this.applySearchFilter();
         },*/

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

            this.selectedType = $node.data("document-type-id");

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

        onCreateDocumentClick: function () {
            this.collection.trigger("document-type:selected", {selectedType: this.selectedType});
            this.tearDown();
        },

        /*applySearchFilter: function () { console.log("stub:applySearchFilter"); },*/

        /*toggleNodeCollapse: function (collapse) { console.log("stub:toggleNodeCollapse"); },

         markNodeSelected: function () { console.log("stub:markNodeSelected"); },*/

        render: function () {
            PopUpBase.prototype.render.call(this);
            this.$("ul").first().show();
        }
    });

    //Список созданных документов
    Documents.Views.List.DocumentsTable = ViewBase.extend({
        template: templates._documentsTable,

        events: {
            "change .selected-flag": "onSelectedFlagChange",
            "click .edit-document": "onEditDocumentClick",
            "click .single-item-select": "onItemClick"
        },

        data: function () {
            return {documents: this.collection};
        },

        initialize: function () {
            this.listenTo(this.collection, "reset", this.onCollectionReset);
            this.listenTo(this.options.selectedDocuments, "quitReviewState", this.onCollectionReset);
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
            dispatcher.trigger("change:viewState", {type: "document-edit", options: {documentId: $(event.currentTarget).data('document-id')}});
        },

        onItemClick: function (event) {
            console.log($(event.currentTarget).siblings(".selected-flag-col").find(".selected-flag").val());
            this.updatedSelectedItems(true, $(event.currentTarget).siblings(".selected-flag-col").find(".selected-flag").val());
            this.options.selectedDocuments.trigger("enteredReviewState");
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

    Documents.Views.List.TableControls = ViewBase.extend({
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
            this.collection.trigger("enteredReviewState");
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


    Documents.Views.List.Paging = ViewBase.extend({
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

    //Редактирование
    //---------------------

    var layoutAttributesDir = new Documents.Models.LayoutAttributesDir();

    Documents.Views.Edit.Layout = LayoutBase.extend({
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

                this.listLayoutLight = new Documents.Views.List.LayoutLight({included: true});

                this.assign({".document-list": this.listLayoutLight});

                this.listLayoutLight.$(".documents-controls").remove();
                this.listLayoutLight.$(".documents-filters").removeClass("span6").addClass("span12");
            } else {
                if (this.listLayoutLight) this.listLayoutLight.tearDown(); //ViewBase.prototype.tearDown.call(this.listLayoutLight);
                this.$el.parent().css({"margin-left": "20em"});

                this.$(".document-list-side").remove();
                this.$(".document-edit-side").removeClass("span6 vertical-delim").addClass("span12");

                dispatcher.trigger("change:mainState", {stateName: "default"});
            }
        },

        render: function () {
            return ViewBase.prototype.render.call(this, {
                ".nav-controls": new Documents.Views.Edit.NavControls({model: this.model}),
                ".heading": new Documents.Views.Edit.Heading({model: this.model}),
                ".dates": new Documents.Views.Edit.Dates({model: this.model}),
                ".document-grid": new Documents.Views.Edit.Grid({model: this.model}),
                ".document-controls": new Documents.Views.Edit.DocControls({model: this.model})
            });
        }
    });

    //Верхний блок элементов управления и навигации
    Documents.Views.Edit.NavControls = ViewBase.extend({
        template: templates._editNavControls,

        events: {
            "click .toggle-divided-state": "onToggleDividedStateClick",
            "click .copy-from-prev": "onCopyFromPrevClick",
            "click .copy-from": "onCopyFromClick"
        },

        onToggleDividedStateClick: function () {
            this.model.trigger("toggle:dividedState");
            if (this.$(".toggle-divided-state .ui-button-text").text() == "Свернуть") {
                this.$(".toggle-divided-state .ui-button-text").text("Развернуть");
            } else {
                this.$(".toggle-divided-state .ui-button-text").text("Свернуть");
            }

        },

        onCopyFromPrevClick: function () {
            var documentLastByType = new Documents.Models.DocumentLastByType({id: this.getDocumentTypeId()});
            this.fetchCopySource(documentLastByType);
        },

        onCopyFromClick: function () {
            this.copySourceList = new Documents.Collections.DocumentList([], {});
            this.listenTo(this.copySourceList, "copy-source:selected", this.onCopySourceSelected);
            new Documents.Views.Edit.CopySourceSelector({typeId: this.getDocumentTypeId(), collection: this.copySourceList});
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
                this.model.getDates().begin.setValue(moment().format("YYYY-MM-DD HH:mm:ss"))
            }
            this.model.shouldBeClosed = !!this.model.getDates().end.getValue();
            this.render();
        },
        onDocumentCreateDateChange: function () {
            this.model.getDates().begin.setValue(
                moment(this.$(".document-create-date").datepicker("getDate"))
                    .hour(this.$(".time-input").timepicker("getHour"))
                    .minute(this.$(".time-input").timepicker("getMinute"))
                    .format("YYYY-MM-DD HH:mm:ss")
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
         var documentsTable = new Documents.Views.List.DocumentsTable({collection: this.collection});
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

    Documents.Views.Edit.GridSpanList = RepeaterBase.extend({
        initialize: function () {
            this.UIElementFactory = new UIElementFactory();
            RepeaterBase.prototype.initialize.call(this, this.options);
        },

        getRepeatView: function (repeatOptions) {
            return this.UIElementFactory.make(repeatOptions);
        }
    });

    //Ряд в сетке
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

    //Сетка (12 колонок по умолчанию)
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

            //this.collection.reset(this.groupRows());
            this.collection.reset(this.model.getGroupedByRow());
        },

        /*groupRows: function () {
         var groupedByRow = _(this.model.get("group")[1].attribute).groupBy(function (item) {
         //return item.layoutAttributes[]; //TODO: groupBy ROW attr
         //var rowValue = _(item.layoutAttributeValues).where("layoutAttribute_id", layoutAttributesDir[item.type]).value;
         return "UNDEFINED";
         }, this);

         var rows = [];

         for (var i = 0; i < groupedByRow.UNDEFINED.length; i++) {
         if (i == 0 || i%2 == 0) {
         rows.push({spans: new Backbone.Collection()});
         }

         rows[rows.length-1].spans.add(new Documents.Models.TemplateAttribute(groupedByRow.UNDEFINED[i]));
         }

         //console.log("rows", rows);

         return rows;
         },*/

        onCollectionReset: function () {
            this.tearDownSubviews();
            this.render();
        }
    });

    //Базовый класс UI элемента для поля документа
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
        },

        mapLayoutAttributes: function () {
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
            //console.log(this.model.getValue());
        }
    });

    //Поле типа Text
    Documents.Views.Edit.UIElement.Text = UIElementBase.extend({
        template: templates.uiElements._text,

        events: _.extend({
            "change .field-toggle": "onFieldToggleChange"
        }, UIElementBase.prototype.events),

        onFieldToggleChange: function (event) {
            this.$(".field").toggle($(event.currentTarget).is(":checked"));
        }
    });

    //Поле типа Constructor
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

    //Поле типа String
    Documents.Views.Edit.UIElement.String = UIElementBase.extend({
        template: templates.uiElements._string,

        render: function () {
            UIElementBase.prototype.render.call(this);

            //TODO: move this shit to the template

            this.$(".Combo").each(function () {
                var $comboInput = $(this).wrap('<div class="DDList DDSelect ComboWrapper"><div class="Title"><span class="Actions"></span></div></div>');
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

    //Поле типа Time
    Documents.Views.Edit.UIElement.Time = UIElementBase.extend({});

    //Поле типа Date
    Documents.Views.Edit.UIElement.Date = UIElementBase.extend({});

    //Поле типа Integer
    Documents.Views.Edit.UIElement.Integer = UIElementBase.extend({
        template: templates.uiElements._integer
    });

    //Поле типа Double
    Documents.Views.Edit.UIElement.Double = UIElementBase.extend({
        template: templates.uiElements._double
    });

    //Поле типа MKB
    Documents.Views.Edit.UIElement.MKB = UIElementBase.extend({
        template: templates.uiElements._mkb,
        events: {
            "click .MKBLauncher": "onMKBLauncherClick"
        },
        onMKBLauncherClick: function () {
            this.mkbDirectory = new App.Views.MkbDirectory();
            this.mkbDirectory.render().open();
            this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
        },
        onMKBConfirmed: function (event) {
            var sd = event.selectedDiagnosis;
            this.model.setValue(sd.get("id") || sd.get("code"));
            this.$(".mkb-diagnosis").val(sd.get("diagnosis"));
            this.$(".mkb-code").val(sd.get("code") || sd.get("id"));
        }
    });

    //Поле типа FlatDirectory
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

    //Поле типа Html
    Documents.Views.Edit.UIElement.Html = Documents.Views.Edit.UIElement.Text.extend({});

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
            default:
                this.UIElementClass = Documents.Views.Edit.UIElement.Base;
                break;
        }
        return new this.UIElementClass(options);
    };

    //Patched thesaurus view, supporting safe tear down
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

    //Просмотр
    //---------------------

    Documents.Views.Review.Layout = LayoutBase.extend({
        template: templates._reviewLayout,

        /*initialize: function () {

         },*/

        render: function () {
            return LayoutBase.prototype.render.call(this, {
                ".review-controls": new Documents.Views.Review.Controls({collection: this.collection}),
                ".sheets": new Documents.Views.Review.SheetList({collection: this.collection, repeat: Documents.Views.Review.Sheet})
            });
        }
    });

    //Элементы управления
    Documents.Views.Review.Controls = ViewBase.extend({
        template: templates._reviewControls,

        data: function () {
            return {selectedDocuments: this.collection};
        },

        events: {
            "click .back-to-document-list": "onBackToDocumentListClick",
            "click .prev-document": "onPrevDocumentClick",
            "click .next-document": "onNextDocumentClick"
        },

        onBackToDocumentListClick: function () {
            this.collection.trigger("quitReviewState");
        },

        onPrevDocumentClick: function () {

        },

        onNextDocumentClick: function () {

        }
    });

    //Значения полей из документа
    Documents.Views.Review.Sheet = ViewBase.extend({
        template: templates._reviewSheet,

        data: function () {
            var tmplData = {};
            var documentJSON = this.model.toJSON()[0];

            if (documentJSON.version) {
                var summaryAttrs = documentJSON["group"][0]["attribute"];

                tmplData = {
                    attributes: this.model.getFilledAttrs(),
                    name: summaryAttrs[1]["properties"][0]["value"],
                    //endDate: summaryAttrs[3]["properties"][0]["value"],
                    endDate: moment(this.model.getDates().begin.getValue(), "YYYY-MM-DD HH:mm:ss").format("DD.MM.YYYY HH:ss"),
                    doctorName: [
                        summaryAttrs[4]["properties"][0]["value"],
                        summaryAttrs[5]["properties"][0]["value"],
                        summaryAttrs[6]["properties"][0]["value"]
                    ].join(" "),
                    doctorSpecs: summaryAttrs[7]["properties"][0]["value"],
                    loaded: true
                };
            } else {
                tmplData = {
                    loaded: false
                };
            }

            return {document: tmplData};
        },

        initialize: function () {
            this.listenTo(this.model, "change:version", this.onModelReset);
            this.model.fetch();
        },

        onModelReset: function () {
            this.render();
        }
    });

    //Значения полей из документа
    Documents.Views.Review.SheetList = RepeaterBase.extend({
        getRepeatView: function (repeatOptions) {
            return new Documents.Views.Review.Sheet(repeatOptions);
        }
    });

    return Documents;
});