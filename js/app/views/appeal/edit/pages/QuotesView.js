define(function(require) {

	var template = require('text!templates/appeal/edit/pages/quotes.html');
	var rSelectTemplate = require('text!templates/ui/rselect.html');
	var VmpTalon = require('models/VmpTalon');
	var VmpTalonPrev = require('models/VmpTalonPrev');
	var QuotaType = require('models/QuotaType');
	var Treatment = require('models/Treatment');
	var PacientModel = require('models/PacientModel');
	var MkbInputView = require('views/ui/MkbInputView');

	var RSelectView = Backbone.View.extend({
		template: _.template(rSelectTemplate),
		events: {
			"change select": "onSelect"
		},

		initialize: function() {
			this.options.options.on('reset', this.render, this);
			this.options.options.on('reset', function() {
				if (this.options.options.length === 0) {
					this.options.model.set(this.options.selectedProperty, '')
				}
			}, this);
		},

		select: function(model) {
			var selected = this.options.model.get(this.options.selectedProperty);
			this.ui.$select.select2('val', selected);
		},

		disable: function() {
			this.ui.$select.select2('disable');
		},

		onSelect: function(event) {
			var $option = this.$('option:selected', this.ui.$select);
			var text = $option.text();
			var val = $option.val();

			if (text === '...') {
				text = '';
				val = '';
			}

			this.options.model.set(this.options.selectedProperty, val)
			this.ui.$text.html(text);
		},

		data: function() {
			var selected = this.options.model.get(this.options.selectedProperty);
			var text = this.options.options.get(selected) && this.options.options.get(selected).get('name');

			var data = {
				label: this.options.label,
				options: this.options.options.toJSON(),
				selected: selected,
				text: text
			}
			return data;
		},

		render: function() {
			var view = this;
			view.$el.html(view.template(view.data()));

			view.ui = {};
			view.ui.$select = view.$el.find('.select');
			view.ui.$text = view.$el.find('.text');

			view.ui.$select.select2().select2('enable');
			if (this.options.options.length == 0) {
				view.ui.$select.select2('disable');
			}

			this.options.model.on('change:' + this.options.selectedProperty, this.select, this)

			return view;
		}
	});


	return Backbone.View.extend({
		ui: {},
		events: {
			"change input[name='diagnosis[mkb][diagnosis]']": "onChangeDiagNameInput",
			"change input[name='diagnosis[mkb][code]']": "onChangeMkbCodeInput",
			"change [name='diagnosis[mkb][code]']": "onChangeMkbIdInput",
			"click .cancel": "onCancel",
			"click .save": "onSave",
			"click .copy": "onCopy"
		},
		initialize: function() {
			var self = this;

			//вмп талон
			this.vmpTalon = new VmpTalon();
			this.vmpTalon.appealId = this.options.appeal.get('id');
			this.vmpTalon.on('change', function(){
				if (this.validate()) {
					this.ui.$save.button('enable');
				} else {
					this.ui.$save.button('disable');
					this.ui.$copy.button('enable');
				}
			}, this);


			//инпут классификатора диагнозов
			this.mkbInputView = new MkbInputView();

			//код вида вмп
			this.quotaType = new QuotaType();
			this.quotaType.appealId = this.options.appeal.get('id');
			this.quotaTypeView = new RSelectView({
				label: 'Код вида ВМП',
				options: this.quotaType,
				model: this.vmpTalon,
				selectedProperty: 'quotaType_id'
			});

			this.quotaType.on('reset', function() {
				var $warning = this.$('#quota-type-error');

				if (this.quotaType.length === 0) {
					$warning.html('Кода вида ВМП для диагноза нет! Измените диагноз').addClass('error');
				} else {
					$warning.html('').removeClass('error');
				}

			}, this);

			//модель пациента
			this.pacientModel = new PacientModel();
			this.pacientModelView = new RSelectView({
				label: 'Модель пациента',
				options: this.pacientModel,
				model: this.vmpTalon,
				selectedProperty: 'pacientModel_id'
			});

			//лечение
			this.treatment = new Treatment();
			this.treatmentView = new RSelectView({
				label: 'Метод лечения',
				options: this.treatment,
				model: this.vmpTalon,
				selectedProperty: 'treatment_id'
			});
			//this.treatment.fetch();

			this.vmpTalon.on('change:mkbId', this.onChangeMkbId, this);
			this.vmpTalon.on('change:MKB', this.onChangeMkbCode, this);
			this.vmpTalon.on('change:DiagName', this.onChangeDiagName, this);

			this.vmpTalon.on('change:quotaType_id', this.onChangeQuotaTypeId, this);
			this.vmpTalon.on('change:pacientModel_id', this.onChangePacientModelId, this);

			this.vmpTalonPrev = new VmpTalonPrev();
			this.vmpTalonPrev.appealId = this.options.appeal.get('id');


		},
		//VIEW->> MODEL
		onChangeDiagNameInput: function() {
			var mkbDiagName = this.ui.$mkbDiagnosis.val();

			this.vmpTalon.set('DiagName', mkbDiagName);
		},

		onChangeMkbIdInput: function() {
			var mkbId = this.ui.$mkbCode.data('mkb-id');

			this.vmpTalon.set('mkbId', mkbId);
		},

		onChangeMkbCodeInput: function() {
			var mkbCode = this.ui.$mkbCode.val();

			this.vmpTalon.set('MKB', mkbCode);
		},

		//MODEL >> VIEW
		onChangeDiagName: function(model, diagName) {
			this.ui.$mkbDiagnosis.val(diagName)
		},

		onChangeMkbCode: function(model, mkbCode) {
			this.ui.$mkbCode.val(mkbCode);
		},

		onChangeMkbId: function(model, mkbId) {
			var view = this;
			view.ui.$mkbCode.data('mkb-id', mkbId);
			//фильтрация по диагнозу
			view.quotaType.fetch({
				data: {
					mkbId: mkbId
				}
			}).done(function() {
				if (!view.quotaType.length) {
					view.pacientModel.reset();
				}
			});
		},

		onChangeQuotaTypeId: function(model, quotaTypeId) {
			var mkbId = this.vmpTalon.get('mkbId');

			if (quotaTypeId != '') {
				//фильтрация справочника "модель пациента" по виду вмп и диагнозу
				this.pacientModel.fetch({
					data: {
						quotaTypeId: quotaTypeId,
						mkbId: mkbId
					}
				});

			} else {
				this.pacientModel.reset();
			}
		},

		onChangePacientModelId: function(model, pacientModelId) {
			if (pacientModelId != '') {
				//фильтрация справочника "метод лечения" по "модели пациента"
				this.treatment.fetch({
					data: {
						pacientModelId: pacientModelId
					}
				});

			} else {
				this.treatment.reset();
			}
		},

		////////////////////////////////////////////////


		validate: function(prev) {
			var model = this.vmpTalon;
			var required = ['MKB','quotaType_id','pacientModel_id','treatment_id'];
			var allRequiredProp = true;
			console.log('validate', model.toJSON());

			_.each(required, function(name){
				if (!model.get(name)) {
					allRequiredProp = false;
				}
			});

			return allRequiredProp;

		},

		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			var view = this;
			console.log('render QuotesView', this);

			this.$el.html(_.template(template));

			this.ui = {};

			this.ui.$treatment = this.$el.find('#treatment');
			this.ui.$pacientModel = this.$el.find('#pacient-model');
			this.ui.$quotaType = this.$el.find('#quota-type');

			this.ui.$save = this.$('.save');
			this.ui.$cancel = this.$('.cancel');
			this.ui.$copy = this.$('.copy');

			this.ui.$save.button().button('disable');
			this.ui.$cancel.button().button('disable');
			this.ui.$copy.button({
				icons: {
					primary: 'icon-copy'
				}
			}).button('disable');

			this.renderNested(this.mkbInputView, ".mkb");
			this.ui.$mkbCode = this.$("input[name='diagnosis[mkb][code]']");
			this.ui.$mkbDiagnosis = this.$("input[name='diagnosis[mkb][diagnosis]']");


			view.vmpTalon.fetch().done(function(model) {
				console.log('view.vmpTalon',view.vmpTalon)
				view.renderNested(view.quotaTypeView, view.ui.$quotaType);
				view.renderNested(view.pacientModelView, view.ui.$pacientModel);
				view.renderNested(view.treatmentView, view.ui.$treatment);

				view.vmpTalon.onChange();
				if (view.validate()) {
					view.ui.$save.button('disable');
					view.ui.$cancel.button('enable');
				}
			});

			this.vmpTalonPrev.fetch().done(function() {
				if (!_.isEmpty(view.vmpTalonPrev.attributes) && !view.validate()) {
					view.ui.$copy.button('enable');
				}
			});


			return view;
		},

		onSave: function() {
			var self = this;
			this.ui.$save.button("option", "label", 'Сохраняем...').button("disable");

			this.vmpTalon.save({}, {
				success: function() {
					self.vmpTalon.id = '';
					self.vmpTalon.fetch().done(function() {
						self.ui.$copy.button('disable');
					});

					self.ui.$save.button("option", "label", 'Сохранить').button("enable");
					pubsub.trigger('noty', {
						text: 'ВМП талон сохранён',
						type: 'success'
					});

					self.render();
				}
			});
		},

		onCancel: function() {
			var self = this;
			$.ajax({
			    url: '/api/v1/appeals/del/client_quoting/' + this.vmpTalon.id,
			    type: 'DELETE',
			    success: function(result) {
					self.vmpTalon.resetQuotaType();
					self.vmpTalon.resetPacientModel();
					self.vmpTalon.resetTreatment();
					self.renderNested(self.quotaTypeView, self.ui.$quotaType);
			    }
			});
		},

		fillForm: function(opt) {
			this.vmpTalon.set(opt.model.toJSON());
			this.treatmentView.render();

		},

		onCopy: function() {
			this.vmpTalon.offChange();
			var id = this.vmpTalon.get('id');
			this.fillForm({
				model: this.vmpTalonPrev,
				disable: true
			});

			this.vmpTalon.set('id',id);
			this.vmpTalon.onChange();
		}

	});


});
