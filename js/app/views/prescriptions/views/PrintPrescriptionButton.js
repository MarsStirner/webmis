define(function (require) {
    require('views/print');
    require("models/patient");
    require("models/appeal");
    var TreeButton = require('views/ui/TreeButton');
    var MonitoringInfos = require('views/appeal/edit/pages/monitoring/collections/MonitoringInfos');
    var DictionaryValues = require('collections/dictionary-values');
    var PatientBloodTypes = require('views/appeal/edit/pages/monitoring/collections/PatientBloodTypes');
    var PatientInfo = require('views/appeal/edit/pages/monitoring/views/PatientInfo');
    var PatientBloodTypeHistoryRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeHistoryRow');
    var PatientBloodTypeRow = require('views/appeal/edit/pages/monitoring/views/PatientBloodTypeRow');
    var PatientBsaRow = require('views/appeal/edit/pages/monitoring/views/PatientBsaRow');
    var Moves = require('collections/moves/moves');

    var PrintButton = TreeButton.extend({
        initialize: function () {
            this.listenTo(this.collection, 'change reset', this.afterRender);
            this.getMoaList();
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

        convertPrescriptionForPrint: function (prescription, range) {
            var data = {};
            data.note = prescription.get('note');
            data.voa = prescription.get('voa') ? prescription.get('voa') + ' мл/ч' : '';
            data.duration = 0;
            data.drugs = prescription.get('drugs').map(function (drug) {
                return {
                    name: drug.get('name'),
                    dose: drug.get('dose') + ' ' + drug.get('unitName'),
                    dosageValue: drug.get('dosageValue') ? drug.get('dosageValue') + (drug.get('dosageValueUnit') ? drug.get('dosageValueUnit').code : '') : ''
                };
            });

            var printRange = moment(range.min).twix(range.max - 1);
            var iter = printRange.iterate("hours"); //=> duration object with {days: 3}
            var hourRanges = [];
            var intervals = [];
            _(_.range(24)).each(function (i) {
                var start = iter.next().valueOf();
                var end = moment(start).add('minutes', 59).valueOf();
                hourRanges.push(moment(start).twix(end));
                intervals.push({
                    val: ''
                });

            });

            prescription.get('assigmentIntervals').each(function (ai) {
                ai.get('executionIntervals').each(function (ei) {
                    var start = ei.get('beginDateTime');
                    var end = ei.get('endDateTime');
                    var isRange = end ? true : false;

                    _(hourRanges).each(function (hourRange, index) {
                        var inRange = false;
                        if (isRange) {
                            inRange = hourRange.overlaps(moment(start).twix(end));
                        } else {
                            inRange = hourRange.contains(moment(start));
                        }
                        if (inRange) {
                            data.duration++;
                            if (isRange) {
                                intervals[index].val = '➔';
                            } else {
                                intervals[index].val = '✔';
                            }
                        }
                    });
                });
            });

            data.intervals = intervals;

            return data;
        },

        getPatientPrescriptionPrintData: function (id, range) {
            var data = {
                groups: []
            };
            var self = this;
            var prescriptions = this.getClientPrescriptions(id);
            var prescription = prescriptions[0];

            $.getJSON(DATA_PATH + 'patients/' + prescription.get('client').id + '/appeals/?callback=?', function (res) {

                var currentAppeal = _.find(res.data, function (appeal) {
                    return appeal.rangeAppealDateTime.start <= range.min && ( range.max <= appeal.rangeAppealDateTime.end || !appeal.rangeAppealDateTime.end);
                });

                var monitoringInfos = new MonitoringInfos(null, {
                    appealId: currentAppeal.id
                });

                var patientBsaRow = new PatientBsaRow({
                    collection: monitoringInfos
                });

                var patientBloodTypes = new PatientBloodTypes([], {
                    patientId: prescription.get('client').id
                });

                var moves = new Moves();
                moves.appealId = currentAppeal.id;

                var bloodType = null;
                var bloodDate = null;

                patientBsaRow.collection.fetch().done(function(){
                    moves.fetch().done(function(){
                        patientBloodTypes.fetch().done(function(){
                            _.each(patientBloodTypes.models, function(blood){
                                if (blood.get('bloodDate') > bloodDate) {
                                    bloodDate = blood.get('bloodDate');
                                    bloodType = blood.get('bloodType').name;
                                }
                            });
                            mainDiag = _.find(currentAppeal.diagnoses, function(diagnosis){
                                return diagnosis.diagnosisKind === 'mainDiagMkb';
                            });
                            data.patientName = prescription.getPatientFio();
                            data.patientBirthDate = prescription.getPatientBirthDate();
                            data.patientAge = Core.Date.getAgeString(data.patientBirthDate);
                            data.patientHeight = patientBsaRow.data().height;
                            data.patientWeight = patientBsaRow.data().weight;
                            data.patientBlood = bloodType;
                            data.patientBSA = patientBsaRow.data().bsa;
                            data.patientBed = moves.last().get('bed');
                            data.listDate = moment(range.min).format('DD.MM.YYYY');
                            data.mainDiag = mainDiag.mkb.diagnosis ? mainDiag.mkb.diagnosis : 'не установлен';

                            var groups = _(prescriptions).groupBy(function (model) {
                                return model.get('moa');
                            });

                            _(groups).each(function (groupPrescriptions, groupName) {
                                var convertedPrescriptions = [];
                                _(groupPrescriptions).each(function (prescription) {
                                    var converted = self.convertPrescriptionForPrint(prescription, range);
                                    if (converted.duration > 0) {
                                        convertedPrescriptions.push(converted);
                                    }
                                }, this);

                                convertedPrescriptions = _(convertedPrescriptions).sortBy(function(prescription) {
                                    return prescription.duration;
                                });
                                convertedPrescriptions.reverse();

                                var groupId;
                                switch(groupName) {
                                    case '2':
                                        groupId = '4';
                                        break;
                                    case '3':
                                        groupId = '2';
                                        break;
                                    case '4':
                                        groupId = '3';
                                        break;
                                    default:
                                        groupId = groupName;
                                    }

                                if (self.getMoaById(groupName)) {
                                    groupName = self.getMoaById(groupName).name;
                                } else {
                                    groupName = 'Не определён';
                                }

                                if (convertedPrescriptions.length) {
                                    data.groups.push({
                                        id: groupId,
                                        name: groupName,
                                        prescriptions: convertedPrescriptions
                                    });
                                }

                            }, this);

                            data.groups = _(data.groups).sortBy(function(group) {
                                return group.id;
                            });

                            new App.Views.Print({
                                data: data,
                                template: "patientPrescriptions"
                            });
                        });
                    });
                });
            });
        },

        printPatientPrescriptions: function (id) {

            var range = {};

            if (this.collection._filter) {
                range = {
                    min: (moment(this.collection._filter.dateRangeMin * 1000).hours(9).format('X')) * 1000,
                    max: this.collection._filter.dateRangeMax * 1000
                };
            } else {
                var today = new Date();
                today.setHours(9,0,0,0);
                range = {
                    min: moment(today).format('X') * 1000,
                    max: (parseInt(moment(today).format('X')) + 86400 ) * 1000
                };
            }

            this.getPatientPrescriptionPrintData(id, range);

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

        getMoaList: function() {
            var self = this;
            $.getJSON('/api/v1/dir/administration?callback=?', function (res) {
                self.moaList = res.data;
            });
        },

        getMoaById: function(id) {
            return _.where(this.moaList, {id: id})[0];
        },

        getMenuItems: function () {
            var items = {
                // "ln": {
                //     name: "Лист назначений"
                // }
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

            return items;
        },

        getMenuCallback: function (key, options) {
            this.print(key);
        },

    });

    return PrintButton;
});
