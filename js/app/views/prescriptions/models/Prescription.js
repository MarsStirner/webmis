define(function (require) {
    var Model = require('./Model');
    var Drugs = require('../collections/Drugs');
    var Intervals = require('../collections/Intervals');
    var Collection = require('../collections/Collection');
    var PrescriptionTemplate = require('./PrescriptionTemplate');

    var Prescription = Model.extend({
        initialize: function (model, options) {
            var self = this;
            this.actionTypeId = options.actionTypeId ? options.actionTypeId : false;

            console.log('prescription model init', arguments);
        },
        initialized: function(){
            var dfd = $.Deferred();
            var self = this;
            if(self.actionTypeId){
                self.template = new PrescriptionTemplate({},{
                    actionTypeId: self.actionTypeId
                });

                self.template.fetch().done(function(){
                    self.set(self.template.toJSON());
                    self.initCollections(dfd.resolve);
                });

            }else{
                self.initCollections(dfd.resolve);
            }

            return dfd.promise();
        },
        initCollections: function(callback){
            if (this.get('drugs')) {
                var drugs = new Drugs(this.get('drugs'));
                this.set('drugs', drugs);
            }

            if (this.get('assigmentIntervals')) {
                var assigmentIntervals = new Intervals(this.get('assigmentIntervals'));
                this.set('assigmentIntervals', assigmentIntervals);
            }

            if(this.get('properties')){
                var properties = new Collection(this.get('properties'));
                this.set('properties', properties);
            }
            if(callback){
                callback(); 
            }
        },
        toJSON: function() {
            var attributes = _.clone(this.attributes);

            _.each(attributes, function(value, key) {
                if(_.isFunction(value.toJSON)) {
                    attributes[key] = value.toJSON();
                }
            });
            console.log('attributes',attributes);

            return attributes;
        },
        getMoaModel: function(){
            var moaModel = null;
            if(this.get('properties')){
                var moaModel = this.get('properties').find(function(model){
                    return model.get('code') === 'moa';
                });
            }

            return moaModel;
        },
        addInterval:function(){
            console.log('add interval') 
            this.get('assigmentIntervals').addInterval();
        },
        set: function(key, value, options) {
            // Normalize the key-value into an object
            if (_.isObject(key) || key == null) {
                attrs = key;
                options = value;
            } else {
                attrs = {};
                attrs[key] = value;
            }

            // Go over all the set attributes and make your changes
            for (attr in attrs) {
                console.log('attr',attr, attrs[attr])
                if (attr == 'moa') {
                    var moaModel = this.getMoaModel();
                    if(moaModel){
                        moaModel.set('value', attrs[attr])
                    }
                }

                if (attr == 'voa') {
                    if(this.get('properties')){
                        var voaModel = this.get('properties').find(function(model){
                            return model.get('code') === 'voa';
                        });
                        if(voaModel){
                            voaModel.set('value', attrs[attr])
                        }
                    }
                }

                if (attr == 'note') {
                    if(this.get('properties')){
                        var noteModel = this.get('properties').find(function(model){
                            return model.get('name') === 'Примечание';
                        });
                        if(noteModel){
                            noteModel.set('value', attrs[attr])
                        }
                    }
                }
            }

            return Backbone.Model.prototype.set.call(this, attrs, options);
        }

    });

    return Prescription;
});
