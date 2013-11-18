define(function (require) {
    var template = require('text!views/prescriptions/templates/appeal/new-prescription-form.html');
    var BaseView = require('../BaseView');
    var AddDrugPopupView = require('./AddDrugPopupView');
    var AdministrationMethod = require('collections/AdministrationMethod');
    var SelectView = require('../SelectView');
    var Prescription = require('../../models/Prescription');
    var rivets = require('rivets');
    var IntervalsView = require('./IntervalsView');

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

            this.intervalsView = new IntervalsView();

            $.when(this.prescription.loaded).then(function () {
                var moaModel = self.prescription.getMoaModel();
                var moaModelValueDomain = moaModel.get('valueDomain');
                var moaKeys = (moaModelValueDomain.split(';'))[1];
                console.log('moaModelValueDomain',moaKeys, moaModelValueDomain)


                self.administration.fetch({data: {code:moaKeys}});

                self.prescription.set('eventId', 788899);
                self.prescription.set('moa', 788899);
                self.prescription.set('note', 'wertyui');
                self.prescription.set('voa', 2345);
            })



            this.prescription.on('change', function () {
                console.log('prescription change', this.prescription);
            }, this);

            console.log('prescription', this.prescription);
            this.addSubViews({
                '#moa': this.administrationView,
                '#intervals': this.intervalsView
            });

        },
        events: {
            'click [data-add-drug]': 'onClickAddDrug'
        },
        onClickAddDrug: function () {
            var popup = new AddDrugPopupView();

            popup.render();
            popup.open();
        },
        render: function () {
            var self = this;
            $.when(this.prescription.loaded).then(function () {

                BaseView.prototype.render.call(self);
                rivets.bind(self.el, {
                    prescription: self.prescription
                });
            });
        }
    });

});
