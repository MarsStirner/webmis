/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(["collections/beds"], function () {
	App.Models.HospitalBed = Model.extend({
		idAttribute: "bedId",

		url: function (isSave) {
			return DATA_PATH + (isSave ?
				("appeals/" + this.appealId + "/hospitalbed/") :
				("hospitalbed/" + this.moveId));
		},

		sync: function (method, model, options) {
			options.dataType = "jsonp";
			options.contentType = 'application/json';
			options.url = model.url(method === "create");

			if (method == "create" || method == "update") {
				options.data = JSON.stringify({
					requestData: {},
					data: model.toJSON()
				});
			}

			return Backbone.sync(method, model, options);
		},

		/*save: function () {
			this.unset("chamberList");
			Model.prototype.save.call(this);
		},*/

		toJSON: function () {
			return {
				"bedRegistration": Model.prototype.toJSON.call(this)
			}
		},

		defaults: {
			"clientId": "",
			"bedId": null,
			"moveDatetime": "",
			"movedFromUnitId": null,
			"patronage": "Нет",
			"curativeDiagnosticBool": false,
			"curativeDiagnostic": "",
			chamberList:[]
		},

		relations: [
			{
				type:Backbone.HasMany,
				key:"chamberList",
				relatedModel:"App.Models.Bed",
				collectionType:"App.Collections.Beds"
			}
		],

		parse: function (raw) {
			console.log(raw);

			return raw.data.registrationForm ? raw.data.registrationForm : raw.data;
		}
	});

	//return {};
});