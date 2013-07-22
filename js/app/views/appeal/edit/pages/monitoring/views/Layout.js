define(function(require) {
    var shared = require('views/appeal/edit/pages/monitoring/shared');

    var monitoringTmpl = require('text!templates/appeal/edit/pages/monitoring/layout.tmpl');

    var Card = require('views/appeal/edit/pages/card');
    var ChemotherapyInfo = require('views/appeal/edit/pages/monitoring/views/ChemotherapyInfo');
    var ExpressAnalyses = require('views/appeal/edit/pages/monitoring/views/ExpressAnalysesView');
    var Header = require('views/appeal/edit/pages/monitoring/views/Header');
    var MonitoringInfoGrid = require('views/appeal/edit/pages/monitoring/views/MonitoringInfoGrid');
    var PatientDiagnosesList = require('views/appeal/edit/pages/monitoring/views/PatientDiagnosesList');
    var PatientInfo = require('views/appeal/edit/pages/monitoring/views/PatientInfo');
    var SignalInfo = require('views/appeal/edit/pages/monitoring/views/SignalInfo');

    var Layout = Card.extend({
        className: "monitoring-layout",

        template: monitoringTmpl,

        initialize: function() {
            shared.models.appeal = this.model = this.options.appeal;
            shared.appealJSON = shared.models.appeal.toJSON();
            this.canPrint = false;

            pubsub.on('appeal:closed', function() { //когда закрыли историю болезни
                shared.models.appeal.fetch();
            });

            shared.models.appeal.on('change reset', function() {
                console.log('appeal change', shared.models.appeal);
                this.render();
            }, this);

        },

        render: function() {
            this.trigger("change:printState");

            //console.time("layout render time");

            this.$el.html(_.template(this.template, shared.appealJSON));


            this.assign({
                ".monitoring-layout-header": new Header()
                ,".patient-info": new PatientInfo()
                ,".signal-info": new SignalInfo()
                ,".patient-diagnoses-list": new PatientDiagnosesList()
                ,".chemotherapy-info": new ChemotherapyInfo()
                // ,".monitoring-info": new MonitoringInfoGrid()
                // ,".express-analyses": new ExpressAnalyses()
            });

            //console.timeEnd("layout render time");

            return this;
        }
    });

    return Layout;

});
