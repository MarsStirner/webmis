/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(["models/department"], function () {
	App.Models.HospitalBed = Model.extend({
		urlRoot: function () {
			return DATA_PATH + "appeals/" + this.appeal.id + "/hospitalbed/";
		},

		defaults: {
			department: {},
			clientId: "",
			bedId: "",
			moveDatatime: "",
			moveFromUnitId: "",
			patronage: ""
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "department",
				relatedModel: "App.Models.Department"
			}
		],

		parse: function ( data ) {
			var bed = new App.Models.HospitalBed;
			data = data.data ? data.data : data;

			return Core.Objects.mergeAll( bed.toJSON(), data )
		}
	});

	//return {};
});