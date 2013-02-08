define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid'], function (biomaterialsTemplate, Biomaterials,GridView) {

	var BiomaterialsView = View.extend({
		template: biomaterialsTemplate,
		initialize: function () {

			var biomaterialsCollection = new Biomaterials([
				{ id: 2, fullName: "Mwewe"}
			]);
			this.collection = biomaterialsCollection;

			var biomaterialsGrid = new GridView({
				collection: this.collection,
				template: "grids/biomaterials",
				gridTemplateId: "#biomaterials-grid",
				rowTemplateId: "#biomaterials-grid-row",
				defaultTemplateId: "#biomaterials-grid-row-default",
				errorTemplateId: "#biomaterials-grid-row-error"
			});
			this.depended(biomaterialsGrid);

			this.$el.find(".Container").html(biomaterialsGrid.render().el);


		},
		render: function () {
			this.$el.html($.tmpl(this.template));
			return this;
		}

	});

	return BiomaterialsView;

});
