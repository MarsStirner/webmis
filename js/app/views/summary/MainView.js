define(function (require) {
    var template = require('text!templates/summary/summary-main.html');
    require("models/appeal");
    var userPermissions = require('permissions');
    var CardNav = require('views/CardNav');
    var Documents = require("views/documents/documents");
    var AppealsList = require("collections/patient-appeals");

    return View.extend({
        initialize: function () {
            var self = this;

            var canSee = (userPermissions.indexOf('see_patient_summary') !== -1);
            if (!canSee) {
                App.Router.navigate("/", {
                    trigger: true
                });
            }

            self.appealsList = new AppealsList();
            self.appealsList.setParams({
                    limit: 9999,
                    page: 0
                });
            self.appeal = new App.Models.Appeal();

            this.getPatientAppeals(this.options.patientId).done(function () {
                self.firstAppeal = self.appealsList.first();
                if (self.firstAppeal) {
                    var appealId = self.firstAppeal.get('id');
                    self.getAppealById(appealId).done(function () {

                        var patient = self.appeal.get("patient");
                        patient.fetch().done(function () {
                            //console.log('appeal', self.appeal);
                            self.renderPage(self.appeal, self.appealsList, appealId);
                        });
                    });
                }
            });
        },
        getPatientAppeals: function (patientId) {
            this.appealsList.patient = {
                id: this.options.patientId
            };
            return this.appealsList.fetch();
        },
        getAppealById: function (id) {
            this.appeal.set('id', id);
            return this.appeal.fetch();
        },
        render: function () {
            return this;
        },
        renderPage: function (appeal, events, selectedEventId) {
            var patientId = this.options.patientId;

            var html = _.template(template, {
                patientId: this.options.patientId,
                patientName: appeal.get('patient').get('name').get('raw')
            });


            this.cardNav = new CardNav({
                permissions: userPermissions,
                patient: appeal.get('patient'),
                structure: [{
                    link: '/patients/' + patientId + '/',
                    name: 'Карточка пациента',
                    permissions: ['see_patient_card']
                }, {
                    link: '/patients/' + patientId + '/appeals/',
                    name: 'Госпитализации',
                    permissions: ['see_patient_appeals']
                }, {
                    link: '/patients/' + patientId + '/summary',
                    name: 'Сводная информация',
                    permissions: ['see_patient_summary'],
                    active: true
                }]
            });

            this.listView = new Documents.Summary.List.Layout({
                appealId: (Cache.filterCache && Cache.filterCache.eventId) ? Cache.filterCache.eventId : appeal.get('id'),
                appeal: appeal,
                patientId: this.options.patientId,
                events: events,
                selectedEventId: selectedEventId

            });

            this.listView.render();
            this.$el.append(html);
            this.$el.find('#summary-list').append(this.listView.el);
            this.$el.find('.CardNav').append(this.cardNav.render().el);

            console.log('render page', appeal, this.listView.el);
        }
    });

});
