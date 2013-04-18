/**
 * User: FKurilov
 * Date: 29.05.12
 */
define(["models/doctor"], function ()
{
	App.Collections.Doctors = Collection.extend({
		model: App.Models.Doctor,
		url: function () {
			return DATA_PATH + "dir/persons/"
		}
	});

	return App.Collections.Doctors;
} );