/**
 * User: FKurilov
 * Date: 22.06.12
 */
define(["text!templates/app.tmpl", "views/header"], function (tmpl, Header) {
	App.Views.App = Backbone.View.extend({
		el: $("#wrapper"),
		events: {
			"keydown input, select, textarea:not(.NewLineAllowed)": "keyHandler"
		},

		initialize: function () {
			this.renderView = this.options.renderView;

			this.header = new Header ({
				structure: {
					doctor: {
						name: {
							first: Core.Cookies.get("doctorFirstName"),
							last: Core.Cookies.get("doctorLastName")
						}
					},
					roles: [
						{
							id: 29,
							role: ROLES.NURSE_RECEPTIONIST,
							title: "Сестра приёмного отделения"
						},
						{
							id: 30,
							role: ROLES.DOCTOR_RECEPTIONIST,
							title: "Врач приёмного отделения"
						},
						{
							id: 24,
							role: ROLES.DOCTOR_DEPARTMENT,
							title: "Врач отделения"
						},
						{
							id: 25,
							role: ROLES.NURSE_DEPARTMENT,
							title: "Сестра отделения"
						}
					]
				}
			});
		},

		keyHandler: function (event) {

			event.keyCode = event.keyCode || event.charCode;

			if ( event.keyCode == 13 ) { // Enter
				event.stopPropagation();
				event.preventDefault();

				var $foundedArray = $();
				var $current = $(event.currentTarget);

				var form = event.currentTarget.form;

				if (form) {
					var currentTabIndex = parseFloat($current.attr("tabindex"));

					var $nextInput;
					var next = false;
					$.each(form, function () {
						var $input = $(this);

						if ( $input.not(":disabled" ).length ) {
							if ( currentTabIndex &&  ( parseFloat($input.attr("tabindex")) > currentTabIndex ) ) {
								$nextInput = $input;

								return false
							}

							if ( next && !$nextInput ) {
								$nextInput = $input;
							}
						}

						// Нам нужны только следующие за этим инпутом.
						if ( $input.get(0) == $current.get(0) ) {
							next = true;
						}

					});

					if ( $nextInput ) {
						$nextInput.focus();
					}
				}
			}

		},

		render: function () {
			this.$el.html($.tmpl(tmpl));
			this.$("header").html(this.header.render().el);
			this.$("#main").html(this.renderView.render().el);

			return this;
		},

		renderMainOnly: function () {
			this.$("#main").html(this.renderView.render().el);
		}
	});

	return App.Views.App;
});