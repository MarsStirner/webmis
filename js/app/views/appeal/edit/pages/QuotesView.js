define(function(require) {

	var template = require('text!templates/appeal/edit/pages/quotes.html');

	var VmpTalon = require('models/VmpTalon');
	var VmpTalonPrev = require('models/VmpTalonPrev');
	var QuotaType = require('models/QuotaType');
	var Treatment = require('models/Treatment');
	var PacientModel = require('models/PacientModel');

	var MkbInputView = require('views/ui/MkbInputView');


	return View.extend({
		ui: {},
		events: {
			"change input[name='diagnosis[mkb][diagnosis]']": "setDiagnosis",
			"change input[name='diagnosis[mkb][code]']": "setMkbCode",
			"change [name='diagnosis[mkb][code]']": "setMkbId",

			"change #quota-type": "setQuotaType",
			"change #pacient-model": "setPacientModel",
			"change #treatment": "setTreatment",
			"click .save": "onSave",
			"click .copy": "onCopy"
		},
		initialize: function() {
			var self = this;

			//код вида вмп
			this.quotaType = new QuotaType();
			//модель пациента
			this.pacientModel = new PacientModel();
			//лечение
			this.treatment = new Treatment();

			//вмп талон
			this.vmpTalon = new VmpTalon();
			this.vmpTalon.appealId = this.options.appeal.get('id');
			this.vmpTalon.on('all', function() {
				console.log('all', arguments)
			}, this);
			this.vmpTalon.on('change', this.validate, this);

			this.vmpTalon.on('change:mkbId', this.onChangeMkbId, this);
			this.vmpTalon.on('change:MKB', this.onChangeMkbCode, this);
			this.vmpTalon.on('change:DiagName', this.onChangeDiagName, this);

			this.vmpTalon.on('change:quotaType_id', this.onChangeQuotaTypeId, this);
			this.vmpTalon.on('change:pacientModel_id', this.onChangePacientModelId, this);
			this.vmpTalon.on('change:treatment_id', this.onChangeTreatment, this);

			this.vmpTalonPrev = new VmpTalonPrev();
			this.vmpTalonPrev.appealId = this.options.appeal.get('id');



			this.quotaType.on('change reset', this.renderQuotaTypeSelect, this);
			this.pacientModel.on('change reset', this.renderPacientModelSelect, this);
			this.treatment.on('change reset', this.renderTreatmentSelect, this);

			self.getTreatment()

			//this.vmpTalon.on('change',this.getQuotaType, this)
			this.vmpTalon.fetch().done(function(model) {});

		},
		setDiagnosis: function() {
			var mkbDiagName = this.ui.$mkbDiagnosis.val();
			this.vmpTalon.set('DiagName', mkbDiagName);
			console.log('setDiagnosis', this.vmpTalon)
		},
		setMkbId: function() {

			var mkbId = this.ui.$mkbCode.data('mkb-id');
			this.vmpTalon.set('mkbId', mkbId);
			console.log('setMkbId', this.vmpTalon)
		},
		setMkbCode: function() {
			var mkbCode = this.ui.$mkbCode.val();
			this.vmpTalon.set('MKB', mkbCode);

			if (mkbCode = '') {
				this.vmpTalon.set('quotaType_id', '');
				this.vmpTalon.set('pacientModel_id', '');
			}

			console.log('setMkbCode', this.vmpTalon)

		},
		onChangeDiagName: function(model, diagName) {
			this.ui.$mkbDiagnosis.val(diagName)
		},
		onChangeMkbCode: function(model, mkbCode) {
			console.log('onChangeMkbCode', model, mkbCode);
			this.ui.$mkbCode.val(mkbCode);
		},
		onChangeMkbId: function(model, mkbId) {
			console.log('onChangeMkbId', model, mkbId);
			this.ui.$mkbCode.data('mkb-id', mkbId);
			//фильтрация по диагнозу
			this.quotaType.fetch({
				data: {
					mkbId: mkbId
				}
			});

		},

		setQuotaType: function() {
			var quotaType_id = this.ui.$quotaType.val();
			var prevQuotaTypeId = this.vmpTalon.get('quotaType_id');
			console.log('setQuotaType', quotaType_id, arguments);

			if ((quotaType_id === '...') && (quotaType_id != prevQuotaTypeId)) {
				this.vmpTalon.set('quotaType_id', '');
				this.vmpTalon.set('pacientModel_id', '');
			} else {
				this.vmpTalon.set('quotaType_id', quotaType_id);
			}
		},

		onChangeQuotaTypeId: function(model, quotaTypeId) {
			console.log('onChangeQuotaTypeId', arguments);
			//текст
			var html = '';
			if (quotaTypeId != '') {
				var quotaModel = this.quotaType.get(quotaTypeId);
				if (quotaModel) {
					html = this.quotaType.get(quotaTypeId).get('name');
				}

				//селект кода вида вмп
				this.ui.$quotaType.select2('val', quotaTypeId);

				//фильтрация справочника "модель пациента" по виду вмп
				this.pacientModel.fetch({
					data: {
						quotaTypeId: quotaTypeId
					}
				});

			} else {
				//если не выбран код вмп, то селект "модель пациента" недоступен
				this.ui.$pacientModel.select2('val', '').select2('disable');

			}

			this.ui.$quotaTypeName.html(html);



		},


		setPacientModel: function() {
			var pacientModel_id = this.ui.$pacientModel.val();
			console.log('setPacientModel', pacientModel_id, arguments);

			if (pacientModel_id === '...') {
				this.vmpTalon.set('pacientModel_id', '');
			} else {
				this.vmpTalon.set('pacientModel_id', pacientModel_id);
			}

		},

		onChangePacientModelId: function(moddel, pacientModel_id) {
			console.log('onChangePacientModelId', arguments);

			var html = '';
			if (pacientModel_id != '') {
				var pacientModelModel = this.pacientModel.get(pacientModel_id);
				if (pacientModelModel) {
					html = this.pacientModel.get(pacientModel_id).get('name');
				}

			} else {
				this.ui.$pacientModelName.html('');

			}

			this.ui.$pacientModelName.html(html);

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


		onChangeTreatment: function(model, treatment_id) {

			var html = '';
			if (treatment_id != '') {
				var treatmentModel = this.treatment.get(treatment_id);

				if (treatmentModel) {
					html = this.treatment.get(treatment_id).get('name');
				}

			}

			this.ui.$treatment.select2('val', treatment_id);
			this.ui.$treatmentName.html(html);

		},

		validate: function() {
			var talon = this.vmpTalon;
			console.log('validate', talon.toJSON());

			if (talon.get('MKB') && talon.get('quotaType_id') && talon.get('pacientModel_id') && talon.get('treatment_id')) {
				this.ui.$save.button('enable');
			} else {
				this.ui.$save.button('disable');
			}


			if(!talon.get('quotaType_id')){
				this.ui.$pacientModel.select2('val', '').select2('disable');
			}


		},
		renderMKB: function() {
			//инпут классификатора диагнозов
			this.mkbInputView = new MkbInputView();
			this.renderNested(this.mkbInputView, ".mkb");

			this.ui.$mkbCode = this.$("input[name='diagnosis[mkb][code]']");
			this.ui.$mkbDiagnosis = this.$("input[name='diagnosis[mkb][diagnosis]']");

		},
		renderQuotaTypeSelect: function() {
			console.log('renderQuotaTypeSelect', this.quotaType.length)
			$('#quota-type-error,#quota-type-name').html('');
			this.ui.$quotaType.html('<option val="">...</option>');


			if (this.quotaType.length === 0) {
				this.ui.$quotaType.select2().select2('val', '').select2('disable');
				$('#quota-type-error').html('Кода вида ВМП для диагноза нет! Измените диагноз')

			} else {

				this.quotaType.each(function(item) {

					this.ui.$quotaType.append($("<option/>", {
						"text": item.get('code'),
						"value": item.get('id')
					})).select2().css({
						'width': '100%'
					});
				}, this);

				this.ui.$quotaType.trigger('change');

			}
		},
		renderPacientModelSelect: function() {
			console.log('renderPacientModelSelect', arguments);

			this.ui.$pacientModel.html('<option val="">...</option>');

			if (this.pacientModel.length === 0) {
				this.ui.$pacientModel.select2().select2('val', '').select2('disable');

			} else {
				this.pacientModel.each(function(item) {

					this.ui.$pacientModel.append($("<option/>", {
						"text": item.get('name'),
						"value": item.get('id')
					})).select2().css({
						'width': '100%'
					});
				}, this);
			}



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
					'width': '100%'
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
			var self = this;
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
			this.ui.$save = this.$('.save');
			this.ui.$cancel = this.$('.cancel');
			this.ui.$copy = this.$('.copy');

			this.ui.$save.button().button('disable');
			this.ui.$cancel.button();
			this.ui.$copy.button({
				icons: {
					primary: 'icon-copy'
				}
			});


			self.renderQuotaTypeSelect();
			self.renderPacientModelSelect();
			self.renderTreatmentSelect();
			self.renderMKB();


			this.vmpTalonPrev.fetch().done(function() {
				//console.log('this.vmpTalonPrev',self.vmpTalonPrev);
				if (_.isEmpty(self.vmpTalonPrev.attributes)) {
					self.ui.$copy.button('disable');
				}

			});



			return this;
		},

		renderNested: function(view, selector) {
			console.log('renderNested', view, selector)
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			this.render2();
			return this;
		},

		onSave: function() {
			var self = this;
			console.log('onSave', this.vmpTalon);
			this.ui.$save.button("option", "label", 'Сохраняем...').button("disable");

			this.vmpTalon.save({}, {
				success: function() {

					self.ui.$save.button("option", "label", 'Сохранить').button("enable");
					pubsub.trigger('noty', {
						text: 'ВМП талон сохранён',
						type: 'success'
					});

				}
			});
		},
		fillForm: function(opt) {
			console.log('fillForm', opt.model.toJSON());

			this.vmpTalon.set('MKB', opt.model.get('MKB'));
			this.vmpTalon.set('mkbId', opt.model.get('mkbId'));
			this.vmpTalon.trigger('change:mkbId', this.vmpTalon, opt.model.get('mkbId'));
			this.$("input[name='diagnosis[mkb][diagnosis]']").val(opt.model.get('DiagName'));
			this.$("input[name='diagnosis[mkb][code]']").val(opt.model.get('MKB'));
			this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', opt.model.get('mkbId'));
			if (opt.disable) {
				this.mkbInputView.disable();
			}


			function fillQuotaTypeSelect() {
				console.log('fillForm fillQuotaTypeSelect', opt.model);
				this.ui.$quotaType.select2('val', opt.model.get('quotaType_id')).trigger('change');

				if (opt.disable) {
					this.ui.$quotaType.select2('disable');
				}

				this.quotaType.off('reset', fillQuotaTypeSelect);
			}

			function fillPacientModelSelect() {
				console.log('fillForm fillPacientModelSelect', opt.model);
				this.ui.$pacientModel.select2('val', opt.model.get('pacientModel_id')).trigger('change');

				if (opt.disable) {
					this.ui.$pacientModel.select2('disable');
				}

				this.pacientModel.off('reset', fillPacientModelSelect);

			}

			this.ui.$treatment.select2('val', opt.model.get('treatment_id')).trigger('change');

			if (opt.disable) {
				this.ui.$treatment.select2('disable');
			}

			this.quotaType.on('reset', fillQuotaTypeSelect, this);
			this.pacientModel.on('reset', fillPacientModelSelect, this);
		},
		onCopy: function() {
			this.fillForm({
				model: this.vmpTalonPrev,
				disable: true
			});
		}

	});


});
