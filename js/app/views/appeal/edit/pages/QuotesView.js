define(function(require) {

	var template = require('text!templates/appeal/edit/pages/quotes.html');

	var VmpTalon = require('models/VmpTalon');
	var QuotaType = require('models/QuotaType');
	var Treatment = require('models/Treatment');
	var PacientModel = require('models/PacientModel');

	var MkbInputView = require('views/ui/MkbInputView');


	return View.extend({
		ui: {},
		events: {
			"change input[name='diagnosis[mkb][code]']": "setDiagnosis",
			"change #quota-type": "setQuotaType",
			"change #pacient-model": "setPacientModel",
			"change #treatment": "setTreatment"
		},
		setDiagnosis: function() {
			var mbkCode = this.ui.$mbkCode.val();
			var mbkId = this.ui.$mbkCode.data('mkb-id');
			var mbkDiagnosis = this.ui.$mbkDiagnosis.val();

			this.vmpTalon.set('MKB', mbkCode);
			this.vmpTalon.set('mkbId', mbkId);

		},
		setQuotaType: function() {
			var quotaType_id = this.ui.$quotaType.val();
			console.log('setQuotaType', quotaType_id, arguments);

			if (quotaType_id != '...') {
				this.vmpTalon.set('quotaType_id', quotaType_id);
			} else {
				this.vmpTalon.set('quotaType_id', '');
			}


			//this.ui.$quotaType
		},
		setPacientModel: function() {
			var pacientModel_id = this.ui.$pacientModel.val();
			console.log('setPacientModel', pacientModel_id, arguments);

			if (pacientModel_id != '...') {
				this.vmpTalon.set('pacientModel_id', pacientModel_id);
			} else {
				this.vmpTalon.set('pacientModel_id', '');
			}

		},
		setTreatment: function() {
			var treatment_id = this.ui.$treatment.val();
			console.log('setTreatment', treatment_id, arguments);

			if (treatment_id != '...') {
				this.vmpTalon.set('treatment_id', treatment_id);
			} else {
				this.vmpTalon.set('treatment_id', '');
			}

		},
		onChangeMkbId: function(model, mkbId) {
			console.log('onChangeMkbId', model, mkbId);
			//фильтрация по диагнозу
			this.quotaType.fetch({
				data: {
					mkbId: mkbId
				}
			});

			//this.ui.$pacientModel.select2('val', '').select2('disable');

		},
		onChangeQuotaTypeId: function(model, quotaTypeId) {
			console.log('onChangeQuotaTypeId', arguments);
			var html = '';
			if (quotaTypeId != '') {
				html = this.quotaType.get(quotaTypeId).get('name');

				this.pacientModel.fetch({
					data: {
						quotaTypeId: quotaTypeId
					}
				});
			}

			this.ui.$quotaTypeName.html(html);



			this.ui.$pacientModel.select2('val', '').select2('disable');

		},
		onChangeTreatment: function(model, treatment_id) {

			var html = '';
			if (treatment_id != '') {
				console.log('onChangeTreatment treatment_id', treatment_id);
				html = this.treatment.get(treatment_id).get('name');
			}


			this.ui.$treatmentName.html(html);

		},
		onChangePacientModelId: function(moddel, pacientModel_id) {
			console.log('onChangePacientModelId', arguments);

			var html = '';
			if (pacientModel_id != '') {
				html = this.pacientModel.get(pacientModel_id).get('name');
			}

			this.ui.$pacientModelName.html(html);

		},
		initialize: function() {
			var self = this;
			//вмп талон
			this.vmpTalon = new VmpTalon();
			this.vmpTalon.appealId = this.options.appeal.get('id');
			this.vmpTalon.on('change:mkbId', this.onChangeMkbId, this);
			this.vmpTalon.on('change:quotaType_id', this.onChangeQuotaTypeId, this);
			this.vmpTalon.on('change:pacientModel_id', this.onChangePacientModelId, this);
			this.vmpTalon.on('change:treatment_id', this.onChangeTreatment, this);
			//pacientModel_id

			//код вида вмп
			this.quotaType = new QuotaType();
			this.quotaType.on('change reset', this.renderQuotaTypeSelect, this);

			//модель пациента
			this.pacientModel = new PacientModel();
			this.pacientModel.on('change reset', this.renderPacientModelSelect, this);


			//лечение
			this.treatment = new Treatment();
			this.treatment.on('change reset', this.renderTreatmentSelect, this);



			//this.vmpTalon.on('change',this.getQuotaType, this)
			this.vmpTalon.fetch().done(function(model) {
				console.log('vmptalon', self.vmpTalon.attributes);

				self.render2();

				if (_.isEmpty(self.vmpTalon.attributes)) {



					// $.when(self.getQuotaType(), , self.getPacientModel())
					// 	.done(function() {
					// 	self.renderQuotaTypeSelect();
					// 	self.renderPacientModelSelect();

					// });

					self.getTreatment()
					self.renderMKB();
					//self.renderTreatmentSelect();
					//self.renderQuotaTypeSelect();
					//self.renderPacientModelSelect();

				}



			});

		},
		renderMKB: function() {
			//инпут классификатора диагнозов
			this.mkbInputView = new MkbInputView();
			this.renderNested(this.mkbInputView, ".mkb");

			this.ui.$mbkCode = this.$("input[name='diagnosis[mkb][code]']");
			this.ui.$mbkDiagnosis = this.$("input[name='diagnosis[mkb][diagnosis]']");



		},
		renderQuotaTypeSelect: function() {
			console.log('renderQuotaTypeSelect', this.quotaType.length)
			$('#quota-type-error,#quota-type-name').html('');

			if (this.quotaType.length === 0) {
				this.ui.$quotaType.select2().select2('val', '').select2('disable');
				$('#quota-type-error').html('Кода вида ВМП для диагноза нет! Измените диагноз')

			} else {

				this.ui.$quotaType.html('<option val="">...</option>')

				this.quotaType.each(function(item) {

					this.ui.$quotaType.append($("<option/>", {
						"text": item.get('code'),
						"value": item.get('id')
					})).select2().css({
						'width': '50%'
					});
				}, this);

				this.ui.$quotaType.trigger('change');

			}
		},
		renderPacientModelSelect: function() {
			console.log('renderPacientModelSelect', arguments);

			this.ui.$pacientModel.html('<option val="">...</option>');

			this.pacientModel.each(function(item) {

				this.ui.$pacientModel.append($("<option/>", {
					"text": item.get('name'),
					"value": item.get('id')
				})).select2().css({
					'width': '50%'
				});
			}, this);

			this.ui.$pacientModel.trigger('change');

		},

		renderTreatmentSelect: function() {
			console.log('renderTreatmentSelect', arguments);

			this.ui.$treatment.html('<option val="">...</option>');

			this.treatment.each(function(item) {
				this.ui.$treatment.append($("<option/>", {
					"text": item.get('name'),
					"value": item.get('id')
				})).select2().css({
					'width': '50%'
				});
			}, this);

			this.ui.$treatment.trigger('change');

		},
		getQuotaType: function() {
			return this.quotaType.fetch()
		},
		getTreatment: function() {
			return this.treatment.fetch()
		},
		getPacientModel: function() {
			return this.pacientModel.fetch()
		},
		render2: function() {
			console.log(this.vmpTalon.toJSON())
			this.$el.html(_.template(template, this.vmpTalon.toJSON(), {
				variable: 'data'
			}));
			this.ui.$quotaType = this.$('#quota-type');
			this.ui.$quotaTypeName = this.$('#quota-type-name');
			this.ui.$pacientModel = this.$('#pacient-model');
			this.ui.$pacientModelName = this.$('#pacient-model-name');
			this.ui.$treatment = this.$('#treatment');
			this.ui.$treatmentName = this.$('#treatment-name');


			return this;
		},

		renderNested: function(view, selector) {
			console.log('renderNested', view, selector)
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			return this;
		}

	});


});
