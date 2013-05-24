//страница просмотра результатов лабораторного исследования

define(function(require) {
    var template = require('text!templates/laboratory/laboratory-result.html');
    var Result = require('models/diagnostics/laboratory-diag-form');


    var LaboratoryResultView = Backbone.View.extend({
        template: template,
        initialize: function() {
            var self = this;
            console.log('init LaboratoryResultView', arguments, this);
            this.getResult();


        },
        getResult: function() {
            var self = this;
            this.result = new Result();
            this.result.eventId = this.options.appealId;
            this.result.id = this.options.modelId;
            this.result.fetch({
                success: function(model, response, options) {
                    self.render();
                },
                error: function() {

                }
            });
        },
        resultData: function() {
            var self = this;
            var json = this.result.toJSON();
            var doctorSpecs = this.result.getProperty('doctorSpecs');
            var doctorFirstName = this.result.getProperty('doctorFirstName');
            var doctorMiddleName = this.result.getProperty('doctorMiddleName');
            var doctorLastName = this.result.getProperty('doctorLastName');

            json.doctor = doctorFirstName + ' ' + doctorMiddleName + ' ' + doctorLastName + ', ' + doctorSpecs;

            json.assessmentBeginDate = this.result.getProperty('assessmentBeginDate');
            json.plannedEndDate = this.result.getProperty('plannedEndDate');

            if (this.result.getProperty('urgent') === 'false') {
                json.urgent = 'нет';
            } else {
                json.urgent = 'да';
            }

            function emptyFalse(val) {
                if (!val) {
                    val = '';
                }
                return val;
            }
            if (this.result.get('group')) {
                var group_1 = (this.result.get('group'))[1].attribute;
                json.tests = [];
                _.each(group_1, function(item) {
                    if (item.type == 'String') {

                        json.tests.push({
                            name: item.name,
                            value: emptyFalse(self.result.getProperty(item.name, 'value')),
                            unit: emptyFalse(self.result.getProperty(item.name, 'unit')),
                            norm: emptyFalse(self.result.getProperty(item.name, 'norm'))
                        });

                    }
                });
            }

            //name
            //value = this.result.getProperty(name,'value');
            //unit = this.result.getProperty(name,'unit');
            //norm = this.result.getProperty(name,'norm');



            return json;
        },


        render: function() {
            console.log('render LaboratoryResultView', this, this.resultData());
            this.$el.html(_.template(this.template, this.resultData(), {
                variable: 'data'
            }));
            return this;
        }

    });

    return LaboratoryResultView;

});
