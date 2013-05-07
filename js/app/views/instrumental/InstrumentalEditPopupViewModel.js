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
			var assessmentDay = moment((assessmentBeginDate.split(' '))[0], 'YYYY-MM-DD').format('YYYY-MM-DD');
			var assessmentTime = (assessmentBeginDate.split(' '))[1].slice(0, -3);

			this.set('assessmentDay', assessmentDay);
			this.set('assessmentTime', assessmentTime);

			var plannedEndDate = this.model.getProperty('plannedEndDate');
			var plannedEndDay = moment((plannedEndDate.split(' '))[0], 'YYYY-MM-DD').format('YYYY-MM-DD');
			var plannedEndTime = (plannedEndDate.split(' '))[1].slice(0, -3);

			this.set('plannedEndDay', plannedEndDay);
			this.set('plannedEndTime', plannedEndTime);

			//Диагноз
			var diagnosis = this.model.getProperty('Направительный диагноз', 'value')
			if (diagnosis) {
				diagnosis = diagnosis.split(/\s+/);
				var mkbCode = diagnosis[0];
				var mkbText = (diagnosis.splice(1)).join(' ');
				this.set('mkbText', mkbText);
				this.set('mkbCode', mkbCode);
			}

			this.set('mkbId', this.model.getProperty('Направительный диагноз', 'valueId'));


			this.on('change:plannedEndTime', this.updateSaveButtonState, this);

			this.on('change', function(){
				console.log('change',this.toJSON())
			}, this);

			



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
