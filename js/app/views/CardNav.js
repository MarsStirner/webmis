define(function(require){
'use strict';
    var template = require('text!/templates/card-nav.html');
    var _ = require('underscore');

    var CardNav = Backbone.View.extend({
        template: template,
        initialize: function(){
            _.bindAll( this, 'render' );
            if(!this.options.patient){
                throw new Error('patient option required');
            }
            if(!this.options.structure){
                throw new Error('structure option required'); 
            }
        
        },
        data: function(){
            var data = {};
            data.patient = this.options.patient.toJSON();
            data.structure = this.options.structure.toJSON();

            return data;
        },
        render: function(){
            this.$el.html(_.template(this.template, this.data)); 
            return this;
        }
    });

    return CardNav;
});
