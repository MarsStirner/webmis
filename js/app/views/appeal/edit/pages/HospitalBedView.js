/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/hospital-bed.tmpl",
	"collections/Beds",
	"collections/moves",
	"models/HospitalBed",
	"models/move",
	"collections/departments",
	"views/appeal/edit/pages/BedsView"
], function (template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change select.Departments': 'onSelectDepartment',
			'click .save': 'onSave',
			'click .actions.cancel': 'onCancel'
		},

		initialize: function () {
			_.bindAll(this);


			this.model = new App.Models.HospitalBed();

			this.model.appealId = this.options.appeal.get("id");
			this.model.set({"clientId": this.options.appeal.get("patient").get("id")});

			//Получаем список отделений со свободными койками
			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();

			this.model.on("change:movedFromUnitId", this.onSelectDepartment, this);
			this.model.on("change", this.validate, this);
			this.on("valid", this.enableSaveButton, this);
			this.on("invalid", this.disableSaveButton, this);

			//Список движений для госпитализации
			this.moves = new App.Collections.Moves();
			this.moves.appealId = this.options.appeal.get("id");
			this.moves.on("reset", function () {
				this.moves.off(null, null, this);

				//ид последнего движения
				var movedFromUnitId = this.moves.last().get("unitId");
				this.model.set({'movedFromUnitId': movedFromUnitId});

				//this.model.set({'movedFromUnitIdBackup': movedFromUnitId});

				//время предпоследнего движения
				var previousMove = this.moves.at(this.moves.length - 2);
				var lastMove = this.moves.at(this.moves.length - 1);
				var moveDatetime = lastMove.get('admission') || previousMove.get('leave') || previousMove.get('admission');
				//var previousDepartment = previousMove.get('unit');
				this.model.set({'moveDatetime': moveDatetime});
				//this.model.previousDepartment = previousDepartment ? previousDepartment : '';

			}, this);

			this.moves.fetch();


		},
		validate: function () {
			var errors1 = [];
			if (!this.model.get('movedFromUnitId')) {
				errors1.push('movedFromUnitId');
			}
			if (!this.model.get('bedId')) {
				errors1.push('bedId');
			}

			if (errors1.length) {
				this.trigger('invalid');
			} else {
				this.trigger('valid');
			}
		},
		enableSaveButton: function () {
			this.$('.save').removeClass('Disabled').attr('disabled', false);
			$('.save').on('click', this.onSave);

		},
		disableSaveButton: function () {
			this.$('.save').addClass('Disabled').attr('disabled', true);

		},

		//рисуем выпадающий список отделений
		onDepartmentsLoaded: function (departments) {
			this.departmentsJSON = departments.toJSON();
			var view = this;
			_(this.departmentsJSON).each(function (d, index) {
				this.$(".Departments").append($("<option/>", {
					"text": d.name,
					"value": d.id
				}));

			}, this);

			this.$(".Departments").select2('val', view.model.get('movedFromUnitId'));

		},
		onSelectDepartment: function (event) {
			var view = this;
			view.renderBeds();
			view.model.set('bedId', '');


		},
		renderBeds: function () {
			var view = this;
			var departmentId = view.model.get('movedFromUnitId');

			if (departmentId) {//если выбрано отделение
				$('.beds').empty();
				var bedsView = new App.Views.Beds({el: view.$('.beds'), departmentId: departmentId});
				bedsView.collection.on("reset", function () {
					$('.beds').empty();

					_.each(bedsView.collection.models, function (model) {
						var bedView = new App.Views.Bed({ model: model });
						$('.beds').append(bedView.render().el);

						bedView.on('bedChecked', function (bedId) {
							this.model.set({'bedId': bedId});
						}, view);

					});

					view.justifyBeds();
				});
				bedsView.collection.fetch();
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
			console.log('onSave view.model',view.model);

			if (!view.model.get("moveDatetime")) {
				view.model.set({"moveDatetime": new Date().getTime()});
			}


			view.model.save({}, {
				success: function () {
					pubsub.trigger('noty', {text: 'Пациент зарегистрирован на койке'});
					view.redirectToMoves();
				}});


		},
		onCancel: function (e) {
			var view = this;
			e.preventDefault();
			view.redirectToMoves();
		},

		render: function () {
			var view = this;

			var modelJSON = view.model.toJSON();

			view.$el.html($.tmpl(view.template, modelJSON));

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
