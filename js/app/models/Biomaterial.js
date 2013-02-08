define([], function () {
	var Biomaterial = Model.extend({
		default: {
			id: '',
			fullName: '',
			sex: 'male',
			birthDate: '',
			actionType: '',
			testTube: '',
			status: ''
		}

	});

	return Biomaterial;
});
