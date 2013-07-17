define(function(require) {

	var MonitoringInfo = Model.extend({
		defaults: {
			datetime: "",
			temperature: "",
			bpras: "",
			bprad: "",
			heartRate: "",
			spo2: "",
			breathRate: "",
			state: "",
			health: ""
		}
	});

	return MonitoringInfo;
});
