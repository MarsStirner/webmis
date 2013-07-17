define(function(require) {
    var template = require('text!templates/diagnostics/consultations/group-list-item.html');

    return View.extend({
        initialize: function() {
            this.collection.on('reset', function() {
                this.render();
            }, this);

            this.collection.on('fetch', function() {
                this.renderOnFetch();
            }, this);

        },

        renderAll: function(treeData) {
            var view = this;
            view.$el.html('<div class="consultations-list tree"></div>');
            view.$consultations_list = view.$('.consultations-list');


            view.$consultations_list
                .append(_.template(template, {
                items: treeData,
                template: template
            })).on('click', 'li', function(e) {
                    e.stopPropagation();

                    view.$consultations_list.find('.clicked').removeClass('clicked');

                    //$(this).addClass('clicked').removeClass('closed').addClass('open');

                    //$('.consultations-list li').removeClass('open').addClass('closed');
                    $(this).toggleClass('open').toggleClass('closed').addClass('clicked');

                var code = $(this).data('code');
                pubsub.trigger('consultation:selected', code);
            })
        },
        renderNoResults: function() {
            this.$el.html('<div class="msg">Нет результатов</div>');
        },

        renderOnFetch: function() {
            this.$el.html('<div class="msg">Загрузка...</div>');
        },
        render: function() {
            var treeData = this.collection.toJSON();
            // console.log('render',treeData);
            if (_.isArray(treeData) && treeData.length > 0) {
                this.renderAll(treeData);
            } else {
                this.renderNoResults();
            }
            pubsub.trigger('consultations:render')
            return this;
        },
        close: function(){
            pubsub.off('consultation:selected');
            this.collection.off();

        }
    });
});
