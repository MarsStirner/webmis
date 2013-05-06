define(function(require) {
	//var Backbone = require('backbone');
	var InstrumntalGroups = require('collections/diagnostics/InstrumntalGroups');
	var InstrumentalResearchs = require('collections/diagnostics/InstrumentalResearchs');

	return Backbone.Model.extend({
		defaults: {
			mkbId: '',
			urgent: false,
			saveButtonState: 'disable',
			doctorFirstName: '',
			doctorMiddleName: '',
			doctorLastName: '',
		},
		initialize: function(attr, options) {

			this.model = options.model;
			this.set('finance', this.model.getProperty('finance'));
			this.set('urgent', this.model.getProperty('urgent'));
			this.set('doctorFirstName', this.model.getProperty('doctorFirstName'));
			this.set('doctorMiddleName', this.model.getProperty('doctorMiddleName'));
			this.set('doctorLastName', this.model.getProperty('doctorLastName'));

			var assessmentBeginDate = this.model.getProperty('assessmentBeginDate');
			var assessmentDay = (assessmentBeginDate.split(' '))[0];
			var assessmentTime = (assessmentBeginDate.split(' '))[1].slice(0, -3);

			this.set('assessmentDay', assessmentDay);
			this.set('assessmentTime', assessmentTime);

			this.set('mkbId', this.model.getProperty('Направительный диагноз', 'valueId'));


			this.on('change:plannedTime', this.updateSaveButtonState, this);

			console.log('initialize', arguments, this, this.model.getProperty('finance', 'value'))



		},

		updateSaveButtonState: function() {

			if (this.get('plannedTime')) {
				this.set('saveButtonState', 'enable');
			} else {
				this.set('saveButtonState', 'disable');
			}
		}

	});

});
