/**
 * User: FKurilov
 * Date: 09.06.12
 */
define(["models/doctor"], function () {
	var DiagnosticName = Model.extend({
		defaults: {name: ""}
	});
	var DiagnosticStatus = Model.extend({
		defaults: {name: ""}
	});

	var InstrumentalDiag = Model.extend({
		defaults: {
			diagnosticDate: 0,
			diagnosticName: {},
			assignPerson: {},
			execPerson: {},
			urgent: false,
			office: "",
			status: {}
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "diagnosticName",
				relatedModel: DiagnosticName
			},
			{
				type: Backbone.HasOne,
				key: "status",
				relatedModel: DiagnosticStatus
			},
			{
				type: Backbone.HasOne,
				key: "assignPerson",
				relatedModel: App.Models.Doctor
			},
			{
				type: Backbone.HasOne,
				key: "execPerson",
				relatedModel: App.Models.Doctor
			}
		]//,

		// parse: function ( data ) {
		// 	//var instDiag = new App.Models.InstrumentalDiag();
		// 	data = data.data ? data.data : data;

		// 	return data;//Core.Objects.mergeAll(instDiag.toJSON(), data);
		// }
	});

	return InstrumentalDiag;
});
