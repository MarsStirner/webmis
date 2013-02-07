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
			'click .actions.save': 'onSave',
			'click .actions.cancel': 'onCancel'
		},

		initialize: function () {
			_.bindAll(this);


			this.model = new App.Models.HospitalBed();
			this.model.on('invalid',function(model, error, options){
				console.log('invalid',model, error, options);
			});
			this.model.appealId = this.options.appeal.get("id");
			this.model.set({"clientId": this.options.appeal.get("patient").get("id")}, {silent: true,validate:false});

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
				var movedFromUnitId = this.moves.last().get("unitId");
				this.model.set({'movedFromUnitId': movedFromUnitId},{silent: true,validate:false});

				this.model.set({'movedFromUnitIdBackup': movedFromUnitId},{silent: true,validate:false});

				//время предпоследнего движения
				var previousMove = this.moves.at(this.moves.length - 2);
				var lastMove = this.moves.at(this.moves.length - 1);
				var moveDatetime = lastMove.get('admission') || previousMove.get('leave') || previousMove.get('admission');
				//var previousDepartment = previousMove.get('unit');
				this.model.set({'moveDatetime': moveDatetime},{silent: true,validate:false});
				//this.model.previousDepartment = previousDepartment ? previousDepartment : '';

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
							this.model.set({'bedId': bedId},{silent: true,validate:false});
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
				view.model.set({"moveDatetime": new Date().getTime()},{silent: true,validate:false});
			}

			//если мы выберем другое отделени в выпадающем списке,
			// для которого не созданно направление, то это направление надо будет создать наверно....
//			if (this.model.get('movedFromUnitIdBackup') != this.model.get('movedFromUnitId')) {
//
//				//console.log('надо создать движение');
//				var new_move = new App.Models.Move();
//				new_move.appealId = view.options.appeal.get("id");
//				new_move.set("clientId", view.options.appeal.get("patient").get("id"));
//				new_move.set("moveDatetime", view.model.get("moveDatetime"));
//				new_move.set("unitId", view.model.get("movedFromUnitId"));
//
//				new_move.on("sync", function () {
//					view.model.save({}, {success: function () {
//						view.redirectToMoves();
//					}});
//
//				}, this);
//				new_move.save();
//
//			} else {

			//if(view.validate()){
				view.model.save({}, {
					success: function () {
						pubsub.trigger('noty', {text:'Пациент зарегистрирован на койке'});
						view.redirectToMoves();
					}});
			//}


//			}


		},
//		validate:function () {
//			var validity = true,$firstFoundedError;
//			this.$("select.Mandatory").removeClass("WrongField").each(function () {
//				if (!$(this).val()) {
//					$(this).addClass("WrongField");
//					$firstFoundedError = $firstFoundedError || $(this);
//					validity = false;
//				}
//			});
//
//			if ($firstFoundedError) {
//				//$firstFoundedError.focus();
//				$('html, body').animate({ scrollTop:$($firstFoundedError).offset().top - 30 }, 'fast');
//			}
//
//			return validity
//		},
		onCancel: function (e) {
			var view = this;
			e.preventDefault();
			view.redirectToMoves();
		},

		render: function () {
			var view = this;
			//var modelJSON = _.extend({previousDepartment: view.model.previousDepartment}, view.model.toJSON());
			var modelJSON = view.model.toJSON();
			console.log(modelJSON);
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
