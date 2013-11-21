define(function (require) {
    var template = require('text!views/prescriptions/templates/appeal/new-prescription.html');
    var BaseView = require('../BaseView');
    var AddDrugPopupView = require('./AddDrugPopupView');
    var AdministrationMethod = require('collections/AdministrationMethod');
    var SelectView = require('../SelectView');
    var Prescription = require('../../models/Prescription');
    var rivets = require('rivets');

    return BaseView.extend({
        template: template,
        initialize: function () {
            var self = this;
            this.prescription = new Prescription({}, {
                actionTypeId: 754
            });

            this.administration = new AdministrationMethod();

            this.administrationView = new SelectView({
                collection: this.administration,
                model: this.prescription,
                modelKey: 'moa'
            });

            $.when(this.prescription.initialized())
                .then(function () {
                    console.log('prescription initialized', self.prescription);
                    var moaModel = self.prescription.getMoaModel();
                    var moaModelValueDomain = moaModel.get('valueDomain');
                    var moaKeys = (moaModelValueDomain.split(';'))[1];
                    console.log('moaModelValueDomain', moaKeys, moaModelValueDomain)

                    self.administration.fetch({
                        data: {
                            code: moaKeys
                        }
                    });
                    self.prescription.on('change', self.showJSON, self);
                    self.prescription.get('drugs')
                        .on('add remove change', self.showJSON, self);
                    self.prescription.get('assigmentIntervals')
                        .on('add remove change', self.showJSON, self);


                    self.prescription.set('eventId', 788899);
                    self.prescription.set('moa', 788899);
                    self.prescription.set('note', 'wertyui');
                    self.prescription.set('voa', 2345);
                    console.log('prescription', self.prescription);
                    self.render();

                })

            this.addSubViews({
                '#moa': this.administrationView,
            });


            this.prescription.on('change', function () {
                console.log('prescription change', this.prescription);
            }, this);

        },
        showJSON: function () {
            this.$el.find('#debug')
                .html(JSON.stringify(this.prescription.toJSON(), null, 4));
        },
        events: {
            'click [data-save-prescription]': 'onClickSavePrescription',
            'click [data-cancel]': 'onClickCancel',
            'click .add-drug': 'onClickAddDrug'
        },
        onClickSavePrescription: function () {
            console.log('onClickSave');
        },
        onClickCancel: function () {
            App.Router.navigate(['appeals', this.options.appealId, 'prescriptions'].join('/'), {
                trigger: true
            });
            console.log('onClickCancel');
        },
        onClickAddDrug: function () {
            var popup = new AddDrugPopupView({
                prescription: this.prescription
            });

            popup.render();
            popup.open();
        },
        render: function () {
            var self = this;
            $.when(this.prescription.initialized)
                .then(function () {

                    BaseView.prototype.render.call(self);
                    rivets.bind(self.el, {
                        prescription: self.prescription
                    });

                    //self.prescription.get('assigmentIntervals').add([{beginDateTime: 123456789}])
                });
        }
    });

});

