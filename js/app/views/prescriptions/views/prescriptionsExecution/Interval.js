define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var template = require('text!views/prescriptions/templates/prescriptionsExecution/interval.html');
    require('qtip');
    var tooltipTemplate = _.template(require('text!views/prescriptions/templates/tooltip.html'), null, {
        variable: 'data'
    });



    return BaseView.extend({
        template: template,
        tagName: 'span',
        initialize: function(){
            var prescriptionId = this.model.get('actionId');
            this.prescription = this.options.mainCollection.get(prescriptionId);
        
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
            console.log('interval data', data);
            return data;
        },

        getTooltipText: function (id) {
            var html = tooltipTemplate(this.prescription.toJSON());
            return html;
        },

        getContextMenuExecuteItem: function () {
            var item = {};
            item.name = "Выполнить";
            item.callback = function (key, opt) {
                var id = opt.$trigger.data('prescription');
                console.log('execute', id, opt);
            };

            return item;
        },

        getContextMenuCancelItem: function () {
            var item = {};
            item.name = "Отменить";
            item.callback = function (key, opt) {
                var id = opt.$trigger.data('prescription');
                console.log('cancel', id, opt);
            };

            return item;
        },

        getContextMenuCancelExecutionItem: function () {
            var item = {};
            item.name = "Отменить исполнение";
            item.callback = function () {
                console.log('cancelExecution');
            };

            return item;
        },

        getContextMenuItems: function () {
            var items = {};
            var state = this.model.getState();
            var status = this.model.get('status');
            console.log('state', state);
            console.log('status', status);
            
            if((state === 'runs') || (state === 'notExecuted')){
                console.log('execute')
                items.execute = this.getContextMenuExecuteItem();
            }
            
            if(state === 'assigned'){
                items.cancel = this.getContextMenuCancelItem();
            }

            items.cancelExecution = this.getContextMenuCancelExecutionItem();
            console.log('items', items, this);

            return items;
        },

        afterRender: function () {
            var self = this;
            var prescriptionId = this.model.get('actionId');
            var prescription = this.options.mainCollection.get(prescriptionId);

            this.$el.qtip({
                content: {
                    title: prescription.get('name'),
                    text: this.getTooltipText(prescriptionId)
                },
                style: 'qtip-light',
                position: {
                    my: 'bottom left',
                    at: 'top left',
                    viewport: $('.groups')
                },
                prerender: true
            });


            $.contextMenu({
                autoHide: true,
                selector: '[data-prescription="'+self.model.get("id")+'"]',
                callback: function (key, options) {},
                items: self.getContextMenuItems()
            });


        }

    });
});
