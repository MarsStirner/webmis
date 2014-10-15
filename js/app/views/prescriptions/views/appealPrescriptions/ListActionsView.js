define(function (require) {
    var template = require('text!views/prescriptions/templates/appeal/prescriptions-actions.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    var PrescriptionNewView = require('views/prescriptions/views/appealPrescriptions/PrescriptionNewView');
    var CreatePrescriptionButton = require('views/prescriptions/views/appealPrescriptions/CreatePrescriptionButton');
    var PrintButton = require('views/prescriptions/views/PrintPrescriptionButton');

    return BaseView.extend({
        template: template,
        initialize: function () {
            var createPrescriptionButtonView = new CreatePrescriptionButton({
                appeal: this.options.appeal
            });

            var printButton = new PrintButton({
                collection: this.options.collection
            });

            this.addSubViews({
                '.create-prescription-button': createPrescriptionButtonView,
                '.print-button': printButton
            });


        },
        data: function () {
            var data = {
                appeal: this.options.appeal.toJSON()
            };
            console.log('data', data)
            return data;
        },
        createPrescription: function () {
            var popup = new PrescriptionNewView({
                actionTypeId: 754,
                appeal: this.options.appeal,
                collection: this.options.collection
            });

            popup.render();
            popup.open();

        },
        afterRender: function () {
        //    this.$el.find('button').button();
        }
    });

});
