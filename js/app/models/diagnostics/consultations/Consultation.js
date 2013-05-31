//Модель направления на консультацию, используется при создании и редактировании
//При создании надо отправить вот такой json
// {
// "eventId": null,
// "actionTypeId": null,
// "executorId": null,
// "patientId": null,
// "plannedEndDate": null,
// "plannedTime": {
//     "time": null
// },
// "urgent": false,
// "finance": {
//     "id": null //,
//     //"name": ""
// },
// "diagnosis": {
//     // "code": null,
//     // "diagnosis": null,
//     // "parent": null
// }
//При редактировании работать с commonData


define(function(require) {
    var commonData = require('mixins/commonData');

    return Model.extend({
        idAttribute: "id",
        sync: function(method, model, options) {
            options = options || {};
            options.dataType = "jsonp";
            options.contentType = 'application/json';
            switch (method.toLowerCase()) {
                case 'update':
                    options.data = JSON.stringify({
                        requestData: {},
                        data: [model.toJSON()]
                    });
                    break;
            }

            return Backbone.sync(method, model, options);
        },

        parse: function(raw) {
            return raw.data[0];
        },

        urlRoot: function() {
            return DATA_PATH + 'appeals/' + this.eventId + '/diagnostics/consultations';
        }

    }).mixin([commonData]);

});
