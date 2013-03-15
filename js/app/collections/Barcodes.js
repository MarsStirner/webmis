define(['../models/Barcode'], function (Barcode) {

	var Barcodes = Collection.extend({
		model: Barcode
	});

	return Barcodes;
});
