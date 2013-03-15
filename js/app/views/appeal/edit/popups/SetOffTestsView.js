define([ 'text!templates/appeal/edit/popups/set-of-tests.tmpl',
    'models/diagnostics/SetOfTests'],
    function (setOfTestsViewTemplate, SetOfTests) {

        var SetOfTestsView = View.extend({
            template: setOfTestsViewTemplate,
            initialize: function () {
                var view = this;

                view.model = view.options.model;

                view.model.on('change', function(){
                    view.render();
                });

                pubsub.on('lab-selected group-of-tests', function (labCode) {
                    view.$el.html('');
                });

                pubsub.on('load-set-of-tests', function (code) {

                    view.$el.html('');
                    view.model.fetch({data: {
                        'patientId': 15,
                        'filter[code]': code
                    }});
                });


            },


            render: function () {
                var view = this;
							console.log(' view.model', view.model)
                view.$el.html($.tmpl(view.template, view.model.toJSON()));
							UIInitialize(this.el);
                return view;
            }

        });


        return SetOfTestsView;

    });
