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

	App.Models.LaboratoryDiag = Model.extend({
		defaults: {
			directionDate: 0,
			diagnosticDate: 0,
			diagnosticName: {},
			urgent: false,
			assignPerson: {},
			execPerson: {},
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
		],

		parse: function ( data ) {
			var labDiag = new App.Models.LaboratoryDiag;
			data = data.data ? data.data : data;

			return Core.Objects.mergeAll(labDiag.toJSON(), data)
		}
	});

	return App.Models.LaboratoryDiag
});