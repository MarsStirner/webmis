define(function(require) {
    var template = require('text!templates/diagnostics/consultations/consultants-list-item.html');
    return View.extend({
        initialize: function() {
            this.collection.on('reset', function() {
                this.render();
            }, this);

            this.collection.on('fetch', function() {
                this.renderOnFetch();
            }, this);
        },
        renderAll: function(data) {
            var view = this;
            console.log('renderAll', arguments);
            // view.$el.html('<div class="consultations-list tree"></div>');
            // view.$consultations_list = view.$('.consultations-list');


            view.$el.html(_.template(template, {
                items: data,
                template: template
            })).on('click', 'li', function() {
                var $this = $(this);
                view.$el.find('.clicked').removeClass('clicked');
                $this.addClass('clicked');


                var id = $this.data('id');
                pubsub.trigger('consultant:selected', id);
            });
        },
        renderNoResults: function() {
            this.$el.html('<div class="msg">Нет результатов</div>');
        },

        renderOnFetch: function() {
            this.$el.html('<div class="msg">Загрузка...</div>');
        },
        render: function() {
            var data = this.collection.toJSON();
            console.log('consultants view render', data);

            if (_.isArray(data) && data.length > 0) {
                this.renderAll(data);
            } else {
                this.renderNoResults();
            }
            return this;

        },
        close: function(){

        }
    });
});
