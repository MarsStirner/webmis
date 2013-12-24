define(function (require) {
    var list = require('text!views/prescriptions/templates/list.html');
    var BaseView = require('views/prescriptions/views/BaseView');
    require('qtip');
    var tooltipTemplate = _.template(require('text!views/prescriptions/templates/tooltip.html'), null, {
        variable: 'data'
    });


    return BaseView.extend({
        template: list,
        events: {
            'change [data-prescription-id]': 'onSelectPrescription'
        },
        initialize: function () {
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
            this.$el.html('Ничего не нашли.');
        },
        renderOnFetch: function () {
            //console.log('onFetch', this.cid, this.$el.html());

            this.$el.html('Ищем...');
        },

        onSelectPrescription: function(e){
            var $target = this.$(e.target);
            var selected = $target.prop('checked');
            var id = $target.data('prescriptionId');
            var prescription = this.collection.get(id);
            prescription.set('selected', selected);
        },

        getRangeMinutes: function () {
            var rangeMin = moment(this.collection._filter.dateRangeMin * 1000);
            var rangeMax = moment(this.collection._filter.dateRangeMax * 1000);
            var minutes = rangeMax.diff(rangeMin, 'minutes');
            return minutes;
        },

        getIntervalCoordinates: function (interval) {
            var defaultIntervalLength = 45 * 60 * 1000;
            var rangeStart = this.collection._filter.dateRangeMin * 1000;
            var rangeEnd = this.collection._filter.dateRangeMax * 1000;
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
            //console.log('data', this.collection, this.getRangeMinutes());
            var modelsGroupedByMoa = this.collection.groupBy(function (model) {
                return model.get('moa');
            });

            var groupedByMoaArray = _.map(modelsGroupedByMoa, function (group, key) {

                var json = _.map(group, function (model) {
                    var ais = model.get('assigmentIntervals');
                    ais.each(function (ai) {
                        var eis = ai.get('executionIntervals');
                        eis.each(function (ei) {
                            var coordinates = this.getIntervalCoordinates(ei);
                            if (!_.isEmpty(coordinates)) {
                                ei.set(coordinates);
                            }

                        }, this);
                    }, this);

                    var data = model.toJSON();
                    return data;
                }, this);

                var data = {};
                data[key] = json;

                return data;
            }, this);

            var groupedByMoa = {};
            _.each(groupedByMoaArray, function (group) {
                groupedByMoa = _.extend(groupedByMoa, group);
            });

            //console.log('groupedByMoa', groupedByMoa);
            var data = {};
            data.groupedByMoa = groupedByMoa;
            data.items = this.collection.toJSON();
            //console.log('data', data)
            return data;
        },

        getTooltipText: function (id) {
            var prescription = this.collection.get(id);
            // console.log('tt data', prescription.toJSON())
            var html = tooltipTemplate(prescription.toJSON());
            return html;
        },


        afterRender: function () {
            var self = this;
            $('[data-prescription]')
            .each(function () {
                var $el = $(this);

                $el.qtip({
                    content: {
                        // title: event.name,
                        text: self.getTooltipText($el.data('prescription'))
                    },
                    style: 'qtip-light',
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        viewport: $('.calendar')

                    },
                    prerender: true
                });

            });

                $.contextMenu({
                    autoHide: true,
                    selector: '[data-prescription]',
                    callback: function(key, options) {
                        //var m = "clicked: " + key + " " + options.$trigger.data("cid");

                        //console.log(arguments, options.$trigger.data("cid"));
                    },
                    items: {
                        "execute": {
                            name: "Выполнить",
                            callback: function() {
                                console.log('execute', arguments);
                            }
                        },
                        "cancel": {
                            name: "Отменить",
                            callback: function() {
                                console.log('cancel');
                            }
                        },
                        "cancelExecution": {
                            name: "Отменить исполнение",
                            callback: function() {
                                console.log('cancelExecution');
                            }
                        }
                    }
                });


        }
    });

});
