define(function (require) {
    var template = require('text!views/prescriptions/templates/appeal/new-prescription.html');
    var BaseView = require('../BaseView');
    var AddDrugPopupView = require('./AddDrugPopupView');
    var AdministrationMethod = require('collections/AdministrationMethod');
    var Prescription = require('../../models/Prescription');
    var rivets = require('rivets');
    require('datetimeEntry');

    return BaseView.extend({
        template: template,
        initialize: function () {
            var self = this;
            console.log('init new prescription view', this);
            this.prescription = new Prescription({}, {
                actionTypeId: 754
            });

            this.administration = new AdministrationMethod();

            $.when(this.prescription.initialized())
                .then(function () {
                    self.prescription.set('eventId', self.options.appealId);
                    console.log('prescription initialized', self.prescription);
                    //в экшенпроперти "Спооб введения" в valueDomain хранятся коды
                    //по которым надо отфильтровать справочник способов введения
                    self.administration.fetch({
                        data: {
                            code: self.getMoaKeys()
                        }
                    })
                        .done(function () {
                            self.debug();
                            self.render();
                        });

                });


        },
        getMoaKeys: function(){
            var moaModel = this.prescription.getPropertyByCode('moa');
            var moaModelValueDomain = moaModel.get('valueDomain');
            var moaKeys = (moaModelValueDomain.split(';'))[1];
            return moaKeys; 
        },
        debug: function () {
            /*
             *            this.prescription.on('change', function () {
             *                console.log('prescription change', this.prescription);
             *            }, this);
             *
             */
            this.prescription.on('change', this.showJSON, this);
            this.prescription.get('drugs')
                .on('add remove change', this.showJSON, this);
            this.prescription.get('assigmentIntervals')
                .on('add remove change', this.showJSON, this);
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
            var self = this;
            this.prescription.save({}, {
                success: function (m, r) {
                    if (r.data) {
                        console.log('saved', arguments);
                        self.redirectToList();
                    } else {
                        console.log('error', r.message);
                    }
                }
            });
        },
        onClickCancel: function () {
            this.redirectToList();
            console.log('onClickCancel');
        },
        redirectToList: function () {
            App.Router.navigate(['appeals', this.options.appealId, 'prescriptions'].join('/'), {
                trigger: true
            });
        },
        onClickAddDrug: function () {
            var popup = new AddDrugPopupView({
                prescription: this.prescription
            });

            popup.render();
            popup.open();
        },
        data: function () {
            return {
                administration: this.administration.toJSON()
            };
        },
        render: function () {
            var self = this;
            BaseView.prototype.render.call(self);
            if (this.prescription.get('assigmentIntervals')) {
                this.prescription.get('assigmentIntervals')
                    .on('add remove', function () {
                        setTimeout(function () {
                            $('.datetime_entry')
                                .addClass('test')
                                .datetimeEntry({
                                    datetimeFormat: 'D.O.Y H:M'
                                });
                        }, 100);

                    }, this);


            }

            rivets.formatters.datetime = {
                read: function (value) { //вывод в хтмл
                    var v;
                    if (value) {
                        v = moment(value)
                            .format('DD.MM.YYYY HH:mm');
                    } else {
                        v = '';
                    }
                    return v;
                },
                publish: function (value) { //в модель
                    var v;
                    if (value) {
                        v = moment(value, 'DD.MM.YYYY HH:mm')
                            .valueOf();
                    } else {
                        v = null;
                    }
                    return v;
                }
            };

            rivets.bind(self.el, {
                prescription: self.prescription
            });

        }
    });

});
