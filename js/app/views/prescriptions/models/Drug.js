define(function (require) {
    var Model = require('./Model');

    var Drug = Model.extend({
        defaults: {
        },
        validateModel: function(){
            var errors = [];
            if(!this.get('dose')){
                errors.push('Не указана дозировка для препарата "'+this.get('name')+'". '); 
            }

            if(errors.length){
                return errors; 
            } 
        },
        selected: function(a,b){
            console.log('ss', a,b); 
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
