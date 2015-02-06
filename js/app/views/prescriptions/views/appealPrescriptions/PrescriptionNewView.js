define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var template = require('text!views/prescriptions/templates/appeal/prescription-new.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    var AddDrugPopupView = require('views/prescriptions/views/appealPrescriptions/AddDrugPopupView');
    var AdministrationMethod = require('collections/AdministrationMethod');
    var Prescription = require('views/prescriptions/models/Prescription');
    var rivets = require('rivets');
    require('datetimeEntry');

    return BaseView.extend({
        template: template,
        attributes: {
            "style": "display: table;"
        },
        initialize: function () {
            var self = this;
            this.options.title = 'Создание назначения';

            this.appealId = this.options.appeal.get('id');

            //console.log('init new prescription view', this);
            this.prescription = new Prescription({}, {
                actionTypeId: this.options.actionTypeId //754
            });

            this.administration = new AdministrationMethod();

            $.when(this.prescription.initialized())
                .then(function () {
                    self.prescription.set('eventId', self.appealId);
                    //console.log('prescription initialized', self.prescription);
                    //в экшенпроперти "Спооб введения" в valueDomain хранятся коды
                    //по которым надо отфильтровать справочник способов введения
                    self.administration.fetch({
                        data: {
                            code: self.getMoaKeys()
                        }
                    })
                        .done(function () {

                            self.prescription.set('eventId', self.appealId);
                            // self.debug();
                            self.render();
                            self.listenTo(self.prescription, 'change', self.validateForm);
                        });

                });


        },
        validateForm: function () {

            var errors = this.validate();

            this.saveButton(!errors.length);
            this.showErrors(errors);
        },

        showErrors: function (errors) {
            var $errors = this.$el.find('.errors')
            $errors.html('')
                .hide();

            if (errors.length > 0) {
                _.each(errors, function (error) {
                    $errors.append(error);
                }, this);
                //	$errors.append(errors[0]);
                $errors.show();
            }
        },

        validate: function () {
            var errors = [];

            var drugs = this.prescription.get('drugs');
            if (drugs && drugs instanceof Backbone.Collection) {
                if (!drugs.length) {
                    errors.push('Список лекарственных препаратов пуст. ');
                }
                var drugsErrors = drugs.validateCollection();
                if (drugsErrors && drugsErrors.length) {
                    errors = errors.concat(drugsErrors);
                }

            }

            var intervals = this.prescription.get('assigmentIntervals');
            if (intervals && intervals instanceof Backbone.Collection) {
                if (!intervals.length) {
                    errors.push('Список интервалов приёма препаратов пуст. ');
                }
                intervalsErrors = intervals.validateCollection();
                if (intervalsErrors && intervalsErrors.length) {
                    errors = errors.concat(intervalsErrors);
                }
            }
            console.log('validate', errors);
            return errors;
        },

        saveButton: function (enabled, msg) {
            var $saveButton = this.$el.closest('.ui-dialog')
                .find('.save');
            $saveButton.button();

            if (enabled) {
                $saveButton.button('enable');
            } else {
                $saveButton.button('disable');
            }
            if (msg) {
                $saveButton.button('option', 'label', msg);
            } else {
                $saveButton.button('option', 'label', 'Сохранить');
            }

        },

        close: function () {
            this.$el.dialog('close');
            this.remove();
        },

        getMoaKeys: function () {
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
            'click .add-drug': 'onClickAddDrug'
        },
        onSave: function () {
            //console.log('onClickSave');
            var self = this;

            this.saveButton(false, 'Сохраняем...');
            this.prescription.save({}, {
                success: function (m, r) {
                    if (r.data) {
                        pubsub.trigger('prescription:saved', self.prescription)
                        console.log('saved', arguments);
                        self.close();
                    } else {
                        console.log('error', r.message);
                    }
                }
            });
        },

        onClickAddDrug: function () {
            var popup = new AddDrugPopupView({
                prescription: this.prescription,
                appeal: this.options.appeal
            });

            popup.render();
            popup.open();
        },

        data: function () {
            return {
                administration: this.administration.toJSON(),
                prescription: this.prescription.toJSON()
            };
        },

        render: function () {
            var self = this;
            BaseView.prototype.render.call(self);



            if (this.prescription.get('assigmentIntervals')) {
                this.prescription.get('assigmentIntervals')
                    .on('add remove', function () {

                        setTimeout(function () {
                            $('.date_entry').datepicker();
                            $('.time_entry').timepicker();
                        }, 100);

                        self.render();

                        _.each(self.$el.find('.prescriptionInterval'), function(interval){
                            var intervalId = $(interval).attr('id');
                            $(interval).on('change', 'input, select', function(e){
                                var changedInterval = self.prescription.get('assigmentIntervals').models[intervalId];
                                var changedIntervalRow = $('.prescriptionInterval[id="'+intervalId+'"]');
                                changedInterval.set({
                                    'beginDateTime': moment($(changedIntervalRow).find('.intervalBeginDate').val()+' '+$(changedIntervalRow).find('.intervalBeginTime').val(), 'MM.DD.YYYY HH:mm').unix(),
                                    'endDateTime': moment($(changedIntervalRow).find('.intervalEndDate').val()+' '+$(changedIntervalRow).find('.intervalEndTime').val(), 'MM.DD.YYYY HH:mm').unix(),
                                });
                                changedInterval.get('drugs').first().set({
                                    'dose': $(changedIntervalRow).find('.intervalDose').val(),
                                    'moa': $(changedIntervalRow).find('.intervalMoa').val(),
                                    'voa': $(changedIntervalRow).find('.intervalVoa').val()
                                });
                            })
                        });

                    }, this);


            }

            if(this.prescription.get('drugs')){
                this.prescription.get('drugs')
                .on('add remove', function(){
                    setTimeout(function () {
                    self.$el.find('select').select2();

                    // self.prescription.get('assigmentIntervals').each(function(interval){
                    //     interval.set('drugs', self.prescription.get('drugs'));
                    // });

                    }, 100);
                });

            }

            rivets.bind(self.el, {
                prescription: self.prescription
            });

            this.$el.find('button')
                .button();
            this.$el.find('select')
                .select2();
            this.validateForm();

        }
    })
        .mixin([popupMixin]);


});
