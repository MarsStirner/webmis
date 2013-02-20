define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/pages/BiomaterialsCountsView'], function (biomaterialsTemplate, BiomaterialsCollection, GridView, CountView) {

	var BiomaterialsView = View.extend({
		///className: "ContentHolder",
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

			this.counts = new CountView({ collection: this.collection});

			this.collection.fetch();


		},
		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template));
			view.$("#biomaterial-grid").html(view.grid.el);
			view.$("#biomaterial-count table").append(view.counts.el);

			//view.counts.render();

			UIInitialize(view.el);
//			this.delegateEvents();
//			this.grid.delegateEvents();

			return view;
		}

	});

	return BiomaterialsView;

});
