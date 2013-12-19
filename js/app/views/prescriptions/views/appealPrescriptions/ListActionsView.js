define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/prescriptions-actions.html');
	var BaseView = require('views/prescriptions/views/BaseView');
    var PrescriptionNewView = require('views/prescriptions/views/appealPrescriptions/PrescriptionNewView');

	return BaseView.extend({
		template: template,
		initialize: function(){
//create-prescription
		},
        data: function(){
        	var data = {appeal:this.options.appeal.toJSON()};
        	console.log('data', data)
            return data;
        },
		events: {
			'click [data-create-prescription]':'createPrescription'
		},
		createPrescription: function(){
            var popup = new PrescriptionNewView({
                actionTypeId: 754,
                appeal: this.options.appeal,
                collection: this.options.collection
            });

            popup.render();
            popup.open();

			// App.Router.navigate(["appeals", this.options.appeal.get('id'), "prescriptions/new"].join("/"), {trigger: true});

			console.log('create prescription')
		},
        afterRender: function(){
            this.$el.find('button').button();
        }
	});

});
