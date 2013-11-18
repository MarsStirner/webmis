define(function (require) {
    var Model = require('./Model');

    var Drug = Model.extend({
        initialize: function(){
            console.log('init drug model', this);
        }
    });

    return Drug;
});