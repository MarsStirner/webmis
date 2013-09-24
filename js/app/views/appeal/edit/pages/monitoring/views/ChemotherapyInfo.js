define(function(require) {
	// var shared = require('views/appeal/edit/pages/monitoring/shared');

	var chemotherapyInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/chemotherapy-info.html');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');



	var ChemotherapyInfo = BaseView.extend({
		initialize: function(options) {
			var self = this;
			BaseView.prototype.initialize.apply(this);

			this.lastTherapyCollection = options.lastTherapyCollection;
			this.restTherapyCollection = options.restTherapyCollection;

			$.when(this.lastTherapyCollection.fetch(), this.restTherapyCollection.fetch())
				.done(function() {
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
