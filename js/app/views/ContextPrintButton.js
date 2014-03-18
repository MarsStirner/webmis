define(function (require) {
    var TreeButton = require('views/ui/TreeButton');
    var PrintTemplates = require('models/print/Template').Collection;

    return TreeButton.extend({
        initialize: function (options) {
            TreeButton.prototype.initialize.call(this, options);

            this.printTemplates = new PrintTemplates();

            if(this.options.context){
                this.getTemplatesForContext(this.options.context); 
            }
            this.listenTo(this.printTemplates, 'reset', this.afterRender);
        },

        getTemplatesForContext: function (printContext) {

            this.printTemplates.setPrintContext(printContext);
            this.printTemplates.fetch();
        },

        getMenuItems: function () {
            var items = {
            };

            this.printTemplates.each(function (printTemplate) {
                items[printTemplate.get('id')] = {
                    name: printTemplate.get('name')
                };
            });

            console.log('get menu items', items);
            return items;
        },

        getMenuCallback: function (key, options) {
            this.getRenderedPrintTemplate(key);
        },

        getRenderedPrintTemplate: function (id) {
            var data = this.options.data;
            data.id = id;

            $.ajax({
                type: 'POST',
                url: DATA_PATH + 'print-by-context/',
                dataType: 'html',
                contentType: 'application/json',
                data: JSON.stringify(data),
            }).done(this.showPopup)
            .fail(function () {
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
