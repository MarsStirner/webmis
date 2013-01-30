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
			this.collection.fetch();
		},
		addOne: function(model){
			//var bedView = new App.Views.Beds({model: model});
			//bedView.render();
//			this.$el.append('bedView.el');
		},

		render: function () {
			//this.$el.html($.tmpl(this.template));

//			this.collection.each(function(model){
//
//				console.log(model.get('bedId'));
//			});
			return this;
		}
	});
});