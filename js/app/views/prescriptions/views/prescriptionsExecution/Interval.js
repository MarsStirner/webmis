define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var template = require('text!views/prescriptions/templates/prescriptionsExecution/interval.html');
    require('qtip');
    var intervalTooltipTemplate = _.template(require('text!views/prescriptions/templates/interval-tooltip.html'), null, {
        variable: 'data'
    });
    var IntervalEdit = require('views/prescriptions/views/prescriptionsExecution/IntervalEdit');



    return BaseView.extend({
        template: template,
        tagName: 'span',
        initialize: function () {
            var prescriptionId = this.model.get('actionId');
            this.prescription = this.options.mainCollection.get(prescriptionId);

            // console.log('init interval', this.prescription);
        },

        getIntervalCoordinates: function (interval) {
            var defaultIntervalLength = 45 * 60 * 1000;
            var rangeStart = this.options.mainCollection._filter.dateRangeMin * 1000;
            var rangeEnd = this.options.mainCollection._filter.dateRangeMax * 1000;
            var intervalStart = interval.get('beginDateTime');
            var intervalEnd = interval.get('endDateTime');
            var coordinates = {};

            if ((intervalStart < rangeStart) && intervalEnd && (intervalEnd > rangeStart)) {
                intervalStart = rangeStart;
            }

            if ((intervalStart >= rangeStart) && (intervalStart <= rangeEnd)) {
                coordinates.x1 = (intervalStart - rangeStart) / (rangeEnd - rangeStart) * 100;
            }

            if (!intervalEnd) { //для интервалов без окончания задаём длинну
                intervalEnd = intervalStart + defaultIntervalLength;
            }

            if (intervalEnd > rangeEnd) { //обрезаем если окончание интервала выходит за пределы диапозона
                intervalEnd = rangeEnd;
            }

            if ((intervalEnd > rangeStart) && (intervalEnd <= rangeEnd) && _.isNumber(coordinates.x1)) {
                coordinates.x2 = (intervalEnd - rangeStart) / (rangeEnd - rangeStart) * 100;
                coordinates.w = coordinates.x2 - coordinates.x1;
            }
            //console.log('coordinates', coordinates);
            return coordinates;
        },

        data: function () {
            var data = {};
            data = this.model.toJSON();
            var coordinates = this.getIntervalCoordinates(this.model);
            _.extend(data, coordinates);
            // console.log('interval data', data);
            return data;
        },

        getTooltipText: function (id) {
            var html = intervalTooltipTemplate({
                prescription: this.prescription.toJSON(),
                interval: this.model.toJSON()
            });
            return html;
        },

        getContextMenuExecuteItem: function () {
            var self = this;
            var item = {};

            item.name = "Выполнить";
            item.callback = function (key, opt) {
                self.model.execute().then(function () {
                    self.options.mainCollection.fetch();
                });
            };

            return item;
        },

        getContextMenuCancelItem: function () {
            var self = this;
            var item = {};

            item.name = "Отменить";
            item.callback = function (key, opt) {
                self.model.cancel().then(function () {
                    self.options.mainCollection.fetch();
                });
            };

            return item;
        },

        getContextMenuCancelExecutionItem: function () {
            var item = {};
            var self = this;
            item.name = "Отменить исполнение";
            item.callback = function () {
                self.model.cancelExecution().then(function () {
                    self.options.mainCollection.fetch();
                });
            };

            return item;
        },

        getContextMenuEditItem: function () {
            var self = this;
            var item = {};
            item.name = "Редактировать";
            item.callback = function () {
                self.openEditPopup();
            };
            // item.disabled = true;
            return item;
        },

        openEditPopup: function () {
            var intervalEdit = new IntervalEdit({
                model: this.options.model
            });
            intervalEdit.render().open();
            console.log('openEditPopup', this.model);

        },

        getContextMenuItems: function () {
            var items = {};
            var state = this.model.getState();
            var status = this.model.get('status');

            if ((state === 'runs') || (state === 'notExecuted')) {
                items.execute = this.getContextMenuExecuteItem();
            }

            if (state === 'assigned') {
                items.cancel = this.getContextMenuCancelItem();
            }

            if (state === 'executed') {
                items.cancelExecution = this.getContextMenuCancelExecutionItem();
            }

            items.edit = this.getContextMenuEditItem();

            return items;
        },

        afterRender: function () {
            var self = this;
            this.$el.qtip({
                content: {
                    // title: prescription.get('name'),
                    text: this.getTooltipText()
                },
                style: 'qtip-light',
                position: {
                    my: 'bottom left',
                    at: 'top left',
                    viewport: $('.groups')
                }
            });


            $.contextMenu({
                autoHide: true,
                selector: '[data-prescription="' + self.model.get("id") + '"]',
                callback: function (key, options) {},
                items: self.getContextMenuItems()
            });


        },
        tearDown: function () {
            $.contextMenu('destroy');
            BaseView.prototype.tearDown.call(this)
        },

    });
});
