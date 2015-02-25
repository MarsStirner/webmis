define(function (require) {
    require('collections/departments');
    var template = require('text!views/prescriptions/templates/appeal/drug-ballance.html');
    var BaseView = require('views/prescriptions/views/BaseView');

    return BaseView.extend({
        template: template,
        initialize: function () {
            var self = this;
            this.collection.on('reset', function () {
                console.log(this.collection);
                if (this.collection.length) {
                    this.collection.each(function(model){
                        if (model.get('balanceOfGoodDataList').length) {
                            self.render();
                        } else {
                            self.renderNotExists();
                        }
                    });
                } else {
                    this.renderNoResults();
                }
            }, this);

            this.departments = new App.Collections.Departments();
            this.departments.setParams({limit: 0});
            this.departments.fetch();
            this.collection.on('fetch', this.renderOnFetch, this);
        },
        renderNoResults: function () {
            this.$el.html('Ничего не нашли.');
        },
        renderOnFetch: function () {
            //console.log('onFetch', this.cid, this.$el.html());

            this.$el.html('Ищем...');
        },
        renderNotExists: function () {
            this.$el.html('Отсутствует на складах.');
        },

        data: function () {
            var data = {};
            var currentDepartment = this.options.appeal.get('currentDepartment').id;
            var items = [];
            var self = this;
            this.collection.each(function(item){
                _.each(item.get('balanceOfGoodDataList'), function(data){
                    var itemJSON = item.toJSON();
                    itemJSON.balanceOfGoodData = data;
                    if (itemJSON.balanceOfGoodData.orgStructureId) {
                        if (!data.disabled && data.value) {
                            if (data.orgStructureId == currentDepartment) {
                                itemJSON.balanceOfGoodData.where = 'inCurrentDepartment';
                                items.unshift(itemJSON);
                            } else if (data.orgStructureId == 1) {
                                itemJSON.balanceOfGoodData.where = 'inHospital';
                                items.push(itemJSON);
                            } else {
                                itemJSON.balanceOfGoodData.where = 'inOtherDepartments';
                                var whereDepartment = _.find(self.departments.models, function(department){
                                    return itemJSON.balanceOfGoodData.orgStructureId == department.get('id');
                                });
                                if (whereDepartment) {
                                    itemJSON.balanceOfGoodData.whereDepartmentName = whereDepartment.get('name');
                                }
                                items.push(itemJSON);
                            }
                        }  
                    }
                })
            });

            data.items = items;

            return data;
        }
    });

});
