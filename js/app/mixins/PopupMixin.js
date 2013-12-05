define([], function() {

	return function popup() {

		this.setDefaults({

			className: "popup",

			template: '',

			data: {},

			open: function() {
				this.$el.dialog("open");
			},

			close: function() {
				var self = this;
				self.$el.dialog("close");
				self.$el.remove();
			},

			renderNested: function(view, selector) {
				var $element = (selector instanceof $) ? selector : this.$el.find(selector);
				view.setElement($element).render();
			},

			onSave: function() {
			},

			beforeRender: function(){

			},
			afterRender: function(){

			}

		});

		this.before('initialize', function(){
			_.bindAll(this);
		});

		this.before('render', function() {
			var self = this;
			this.beforeRender();
			this.$el.html($.tmpl(this.template, this.data));

			this.$el.dialog({
				autoOpen: false,
				width: self.options.width ? self.options.width: "116em",
				modal: true,
				dialogClass: "webmis",
				title: self.options.title ? self.options.title : "Создание направления",
				onClose: self.close,
				buttons: [{
					text: self.options.saveText ? self.options.saveText : "Сохранить",
					click: self.onSave,
					"class": "button-color-green save"
				}, {
					text: "Отмена",
					click: self.close
				}]
			});
		});

		this.after('render', function() {
			this.afterRender();
		});

	}
});
