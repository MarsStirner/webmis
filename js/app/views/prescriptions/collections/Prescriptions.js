define(function (require) {
	var Prescription = require('../models/Prescription');
    var Collection = require('./Collection');

	var Prescriptions = Collection.extend({
		model: Prescription,
		initialize: function (models, options) {
		},
		url: function () {
				return "/api/v1/prescriptions/";
		},
        isSelected: function(model){
            return model.get('selected');
        },
        getSelected: function(){
            return this.filter(this.isSelected);
        },

        fetch: function(options){
            options = _.extend({
                data: this._filter,
                processData: true
            },options);

            return Collection.prototype.fetch.call(this, options);
        },

        getIntervals: function(predicate){
            var intervals = [];

            this.each(function(model){
                var aic = model.get('assigmentIntervals');
                //console.log('aic', aic);
                if(aic){
                    aic.each(function(ai){
                        var eic = ai.get('executionIntervals');
                        //console.log('eic', eic);
                        if(eic){
                            eic.each(function(ei){
                                if(predicate(ei)){
                                    intervals.push(ei);
                                }
                            });
                        }
                    });

                }
            });

            return intervals;
        },

        getNotExecutedIntervals: function(start, end){
            return this.getIntervals(function(interval){
                return (interval.overlapRange(start, end) && interval.isNotExecuted());
            });
        }
	});

	return Prescriptions;
});
