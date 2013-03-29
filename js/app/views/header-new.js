define(["text!templates/header-new.tmpl"], function (headerTmpl) {
	var Header = View.extend({
		className: "Header Clearfix",

		template: headerTmpl,

		events: {
			"click .SectionNav li": "onSectionNavClick",
			"click .LinkToProfile": "onLinkToProfileClick",
			"click .logout": "onLogoutClick"
		},

		initialize: function () {
			if (!Core.Data.currentRole()) {
				Core.Data.currentRole(this.options.structure.roles[0].role);
			}
			this._currentRole = Core.Data.currentRole();
		},

		onLogoutClick: function (event) {
			event.preventDefault();

			this.logoutUser();
		},

		onSectionNavClick: function (event) {
			event.preventDefault();

			var $target = $(event.currentTarget);
			var href = $target.find("a").attr("href");

			this.$("li").removeClass("Selected");

			$target.addClass("Selected");

			pubsub.trigger('noty_clear');

			if (href) {
				App.Router.navigate(href, {trigger: true});
			}
		},

		onLinkToProfileClick: function (event) {
			var menu = this.$(".profile-options");

			menu.css({"min-width": this.$(".LinkToProfile").width()}).show().position({
				my: "right top",
				at: "right bottom",
				of: this.$(".LinkToProfile")
			});

			$(document).one("click", function() {
				menu.hide();
			});

			return false;
		},

		changeRole: function (event) {
			Core.Data.currentRole($(event.currentTarget).data("role"));

			window.location.reload();
		},

		logoutUser: function () {
			Core.Cookies.clear();
			App.Router.navigate("/auth/?logout=true", {trigger: true});
		},

		render: function () {
			var sections = [];

			switch (Core.Data.currentRole()) {
				case ROLES.NURSE_RECEPTIONIST:
					sections.push(
						{title: "Пациенты", name: "patients", uri: "/patients/"},
						{title: "Госпитализации", name: "appeals", uri: "/appeals/"},
						{title: "Амбулаторные талоны"}
					);
					break;
				case ROLES.DOCTOR_RECEPTIONIST:
					sections.push(
						{title: "Госпитализации", name: "appeals", uri: "/appeals/"},
						{title: "Пациенты", name: "patients", uri: "/patients/"}
					);
					break;
				case ROLES.DOCTOR_DEPARTMENT:
					sections.push(
						{title: "Госпитализации", name: "appeals", uri: "/appeals/"},
						{title: "Пациенты", name: "patients", uri: "/patients/"}
					);
					break;
				case ROLES.NURSE_DEPARTMENT:
					sections.push(
						{title: "Пациенты", name: "patients", uri: "/patients/"},
						{title: "Госпитализации", name: "appeals", uri: "/appeals/"},
						{title: "Биоматериалы", name: "biomaterials", uri: "/biomaterials/"},
						{title: "Амбулаторные талоны"}
					);
					break;
			}

			var currentRoleTitle = "";

			// Роли доступные пользователю
			var userRoles = JSON.parse(Core.Cookies.get("roles"));
			// Роли реализованные в приложении
			var availableRoles = this.options.structure.roles;
			// Пересечение доступных и реализованных ролей
			var userAvailableRoles = [];


			_(availableRoles).each(function (element) {
				if (userRoles.indexOf(element.id) !== -1) {
					if (this._currentRole == element.role) {
						currentRoleTitle = element.title;
					}
					userAvailableRoles.push(element);
				}
			});

			var data = {
				sections: sections,
				doctor: this.options.structure.doctor,
				userAvailableRoles: userAvailableRoles,
				currentPage: App.Router.currentPage,
				currentRole: this._currentRole
			};

			console.log(data);

			this.$el.html(_.template(this.template, data));

			this.$(".LinkToProfile").button({icons: {primary: "icon-user-md", secondary: "icon-caret-down"}});
			this.$(".profile-options").hide().menu();
			this.$(".logout").button({icons: {primary: "icon-off"}});

			return this;
		}
		//,

		/*ready: function () {
			var view = this;

			view.$el.html($("#header").tmpl(view.options.structure));

			this.separateRoles(ROLES.NURSE_RECEPTIONIST, function () {
				var NavigationView = new Navigation(
					{
						structure: [
							{
								name: "patients",
								uri: "/patients/",
								title: "Пациенты"
							},
							{
								name: "appeals",
								uri: "/appeals/",
								title: "Госпитализации"
							},
							{
								title: "Амбулаторные талоны"
							}
						]
					}
				);

				NavigationView.render();
			});


			this.separateRoles(ROLES.DOCTOR_RECEPTIONIST, function () {
				var NavigationView = new Navigation(
					{
						structure: [
							{
								name: "appeals",
								uri: "/appeals/",
								title: "Госпитализации"
							},
							{
								name: "patients",
								uri: "/patients/",
								title: "Пациенты"
							}
						]
					}
				);
				NavigationView.render();
			});

			this.separateRoles(ROLES.DOCTOR_DEPARTMENT, function () {
				var NavigationView = new Navigation(
					{
						structure: [
							{
								name: "appeals",
								uri: "/appeals/",
								title: "Госпитализации"
							},
							{
								name: "patients",
								uri: "/patients/",
								title: "Пациенты"
							}
						]
					}
				);
				NavigationView.render();
			});

			this.separateRoles(ROLES.NURSE_DEPARTMENT, function () {
				var NavigationView = new Navigation(
					{
						structure: [
							{
								name: "patients",
								uri: "/patients/",
								title: "Пациенты"
							},
							{
								name: "appeals",
								uri: "/appeals/",
								title: "Госпитализации"
							},
							{
								name: "biomaterials",
								uri: "/biomaterials/",
								title: "Биоматериалы"
							},
							{
								title: "Амбулаторные талоны"
							}
						]
					}
				);
				NavigationView.render();
			});

			var RoleSelectorView = new RoleSelector({
				structure: this.options.structure
			});
			RoleSelectorView.render();
		}*/
	});

	/*var Navigation = View.extend({
		el: ".SectionNav",

		render: function () {
			var view = this;

			_.each(this.options.structure, function (element) {
				var NavigationItemView = new NavigationItem(element);
				NavigationItemView.on("navSelected", view.updateUrl, view);
				view.$el.append(NavigationItemView.render().el);
			});

			return this
		},

		updateUrl: function (event) {
			var $target = $(event.currentTarget),
				href = $target.find("a").attr("href");

			this.$("li").removeClass("Selected")

			$target.addClass("Selected");

			if (href) {
				App.Router.navigate(href, {trigger: true});
			}

			pubsub.trigger('noty_clear');
		}
	});

	var NavigationItem = View.extend({
		tagName: "li",
		events: {
			"click": "onClick"
		},

		onClick: function (event) {
			event.preventDefault();
			event.stopPropagation();
			this.trigger("navSelected", event);
		},

		render: function () {
			if (App.Router.currentPage == this.options.name) {
				this.$el.addClass("Selected");
			}

			this.$el.html($("#navigation-item").tmpl(this.options));

			return this
		}
	});


	var RoleSelector = View.extend({
		el: ".RoleContainer",
		events: {
			"click li": "changeRole"
		},
		initialize: function () {
			if (!Core.Data.currentRole()) {
				Core.Data.currentRole(this.options.structure.roles[0].role);
			}
			this._currentRole = Core.Data.currentRole();
		},
		changeRole: function (event) {
			Core.Data.currentRole($(event.currentTarget).data("role"));
			window.location.reload();
		},
		render: function () {
			var view = this;
			this.$el.html($("#role-selector").tmpl(this.options.structure));

			var availableRoles = JSON.parse(Core.Cookies.get("roles"));

			if (this.options.structure.roles) {
				_(this.options.structure.roles).each(function (element) {
					if (availableRoles.indexOf(element.id) !== -1) {
						if (view._currentRole == element.role) {
							view.$(".Title span").html(element.title);
						}

						var RoleSelectorItemView = new RoleSelectorItem(element);
						view.$("ul").append(RoleSelectorItemView.render().el);
					}
				});
			}
			UIInitialize(this.el);

			return this
		}
	});
	var RoleSelectorItem = View.extend({
		tagName: "li",
		initialize: function () {
			if (this.options.role) {
				this.$el.data("role", this.options.role)
			}
		},
		render: function () {
			this.$el.html(this.options.title);

			return this
		}
	});*/

	return Header;
});
