define([], function() {

	var ScheduleModel = Model.extend({});


	var ScheduleCollection = Collection.extend({
		model: ScheduleModel,
		url: function() {
			return DATA_PATH + "shedule?";
		},

		/**
		 * [getDates description]
		 *
		 * @return  {array}  возвращает массив с датами рабочих дней специалиста
		 */
		getDates: function() {
			return this.pluck('date');
		},

		/**
		 * [getTimetable description]
		 *
		 * @param   {string}  date - дата для которой надо получить расписание приёма
		 *
		 * @return  {[type]}  возвращает массив с расписанием приёма
		 */
		getTimetable: function(date) {
			var model;

			model = this.find(function(model) {
				return model.get('date') === date;
			});
			if (model) {
				return model.get('timetable');
			}
			return false;
		}

	});

	return ScheduleCollection;
});
