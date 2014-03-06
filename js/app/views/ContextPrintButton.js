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
                $.when(this.getPrintTemplates()).then(this.afterRender);
            });
        },

        getPrintTemplates: function () {
            var doc = this.docCollection.first();
            console.log('get printTemplates', doc, this.docCollection)
            var printContext = doc.get('context');
            this.printTemplates.setPrintContext(printContext);

            return this.printTemplates.fetch();
        },

        getMenuItems: function () {
            console.log('print templates', this.printTemplates)
            return {};
        },
        getMenuCallback: function () {
            console.log('menu callback');
        },


        onClick: function () {
            console.log('click print button', this);
        }
    });

});
