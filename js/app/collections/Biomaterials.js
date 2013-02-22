define(["models/Biomaterial"], function (Biomaterial) {
	var Biomaterials = Collection.extend({
		model: Biomaterial,
		url: function () {
			return DATA_PATH + "biomaterial/info?" ;//filter[beginDate]=1354305600000&filter[endDate]=1354478400000"
		},
		parse: function (response) {
			checkForWarnings(response.requestData, "requestData was not found in the JSON");
			this.requestData = response.requestData || {};
			this.requestData.filter = this.requestData.filter || {};

			if (response.requestData && this.requestData.coreVersion) {
				CORE_VERSION = response.requestData.coreVersion;
				VersionInfo.show();
			}
			this.departmentId = response.requestData.filter.departmentId;


			return this.normilize(response.data);
		},
		normilize: function(response){
			return _.map(response, function(obj) {

				if(obj.patient.sex == 'male') {obj.patient.sex = 'М';}
				if(obj.patient.sex == 'female'){obj.patient.sex = 'Ж';}

				obj.status = {};
				obj.status.code = obj.jobTicket.status;
				if(obj.jobTicket.status == 0){
					obj.status.name = 'ожидание';
				}
				if(obj.jobTicket.status == 1){
					obj.status.name = 'выполнение';
				}
				if(obj.jobTicket.status == 2){
					obj.status.name = 'закончено';
				}

				if(obj.tubeType.name){
					obj.tubeType.shortName =obj.tubeType.name.split(' ')[0];
				}
				//obj.tubeType.color = obj.tubeType.covCol;

				obj.tubeTypeName = obj.tubeType.name;
				obj.selected = false;

				return obj;
			});

		}
	});

	return Biomaterials;
});
