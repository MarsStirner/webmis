define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var popupMixin = require('mixins/PopupMixin');
    var template = require('text!views/prescriptions/templates/prescriptionsExecution/interval-edit.html');
    var rivets = require('rivets');
    var Interval = require('views/prescriptions/models/Interval');
    var Intervals = require('views/prescriptions/collections/Intervals');


    return BaseView.extend({
        template: template,

        events: {
            'change .radio :checkbox': 'onButtonClick'
        },
        initialize: function () {
            this.options.title = 'Редактирование интервала';
            this.options.width = '56em';

            this.initialStatus = this.model.get('status');
            this.collection = new Intervals();
            this.collection.add(this.model);

            this.model.on('change', function () {
                // console.log('model', this.model); 
            }, this);
        },

        data: function () {
            var data = {};
            console.log('intervals', this.collection);

            data.interval = this.options.model.toJSON();
            return data;
        },

        onButtonClick: function (e) {
            var $target = this.$(e.target);
            var status = this.initialStatus;

            $target.siblings().prop('checked', false);
            this.ui.$buttonset.buttonset('refresh');

            if ($target.prop('checked')) {
                status = $target.val();
            }
            this.model.set('status', status);
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

        addPause: function () {
            var pause = new Interval();

            console.log('addPause', pause);
        },

        render: function () {
            BaseView.prototype.render.call(this);
            this.ui = {};
            this.ui.$buttonset = this.$el.find('.radio');

            this.$el.find('.add-pause').button();



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

            rivets.binders.bc = function(el, value) {
                el.style['background-color'] = value;
            };

            rivets.bind(this.el, {
                interval: this.model,
                intervals: this.collection,
                view: this
            });
            this.ui.$buttonset.buttonset();
        }
    }).mixin([popupMixin]);

});
