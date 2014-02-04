define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var template = require('text!views/prescriptions/templates/appeal/add-drug-popup.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    var DrugBalance = require('views/prescriptions/collections/DrugBalance');

    var DrugBalanceView = require('views/prescriptions/views/appealPrescriptions/DrugBalanceView');

    var AddDrugPopup = BaseView.extend({
        template: template,
        initialize: function () {
            this.options.title = 'Поиск препарата';

            this.balance = new DrugBalance();
            this.balanceView = new DrugBalanceView({
                collection: this.balance,
                appeal: this.options.appeal
            });
            this.prescription = this.options.prescription;
            this.addSubViews({
                '.balance': this.balanceView
            });
            this.balance.on('reset', function () {
                this.validateForm();
            }, this);
            this.balance.on('fetch', function () {
                this.saveButton(false);
            }, this)
        },

        validateForm: function () {
            var found = ((this.balanceView.inHospital()).length || (this.balanceView.inCurrentDepartment()).length || (this.balanceView.inOtherDepartments()).length)
            this.saveButton(found);
        },

        saveButton: function (enabled, msg) {
            var $saveButton = this.$el.closest('.ui-dialog')
                .find('.save');
            $saveButton.button();

            if (enabled) {
                $saveButton.button('enable');
            } else {
                $saveButton.button('disable');
            }
            if (msg) {
                $saveButton.button('option', 'label', msg);
            } else {
                $saveButton.button('option', 'label', 'Сохранить');
            }

        },

        className: 'popup',

        searchByNomen: function (item) {
            var self = this;

            this.balance.nomenId = item.id;

            this.balance.fetch().done(function () {
                // console.log('balance', self.balance);
            })

            //console.log('searchByNomen', item)

        },

        onSave: function () {
            //console.log('add drug')
            var drug = this.balance.first();
            var drugs = this.prescription.get('drugs');
            drugs.add({
                "nomen": drug.get('rlsNomenId'),
                "name": drug.get('tradeLocalName'),
                "dose": "",
                "unit": drug.get('unitId'),
                "unitName": drug.get('unitName')
            })
            this.close();
        },


        afterRender: function () {
            var self = this;
            self.ui = {};
            self.ui.$drugName = this.$el.find('#drug-name');

            self.saveButton(false);
            self.ui.$drugName.autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '/api/v1/rls/',
                        dataType: 'jsonp',
                        data: {
                            name: request.term
                        },
                        success: function (raw) {
                            // console.log('success', raw);
                            response($.map(raw.data, function (item) {
                                return {
                                    label: item.tradeLocalName + '(' + item.tradeName + ') ' + item.formName + ' ' + item.dosageValue + ' ' + item.unitName,
                                    value: item.tradeLocalName,
                                    id: item.id
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function (event, ui) {
                    var item = ui.item;
                    if (item && item.id) {
                        self.searchByNomen(item);

                    }
                    //console.log('ui', event, ui)

                }
            })
        }


    }).mixin([popupMixin]);

    return AddDrugPopup;
});