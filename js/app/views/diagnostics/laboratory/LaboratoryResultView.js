//страница просмотра результатов лабораторного исследования

define(function(require) {
    var template = require('text!templates/diagnostics/laboratory/laboratory-result.html');
    var Result = require('models/diagnostics/laboratory/laboratory-diag-form');

    var Biomaterials = require('collections/biomaterials/Biomaterials');

    require('views/print');


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
            "click .all": "openLabs"
        },


        printOptions: function() {
            var self = this;

            return {
                label: "Печать",
                scope: self,
                handler: self.printResultOfLaboratory,
                dropDownItems: [{
                        label: "Результат исследования",
                        handler: self.printResultOfLaboratory
                    }, {
                        label: "Направление на исследование",
                        handler: self.printDirectionForLaboratory
                    }, {
                        label: "Направление на исследование (без показателей)",
                        handler: self.printDirectionForLaboratorySimple
                    }
                ]
            }
        },

        // getJobTicket: function(jobTicketId){
        //     var biomaterials = new Biomaterials();
        //     biomaterials.setParams({
        //         filter: {
        //             jobTicketId : jobTicketId
        //         }
        //     });
        //     biomaterials.fetch();
        // },

        printResultOfLaboratory: function() {
            var result = this.resultData();

            new App.Views.Print({
                data: {
                    id: result.id,
                    name: result.name,
                    patientSex: result.patientSex,
                    patientName: result.patientName,
                    patientBirthday: result.patientBirthday,
                    age: result.age2,
                    appealNumber: result.appealNumber,
                    payments: result.payments,
                    department: result.department,
                    rbTissueTypeName: '',
                    rbTestTubeTypeNamе: '',
                    tests: result.tests,
                    assignDoctor: result.doctor,
                    jobTicketDatetime: ''
                },
                template: "resultOfLaboratory"
            });
        },

        printDirectionForLaboratory: function() {
            var result = this.resultData();

            new App.Views.Print({
                data: {
                    id: result.id,
                    name: result.name,
                    patientSex: result.patientSex,
                    patientName: result.patientName,
                    patientBirthday: result.patientBirthday,
                    age: result.age2,
                    appealNumber: result.appealNumber,
                    payments: result.payments,
                    department: result.department,
                    rbTissueTypeName: '',
                    rbTestTubeTypeNamе: '',
                    tests: result.tests,
                    assignDoctor: result.doctor,
                    jobTicketDatetime: ''
                },
                template: "directionForLaboratory"
            });
        },

        printDirectionForLaboratorySimple: function() {
            var result = this.resultData();

            new App.Views.Print({
                data: {
                    id: result.id,
                    name: result.name,
                    patientSex: result.patientSex,
                    patientName: result.patientName,
                    patientBirthday: result.patientBirthday,
                    age: result.age2,
                    appealNumber: result.appealNumber,
                    payments: result.payments,
                    department: result.department,
                    rbTissueTypeName: '',
                    rbTestTubeTypeNamе: '',
                    assignDoctor: result.doctor,
                    jobTicketDatetime: ''
                },
                template: "directionForLaboratorySimple"
            });
        },

        showPrintBtn: function(options) {
            console.log('showPrintBtn', options, this.$el);
            if (options) {
                var $printBtnHolder = $("<div/>");
                var $printBtn = $('<button class="PrintBtn"/>');

                $printBtn.button({
                    label: options.label
                }).click(function(event) {
                    event.preventDefault();
                    options.handler.apply(options.scope);
                });

                $printBtnHolder.append($printBtn);

                if (options.dropDownItems && options.dropDownItems.length) {
                    var $dropDown = $(
                        '<div class="DDList" style="display: block; left: -200px;">' +
                        '<div class="Content ButtonContent" style="top: 0; max-height: 30em; width: 20em;">' +
                        '<ul></ul>' +
                        '</div>');
                    var $list = $dropDown.find("ul");

                    _(options.dropDownItems).each(function(ddi) {
                        $list.append($("<li><a href='#' class='SubPrint'>" + ddi.label + "</a></li>").click(function() {
                            event.preventDefault();
                            ddi.handler.apply(options.scope);
                        }));
                    });

                    var $dropDownTrigger = $("<button/>").button({
                        text: false,
                        label: "Выбор формы",
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        }
                    }).click(function() {
                        $dropDown.position({
                            my: "right top",
                            at: "left bottom",
                            of: $(this).parent().parent()
                        }).toggleClass("Active");

                        return false;
                    });



                    $printBtnHolder.append($dropDownTrigger).buttonset();
                    $printBtnHolder.after($dropDown);
                }

                this.$("#print-button").empty().append($printBtnHolder).show();

            } else {

            }
        },

        openLabs: function() {
            this.trigger("change:viewState", {
                type: "diagnostics-laboratory"
            });
            App.Router.updateUrl("/appeals/" + this.options.appealId + "/diagnostics/laboratory/");

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

            var self = this;
            var json = this.result.toJSON();

            var doctorSpecs = this.result.getProperty('doctorSpecs');
            var doctorFirstName = this.result.getProperty('doctorFirstName');
            var doctorMiddleName = this.result.getProperty('doctorMiddleName');
            var doctorLastName = this.result.getProperty('doctorLastName');

            json.payments = appeal.get('patient').get('payments').toJSON();
            json.department = appeal.get('currentDepartment').name;

            json.patientName = appeal.get('patient').get('name').get('raw');


            json.appealNumber = appeal.get('number');
            var sex = appeal.get('patient').get('sex');
            if (sex === 'female') {
                json.patientSex = 'Ж';
            }
            if (sex === 'male') {
                json.patientSex = 'М';
            }

            var birthDate = appeal.get('patient').get('birthDate');
            //ageString
            json.patientBirthday = Core.Date.format(birthDate);
            json.age = Core.Date.format(birthDate) + ' ' + Core.Date.getAgeString(birthDate);
            json.age2 = Core.Date.getAgeString(birthDate);


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
            console.log('resultData options', json, this.options.appeal)
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

            //alert(JSON.stringify(this.resultData()));
        },


        render: function() {
            var self = this;
            self.getResult(function() {
                console.log('render LaboratoryResultView', self, self.resultData());
                self.$el.html(_.template(self.template, self.resultData(), {
                    variable: 'data'
                }));


                self.$('.actions button').button();
                self.showPrintBtn(self.printOptions());
            });



            return self;
        }

    });

    return LaboratoryResultView;

});
