define(function(require) {

	var ViewBase = Backbone.View.extend({
		constructor: function() {
			this._subViews = {};
			this.render = _.wrap(this.render, function(render) {
				render.apply(this);
				this.afterRender.apply(this);
			});

			Backbone.View.apply(this, arguments);
		},

		template: _.template(''),

		data: function() {
			return {};
		},

		addSubViews: function (obj) {
			this._subViews = _.extend(this._subViews, obj);
		},

		renderSubViews: function() {
			// console.log('renderSubViews', this.subViews)
			_.each(this._subViews, function(view, selector) {
				view.setElement(this.$(selector)).render();
			}, this);
		},

		render: function() {
			this.$el.html(this.template(this.data()));
			this.renderSubViews();

			return this;
		},

		afterRender: function() {

		},

		tearDown: function() {
			this.tearDownSubviews();
			this.stopListening();
			this.undelegateEvents();
			this.remove();
		},

		tearDownSubviews: function() {
			_.invoke(this._subViews, 'tearDown');
		}

	});

	return ViewBase;

});
