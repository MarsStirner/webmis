/**
 * User: VKondratev
 * Date: 27.11.12
 */
// TODO: REMOVE THIS
define(["models/hospital-bed"], function ()
{
	App.Collections.HospitalBed = Collection.extend({
		model: App.Models.HospitalBed,
		url: function () {
			return DATA_PATH + "appeals/" + this.appealId + "/hospitalbed/"
		}
	});

	return App.Collections.HospitalBed;
} );
