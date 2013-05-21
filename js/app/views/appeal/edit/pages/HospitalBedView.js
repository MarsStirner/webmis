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
		"views/appeal/edit/pages/BedView"
], function(template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change select.Departments': 'onSelectDepartment',
			'click .save': 'onSave',
			'click .actions.cancel': 'onCancel'
		},

		initialize: function() {
			_.bindAll(this);

			this.model = new App.Models.HospitalBed();

			this.model.appealId = this.options.appeal.get("id");
			this.model.set({
				"clientId": this.options.appeal.get("patient").get("id")
			});

			this.setMoveDateAndMovedDepartment();


			this.loadDepartments();

			this.model.on("change:movedFromUnitId", this.onSelectDepartment, this);
			this.model.on("change", this.validate, this);

			this.on("valid", this.enableSaveButton, this);
			this.on("invalid", this.disableSaveButton, this);


		},

		setMoveDateAndMovedDepartment: function() {
			//Список движений для госпитализации
			this.moves = new App.Collections.Moves();
			this.moves.appealId = this.options.appeal.get("id");
			this.moves.on("reset", function() {
				this.moves.off(null, null, this);

				var previousMove = this.moves.at(this.moves.length - 2);
				var lastMove = this.moves.last();

				//ид отделения из последнего движения
				var movedFromUnitId = lastMove.get("unitId");

				//время предпоследнего движения, если нет в последнем то берём из предидущего движения
				var moveDatetime = lastMove.get('admission') || previousMove.get('leave') || previousMove.get('admission');

				this.model.set({
					'movedFromUnitId': movedFromUnitId
				});
				this.model.set({
					'moveDatetime': moveDatetime
				});

			}, this);

			this.moves.fetch();
		},

		loadDepartments: function() {
			//Получаем список отделений с койками
			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				limit: 0,
				sortingField: 'name',
				sortingMethod: 'asc'
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();
		},
				//рисуем выпадающий список отделений
		onDepartmentsLoaded: function(departments) {
			var view = this;

			_(departments.toJSON()).each(function(d, index) {
				view.ui.$department.append($("<option/>", {
					"text": d.name,
					"value": d.id
				}));

			}, this);

			view.ui.$department.select2('val', view.model.get('movedFromUnitId'));

		},

		onSelectDepartment: function(event) {
			var view = this;
			view.renderBeds();
			view.model.set('bedId', '');

		},

		validate: function() {
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
		enableSaveButton: function() {
			this.ui.$saveButton.removeClass('Disabled').attr('disabled', false).on('click', this.onSave);

		},
		disableSaveButton: function() {
			this.ui.$saveButton.addClass('Disabled').attr('disabled', true);
		},


		renderBeds: function() {
			var view = this;
			var departmentId = view.model.get('movedFromUnitId');
			var bedsCollection = new App.Collections.Beds({}, {
				departmentId: departmentId
			});

			if (departmentId) { //если выбрано отделение
				view.ui.$beds.empty();

				bedsCollection.on("reset", function() {
					view.ui.$beds.empty();

					_.each(bedsCollection.models, function(model) {
						var bedView = new App.Views.Bed({
							model: model
						});
						view.ui.$beds.append(bedView.render().el);

						bedView.on('bedChecked', function(bedId) {
							view.model.set({
								'bedId': bedId
							});
						}, view);

					});

					view.justifyBeds();
				});


				bedsCollection.fetch();
			}

		},
		justifyBeds: function() {
			var maxWidth = Math.max.apply(Math, this.$('.bedBox').map(function() {
				return $(this).width();
			}).get());
			this.$('.bedBox').each(function() {
				$(this).width(maxWidth);
			})
		},
		redirectToMoves: function() {
			var view = this;
			view.trigger("change:viewState", {
				type: 'moves',
				options: {}
			});
			App.Router.updateUrl("appeals/" + view.model.appealId + "/moves/");

		},
		onSave: function() {
			var view = this;
			console.log('onSave view.model', view.model);

			if (!view.model.get("moveDatetime")) {
				view.model.set({
					"moveDatetime": new Date().getTime()
				});
			}


			view.model.save({}, {
				success: function() {
					pubsub.trigger('noty', {
						text: 'Пациент зарегистрирован на койке'
					});
					view.redirectToMoves();
				}
			});


		},
		onCancel: function(e) {
			var view = this;
			e.preventDefault();
			view.redirectToMoves();
		},

		render: function() {
			var view = this;

			view.$el.html($.tmpl(view.template, view.model.toJSON()));

			view.ui = {};
			view.ui.$saveButton = view.$el.find('.save');
			view.ui.$department = view.$el.find('.Departments');
			view.ui.$beds = view.$el.find('.beds');


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
