define(['text!templates/pages/biomaterials.tmpl',
	'collections/Biomaterials',
	'views/grid',
	'views/pages/BiomaterialsCountsView',
  'collections/dictionary-values'], function (biomaterialsTemplate, BiomaterialsCollection, GridView, CountView) {

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

			// Получаем справочник типов биоматериалов
			this.tissues = new App.Collections.DictionaryValues("", {
				name: "tissueTypes"
			});
			this.tissues.on("reset", this.onTissuesLoaded, this);
			this.tissues.fetch();


		},

		onTissuesLoaded: function (coll) {
			console.log('onTissuesLoaded',this.tissues)
			_(this.tissues.toJSON()).each(function (item) {
				this.$(".tissues").append($("<option/>", {
					"text": item.value,
					"value": item.id
				}));
			}, this);

			this.$(".tissues").select2("enable");

		},

		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template));

			view.$("#biomaterial-grid").html(view.grid.el);
			view.$("#biomaterial-count table").append(view.counts.el);

			if (!this.$(".tissues").find("option").length) {
				this.$(".tissues").select2("disable");
			}


			UIInitialize(view.el);
//			this.delegateEvents();
//			this.grid.delegateEvents();

			return view;
		}

	});

	return BiomaterialsView;

});
