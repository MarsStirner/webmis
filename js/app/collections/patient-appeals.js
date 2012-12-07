define(["models/doctor", "models/date", "models/department", "models/diagnosis"], function ()
{
	var ExecPerson = Model.extend({
		defaults: {
			"doctor": {},
			"department": {}
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "doctor",
				relatedModel: App.Models.Doctor
			},
			{
				type: Backbone.HasOne,
				key: "department",
				relatedModel: App.Models.Department
			}
		]
	});

	App.Collections.PatientAppeals = Collection.extend({
		url: function () {
			return DATA_PATH + "patients/"+ this.patient.id + "/appeals/"
		},
		model: Model.extend({
			defaults: {
				"number": "",
				"rangeAppealDateTime": {},
				"execPerson": {},
				"department": {
					"name": ""
				},
				"diagnoses": []
			},

			relations: [
				{
					type: Backbone.HasOne,
					key: "rangeAppealDateTime",
					relatedModel: App.Models.Date
				},
				{
					type: Backbone.HasOne,
					key: "execPerson",
					relatedModel: ExecPerson
				},
				{
					type: Backbone.HasMany,
					key: "diagnoses",
					relatedModel: App.Models.Diagnosis,
					collectionType: App.Collections.Diagnoses
				}
			]
		})
	});
});