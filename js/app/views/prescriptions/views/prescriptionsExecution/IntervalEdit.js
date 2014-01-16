define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var popupMixin = require('mixins/PopupMixin');
    var template = require('text!views/prescriptions/templates/interval-edit.html');

    return BaseView.extend({
        template: template,
        initialize: function () {
            this.options.title = 'Редактирование интервала';
            this.options.width = '56em';
        }
    }).mixin([popupMixin]);

});
