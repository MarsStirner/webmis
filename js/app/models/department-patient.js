/**
 * User: FKurilov
 * Date: 25.05.12
 */
define(["models/Name", "models/Bed", "models/doctor", "models/condition"], function (Name) {
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
				relatedModel: Name
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

		parse: function ( raw ) {
			var depPatient = new App.Models.DepartmentPatient;
			var data = raw.data ? raw.data : raw;
			console.log('data',data);

			console.log('depPatient',depPatient);
			console.log('depPatient.toJSON',depPatient.toJSON());
			var val = Core.Objects.mergeAll( depPatient.toJSON(), data );

			console.log('return data',val);

			return val;
		}
	});

	return App.Models.DepartmentPatient;
});
