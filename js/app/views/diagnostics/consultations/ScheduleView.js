define(function(require) {
    var template = require('text!templates/diagnostics/consultations/time-list.html');

    return View.extend({
        initialize: function() {
            var self = this;
            this.collection = new(Collection.extend({
                model: Model
            }));

            pubsub.on('date:selected', function() {
                self.$el.html('');
            });
        },
        events: {
            'change input': 'timeSelected'
        },

        template: template,

        timeSelected: function(e) {
            var $target = this.$(e.target);
            var time = $target.val();
            var id = $target.data('id');
            var index = $target.data('index');
            pubsub.trigger('time:selected', {
                time: time,
                id:id,
                index:index
            });

        },

        showTime: function(text){
            console.log('showTime', text, this.$el);
            this.$('#prev').addClass('dasas').html(text);
        },

        render: function() {
            console.log('schedule render', this.collection.toJSON())
            this.$el.html(_.template(this.template, {
                items: this.collection.toJSON()
            }));

            this.trigger('after:render');

            return this;
        },
        close: function() {
            pubsub.off('date:selected');
            pubsub.off('time:selected');
            this.collection.off();

        }
    })
});
