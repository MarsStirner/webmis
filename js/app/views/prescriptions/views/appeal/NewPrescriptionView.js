define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/new-prescription.html');
	var BaseView = require('../BaseView');
	var ActionsView = require('./NewPrescriptionActionsView');

	var FormView = require('./NewPrescriptionFormView');

	return BaseView.extend({
		className: 'ContentHolder',
		template: template,
		initialize: function(){
			console.log('init new prescription view');
			this.actionsView = new ActionsView({
				appealId: this.options.appealId
			});

			this.formView = new FormView({
			});

			this.addSubViews({
				'.form': this.formView,
				'.actions': this.actionsView
			});
		}
	});

});
