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
			'click .actions.save': 'onSave'
		},

		initialize: function () {
			_.bindAll(this);


			this.model = new App.Models.HospitalBed();
			this.model.appealId = this.options.appeal.get("id");
			this.model.set({"clientId": this.options.appeal.get("patient").get("id")}, {silent: true});

			//Получаем список отделений со свободными койками
			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();

			this.model.on("change:movedFromUnitId", this.onSelectDepartment, this);

			//Список движений для госпитализации
			this.moves = new App.Collections.Moves();
			this.moves.appealId = this.options.appeal.get("id");
			this.moves.on("reset", function () {
				this.moves.off(null, null, this);

				this.model.set('movedFromUnitId', this.moves.last().get("unitId"));

			}, this);

			this.moves.fetch();


		},

		//рисуем выпадающий список отделений
		onDepartmentsLoaded: function (departments) {
			this.departmentsJSON = departments.toJSON();
			var that = this;
			_(this.departmentsJSON).each(function (d, index) {


				this.$(".Departments").append($("<option/>", {
					"text": d.name,
					"value": d.id
				}));

			}, this);


			this.$(".Departments").select2('val', that.model.get('movedFromUnitId'));


		},

		getDepartmentId: function () {
			var id = 0;
			id = $('.Departments option:selected').val();
			return id;
		},
		onSelectDepartment: function (event) {
			var that = this;
			var departmentId = that.model.get('movedFromUnitId');


			if (departmentId) {
				var bedsView = new App.Views.Beds({el: this.$('.beds'), departmentId: departmentId});
				bedsView.collection.on("reset", function () {
					$('.beds').empty();

					_.each(bedsView.collection.models, function (model) {
						var bedView = new App.Views.Bed({ model: model });
						$('.beds').append(bedView.render().el);
						bedView.on('bedChecked', function (bedId) {
							this.model.set('bedId', bedId);

						}, that);

					});

					that.justifyBeds();


				});


			}
		},
		justifyBeds: function () {
			var maxWidth = Math.max.apply(Math, this.$('.bedBox').map(function () {
				return $(this).width();
			}).get());
			this.$('.bedBox').each(function () {
				$(this).width(maxWidth);
			})
		},
		redirectToMoves: function(){
			var appealId = this.model.appealId;
			console.log('redirecrtToMoves',this.options.appeal);
			var moves = new App.Views.Moves({'appealId': appealId,'appeal':this.options.appeal});
//
			moves.setElement(this.el).render();
//
			App.Router.updateUrl("appeals/" + appealId + "/moves");

		},
		onSave: function () {
			//this.model.set({"bedId": 237});
			if (!this.model.get("moveDatetime")) {
				this.model.set("moveDatetime", new Date().getTime());
			}
			this.model.on('sync',function(){
			console.log('sync');
			});
			this.model.on('sync',this.redirectToMoves(),this);
			this.model.save();
//			console.log('save', this.model.isNew());

		},

		render: function () {

			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			UIInitialize(this.el);

			//				this.model.connect("bedId", "beds");
			this.model.connect("movedFromUnitId", "departments", this.$el);
			this.model.connect("patronage", "patronage", this.$el);
			this.model.connect("moveDatetime", this.$("#move-date"), this.$el);


			this.$(".HourPicker").mask("99:99");
			this.$(".Departments").width("100%").select2();

			this.delegateEvents();

			return this;
		}
	});
});
