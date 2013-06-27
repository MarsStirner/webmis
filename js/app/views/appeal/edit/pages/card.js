define([
	//"text!templates/appeal/edit/pages/monitoring.tmpl",
	"text!templates/appeal/edit/pages/card.tmpl",
	"collections/moves/moves",
	"views/print",
	"models/print/appeal"
], function(
//cardMonitoringTemplate,
cardTemplate, Moves) {

	App.Views.Card = View.extend({
		events: {
			"click .EditAppeal": "onEditAppealClick"
		},

		attributes: {
			"style": "display: table;"
		},

		canPrint: true,

		printOptions: function() {
			var self = this;

			return {
				label: "Печать",
				scope: self,
				handler: this.printAppeal,
				dropDownItems: [{
						label: "Титульный лист формы 003\\у",
						handler: this.printAppeal
					}, {
						label: "Статкарта",
						handler: this.printStatisticCard
					}, {
						label: "Согласие на обследование ВИЧ",
						handler: this.printConsentToExam
					}, {
						label: "Согласие на обследование и лечение (представитель)",
						handler: this.printConsentToTreatmentRepresent
					}, {
						label: "Согласие пациента на обследование и лечение (пациент)",
						handler: this.printConsentToTreatment
					}, {
						label: "Согласие субъекта на обработку персональных данных (пациент)",
						handler: this.printConsentToProcessing
					}, {
						label: "Согласие субъекта на обработку персональных данных (представитель)",
						handler: this.printConsentToProcessingRepresent
					}
				]
			}
		},

		initialize: function() {
			this.model = this.options.appeal;
			this.model.on("change", this.render, this);
		},

		printAppeal: function() {
			var self = this;

			var PrintAppeal = new App.Models.PrintAppeal({
				id: this.model.get("id")
			});

			var moves = new Moves();
			moves.appealId = this.model.get("id");

			$.when(PrintAppeal.fetch(), moves.fetch()).then(function() {
				new App.Views.Print({
					data: _.extend({
						moves: moves.toJSON()
					}, PrintAppeal.toJSON()),
					template: "f003"
				});
			});
		},

		printConsentToExam: function() {
			new App.Views.Print({
				data: this.model.get("patient").toJSON(),
				template: "consent_to_the_examination"
			});
		},

		printConsentToTreatmentRepresent: function() {
			new App.Views.Print({
				data: this.model.get("patient").toJSON(),
				template: "consent_to_treatment_representative"
			});
		},

		printConsentToTreatment: function() {
			new App.Views.Print({
				data: this.model.get("patient").toJSON(),
				template: "consent_to_treatment"
			});
		},

		printConsentToProcessing: function() {
			new App.Views.Print({
				data: this.model.get("patient").toJSON(),
				template: "consent_to_the_processing"
			});
		},

		printConsentToProcessingRepresent: function() {
			new App.Views.Print({
				data: this.model.get("patient").toJSON(),
				template: "consent_to_the_processing_representative"
			});
		},

		printStatisticCard: function() {
			var PrintAppeal = new App.Models.PrintAppeal({
				id: this.model.get("id")
			});

			new App.Views.Print({
				model: PrintAppeal,
				template: "f066"
			});

			PrintAppeal.fetch();
		},

		onEditAppealClick: function(event) {
			if (!this.model.isClosed())
				App.Router.navigate("appeals/" + this.model.id + "/edit/", {
					trigger: true
				});
		},

		/*showPrint: function (options) {
			var printModel;
			if (options.data === "appeal") {
				printModel = new App.Models.PrintAppeal({id: this.model.id});
			} else {
				printModel = new App.Models.Patient({id: this.model.get("patient").id});
			}
			*/
		/*var PrintAppeal = new App.Models.PrintAppeal({
				id: this.model.id
			});*/
		/*
			new App.Views.Print({
				model: printModel,
				template: options.template
			});
			printModel.fetch();
		},*/

		/*ready: function () {
			this._ready = true;
		},*/

		render: function() {
			this.initWithDictionaries([{
					name: "hospitalizationPointTypes",
					id: 19,
					fd: true
				}, {
					name: "hospitalizationTypes",
					id: 18,
					fd: true
				}
			], function(dicts) {
				//var template = cardTemplate;

				/*if (Core.Data.currentRole() == ROLES.DOCTOR_DEPARTMENT) {
					this.$el.html(_.template(cardMonitoringTemplate, _.extend({
						closed: this.model.closed,
						isClosed: this.model.isClosed(),
						allowEditAppeal: Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST,
						dicts: dicts
					}, this.model.toJSON())));
				} else {*/
					var closeDate = false;
					if(this.model.get('closeDateTime')){
						closeDate = this.model.get('closeDateTime');
					}

				this.$el.html($.tmpl(cardTemplate, _.extend({
					closeDate: closeDate,
					isClosed: this.model.get('closed'),
					allowEditAppeal: Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST,
					dicts: dicts
				}, this.model.toJSON())));
				//}

				/*this.separateRoles(ROLES.DOCTOR_DEPARTMENT, function () {
					template = cardMonitoringTemplate
				});*/

				this.$(".EditAppeal").button({
					icons: {
						primary: "icon-edit"
					}
				});

				this.delegateEvents();

				this.trigger("change:printState");

				return this;
			}, this, true);

			return this;
		}
	});



	return App.Views.Card;
});
