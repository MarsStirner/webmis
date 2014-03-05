define(function (require) {

    var Template = Model.extend({});

    var Templates = Collection.extend({
        model: Template,
        url: function(){
            return DATA_PATH + 'printTemplate/byContexts/?fields=id,name&context=protokol_gemotransfusia'; 
        }
    });

    return {
        Model: Template,
        Collection: Templates
    };

});
