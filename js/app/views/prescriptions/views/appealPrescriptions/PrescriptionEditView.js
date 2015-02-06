define(function (require) {
    var template = require('text!views/prescriptions/templates/appeal/prescription-edit.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    var AddDrugPopupView = require('views/prescriptions/views/appealPrescriptions/AddDrugPopupView');
    var AdministrationMethod = require('collections/AdministrationMethod');
    var Prescription = require('views/prescriptions/models/Prescription');
    var rivets = require('rivets');
    require('datetimeEntry');
    var popupMixin = require('mixins/PopupMixin');

    return BaseView.extend({
        template: template,
        initialize: function (opt) {
            var self = this;
            this.options.title = 'Редактирование назначения';
            this.prescription = opt.prescription;
            this.administration = new AdministrationMethod();
            self.administration.fetch({
                data: {
                    code: self.getMoaKeys()
                }
            })
                .done(function () {
                    // self.debug();
                    self.render();

                    self.listenTo(self.prescription, 'change', self.validateForm);
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

        // close: function () {
        //     this.$el.dialog('close');
        //     this.remove();
        // },

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
            'click .add-drug': 'onClickAddDrug',
            'click #cancelIntervals': 'onCancelIntervalsClick'
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
                        // self.collection.fetch({
                        //     data: {
                        //         eventId: self.appealId
                        //     }
                        // });
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

        onCancelIntervalsClick: function () {
            this.close();
            pubsub.trigger('prescription:saved', self.prescription);
        },

        data: function () {
            return {
                prescription: this.prescription.toJSON(),
                administration: this.administration.toJSON()
            };
        },

        render: function () {
            var self = this;
            BaseView.prototype.render.call(self);

            function datetimeRange(input) {
                var id = input.id.split('-');
                var cid = id[0];
                var type = id[1];
                var res = {
                    minDatetime: null,
                    maxDatetime: null
                };

                if (type == 'to') {
                    res.minDatetime = moment($('#'+cid+'-from').datetimeEntry('getDatetime')).add('m',1).toDate();
                }

                if (type == 'from') {
                    if ($('#'+cid+'-to').datetimeEntry('getDatetime')){
                        res.maxDatetime = moment($('#'+cid+'-to').datetimeEntry('getDatetime')).subtract('m',1).toDate();
                    }
                }

                return res;
            }

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
                                    'beginDateTime': moment($(changedIntervalRow).find('.intervalBeginDate').val()+' '+$(changedIntervalRow).find('.intervalBeginTime').val()).unix(),
                                    'endDateTime': moment($(changedIntervalRow).find('.intervalEndDate').val()+' '+$(changedIntervalRow).find('.intervalEndTime').val()).unix(),
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

            if (this.prescription.get('drugs')) {
                this.prescription.get('drugs')
                    .on('add remove', function () {
                        setTimeout(function () {
                            self.$el.find('select').select2();
                        }, 100);
                    });

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

            rivets.formatters.add = function (value, string) {
                return value + string;
            };

            rivets.bind(self.el, {
                prescription: self.prescription
            });

            var drugs = this.prescription.get('drugs');
            drugs.each(function (drug) {
                drug.trigger('change:unit');
            });

            $('.date_entry').datepicker();
            $('.time_entry').timepicker();


            this.$el.find('button').button();
            this.$el.find('select').select2();
            this.validateForm();

        }

    }).mixin([popupMixin]);


});
