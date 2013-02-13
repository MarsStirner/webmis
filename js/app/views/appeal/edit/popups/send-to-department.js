/**
 * User: FKurilov
 * Date: 17.10.12
 */
define([
	"text!templates/appeal/edit/popups/send-to-department.tmpl",
	"collections/departments",
	"models/move"
], function (tmpl) {
	App.Views.SendToDepartment = Form.extend({
		className: "popup",

		popUpOnly: true,

		template: tmpl,

		events: {
			"click .Cancel": "onCancelClick",
			"click .Save": "onSaveClick"
		},

		initialize: function (options) {
			this.model = new App.Models.Move();
			console.log(this.options.appeal);
			this.model.appealId = this.options.appealId;
			this.model.set("clientId", this.options.clientId);
			this.model.set("moveDatetime", this.options.moveDatetime);
			this.model.on("sync", function () {
				pubsub.trigger('noty', {text:'Направление в отделение создано'});
				this.close();
			}, this);

			this.model.on("error", function(){
				pubsub.trigger('noty', {text:'Ошибка при создании нового движения',type: 'error'});
			},this);

			this.departments = new App.Collections.Departments();
			this.departments.setParams({filter: {hasBeds: true}});
			this.departments.on("reset", this.onDepartmentsReset, this);
			this.departments.fetch();
		},

		onDepartmentsReset: function (collection) {
			this.departments.each(function (m) {
				this.$("#department").append($("<option/>", {text:m.get("name"), value:m.get("id")}));
			}, this);
		},

		onCancelClick: function (event) {
			this.close();
		},

		onSaveClick: function (event) {
			var readyToSave = this.save();
			if (readyToSave) {
				this.$(".Save").addClass("Disable").attr("disabled", true);
			}
		},

		open: function (opts) {
			//$(".ui-dialog-titlebar").hide();
			this.$el.dialog("open");

			return this;
		},

		close: function () {
			//$(".ui-dialog-titlebar").show();
			this.$el.dialog("close");
			this.model.unbind(null, null, this);
			this.trigger("closed").unbind(null, null, this).remove();
			return this;
		},

		render: function () {
			if (!this.$el.hasClass("webmis")) {
				this.$el.html($.tmpl(this.template, {}));

				$(this.el).dialog({
					autoOpen: false,
					width: "72em",
					modal: true,
					dialogClass: "webmis",
					resizable: false,
					title: this.options.popupTitle
				});

				this.$("a").click(function (event) {
					event.preventDefault();
				});

				UIInitialize(this.el);


				this.$(".select2").width("100%").select2();

				this.delegateEvents();
			}

			this.model.connect("unitId", "department", this.$el);
			this.model.connect("moveDatetime", "movingDate", this.$el);
			this.model.connect("moveDatetime", "movingTime", this.$el);

			return this;
		}
	});
	return {};
});
