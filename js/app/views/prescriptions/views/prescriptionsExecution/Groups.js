define(function (require) {
    var groups = require('text!views/prescriptions/templates/prescriptionsExecution/groups.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    var GroupView = require('views/prescriptions/views/prescriptionsExecution/Group');


    return BaseView.extend({
        template: groups,

        initialize: function () {
            this.childs = [];

            this.collection.on('reset', function () {
                if (this.collection.length) {
                    this.render();
                } else {
                    this.renderNoResults();
                }
            }, this);
            this.collection.on('fetch', this.renderOnFetch, this);
        },

        renderNoResults: function () {
            this.$el.html('Нет данных.');
        },

        renderOnFetch: function () {
            this.$el.html('Загружаем...');
        },

        closeChilds: function () {
            _.invoke(this.childs, 'tearDown');
        },

        tearDown: function () {
            this.closeChilds();
            BaseView.prototype.tearDown.call(this);
        },

        renderChilds: function () {
            this.closeChilds();

            var data = this.data();
            var groups = data.groups;
            var $groupsEl = this.$el.find('.groups');

            _.each(groups, function (group, groupName) {
                var groupView = new GroupView({
                    group: group,
                    groupName: groupName,
                    mainCollection: this.collection
                });
                this.childs.push(groupView);
                $groupsEl.append(groupView.render().el);

            }, this);

        },

        render: function () {
            BaseView.prototype.render.call(this);
            this.renderChilds();
            return this;
        },

        data: function () {
            var data = {};

            data.groups = this.collection.groupBy(function (model) {
                return model.get(this.collection._filter.groupBy);
            }, this);

            // console.log('data', data);
            return data;
        }
    });

});
