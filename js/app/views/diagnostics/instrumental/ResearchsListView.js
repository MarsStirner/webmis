define(function(require) {

    var listTemplate = require('text!templates/diagnostics/instrumental/researchs-list.html');
    var ItemView = require('views/diagnostics/instrumental/ResearchItemView');

    return View.extend({
        el: 'ul',
        events: {
            'change': 'onChange'
        },
        onChange: function(e) {
            $target = this.$(e.target);
            // this.$el.find('input').not($target).prop('checked', false);
            this.$el.find('.selected').removeClass('selected');
            //$target.parents('.item').addClass('selected');
        },
        initialize: function() {
            var view = this;
            view.childViews = [];

            view.collection.on('reset', function() {
                view.render();
            });

            view.collection.on('fetch', function() {
                console.log('view.collection', view.collection)
                view.renderOnFetch();
            });

            view.collection.on('change', function() {
                console.log('view.collection', view.collection);

            });

            view.collection.on('add', function() {
                view.render();
            });

            pubsub.on('group:parent:click', function() {
                view.$el.html('');
            });

            pubsub.on('group:click', function(code) {
                view.collection.fetch({
                    data: {
                        'patientId': view.options.patientId,
                        'filter[code]': code
                    },
                    add: true
                });
            });


        },



        collectionData: function() {
            var data = this.collection.map(function(model) {
                return _.extend(model.toJSON(), {
                    cid: model.cid
                });
            }, this);

            return data;
        },



        renderAll: function(testsData) {
            var view = this;
            //console.log('renderAll', testsData, view);

            view.$el.html(_.template(listTemplate, {}));
            view.$researchsList = view.$el; //.find('tbody.item-container');

            //view.$researchsList.append(_.template(listTemplate , {}));
            view.closeChildViews();
            this.collection.each(function(model) {
                var itemView = new ItemView({
                    model: model,
                    collection: view.collection,
                    patientId: view.options.patientId
                });

                view.childViews.push(itemView);

                if (itemView.model.get('indications') && itemView.model.get('indications').properties) {
                    itemView.model.get('indications').value = _.find(itemView.model.get('indications').properties, function(p) {
                        return p.name == 'value';
                    }).value;
                    }

                var renderedEl = itemView.render().el;

                $(renderedEl).on('change', '.indications', function(){
                    var modelValueField = _.find(model.get('indications').properties, function(f) {
                        return f.name == 'value';
                    })
                    modelValueField.value = $(this).val();
                });


                $(renderedEl).on('change', '.cito', function(e){
                    var val = $(e.currentTarget).is(':checked');
                    var cid = $(e.currentTarget).closest('.item').data('cid');
                    var found = view.collection.find(function(model){
                        return model.cid == cid;
                    });
                    found.set('urgent', val);
                });


                view.$researchsList.append(renderedEl);
            }, this);



        },
        closeChildViews: function() {
            _.each(this.childViews, function(childView) {
                if (childView.close) {
                    childView.close();
                }
            });
        },

        renderNoData: function() {
            this.$el.html('<div class="msg">Нет результатов.</div>');
        },
        renderOnFetch: function() {
            this.$el.html('<div class="msg">Загрузка...</div>');
        },

        render: function() {
            var view = this;
            var testsData = view.collectionData();

            if (testsData.length > 0) {
                view.renderAll(testsData);
            } else {
                view.renderNoData();
            }

            return view;
        },
        close: function() {

            pubsub.off('group:parent:click group:click');
            this.collection.off();
            this.closeChildViews();
            this.$el.remove();
            this.remove();
        }

    });


});
