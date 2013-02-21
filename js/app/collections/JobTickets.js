define(['models/JobTicket'], function (JobTicket) {

	var JobTickets = Collection.extend({
		model: JobTicket,

		url: function () {
			return DATA_PATH + "jobTickets/status";
		}

	});

	return JobTickets;
});
