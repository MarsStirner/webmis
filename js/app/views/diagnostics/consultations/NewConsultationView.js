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
			'change input[name="diagnosis[mkb][code]"]': 'onMKBChange',
			//'change #assign-person': 'onChangeAssignPerson',
			'click #doctor-outer': 'openDoctorSelectPopup',
			//'change #assign-date': 'onChangeAssignDate',
			//'change #assign-time': 'onChangeAssignDate'

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
			this.consultation = new Consultation({});


			this.consultation.set('finance', {});
			this.consultation.get('finance').id = this.options.appeal.get('appealType').get('finance').get('id');
			this.consultation.set('eventId', this.options.appealId);
			this.consultation.eventId = this.options.appealId;
			this.consultation.set('patientId', this.options.appeal.get('patient').get('id'));
			//this.consultation.set('assessmentDate', moment().format('YYYY-MM-DD HH:mm:ss'));



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

			pubsub.on('person:changed', function(doctor) {
				console.log('assign-person: changed', doctor);
				//this.consultation.set('assignerId', doctor.id)

				this.ui.$doctor.val(doctor.name.raw);

			}, this);

		},

		//при выборе консультации
		onConsultationSelect: function(code) {
			var consultation = this.consultationsGroups.find(function(model) {
				return model.get('code') === code;
			})

			this.consultation.set('actionTypeId', consultation.get('id'));
			this.ui.$datepicker.datepicker('enable');
			var date = this.ui.$datepicker.datepicker("getDate");
			console.log('date', date)
			var timestamp = moment(date).valueOf();
			this.consultation.set('plannedEndDate', timestamp);
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
			console.log('onDateSelect', date);
			this.consultation.set('plannedEndDate', date);
		},

		//при выборе времени
		onTimeSelect: function(plannedTime) {
			console.log('onTimeSelect', plannedTime);
			this.consultation.set('plannedTime', plannedTime);
		},
		onChangeAssignDate: function() {
			var date = this.ui.$assignDatepicker.val();
			var time = this.ui.$assignTimepicker.val();
			var datetime = moment(date + ' ' + time, 'DD.MM.YYYY HH:mm').format('YYYY-MM-DD HH:mm:ss')

			this.consultation.set('assessmentDate', datetime);

		},

		//при выборе вида оплаты
		onChangeFinance: function(e) {
			var $target = this.$(e.target);

			this.consultation.get('finance').id = $target.val();
		},

		//при изменении диагноза
		onMKBChange: function(e) {
			var $target = this.$(e.target);
			this.consultation.set('diagnosis', {})

			this.consultation.get('diagnosis').code = $target.val();
		},

		onChangeAssignPerson: function(e) {
			var $target = this.$(e.target);

			this.consultation.set('assignPersonId').code = $target.val();
		},

		openDoctorSelectPopup: function() {
			console.log('openDoctorSelectPopup');
			this.personDialogView = new PersonDialogView({
				appeal: this.options.appeal
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
			this.ui.$assignPerson = this.$el.find('#assign-person');
			this.ui.$assignDatepicker = this.$el.find('#assign-date');
			this.ui.$assignTimepicker = this.$el.find('#assign-time');
			this.ui.$doctor = this.$el.find('#doctor');

			//календарь
			this.ui.$datepicker.datepicker({
				minDate: 0,
				onSelect: function(dateText, inst) {
					var timestamp = moment(dateText, 'DD.MM.YYYY').valueOf();
					pubsub.trigger('date:selected', timestamp)

				}
			});
			this.ui.$datepicker.datepicker('disable');

			this.ui.$assignDatepicker.datepicker({
				minDate: 0
			});
			this.ui.$assignDatepicker.datepicker('setDate', new Date())

			this.ui.$assignTimepicker.timepicker();
			this.ui.$assignTimepicker.timepicker('setTime', new Date());

			//диагнозы
			this.renderNested(this.mkbInputView, "#mkb");
			if (this.appealDiagnosis) {
				this.$("input[name='diagnosis[mkb][diagnosis]']").val(this.appealDiagnosis.get('mkb').get('diagnosis'));
				this.$("input[name='diagnosis[mkb][code]']").val(this.appealDiagnosis.get('mkb').get('code'));
				this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', this.appealDiagnosis.get('mkb').get('id'));
			}

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

			this.$el.dialog("close");
			this.$el.remove();
		}

	}).mixin([popupMixin]);


});
