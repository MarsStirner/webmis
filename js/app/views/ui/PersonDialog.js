define(function(require) {
    /**
     * Диалог назначения врача
     * @type {*}
     */
    var PatientAppeals = require('collections/patient-appeals');
    var Persons = require('collections/doctors');

    var template = require('text!templates/ui/assign-exec-person-dialog.tmpl');

    return View.extend({
        template: template,

        /*data: function () {
            return {
                allPersons: this.allPersons
            };
        },*/

        events: {
            "change input[name='filter-persons']": "onFilterPersonsChange",
            "click .assign-on-me": "onAssignOnMeClick"
        },

        initialize: function(options) {
            //Monitoring.Views.BaseView.prototype.initialize.apply(this);
            _.bindAll(this);

            if (!this.options.appeal) {
                throw new Error('Нет госпитализации в опциях вью!');
            }
            //загружаем список госпитализаций,
            //чтобы из последней гопитализации получить отделение пациента
            this.loadAppealExtraData();

            //Все врачи
            this.loadAllPersons();

            this.assignMe = true;

            if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
                this.assignMe = false;

            }

        },

        loadAllPersons: function() {
            //Все врачи
            this.allPersons = new Persons();
            this.allPersons.setParams({
                limit: 999
            });
            this.allPersons.on("reset", this.addAllPersons, this);
            this.allPersons.fetch();
        },

        addAllPersons: function() {
            this.$(".all-persons").append(this.allPersons.map(function(person) {
                return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
            })).select2("enable");
        },

        loadDepartmentPersons: function() {
            this.departmentPersons = new Persons();
            this.departmentPersons.setParams({
                limit: 999,
                filter: {
                    departmentId: this.appealExtraData.get("department").id
                }
            });
            this.departmentPersons.on("reset", this.addDepartmentPersons, this);
            this.departmentPersons.fetch();
        },

        addDepartmentPersons: function() {
            this.$(".department-persons").append(this.departmentPersons.map(function(person) {
                return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
            })).select2("enable");
        },

        loadAppealExtraData: function() {
            var self = this;
            var appealExtraData = new PatientAppeals();
            appealExtraData.patient = this.options.appeal.get("patient");
            appealExtraData.setParams({
                filter: {
                    number: self.options.appeal.get("number")
                }
            });
            appealExtraData.on("reset", this.onAppealExtraDataLoaded, this);
            appealExtraData.fetch();

        },

        onAppealExtraDataLoaded: function(appealExtraData) {

            this.appealExtraData = appealExtraData.first();
            //Врачи отделения
            this.loadDepartmentPersons();

            appealExtraData.off("reset", this.onAppealExtraDataLoaded, this);
        },

        onFilterPersonsChange: function(event) {
            this.$(".all-persons,.department-persons").select2("val", "");

            var selectedFilter = this.getSelectedFilter();

            if (selectedFilter === "all") {
                this.$(".all-persons.select2-container").show();
                this.$(".department-persons.select2-container").hide();
            } else if (selectedFilter === "dep") {
                this.$(".all-persons.select2-container").hide();
                this.$(".department-persons.select2-container").show();
            }
        },

        onAssignOnMeClick: function(event) {
            event.preventDefault();

            var currentUserId = Core.Cookies.get("userId");

            this.$("input[name='filter-persons'][value='all']").prop("checked", true).change();
            this.$(".all-persons").select2("val", currentUserId).change();
        },

        getSelectedFilter: function() {
            return this.$("input[name='filter-persons']:checked").val();
        },

        assignExecPerson: function() {
            var selectedFilter = this.getSelectedFilter();

            var selectedExecPersonId;

            if (selectedFilter === "all") {
                selectedExecPersonId = this.$(".all-persons").select2("val");
            } else if (selectedFilter === "dep") {
                selectedExecPersonId = this.$(".department-persons").select2("val");
            }

            if (selectedExecPersonId) {
                console.log('выбрали', selectedExecPersonId);
                var doctor = this.allPersons.get(selectedExecPersonId).toJSON();
                pubsub.trigger('person:changed', doctor);

                this.close();
            }
        },


        render: function() {
            this.$el.empty().append(_.template(this.template, {
                assignMe: this.assignMe
            }));

            this.$("#filter-persons-container").buttonset();
            this.$(".all-persons, .department-persons").select2().select2("disable");
            this.$(".all-persons").hide();

            return this;
        },

        open: function() {
            var self = this;

            this.$el.dialog({
                title: self.options.title ? self.options.title : "Назначение лечащего врача",
                modal: true,
                width: "50em",
                dialogClass: "webmis",
                resizable: false,
                buttons: [{
                        text: "Назначить",
                        click: this.assignExecPerson,
                        "class": "button-color-green"
                    }, {
                        text: "Отмена",
                        click: this.close
                    }
                ],
                close: this.close
            });

            this.$el.css({
                "min-height": "11em"
            });
        },

        close: function() {
            this.allPersons.off(null, null, this);
            this.departmentPersons.off(null, null, this);
            this.off(null, null, this).remove();
            //pubsub.off('person:changed');
        }
    });
});
