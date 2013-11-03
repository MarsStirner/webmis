define(function (require) {
    var Collection = require('./Collection');
    var Drug = require('../models/Drug');

    var Drugs = Collection.extend({
        model: Drug,
        initialize: function(){
            console.log('init drugs collection', this);
        }
    });

    return Drugs;
});