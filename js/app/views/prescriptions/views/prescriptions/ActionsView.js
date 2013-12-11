define(function (require) {
    var BaseView = require('views/prescriptions/views/BaseView');
    var template = require('text!views/prescriptions/templates/actions.html');

    var Intervals = require('views/prescriptions/collections/Intervals');
    var Prescriptions = require('views/prescriptions/collections/Prescriptions');

    return BaseView.extend({
        template: template,
        events: {
            'click .execute-intervals': 'executeIntervals',
            'click .execute-not-executed-intervals': 'executeNotExecutedIntervals'
        },
        initialize: function(){

        },
        executeIntervals: function(){
            var self = this;
            var start = this.collection._filter.dateRangeMin*1000;
            var end = this.collection._filter.dateRangeMax*1000;
            var selected = new Prescriptions(this.collection.getSelected());

            var intervals = new Intervals(selected.getNotExecutedIntervals(start, end));

            intervals.execute({
                success: function(){
                    console.log('ok');
                    self.collection.fetch();
                },error: function(){
                    console.log('error');
                }
            });

            console.log('selected', selected);

        },

        executeNotExecutedIntervals: function(){
            var self = this;
            var start = this.collection._filter.dateRangeMin*1000;
            var end = this.collection._filter.dateRangeMax*1000;

            var notExecutedIntervals = new Intervals(this.collection.getNotExecutedIntervals(start, end));

            notExecutedIntervals.execute({
                success: function(){
                    console.log('ok');
                    self.collection.fetch()
                },error: function(){
                    console.log('error');
                }
            });

            console.log('notExecutedIntervals', notExecutedIntervals);

        },

        afterRender: function(){

            this.$el.find('button').button();
        }
    });
});