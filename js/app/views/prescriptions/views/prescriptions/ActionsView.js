define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var template = require('text!views/prescriptions/templates/actions.html');

    return BaseView.extend({
        template: template
    });
});