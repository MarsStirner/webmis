define(["text!templates/header-new.tmpl"], function (headerTmpl) {
	var Header = View.extend({
		className: "Header Clearfix",

		template: headerTmpl,

		events: {
			"click .SectionNav li": "onSectionNavClick",
			"click .LinkToProfile": "onLinkToProfileClick",
			"click .logout": "onLogoutClick",
			"click .user-role": "onUserRoleClick"
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

		onUserRoleClick: function (event) {
			this.changeRole($(event.currentTarget).data("role"));
		},

		changeRole: function (role) {
			Core.Data.currentRole(role);
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
						{title: "Отчёты", name: "reports", uri: "/reports/"}
						//,{title: "Амбулаторные талоны"}
					);
					break;
			}

			//var currentRoleTitle = "";

			// Роли доступные пользователю
			var userRoles = JSON.parse(Core.Cookies.get("roles"));
			// Роли реализованные в приложении
			var availableRoles = this.options.structure.roles;
			// Пересечение доступных и реализованных ролей
			var userAvailableRoles = [];


			_(availableRoles).each(function (element) {
				if (userRoles.indexOf(element.id) !== -1) {
					/*if (this._currentRole == element.role) {
						currentRoleTitle = element.title;
					}*/
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

			this.$el.html(_.template(this.template, data));

			this.$(".LinkToProfile").button({icons: {primary: "icon-user-md", secondary: "icon-caret-down"}});
			this.$(".profile-options").hide().menu();
			this.$(".logout").button({icons: {primary: "icon-off"}});

			return this;
		}
	});

	return Header;
});
