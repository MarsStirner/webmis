/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(["collections/Beds"], function () {
	App.Models.HospitalBed = Model.extend({
		defaults: {
			"clientId": "",
			"bedId": null,
			"moveDatetime": "",
			"movedFromUnitId": null,
			"patronage": "Нет"//,
//			"curativeDiagnosticBool": false,
//			"curativeDiagnostic": ""
		},
//		validate: function (attrs) {
//			var errors = [];
//			if (!attrs.movedFromUnitId) {
//				errors.push({property: "departments", msg: "Отделение"});
//			}
//			if (!attrs.bedId) {
//				errors.push({property: "beds", msg: "Койка"});
//			}
//
//			if (errors.length) {
//				return errors;
//			}
//		},

		url: function (isSave) {
			return DATA_PATH + (isSave ?
				("appeals/" + this.appealId + "/hospitalbed/") :
				("hospitalbed/" + this.moveId));
		},

		sync: function (method, model, options) {
			console.log('sync hospitalbed',method);
			options.dataType = "jsonp";
			options.contentType = 'application/json';
			options.url = model.url(method === "create");

			if (method == "create" || method == "update") {
				options.data = JSON.stringify({
					//requestData: {},
					data: model.toJSON()
				});
			}

			return Backbone.sync(method, model, options);
		},

		toJSON: function () {
			return {
				"bedRegistration": Model.prototype.toJSON.call(this)
			}
		},

		parse: function (raw) {
			return raw.data.registrationForm ? raw.data.registrationForm : raw.data;
		}
	});

	//return {};
});
