define(function(require) {

    var ConsultationsGroups = Collection.extend({
        url: function() {
            return DATA_PATH + "dir/actionTypes?filter[mnem]=CONS&filter[view]=tree";
        },
        sync: function(method, model, options) {
            options = options || {};
            options.dataType = "jsonp";
            options.contentType = 'application/json';
            options.jsonpCallback = 'callback';

            Backbone.sync(method, model, options);
        },
    });

    return ConsultationsGroups;


});
