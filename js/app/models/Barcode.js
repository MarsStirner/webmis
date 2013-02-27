define([],function () {

	var Barcode = Model.extend({
		default: {
			datetime: '',
			barcode: '',
			fio: ''
		}
	});

	return Barcode;
});
