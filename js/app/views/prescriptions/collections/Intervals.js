define(function (require) {
    var Collection = require('./Collection');
    var Interval = require('../models/Interval');

    var Intervals = Collection.extend({
        model: Interval,
        initialize: function () {

        },
        addInterval: function (drugs) {
            var interval = new Interval();

            interval.set('drugs', new Backbone.Collection(drugs.toJSON()));
            interval.get('drugs').first().set('dose', this.getDoseBalance(drugs));
            this.add(interval);
        },

        cancelIntervals: function() {
            this.each(function(interval){
                interval.cancel();
            });
        },

        getDoseBalance: function(drugs) {
            var intervalDoseSumm = 0;
            this.each(function(interval){
                if (Array.isArray(interval.get('drugs'))) {
                    intervalDoseSumm += interval.get('drugs')[0].dose ? parseInt(interval.get('drugs')[0].dose) : 0;
                } else {
                    intervalDoseSumm += interval.get('drugs').first().get('dose') ? parseInt(interval.get('drugs').first().get('dose')) : 0;
                }
            });
            return (this.getDoseSumm(drugs) - intervalDoseSumm) > 0 ? this.getDoseSumm(drugs) - intervalDoseSumm : 0;
        },

        calculateVoa: function() {
            return 0;
        },

        getDoseSumm: function(drugs) {
            var summ = 0;
            drugs.each(function(drug){
                summ += parseInt(drug.get('dose'));
            });
            return summ;
        },

        validateCollection: function () {
            var collectionErrors = [];

            var modelsJSON = this.toJSON();

            var ranges = _.filter(modelsJSON, function(mj){
                return !!mj.beginDateTime && !!mj.endDateTime;
            });
            if((ranges.length > 0) && (ranges.length != modelsJSON.length)){
                collectionErrors.push('В назначении не могут быть интервалы разных типов. ');
            }

            _.each(modelsJSON, function (mj) {

                var modelsJSON2 = _.without(modelsJSON, mj);
                _.each(modelsJSON2, function (mj2) {

                    if (mj.beginDateTime && !mj.endDateTime) {
                        if (mj2.beginDateTime && mj2.endDateTime) {
                            var range = moment(mj2.beginDateTime)
                                .twix(mj2.endDateTime);
                            if (range.contains(mj.beginDateTime)) {
                                collectionErrors.push('Начало интервала входит в другой интервал. ');
                            }
                        }

                        if (mj2.beginDateTime && !mj2.endDateTime) {
                            var diff = moment(mj.beginDateTime)
                                .startOf('minutes')
                                .diff(moment(mj2.beginDateTime)
                                    .startOf('minutes'));
                            if (diff === 0) {
                                collectionErrors.push('Совпадают начала интервалов. ');
                            }
                        }
                    }

                    if (mj.beginDateTime && mj.endDateTime) {
                        if (mj2.beginDateTime && mj2.endDateTime) {
                            var range1 = moment(mj.beginDateTime).startOf('minutes').twix(moment(mj.endDateTime).startOf('minutes'));
                            var range2 = moment(mj2.beginDateTime).startOf('minutes').twix(moment(mj2.endDateTime).startOf('minutes'));
                            if (range1.overlaps(range2)) {
                                collectionErrors.push('Пересечение интервалов. ')
                            }
                        }
                    }

                });


            });

            collectionErrors = _.uniq(collectionErrors);

            this.each(function (model) {
                var errors = model.validateModel();
                if (errors && errors.length) {
                    collectionErrors = collectionErrors.concat(errors);
                }
            });

            if (collectionErrors.length) {
                return collectionErrors;
            }
        },

        execute: function (opts) {
            var ids = this.map(function (model) {
                return model.get('id');
            });

            var options = {
                data: JSON.stringify({
                    data: ids
                }),
                url: '/api/v1/prescriptions/executeIntervals',
                type: 'PUT',
                dataType: "jsonp",
                contentType: 'application/json'
            };

            return $.ajax(_.extend(options, opts));
        },

        update: function (opts) {
            var options = {
                data: JSON.stringify({
                    data: this.toJSON()
                }),
                url: '/api/v1/prescriptions/intervals',
                type: 'PUT',
                dataType: "jsonp",
                contentType: 'application/json'
            };

            return $.ajax(_.extend(options, opts));
        }
    });

    return Intervals;
});
