define(["models/Biomaterial"], function (Biomaterial) {
    var Biomaterials = Collection.extend({
        model: Biomaterial,
			url: function () {
				return DATA_PATH + "biomaterials/"
			}
    });

    return Biomaterials;
});
