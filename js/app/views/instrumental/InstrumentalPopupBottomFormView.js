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

			this.data = this.options.data;

			this.mkb = new MKBView();
			this.depended(this.mkb);
		},

		initFinanseSelect: function() {
			var view = this;

			var financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			financeDictionary.fetch();

			view.financeSelect = new SelectView({
				collection: financeDictionary,
				el: view.$('#finance'),
				initSelection: view.data.finance
			});

			view.depended(view.financeSelect);
		},

		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			this.$el.html($.tmpl(this.template, this.data));

			//rivets.bind(this.el, {test: this.options.model});
			this.renderNested(this.mkb, ".mkb");

			if (this.data.mkbId) {
				//var mkb = this.appealDiagnosis.get('mkb');
				this.$("input[name='diagnosis[mkb][diagnosis]']").val(this.data.mkbDiagnosis);
				this.$("input[name='diagnosis[mkb][code]']").val(this.data.mkbCode);
				this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', this.data.mkbId);
			}

			this.initFinanseSelect();

			UIInitialize(this.$el);
			//Дата и время создания
			var now = new Date();
			this.$("#start-date").datepicker("setDate", this.data.assessmentDate);
			this.$("#start-time").val(this.data.assessmentTime).mask("99:99").timepicker({
				showPeriodLabels: false
			});


			

			return this;
		}

	});

	return InstrumentalPopupBottomForm;
});
