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
            pubsub.trigger('research:selected', this.model.get('code'));
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
            this.$el.html(_.template(itemTemplate, this.modelData(), {
                variable: 'data'
            }));

            this.ui = {};
            this.ui.$checkbox = this.$el.find('input');
            return this;
        },
        close: function(){
            this.$el.remove();
            this.remove();
        }

    });

    return ItemView;

});
