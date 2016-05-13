define(function (require) {
    require('views/pages/finance-edit');
    var popupMixin = require('mixins/PopupMixin');

    return View.extend({
        initialize: function () {
            this.appeal = this.options.appeal;

            this.view = new App.Views.FinanceEdit({
                model: this.appeal,
            });
        },
        events: {
            'click .save': 'onSave',
            "change [name='contract']": "onChangeContract"
        },

        onChangeContract: function(e) {
            this.view.onChangeContract(e);
        },

        onSave: function () {
            this.view.onSave();
            this.appeal.fetch();
            this.close();
        },

        render: function () {
            var self = this;

            $.when(this.movesP, this.docsP, this.resultsP).then(function () {
                self.$el.html(self.view.render().el);
            });

            return this;
        }

    }).mixin([popupMixin]);
});
