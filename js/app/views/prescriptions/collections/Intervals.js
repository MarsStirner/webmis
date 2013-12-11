define(function (require) {
    var Collection = require('./Collection');
    var Interval = require('../models/Interval');

    var Intervals = Collection.extend({
        model: Interval,
        initialize: function(){
            // console.log('init intervals collection', this);
        },
        addInterval: function(){
            var interval = new Interval();
            this.add(interval); 
        },
        execute: function(opts) {
            var ids = this.map(function(model){
                return model.get('id');
            });

            var options = {
                data: JSON.stringify({data:ids}),
                url : '/api/v1/prescriptions/executeIntervals',
                type: 'PUT',
                dataType : "jsonp",
                contentType : 'application/json'
            }

            return $.ajax(_.extend(options, opts))
        }
    });

    return Intervals;
});
