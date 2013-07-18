define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var chemotherapyInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/chemotherapy-info.html');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');


	var ChemotherapyInfo = BaseView.extend({
		template: chemotherapyInfoTmpl
	});

	return ChemotherapyInfo;

});
