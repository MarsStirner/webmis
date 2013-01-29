/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/hospital-bed.tmpl",
	"collections/Beds",
	"collections/moves",
	"models/HospitalBed",
	"collections/departments",
	"views/appeal/edit/pages/BedsView"
], function (template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change select.Departments': 'onSelectDepartment',
			'click .actions.save':'save'
		},

		initialize: function () {
			_.bindAll(this);

			//Модель этой страницы...
			this.model = new App.Models.HospitalBed();
			this.model.appealId = this.options.appeal.get("id");
			//this.model.set("clientId", this.options.appeal.get("patient").get("id"));
			this.model.set("moveDatetime", this.options.appeal.get("rangeAppealDateTime").get("start"));

			//Список движений для госпитализации
			this.moves = new App.Collections.Moves();
			this.moves.appealId = this.options.appeal.get("id");


			this.moves.on("reset", function () {
				this.moves.off(null, null, this);
				console.log('actionId', this.moves.last().get("id"))

				this.model.moveId = this.moves.last().get("id");
				this.model.on("change", this.onBedsListReceived, this);
				this.model.save();
				console.log('init',this.model.isNew());

			}, this);

			this.moves.fetch();

			//Получаем список отделений со свободными койками
			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();
		},

		//рисуем выпадающий список отделений
		onDepartmentsLoaded: function (departments) {
			this.departmentsJSON = departments.toJSON();
			_(this.departmentsJSON).each(function (d, index) {
				this.$(".Departments").append($("<option/>", {
					"text": d.name,
					"value": d.id
				}));
			}, this);

		},

		getDepartmentId: function () {
			var id = 0;
			id = $('.Departments option:selected').val();
			return id;
		},
		onSelectDepartment: function (event) {

			if (this.getDepartmentId()) {
				var bedsView = new App.Views.Beds({el: this.$('.beds'), departmentId: this.getDepartmentId()});
				bedsView.collection.on("reset", function () {
					$('.beds').empty();
					_.each(bedsView.collection.models, function (model) {
						var bedView = new App.Views.Bed({ model: model });
						$('.beds').append(bedView.render().el);

					})

				});

			}
		},
		save:function(){
			this.model.save();
			console.log('save',this.model.isNew());
		},


//		onHospitalBedRegistrationCreated: function () {
//			this.moves.on("reset", function () {
//				this.moves.off(null, null, this);
//
//				this.model.moveId = this.moves.last().get("id");
//				this.model.on("change", this.onBedsListReceived, this);
//				this.model.fetch();
//			}, this);
//
//			this.moves.fetch();
//		},

		onBedsListReceived: function () {
			this.model.off("change", this.onBedsListReceived);

			console.log("BedsListReceived", this.model);
		},

		render: function () {
			console.log(this.model.toJSON());
			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			UIInitialize(this.el);

			this.$(".Departments").width("100%").select2();

			this.delegateEvents();

			return this;
		}
	});
});
