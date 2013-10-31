define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/new-prescription-actions.html');
	var BaseView = require('../BaseView');

	return BaseView.extend({
		template: template,
		initialize: function(){

		},
		events: {
			'click [data-save-prescription]':'onClickSavePrescription',
			'click [data-cancel]':'onClickCancel'
		},
		onClickSavePrescription: function(){
			console.log('onClickSave')
		},
		onClickCancel: function(){
			App.Router.navigate(['appeals', this.options.appealId, 'prescriptions'].join('/'), {trigger: true});
			console.log('onClickCancel')
		}
	});

});
