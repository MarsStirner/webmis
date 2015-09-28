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

            this.prescription = new Prescription({}, {
                actionTypeId: this.options.actionTypeId //754
            });

            this.administration = new AdministrationMethod();

            $.when(this.prescription.initialized())
                .then(function () {
                    self.prescription.set('eventId', self.appealId);
                    //в экшенпроперти "Спооб введения" в valueDomain хранятся коды
                    //по которым надо отфильтровать справочник способов введения
                    self.administration.fetch({
                        data: {
                            code: self.getMoaKeys()
                        }
                    })
                        .done(function () {
                            self.prescription.set('eventId', self.appealId);
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
            'click .HasToolTip': 'showInfo'
        },

        showInfo: function(e){
            var infoView = $(e.target).parent().find('.info');
            if (infoView.text()) {
                infoView.show();
                $(e.target).parent().on('mouseleave', function () {
                    $('.info').hide();
                });
            }
        },

        onSave: function () {
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
            if (!this.prescription.get('note')) {
                this.prescription.set('note', '');
            }

            if (this.prescription.get('assigmentIntervals')) {
                this.prescription.get('assigmentIntervals')
                    .on('add remove', function () {

                        setTimeout(function () {
                            $('.date_entry').datepicker();
                            $('.time_entry').timepicker();
                        }, 100);

                        var drugTab = $('#drugs').html();

                        self.render();

                        if(this.prescription.get('assigmentIntervals').length > 0) {
                            $('.add-drug').addClass('ui-state-disabled');
                            var doses = [];
                            var units = [];
                            $.each($('#drugs').find('.dose'), function(d, dose){
                                doses.push($(dose).val());
                            });
                            $('#drugs').html(drugTab).find('.dose').attr('disabled', 'disabled');
                            $.each($('#drugs').find('.select2-container.units span'), function(u, unit){
                                units.push(unit.innerHTML);
                            });
                            $.each($('#drugs').find('.dose'), function(d, dose){
                                $(dose).parent().text(doses[d]);
                            });
                            $.each($('#drugs').find('.units'), function(u, unit){
                                $(unit).parent().text(units[u]);
                            });
                            $('#drugs').find('.icon-remove').hide();
                        }

                        _.each(self.$el.find('.prescriptionInterval'), function(interval){
                            var intervalId = $(interval).attr('id');
                            var changedInterval = self.prescription.get('assigmentIntervals').models[intervalId];
                            $(interval).on('change', 'input, select', function(e){
                                var changedIntervalRow = $('.prescriptionInterval[id="'+intervalId+'"]');
                                var beginDateTime = moment($(changedIntervalRow).find('.intervalBeginDate').val()+' '+$(changedIntervalRow).find('.intervalBeginTime').val(), 'DD.MM.YYYY HH:mm').valueOf();
                                var endDateTime = moment($(changedIntervalRow).find('.intervalEndDate').val()+' '+$(changedIntervalRow).find('.intervalEndTime').val(), 'DD.MM.YYYY HH:mm').valueOf();
                                if (beginDateTime > 0) {
                                    changedInterval.set({
                                        'beginDateTime': beginDateTime
                                    });
                                }
                                if (endDateTime > 0) {
                                    changedInterval.set({
                                        'endDateTime': endDateTime ? endDateTime : null
                                    });
                                }
                                changedInterval.set({
                                    'note': $(changedIntervalRow).find('.intervalNote').val()
                                });
                                if (self.prescription.actionTypeId == 753) {
                                    changedInterval.get('drugs').first().set({
                                        'dose': $(changedIntervalRow).find('.intervalDose').val(),
                                        'moa': $($(changedIntervalRow).find('.intervalMoa').find('.intervalMoa').prevObject[1]).val(),
                                        'voa': $(changedIntervalRow).find('.intervalVoa').val()
                                    });
                                }
                            })
                            $(interval).on('click', '.icon-remove', function(e){
                                self.prescription.get('assigmentIntervals').remove(self.prescription.get('assigmentIntervals').models[intervalId]);
                            });
                            $(interval).on('click', '.intervalMoa', function(e){
                                if ($(e.target).val()) {
                                    changedInterval.get('drugs').first().set({
                                        'moa': parseInt($(e.target).val())
                                    });
                                }
                            });
                        });

                    }, this);
            }

            if(this.prescription.get('drugs')){
                this.prescription.get('drugs')
                .on('add remove', function(e){
                    setTimeout(function () {
                        _.each(self.$el.find('option'), function(option){
                            var val = $(option).text();
                            if (val.length > 14) {
                                $(option).text(val.substring(0, 14)+'...');
                            }
                        });
                        self.$el.find('select').select2();

                        if ( typeof PHARM_EXPERT_API !== 'undefined'  ) {
                            var medicaments = new FormData();
                            var url = PHARM_EXPERT_API+"getInfoPreparation";
                            var method = 'POST';
                            var drugs = [];

                            self.prescription.get('drugs').each(function(drug, d){
                                medicaments.append('medicaments[][name]', drug.get('name'));
                                self.getDoseInfo(drug, d);
                            });

                            var xhr = new XMLHttpRequest();
                            if ("withCredentials" in xhr) {
                                xhr.open(method, url, true);
                            } else if (typeof XDomainRequest != "undefined") {
                                xhr = new XDomainRequest();
                                xhr.open(method, url);
                            } else {
                                xhr = null;
                            }

                            if (xhr) {
                                xhr.onload = function() {
                                    var responseText = JSON.parse(xhr.responseText);
                                    responseText && self.warningShow(responseText);
                                };

                                xhr.onerror = function() {
                                  console.log('There was an error!');
                                };

                                xhr.send(medicaments);
                            }
                        }

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

        },

        resetConflicts: function(){
            $('.drug-warning, .drug-duplicate').css({
                'opacity': '0.5',
                'border-bottom': 'none',
                'cursor': 'default'
            }).unbind('click').parent().css({
                'background-color': '#ffffff',
                'border': 'none'
            });
        },

        getDoseInfo: function(drug, d){
            var medicament = new FormData();
            var url = PHARM_EXPERT_API+"getDosage";
            var method = 'POST';
            medicament.append('medicament', drug.get('name'));
            var xhr = new XMLHttpRequest();
            if ("withCredentials" in xhr) {
                xhr.open(method, url, true);
            } else if (typeof XDomainRequest != "undefined") {
                xhr = new XDomainRequest();
                xhr.open(method, url);
            } else {
                xhr = null;
            }

            if (xhr) {
                xhr.onload = function() {
                    var responseText = JSON.parse(xhr.responseText);
                    if (responseText) {
                        var doseInfo = $($('.drug-item')[d]).find('.dose-info');
                        doseInfo.html('');
                        doseInfo.append('<p><strong>Методы введения:</strong></p>');
                        _.each(responseText.dosing_formulation, function(form){
                            $(doseInfo).append('<li style="margin-left:5px">'+form.name+'</li>');
                        });
                        doseInfo.append('<p style="margin-top: 10px;"><strong>Лекарственные формы:</strong></p>');
                        _.each(responseText.formulation, function(form){
                            $(doseInfo).append('<p style="margin-top:5px">'+form.name+'</p>');
                            _.each(form.dosage, function(dosage){
                                $(doseInfo).append('<li style="margin-left:5px">'+dosage.name+'</li>');
                            });
                        });
                        doseInfo.append('<p style="margin-top: 10px;"><strong>Частота приёма:</strong></p>');
                        _.each(responseText.dosing_frequency, function(form){
                            $(doseInfo).append('<li style="margin-left:5px">'+form.name+'</li>');
                        });
                        $($('.drug-item')[d]).on('mouseleave', function(){
                            doseInfo.hide();
                        }).find('.icon-info-sign').show().on('click', function(){
                            doseInfo.show();
                        });
                    }
                };

                xhr.onerror = function() {
                  console.log('There was an error!');
                };

                xhr.send(medicament);
            }
        },

        getColor: function(colVal){
            switch (colVal) {
                case '0':
                    var warningColor = '#addfff';
                    var border = '#0093fe';
                    break;
                case '1':
                    var warningColor = '#fff7ad';
                    var border = '#fee500';
                    break;
                case '2':
                    var warningColor = '#ffefad';
                    var border = '#d7c200';
                    break;
                case '3':
                    var warningColor = '#ffc1ad';
                    var border = '#d74700';
                    break;
                case '4':
                    var warningColor = '#ffadad';
                    var border = '#d70000';
                    break;
                case '+1':
                    var warningColor = '#adffbf';
                    var border = '#1ed700';
                    break;
                default:
                    var warningColor = '#ffefad';
                    var border = '#d7bb00';
            }
            return {
                warningColor: warningColor,
                border: border
            }
        },

        showConflicts: function(data){
            var self = this;
            var drugRows = this.$('#drugs .drug-item');
            this.resetConflicts();
            var elConflicts = [];
            _.each(data.elements, function(el, e){
                if (el.conflict) {
                    _.each(el.conflict, function(conflict){
                        if (elConflicts[e]) {
                            elConflicts[e][conflict.id] = conflict;
                        } else {
                            elConflicts[e] = [];
                            elConflicts[e][conflict.id] = conflict;
                        }
                        var conflictRow = $(drugRows[conflict.id]);
                        var thisRow = $(drugRows[e]);
                        if (conflictRow.length) {
                            var trust = data.titles.trust[conflict.trust];
                            if (trust) {
                                var warningIcon = $(conflictRow).find('.drug-warning');
                                var thisIcon = $(thisRow).find('.drug-warning');

                                if (conflict.value > $(warningIcon).parent().data('col')) {
                                    var colVal = conflict.value;
                                    $(warningIcon).parent().data('col', colVal);
                                } else {
                                    var colVal = $(warningIcon).parent().data('col');
                                }
                                var warningColor = self.getColor(colVal).warningColor;
                                var border = self.getColor(colVal).border;
                            } else {
                                if (conflict.value.indexOf('duplicate') > -1) {
                                    var warningColor = '#addfff';
                                    var border = '#0093fe';
                                    var warningIcon = $(conflictRow).find('.drug-duplicate');
                                    var thisIcon = $(thisRow).find('.drug-duplicate');
                                    var exchange = "Содержит аналогичное действующее вещество"
                                }
                            }
                            thisIcon.show();
                            warningIcon.show();

                            $(warningIcon).parent().css({
                                'background-color': warningColor
                            });

                            $(thisIcon).parent().css({
                                'background-color': warningColor,
                                'cursor': 'pointer'
                            }).on('click', function () {
                                self.resetConflicts();
                                warningColor = self.getColor(conflict.value).warningColor;
                                border = self.getColor(conflict.value).border;
                                $(this).css({
                                    'border-left': '3px solid'+border,
                                    'background-color': warningColor,
                                });
                                $(warningIcon).css({
                                    'opacity': '1',
                                    'border-bottom': '1px dashed rgb(110, 110, 110)',
                                    'cursor': 'pointer'
                                }).on('click', function(event){
                                    event.stopPropagation();
                                    var descriptionView = $('<div/>');
                                    if (exchange) {
                                        descriptionView.html("<p>"+exchange+"</p>");
                                    } else {
                                        var confId = conflict.id;
                                        _.each(elConflicts[e], function(conflict){
                                            if (conflict.idTies && conflict.id == confId) {
                                                descriptionView.append("<p align='center'>"+trust+"</p>");
                                                descriptionView.append("<p align='center' style='margin-top: 5px; margin-bottom: 10px; font-size: 1.2em'><strong>"+data.titles.elements[conflict.value]+"</strong></p>");
                                                _.each(data.descriptions[conflict.idTies].listLS, function(ls){
                                                    descriptionView.append("<li>"+ls+"</li>");
                                                });
                                                data.descriptions[conflict.idTies].descriptions.interactions && descriptionView.append("<p style='margin-top: 10px;'>"+data.descriptions[conflict.idTies].descriptions.interactions+"</p>");
                                            }
                                        })

                                    }
                                    $(conflictRow).find('.description').html(descriptionView).show();
                                    $(conflictRow).on('mouseleave', function(){
                                        $(this).find('.description').hide();
                                    });
                                }).parent().css('background-color', warningColor);
                            });
                        }
                    });
                }
            });
        },

        warningShow: function(data){
            var self = this;
            var drugRows = this.$('#drugs .drug-item');
            this.showConflicts(data)
            this.$('#warningText').text('');
            _.each(data.warnings, function(war){
                var warView = $('<span/>');
                warView.text(war.name).css({
                    'cursor': 'pointer',
                    'margin-right': '20px',
                    'border-bottom': '1px dashed rgb(134, 134, 134)'
                }).on('click', function(){
                    if (war.id == 105) {
                        self.showConflicts(data);
                    } else {
                        self.resetConflicts();
                        $('.drug-warning, .drug-duplicate').css('opacity', '0');
                        _.each(war.conflict, function(conf){
                            console.log(conf);
                            $(drugRows[conf.id]).find('.drug-warning').parent().css({
                                'cursor': 'default',
                                'background-color': 'rgb(255, 100, 100)'
                            });
                        })
                    }
                });
                if (war.id == 111) {
                    warView.css({
                        'color': 'rgb(255, 0, 0)',
                        'border-bottom': '1px dashed rgb(255, 0, 0)'
                    });
                }
                this.$('#warningText').append(warView);
            });
        },

    })
        .mixin([popupMixin]);

});
