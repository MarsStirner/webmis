define(function (require) {
    var Model = require('./Model');

    var Drug = Model.extend({
        defaults: {
            beginDateTime: 123456789 
        },
        initialize: function(){
//            console.log('init drug model', this);
        },
        delete: function(){
            this.collection.remove(this) 
        }
    });

    return Drug;
});
