define(function(require) {
    var template = require('text!templates/diagnostics/instrumental/instrumental-result.html');

    var Result = require('models/diagnostics/instrumental/InstrumentalResearch');

    var InstrumentalResultView = Backbone.View.extend({
        template: template,
        events: {
            "click .buck-to-list": "openInstrumental"
        },
        getResult: function(success, error) {
            var self = this;
            console.log('getResult',this);
            this.result = new Result({},{
                test:'ttutut',
                appealId: this.options.appealId
            });
            //this.result.eventId = this.options.appealId;
            this.result.id = this.options.modelId ? this.options.modelId : this.options.url[4]; //;

            this.result.fetch({
                success: function(model, response, options) {
                    success(model, response, options);
                },
                error: function() {

                }
            });
        },
        openInstrumental: function() {
            this.trigger("change:viewState", {
                type: "diagnostics-instrumental"
            });
            App.Router.updateUrl("/appeals/" + this.options.appealId + "/diagnostics/instrumental/");

        },
        resultData: function() {
            var self = this;
            var json = this.result.toJSON();

            function emptyFalse(val) {
                if (!val) {
                    val = '';
                }
                return val;
            }

            var doctorSpecs = this.result.getProperty('doctorSpecs');
            var doctorFirstName = this.result.getProperty('doctorFirstName');
            var doctorMiddleName = this.result.getProperty('doctorMiddleName');
            var doctorLastName = this.result.getProperty('doctorLastName');
            json.plannedEndDate = this.result.getProperty('plannedEndDate');

            //json.doctor = doctorFirstName + ' ' + doctorMiddleName + ' ' + doctorLastName + ', ' + doctorSpecs;
            json.doctor = this.result.getProperty('Исполнитель');


            if (this.result.get('group')) {
                var group_1 = (this.result.get('group'))[1].attribute;
                json.tests = [];
                _.each(group_1, function(item) {
                    if (true){//item.type == 'String') {

                        json.tests.push({
                            name: item.name,
                            value: emptyFalse(self.result.getProperty(item.name, 'value')),
                            unit: emptyFalse(self.result.getProperty(item.name, 'unit')),
                            norm: emptyFalse(self.result.getProperty(item.name, 'norm'))
                        });

                    }
                });
            }

            return json;

        },

        render: function() {
            var self = this;
            self.getResult(function() {
                console.log('render instrumentalResultView', self, self.resultData());
                self.$el.html(_.template(self.template, self.resultData(), {
                    variable: 'data'
                }));


                self.$('.actions button').button();

            });

            return self;
        }
    });

    return InstrumentalResultView;

});
