define(function (require) {
    var Model = require('./Model');

    var Interval = Model.extend({
        defaults: {
            beginDateTime: (new Date()).getTime(),
            endDateTime: null,
            status: 0
        },
        delete: function(){
            this.collection.remove(this); 
        }
    });

    return Interval;
});
