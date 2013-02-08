define(["models/Biomaterial"], function (Biomaterial) {
    var Biomaterials = Collection.extend({
        model: Biomaterial
    });

    return Biomaterials;
});
