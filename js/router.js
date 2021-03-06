require.config({
	urlArgs: "bust=v"+GUI_VERSION,

	baseUrl: "/js/app",

	paths: {
		"jquery": "../lib/jquery/jquery-1.8.2.min",
		"underscore": "../lib/underscore/underscore-1.4.2",
		"text": "../lib/requirejs/text",
		"tpl": "../lib/requirejs/underscore-tpl",
		"backbone": "../lib/backbone/backbone-0.9.1",
		"advice": "../lib/backbone.advice/advice",
		"deep-model": "../lib/backbone.deep-model/deep-model-0.10.4",

		"inputmask": "../lib/jquery.inputmask/jquery.inputmask",
		"moment": "../lib/moment/moment-2.0.0.min",
        "twix": "../lib/moment.twix/twix",
        "gremlins": "../lib/gremlins/gremlins.min",

		"md5_crypt": "../lib/md5_crypt/md5_crypt",
		"select2": "../lib/select2/select2-3.1",

		"rivetsLib": "../lib/rivets/rivets-0.5.0",
		"rivets": "../lib/rivets/adapter",
        "datetimeEntry": "../lib/jquery.datetimeEntry/jquery.datetimeentry",
        "fullCalendar": "../lib/fullcalendar/fullcalendar",
        "qtip": "../lib/jquery.qtip/jquery.qtip"
	},
	shim: {
		'backbone': {
			deps: ['underscore', 'jquery'],
			exports: 'Backbone'
		},
		'underscore': {
			exports: '_'
		},
		'inputmask': {
			//deps: ['inputmask/jquery.inputmask.date.extensions'],
			exports: 'jQuery.fn.inputmask'
		},
        'datetimeEntry': {
            deps: ['jquery'],
            exports: 'jQuery.fn.datetimeEntry'
        },
        'fullCalendar': {
            deps: ['jquery'],
            exports: 'jQuery.fn.fullCalendar'
        }
	},
	map: {
		'*': { //короткие алиасы
			'b': 'backbone',
			'_': 'underscore'
		}
	}
});



require(["views/FlashMessageView"], function(FlashMessage) {

	var messenger = new FlashMessage();
});

(function() {
	/*	Backbone.emulateHTTP = true;
	Backbone.emulateJSON = true;*/

	var ExtendedRouter = Backbone.Router.extend({
		navigate: function(fragment, options) {
			this.trigger("navigate", fragment);
			Backbone.Router.prototype.navigate.call(this, fragment, options);
		}
	});

	var Router = ExtendedRouter.extend({

		updateUrl: function(path, params) {
			if (params) {
				//App.Router.navigate( path + "?" + $.param(params) );
			} else {
				//App.Router.navigate( path );
			}
			App.Router.navigate(path);
		},
		initialize: function() {

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
			"patients/:id/summary": "patientSummaryList",
			"patients/:id/summary/:docs": "patientSummaryItem",

			"patients/:id/appeals/new/": "newAppeal",
			"patients/:id/appeals/new/:query": "newAppeal",
			"patients/:id/appeals/": "patientAppeals",
			"appeals/": "appeals",
			"appeals/:query": "appeals",


			"appointments/": "appointmentsPatient",
			"appointments/:id": "appointments",

			"anareports/": "anareports",

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
			"appealpoly/:id": "appealPolyReview",
			"appeals/:id": "appealReview",
			"appeals/:id/": "appealReview",
			"appeals/:id/edit": "appealEdit",
			"appeals/:id/edit/": "appealEdit",
			"appeals/:id/:page": "appealReviewPage",
			"appeals/:id/:page/": "appealReviewPage",
			"appeals/:id/:page/:subid": "appealSubItemReview",
			"appeals/:id/:page/:subid/": "appealSubItemReview",
			"appeals/:id/:page/new/:subid": "appealSubItemNew",
			"appeals/:id/:page/new/:subid/": "appealSubItemNew",
			"appeals/:id/:page/:subid/edit": "appealSubItemEdit",
			"appeals/:id/:page/:subid/edit/": "appealSubItemEdit",

			/*"appeals/:id/:page/:query": "appeal",
			"appeals/:id/:page/:subpage": "appeal",
			"appeals/:id/:page/:subpage/": "appeal",
			"appeals/:id/:page/:subpage/:query": "appeal",
			"appeals/:id/:page/:subpage/:query/": "appeal",
			"appeals/:id/:page/:subpage/:subpage/:subpageId": "appeal",
			"appeals/:id/:page/:subpage/:subpage/:subpageId/": "appeal",*/

			"biomaterials/": "biomaterials",
			"reports/*path": "reports",
			"statements/*path": "statements",
			"prescriptions/*path": "prescriptions",




			"prints/": "prints",

			"widgets/": "widgets",

			"test/": "test"
		},

		test: function() {
			require(["views/documents/documents"], function(Documents) {
				//var docsLayout = new Documents.Views.List.Layout();
				$("#wrapper").html(new Documents.Views.List.Layout().render().el);
				$("#dinputest").dPassword({});
			});
		},

		widgets: function() {
			require(["text!templates/widgets.html", "views/widget"], function(tmplWidgets, Widget) {
				$("#wrapper").append(_.template(tmplWidgets));

				var w_date = new Widget.Date({
					el: $(".date")
				}).render();

				var w_dateTime = new Widget.DateTime({
					el: $(".date")
				}).render();
			});
		},

		authorization: function() {
			window.document.title = "Авторизация";
			require(["views/authorization"], function() {
				var authView = new App.Views.Authorization;
				authView.render();
			});
		},
		checkAuthToken: function(args) {
			var tokenArg = _.find(args, function(arg) {
			    return arg.indexOf('token') > -1;
			});
			if (tokenArg) {
				var authData = {};
				_.each(tokenArg.split('?')[1].split('&'), function(arg){
					authData[arg.split('=')[0]] = arg.split('=')[1];
				});
				if (authData.role === 'clinicDoctor' || authData.role === 'assistNurse') {
					authData.role = 'strDoctor'
				}
				if (_.contains(ROLES, authData.role)) {
					Core.Cookies.set("authToken", authData.token);
					Core.Cookies.set("currentRole", authData.role);
				}
				$.get(DATA_PATH+"user-info/").complete(function(data) {
					if (data.responseText) {
						var userInfo = $.parseJSON(data.responseText.split('callback(')[1].slice(0,-1));
						Core.Cookies.set("userId", userInfo.userId);
						Core.Cookies.set("doctorFirstName", userInfo.doctor.name.first);
						Core.Cookies.set("doctorLastName", userInfo.doctor.name.last);
						Core.Cookies.set("doctorMiddleName", userInfo.doctor.name.middle);
						if (userInfo.doctor.department && userInfo.doctor.department.id) {
							Core.Cookies.set("userDepartmentId", userInfo.doctor.department.id);
						}
						var roles = "[";
						_.each(userInfo.roles, function(role, r){
							roles = roles + ( r != 0 ? ',' : '') + role.id;
						});
						Core.Cookies.set("roles", roles + ']');
						return true
					} else {
						return false
					}
				});
				return true
			} else {
				if (!(Core.Cookies.get("authToken") && Core.Cookies.get("currentRole"))) {
					window.location.href = "/auth/";
					return false
				}
				return true
			}
		},

		index: function() {
			if (Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) {
				this.patients();
			} else if (Core.Data.currentRole() === ROLES.CHIEF) {
				this.chiefIndex();
			} else {
				this.appeals();
			}
		},

		chiefIndex: function() {
			if (!this.checkAuthToken()) {
				return false
			}


			require(["views/app", "views/chief/IndexView"], function(AppView, IndexView) {

				var view = new IndexView();

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

		biomaterials: function() {
			this.currentPage = "biomaterials";
			console.log('biomaterials');
			window.document.title = "Биоматериалы";

			require(["views/app", "views/biomaterials/BiomaterialsView"], function(AppView, BiomaterialsView) {
				var view = new BiomaterialsView();

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

		reports: function(path) {
			this.currentPage = "reports";
			//console.log('router reports', arguments);
			window.document.title = "Отчёты";

			require(["views/app", "views/reports/ReportsMainView"], function(AppView, ReportsMainView) {
				var view = new ReportsMainView({
					path: path
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

				}
			});
		},

		statements: function(path) {
			this.currentPage = "statements";

			require(["views/app", "views/statements/IndexView"], function(AppView, IndexView) {
				var view = new IndexView({
					path: path
				});

				if (!this.appView) {

					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();

				} else {
					view.render();
					var newMain = $('<div id="main"></div>').append(view.el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);

				}
			});

		},

		prescriptions: function(path) {
			this.currentPage = "prescriptions";
			console.log('presc')

			require(["views/app", "views/prescriptions/views/prescriptionsExecution/MainView"], function(AppView, ListView) {
				var view = new ListView({
					path: path
				});

				if (!this.appView) {

					this.appView = new AppView({
						renderView: view
					});
					this.appView.render();

				} else {
					view.render();
					var newMain = $('<div id="main"></div>').append(view.el);
					this.appView.$("#main").remove();
					this.appView.$el.append(newMain);

				}
			});

		},

		appointments: function(id) {
			window.open(APPOINTMENTS_PATH + '?client_id='+id+'&role='+Core.Cookies.get('currentRole'));
		},

		appointmentsPatient: function() {
			this.patients();
			window.document.title = "Запись на консультацию";
			this.currentPage = "appointments";
		},

		anareports: function() {
			window.open(ANAREPORTS_PATH+ '?role='+Core.Cookies.get('currentRole'),'_blank');
		},

		patients: function() {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "Список пациентов";

			// Используется для навигации в хедере
			this.currentPage = "patients";

			require(["views/app", "views/pages/patients-list"], function(AppView) {

				var view = new App.Views.PatientsList({
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

		patient: function(id) {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "WebMIS";

			this.currentPage = "patients";

			require(["views/app", "views/pages/patient-card"], function(AppView) {
				var view = new App.Views.PatientCard({
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

		patientSummaryList: function(patientId){
			if (!this.checkAuthToken()) {
				return false
			}
			console.log('patientSummaryList', arguments);
			window.document.title = "Сводная информация";

			this.currentPage = "patientSummaryList";

			require(["views/app","views/summary/MainView"], function(AppView, MainView) {

				var view = new MainView({
					path: Backbone.history.fragment,
					patientId: patientId
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

				}


			});
		},

		patientSummaryItem: function(patientId, docIds){
			if (!this.checkAuthToken()) {
				return false
			}
			window.document.title = "Сводная информация";
			this.currentPage = "patientSummaryList";

			require(["views/app","views/summary/ItemView"], function(AppView, ItemView) {
                var params = Core.Url.extractUrlParameters();
                console.log('patientSummaryItem', params);


				var view = new ItemView({
					path: Backbone.history.fragment,
					patientId: patientId,
					docIds: params.docIds,
                    appealId: params.appealId
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

				}


			});

		},

		newPatient: function(page) {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "Новый пациент";

			this.currentPage = "patients";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/patient", "views/pages/patient-edit"], function(AppView) {
				var view = new App.Views.PatientEdit({
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

		editPatient: function(id, page) {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "WebMIS";

			this.currentPage = "patients";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/patient", "views/pages/patient-edit"], function(AppView) {
				var Patient = new App.Models.Patient({
					id: id
				});
				Patient.fetch({
					success: function() {

						var view = new App.Views.PatientEdit({
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

		newAppeal: function(patientId) {
			if (!this.checkAuthToken(arguments)) {
				return false
			}

			window.document.title = "WebMIS";

			this.currentPage = "appeals";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/appeal", "models/patient", "views/pages/appeal-edit", "views/mkb-directory"], function(AppView) {
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
			});
		},

		appealEdit: function(appealId) {
			if (!this.checkAuthToken()) {
				return false
			}

			this.currentPage = "appeals";
			var referrer = Core.Url.getReferrer();

			require(["views/app", "models/appeal", "models/patient", "views/pages/appeal-edit", "views/mkb-directory"], function(AppView) {
				var Appeal = new App.Models.Appeal({
					id: appealId
				});

				Appeal.fetch({
					success: function() {
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

			});
		},


		patientAppeals: function(id) {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "WebMIS";

			this.currentPage = "patients";

			require(["views/app", "views/pages/patient-appeals"], function(AppView) {
				var view = new App.Views.PatientAppeals({
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

		appeals: function() {
			if (!this.checkAuthToken()) {
				return false
			}

			window.document.title = "Список госпитализаций";

			this.currentPage = "appeals";

			require(["views/app", "views/pages/appeals-list"], function(AppView) {
				var view = new App.Views.AppealsList({
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

		appeal: function(mode, appealId, page, subId) {
			if (!this.checkAuthToken(arguments)) return false;
			console.log(arguments);
			this.currentPage = "appeals";

			window.document.title = "WebMIS";

			require(["views/app", "views/appeal/edit/main"], function(AppView, AppealMainView) {
				var view = new AppealMainView({
					path: Backbone.history.fragment,
					mode: mode,
					appealId: appealId,
					page: (page.indexOf('token') > -1) ? 'monitoring' : page,
					subId: subId
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

		appealReview: function(appealId) {
			var page;
			if (Core.Data.currentRole() == ROLES.DOCTOR_DEPARTMENT || Core.Data.currentRole() == ROLES.DOCTOR_ANESTEZIOLOG) {
				page = "monitoring";
			} else {
				page = "card";
			}
			this.appeal("REVIEW", appealId, page);
		},

		appealPolyReview: function(appealId) {
			window.location.href = "http://" + POLICLINIC_HOST + "/event/event.html?event_id=" + appealId + "&role="+Core.Cookies.get('currentRole');
		},

		appealReviewPage: function(appealId, page) {
			this.appeal("REVIEW", appealId, page);
		},

		appealSubItemReview: function(appealId, page, subId) {
			this.appeal("SUB_REVIEW", appealId, page, subId.split(","));
		},

		appealSubItemEdit: function(appealId, page, subId) {
			this.appeal("SUB_EDIT", appealId, page, subId);
		},

		appealSubItemNew: function(appealId, page, subId) {
			this.appeal("SUB_NEW", appealId, page, subId);
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

		prints: function() {
			window.document.title = "WebMIS";
			require(["views/app", "views/pages/prints"], function(AppView) {
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

		newFirstExamination: function(id) {
			if (!this.checkAuthToken()) {
				return false
			}

			this.currentPage = "appeals";
			window.document.title = "WebMIS";

			require(["views/app", "views/appeal/edit/main"], function() {
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
		} //,

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
	Backbone.history.start({
		pushState: true
	});

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
		PATIENT_MONITORING: {
			title: "Мониторинг состояния",
			uri: "/appeals/:id/patient-monitoring"
		},
		PATIENTS_EDIT: {
			title: "Редактирование карточки",
			uri: "/patients/:id/edit/"
		},
		APPEAL: {
			template: "#breadcrumbs-template-appeal",
			uri: "/appeals/:id/"
		},
		MOVES: {
			title: "Движение пациента",
			uri: "/appeals/:id/moves"
		},
		HOSPITALBED: {
			title: "Регистрация на койке",
			uri: "/appeals/:id/hospitalbed/"
		},
		APPEALS_NEW: {
			title: "Создание обращения",
			uri: "/patients/:id/appeals/new/"
		},
		APPEALS_EDIT: {
			title: "Редактирование обращения",
			uri: "/appeals/:id/edit"
		},
		EXAMS: {
			title: "Осмотры",
			uri: "/appeals/:id/examinations/"
		},
		LABORATORY: {
			title: "Лабораторные исследования",
			uri: "/appeals/:id/diagnostics-laboratory/"
		},
		LABORATORY_RESULT: {
			title: "Результаты лабораторного исследования",
			uri: "/appeals/:id/diagnostics-laboratory/:test"
		},
		INSTRUMENTAL: {
			title: "Инструментальные исследования",
			uri: "/appeals/:id/diagnostics-instrumental/"
		},
		INSTRUMENTAL_RESULT: {
			title: "Результаты инструментального исследования",
			uri: "/appeals/:id/diagnostics-instrumental/:test"
		},
		CONSULTATION: {
			title: "Консультации",
			uri: "/appeals/:id/diagnostics/consultations/"
		},
		CONSULTATION_RESULT: {
			title: "Результаты консультации",
			uri: "/appeals/:id/diagnostics/consultations/result/:test"
		},
		QUOTES: {
			title: "Квоты ВМП",
			uri: "/appeals/:id/quotes"
		},
		REPORTS: {
			title: "Отчёты",
			uri: "/reports/"
		},
		SUMMARY: {
			title: "Сводная информация",
			uri: "/appeals/:id/summary"
		},
		MONITORING: {
			title: "Основные сведения",
			uri: "/appeals/:id/monitoring"
		},
		DOCUMENTS: {
			title: "Документы",
			uri: "/appeals/:id/documents"
		},
		THERAPY: {
			title: "Лечение",
			uri: "/appeals/:id/therapy"
		},
		CARD: {
			title: "Титульный лист ИБ",
			uri: "/appeals/:id/card"
		},
		PRESCRIPTIONS: {
			title: "Назначения",
			uri: "/appeals/:id/prescriptions"
		}
	};
	App.Router.compile = function(link, options) {
		if (link.template) {
			link.title = $(link.template).tmpl(options).text();
		}
		link.uri = Core.Url.compileUri(link.uri, options);

		return link
	};

	function checkDeadline() {
		if (Core.Cookies.get('authToken')) {
			$.ajax({
			  type: "POST",
			  url: DATA_PATH+"getTokenInfo/",
			  headers: {
			        'Content-Type': 'application/json'
			    },
			  dataType: 'json',
			  data: JSON.stringify({
				  token: Core.Cookies.get('authToken'),
				  prolong: false
			  }),
			  success: function(data){
				  console.log('data.ttl', data.ttl);
				  Core.Cookies.set("ttl", data.ttl);
				  if (data.ttl < 150) {
					  showAllert();
				  } else {
					  startTimer(data.ttl - 150);
				  }
			  }
			});
		}
	}

	function showAllert() {

		var dialogView = $('<div/>');
		var i = Core.Cookies.get('ttl');
		dialogView.html('Срок ожидания для вашего сеанса истечет через <strong>'+i+'</strong> сек.');
		i--;

		var int = setInterval(function(){
			if (i > 0) {
				if (Core.Cookies.get('ttl') > 150) {
					clearInterval(int);
					dialogView.dialog('close');
					startTimer(Core.Cookies.get('ttl') - 150);
				} else {
					dialogView.find('strong').text(i);
					i--;
				}
			} else {
				window.location.href = "/auth/";
			}
		}, 1000);

		dialogView.dialog({
			autoOpen: true,
			width: "35em",
			modal: true,
			title: "Окончание времени сессии",
			closeOnEscape: false,
			open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
			buttons: [{
				text: "Остаться в системе",
				click: function(){
					clearInterval(int);
					$.ajax({
					  type: "POST",
					  url: DATA_PATH+"getTokenInfo/",
					  headers: {
					        'Content-Type': 'application/json'
					    },
					  dataType: 'json',
					  data: JSON.stringify({
						  token: Core.Cookies.get('authToken'),
						  prolong: true
					  }),
					  success: function(data){
						  Core.Cookies.set("ttl", data.ttl);
						  startTimer(data.ttl - 150);
					  }
					});
					dialogView.dialog('close');
				}
			}]
		});
	}

	function startTimer(t) {
		setTimeout(function(){
			checkDeadline();
		}, t*1000);
	}

	checkDeadline();

}).call();
