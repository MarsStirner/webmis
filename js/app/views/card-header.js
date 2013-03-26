/**
 * User: FKurilov
 * Date: 22.11.12
 */
define(["text!templates/card-" +
	"header.tmpl", "models/appeal"], function (template) {

	/*var CardPrint = View.extend({
		tagName: "",
		className: "CardPrint",

		events: {

		},

		initialize: function (options) {

		},

		render: function () {
			return this;
		}
	});*/

	App.Views.CardHeader = View.extend({
		events: {
			/*"click .PrintBtn": "onPrintBtnClick",
			"click .SubPrint": "onSubPrintClick"*/
		},

		template: template,

		data: function () {
			return this.model.toJSON();
		},
		
		initialize: function (options) {
			this.model.on("change", this.render, this);
		},

		/**
		 * @param options
		 * {
		 * 	visible: true,
		 * 	dropDownItems: [{
		 * 		label: "",
		 * 		params: {
		 * 			templateName: "",
		 * 			data: {}
		 *		}
		 * 	}],
		 * 	label: "",
		 * 	params: {
		 * 		templateName: "",
		 * 		data: {}
		 * 	}
		 * }
		 */
		showPrintBtn: function (options) {
		if (options) {
				var $printBtnHolder = $("<div/>");
				var $printBtn = $('<button class="PrintBtn"/>');

				$printBtn
					.button({label: options.label})
					.click(function (event) {
						event.preventDefault();
						options.handler.apply(options.scope);
					});

				$printBtnHolder.append($printBtn);

				if (options.dropDownItems && options.dropDownItems.length) {
					var $dropDown = $(
						'<div class="DDList" style="display: block; left: -200px;">' +
							'<div class="Content ButtonContent" style="top: 0; max-height: 30em; width: 20em;">' +
							'<ul></ul>' +
						'</div>'
					);
					var $list = $dropDown.find("ul");

					_(options.dropDownItems).each(function (ddi) {
						$list.append($("<li><a href='#' class='SubPrint'>" + ddi.label + "</a></li>").click(function () {
							event.preventDefault();
							ddi.handler.apply(options.scope);
						}));
					});

					var $dropDownTrigger = $("<button/>").button({
							text: false,
							label: "Выбор формы",
							icons: {
								primary: "ui-icon-triangle-1-s"
							}
						})
						.click(function () {
							$dropDown.position({
								my: "right top",
								at: "left bottom",
								of: $(this).parent().parent()
							}).toggleClass("Active");

							return false;
						});

					$printBtnHolder.append($dropDownTrigger).buttonset();
					$printBtnHolder.after($dropDown);
				}

				this.$(".CardPrint").empty().append($printBtnHolder).show();
			} else {

			}
		},

		hidePrintBtn: function () {
			this.$(".CardPrint").empty();
		},

		/*onPrintBtnClick: function (event) {
			console.log(event);
		},

		onSubPrintClick: function (event) {
			console.log(event);
		},*/

		render: function () {
			this.$el.html($.tmpl(this.template, this.data()));

			return this;
		}
	});

	return App.Views.CardHeader;
});
