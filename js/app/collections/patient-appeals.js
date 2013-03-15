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

		parse: function (raw) {
			var data = Collection.prototype.parse.call(this, raw);
			var diagKinds = {
				"assignment": {priority: 0, title: "Направительный диагноз"},
				"admission": {priority: 1, title: "Диагноз при поступлении"},
				"clinical": {priority: 2, title: "Клинический"},
				"final": {priority: 3, title: "Заключительный"}
			};

			_.each(data, function (patientAppeal) {
				patientAppeal.diagnoses = patientAppeal.diagnoses.sort(function (a, b) {
					var apr = diagKinds[a.diagnosisKind].priority;
					var bpr = diagKinds[b.diagnosisKind].priority;

					if (apr > bpr) {
						return 1;
					} else if (apr < bpr) {
						return -1;
					} else {
						return 0;
					}
				});
				_.each(patientAppeal.diagnoses, function (diag) {
					diag.diagnosisKindLabel = diagKinds[diag.diagnosisKind].title;
				});
			});

			return data;
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