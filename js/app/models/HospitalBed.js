/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(function () {
	App.Models.HospitalBed = Model.extend({
        initialize: function () {
            //this.moveId = this.options.moveId;
            //this.moveId = 224235;
        },

		url: function () {
			return DATA_PATH + "hospitalbed/" + this.moveId;
		},

		defaults: {
			clientId: "",
			bedId: "",
			moveDatatime: "",
			moveFromUnitId: "",
			patronage: "",
            chamberList: []
		},

		relations: [
			{
				type: Backbone.HasMany,
				key: "chamberList",
				relatedModel: "App.Models.Bed",
                collectionType: "App.Collections.Beds"
			}
		],

		parse: function (raw) {
            console.log(raw)
            return raw.data.registrationForm;
		}
	});

	//return {};
});