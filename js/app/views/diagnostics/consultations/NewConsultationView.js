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
	var PatientDiagnoses = require('views/appeal/edit/pages/monitoring/collections/PatientDiagnoses');



	return View.extend({
		template: tmpl,
		className: "popup",

		events: {
			'change #finance': 'onChangeFinance',
			'change input[name="diagnosis[mkb][code]"]': 'onMKBChange',
			//'change #assign-person': 'onChangeAssignPerson',
			'click #assigner-outer': 'openAssignerSelectPopup',
			'change #assign-date': 'onChangeAssignDate',
			'change #assign-time': 'onChangeAssignDate',
			'change #urgent': 'onChangeUrgent'

		},

		initialize: function(options) {
			// var self = this;
			//console.log('init new consultation view', this);
			_.bindAll(this);


            this.appealDiagnosis = new PatientDiagnoses(null,{
                appealId : this.options.appeal.get('id')
            });

			var appealDoctor = this.options.appeal.get('execPerson');
			// console.log('appealDoctor',appealDoctor)
			//"Направивший врач"
			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//юзер не врач
				this.assigner = {
					id: appealDoctor.id,
					name: {
						first: appealDoctor.name.first,
						last: appealDoctor.name.last,
						middle: appealDoctor.name.middle
					},
					id: appealDoctor.id
				};

			} else {
				//юзер врач

				this.assigner = {
					id: Core.Cookies.get("userId"),
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName"),
						middle: ''
					},
					id: Core.Cookies.get("userId")
				};
			}

			this.data = {
				'assigner': this.assigner
			};


			//список доступных консультаций
			this.consultationsGroups = new ConsultationsGroups({});
			this.consultationsGroupsView = new ConsultationsGroupsView({
				collection: this.consultationsGroups
			});
			this.consultationsGroups.fetch();

			//направление на консультацию
			this.consultation = new Consultation({});


			this.consultation.set('finance', {});
			this.consultation.get('finance').id = this.options.appeal.get('appealType').get('finance').get('id');
			this.consultation.set('eventId', this.options.appealId);
			this.consultation.eventId = this.options.appealId;
			this.consultation.set('patientId', this.options.appeal.get('patient').get('id'));
			this.consultation.set('createDateTime', moment().valueOf());
			//this.consultation.set('createPerson', this.assigner.id);
			this.consultation.set('assignerId', this.assigner.id);

			this.diagnosis = this.options.appeal.getDiagnosis();



			//список специалистов которые могут оказать консультацию
			this.consultantsFree = new ConsultantsFree();
			this.consultantsFreeView = new ConsultantsFreeView({
				collection: this.consultantsFree
			});

			pubsub.on('consultation:selected', this.onConsultationSelect, this);
			pubsub.on('consultant:selected', this.onConsultantSelect, this);
			pubsub.on('date:selected', this.onDateSelect, this);
			pubsub.on('time:selected', this.onTimeSelect, this);

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
			this.consultation.on('change:plannedTime', this.updateSaveButton, this);

			pubsub.on('assigner:changed', function(assigner) {
				// console.log('assign-person: changed', assigner);
				//this.consultation.set('createPerson', assigner.id)
				this.consultation.set('assignerId', assigner.id)

				this.ui.$assigner.val(assigner.name.raw);

			}, this);

		},

		//при выборе консультации
		onConsultationSelect: function(code) {
			// var consultation = this.consultationsGroups.find(function(model) {
			// 	return model.get('code') === code;
			// });



			var consultation;

			function findR(list) {


				_.each(list, function(model) {
					// console.log('list, model', code, model.code, list, model)
					if (model.code == code) {
						consultation = model;
					}

					if (model.groups && (model.groups.length > 0)) {
						findR(model.groups);
					}
				});

				if (consultation) {
					return consultation;
				} else {

				}

			}

			var consultation = findR(this.consultationsGroups.toJSON());

			//console.log('consultationId',consultation.id)

			this.consultation.set('actionTypeId', consultation.id);
			this.ui.$datepicker.datepicker('enable');
			var date = this.ui.$datepicker.datepicker("getDate");
			//console.log('date', date)
			var timestamp = moment(date).valueOf();
			this.consultation.set('plannedEndDate', timestamp);

			this.consultation.set('plannedTime', '');
			this.renderShedule();
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
		onDateSelect: function(date) {
			//console.log('onDateSelect', date);
			this.consultation.set('plannedEndDate', date);
		},

		//при выборе времени
		onTimeSelect: function(plannedTime) {
			//console.log('onTimeSelect', plannedTime);
			this.consultation.set('plannedTime', plannedTime);
		},
		onChangeAssignDate: function() {
			var date = this.ui.$assignDatepicker.val();
			var time = this.ui.$assignTimepicker.val();
			var datetime = moment(date + ' ' + time, 'DD.MM.YYYY HH:mm').valueOf()

			this.consultation.set('createDateTime', datetime);

		},

		//при выборе вида оплаты
		onChangeFinance: function(e) {
			var $target = this.$(e.target);

			this.consultation.get('finance').id = $target.val();
		},

		onChangeUrgent: function(e) {
			var $target = this.$(e.target);
			this.consultation.set('urgent', $target.prop('checked'));
		},

		//при изменении диагноза
		onMKBChange: function(e) {
			var $target = this.$(e.target);
			this.consultation.set('diagnosis', {})

			this.consultation.get('diagnosis').code = $target.val();
		},

		onChangeAssignPerson: function(e) {
			var $target = this.$(e.target);

			this.consultation.set('createPerson').code = $target.val();
			this.consultation.set('assignerId').code = $target.val();
			//assignerId
		},

		openAssignerSelectPopup: function() {
			//console.log('openDoctorSelectPopup');
			this.personDialogView = new PersonDialogView({
				title: 'Направивший врач',
				appeal: this.options.appeal,
				callback: function(person) {
					pubsub.trigger('assigner:changed', person);
				}
			});

			this.personDialogView.render().open();

		},

		//загрузка списка консультантов
		loadConsultants: function() {
			if (!this.consultation.get('plannedEndDate') || !this.consultation.get('actionTypeId')) {
				return false;
			}
			this.consultantsFree.setParams({
				'filter[beginDate]': this.consultation.get('plannedEndDate'),
				'filter[actionType]': this.consultation.get('actionTypeId')
			});
			this.consultantsFree.fetch();
		},
		//расписание приёма консультанта на определённый день
		renderShedule: function(consultant) {
			if (consultant) {
				this.scheduleView.collection.reset(consultant.get('schedule').toJSON());
			} else {
				this.scheduleView.collection.reset();
			}

			this.scheduleView.render();

		},
		//при клике на кнопку "Сохранить"
		onSave: function() {
			var self = this;
			//console.log('onSave', this.consultation);
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
			if (this.consultation.get('plannedTime').time) {
				this.ui.$saveButton.button("enable");
			} else {
				this.ui.$saveButton.button("disable");
			}
		},

		render: function() {
			var self = this;

			this.ui = {};
			this.ui.$saveButton = this.$el.closest(".ui-dialog").find('.save');
			//this.ui.$consultations = this.$el.find('#consultations');
			this.ui.$datepicker = this.$el.find('#datepicker');

			this.ui.$saveButton.button("disable");
			this.ui.$finance = this.$el.find('#finance');
			//this.ui.$assignPerson = this.$el.find('#assign-person');
			this.ui.$assignDatepicker = this.$el.find('#assign-date');
			this.ui.$assignTimepicker = this.$el.find('#assign-time');
			this.ui.$assigner = this.$el.find('#assigner');
			this.$el.find('.change-assigner').button();

			//календарь
			this.ui.$datepicker.datepicker({
				minDate: 0,
				onSelect: function(dateText, inst) {
					var timestamp = moment(dateText, 'DD.MM.YYYY').valueOf();
					pubsub.trigger('date:selected', timestamp)

				}
			});
			this.ui.$datepicker.datepicker('setDate', new Date());
			//this.ui.$datepicker.datepicker('disable');


			var createDate = moment(this.consultation.get('createDateTime')).toDate();
			this.ui.$assignDatepicker.datepicker({
				minDate: 0
			});

			this.ui.$assignDatepicker.datepicker('setDate', createDate)

			this.ui.$assignTimepicker.timepicker();
			this.ui.$assignTimepicker.timepicker('setTime', createDate);

			//диагнозы
			this.renderNested(this.mkbInputView, "#mkb");

			self.appealDiagnosis.fetch().done(function() {
				//установка диагноза
				// console.log('self.appealDiagnosis',self.appealDiagnosis.first())
				if ((self.appealDiagnosis.length > 0) && self.appealDiagnosis.first()) {
					var diagnosis = self.appealDiagnosis.first().get('mkb');
					self.consultation.set('diagnosis', {
						code: diagnosis.code
					});

					self.$("input[name='diagnosis[mkb][diagnosis]']").val(diagnosis.diagnosis);
					self.$("input[name='diagnosis[mkb][code]']").val(diagnosis.code);
					self.$("input[name='diagnosis[mkb][code]']").data('mkb-id', diagnosis.id);
				}

			});

			//список консультаций
			this.renderNested(this.consultationsGroupsView, "#consultations");
			//список консультантов
			this.renderNested(this.consultantsFreeView, "#consultants");
			//расписание на день
			this.scheduleView.setElement(this.$el.find("#schedule"));

			// //назначивший врач
			// this.assignPersonSelect = new SelectView({
			// 	collection: this.assignPersons,
			// 	el: this.ui.$assignPerson,
			// 	selectText: 'name.raw',
			// 	initSelection: Core.Cookies.get('userId')
			// });
			// this.depended(this.assignPersonSelect);

			//вид оплаты
			this.financeSelect = new SelectView({
				collection: this.financeDictionary,
				el: this.ui.$finance,
				initSelection: this.consultation.get('finance').id
			});
			this.depended(this.financeSelect);

			return this;
		},
		close: function() {
			console.log('popup view close');
			this.mkbInputView.close();
			this.consultationsGroupsView.close();
			this.consultantsFreeView.close();
			this.scheduleView.close();

			pubsub.off('consultation:selected');
			pubsub.off('consultant:selected');
			pubsub.off('date:selected');
			pubsub.off('time:selected');

			this.$el.dialog("close");
			this.$el.remove();
		}

	}).mixin([popupMixin]);


});
