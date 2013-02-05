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
			'click .actions.save': 'onSave',
			'click .actions.cansel': 'onCansel'
		},

		initialize: function () {
			_.bindAll(this);
			this.trigger("change:viewState", {type: "hospitalbed", options: {}});


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

				//ид последнего движения
				this.model.set('movedFromUnitId', this.moves.last().get("unitId"));

				//время предпоследнего движения
				var leave = this.moves.at(this.moves.length - 2).get('leave');
				this.model.set('moveDatetime', leave ? leave : '' );

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
		onSelectDepartment: function (event) {
			var view = this;
			var departmentId = view.model.get('movedFromUnitId');

			if (departmentId) {//если выбрано отделение
				var bedsView = new App.Views.Beds({el: view.$('.beds'), departmentId: departmentId});
				bedsView.collection.on("reset", function () {
					$('.beds').empty();

					_.each(bedsView.collection.models, function (model) {
						var bedView = new App.Views.Bed({ model: model });
						$('.beds').append(bedView.render().el);

						bedView.on('bedChecked', function (bedId) {
							this.model.set('bedId', bedId);
						}, view);

					});

					view.justifyBeds();
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
		redirectToMoves: function () {
			var view = this;
			view.trigger("change:viewState", {type: 'moves', options: {}});
			App.Router.updateUrl("appeals/" + view.model.appealId + "/moves/");

		},
		onSave: function () {
			var view = this;

			if (!view.model.get("moveDatetime")) {
				view.model.set("moveDatetime", new Date().getTime());
			}

			view.model.save({}, {success: function () {
				view.redirectToMoves();
			}});

		},
		onCansel: function (e) {
			var view = this;
			e.preventDefault();
			view.redirectToMoves();
		},

		render: function () {
			var view = this;

			view.$el.html($.tmpl(view.template, view.model.toJSON()));

			UIInitialize(view.el);

			view.model.connect("movedFromUnitId", "departments", view.$el);
			view.model.connect("patronage", "patronage", view.$el);
			view.model.connect("moveDatetime", view.$("#move-date"), view.$el);
			view.model.connect("moveDatetime", view.$("#move-time"), view.$el);


			view.$(".HourPicker").mask("99:99");
			view.$(".Departments").width("100%").select2();

			view.delegateEvents();

			return view;
		}
	});
});
