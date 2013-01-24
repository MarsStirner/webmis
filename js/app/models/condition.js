/**
 * User: FKurilov
 * Date: 28.05.12
 */
define(function () {
	var ArterialBloodPressure = Model.extend({});
	var BreathingRate = Model.extend({});
	var State = Model.extend({
		defaults: {
			name: "неизвестно"
		}
	});

	App.Models.Condition = Model.extend({
		defaults: {
			state: {},
			breathingRate: {},
			arterialBloodPressure: {}
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "state",
				relatedModel: State
			}
		],

		parse: function ( data ) {
			var condition = new App.Models.Condition;
			data = data.data ? data.data : data;

			return Core.Objects.mergeAll( condition.toJSON(), data )
		}
	});

	//return App.Models.Condition;
});