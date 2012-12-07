define( ["models/mkb"], function ()
{
	App.Models.Diagnosis = Model.extend({
		defaults: {
			diagnosisKind: "assignment",
			description: "",
			mkb: {}
		},
		relations: [
			{
				type: Backbone.HasOne,
				key: "mkb",
				relatedModel: "App.Models.Mkb"
			}
		]
	});
});