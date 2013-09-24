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

			this.appeal = this.options.appeal;
			this.appealId = this.options.appealId;

			var financeId = this.appeal.get('appealType').get('finance').get('id');
			var eventId = this.appealId;
			var patientId = this.appeal.get('patient').get('id');
			var assignerId = this.getAssigner().id;


			this.appealDiagnosis = new PatientDiagnoses(null, {
				appealId: eventId
			});



			//список доступных консультаций
			this.consultationsGroups = new ConsultationsGroups({});
			this.consultationsGroupsView = new ConsultationsGroupsView({
				collection: this.consultationsGroups
			});
			this.consultationsGroups.fetch();

			//направление на консультацию
			this.consultation = new Consultation({
				finance: {
					id: financeId
				},
				eventId: eventId,
				patientId: patientId,
				assignerId: assignerId,
				createDateTime: moment().valueOf()
			});

			this.consultation.eventId = eventId;

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
			this.consultation.on('change:plannedTime', this.validateForm, this);

			pubsub.on('assigner:changed', function(assigner) {
				this.consultation.set('assignerId', assigner.id)
				this.ui.$assigner.val(assigner.name.raw);
			}, this);

		},

		getAssigner: function() {
			var assigner;
			var appealDoctor = this.appeal.get('execPerson');

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//юзер не врач
				assigner = {
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
				assigner = {
					id: Core.Cookies.get("userId"),
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName"),
						middle: ''
					},
					id: Core.Cookies.get("userId")
				};
			}

			return assigner;
		},

		data: function() {
			return {
				'assigner': this.getAssigner()
			}
		},

		//при выборе консультации
		onConsultationSelect: function(code) {
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

			this.ui.$datepicker.datepicker('enable');
			var date = this.ui.$datepicker.datepicker("getDate");
			var timestamp = moment(date).valueOf();

			this.consultation.set({
				'actionTypeId': consultation.id,
				'plannedEndDate': timestamp,
				'plannedTime': ''
			});

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
						text: 'Ошибка при создании направления',//(JSON.parse(textStatus.responseText)).exception,
						type: 'error'
					});
					self.close();
					pubsub.trigger('consultation:added', this.consultation);
				}
			});
		},
		//измение статуса кнопки "Сохранить"
		validateForm: function() {
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
			this.ui.$datepicker.next('.icon-calendar').on('click', function() {
				self.ui.$datepicker.datepicker('show');
			});

			var createDate = moment(this.consultation.get('createDateTime')).toDate();
			this.ui.$assignDatepicker.datepicker({
				minDate: 0
			});

			this.ui.$assignDatepicker.datepicker('setDate', createDate)
			this.ui.$assignDatepicker.next('.icon-calendar').on('click', function() {
				self.ui.$assignDatepicker.datepicker('show');
			});

			this.ui.$assignTimepicker.timepicker();
			this.ui.$assignTimepicker.timepicker('setTime', createDate);

			//диагнозы
			this.renderNested(this.mkbInputView, "#mkb");

			self.appealDiagnosis.fetch().done(function() {
				//установка диагноза
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
