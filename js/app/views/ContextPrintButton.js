define(function (require) {
    var TreeButton = require('views/ui/TreeButton');
    var PrintTemplates = require('models/print/Template').Collection;

    return TreeButton.extend({
        initialize: function (options) {
            this.docCollection = options.docCollection;
            this.printTemplates = new PrintTemplates();

            this.listenTo(this.docCollection, 'change reset', this.getTemplatesForContext);
            this.listenTo(this.printTemplates, 'reset', this.afterRender);
        },

        getDoc: function () {
            return this.docCollection.first();
        },

        getTemplatesForContext: function () {
            var doc = this.getDoc();
            var printContext = doc.get('context');

            this.printTemplates.setPrintContext(printContext);
            this.printTemplates.fetch();
        },

        getMenuItems: function () {
            var items = {};

            this.printTemplates.each(function (printTemplate) {
                items[printTemplate.get('id')] = {
                    name: printTemplate.get('name')
                };
            });
            console.log('getMenuItems', items);
            return items;
        },

        getMenuCallback: function (key, options) {
            this.getRenderedPrintTemplate(key);
        },

        getPrintTemplateData: function(id){
            var data = {};
            data.event_id = this.options.appeal.get('id');
            data.id = id;
            data.client_id = this.options.appeal.get('patient').get('id');
            data.action_id = this.getDoc().get('id');
            data.additional_context = {
                currentOrgStructure: '',
                currentOrganisation: 3479,
                currentPerson: Core.Cookies.get('userId')
            };

            return data; 
        },

        getRenderedPrintTemplate: function (id) {
            var self = this;
            var data = JSON.stringify(this.getPrintTemplateData(id));

            $.ajax({
                type: 'POST',
                url: DATA_PATH + 'print-by-context/',
                dataType: 'html',
                contentType: 'application/json',
                data: data,
            }).done(function (html) {
                self.showPopup(html);
            }).fail(function () {
                pubsub.trigger('noty', {
                    text: 'Ошибка при получении шаблона',
                    type: 'error'
                });
            });
        },

        showPopup: function (html) {
            var $window = $(window);
            var width = Math.min($window.width(), 728),
                height = Math.min($window.height(), 967);

            this.window = window.open("", "Печать", "width=" + width + ",height=" + height + ",menubar=0,toolbar=0,status=0,location=0,left=" + Math.max(($window.width() - width) / 2, 0) + ",top=" + Math.max(($window.height() - height) / 2, 0));
            this.window.document.charset = "utf-8";
            this.window.document.write(html);
        },

    });

});
