define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var popupMixin = require('mixins/PopupMixin');
    var template = require('text!views/prescriptions/templates/prescriptionsExecution/interval-edit.html');
    var rivets = require('rivets');

    return BaseView.extend({
        template: template,

        data: function () {
            var data = {};

            data.interval = this.options.model.toJSON();
            return data;
        },

        initialize: function () {
            this.options.title = 'Редактирование интервала';
            this.options.width = '56em';
        },

        onSave: function () {
            var self = this;

            this.model.save(null, {
                success: function () {
                    pubsub.trigger('intervals:updated', this.model)
                    self.close();
                }
            });

        },

        render: function () {
            BaseView.prototype.render.call(this);

            rivets.formatters.datetime = {
                read: function (value) { //вывод в хтмл
                    var v;
                    if (value) {
                        v = moment(value)
                            .format('DD.MM.YYYY HH:mm');
                    } else {
                        v = '';
                    }
                    return v;
                },
                publish: function (value) { //в модель
                    var v;
                    if (value) {
                        v = moment(value, 'DD.MM.YYYY HH:mm')
                            .valueOf();
                    } else {
                        v = null;
                    }
                    return v;
                }
            };


            rivets.bind(this.el, {
                interval: this.model
            });
        }
    }).mixin([popupMixin]);

});
