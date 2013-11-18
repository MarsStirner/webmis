define(function(require){

    var BedProfileDir = Collection.extend({
        url: function(){
            return '/api/v1/dir/bed_profile'; 
        }    
    });

    return BedProfileDir;
});
