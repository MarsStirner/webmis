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
			"finalMkb": {
				priority: 0,
				title: "Заключительный"
			},

			"mainDiagMkb": {
				priority: 1,
				title: "Клинический"
			},
			"assocDiagMkb": {
				priority: 2,
				title: "Сопутствующий к клиническому"
			},
			"diagComplMkb": {
				priority: 3,
				title: "Осложнения к клиническому"
			},

			"admissionMkb": {
				priority: 4,
				title: "Диагноз при поступлении"
			},

			"diagReceivedMkb": {
				priority: 5,
				title: "Направительный диагноз"
			},

			"aftereffectMkb": {
				priority: 6,
				title: "Сопутствующий к направительному"
			},
			"attendantMkb": {
				priority: 7,
				title: "Осложнения к направительному"
			},
			"mainDiagMkbPat": {
				priority: 8,
				title: "Патологоанатомический диагноз. Основное заболевание по МКБ"
			},
			"complDi1_1_01agMkbPat": {
				priority: 9,
				title: "Патологоанатомический диагноз. Осложнения по МКБ"
			},
			"assocDiagMkbPat": {
				priority: 10,
				title: "Патологоанатомический диагноз. Сопутствующие заболевания по МКБ."
			},
			"aftereffectFinalMkb": {
				priority: 11,
				title: "Сопутствующий к заключительному клиническому"
			},
			"attendantFinalMkb": {
				priority: 12,
				title: "Осложнения к заключительному клиническому"
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
