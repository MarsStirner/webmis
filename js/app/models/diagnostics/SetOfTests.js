
define([], function () {
    var SetOffTests = Model.extend({
        defaults: {
        },
        url: function (){
            return DATA_PATH + "actionTypes/laboratory/"
        },
			parse:function (raw) {
				return raw.data[0]
			}
    });

    return SetOffTests;

});
