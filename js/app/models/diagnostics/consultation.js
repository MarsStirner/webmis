/**
 * User: FKurilov
 * Date: 09.06.12
 */
define(["models/doctor"], function () {
	var DiagnosticName = Model.extend({
		defaults: {name: ""}
	});
	var ConsultationStatus = Model.extend({
		defaults: {name: ""}
	});

	App.Views.Consultation = Model.extend({
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
				relatedModel: ConsultationStatus
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
			var consult = new Consultation();
			data = data.data ? data.data : data;

			return Core.Objects.mergeAll(consult.toJSON(), data);
		}
	});

	return App.Views.Consultation;
});