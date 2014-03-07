define(function (require) {
    var TreeButton = require('views/ui/TreeButton');
    var PrintTemplates = require('models/print/Template').Collection;

    return TreeButton.extend({
        events: {
            'click': 'onClick'
        },

        initialize: function (options) {
            this.docCollection = options.docCollection;
            this.printTemplates = new PrintTemplates();

            this.listenTo(this.docCollection, 'change reset', function () {
                var doc = this.getDoc();
                var printContext = doc.get('context');
                // console.log('get printTemplates for', doc.get('id'), printContext);
                this.printTemplates.setPrintContext(printContext);
                this.printTemplates.fetch().then(this.afterRender.bind(this));

            });
        },
        getDoc: function () {
            return this.docCollection.first();
        },

        getMenuItems: function () {
            var items = {};
            // console.log('print templates', this.printTemplates);
            this.printTemplates.each(function (printTemplate) {
                items[printTemplate.get('id')] = {
                    name: printTemplate.get('name')
                };
            });
            // console.log('getMenuItems', items);
            return items;
        },

        getMenuCallback: function (key, options) {
            this.getRenderedPrintTemplate(key);
            // console.log('menu callback', arguments);
        },

        getRenderedPrintTemplate: function (id) {
            var self = this;

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

            $.ajax({
                type: 'POST',
                url: DATA_PATH + 'print-by-context/',
                dataType: 'html',
                contentType: 'application/json',
                data: JSON.stringify(data),
            }).done(function (html) {
                self.showPopup(html);
            }).fail(function () {
                pubsub.trigger('noty', {text:'Ошибка при получении шаблона',type:'error'});
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

        onClick: function () {
            // console.log('click print button', this);
        }
    });

});
