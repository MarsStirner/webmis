/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory.tmpl",
	"collections/diagnostics/Labs",
	"views/appeal/edit/popups/LabsListView"], function (tmpl, Labs, LabsListView) {

	App.Views.LaboratoryPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close"
		},
		initialize: function () {
			var popup = this;




		},
		renderNested: function (view, selector) {
			var $element = ( selector instanceof $ ) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},
		render: function () {
			var popup = this;

			if ($(popup.$el.parent().length).length === 0) {

				popup.$el.html($.tmpl(this.template, {}));

				var labs = new Labs();
				labs.fetch({success: function(){
					popup.labsListView = new LabsListView({collection: labs});
					popup.renderNested(popup.labsListView, ".labs-list-el");

				}});



				$("body").append(this.el);
				$(popup.el).dialog({
					autoOpen: false,
					width: "116em",
					modal: true,
					dialogClass: "webmis"
				});
				//popup.$(".popup #dp").datepicker();
				popup.$("a").click(function (event) {
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
