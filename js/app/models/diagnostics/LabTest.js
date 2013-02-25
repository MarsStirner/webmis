//модель группы лабораторных исследований

define([], function () {
	var LabTest = Model.extend({
		defaults: {
			groupId: "",
			code: '',
			name: ""
		}
	});

	return LabTest;

});
