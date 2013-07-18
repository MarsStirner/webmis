define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	/**
	 * Модель диагноза пациента
	 * @type {*}
	 */
	var PatientDiagnosis = Model.extend({
		defaults: {
			"diagnosticId": "",
			"diagnosisKind": "",
			"datetime": "",
			"description": "",
			"injury": "",
			"doctor": {
				"name": {
					"first": "",
					"last": "",
					"middle": "",
					"raw": ""
				}
			},
			"mkb": {
				"id": "",
				"code": "",
				"diagnosis": ""
			}
		}
	});

	/**
	 * Коллекция диагнозов пациента
	 * @type {*}
	 */

	var PatientDiagnoses = Collection.extend({
		model: PatientDiagnosis,

		diagKinds: {
			"final": {
				priority: 0,
				title: "Заключительный"
			},

			"clinical": {
				priority: 1,
				title: "Клинический"
			},
			"secondaryToClinical": {
				priority: 2,
				title: "Сопутствующий к клиническому"
			},
			"complicateToClinical": {
				priority: 3,
				title: "Осложнения к клиническому"
			},

			"admission": {
				priority: 4,
				title: "Диагноз при поступлении"
			},

			"assignment": {
				priority: 5,
				title: "Направительный диагноз"
			},

			"aftereffect": {
				priority: 6,
				title: "Сопутствующий к направительному"
			},
			"attendant": {
				priority: 7,
				title: "Осложнения к направительному"
			}
		},

		url: function() {
			return DATA_PATH + "appeals/" + shared.models.appeal.get("id") + "/diagnoses/";
		},

		comparator: function(a, b) {
			var apr = this.diagKinds[a.get("diagnosisKind")].priority;
			var bpr = this.diagKinds[b.get("diagnosisKind")].priority;

			if (apr > bpr) {
				return 1;
			} else if (apr < bpr) {
				return -1;
			} else {
				return 0;
			}
		},

		parse: function(raw) {
			var data = Collection.prototype.parse.call(this, raw);

			_.each(data, function(diag) {
				diag.diagnosisKindLabel = this.diagKinds[diag.diagnosisKind].title;
			}, this);

			return data;
		}
	});


	return PatientDiagnoses;
});
