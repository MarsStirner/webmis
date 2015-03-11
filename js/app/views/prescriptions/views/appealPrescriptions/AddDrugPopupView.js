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
            }, this);
        },

        validateForm: function () {
            var found = (this.balanceView.data() && this.balanceView.data().items.length);
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

            this.balance.fetch({
                dataType: "json",
                contentType: "application/json; charset=utf-8",
            }).done(function () {
                 console.log('balance', self.balance);
            });

            //console.log('searchByNomen', item)

        },

        onSave: function () {
            var first = this.balance.first();
            var drugs = this.prescription.get('drugs');
            var units = [{
                id: 327,
                code: 'мг'
            }];

            if(first.get('unitId') !== 327){
                units.push({
                    id: first.get('unit_id'),
                    code: first.get('unitName')
                });
            }

            // units = _.map(units, function(unit){
            //     if(unit.id = )
            // });

            console.log(first);

            var drug = {
                "nomen": first.get('id'),
                "name": first.get('tradeLocalName'),
                "dose": "",
                "unit": 327,
                "units": units,
                "dosage": first.get('dosageValue') ? first.get('dosageValue') + first.get('dosageUnitCode') : '',
                "form": first.get('form') + ', ' + first.get('filling')

                // "unitName": first.get('unitName')
            };

            console.log('add drug', drug);

            drugs.add(drug);
            this.close();
        },


        afterRender: function () {
            var self = this;
            self.ui = {};
            self.ui.$drugName = this.$el.find('#drug-name');

            self.saveButton(false);
            self.ui.$drugName.autocomplete({
                source: function (request, response) {
                    $.getJSON(DATA_PATH + "rls/?text="+request.term, function (raw) {
                        _.each(raw, function(item){
                            item.getStore = function() {
                                var store = {};
                                if (this.balanceOfGoodDataList.length) {
                                    _.each(this.balanceOfGoodDataList, function(goodStore){
                                        if (goodStore.orgStructureId == Core.Cookies.get("userDepartmentId")) {
                                            store = {
                                                id: goodStore.orgStructureId,
                                                label: 'на складе отделения',
                                                color: '#c5e4ff'
                                            }
                                        } else if (goodStore.orgStructureId > 1 && (!store.id || store.id == 1)) {
                                            store = {
                                                id: goodStore.orgStructureId,
                                                label: 'на складах других отделений',
                                                color: '#cdffd7'
                                            }
                                        } else if (!store.id && goodStore.orgStructureId == 1) {
                                            store = {
                                                id: goodStore.orgStructureId,
                                                label: 'на складе ЛПУ',
                                                color: '#fdffb7'
                                            }
                                        }
                                    });
                                }
                                if (!store.id) {
                                    store = {
                                        id: null,
                                        label: 'отсутствует',
                                        color: '#ffc7c7'
                                    }
                                }
                                return store
                            };
                        });
                        response($.map(raw, function (item) {
                            return {
                                label: item.tradeLocalName+' ('+item.tradeName+') '+item.form+' '+item.dosageValue+' '+item.dosageUnitCode+' '+item.filling,
                                value: item.tradeLocalName,
                                id: item.id,
                                store: item.getStore()
                            };
                        }));
                    });
                },
                minLength: 2,
                select: function (event, ui) {
                    var item = ui.item;
                    if (item && item.id) {
                        self.searchByNomen(item);
                    }
                }
            });
            if (self.ui.$drugName) {
                self.ui.$drugName.data('uiAutocomplete')._renderItem = function (ul, item) {
                    return $( "<li>" )
                     .css('background-color', item.store.color)
                     .append( $( "<a>" ).text( item.label ).append( $("<span>").text(item.store.label).css({'float': 'right'}) ) )
                     .appendTo( ul );
               }
            };
        }


    }).mixin([popupMixin]);

    return AddDrugPopup;
});
