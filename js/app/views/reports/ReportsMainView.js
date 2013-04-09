define(['text!templates/reports/reports.tmpl',
	"views/menu",
	"views/reports/Form007View",
	"views/reports/HospitalView"], function(
template,
MenuView,
Form007View,
HospitalView) {

	var ReportsMainView = View.extend({
		template: template,
		typeViews: {
			"hospital": HospitalView,
			"f007": Form007View
		},

		initialize: function() {
			var view = this;

			this.menu = new App.Views.Menu(this.getMenuStructure());
			this.menu.options.structure.on("change-page", function(step) {
				console.log('change-page', step);
				this.setContentView(step.name);
			}, this);
		},
		getMenuStructure: function() {
			return {
				structure: [{
					name: "hospital",
					title: "Стационар",
					uri: "reports/hospital",
					structure: [{
						name: "f007",
						title: "Коечный фонд",
						uri: "reports/hospital/007"
					}]
				}]
			};
		},

		getPageNameByPath: function(path) {
			var menu = this.getMenuStructure();

			var item = this.searchTree({
				menu: menu,
				match: path,
				elementParamName: 'uri',
				elementChildrenName: 'structure'
			});

			console.log('getPageNameByPath', path, item);


		},

		/**
		 * [searchTree description]
		 *
		 * @param  {[type]}  element              [description]
		 * @param  {[type]}  match                [description]
		 * @param  {[type]}  elementParamName     [description]
		 * @param  {[type]}  elementChildrenName  [description]
		 *
		 * @return  {[type]}  [description]
		 */
		searchTree: function(options) {
			///http://stackoverflow.com/questions/9133500/how-to-find-a-node-in-a-tree-with-javascript
			var searchTree = arguments.callee;

			if (element[options.elementParamName] == options.match) {
				return element;
			} else if (element[options.elementChildrenName] !== null && element[options.elementChildrenName].length > 0) {
				var result = null;
				console.log('element[elementChildrenName]', element[options.elementChildrenName], element[options.elementChildrenName].length);
				for (var i = 0; result === null && i < element[options.elementChildrenName].length; i++) {
					result = searchTree(options);
				}
				return result;
			}
			return null;
		},

		setContentView: function(type, extraOptions) {
			if (this.type !== type || !this.contentView) {
				if (this.typeViews[type]) {
					this.type = type;

					// if (this.contentView) {
					// 			//this.setBreadcrumbsStructure();
					// 			this.contentView.off(null, null, this);
					// 			if (this.contentView.model) {
					// 				this.contentView.model.off(null, null, this.contentView);
					// 			}
					// 			if (this.contentView.cleanUp) {
					// 				this.contentView.cleanUp();
					// 			}
					// 		}

					this.contentView = new this.typeViews[type](_.extend({
						//appealId: this.appealId,
						//appeal: this.appeal,
						path: this.options.path,
						referrer: this.options.referrer
					}, extraOptions));


					this.contentView.on("change:viewState", this.onViewStateChange, this);
					this.renderPageContent();

				}
			}

		},

		onViewStateChange: function(event) {
			console.log('onViewStateChange', event);
			this.setContentView(event.type, event.options);
		},

		renderPageContent: function() {
			console.log('renderPageContent');
			this.menu.setPage(this.type);
			this.$(".ContentSide").html(this.contentView.render().el);
		},

		render: function() {
			var view = this;
			console.log('render ', this);
			view.$el.html($.tmpl(view.template));


			this.$(".LeftSideBar").html(this.menu.render().el);

			this.getPageNameByPath(this.options.path);

			return view;
		}

	});

	return ReportsMainView;

});