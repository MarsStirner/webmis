define(function(require) {
	var tmpl = require('text!templates/appeal/edit/popups/instrumental-edit.tmpl');
	var popupMixin = require('mixins/PopupMixin');
	var BFView = require('views/instrumental/InstrumentalPopupBottomFormView');

	require('models/DeepModel');


	return View.extend({
		template: tmpl,
		events: {},

		initialize: function(options) {
			_.bindAll(this);

			//юзер
			this.doctor = {
				name: {
					first: Core.Cookies.get("doctorFirstName"),
					last: Core.Cookies.get("doctorLastName")
				}
			};
			this.data = {
				'doctor': this.doctor
			};

			this.bfView = new BFView({
				data: this.data,
				appeal: this.options.appeal,
				model: this.options.model
			});


			this.depended(this.bfView);

		},

		modelToTree: function() {
			var view = this;
			var tree = [];
			var root = {};
			root.title = view.model.get('name');
			root.expand = true;
			root.icon = false;
			root.select = true;
			root.unselectable = true;
			return [root];
		},

		render: function() {
			var view = this;

			this.$("#dp").datepicker();
			this.$el.closest(".ui-dialog").find('.save').button("disable");

			this.$('.instrumental-researchs').dynatree({
				checkbox: true,
				children: view.modelToTree()
			});

			this.renderNested(this.bfView, ".bottom-form");

			return this;
		},

		onSave: function() {
			console.log('onSave instrumental');
		}
	}).mixin([popupMixin]);


});
