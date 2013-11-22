define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/prescriptions.html');

	var BaseView = require('./views/BaseView');
	var Prescriptions = require('./collections/Prescriptions');
	var ListView = require('./views/appeal/ListView');
	var ActionsView = require('./views/appeal/ListActionsView');
    require('fullCalendar');



	return BaseView.extend({
		className: 'ContentHolder',
		template: template,
		initialize: function() {
			var self = this;
			console.log('init a', this.options);

			this.collection = new Prescriptions();

			this.listView = new ListView({
				collection: this.collection
			});

			this.actionsView = new ActionsView({
				appealId: this.options.appealId
			});

			this.addSubViews({
				'.list': this.listView,
				'.actions': this.actionsView
			});

			this.collection.fetch({data:{
				eventId: this.options.appealId
			}});


		},
        getDrugsNames: function(drugs){
            var names = [];
            _.each(drugs, function(drug){
                names.push(drug.name); 
            })
            return names.join(',')
        },
        getEvents: function(){
            var prescriptions = this.collection;
            var events = [];
            var self = this;
            console.log('prescriptions', prescriptions);
            prescriptions.each(function(prescription){
                var intervals = prescription.get('assigmentIntervals');
                console.log('intervals', intervals);
                _.each(intervals,function(interval){
                   console.log('interval', interval) 
                   var event = {
                        id: prescription.get('id'),
                        title: self.getDrugsNames(prescription.get('drugs')),
                        allDay: false,
                        start: moment(interval.beginDateTime).format('YYYY-MM-DD HH:mm'),
                   };
                   if(interval.endDateTime){
                        event.end =  moment(interval.endDateTime).format('YYYY-MM-DD HH:mm');
                   }
                    events[events.length] = event;
                })
            })
            return events;
        
        },
        afterRender: function(){
            this.collection.on('reset', function(){
            var events1 = this.getEvents();
            console.log('events',events1);
            this.$el.find('.calendar').fullCalendar({
                header: {
                    left: 'prev,today,next',
                    right: 'month,agendaWeek,agendaDay' 
                },
                defaultView: 'agendaWeek',
                allDaySlot: false,
                events: events1,
                timeFormat:{
                // for agendaWeek and agendaDay
                   agenda: 'HH:mm{ - HH:mm}', // 5:00 - 6:30
               
                // for all other views
                  '': 'HH(:mm)'            // 7p
                } ,
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                 'August', 'September', 'October', 'Ноябрь', 'December'],
                dayNamesShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                buttonText:{
                    prev:     '&lsaquo; назад', // <
                    next:     'вперёд &rsaquo;', // >
                    prevYear: '&laquo;',  // <<
                    nextYear: '&raquo;',  // >>
                    today:    'сегодня',
                    month:    'месяц',
                    week:     'неделя',
                    day:      'день'
                },
                eventClick: function(calEvent, jsEvent, view) {
                    console.log('event click',arguments) 
                
                },
                firstDay: 1,
                slotMinutes: 15,
                snapMinutes: 15,
                eventDurationEditable: true,
                editable: true,
                selectable: true,
                selectHelper: true
            }); 
            },this);
        }

	});

});
