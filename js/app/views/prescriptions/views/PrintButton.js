define(function (require) {
    require('views/print');
    var TreeButton = require('./TreeButton');


    var PrintButton = TreeButton.extend({
        initialize: function () {
            this.listenTo(this.collection, 'change reset', this.afterRender);
        },

        print: function (key) {
            var c = key.split(':');
            var type = c[0];
            var id = false;
            if (c[1]) {
                id = c[1];
            }

            if (!id && type === 'ln') {
                this.printAllPrescriptions();
            }

            if (id && type === 'ln') {
                this.printPatientPrescriptions(id);
            }

            if (id && type === 'm') {
                this.printPatientMonitoring(id);
            }
        },

        printPatientMonitoring: function (id) {
            var prescriptions = this.getClientPrescriptions(id);
            if (prescriptions && prescriptions.length) {
                console.log('prescription', prescriptions[0]);
                var data = {};
                var prescription = prescriptions[0];
                data.patientName = prescription.getPatientFio();
                data.patientBirthDate = prescription.getPatientBirthDate();

                new App.Views.Print({
                    data: data,
                    template: "patientMonitoring"
                });

                console.log('печать мониторинга пациента', id);

            }
        },

        getPatientPrescriptionPrintData: function(id){
            var prescriptions = this.getClientPrescriptions(id);
            console.log('data', prescriptions); 
        },

        printPatientPrescriptions: function (id) {
            this.getPatientPrescriptionPrintData(id);
            // new App.Views.Print({
            //     data: {
            //         patientName: 'Фамилия Имя Отчество',
            //         patientBirthDate: 34385797438798,
            //         patientAge: '2323',
            //         groups: [{
            //             name: 'внутрь',
            //             prescriptions: [{
            //                 note: 'примечание ',
            //                 moa: '24 мл\ч',
            //                 drugs: [{
            //                     name: 'Пенецелин',
            //                     dose: '123'
            //                 },{
            //                     name: 'Анальгин',
            //                     dose:'89'
            //                 }],
            //                 intervals: [{
            //                     val: 'ss'
            //                 }, {
            //                     val: ''
            //                 }, {
            //                     val: 'i'
            //                 }, {
            //                     val: ''
            //                 }, {
            //                     val: ''
            //                 }, {
            //                     val: ''
            //                 }, ]
            //             }]
            //         }, {
            //             name: 'внутревенно',
            //             prescriptions: [{
            //                 note: 'weewe ✔ w',
            //                 moa: '45',
            //                 drugs: [{
            //                     name: 'Йод',
            //                     dose: '12'
            //                 }],
            //                 intervals: [{
            //                     val: '7'
            //                 }, {
            //                     val: '6'
            //                 }, {
            //                     val: '5'
            //                 }, {
            //                     val: ''
            //                 }, {
            //                     val: ''
            //                 }, {
            //                     val: ''
            //                 }, ]
            //             },{
            //                 note: 'weewew',
            //                 moa: '45',
            //                 drugs: [{
            //                     name: 'Йод',
            //                     dose: '12'
            //                 }],
            //                 intervals: [{
            //                     val: 'rrr'
            //                 }, {
            //                     val: 'qwqw'
            //                 }, {
            //                     val: 'i'
            //                 }, {
            //                     val: '✔'
            //                 }, {
            //                     val: '7'
            //                 }, {
            //                     val: '➔'
            //                 }, ]
            //             }]
            //         }]
            //     },
            //     template: "patientPrescriptions"
            // });

            console.log('печать назначений пациента', id, this.getClientPrescriptions(id));
        },

        printAllPrescriptions: function () {
            new App.Views.Print({
                data: {},
                template: "allPrescriptions"
            });

            console.log('печать всех назначений');
        },

        getClientPrescriptions: function (id) {
            return this.collection.filter(function (prescription) {
                return prescription.get('client').id == id;
            });
        },

        getMenuItems: function () {
            var items = {
                "ln": {
                    name: "Лист назначений"
                }
            };


            this.groupedByClient = this.collection.groupBy(function (prescription) {
                return prescription.get('client').id;
            });

            _.each(this.groupedByClient, function (clientPrescriptions, clientId) {
                var client = clientPrescriptions[0].get('client');
                var clientName = client.firstName + ' ' + client.lastName;
                var clientMenu = {};

                clientMenu['ln:' + clientId] = {
                    name: 'Лист назначений'
                };

                clientMenu['m:' + clientId] = {
                    name: 'Мониторинг'
                };

                items['client:' + clientId] = {
                    name: 'Лист назначений(' + clientName + ')',
                    items: clientMenu
                };

            });

            // console.log('items', items);

            return items;
        },

        getMenuCallback: function (key, options) {
            this.print(key);
        },

    });

    return PrintButton;
});
