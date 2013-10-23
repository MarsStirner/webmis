var primer =  {
  'finance': {
    'id': 7
  },
  'eventId': '193527',
  'patientId': 6402,
  'assignerId': 205,
  'createDateTime': 1378902190000,
  'diagnosis': {
    'code': 'D84.8'
  },
  'urgent': true,
  'overQueue': true,
  'actionTypeId': 1465,
  'plannedEndDate': 1378929610000,

  'executorId': 177
};


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
        className: 'popup',

        events: {
            'change #finance': 'onChangeFinance',
            'change input[name="diagnosis[mkb][code]"]': 'onChangeMKB',
            'click #assigner-outer': 'openAssignerSelectPopup',
            'change #assign-date': 'onChangeAssignDate',
            'change #assign-time': 'onChangeAssignDate',
            'change #urgent': 'onChangeUrgent',
            'change #over': 'onChangeOver',
        },

        initialize: function(options) {
            var self = this;
            console.log('init new consultation view', this);
            _.bindAll(this);

            this.appealDiagnosis = this.options.appeal.getDiagnosis();
            var appealDoctor = this.options.appeal.get('execPerson');
            self.assigner = {
                id: '',
                name: ''
            };


            //список доступных консультаций
            this.consultationsGroups = new ConsultationsGroups({});
            this.consultationsGroupsView = new ConsultationsGroupsView({
                collection: this.consultationsGroups
            });
            this.consultationsGroups.fetch();


            //список специалистов которые могут оказать консультацию
            this.consultantsFree = new ConsultantsFree();
            this.consultantsFreeView = new ConsultantsFreeView({
                collection: this.consultantsFree
            });

            //классификатор диагнозов
            this.mkbInputView = new MkbInputView();
            this.depended(this.mkbInputView);

            //список видов оплаты
            this.financeDictionary = new App.Collections.DictionaryValues([], {
                name: 'finance'
            });

            //расписание врача
            this.scheduleView = new ScheduleView();


            this.newConsultation = new Consultation({
                'id': this.options.id
            });
            this.newConsultation.eventId = this.options.appealId;

            //получение данных о направление на консультацию которую надо отредактировать
            this.consultation = new Consultation({
                'id': this.options.id
            });
            this.consultation.eventId = this.options.appealId;


            this.consultation.fetch().done(function() {

                var createDateTime = moment(self.consultation.getProperty('assessmentBeginDate'),'YYYY-MM-DD HH:mm:ss').valueOf();
                var plannedEndDate = moment(self.consultation.getProperty('plannedEndDate'),'YYYY-MM-DD HH:mm:ss').valueOf();

                var urgent = false;
                if(self.consultation.getProperty('urgent') === 'true'){
                    urgent = true;
                }

                var overQueue = false;
                if(self.consultation.getProperty('overQueue') === 'true'){
                    overQueue = true;
                }

                var diagnosisCode = '';
                if(self.consultation.getProperty('Направительный диагноз')){

                    diagnosisArray = self.consultation.getProperty('Направительный диагноз').split(' ')
                    diagnosisCode = diagnosisArray[0];
                }


                self.newConsultation.set({
                    'finance': {
                        'id': parseInt(self.consultation.getProperty('finance'), 10)
                      },
                      'eventId': self.options.appealId,
                      'patientId': parseInt(self.options.appeal.get('patient').get('id'), 10),
                      'assignerId': parseInt(self.consultation.getProperty('assignerId'), 10),
                      'createDateTime': createDateTime,
                      'diagnosis': {
                        'code': diagnosisCode
                      },
                      'urgent': urgent,
                      'overQueue': overQueue,
                      'actionTypeId': parseInt(self.consultation.get('typeId'), 10),
                      'plannedEndDate': plannedEndDate,

                      'executorId': parseInt(self.consultation.getProperty('executorId'), 10)
                });

                var executorId = self.consultation.getProperty('executorId');

                self.assigner = {
                    id: executorId,
                    name: {
                        first: self.consultation.getProperty('assignerFirstName'),
                        last: self.consultation.getProperty('assignerLastName'),
                        middle: self.consultation.getProperty('assignerMiddleName')
                    }
                };

                self.data = {
                    'assigner': self.assigner
                };


                self.consultationsGroupsView.selectedItemCode = self.consultation.get('code');

                self.consultantsFreeView.selectedItemCode = executorId;
                var actionType = self.consultation.get('typeId');
                var beginDate = moment(self.consultation.getProperty('plannedEndDate'), 'YYYY-MM-DD HH:mm:ss').valueOf();

                self.on('after:render', function() {
                    self.ui.$planedDate.datepicker('enable');
                    self.ui.$planedDate.datepicker('setDate', moment(beginDate).toDate());

                });

                self.consultantsFree.fetch({
                    data: {
                        filter: {
                            beginDate: beginDate,
                            actionType: actionType
                        }
                    }
                }).done(function() {
                    var consultant = self.consultantsFree.find(function(item) {
                        return item.get('doctor').id == executorId;
                    });
                    //console.log('self.consultantsFree', self.consultantsFree, consultant);

                    self.renderShedule(consultant);
                    self.consultantsFree._params = null;
                });

                self.render();

                self.newConsultation.on('change:actionTypeId', self.loadConsultants, self);
                self.newConsultation.on('changed:plannedEndDate', self.loadConsultants, self);

                self.newConsultation.on('change:plannedEndDate', function(){

                    console.log('change:plannedEndDate');
                }, self);

            });


            pubsub.on('consultation:selected', this.onConsultationSelect, this);
            pubsub.on('consultant:selected', this.onConsultantSelect, this);

            pubsub.on('date:selected', this.onChangePlanedDate, this);
            pubsub.on('person:changed', this.onChangeAssignPerson, this);
            // pubsub.on('time:selected', this.onChangePlanedTime, this);
            pubsub.on('time:selected', this.onTimeSelect, this);
            pubsub.on('time:unselected', this.onTimeUnselect, this);



        },


        //при выборе консультации
        onConsultationSelect: function(code) {

            var consultation = this.consultationsGroups.find(function(model) {
                return model.get('code') === code;
            });

            if (consultation) {
                this.newConsultation.set('actionTypeId', consultation.get('id'));
            }

        },

        //при выборе консультанта
        onConsultantSelect: function(executorId) {

            var consultant = this.consultantsFree.find(function(consultant) {
                return consultant.get('doctor').id === executorId;
            });
            this.newConsultation.set('executorId', executorId);
            this.renderShedule(consultant);
        },

        //при выборе даты
        onChangePlanedDate: function(date) {
            // console.log('onChangePlanedDate', date);
            var newDate = moment(date);
            var year = newDate.year();
            var month = newDate.month();
            var date = newDate.date();

            var plannedDate = moment(this.newConsultation.get('plannedEndDate'))
                .year(year).month(month).date(date).valueOf();

            this.newConsultation.set('plannedEndDate', plannedDate);
            this.newConsultation.trigger('changed:plannedEndDate')


        },


        //при выборе времени
        onTimeSelect: function(plannedTime) {

            var time = plannedTime.time;
            var hours = Math.floor(time / (60 * 60 * 1000));
            var minutes = Math.floor((time - hours * 60 * 60 * 1000) / (60 * 1000));
            var seconds = Math.floor((time - hours * 60 * 60 * 1000 - minutes * 60 * 1000) / 1000);
            var plannedEndDate = this.newConsultation.get('plannedEndDate');

            var plannedDate = moment(plannedEndDate)
                .hours(hours).minutes(minutes).seconds(seconds).valueOf();

            this.newConsultation.set('plannedEndDate', plannedDate);
            this.newConsultation.set('plannedTime', plannedTime);
        },

        onTimeUnselect: function() {
            var plannedEndDate = this.newConsultation.get('plannedEndDate');

            var plannedDate = moment(plannedEndDate)
                .hours(0).minutes(0).seconds(0).valueOf();

            this.newConsultation.set('plannedEndDate', plannedDate);
            this.newConsultation.set('plannedTime', null);
        },

        onChangeAssignDate: function() {
            var date = this.ui.$assignDate.val();
            var time = this.ui.$assignTime.val();
            var datetime = moment(date + ' ' + time, 'DD.MM.YYYY HH:mm').valueOf();

            this.newConsultation.set('createDateTime', datetime);
        },

        //при выборе вида оплаты
        onChangeFinance: function(e) {
            var $target = this.$(e.target);

            this.newConsultation.set('finance', {
                id: $target.val()
            });
        },

        onChangeUrgent: function(e) {
            var $target = this.$(e.target);
            this.newConsultation.set('urgent', $target.prop('checked'));
        },

        //при изменении 'Сверх сетки приёма'
        onChangeOver: function(e) {
            var $target = this.$(e.target);
            var over = $target.prop('checked');

            this.newConsultation.set('overQueue', over);

            if (over) {
                this.scheduleView.disable();
            } else {
                this.scheduleView.enable();
            }
        },

        //при изменении диагноза
        onChangeMKB: function(e) {
            var $target = this.$(e.target);
            var mkbId = $target.data('mkb-id');
            var mkbCode = $target.val();

            this.newConsultation.set('diagnosis', {'code': mkbCode});

            if (!mkbId) {
                this.newConsultation.set('diagnosis', {'code': ''});
            }

        },

        onChangeAssignPerson: function(assigner) {
            this.ui.$assignPerson.val(assigner.name.raw);

            this.newConsultation.set('assignerId', assigner.id);
        },

        openAssignerSelectPopup: function() {
            this.personDialogView = new PersonDialogView({
                title: 'Направивший врач',
                appeal: this.options.appeal
            });

            this.personDialogView.render().open();
        },

        //загрузка списка консультантов
        loadConsultants: function() {

            if (!this.newConsultation.get('plannedEndDate') || !this.newConsultation.get('actionTypeId')) {
                return false;
            }

            var beginDate = this.newConsultation.get('plannedEndDate');
            var actionType = this.newConsultation.get('actionTypeId');

            this.consultantsFree.fetch({
                data: {
                    filter: {
                        beginDate: beginDate,
                        actionType: actionType
                    }
                }
            });
        },
        //расписание приёма консультанта на определённый день
        renderShedule: function(consultant) {
            this.scheduleView.collection.reset(consultant.get('schedule').toJSON());
            this.scheduleView.render();
        },
        //при клике на кнопку 'Сохранить'
        onSave: function() {
            var self = this;
            console.log('onSave', this.newConsultation);

            this.newConsultation.save({}, {
                success: function() {

                    pubsub.trigger('noty', {
                        text: 'Направление сохранено',
                        type: 'success'
                    });
                    self.close();
                    pubsub.trigger('consultation:added', this.newConsultation);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    pubsub.trigger('noty', {
                        text: (JSON.parse(textStatus.responseText)).exception,
                        type: 'error'
                    });
                    self.close();
                    //pubsub.trigger('consultation:added', this.consultation);
                }
            });
        },
        //измение статуса кнопки 'Сохранить'
        updateSaveButton: function() {
            //console.log('updateSaveButton', this.consultation);
            /// if (this.consultation.get('plannedTime').time) {
            this.ui.$saveButton.button('enable');
            // } else {
            //    this.ui.$saveButton.button('disable');
            //}
        },

        render: function() {
            var self = this;

            this.ui = {};
            this.ui.$saveButton = this.$el.find('.save');
            //this.ui.$consultations = this.$el.find('#consultations');
            this.ui.$planedDate = this.$el.find('#datepicker');

            //this.ui.$saveButton.button('disable');
            this.ui.$finance = this.$el.find('#finance');
            //this.ui.$assignPerson = this.$el.find('#assign-person');
            this.ui.$assignDate = this.$el.find('#assign-date');
            this.ui.$assignTime = this.$el.find('#assign-time');
            this.ui.$assignPerson = this.$el.find('#assigner');

            this.ui.$urgent = this.$el.find('#urgent');
            this.$el.find('.change-assigner').button();

            //календарь
            this.ui.$planedDate.datepicker({
                minDate: 0,
                onSelect: function(dateText, inst) {
                    var timestamp = moment(dateText, 'DD.MM.YYYY').valueOf();
                    pubsub.trigger('date:selected', timestamp)

                }
            });
            this.ui.$planedDate.next('.icon-calendar').on('click', function() {
                this.ui.$planedDate.datepicker('show');
            });
            this.ui.$planedDate.datepicker('disable');


            //дата создания направления
            var assignDate = moment(this.newConsultation.get('createDateTime')).toDate();
            this.ui.$assignDate.datepicker({
                minDate: 0
            }).datepicker('setDate', assignDate)
                .addClass('Disabled')
                .prop('disabled', true);


            this.ui.$assignTime.timepicker();
            this.ui.$assignTime.timepicker('setTime', assignDate)
                .addClass('Disabled')
                .prop('disabled', true);

            //направительный диагноз
            this.renderNested(this.mkbInputView, '#mkb');

            if (this.consultation.getProperty('Направительный диагноз')) {
                var mkbId = this.consultation.getProperty('Направительный диагноз', 'valueId');
                var diagnosis = (this.consultation.getProperty('Направительный диагноз', 'value')).split(' ');
                var mkbCode = diagnosis[0];
                diagnosis.shift();
                var mkbDiagnosis = diagnosis.join(' ');


                //if (this.appealDiagnosis) {
                this.$('input[name="diagnosis[mkb][diagnosis]"]').val(mkbDiagnosis);
                this.$('input[name="diagnosis[mkb][code]"]').val(mkbCode);
                this.$('input[name="diagnosis[mkb][code]"]').data('mkb-id', mkbId);
                //}
            }

            if (this.newConsultation.get('urgent')) {
                this.ui.$urgent.prop('checked', true);
            }


            //список консультаций
            this.renderNested(this.consultationsGroupsView, '#consultations');
            //список консультантов
            this.renderNested(this.consultantsFreeView, '#consultants');
            //расписание на день
            this.scheduleView.setElement(this.$el.find('#schedule'));

            //вид оплаты
            this.financeSelect = new SelectView({
                collection: this.financeDictionary,
                el: this.ui.$finance,
                initSelection: (this.newConsultation.get('finance')).id
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

            this.$el.dialog('close');
            this.$el.remove();
        }

    }).mixin([popupMixin]);


});
