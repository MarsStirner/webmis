define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/prescriptions-actions.html');
	var BaseView = require('views/prescriptions/views/BaseView');

	return BaseView.extend({
		template: template,
		initialize: function(){
//create-prescription
		},
		events: {
			'click [data-create-prescription]':'createPrescription'
		},
		createPrescription: function(){
			App.Router.navigate(["appeals", this.options.appealId, "prescriptions/new"].join("/"), {trigger: true});

			console.log('create prescription')
		},
        afterRender: function(){
            this.$el.find('button').button();  
        }
	});

});
