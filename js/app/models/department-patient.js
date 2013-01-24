/**
 * User: FKurilov
 * Date: 25.05.12
 */
define(["models/name", "models/HospitalBed", "models/doctor", "models/condition"], function () {
	App.Models.DepartmentPatient = Model.extend({
		defaults: {
			number: "",
			name: {},
			birthDate: "",
			hospitalBed: {},
			doctor: {},
			condition: {},
			createDateTime: "",
			checkOut: ""
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "name",
				relatedModel: "App.Models.Name"
			},
			{
				type: Backbone.HasOne,
				key: "hospitalBed",
				//relatedModel: "App.Models.HospitalBed",
				relatedModel: "App.Models.Bed"
			},
			{
				type: Backbone.HasOne,
				key: "doctor",
				relatedModel: "App.Models.Doctor"
			},
			{
				type: Backbone.HasOne,
				key: "condition",
				relatedModel: "App.Models.Condition"
			}
		],

		parse: function ( data ) {
			var depPatient = new App.Models.DepartmentPatient;
			data = data.data ? data.data : data;

			return Core.Objects.mergeAll( depPatient.toJSON(), data )
		}
	});

	return App.Models.DepartmentPatient;
});