define(function(require){
    var popupMixin = require('mixins/PopupMixin');

    return View.extend({
        template:'',
        render: function(){
            this.$el.html('hello world');

            return this;
        },
        onSave: function() {
            console.log('onSave close appeal');
        }


    }).mixin([popupMixin]);



});
