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

				obj.patient = obj.actions[0].patient;
				obj.urgent = obj.actions[0].urgent;
				obj.assigner = obj.actions[0].assigner;
				obj.biomaterial = obj.actions[0].biomaterial;


				var biomaterials = _.pluck(obj.actions, 'biomaterial');
				var volume = 0;

				_.each(obj.actions, function(action, key, list){
					action.jobTicket = {
						'id': obj.id,
						'date': obj.date,
						'label': obj.label,
						'note': obj.note
					}

					volume = volume + action.biomaterial.amount;

				});

				obj.volume = volume;
				if(obj.actions[0].patient.sex == 'male') {obj.patient.sex = 'М';}
				if(obj.actions[0].patient.sex == 'female'){obj.patient.sex = 'Ж';}



				if(obj.status == 0){
					obj.statusName = 'ожидание';
				}
				if(obj.status == 1){
					obj.statusName = 'выполнение';
				}
				if(obj.status == 2){
					obj.statusName = 'закончено';
				}

				obj.selected = false;

				return obj;
			});

		}
	});

	return Biomaterials;
});
