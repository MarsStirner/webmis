define(function(require){

    /**
     * Облегчённая коллекция персонала ЛПУ (без bb.relational)
     * @type {*}
     */
    var Persons = Collection.extend({
        model: Backbone.Model.extend({}),

        url: function () {
            var roleFilters = '';
            if (this._params.roleFilter && this._params.roleFilter.length) {
                _.each(this._params.roleFilter, function(filter, i){
                    if (i == 0) {
                        roleFilters = '?filter[roleCode]='+filter;
                    } else {
                        roleFilters += '&filter[roleCode]='+filter;
                    }
                });
            }
            return DATA_PATH + "dir/persons" + roleFilters;
        }
    });

    return Persons;


});
