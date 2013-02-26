define(["text!templates/appeal/edit/popups/biomaterial-popup.tmpl"],
	function (biomaterialPopupTmpl) {

		var BiomaterialPopup = View.extend({
			template: biomaterialPopupTmpl,
			className: "popup",

			events: {
				"click .ShowHidePopup": "close"
			},
			initialize: function () {
				var popup = this;
				popup.biomaterial = popup.options.biomaterial;


			},
			render: function () {
				var popup = this;
				console.log('render biomaterial popup', popup.biomaterial,popup.options);

				this.$el.html($.tmpl(this.template, popup.biomaterial.toJSON()));

				$("body").append(popup.$el);

				$(popup.$el).dialog({
					autoOpen: false,
					width: "116em",
					modal: true,
					dialogClass: "webmis"//,
					//title: "Исследования"
				});

				return popup;
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

		return BiomaterialPopup;
	});
