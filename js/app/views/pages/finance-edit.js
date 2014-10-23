define([
    "collections/contracts",
    "collections/event-types"
], function (Contracts, userPermissions) {
    App.Views.FinanceEdit = Form.extend({
        model: App.Models.Appeal,

        initialize: function () {
            this.options.model.set('disableNoty', true);
            var view = this;
            Cache.Patient = this.model.get("patient");
            this.model.fetch({
                success: function () {
                    view.loadTemplate("pages/finance-edit");
                }
            });

            this.on("template:loaded", function () {
                var appealDicts = [{
                        name: "financeTypes",
                        pathPart: "finance"
                    }, {
                        name: "requestTypes",
                        pathPart: "requestTypes"
                    }
                ];

                this.initWithDictionaries(appealDicts, this.ready, this, true);

            }, this);

            this.contracts = new Contracts();
            this.contracts.on('reset', this.showContracts, this);
        },

        onSave: function (event) {
            var self = this;
            self.$(".Save").attr("disabled", true);

            var readyToSave = this.save(event, {
                error: function () {
                    console.log('error', arguments);
                    self.$(".Save").attr("disabled", false);
                },
                success: function(){
                    console.log('success', arguments);
                    // self.$(".Save").attr("disabled", false);
                }
            });
            this.$(".Save").attr("disabled", readyToSave);
        },

        getContracts: function () {
            var self = this;

            this.resetContract();
            var eventType = this.model.get("appealType").get("eventType");
            this.contracts.eventTypeId = eventType.get('id');

            this.$("[name='contract']").html('');
            if (this.contracts.eventTypeId) {
                this.contracts.fetch();//.done(this.showContracts.bind(this));
            }
        },

        showContracts: function () {
            this.$("[name='contract']").html('').append(this.contracts.map(function (contract) {
                return $("<option value='" + contract.get("id") + "'>" + contract.get("number") + "</option>");
            })).trigger('change').prop("disabled", this.contracts.length === 1);

            UIInitialize(this.$("[name='contract']").parent());
            if(!this.contracts.length){
                this.resetContract();
            }

        },

        resetContract: function(){
            this.model.set('contract', {});
        },

        onChangeContract: function(e){
            var $target = this.$(e.target);
            var contractId = $target.val();

            if(contractId){
                contract = this.contracts.find(function(model){
                    return model.get('id') == contractId;
                });
                this.model.set('contract', contract);
            }

        },

        ready: function (dicts) {
            var view = this;

            var result = this.model.toJSON();
            result.patient = this.model.get("patient").toJSON();
            result.dicts = dicts;


            result.dicts.requestTypes = _(result.dicts.requestTypes).filter(function (rType) {
                return ["clinic", "hospital", "1", "2"].indexOf(rType.code) !== -1;
            });

            this.$el.html($("#appeal-edit-common").tmpl(result));

            this.eventTypes = new App.Collections.EventTypes();

            this.eventTypes._params = {};

            this.eventTypes.on("reset", function () {
                var eventType = {id:'', name:''};

                if (this.eventTypes.length) {
                    eventType = this.eventTypes.first().toJSON();
                }
                this.model.get("appealType").get("eventType").set(eventType);

                this.$("[name='event_type[id]']").html('');
                this.$("[name='event_type[id]']").append(this.eventTypes.map(function (eventType) {
                    return $("<option value='" + eventType.get("id") + "'>" + eventType.get("value") + "</option>");
                })).trigger('change').prop("disabled", this.eventTypes.length === 1);

                UIInitialize(this.$("[name='contract']").parent());

            }, this);

            var onAppealTypeChange = function () {
                var requestTypeId = view.model.get("appealType").get("requestType").get("id");
                var financeId = view.model.get("appealType").get("finance").get("id");

                if (requestTypeId && financeId) {
                    // console.log(requestTypeId, financeId);
                    view.eventTypes.setParams({
                        filter: {
                            requestType: view.model.get("appealType").get("requestType").get("id"),
                            finance: view.model.get("appealType").get("finance").get("id")
                        }
                    });

                    view.eventTypes.fetch();
                } else {
                    view.eventTypes.reset([]);
                }
            };

            this.model.get("appealType").get("requestType")
                .on("change", onAppealTypeChange, this);

            this.model.get("appealType").get("finance")
                .on("change", onAppealTypeChange, this);

            this.model.get("appealType").get("eventType")
                .on("change", function () {
                    // console.log('change eventType', this.model.get('appealType').get('eventType').toJSON());
                    this.getContracts();
                }, this);

            this.model.get("rangeAppealDateTime").connect("start", "appeal[date][start]", this.$el);
            this.model.get("rangeAppealDateTime").connect("start", "appeal[time][start]", this.$el);

            if (!this.model.get("rangeAppealDateTime").get("start")) {
                this.model.get("rangeAppealDateTime").set("start", new Date().getTime());
            }

            this.model.get("rangeAppealDateTime").connect("end", "appeal[date][end]", this.$el);
            this.model.get("rangeAppealDateTime").connect("end", "appeal[time][end]", this.$el);


            this.model.connect("number", "number", this.$el);
            //this.model.get("appealType").connect("id", "appeal_type[id]", this.$el );

            this.model.get("appealType").get("requestType").connect("id", "request_type[id]", this.$el);
            this.model.get("appealType").get("finance").connect("id", "finance[id]", this.$el);
            this.model.get("appealType").get("eventType").connect("id", "event_type[id]", this.$el);

            this.model.connect("urgent", "urgent", this.$el);

            this.model.connect("appealWithDeseaseThisYear", "appealWithDeseaseThisYear", this.$el);
            this.model.connect("refuseAppealReason", "refuse_appeal_reason", this.$el);

            this.model.connect("agreedDoctor", "agreed_doctor[name]", this.$el);
            this.model.get("agreedType").connect("id", "agreed_type[id]", this.$el);
            /*this.model.get("agreedDoctor" ).get("name").connect("raw", "agreed_doctor[name]", this.$el );*/

            this.model.get("assignment").connect("directed", "assignment[directed]", this.$el);
            this.model.get("assignment").connect("doctor", "assignment[doctor][name]", this.$el);

            this.model.get("assignment").connect("number", "assignment[number]", this.$el);
            this.model.get("assignment").connect("assignmentDate", "assignment[assignment_date]", this.$el);

            this.model.get("hospitalizationType").connect("id", "hospitalization_type[id]", this.$el);
            this.model.get("hospitalizationPointType").connect("id", "hospitalization_point_type[id]", this.$el);
            //this.model.get( "hospitalizationChannelType" ).connect("id", "hospitalization_channel_type[id]", this.$el );

            this.model.connect("movingType", "moving_type", this.$el);
            this.model.connect("reopening", "reopening", this.$el);

            this.model.connect("deliveredType", "delivered_type[id]", this.$el);
            this.model.connect("deliveredAfterType", "delivered_after_type[id]", this.$el);
            this.model.connect("stateType", "state_type", this.$el);
            //this.model.get( "drugsType" ).connect("id", "drugs_type[id]", this.$el );
            this.model.connect("ambulanceNumber", "ambulance_number", this.$el);

            /*this.model.get( "physicalParameters" ).get("bloodPressure").connect("left", "physical_parameters[blood_pressure][left]", this.$el );
			 this.model.get( "physicalParameters" ).get("bloodPressure").connect("right", "physical_parameters[blood_pressure][right]", this.$el );*/
            this.model.get("physicalParameters")
                .get("bloodPressure")
                .get("left")
                .connect("syst", "physical_parameters[blood_pressure][left][syst]", this.$el);
            this.model.get("physicalParameters")
                .get("bloodPressure")
                .get("left")
                .connect("diast", "physical_parameters[blood_pressure][left][diast]", this.$el);
            this.model.get("physicalParameters")
                .get("bloodPressure")
                .get("right")
                .connect("syst", "physical_parameters[blood_pressure][right][syst]", this.$el);
            this.model.get("physicalParameters")
                .get("bloodPressure")
                .get("right")
                .connect("diast", "physical_parameters[blood_pressure][right][diast]", this.$el);
            this.model.get("physicalParameters")
                .connect("temperature", "physical_parameters[temperature]", this.$el);
            this.model.get("physicalParameters")
                .connect("weight", "physical_parameters[weight]", this.$el);
            this.model.get("physicalParameters")
                .connect("height", "physical_parameters[height]", this.$el);

            this.model.connect("injury", "injury", this.$el);

            //Приемное отделение по умолчанию
            if (!this.model.get("orgStructStay")) this.model.set("orgStructStay", 28);
            this.model.connect("orgStructStay", "org_struct_stay", this.$el);

            this.model.connect("orgStructDirectedFrom", "org_struct_directed_from", this.$el);

            UIInitialize(this.el);

            this.$(".Save").button();
            this.$(".MKBLauncher").button({
                icons: {
                    primary: "icon-book"
                }
            });

            var patient = this.model.get('patient');
            var patientId = patient.get('id');

        },

        render: function () {
            return this;
        }
    });
});
