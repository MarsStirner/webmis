/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/hospital-bed.tmpl",
	"models/HospitalBed",
	"collections/departments",
	"views/appeal/edit/pages/ChamberView"
], function (template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change select.Departments':'onSelectDepartment',
			'click #mytest':'onClickTest'
		},

		initialize: function () {
			_.bindAll(this);

			this.model = new App.Models.HospitalBed();
			this.model.appealId = this.options.appeal.get("id");

			this.moves = new App.Collections.Moves();
			this.moves.appealId = this.options.appeal.get("id");

			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();
		},

		onDepartmentsLoaded : function (departments) {
			this.departmentsJSON  = departments.toJSON();
			_(this.departmentsJSON).each(function (d) {
				 this.$(".Departments").append($("<option/>", {
					 "text": d.name,
					 "value": d.id
				 }));
			}, this);
		},

		onSelectDepartment: function (event) {

		},

		onClickTest: function () {
			this.model.set({
				clientId: this.options.appeal.get("patient").get("id"),
				moveDatetime: (new Date()).getTime()
			});

			//parseInt(this.$("select.Departments").val())

			this.model.save(null, {
				success: this.onHospitalBedRegistrationCreated
			});
		},

		onHospitalBedRegistrationCreated: function () {
			this.moves.on("reset", function () {
				this.moves.off(null, null, this);

				this.model.moveId = this.moves.last().get("id");
				this.model.on("change", this.onBedsListReceived, this);
				this.model.fetch();
			}, this);

			this.moves.fetch();
		},

		onBedsListReceived: function () {
			this.model.off("change", this.onBedsListReceived);

			console.log("BedsListReceived", this.model);
		},

		render: function () {
			this.$el.html($.tmpl(this.template));

			UIInitialize(this.el);

			this.$(".Departments").width("100%").select2();

			this.delegateEvents();

			return this;
		}
	});
});