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
				console.log('popup view close')
				this.$el.dialog("close");
				this.$el.remove();
			},

			renderNested: function(view, selector) {
				console.log('renderNested', view);
				var $element = (selector instanceof $) ? selector : this.$el.find(selector);
				view.setElement($element).render();
			},

			onSave: function() {
				//console.log('onSave');
			},

			beforeRender: function(){

			},
			afterRender: function(){

			}

		});

		this.before('render', function() {
			this.beforeRender();
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
		});

		this.after('render', function() {
			this.afterRender();
		});

	}
});
