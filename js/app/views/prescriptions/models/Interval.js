define(function (require) {
    var Model = require('./Model');

    var states = {
        runs: {title: 'Выполняется',color: '#f57177'},
        assigned: {title: 'Назначено', color: '#07ace3'},
        notExecuted: {title: 'Не исполнено',color: '#b2a7c9'},
        executed: {title: 'Исполнено',color: '#94cf51'},
        canceled: {title: 'Отменено',color: '#999999'},
        stop: {title: 'Стоп', color: '#FFEA4F'}
    };

    var Interval = Model.extend({
        defaults: {
            beginDateTime: (new Date())
                .getTime(),
            endDateTime: null,
            status: 0
        },
        delete: function () {
            this.collection.remove(this);
        },
        getState: function () {
            var status = this.get('status');
            var state = '';
            if(status === 0 && this.timeIn()){
                state = 'runs'; 
            }
            if(status === 0 && this.timeBefore()){
                state = 'assigned'; 
            }
            if(status === 0 && this.timeAfter()){
                state = 'notExecuted'; 
            }
            if(status === 1){
                state = 'executed'; 
            }
            if(status === 2){
                state = 'canceled'; 
            }
            if(status === 3){
                state = 'stop'; 
            }

            return state;
        },
        getCurrentTime: function () {
            return moment().valueOf();
        },
        roundToMinutes: function(timestamp){
            return timestamp ? moment(timestamp).startOf('minute').valueOf() : timestamp;
        },
        timeBefore: function () { //предикат: время начала интервала больше текущего
            var begin = this.roundToMinutes(this.get('beginDateTime'));
            var current = this.roundToMinutes(this.getCurrentTime());

            return begin > current; 
        },
        timeIn: function () { //предикат: время начала интервала меньше текущего, время окончания интервала больше текущего
            var bool;
            var begin = this.roundToMinutes(this.get('beginDateTime'));
            var current = this.roundToMinutes(this.getCurrentTime());
            var end = this.roundToMinutes(this.get('endDateTime'));

            if (end) {
                bool = (begin <= current <= end);
            } else {//если у интервала есть только начало, то считаем что интервал 'in', когда текущая минута равна минуте начала интервала
                bool = (begin === current);
            }

            return bool;
        },
        timeAfter: function () { //предикат: время окончания интервала меньше текущего
            var bool;
            var begin = this.roundToMinutes(this.get('beginDateTime'));
            var current = this.roundToMinutes(this.getCurrentTime());
            var end = this.roundToMinutes(this.get('endDateTime'));

            if(end){
                bool = (end < current);    
            }else{
                bool = (begin < current); 
            }
            
            return bool;
        },
        intervalToString: function(){
            var string = '';
            var begin = this.get('beginDateTime') ? moment(this.get('beginDateTime')) : null;
            var end = this.get('endDateTime') ? moment(this.get('endDateTime')) : null;

            string = begin.format('DD.MM.YYYY HH:mm');

            if(end){
                var endInSameDay = (begin.diff(end, 'day') === 0);

                if(endInSameDay){
                    string = string + ' - ' + end.format('HH:mm');
                }else{
                    string = string + ' - ' + end.format('DD.MM.YYYY HH:mm');
                }
            }

            return string;
        },
        toJSON: function () {
            var attributes = _.clone(this.attributes);

            _.each(attributes, function (value, key) {
                if (value && _.isFunction(value.toJSON)) {
                    attributes[key] = value.toJSON();
                }
            });

            var state = this.getState();
            attributes.intervalString = this.intervalToString();
            attributes.backgroundColor = states[state].color;
            attributes.stateName = states[state].title;

            return attributes;
 
        }
    });

    return Interval;
});
