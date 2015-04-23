define(function (require) {
    var TreeButton = require('views/ui/TreeButton');
    var PrintTemplates = require('models/print/Template').Collection;

    return TreeButton.extend({

        initialize: function (options) {
            this.title          = options.title     || 'Печать',
            this.differentDocs  = options.differentDocs || false,
            this.template       = '<button type="button" class="" data-icon-primary="icon-print">'+(this.title || 'Печать')+'</button>',
            this.separate       = options.separate  || false;
            this.documents      = options.documents || {};
            this.printTemplates = new PrintTemplates();
            TreeButton.prototype.initialize.call(this, options);
            options.context && this.getTemplatesForContext(this.options.context);
            this.listenTo(this.printTemplates, 'reset', this.afterRender);
        },

        getTemplatesForContext: function (printContext) {
            this.printTemplates.setPrintContext(printContext);
            this.printTemplates.fetch();
        },

        getMenuItems: function () {
            var items = {};
            if (this.differentDocs) {
                var self = this;
                items[0] = {
                    name: ''
                }
                this.$el.unbind('click').on('click', function(){
                    self.getMenuCallback();
                });
            } else {
                this.printTemplates.each(function (printTemplate) {
                    var patt = /---/g;
                    var templateName = printTemplate.get('name');
                    var templateId = printTemplate.get('id');
                    if (!patt.test(templateName)) {
                        items[templateId] = {
                            name: templateName
                        };
                    }
                });
            }
            return items;
        },

        fetchDocumentsTemplateIds: function() {
            var self = this;
            _.each(this.documents, function(doc){
                if (doc.doc_context) {
                    self.printTemplates.setPrintContext(doc.doc_context);
                    self.printTemplates.fetch().done(function(){
                        doc.id = ''+self.printTemplates.first().get('id');
                    });
                }
            });
        },

        getMenuCallback: function (key, options) {
            if (this.differentDocs) {
                $.ajaxSetup({async: false});
                this.fetchDocumentsTemplateIds();
                $.ajaxSetup({async: true});
                this.getRenderedPrintTemplate();
            } else {
                this.getRenderedPrintTemplate(key);
            }
        },

        getRenderedPrintTemplate: function (id) {
            var self = this;

            _.each(this.documents, function(doc){
                if (self.differentDocs) {
                    if (!doc.id) {
                        doc.id = id;
                    }
                } else {
                    doc.id = id;
                }
            });

            var data = {
                separate: this.separate,
                documents: this.documents
            };

            $.ajax({
                type: 'POST',
                url: DATA_PATH + 'print-by-context/',
                dataType: 'html',
                contentType: 'application/json',
                data: JSON.stringify(data),
            })
            .done(this.showPopup)
            .fail(function () {
                pubsub.trigger('noty', {
                    text: 'Ошибка при получении шаблона',
                    type: 'error'
                });
            });
        },

        showPopup: function (html) {
            var templateContent = $('<html/>').html(html);
            var printButton = $('<button/>', {
                class: 'tmpl-print-btn review-nav',
                css: {
                    'float' :'right',
                    'font-size':'16px',
                    'border-radius' : '4px',
                    'border' : '1px solid #c2c2c2',
                    'padding' : '6px 10px',
                    'background' : '-webkit-gradient( linear, left top, left bottom, color-stop(5%, #ffffff), color-stop(100%, #e8e8e8) )',
                    'background-color' : '#ffffff',
                    'color' : '#575757'
                },
                media: 'screen',
                text: 'Печать',
            });
            $(printButton).attr('onclick', 'window.print();');
            $(templateContent).find('style').append('@media print {.tmpl-print-btn{display:none}}');
            $(templateContent).prepend(printButton);

            var $window = $(window);
            var width = Math.min($window.width(), 728),
                height = Math.min($window.height(), 967);

            pubsub.printWindow && pubsub.printWindow.close();
            pubsub.printWindow = window.open("", "Печать", "charset=utf-8, width=" + width + ",height=967 ,menubar=0,toolbar=0,status=0,location=0,left=" + Math.max(($window.width() - width) / 2, 0) + ",top=" + Math.max(($window.height() - height) / 2, 0));
            pubsub.printWindow.document.write($(templateContent).html());
        },

    });
});
