/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/chamber.tmpl",
	"collections/Beds",
	"views/appeal/edit/pages/BedView"
], function (bedsTemplate) {

	App.Views.Beds = View.extend({
		template: bedsTemplate,

		initialize: function (options) {
			this.collection = new App.Collections.Beds({},{departmentId: options.departmentId});
			//this.collection.fetch();
		},

		render: function () {

			return this;
		}
	});
});
