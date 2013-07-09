define(function(require) {


    var DoctorFreeModel = Model.extend({
        initialize: function() {
            var schedule = new ScheduleCollection(this.get('schedule'));
            this.set('schedule', schedule);
        },
        convertTime: function(time){
            var now = moment().startOf('day').valueOf();
            return moment(now + time).format('HH:mm:ss')
        },
        parse: function(raw) {
           // console.log('parse raw', raw);
            _.each(raw.schedule, function(item){
                item.parsedTime = this.convertTime(item.time);
            },this)
            return raw;
        }
    });

    var ScheduleModel = Model.extend({

    });


    var ScheduleCollection = Collection.extend({
        model: ScheduleModel

    });

    var DoctorsFreeCollection = Collection.extend({
//        initialize: function(){
//            this.on('all',function () {
//                console.log('doctors free all', arguments);
//            })
//        },
        model: DoctorFreeModel,
        url: function() {
            return DATA_PATH + "dir/persons/free/"
        }
    });

    return DoctorsFreeCollection;
});
