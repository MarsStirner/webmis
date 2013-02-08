define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid'], function (biomaterialsTemplate, BiomaterialsCollection,GridView) {

	var BiomaterialsView = View.extend({
		className: "ContentHolder",
		template: biomaterialsTemplate,
		initialize: function () {

			var biomaterialsCollection = new BiomaterialsCollection;
			this.collection = biomaterialsCollection;

			this.grid = new GridView({
				collection: this.collection,
				template: "grids/biomaterials",
				gridTemplateId: "#biomaterials-grid",
				rowTemplateId: "#biomaterials-grid-row",
				defaultTemplateId: "#biomaterials-grid-row-default",
				errorTemplateId: "#biomaterials-grid-row-error"
			});
			this.depended(this.grid);

			this.collection.bind('reset', function () {

				console.log('reset',this.collection);
			},this);


			this.collection.fetch();




		},
		render: function () {
			this.$el.html($.tmpl(this.template));
			this.$("#biomaterial-grid").html(this.grid.el);

//			this.delegateEvents();
//			this.grid.delegateEvents();

			return this;
		}

	});

	return BiomaterialsView;

});
