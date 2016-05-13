define(function(require) {

    var Consultation = Model.extend({
        idAttribute: 'id'

    });

    return Collection.extend({
        model: Consultation,
        getMnemFilter: function(){
            var filter = "";
            if (this.mnemFilter && this.mnemFilter.length) {
                filter = '?';
                $.each(this.mnemFilter, function(i, item){
                    if (i != 0) {
                        filter += '&';
                    }
                    filter += 'filter[mnem]='+item;
                });
            }
            return filter;
        },
        url: function() {
            return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/consultations/" + this.getMnemFilter();
        }
    });
});
