/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory-edit-popup.tmpl"],
	function (tmpl) {

		return View.extend({
			template: tmpl,
			className: "popup",

			events: {
				"click .ShowHidePopup": "close",
				"click .save": "onSave"
			},
			initialize: function () {
				var view = this;

				view.model = this.options.model;

			},


			render: function () {
				var view = this;

				if ($(view.$el.parent().length).length === 0) {

					view.$el.html($.tmpl(this.template, view.model.toJSON()));

					$("body").append(this.el);

					view.$el.dialog({
						autoOpen: false,
						width: "116em",
						modal: true,
						dialogClass: "webmis"
					});
					//popup.$(".popup #dp").datepicker();
//					popup.$("a").click(function (event) {
//						event.preventDefault();
//					});
				}

				return view;
			},

			onSave: function () {
				var popup = this;
				console.log('onsave')

			},

			open: function () {
				this.$el.dialog("open");
				$(".ui-dialog-titlebar").hide();

			},

			close: function () {
				this.$el.dialog("close");
				$(".ui-dialog-titlebar").hide();
				this.$el.remove();

			}
		});

	});
