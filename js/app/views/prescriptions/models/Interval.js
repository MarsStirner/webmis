define(function (require) {
    var Model = require('./Model');

    var states = {
        runs: {title: 'Выполняется',color: '#f57177'},
        assigned: {title: 'Назначено', color: '#07ace3'},
        notExecuted: {title: 'Не исполнено',color: '#b2a7c9'},
        executed: {title: 'Исполнено',color: '#94cf51'},
        canceled: {title: 'Отменено',color: '#999999'}
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
        getColor: function () {
            var color;
            var state = this.getState();
            var colors = {
                'runs': '#f57177',
                'assigned': '#07ace3',
                'executed': '#94cf51',
                'notExecuted': '#b2a7c9',
                'canceled': '#999'
            };

            if(state){
                color = colors[state]; 
            }
            return color;
        },
        toJSON: function () {
            var json = _(this.attributes)
                .clone();
            var state = this.getState();
            json.backgroundColor = states[state].color;
            json.stateName = states[state].title;

            

            return json;
        }
    });

    return Interval;
});
