
define([], function () {
    var SetOffTests = Model.extend({
        defaults: {
        },
        url: function (){
            return DATA_PATH + "actionTypes/laboratory/"
        }
    });

    return SetOffTests;

});
