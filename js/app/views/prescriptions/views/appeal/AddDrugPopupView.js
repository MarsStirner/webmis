define(function(require) {
	var popupMixin = require('mixins/PopupMixin');
	var template = require('text!views/prescriptions/templates/appeal/add-drug-popup.html');
	var BaseView = require('../BaseView');
	var DrugBalance = require('../../collections/DrugBalance');

	var DrugBalanceView = require('./DrugBalanceView');

	var AddDrugPopup = BaseView.extend({
		template: template,
		initialize: function(){
			this.balance = new DrugBalance();
			this.balanceView = new DrugBalanceView({
				collection: this.balance
			});

			this.addSubViews({
				'.balance': this.balanceView
			});
		},
		className: 'popup',

		searchByNomen: function(item) {
			var self = this;

			this.balance.nomenId = item.id;

			this.balance.fetch().done(function(){
				// console.log('balance', self.balance);
			})

			console.log('searchByNomen', item)

		},


		afterRender: function() {
			var self = this;
			self.ui = {};
			self.ui.$drugName = this.$el.find('#drug-name');

			self.ui.$drugName.autocomplete({
				source: function(request, response) {
					$.ajax({
						url: '/api/v1/rls/',
						dataType: 'jsonp',
						data: {
							name: request.term
						},
						success: function(raw) {
							console.log('success', raw);
							response($.map(raw.data, function(item) {
								return {
									label: item.tradeLocalName + '(' + item.tradeName + ') '+item.formName+ ' ' +item.dosageValue+' '+item.unitName +', '+item.packingName,
									value: item.tradeLocalName,
									id: item.id
								};
							}));
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					var item = ui.item;
					if (item && item.id) {
						self.searchByNomen(item);

					}
					console.log('ui', event, ui)

				}
			})
		}


	}).mixin([popupMixin]);

	return AddDrugPopup;
});
