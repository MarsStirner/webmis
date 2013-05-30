//модель направления на консультацию, используется при создании и редактировании
define(function(require) {
    var commonData = require('mixins/commonData');

    return Model.extend({
        idAttribute: "id",
        // defaults: {
        //     "eventId": null,
        //     "actionTypeId": null,
        //     "executorId": null,
        //     "patientId": null,
        //     "plannedEndDate": null,
        //     "plannedTime": {
        //         "time": null
        //     },
        //     "urgent": false,
        //     "finance": {
        //         "id": null //,
        //         //"name": ""
        //     },
        //     "diagnosis": {
        //         // "code": null,
        //         // "diagnosis": null,
        //         // "parent": null
        //     }
        // },
        sync: function(method, model, options) {
            options = options || {};
            options.dataType = "jsonp";
            options.contentType = 'application/json';
            //options.jsonpCallback = 'callback';
            console.log('sync', arguments);

            return Backbone.sync(method, model, options);

        },
        parse: function(raw){
            return raw.data[0];
        },

        // url: function() {
        //     return DATA_PATH + 'appeals/' + this.get('eventId') + '/diagnostics/consultations';

        // },
        urlRoot: function() {
            return DATA_PATH + 'appeals/' + this.get('eventId') + '/diagnostics/consultations';
        }

    }).mixin([commonData]);

});
