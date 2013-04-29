define(function(require) {
	var tmpl = require('text!templates/appeal/edit/popups/instrumental-bf.tmpl');
	var MKBView = require('views/ui/MkbInputView');
	var SelectView = require('views/ui/SelectView');

	var rivets = require('rivets');

// define(["text!templates/appeal/edit/popups/instrumental-bf.tmpl",
// 	"views/ui/MkbInputView",
// 	"views/ui/SelectView"], function(tmpl, MKBView, SelectView) {

	var InstrumentalPopupBottomForm = View.extend({
		template: tmpl,
		initialize: function(options) {

			var appealFinanceId = options.appeal.get('appealType').get('finance').get('id');
			if(options.model){
				console.log(options.model)
			}

			this.appealDiagnosis = options.appeal.getDiagnosis();
			this.mkb = new MKBView();
			this.depended(this.mkb);
		},

		initFinanseSelect: function() {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			var financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			financeDictionary.fetch();

			view.financeSelect = new SelectView({
				collection: financeDictionary,
				el: view.$('#finance'),
				initSelection: appealFinanceId
			});

			view.depended(view.financeSelect);
		},

		renderNested: function(view, selector) {
			console.log('renderNested', view);
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			this.$el.html($.tmpl(this.template, this.options.data));

			rivets.bind(this.el, {test: this.options.model});
			this.renderNested(this.mkb, ".mkb");

			if (this.appealDiagnosis) {
				var mkb = this.appealDiagnosis.get('mkb');
				this.$("input[name='diagnosis[mkb][diagnosis]']").val(mkb.get('diagnosis'));
				this.$("input[name='diagnosis[mkb][code]']").val(mkb.get('code'));
				this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', mkb.get('id'));
			}

			this.initFinanseSelect();


			UIInitialize(this.$el);
			//Дата и время создания
			var now = new Date();
			this.$("#start-date").datepicker("setDate", now);
			this.$("#start-time").val(('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});

			return this;
		}

	});

	return InstrumentalPopupBottomForm;
});
