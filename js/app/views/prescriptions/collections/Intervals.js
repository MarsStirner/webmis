define(function (require) {
    var Collection = require('./Collection');
    var Interval = require('../models/Interval');

    var Intervals = Collection.extend({
        model: Interval,
        initialize: function(){
            console.log('init intervals collection', this);
        }
    });

    return Intervals;
});