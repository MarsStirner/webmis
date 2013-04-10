define([], function() {

	var Popup = View.extend({
		className: "popup",
		template: '',
		data: {},
		initialize: function() {
			_.bindAll(this, 'beforeRender', 'render', 'renderNested','afterRender','open','close');

			var view = this;
			view.render = _.wrap(view.render, function(render) {
				view.beforeRender();
				render();
				view.afterRender();
				return view;
			});
		},

		open: function() {
			this.$el.dialog("open");
		},

		close: function() {
			this.$el.dialog("close");
			this.$el.remove();
		},

		beforeRender: function() {
			this.$el.html($.tmpl(this.template, this.data));

			$(this.el).dialog({
				autoOpen: false,
				width: "116em",
				modal: true,
				dialogClass: "webmis",
				title: this.options.title ? this.options.title : "Создание направления",
				onClose: this.close,
				buttons: [{
					text: "Сохранить",
					click: this.onSave,
					"class": "button-color-green save"
				}, {
					text: "Отмена",
					click: this.close
				}]
			});
		},

		render: function() {
			return this;
		},

		afterRender: function() {
			//console.log('afterRender');
		},

		renderNested: function(view, selector) {
			console.log('renderNested',view);
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		onSave: function() {
			//console.log('onSave');
		}

	});

	return Popup;
});
