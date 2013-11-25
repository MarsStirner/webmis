define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/prescriptions.html');
    var tooltipTemplate = _.template(require('text!./templates/tooltip.html'),null,{variable: 'data'})

	var BaseView = require('./views/BaseView');
	var Prescriptions = require('./collections/Prescriptions');
	var ListView = require('./views/appeal/ListView');
	var ActionsView = require('./views/appeal/ListActionsView');
    require('qtip');
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
            drugs.each(function(drug){
                names.push(drug.get('name')); 
            })
            return names.join(', ')
        },
        getEvents: function(){
            var prescriptions = this.collection;
            var events = [];
            var self = this;
            console.log('prescriptions', prescriptions);
            prescriptions.each(function(prescription){
                var intervals = prescription.get('assigmentIntervals');
                console.log('intervals', intervals);
                intervals.each(function(interval){
                    interval = interval.toJSON();
                   console.log('interval', interval) 
                   var event = {
                        id: prescription.get('id'),
                        name: prescription.get('name'),
                        title: self.getDrugsNames(prescription.get('drugs')),
                        allDay: false,
                        backgroundColor: interval.backgroundColor,
                        borderColor: interval.backgroundColor,
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
        getTooltipText: function(id){
            var prescription = this.collection.get(id);
            console.log('tt data', prescription.toJSON())
            var html = tooltipTemplate(prescription.toJSON());
            return html; 
        },
        afterRender: function(){
            var self = this;
            this.collection.on('reset', function(){
            var events1 = this.getEvents();
            console.log('events',events1);
            this.$el.find('.calendar').fullCalendar({
                header: {
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay' 
                },
                defaultView: 'agendaWeek',
                allDaySlot: false,
                events: events1,
                timeFormat:{
                // for agendaWeek and agendaDay
                   agenda: 'HH:mm{ - HH:mm}', // 5:00 - 6:30
               
                // for all other views
                  '': 'HH:mm'            // 7p
                } ,
                titleFormat: {
                    month: 'MMMM yyyy',                             // September 2009
                    week: "d MMM [ yyyy]{ '&#8212;' d MMM yyyy}", // Sep 7 - 13 2009
                    day: 'dddd, d MMM, yyyy'
                },
                axisFormat: 'HH:mm',
                monthNamesShort: ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля',
                 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'],
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июл',
                 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                dayNamesShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                dayNames: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
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
                // eventClick: function(calEvent, jsEvent, view) {
                //     console.log('event click',arguments) 
                
                // },
                firstDay: 1,
                slotMinutes: 30,
                snapMinutes: 1,
                defaultEventMinutes: 30,
                eventRender: function(event, element) {

                    element.qtip({
                        content: {
                            title: event.name,
                            text: self.getTooltipText(event.id)
                        }, 
                        style: 'qtip-light',
                        position: {
                            my: 'bottom left',
                            at: 'top left',
                            viewport: $('.calendar')
                        
                        },
//                        hide: false,
                        prerender: true
                    })                
                }
                // eventDurationEditable: true,
                // editable: true,
                // selectable: true,
                // selectHelper: true
            }); 
            },this);
        }

	});

});
