//модель направления на консультацию, используется при создании и редактировании
define(function(require) {
    var commonData = require('mixins/commonData');

    return Model.extend({
        defaults: {
            "eventId": null,
            "actionTypeId": null,
            "executorId": null,
            "patientId":null,
            "plannedEndDate": null,
            "plannedTime": {
                //"id": 7192189,
                //"index": 6,
                "time": null
            },
            "urgent": false,
            "finance": {
                "id": null,
                "name": ""
            },
            "diagnosis": {
                "code": "",
                "diagnosis": "",
                "parent": null
            }
        },
        // validate: function(attrs, options) {
        //     console.log('validate', arguments);
        //     if (!attrs.eventId) {
        //         return "Не задан идентификатор госпитализации";
        //     }
        //     if (!attrs.plannedTime && !attrs.plannedTime.time) {
        //         return "Не задано время консультации";
        //     }
        //     if (!attrs.plannedEndDate) {
        //         return "Не задана дата консультации";
        //     }
        //     if (!attrs.executorId) {
        //         return "Не задана специалист который будет консультировать";
        //     }
        //     if (!attrs.patientId) {
        //         return "Не задана идентификатор пациента";
        //     }
        // },
        sync: function(method, model, options) {
            options = options || {};
            options.dataType = "jsonp";
            options.contentType = 'application/json';
            options.jsonpCallback = 'callback';
            console.log('sync', arguments);

            // switch (method.toLowerCase()) {
            //     case 'read':
            //         options.url = DATA_PATH + "dir/actionTypes/?filter[mnem]=CONS&filter[code]=" + this.code + "&patientId=" + this.patientId;
            //         break;
            //     case 'update':
            //         options.url = DATA_PATH + 'appeals/' + this.appealId + '/diagnostics/consultations';
            //         options.data = JSON.stringify({
            //             requestData: {},
            //             data: [model.toJSON()]
            //         });
            //         break;
            //     default:
            //         options.url = DATA_PATH + 'appeals/' + this.appealId + '/diagnostics/consultations';
            //         break;
            // }

            // if (method == 'read') {
            //     options.url = DATA_PATH + "dir/actionTypes/?filter[mnem]=CONS&filter[code]=" + this.code + "&patientId=" + this.patientId;
            // } else { //post/put/delete
            //     options.url = DATA_PATH + 'appeals/' + this.appealId + '/diagnostics/consultations';
            // }

            return Backbone.sync(method, model, options);

        },
        // parse: function(raw) {
        //     console.log('raw', raw);
        //     return raw.data[0];
        // },

        url: function() {
            return DATA_PATH + 'appeals/' + this.get('eventId') + '/diagnostics/consultations';
            //return DATA_PATH + "dir/actionTypes/?filter[mnem]=CONS&filter[code]=" + this.code + "&patientId=" + this.patientId;
        }

    }).mixin([commonData]);

});
