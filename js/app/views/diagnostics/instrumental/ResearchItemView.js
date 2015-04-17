define(function(require) {

    var itemTemplate = require('text!templates/diagnostics/instrumental/researchs-list-item.html')

    var ItemView = Backbone.View.extend({
        className: 'item',

        events: {
            'click .icon-remove' : 'onTestRemove'
        },

        initialize: function() {
            this.$el.attr('data-code', this.model.get('code'));
            this.$el.attr('data-cid', this.model.cid);
            pubsub.trigger('research:selected', this.model.get('code'), this.model.get('plannedDate') ? this.model.get('plannedDate') : moment().format('DD.MM.YYYY'), this.model.get('plannedTime') ? this.model.get('plannedTime') : moment(new Date()).format('HH:mm'));
        },


        onChangePlannedTimePicker: function () {
            console.log(this);
        },

        onChangePlannedDatePicker: function () {
            console.log(this);
        },

        onTestRemove: function(){
            pubsub.trigger('research:deleted', this.model.get('code'));
            this.options.collection.remove(this.model).trigger('reset');
        },

        modelData: function() {
            var data = _.extend(this.model.toJSON(), {
                cid: this.model.cid
            });
            return data;
        },

        render: function() {
            var self = this;
            this.$el.html(_.template(itemTemplate, this.modelData(), {
                variable: 'data'
            }));

            this.ui = {};

            this.$el.find('.plannedDate').datepicker({
                minDate: new Date(),
                onSelect: function() {
                    self.model.set('plannedDate', $(this).val());
                    self.collection.trigger('reset');
                  }
            }).datepicker('setDate', self.model.get('plannedDate') ? self.model.get('plannedDate') : new Date());

            this.$el.find('.plannedTime').timepicker({
                defaultTime: 'now',
                showPeriodLabels: false,
                showOn: 'both',
                button: '.icon-time',
                onClose: function() {
                    self.model.set('plannedTime', $(this).val());
                    self.collection.trigger('reset');
                  }
            }).val( self.model.get('plannedTime') ? self.model.get('plannedTime') : moment(new Date()).format('HH:mm'));

            return this;
        },
        close: function(){
            this.$el.remove();
            this.remove();
        }

    });

    return ItemView;

});
