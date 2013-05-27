/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(function(require) {

	var popupMixin = require('mixins/PopupMixin');
	var tmpl = require('text!templates/diagnostics/consultations/consultation-popup.html');

	var MkbInputView = require('views/ui/MkbInputView');
	var SelectView = require('views/ui/SelectView');
	require('collections/doctors');

	var ConsultationsGroups = require('collections/diagnostics/consultations/ConsultationsGroups');
	var ConsultationsGroupsView = require('views/consultations/ConsultationsGroupsView');

	var ConsultantsFree = require('collections/doctors-free');
	var ConsultantsFreeView = require('views/consultations/ConsultantsFreeView');
	var ScheduleView = require('views/consultations/ScheduleView');

	var Consultation = require('models/diagnostics/consultations/Consultation');

	//require('collections/departments');
	//require('collections/dictionary-values');

	return View.extend({
		template: tmpl,
		className: "popup",

		events: {

		},

		initialize: function(options) {
			var self = this;
			console.log('init new consultation view', this);
			_.bindAll(this);


			//список "Направивший врач"
			this.assignPersons = new App.Collections.Doctors();
			this.assignPersons.on("reset", this.onPersonsLoaded, this);
			this.assignPersons.setParams({
				limit: 0
			});
			this.assignPersons.fetch();

			//список доступных консультаций
			this.consultationsGroups = new ConsultationsGroups({});
			this.consultationsGroupsView = new ConsultationsGroupsView({
				collection: this.consultationsGroups
			});
			this.consultationsGroups.fetch();

			//направление на консультацию
			this.consultation = new Consultation({});
			this.consultation.patientId = this.options.appeal.get('patient').get('id');
			//this.consultation.set('eventId',this.options.appealId) = this.options.appealId;
			this.consultation.set({
				'patientId': this.options.appeal.get('patient').get('id')
			}, {
				validate: false
			});

			this.consultation.on('reset', function() {
				console.log('consultation reset', this.consultation);
			});

			this.consultation.on('change', this.updateSaveButton, this);

			//список специалистов которые могут оказать консультацию
			this.consultantsFree = new ConsultantsFree();
			this.consultantsFreeView = new ConsultantsFreeView({
				collection: this.consultantsFree
			});

			pubsub.on('consultation:click', function(code) {
				console.log('consultation:click', code);
				self.loadConsultation(code);
			});

			pubsub.on('consultant:selected', function(consultantId) {
				console.log('consultant:selected', consultantId);
				var consultant = self.consultantsFree.find(function(consultant) {
					return consultant.get('doctor').id === consultantId;
				});
				self.consultation.set({
					'executorId': consultantId
				}, {
					validate: false
				});
				self.renderShedule(consultant);
			});

			pubsub.on('date:selected', function(date) {
				console.log('date:selected', date);
				self.consultation.set({
					'plannedEndDate': date
				}, {
					validate: false
				});
				self.onDateSelect(date);
			});

			pubsub.on('time:selected', function(time) {
				console.log('timeSelected', time);
				self.consultation.set({'plannedTime': {
					//"id": 7192189,
					//"index": 6,
					"time": time
				}}, {
					validate: false
				});
			});

			//классификатор диагнозов
			this.mkbInputView = new MkbInputView();
			this.depended(this.mkbInputView);

			//список видов оплаты
			this.financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			this.scheduleView = new ScheduleView();

		},

		onDateSelect: function(date) {
			this.consultantsFree.setParams({
				'filter[beginDate]': date
			});
			this.consultantsFree.fetch();

		},
		loadConsultation: function(code) {
			var self = this;
			console.log('loadConsultation', this.consultation);
			this.consultation.code = code;
			//self.consultation.save();
			// this.consultation.fetch({
			// 	success: function() {
			// 		console.log('loadConsultation success',self.consultation);
			// 		self.consultation.unset('id');

			// 		self.consultation.save();
			// 	},
			// 	error: function() {
			// 		console.log('loadConsultation error');
			// 	}
			// });
		},


		renderShedule: function(consultant) {
			console.log('renderShedule', consultant);
			this.scheduleView.collection.reset(consultant.get('schedule').toJSON());
			this.scheduleView.render();
		},
		onSave: function() {
			console.log('onSave', this.consultation);
			this.consultation.save();
		},
		updateSaveButton: function() {
			if (this.consultation.isValid()) {
				this.ui.$saveButton.button("enable");
			} else {
				console.log('validation', this.consultation.validationError);
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


			this.ui.$datepicker.datepicker({
				minDate: 0,
				onSelect: function(dateText, inst) {
					var timestamp = moment(dateText, 'DD.MM.YYYY').valueOf();
					pubsub.trigger('date:selected', timestamp)

				}
			});

			this.renderNested(this.mkbInputView, "#mkb");
			this.renderNested(this.consultationsGroupsView, "#consultations");
			this.renderNested(this.consultantsFreeView, "#consultants");
			this.scheduleView.setElement(this.$el.find("#schedule"));

			this.assignPersonSelect = new SelectView({
				collection: this.assignPersons,
				el: this.$('#assign-person'),
				selectText: 'name.raw'
			});
			this.depended(this.assignPersonSelect);


			this.financeSelect = new SelectView({
				collection: this.financeDictionary,
				el: this.$('#finance')
			});
			this.depended(this.financeSelect);


			return this;
		},

	}).mixin([popupMixin]);


});
