
require.config({
	baseUrl: "/js/app"
});

(function(){
/*	Backbone.emulateHTTP = true;
	Backbone.emulateJSON = true;*/

	var ExtendedRouter = Backbone.Router.extend({
		navigate: function (fragment, options) {
			this.trigger("navigate", fragment);
			Backbone.Router.prototype.navigate.call(this, fragment, options);
		}
	});

	var Router = ExtendedRouter.extend({

		updateUrl: function ( path, params ) {
			if ( params ) {
				//App.Router.navigate( path + "?" + $.param(params) );
			}else {
				//App.Router.navigate( path );
			}
			App.Router.navigate( path );
		},
		initialize: function () {

		},

		routes: {
			"": "index",
			"auth/": "authorization",
			"auth/:query": "authorization",
			":query": "index",
			"patients/": "patients",
			"patients/:query": "patients",
			"patients/new/": "newPatient",
			"patients/new/:page/": "newPatient",
			"patients/:id/edit/": "editPatient",
			"patients/:id/edit/:page/": "editPatient",
			"patients/:id/": "patient",
			"patients/:id/appeals/new/": "newAppeal",
			"patients/:id/appeals/new/:query": "newAppeal",
			"patients/:id/appeals/": "patientAppeals",
			"appeals/": "appeals",
			"appeals/:query": "appeals",

			/*"appeals/:id/": "appeal",
			"appeals/:query": "appeals",
			"appeals/:id/examinations/": "examinations",
			"appeals/:id/examinations/:query": "examinations",
			"appeals/:id/diagnostics/:type/": "diagnostics",
			"appeals/:id/diagnostics/:type/:query": "diagnostics",
			"examinations/:id/": "examination",*/

			"appeals/:id/examinations/new/first/": "newFirstExamination",
			//"appeals/:id/examinations/new/initial/": "newInitialExamination",

			//appeal
			"appeals/:id": "appeal",
			"appeals/:id/": "appeal",
			"appeals/:id/edit/": "editAppeal",
			"appeals/:id/:page": "appeal",
			"appeals/:id/:page/": "appeal",
			"appeals/:id/:page/:query": "appeal",
			"appeals/:id/:page/:subpage": "appeal",
			"appeals/:id/:page/:subpage/": "appeal",
			"appeals/:id/:page/:subpage/:query": "appeal",


			"prints/": "prints"
		},

		authorization: function () {
			require(["views/authorization"], function (){
				var authView = new App.Views.Authorization;
				authView.render();
			});
		},
		checkAuthToken: function () {
			if ( !Core.Cookies.get("authToken") ) {
				window.location.href = "/auth/";
				return false
			}
			return true
		},

		index: function () {
			if (Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) {
				this.patients();
			}else {
				this.appeals();
			}
		},

		patients: function (){
			if ( !this.checkAuthToken() ) {
				return false
			}

			// Используется для навигации в хедере
			this.currentPage = "patients";

			require(["views/app", "views/pages/patients-list"], function (AppView){

				var view = new App.Views.PatientsList ({
					path: Backbone.history.fragment
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		},

		patient: function (id) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "patients";

			require(["views/app", "views/pages/patient-card"], function (AppView){
				var view = new App.Views.PatientCard ({
					path: Backbone.history.fragment,
					id: id
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}

				//this.appView.render();
			});
		},

		newPatient: function (page) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "patients";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/patient", "views/pages/patient-edit"], function (AppView){
				var view = new App.Views.PatientEdit ({
					page: page,
					path: Backbone.history.fragment,
					model: new App.Models.Patient,
					referrer: referrer
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		},

		editPatient: function (id, page) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "patients";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/patient", "views/pages/patient-edit"], function (AppView){
				var Patient = new App.Models.Patient({
					id: id
				});
				Patient.fetch({
					success: function(){

						var view = new App.Views.PatientEdit ({
							page: page,
							path: Backbone.history.fragment,
							model: Patient,
							referrer: referrer
						});

						if (!this.appView) {
							this.appView = new AppView({
								renderView: view
							});
							this.appView.render();
						} else {
							var newMain = $('<div id="main"></div>').append(view.render().el);
							this.appView.$("#main").remove();
							this.appView.$el.append(newMain);
							//this.appView.changeRenderView(view);
						}
					}
				});
			});
		},

		newAppeal: function ( patientId ) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";
			var referrer = Core.Url.getReferrer();

			require( ["views/app", "models/appeal", "models/patient", "views/pages/appeal-edit", "views/mkb-directory"], function (AppView) {
				var Appeal = new App.Models.Appeal;

				Appeal.get("patient").set("id", patientId);

				var view = new App.Views.AppealEdit({
					model: Appeal,
					referrer: referrer
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			} );
		},

		editAppeal: function ( appealId ) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";
			var referrer = Core.Url.getReferrer();

			require( ["views/app", "models/appeal", "models/patient", "views/pages/appeal-edit", "views/mkb-directory"], function (AppView) {
				var Appeal = new App.Models.Appeal({
					id: appealId
				});

				Appeal.fetch({
					success: function(){
						var view = new App.Views.AppealEdit({
							model: Appeal,
							referrer: referrer
						});

						if (!this.appView) {
							this.appView = new AppView({
								renderView: view
							});
							this.appView.render();
						} else {
							var newMain = $('<div id="main"></div>').append(view.render().el);
							this.appView.$("#main").remove();
							this.appView.$el.append(newMain);
							//this.appView.changeRenderView(view);
						}
					}
				});

			} );
		},


		patientAppeals: function (id) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "patients";

			require(["views/app", "views/pages/patient-appeals"], function (AppView) {
				var view = new App.Views.PatientAppeals ({
					path: Backbone.history.fragment,
					id: id
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		},

		appeals: function () {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";

			require(["views/app", "views/pages/appeals-list"], function (AppView){
				var view = new App.Views.AppealsList ({
					path: Backbone.history.fragment
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		},

		appeal: function (id, page, subpage) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";

			if (page)
				page = subpage ? page + "-" + subpage : page;
			else
				page = "card";

			require(["views/app", "views/appeal/edit/main"], function (AppView, AppealMainView) {

				var view = new AppealMainView({
					path: Backbone.history.fragment,
					id: id,
					type: page
				});

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		},

		/*appeal: function (id) {
			this.currentPage = "appeals";

			require(["views/pages/appeal-card"], function (){
				var Application = new AppView({
					renderView: new App.Views.AppealCard ({
						path: Backbone.history.fragment,
						id: id
					})
				});
				Application.render();
			});
		},

		examinations: function (id) {
			this.currentPage = "appeals";
			require(["views/pages/appeal-examinations"], function (){

				var Application = new AppView({
					renderView: new App.Views.AppealExaminations ({
						path: Backbone.history.fragment,
						id: id
					})
				});
				Application.render();
			});
		},
		examination: function (id) {
			this.currentPage = "appeals";
			require(["views/pages/examination"], function (){

				var Application = new AppView({
					renderView: new App.Views.Examination ({
						path: Backbone.history.fragment,
						id: id
					})
				});
				Application.render();
			});
		},

		diagnostics: function (id, diagType) {
			this.currentPage = "appeals";
			require(["views/pages/diagnostics/appeal-diagnostics-main"], function (AppealMainView) {
				var view = new AppealMainView({
					path: Backbone.history.fragment,
					id: id,
					type: diagType
				});

				$("#main").html ( view.render().el );
			});
		}*/

		prints: function(){
			require(["views/app", "views/pages/prints"], function (AppView) {
				var view = new App.Views.Prints();

				if (!this.appView) {
					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
				}
			});
		},

		newFirstExamination: function (id) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";

			require(["views/app", "views/appeal/edit/main"], function () {
				var view = new App.Views.Main({
					path: Backbone.history.fragment,
					id: id,
					type: "first-examination-edit",
					referrer: Core.Url.getReferrer()
				});

				if (!this.appView) {
					this.appView = new App.Views.App({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		}//,

		/*newInitialExamination: function (id) {
			if ( !this.checkAuthToken() ) {
				return false
			}

			this.currentPage = "appeals";

			require(["views/app", "views/appeal/edit/main"], function () {

				var view = new App.Views.Main({
					path: Backbone.history.fragment,
					id: id,
					type: "examination-initial",
					referrer: Core.Url.getReferrer()
				});

				if (!this.appView) {
					this.appView = new App.Views.App({
						renderView: view
					});
					this.appView.render();
				} else {
					var newMain = $('<div id="main"></div>').append(view.render().el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);
					//this.appView.changeRenderView(view);
				}
			});
		}*/
	});

	App.Router = new Router();
	Backbone.history.start({pushState: true});

	App.Router.cachedBreadcrumbs = {
		PATIENTS: {
			title: "Пациенты",
			uri: "/patients/"
		},
		PATIENT: {
			template: "#breadcrumbs-template-patient",
			uri: "/patients/:id/"
		},
		PATIENTS_NEW: {
			title: "Создание карточки",
			uri: "/patients/new/"
		},
		PATIENTS_EDIT: {
			title: "Редактирование карточки",
			uri: "/patients/:id/edit/"
		},
		APPEAL: {
			title: "Просмотр обращения",
			uri: "/appeals/:id/"
		},
		MOVES: {
			title: "Движение по отделениям",
			uri: "/appeals/:id/moves"
		},
		BEDS: {
			title: "Регистрация на койке",
			uri: "/appeals/:id/hospitalbed/"
		},
		APPEALS_NEW: {
			title: "Создание обращения",
			uri: "/patients/:id/appeals/new/"
		},
		EXAMS: {
			title: "Осмотры",
			uri: "/appeals/:id/examinations/"
		},
		LABORATORY: {
			title: "Лабораторные исследования",
			uri: "/appeals/:id/diagnostics/laboratory/"
		},
		INSTRUMENTAL: {
			title: "Инструментальные исследования",
			uri: "/appeals/:id/diagnostics/instrumental/"
		},
		CONSULTATION: {
			title: "Консультации",
			uri: "/appeals/:id/diagnostics/consultations/"
		}
	};
	App.Router.compile = function (link, options) {
		if ( link.template ) {
			link.title = $(link.template).tmpl(options ).text();
		}
		link.uri = Core.Url.compileUri(link.uri, options);

		return link
	};



}).call();
