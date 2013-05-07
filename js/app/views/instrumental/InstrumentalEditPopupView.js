define(function(require) {
	var tmpl = require('text!templates/appeal/edit/popups/instrumental-edit.tmpl');
	var popupMixin = require('mixins/PopupMixin');
	var BFView = require('views/instrumental/InstrumentalPopupBottomFormView');

	var ViewModel = require('views/instrumental/InstrumentalEditPopupViewModel');
	require('models/DeepModel');


	return View.extend({
		template: tmpl,
		events: {},

		initialize: function(options) {
			_.bindAll(this);

			this.viewModel = new ViewModel({}, {
				appeal: this.options.appeal,
				model: this.options.model
			});

			this.model = this.options.model;

			// //юзер
			// this.doctor = {
			// 	name: {
			// 		first: Core.Cookies.get("doctorFirstName"),
			// 		last: Core.Cookies.get("doctorLastName")
			// 	}
			// };
			// this.data = {
			// 	'doctor': this.doctor
			// };

			this.bfView = new BFView({
				data: this.viewModel.toJSON()
			});


			this.depended(this.bfView);

		},

		modelToTree: function() {
			var view = this;
			var tree = [];
			var root = {};
			root.title = view.model.get('name');
			root.expand = true;
			root.icon = false;
			root.select = true;
			root.unselectable = true;
			return [root];
		},

		render: function() {
			var view = this;

			this.$('.instrumental-researchs').dynatree({
				checkbox: true,
				children: view.modelToTree()
			});

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},
		afterRender: function() {
			var view = this;

			view.$assessmentDatepicker = $('#start-date');
			view.$assessmentTimepicker = $('#start-time');
			view.$plannedDatepicker = view.$("#dp");
			view.$plannedTimepicker = view.$("#tp");
			view.$urgent = view.$('input[name=urgent]');
			view.$doctor = view.$('input[name=doctor]');
			view.$finance = view.$('#finance');
			view.$mkbDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.$mkbCode = view.$("input[name='diagnosis[mkb][code]']");

			view.$saveButton = view.$el.closest(".ui-dialog").find('.save');

			view.$assessmentDatepicker.datepicker("setDate", moment(view.viewModel.get('assessmentDay'),'YYYY-MM-DD').toDate());
			view.$assessmentTimepicker.val(this.viewModel.get('assessmentTime'));

			view.$plannedDatepicker.datepicker();
			view.$plannedTimepicker.timepicker({
				showPeriodLabels: false,
				showOn: 'both',
				button: '.icon-time'
			});
			view.$plannedDatepicker.datepicker("setDate", moment(view.viewModel.get('plannedEndDay'),'YYYY-MM-DD').toDate());
			view.$plannedTimepicker.val(this.viewModel.get('plannedEndTime'));

			if (this.viewModel.get('urgent') == 'true') {
				view.$urgent.prop('checked', true);
			}

			view.$doctor.val(view.viewModel.get('doctorFirstName') + ' ' + view.viewModel.get('doctorLastName'));

			view.$mkbDiagnosis.val(view.viewModel.get('mkbText'));
			view.$mkbCode.val(view.viewModel.get('mkbCode'));
			view.$mkbCode.data('mkb-id', view.viewModel.get('mkbId'));

//console.log('finance',view.viewModel.get('finance'));
			view.$finance.select2("val", parseInt(view.viewModel.get('finance')));

			view.$assessmentDatepicker.on('change', function() {
				view.viewModel.set('assessmentDay', moment(view.$assessmentDatepicker.val(),'DD.MM.YYYY').format('YYYY-MM-DD'));
			});

			view.$assessmentTimepicker.on('change', function() {
				view.viewModel.set('assessmentTime', view.$assessmentTimepicker.val());
			});

			view.$plannedDatepicker.on('change', function() {
				view.viewModel.set('plannedEndDay', moment(view.$plannedDatepicker.val(),'DD.MM.YYYY').format('YYYY-MM-DD'));
			});

			view.$plannedTimepicker.on('change', function() {
				view.viewModel.set('plannedEndTime', view.$plannedTimepicker.val());
			});

			view.$urgent.on('change', function() {
				view.viewModel.set('urgent', ''+view.$urgent.prop('checked'));
			});
			view.$finance.on('change', function() {
				view.viewModel.set('finance', view.$(view.$('#finance option:selected')[0]).val());
			});
			view.$mkbCode.on('change', function() {
				view.viewModel.set('mkbId', view.$mkbCode.data('mkb-id'));
			});



		},

		onSave: function() {
			var view = this;

			//doctorFirstName - имя врача назначившего исследование
			view.model.setProperty('doctorFirstName', 'value', view.viewModel.get('doctorFirstName'));
			//doctorMiddleName - отчество врача назначившего исследование
			view.model.setProperty('doctorMiddleName', 'value', view.viewModel.get('doctorMiddleName'));
			//doctorLastName - фамилия врача назначившего исследование
			view.model.setProperty('doctorLastName', 'value', view.viewModel.get('doctorLastName'));
			
			//assessmentDate - дата создания направления на исследование
			var assessmentDay = view.viewModel.get('assessmentDay');
			var assessmentTime = view.viewModel.get('assessmentTime') + ':00';
			view.model.setProperty('assessmentBeginDate', 'value', assessmentDay + ' ' + assessmentTime);

			//plannedEndDate - планируемая дата выполнения иследования
			var plannedEndDay = view.viewModel.get('plannedEndDay');
			var plannedEndTime = view.viewModel.get('plannedEndTime') + ':00';
			view.model.setProperty('plannedEndDate', 'value', plannedEndDay + ' ' + plannedEndTime);

			//finance - идентификатор типа оплаты
			view.model.setProperty('finance', 'value', view.viewModel.get('finance'));

			//urgent - срочность
			view.model.setProperty('urgent', 'value', view.viewModel.get('urgent'));

			//идентификатор направительного диагноза
			view.model.setProperty('Направительный диагноз', 'valueId', view.viewModel.get('mkbId'));


			view.model.save({},{
				success: function(raw, status) {
					view.close();
					pubsub.trigger('instrumental-diagnostic:added');
				},
				error: function() {

				}
			});


		}
	}).mixin([popupMixin]);


});
