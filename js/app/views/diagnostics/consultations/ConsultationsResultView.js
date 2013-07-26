define(function(require) {
    var template = require('text!templates/diagnostics/consultations/consultations-result.html');

    var Result = require('models/diagnostics/consultations/Consultation');
    var PrintView = require('views/print');

    var InstrumentalResultView = Backbone.View.extend({
        template: template,
        events: {
            "click .buck-to-list": "openConsultations",
            "click .print": "print"
        },
        getResult: function(success, error) {
            var self = this;
            //console.log('getResult', this);
            this.result = new Result();
            this.result.eventId = this.options.appealId

            this.result.id = this.options.subId ? this.options.subId[0] : this.options.url[4]; //;

            this.result.fetch({
                success: function(model, response, options) {
                    success(model, response, options);
                },
                error: function() {

                }
            });
        },
        openConsultations: function() {
            this.trigger("change:viewState", {
                type: "diagnostics-consultations"
            });
            App.Router.updateUrl("/appeals/" + this.options.appealId + "/diagnostics/consultations/");

        },

        printData: function() {

            var appeal = this.options.appeal;
            var patient = appeal.get('patient');
            var result = this.result;

            var data = {
                patientId: patient.get('id'),
                patientName: patient.get('name').toJSON(),
                appealId: appeal.get('id'),
                appealNumber: appeal.get('number'),
                id: result.get('id'),
                name: result.get('name'),
                endDate: moment(result.getProperty('plannedEndDate'), "YYYY-MM-DD HH:mm:ss").format("DD.MM.YYYY HH:ss"),
                doctorName: [result.getProperty('doctorFirstName'), result.getProperty('doctorMiddleName'), result.getProperty('doctorLastName')].join(" "),
                doctorSpecs: result.getProperty('doctorSpecs'),
                assignerName: [result.getProperty('assignerFirstName'), result.getProperty('assignerMiddleName'), result.getProperty('assignerLastName')].join(" "),
                assignerSpecs: result.getProperty('assignerSpecs'),
                attributes: result.getFlattenedDetails()
            }

            console.log('printData', data);

            return [data];
        },

        print: function() {

            new PrintView({
                data: {
                    documents: this.printData()
                },
                template: "documentsToPrintSeparately"
            });

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

            json.doctor = doctorFirstName + ' ' + doctorMiddleName + ' ' + doctorLastName + ', ' + doctorSpecs;


            if (this.result.get('group')) {
                var group_1 = (this.result.get('group'))[1].attribute;
                json.tests = [];
                _.each(group_1, function(item) {
                    var value;

                    switch (item.type) {
                        // case 'Time':
                        //     value = moment(self.result.getProperty(item.name, 'value'),'YYYY-MM-DD HH:mm:ss').format('HH:mm');
                        //     break;
                        // case 'Date':
                        //     value = moment(self.result.getProperty(item.name, 'value'),'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                        //     break;
                        default: value = emptyFalse(self.result.getProperty(item.name, 'value'));
                        break;
                    }

                    json.tests.push({
                        name: item.name,
                        value: value //,
                        // unit: emptyFalse(self.result.getProperty(item.name, 'unit')),
                        // norm: emptyFalse(self.result.getProperty(item.name, 'norm'))
                    });

                });
            }

            return json;

        },

        render: function() {
            var self = this;
            self.getResult(function() {

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
