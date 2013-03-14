/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory.tmpl",
	"collections/diagnostics/Labs",
	"views/appeal/edit/popups/LabsListView",
	"views/appeal/edit/popups/TestsGroupListView",
	"views/appeal/edit/popups/SetOffTestsView",
	"models/diagnostics/SetOfTests",
"models/diagnostics/labAnalysisDirection"],
	function (tmpl, Labs, LabsListView, LabTestsListView, SetOffTestsView, SetOfTestsModel, labAnalysisDirection) {

		App.Views.LaboratoryPopup = View.extend({
			template: tmpl,
			className: "popup",

			events: {
				"click .ShowHidePopup": "close",
				"click .save": "onSave"
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
					labs.fetch({success: function () {
						popup.labsListView = new LabsListView({collection: labs});
						popup.renderNested(popup.labsListView, ".labs-list-el");

					}});


					popup.labTestListView = new LabTestsListView();
					popup.renderNested(popup.labTestListView, ".lab-test-list-el");


					popup.setOffTests = new SetOfTestsModel();
					popup.setOffTestsView = new SetOffTestsView({model: popup.setOffTests});
					popup.renderNested(popup.setOffTestsView, ".set-off-test-el");


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

			onSave: function(){
				var popup = this;

				console.log('popup.setOffTests', popup.setOffTests)

				var direction = new labAnalysisDirection(popup.setOffTests);
				direction.eventId = 62577;
				direction.save();
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
