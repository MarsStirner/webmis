/**
 * User: VKondratev
 * Date: 21.11.12
 */

define(["models/doctor"], function ()
{
	App.Collections.DoctorsFree = Collection.extend({
		model: App.Models.Doctor,
		url: function () {
			return DATA_PATH + "dir/persons/free/"
		}
	});

	//return App.Collections.Doctors;
} );
