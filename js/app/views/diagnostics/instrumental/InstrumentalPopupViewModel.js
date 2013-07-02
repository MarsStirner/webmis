define(function(require) {
	//var Backbone = require('backbone');
	var InstrumntalGroups = require('collections/diagnostics/instrumental/InstrumntalGroups');
	var InstrumentalResearchs = require('collections/diagnostics/instrumental/InstrumentalResearchs');

	return Backbone.Model.extend({
		defaults: {
			mkbId: '',
			urgent: false,
			saveButtonState: 'disable',
			doctorFirstName: '',
			doctorMiddleName: '',
			doctorLastName: '',
			code: false
		},
		initialize: function(attr, options) {

			this.set('finance', options.appeal.get('appealType').get('finance').get('id'));
			this.set('assessmentDate', moment().toDate()); //.format('YYYY-MM-DD'));
			this.set('assessmentTime', moment().format('HH:mm'));

			if (options.appeal && options.appeal.getDiagnosis() && options.appeal.getDiagnosis().get('mkb')) {
				var mkb = options.appeal.getDiagnosis().get('mkb');
				this.set('mkbId', mkb.get('id'));
			}


			var appealDoctor = options.appeal.get('execPerson');

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				//юзер не врач,назначивший доктор = лечащий врач

				this.set('doctorFirstName', appealDoctor.name.first);
				this.set('doctorLastName', appealDoctor.name.last);
				this.set('doctorMiddleName', appealDoctor.name.middle);

			} else {
				//юзер врач ,назначивший доктор = врач

				this.set('doctorFirstName', Core.Cookies.get("doctorFirstName"));
				this.set('doctorLastName', Core.Cookies.get("doctorLastName"));
				this.set('doctorMiddleName', '');
			}

			this.set('patientId', options.appeal.get('patient').get('id'));
			this.set('appealId', options.appeal.get('id'));

			this.set('plannedDate', moment().add('day', 1).toDate()); //format('YYYY-MM-DD'));
			this.set('plannedTime', '07:00');

			this.on('change:code change:plannedTime', this.updateSaveButtonState, this);


			this.instrumntalGroups = new InstrumntalGroups();
			this.instrumntalGroups.parents = true;
			this.instrumntalGroups.setParams({
				'filter[code]': 3,
				'filter[view]': 'tree'
			});

			this.instrumntalResearchs = new InstrumntalGroups();

		},

		updateSaveButtonState: function() {

			if (this.get('code') && this.get('plannedTime')) {
				this.set('saveButtonState', 'enable');
			} else {
				this.set('saveButtonState', 'disable');
			}
		}

	});

});