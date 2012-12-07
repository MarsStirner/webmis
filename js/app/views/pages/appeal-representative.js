define([
	"text!templates/pages/appeal-representative.tmpl",
	"views/pages/patient-edit",
	"views/pages/patients-list"
], function (tmpl) {

	App.Views.AppealRepresentative = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .PrevPage": "onBackToSearchClick",
			"click .CloseHistory": "close"
		},

		initialize: function () {
			_.bindAll(this);

			this.patientList = new App.Views.PatientsList({
				path: Backbone.history.fragment,
				popUpMode: true
			});

			this.patientList.on("patient:selected",this.onPatientSelect, this);
			this.patientList.on("patient:newClick",this.onNewPatientClick, this);

			this.patientEdit = new App.Views.PatientEdit({
				model: new App.Models.Patient,
				popUpMode: true
			});

			this.patientEdit.on("patient:created",this.onPatientCreate, this);
			this.patientEdit.on("patient:canceled", this.onCancel, this);
		},

		onNewPatientClick: function () {
			this.patientEdit = new App.Views.PatientEdit({
				popUpMode: true
			});

			this.patientEdit.on("patient:created",this.onPatientCreate, this);
			this.patientEdit.on("patient:canceled", this.onCancel, this);

			this.$(".EditLine").html(this.patientEdit.render().el);

			/*this.patientEdit.model = new App.Models.Patient();
			this.patientEdit.attachModelHandlers();
			this.patientEdit.currentStep = "general";*/

			this.toggleState("new");
		},

		onBackToSearchClick: function () {
			this.toggleState("search");
		},

		onPatientSelect: function (patient) {
			this.representativeSelectionMade(patient);
		},

		onPatientCreate: function (patient) {
			this.representativeSelectionMade(patient);
		},

		onCancel: function () {
			this.close();
		},

		representativeSelectionMade: function (patient) {
			this.trigger("representative:selected", patient);
			this.close();
		},

		toggleState: function (state) {
			switch (state) {
				case "edit":
					//this.$(".PopupHeader").text("Редактирование карточки законного представителя");
					this.$el.dialog("option", "title", "Редактирование карточки законного представителя");
					this.$(".SearchLine").addClass("Hidden");
					this.$(".EditLine").removeClass("Hidden");
					this.$el.parent().find(".PrevPage").removeClass("Hidden");
					break;
				case "new":
					//this.$(".PopupHeader").text("Создание карточки законного представителя");
					this.$el.dialog("option", "title", "Создание карточки законного представителя");
					this.$(".SearchLine").addClass("Hidden");
					this.$(".EditLine").removeClass("Hidden");
					this.$el.parent().find(".PrevPage").removeClass("Hidden");
					break;
				case "search":
					//this.$(".PopupHeader").text("Добавление законного представителя");
					this.$el.dialog("option", "title", "Добавление законного представителя");
					this.$(".EditLine").addClass("Hidden");
					this.$el.parent().find(".PrevPage").addClass("Hidden");
					this.$(".SearchLine").removeClass("Hidden");
					break;
			}
		},

		render: function () {
			if ($(this.$el.parent()).length === 0) {
				this.$el.html($.tmpl(this.template, {}));

				this.$el.dialog({
					autoOpen: false,
					width: "118em",
					maxHeight: "600px",
					modal: true,
					dialogClass: "webmis",
					resizable: false,
					title: "Добавление законного представителя"
				});

				var prevPageLink = $("<a href='#' class='Hidden PrevPage' style='float: left; margin: .1em 16px .2em 0;'>← Назад к поиску</a>");
				prevPageLink.on("click", this.onBackToSearchClick);

				this.$el.parent().find(".ui-dialog-titlebar").prepend(prevPageLink);

				//this.$el.parent().find(".ui-dialog-titlebar").prepend("<a href='#' class='Hidden PrevPage' style='float: left;'>← Назад к поиску</a>");

				this.$el.parent().find("a").click(function (event) {
					event.preventDefault();
				});

				this.$(".SearchLine").html(this.patientList.render().el);
				this.$(".EditLine").html(this.patientEdit.render().el);
			}

			return this;
		},

		open: function (state) {
			//$(".ui-dialog-titlebar").hide();
			this.$el.dialog("open");
			this.$(".SearchLine").find(":input").val("").change();
			state ? this.toggleState(state) : this.toggleState("search");
		},

		openWithEdit: function (patient) {
			this.patientEdit = new App.Views.PatientEdit({
				model: patient,
				popUpMode: true
			});

			this.patientEdit.on("patient:created",this.onPatientCreate, this);
			this.patientEdit.on("patient:canceled", this.onCancel, this);

			this.$(".EditLine").html(this.patientEdit.render().el);
			/*this.patientEdit.attachModelHandlers();
			this.patientEdit.changeStep("", true);
			this.patientEdit.updateButtonText();*/

			this.open("edit");
		},

		close: function () {
			//$(".ui-dialog-titlebar").show();
			this.$el.dialog("close");
		}
	});
});