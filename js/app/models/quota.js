/**
 * User: FKurilov
 * Date: 13.12.12
 */
define(["models/mkb", "models/department"], function () {
	/*var QuotaType = Model.extend({
		defaults: {
			"name": ""
		}
	});

	var QuotaStatus = Model.extend({
		defaults: {
			"name": ""
		}
	});*/

	App.Models.Quota = Backbone.Model.extend({
		/*defaults: {
			"version": "",
			"appealNumber": "",
			"talonNumber": "",
			"stage": "",
			"request": "",
			"mkb": {},
			"quotaType": {},
			"department": {},
			"status": {}
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "mkb",
				relatedModel: App.Models.Mkb
			},
			{
				type: Backbone.HasOne,
				key: "quotaType",
				relatedModel: QuotaType
			},
			{
				type: Backbone.HasOne,
				key: "department",
				relatedModel: App.Models.Department
			},
			{
				type: Backbone.HasOne,
				key: "status",
				relatedModel: QuotaStatus
			}
		]*/
	});

	return App.Models.Quota;
});