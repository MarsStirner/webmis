//страница просмотра результатов лабораторного исследования

define(function(require) {
    var template = require('text!templates/diagnostics/laboratory/laboratory-result.html');
    var Result = require('models/diagnostics/laboratory/laboratory-diag-form');


    var LaboratoryResultView = Backbone.View.extend({
        template: template,
        initialize: function() {
            var self = this;
        },
        events: {
            "click .first": "first",
            "click .prev": "prev",
            "click .next": "next",
            "click .last": "last",
            "click .extra": "extra",
            "click .print": "print",
        },
        getResult: function(success, error) {
            var self = this;
            this.result = new Result();
            this.result.eventId = this.options.appealId;
            this.result.id = this.options.modelId ? this.options.modelId : this.options.url[4]; //;

            this.result.fetch({
                success: function(model, response, options) {
                    success(model, response, options);
                },
                error: function() {

                }
            });
        },
        resultData: function() {
            var appeal = this.options.appeal;
            console.log('options', this.options.appeal)
            var self = this;
            var json = this.result.toJSON();
            var doctorSpecs = this.result.getProperty('doctorSpecs');
            var doctorFirstName = this.result.getProperty('doctorFirstName');
            var doctorMiddleName = this.result.getProperty('doctorMiddleName');
            var doctorLastName = this.result.getProperty('doctorLastName');

            json.patientName = appeal.get('patient').get('name').get('raw');
            json.appealNumber = appeal.get('number');
            var sex = appeal.get('patient').get('sex');
            if (sex === 'female') {
                json.sex = 'Ж';
            }
            if (sex === 'male') {
                json.sex = 'М';
            }
            var birthDate = appeal.get('patient').get('birthDate');
            //ageString
            json.age = Core.Date.format(birthDate) +' '+Core.Date.getAgeString(birthDate);


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

            return json;
        },
        navigate: function(id) {

            this.trigger("change:viewState", {
                type: "diagnostics-laboratory-result",
                options: {
                    modelId: id,
                    force: true
                }
            });
            App.Router.navigate("/appeals/" + this.options.appealId + "/diagnostics/laboratory/result/" + id, {
                trigger: false
            });
        },
        first: function() {
            this.navigate(335108);
        },
        prev: function(id) {
            this.navigate(335110);
        },
        next: function() {
            this.navigate(335111);
        },
        last: function() {
            this.navigate(335112);
        },
        extra: function() {
            this.$('.extra-info').toggle();

        },
        print: function() {

            alert(JSON.stringify(this.resultData()));
        },


        render: function() {
            var self = this;
            self.getResult(function() {
                console.log('render LaboratoryResultView', self, self.resultData());
                self.$el.html(_.template(self.template, self.resultData(), {
                    variable: 'data'
                }));


                self.$('.actions button').button();
            });


            return self;
        }

    });

    return LaboratoryResultView;

});
