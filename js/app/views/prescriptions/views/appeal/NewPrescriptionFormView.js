define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/new-prescription-form.html');
	var BaseView = require('../BaseView');
	var AddDrugPopupView = require('./AddDrugPopupView');

	return BaseView.extend({
		template: template,
		initialize: function(){

		},
		events: {
			'click [data-add-drug]': 'onClickAddDrug'
		},
		onClickAddDrug: function(){
			var popup = new AddDrugPopupView();

			popup.render();
			popup.open();

		}
	});

});
