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
            var time = this.$(e.target).val();
            pubsub.trigger('time:selected', time);

        },

        render: function() {
            console.log('schedule render', this.collection.toJSON())
            this.$el.html(_.template(this.template, {
                items: this.collection.toJSON()
            }));

            return this;
        }
    })
});
