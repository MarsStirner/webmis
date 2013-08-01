define(function(require) {
    var commonData = require('mixins/commonData');
    var SetOffTests = Model.extend({
        initialize: function(options) {

            this.code = options.code;
            this.patientId = options.patientId;
            this.deferred = this.fetch();
        },

        getTestList: function() {

            //console.log('getTree', this.get('group')[1].attribute)
            var tests = this.get('group')[1].attribute;

            var testList = [];

            _.each(tests, function(test) {

                if (test.type == "String") {

                    var unselectable = false;
                    var select = true;

                    if (test.properties[0].value == 'false') {
                        unselectable = true;
                    } else {
                        unselectable = false;
                    }

                    //все тесты выбраны по умолчанию, в не зависимости от проперти isAssigned
                    //if (test.properties[1].value == 'true') {
                    //  select = true;
                    //}
                    //if ((!!!test.properties[1].value) || (test.properties[1].value == 'false')) {
                    //  select = false;
                    //}

                    testList.push({
                        title: test.name,
                        icon: false,
                        noCustomRender: true,
                        unselectable: unselectable,
                        select: select
                    });

                }

            });


            return testList;
        },

        url: function() {
            return DATA_PATH + "dir/actionTypes?filter[mnem]=LAB&filter[code]=" + this.code + "&patientId=" + this.patientId;
        },

        parse: function(raw) {
            return raw.data[0];
        }
    }).mixin([commonData]);

    return SetOffTests;

});
