define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var chemotherapyInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/chemotherapy-info.html');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');
	var LastTherapyCollection = require('collections/therapy/LastTherapy');
	var RestTherapyCollection = require('collections/therapy/RestTherapy');


	var ChemotherapyInfo = BaseView.extend({
		initialize: function(){
			var self = this;
			BaseView.prototype.initialize.apply(this);

			var eventId = shared.models.appeal.get('id');
			var patientId = shared.models.appeal.get('patient').get('id');

			this.lastTherapyCollection = new LastTherapyCollection({eventId: eventId },[]);
			this.restTherapyCollection = new RestTherapyCollection({patientId: patientId },[]);


			$.when(this.lastTherapyCollection.fetch(), this.restTherapyCollection.fetch())
			.done(function(){
				self.render();
			});

		},
		data: function() {
            return {
                lastTherapy: this.lastTherapyCollection.toJSON(),
                restTherapy: this.restTherapyCollection.toJSON()
            };
        },
		template: chemotherapyInfoTmpl
	});

	return ChemotherapyInfo;

});
