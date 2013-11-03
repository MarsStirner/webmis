define(function(require) {
    var template = require('text!views/prescriptions/templates/appeal/intervals.html');
    var BaseView = require('../BaseView');
//    var IntervalView = require('./IntervalView');


    return BaseView.extend({
        template: template,
        initialize: function(){
            console.log('init new intervals view');
        }
    });

});