/**
 * User: FKurilov
 * Date: 08.06.12
 */
define([
	"text!templates/appeal/edit/main.tmpl",
	"views/laboratory/LaboratoryView",
	"views/instrumental/InstrumentalView",
	"views/consultations/ConsultationView",
	"views/appeal/edit/pages/monitoring",

	"views/laboratory/LaboratoryResultView",

	//"text!templates/cardnav.tmpl",

	"models/appeal",
	"collections/patient-appeals",

	"views/breadcrumbs",
	"views/menu",
	"views/card-header",

	//"views/appeal/edit/pages/instrumental",


	"views/appeal/edit/pages/examinations",
	"views/appeal/edit/pages/examination-edit",
	"views/appeal/edit/pages/examination-primary",
	"views/appeal/edit/pages/card",

	"views/appeal/edit/pages/moves",
	"views/appeal/edit/pages/HospitalBedView"
], function (
	template,
	LaboratoryView,
	InstrumentalView,
	ConsultationView,

	Monitoring,
	LaboratoryResultView

	) {

	App.Views.Main = View.extend({
		template: template,

		appeal: {},
		patient: {},

		events: {
			//"click .Print": "onPrintClick"//,
			//"click #staticPrints a" : "onStaticPrintsClick"
			//,"click .SectionNav a": "onSectionClick"
		},

		typeViews: {
			"card": App.Views.Card,

			"examinations": App.Views.Examinations,
			"examination-primary": App.Views.ExaminationPrimary,
			"examination-primary-preview": App.Views.ExaminationPrimaryPreview,
			"examination-primary-repeated": App.Views.ExaminationPrimary,
			"examination-primary-repeated-preview": App.Views.ExaminationPrimaryPreview,

			"diagnostics-laboratory": LaboratoryView,
			"diagnostics-laboratory-result": LaboratoryResultView,
			"diagnostics-instrumental": InstrumentalView,
			"diagnostics-consultations": ConsultationView,

			"first-examination-edit": App.Views.ExaminationEdit,

			"moves": App.Views.Moves,
			"hospitalbed": App.Views.HospitalBed,

			"monitoring": Monitoring.Views.Layout
		},

		breadCrumbsMap: {
			"diagnostics-laboratory": App.Router.cachedBreadcrumbs.LABORATORY,
			"diagnostics-instrumental": App.Router.cachedBreadcrumbs.INSTRUMENTAL,
			"diagnostics-consultations": App.Router.cachedBreadcrumbs.CONSULTATION,
			"examinations": App.Router.cachedBreadcrumbs.EXAMS,
			"first-examination-edit": App.Router.cachedBreadcrumbs.EXAMS,
			"examinations-primary": App.Router.cachedBreadcrumbs.EXAMS,
			"card": App.Router.cachedBreadcrumbs.APPEAL,
			"moves": App.Router.cachedBreadcrumbs.MOVES,
			"hospitalbed": App.Router.cachedBreadcrumbs.HOSPITALBED,
			"monitoring": App.Router.cachedBreadcrumbs.APPEAL
		},

		initialize: function () {
			this.appealId = this.options.id;
			this.type = this.options.type;

			if (!(this.appealId && this.typeViews[this.type])) {
				throw new Error("Invalid diagnostic type or empty appeal id");
			}

			this.appeal = new App.Models.Appeal({id: this.appealId});

			this.menu = Data.Menu = new App.Views.Menu(this.getMenuStructure());

			this.menu.options.structure.on("change-page", function (step) {
				pubsub.trigger('noty_clear');

				this.setContentView(step.name);
			}, this);

			this.breadcrumbs = new App.Views.Breadcrumbs();

			this.cardHeader = new App.Views.CardHeader({model: this.appeal});

			this.appeal.on("change", this.onAppealLoaded, this);
			this.appeal.fetch();
		},

		setContentView: function(type, extraOptions) {
			if (this.type !== type || !this.contentView) {
				if (this.typeViews[type]) {
					this.type = type;

					if (this.contentView) {
						this.setBreadcrumbsStructure();
						this.contentView.off(null, null, this);
						if (this.contentView.model) {
							this.contentView.model.off(null, null, this.contentView);
						}
						if (this.contentView.cleanUp) {
							this.contentView.cleanUp();
						}
					}

					//this.contentView = null;

					this.contentView = new this.typeViews[type](_.extend({
						appealId: this.appealId,
						appeal: this.appeal,
						path: this.options.path,
						referrer: this.options.referrer
					}, extraOptions));

					this.contentView.on("change:printState", this.onPrintStateChange, this);
					this.contentView.on("change:viewState", this.onViewStateChange, this);

					//this.togglePrintBtn();
					this.cardHeader.hidePrintBtn();
					this.renderPageContent();
				}
			}
		},

		onPrintStateChange: function () {
			this.togglePrintBtn();
		},

		onViewStateChange: function (event) {
			console.log('onViewStateChange',event);
			this.setContentView(event.type, event.options);
		},

		onAppealLoaded: function () {
			var self = this;
			var appealExtraData = new App.Collections.PatientAppeals();
			appealExtraData.patient = this.appeal.get("patient");
			appealExtraData.setParams({
				filter: {
					number: self.appeal.get("number")
				}
			});
			appealExtraData.on("reset", this.onAppealExtraDataLoaded, this);
			appealExtraData.fetch();

			this.appeal.off("change", this.onAppealLoaded, this);
		},

		onAppealExtraDataLoaded: function (appealExtraData) {
			//TODO: Replace this fast fix (made for monitoring page)
			Core.Data.appealExtraData = appealExtraData = appealExtraData.first();

			this.appeal.closed = appealExtraData ? appealExtraData.get("rangeAppealDateTime").get("end") : false;

			var patient = this.appeal.get("patient");
			patient.on("change", this.onPatientLoaded, this);
			patient.fetch();

			appealExtraData.off("reset", this.onAppealExtraDataLoaded, this);
		},

		onPatientLoaded: function (patient) {
			Cache.Patient = patient;
			this.setContentView(this.type);
			this.ready();
			this.setBreadcrumbsStructure();

			patient.off("change", this.onPatientLoaded, this);
			//this.renderCardnav();
		},

		/*onPrintClick: function (event) {
			event.preventDefault();
			this.contentView.showPrint({
				template: $(event.currentTarget).data("print-template"),
				data: $(event.currentTarget).data("print-data")
			});
		},*/

		/*onStaticPrintsClick: function (event) {
			event.preventDefault();
			window.open($(event.currentTarget).attr("href"), "printWindow", "menubar=0,toolbar=0,status=0,location=0");
		},*/

		/*onSectionClick: function (event) {
			event.preventDefault();
			event.stopPropagation()
			this.updateUrl(event);
		},

		updateUrl: function ( event ) {
			var $target = $(event.currentTarget ),
				href = $target.attr("href");

			if ( href ) {
				App.Router.navigate ( href, {trigger:true} );
			}
		},*/

		setBreadcrumbsStructure: function () {
			if (this.breadCrumbsMap[this.type]) {
					this.breadcrumbs.setStructure([
					App.Router.cachedBreadcrumbs.PATIENTS,
					App.Router.compile(App.Router.cachedBreadcrumbs.PATIENT, this.appeal.get("patient").toJSON()),
					this.breadCrumbsMap[this.type]
				]);

				this.$("#page-head").html(this.breadcrumbs.render().el);
			}
		},

		ready: function(){
			this.$el.html($.tmpl(this.template, this.appeal.toJSON()));

			this.assign({
				".CardHeader": this.cardHeader
			});

			this.$("#page-head").html(this.breadcrumbs.render().el);

			this.$(".LeftSideBar").html(this.menu.render().el);

			//this.menu.delegateEvents();

			this.renderPageContent();
		},

		render: function () {
			return this;
		},

		/*renderCardnav: function () {
			this.$(".CardHeader").html($.tmpl(cardnavTemplate, this.appeal.toJSON()));
			this.$("#printBtn")
				.button()
				.next()
					.button({
						text: false,
						icons: {
							primary: "ui-icon-triangle-1-s"
						}
					})
					.click(function () {
						$(this).parent().next().position({
							my: "right top",
							at: "right bottom",
							of: this
						}).toggleClass("Active");

						//event.stopPropagation();

						return false;
					})
					.parent()
						.buttonset();
						*//**//*.next()
							.hide();
							.menu();*//**//*
			this.togglePrintBtn();*//*
		},*/

		renderPageContent: function () {
			this.menu.setPage(this.type);
			this.$(".ContentSide").html(this.contentView.render().el);
		},

		togglePrintBtn: function () {
			if (this.contentView.canPrint) {
				this.cardHeader.showPrintBtn(this.contentView.printOptions());
			} else {
				this.cardHeader.hidePrintBtn();
			}
			//this.$(".CardHeader .CardPrint")[this.contentView.canPrint ? "show" : "hide"]();
		},

		getMenuStructure: function () {
			var menuStructure = {};

			this.separateRoles(ROLES.DOCTOR_DEPARTMENT, function () {
				var appealJSON = this.appeal.toJSON();
				menuStructure = {
					structure: [
						App.Router.compile({
							name: "monitoring",
							title: "Мониторинг&nbsp;состояния",
							uri: "/appeals/:id/"
						}, appealJSON),
						App.Router.compile({
							name: "examinations",
							title: "Осмотры",
							uri: "/appeals/:id/examinations/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-laboratory",
							title: "Лабораторные исследования",
							uri: "/appeals/:id/diagnostics/laboratory/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-instrumental",
							title: "Инструментальные исследования",
							uri: "/appeals/:id/diagnostics/instrumental/"
						}, appealJSON),
						{name: "medical-info", title: "Лечение", structure: [
							{name: "medical-info", title: "Медикаментозное"},
							{name: "medical-info", title: "Оперативное"},
							{name: "medical-info", title: "Восстановительное"}
						]},
						App.Router.compile({
							name: "diagnostics-consultations",
							title: "Консультации",
							uri: "/appeals/:id/diagnostics/consultations/"
						}, appealJSON),
						{name: "bills", title: "Счета", uri: ""},
						{name: "checkout", title: "Выписка", uri: ""},
						{name: "epicrisis", title: "Эпикризы", uri: ""},
						{name: "history", title: "Титульный лист ИБ", uri: ""}
					]
				};
			}, this);

			this.separateRoles(ROLES.NURSE_DEPARTMENT, function () {
				var appealJSON = this.appeal.toJSON();
				menuStructure = {
					structure: [
						App.Router.compile({
							name: "card",
							title: "Основное",
							uri: "/appeals/:id/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-laboratory",
							title: "Лабораторные исследования",
							uri: "/appeals/:id/diagnostics/laboratory/"
						}, appealJSON),
//						{name: "medical-info", title: "Лечение", structure: [
//							{name: "medical-info", title: "Медикаментозное"},
//							{name: "medical-info", title: "Оперативное"},
//							{name: "medical-info", title: "Восстановительное"}
//						]},
						//App.Router.compile({name: "hospitalbed", title: "Коечный фонд", uri: "/appeals/:id/hospitalbed"}, appealJSON),
						App.Router.compile({name: "moves", title: "Движение пациента", uri: "/appeals/:id/moves"}, appealJSON)

					]
				};
			}, this);

			this.separateRoles(ROLES.DOCTOR_RECEPTIONIST, function () {
				var appealJSON = this.appeal.toJSON();
				menuStructure = {
					structure: [
						App.Router.compile({
							name: "card",
							title: "Основное",
							uri: "/appeals/:id/"
						}, appealJSON),
						App.Router.compile({
							name: "examinations",
							title: "Осмотры",
							uri: "/appeals/:id/examinations/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-laboratory",
							title: "Лабораторные исследования",
							uri: "/appeals/:id/diagnostics/laboratory/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-instrumental",
							title: "Инструментальные исследования",
							uri: "/appeals/:id/diagnostics/instrumental/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-consultations",
							title: "Консультации",
							uri: "/appeals/:id/diagnostics/consultations/"
						}, appealJSON),
//						{name: "medical-info", title: "Лечение", structure: [
//							{name: "medical-info", title: "Медикаментозное"},
//							{name: "medical-info", title: "Оперативное"},
//							{name: "medical-info", title: "Восстановительное"}
//						]},
						/*App.Router.compile({name: "send-to-department", title: "Направить в отделение", uri: "/appeals/:id/"}, appealJSON)*/

						App.Router.compile({name: "moves", title: "Движение пациента", uri: "/appeals/:id/moves"}, appealJSON)

					]
				};
			}, this);

			this.separateRoles(ROLES.NURSE_RECEPTIONIST, function () {
				var appealJSON = this.appeal.toJSON();
				menuStructure = {
					structure: [
						App.Router.compile({
							name: "card",
							title: "Основное",
							uri: "/appeals/:id/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-laboratory",
							title: "Лабораторные исследования",
							uri: "/appeals/:id/diagnostics/laboratory/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-instrumental",
							title: "Инструментальные исследования",
							uri: "/appeals/:id/diagnostics/instrumental/"
						}, appealJSON),
						App.Router.compile({
							name: "diagnostics-consultations",
							title: "Консультации",
							uri: "/appeals/:id/diagnostics/consultations/"
						}, appealJSON),
//						{name: "address", title: "Диагностика"},
//						{name: "medical-info", title: "Лечение", structure: [
//							{name: "medical-info", title: "Медикаментозное"},
//							{name: "medical-info", title: "Оперативное"},
//							{name: "medical-info", title: "Восстановительное"}
//						]},
						//App.Router.compile({name: "send-to-department", title: "Направить в отделение", uri: "/appeals/:id/"}, appealJSON)
						//App.Router.compile({name: "hospitalbed", title: "Коечный фонд", uri: "/appeals/:id/hospitalbed"}, appealJSON),

						App.Router.compile({
							name: "moves",
							title: "Движение по отделениям",
							uri: "/appeals/:id/moves"
						}, appealJSON)
					]
				};
			}, this);

			return menuStructure;
		}
	});

	return App.Views.Main;
});
