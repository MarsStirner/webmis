/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory.tmpl"], function (tmpl) {

	App.Views.LaboratoryPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close"
		},

		render: function () {
			if ($(this.$el.parent().length).length === 0) {
				this.$el.html($.tmpl(this.template, {}));
				$("body").append(this.el);
				$(this.el).dialog({
					autoOpen: false,
					width: "116em",
					modal: true,
					dialogClass: "webmis"
				});
				this.$(".popup #dp").datepicker();
				this.$("a").click(function (event) {
					event.preventDefault();
				});
			}

			return this;
		},

		open: function () {
			$(".ui-dialog-titlebar").hide();
			this.$el.dialog("open");
		},

		close: function () {
			$(".ui-dialog-titlebar").show();
			this.$el.dialog("close");
		}
	});

	return App.Views.LaboratoryPopup
});