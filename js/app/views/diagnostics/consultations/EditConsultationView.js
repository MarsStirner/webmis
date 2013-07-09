/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(function(require) {

    var popupMixin = require('mixins/PopupMixin');
    var tmpl = require('text!templates/diagnostics/consultations/new-consultation-popup.html');

    require('collections/doctors');
    var ConsultantsFree = require('collections/doctors-free');
    var Consultation = require('models/diagnostics/consultations/Consultation');
    var ConsultationsGroups = require('collections/diagnostics/consultations/ConsultationsGroups');


    var ConsultantsFreeView = require('views/diagnostics/consultations/ConsultantsFreeView');
    var ConsultationsGroupsView = require('views/diagnostics/consultations/ConsultationsGroupsView');
    var MkbInputView = require('views/ui/MkbInputView');
    var PersonDialogView = require('views/ui/PersonDialog');
    var ScheduleView = require('views/diagnostics/consultations/ScheduleView');
    var SelectView = require('views/ui/SelectView');



    return View.extend({
        template: tmpl,
        className: "popup",

        events: {
            'change #finance': 'onChangeFinance',
            'change input[name="diagnosis[mkb][code]"]': 'onChangeMKB',
            'click #doctor-outer': 'openDoctorSelectPopup',
            'change #assign-date': 'onChangeAssignDate',
            'change #assign-time': 'onChangeAssignDate',
            'change #urgent': 'onChangeUrgent'
        },

        initialize: function(options) {
            // var self = this;
            console.log('init new consultation view', this);
            _.bindAll(this);

            this.appealDiagnosis = this.options.appeal.getDiagnosis();
            var appealDoctor = this.options.appeal.get('execPerson');

            //"Направивший врач"
            if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
                //юзер не врач
                this.doctor = {
                    name: {
                        first: appealDoctor.name.first,
                        last: appealDoctor.name.last,
                        middle: appealDoctor.name.middle
                    }
                };

            } else {
                //юзер врач

                this.doctor = {
                    name: {
                        first: Core.Cookies.get("doctorFirstName"),
                        last: Core.Cookies.get("doctorLastName"),
                        middle: ''
                    }
                };
            }

            this.data = {
                'doctor': this.doctor
            };


            //список доступных консультаций
            this.consultationsGroups = new ConsultationsGroups({});
            this.consultationsGroupsView = new ConsultationsGroupsView({
                collection: this.consultationsGroups
            });
            this.consultationsGroups.fetch();

            //направление на консультацию
            this.consultation = new Consultation({
                'id': this.options.id //,
                //'eventId': this.options.appealId//,
                //'patientId': this.options.appeal.get('patient').get('id')
            });
            this.consultation.eventId = this.options.appealId;



            this.consultation.on('change', this.onLoadConsultation, this);
            this.consultation.fetch();



            //список специалистов которые могут оказать консультацию
            this.consultantsFree = new ConsultantsFree();
            this.consultantsFreeView = new ConsultantsFreeView({
                collection: this.consultantsFree
            });

            pubsub.on('consultation:selected', this.onConsultationSelect, this);
            pubsub.on('consultant:selected', this.onConsultantSelect, this);
            pubsub.on('date:selected', this.onChangePlanedDate, this);
            pubsub.on('time:selected', this.onChangePlanedTime, this);

            //классификатор диагнозов
            this.mkbInputView = new MkbInputView();
            this.depended(this.mkbInputView);

            //список видов оплаты
            this.financeDictionary = new App.Collections.DictionaryValues([], {
                name: 'finance'
            });

            this.scheduleView = new ScheduleView();

            this.consultation.on('change:actionTypeId', this.loadConsultants, this);
            this.consultation.on('change:plannedEndDate', this.loadConsultants, this);
            this.consultation.on('change', this.updateSaveButton, this);

            pubsub.on('person:changed', this.onChangeAssignPerson, this);

        },

        onLoadConsultation: function() {
            this.consultation.off('change', this.onLoadConsultation, this);
            console.log('onLoadConsultation', this.consultation);
            var code = this.consultation.get('code');
            var date = moment(this.consultation.getProperty('plannedEndDate'), 'YYYY-MM-DD HH:mm:ss').toDate();


            this.on('after:render', function() {
                this.$('#consultations').find("[data-code='" + code + "']").trigger('click');
                //pubsub.trigger('consultation:selected', this.consultation.get('code'));
                this.ui.$planedDate.datepicker('enable');
                this.ui.$planedDate.datepicker("setDate", date);
                this.consultation.trigger('change:plannedEndDate');

            }, this);



            this.render();

        },

        //при выборе консультации
        onConsultationSelect: function(code) {
            console.log('onConsultationSelect', code, consultation);
            var consultation = this.consultationsGroups.find(function(model) {
                return model.get('code') === code;
            })

            if (consultation) {
                this.consultation.set('actionTypeId', consultation.get('id'));
            }



        },

        //при выборе консультанта
        onConsultantSelect: function(consultantId) {
            console.log('onConsultantSelect', consultantId);
            var consultant = this.consultantsFree.find(function(consultant) {
                return consultant.get('doctor').id === consultantId;
            });
            this.consultation.set('executorId', consultantId);
            this.renderShedule(consultant);
        },

        //при выборе даты
        onChangePlanedDate: function(date) {
            console.log('onChangePlanedDate', date);
            var newDate = moment(date);
            var year = newDate.year();
            var month = newDate.month();
            var date = newDate.date();

            var planedDate = moment(this.consultation.get('plannedEndDate'), 'YYYY-MM-DD HH:mm:ss')
                .year(year).month(month).date(date).format('YYYY-MM-DD HH:mm:ss');

            this.consultation.setProperty('plannedEndDate', 'value', planedDate);
            this.consultation.trigger('change:plannedEndDate');
            console.log('onChangePlanedDate', this.consultation.getProperty('plannedEndDate'));



        },

        //при выборе времени
        onChangePlanedTime: function(obj) {
            var time = obj.time;
            var hours = Math.floor(time / (60 * 60 * 1000));
            var minutes = Math.floor((time - hours * 60 * 60 * 1000) / (60 * 1000));
            var seconds = Math.floor((time - hours * 60 * 60 * 1000 - minutes * 60 * 1000) / 1000);
            var plannedEndDate = this.consultation.getProperty('plannedEndDate');

            var planedDate = moment(plannedEndDate, 'YYYY-MM-DD HH:mm:ss')
                .hours(hours).minutes(minutes).seconds(seconds).format('YYYY-MM-DD HH:mm:ss');

            this.consultation.setProperty('plannedEndDate', 'value', planedDate);
            console.log('onChangePlanedTime', this.consultation.getProperty('plannedEndDate'));
        },

        onChangeAssignDate: function() {
            var date = this.ui.$assignDate.val();
            var time = this.ui.$assignTime.val();
            var datetime = moment(date + ' ' + time, 'DD.MM.YYYY HH:mm').format('YYYY-MM-DD HH:mm:ss')

            this.consultation.setProperty('assessmentBeginDate', 'value', datetime);

            console.log('onChangeAssignDate', date, time, this.consultation.getProperty('assessmentBeginDate'));

        },

        //при выборе вида оплаты
        onChangeFinance: function(e) {
            var $target = this.$(e.target);

            this.consultation.setProperty('finance', 'value', $target.val());
        },

        onChangeUrgent: function(e) {
            var $target = this.$(e.target);
            this.consultation.setProperty('urgent', 'value', $target.prop('checked')+'');
        },

        //при изменении диагноза
        onChangeMKB: function(e) {
            var $target = this.$(e.target);

            this.consultation.setProperty('Направительный диагноз', 'valueId', $target.data('mkb-id'));

            console.log('onMKBChange', $target, this.consultation.getProperty('Направительный диагноз', 'valueId'));

        },

        onChangeAssignPerson: function(person) {
            this.ui.$assignPerson.val(person.name.raw);

            this.consultation.setProperty('doctorFirstName', 'value', person.name.first);
            this.consultation.setProperty('doctorMiddleName', 'value', person.name.middle);
            this.consultation.setProperty('doctorLastName', 'value', person.name.last);

            console.log('onChangeAssignPerson',
                this.consultation.getProperty('doctorFirstName'),
                this.consultation.getProperty('doctorMiddleName'),
                this.consultation.getProperty('doctorLastName'))

        },

        openDoctorSelectPopup: function() {
            console.log('openDoctorSelectPopup');
            this.personDialogView = new PersonDialogView({
                title: 'Направивший врач',
                appeal: this.options.appeal
            });

            this.personDialogView.render().open();

        },

        //загрузка списка консультантов
        loadConsultants: function() {
            console.log('loadConsultants');
            if (!this.consultation.getProperty('plannedEndDate') || !this.consultation.get('typeId')) {
                return false;
            }

            var date = moment(this.consultation.getProperty('plannedEndDate'), 'YYYY-MM-DD HH:mm:ss').valueOf();

            this.consultantsFree.setParams({
                'filter[beginDate]': date,
                'filter[actionType]': this.consultation.get('typeId')
            });
            this.consultantsFree.fetch();
        },
        //расписание приёма консультанта на определённый день
        renderShedule: function(consultant) {
            this.scheduleView.collection.reset(consultant.get('schedule').toJSON());
            this.scheduleView.render();
        },
        //при клике на кнопку "Сохранить"
        onSave: function() {
            var self = this;
            console.log('onSave', this.consultation);
            this.consultation.save({}, {
                success: function() {

                    pubsub.trigger('noty', {
                        text: 'Направление сохранено',
                        type: 'success'
                    });
                    self.close();
                    pubsub.trigger('consultation:added', this.consultation);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    pubsub.trigger('noty', {
                        text: (JSON.parse(textStatus.responseText)).exception,
                        type: 'error'
                    });
                    self.close();
                    pubsub.trigger('consultation:added', this.consultation);
                }
            });
        },
        //измение статуса кнопки "Сохранить"
        updateSaveButton: function() {
            console.log('updateSaveButton', this.consultation);
            /// if (this.consultation.get('plannedTime').time) {
            this.ui.$saveButton.button("enable");
            // } else {
            //    this.ui.$saveButton.button("disable");
            //}
        },

        render: function() {
            var self = this;

            this.ui = {};
            this.ui.$saveButton = this.$el.closest(".ui-dialog").find('.save');
            //this.ui.$consultations = this.$el.find('#consultations');
            this.ui.$planedDate = this.$el.find('#datepicker');

            //this.ui.$saveButton.button("disable");
            this.ui.$finance = this.$el.find('#finance');
            //this.ui.$assignPerson = this.$el.find('#assign-person');
            this.ui.$assignDate = this.$el.find('#assign-date');
            this.ui.$assignTime = this.$el.find('#assign-time');
            this.ui.$assignPerson = this.$el.find('#doctor');

            this.ui.$urgent = this.$el.find('#urgent');
            this.$el.find('.change-doctor').button();

            //календарь
            this.ui.$planedDate.datepicker({
                minDate: 0,
                onSelect: function(dateText, inst) {
                    var timestamp = moment(dateText, 'DD.MM.YYYY').valueOf();
                    pubsub.trigger('date:selected', timestamp)

                }
            });
            this.ui.$planedDate.datepicker('disable');


            //дата создания направления
            var assignDate = moment(this.consultation.getProperty('assessmentBeginDate'), 'YYYY-MM-DD HH:mm:ss').toDate();
            this.ui.$assignDate.datepicker({
                minDate: 0
            });
            this.ui.$assignDate.datepicker('setDate', assignDate)

            this.ui.$assignTime.timepicker();
            this.ui.$assignTime.timepicker('setTime', assignDate);

            //направительный диагноз
            this.renderNested(this.mkbInputView, "#mkb");

            if (this.consultation.getProperty('Направительный диагноз')) {
                var mkbId = this.consultation.getProperty('Направительный диагноз', 'valueId');
                var diagnosis = (this.consultation.getProperty('Направительный диагноз', 'value')).split(' ');
                var mkbCode = diagnosis[0];
                diagnosis.shift();
                var mkbDiagnosis = diagnosis.join(' ');


                //if (this.appealDiagnosis) {
                this.$("input[name='diagnosis[mkb][diagnosis]']").val(mkbDiagnosis);
                this.$("input[name='diagnosis[mkb][code]']").val(mkbCode);
                this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', mkbId);
                //}
            }

            if(this.consultation.getProperty('urgent') === 'true'){
                this.ui.$urgent.prop('checked', true);
            }




            //список консультаций
            this.renderNested(this.consultationsGroupsView, "#consultations");
            //список консультантов
            this.renderNested(this.consultantsFreeView, "#consultants");
            //расписание на день
            this.scheduleView.setElement(this.$el.find("#schedule"));

            // //назначивший врач
            // this.assignPersonSelect = new SelectView({
            //  collection: this.assignPersons,
            //  el: this.ui.$assignPerson,
            //  selectText: 'name.raw',
            //  initSelection: Core.Cookies.get('userId')
            // });
            // this.depended(this.assignPersonSelect);

            //вид оплаты
            this.financeSelect = new SelectView({
                collection: this.financeDictionary,
                el: this.ui.$finance,
                initSelection: this.consultation.getProperty('finance')
            });
            this.depended(this.financeSelect);

            this.open();
            this.trigger('after:render');

            return this;
        },
        close: function() {
            console.log('popup view close');
            this.mkbInputView.close();
            this.consultationsGroupsView.close();
            this.consultantsFreeView.close();
            this.scheduleView.close();

            this.$el.dialog("close");
            this.$el.remove();
        }

    }).mixin([popupMixin]);


});
