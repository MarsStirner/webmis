define(function (require) {
    var TreeButton = require('views/ui/TreeButton');
    var PrintTemplates = require('models/print/Template').Collection;

    return TreeButton.extend({
        template: '<button type="button" class="" data-icon-primary="icon-print">Печать</button>',
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
                var patt = /---/g;
                var templateName = printTemplate.get('name');
                var templateId =printTemplate.get('id');

                if(!patt.test(templateName)){
                    items[templateId] = {
                        name: templateName
                    };
                }

            });

            return items;
        },

        getMenuCallback: function (key, options) {
            this.getRenderedPrintTemplate(key);
        },

        getRenderedPrintTemplate: function (id) {
            var data = this.options.data;
            data.id = id;
            var url = DATA_PATH + 'print-by-context/';
            // var url = 'http://192.168.1.121:5550/print_subsystem/print_template';

            $.ajax({
                type: 'POST',
                url: url,
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
            var templateContent = $('<html/>').html(html);
            $(templateContent).prepend('<style media="print">.tmpl-print-btn{display:none}</style>');
            var printButtonStyle = 'float:right; font-size:16px; border-radius:4px; border:1px solid #c2c2c2; padding:6px 10px; background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #ffffff), color-stop(100%, #e8e8e8) ); background-color:#ffffff; color:#575757;';
            $(templateContent).prepend('<button class="tmpl-print-btn review-nav" style="'+printButtonStyle+'" media="screen" onclick="window.print();">Печать</button>');
            
            var $window = $(window);
            var width = Math.min($window.width(), 728),
                height = Math.min($window.height(), 967);

            this.window = window.open("", "Печать", "width=" + width + ",height=" + height + ",menubar=0,toolbar=0,status=0,location=0,left=" + Math.max(($window.width() - width) / 2, 0) + ",top=" + Math.max(($window.height() - height) / 2, 0));
            this.window.document.charset = "utf-8";
            this.window.document.write($(templateContent).html());
        },

    });

});
