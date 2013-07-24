/**
 * User: VKondratev
 * Date: 29.11.12
 */

define(function(require) {
		var template = require('text!templates/moves/hospital-bed.tmpl');
		var Beds = require('collections/moves/Beds');
		var Moves = require('collections/moves/moves');
		var HospitalBed = require('models/moves/HospitalBed');
		//var Move = require('models/moves/move');
		var Departments = require('collections/departments');
		var BedView = require('views/moves/BedView');


	return View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change .Departments':'onSelectDepartment',
			'click .save': 'onSave',
			'click .actions.cancel': 'onCancel'
		},

		initialize: function() {
			console.log('init HospitalBed', this);
			_.bindAll(this);

			this.model = new HospitalBed();

			this.bedsCollection = new Beds();
			this.bedsCollection.on('reset', this.renderBeds, this);


			this.model.appealId = this.options.appeal.get("id");
			this.model.set({
				"clientId": this.options.appeal.get("patient").get("id")
			});

			this.setMoveDateAndMovedDepartment();

			this.model.on("change", this.validate, this);

			this.model.on("change", function(m, o) {
				console.log('model change', m, o.changes);
			});


			this.loadDepartments();



		},

		setMoveDateAndMovedDepartment: function() {
			//Список движений для госпитализации
			this.moves = new Moves();
			this.moves.appealId = this.options.appeal.get("id");
			this.moves.on("reset", function() {
				this.moves.off(null, null, this);

				this.previousMove = this.moves.at(this.moves.length - 2);
				this.lastMove = this.moves.last();

				//ид отделения из последнего движения
				var movedToUnitId = this.lastMove.get("unitId");

				//время предпоследнего движения, если нет в последнем то берём из предидущего движения
				var moveDatetime = this.lastMove.get('admission') || this.previousMove.get('leave') || this.previousMove.get('admission');

				if(this.previousMove && this.previousMove.get("unitId")){
					this.model.set({
						'movedFromUnitId': this.previousMove.get("unitId")
					});
				}

				console.log('movedToUnitId',movedToUnitId)
				this.ui.$department.select2('val', movedToUnitId).trigger('change');
				this.model.set({
					'moveDatetime': moveDatetime
				});

			}, this);

			this.moves.fetch();
		},

		loadDepartments: function() {
			//Получаем список отделений с койками
			this.departments = new Departments();
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


		},

		onSelectDepartment: function(event) {
			console.log('onSelectDepartment',event);
			$target = this.$(event.target);
			console.log($target.val())
			var departmentId = $target.val();
			this.bedsCollection.departmentId = departmentId;
			this.bedsCollection.fetch();
			//this.renderBeds();
			this.model.set('bedId', '');

		},

		validate: function() {

			if (!this.model.get('movedFromUnitId') || !this.model.get('bedId')) {
				this.disableSaveButton();
			}else{
				this.enableSaveButton();
			}

		},
		enableSaveButton: function() {
			this.ui.$saveButton.removeClass('Disabled').attr('disabled', false);//.on('click', this.onSave);

		},
		disableSaveButton: function() {
			this.ui.$saveButton.addClass('Disabled').attr('disabled', true);//.unbind('click', this.onSave);
		},


		renderBeds: function() {
			console.log('renderBeds');
			var view = this;

			view.ui.$beds.html('');

			view.bedsCollection.each(function(model) {
				var bedView = new BedView({
					model: model,
					hb:view.model
				});

				view.ui.$beds.append(bedView.render().el);

			});

			view.justifyBeds();


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
			this.close();

		},
		onSave: function() {
			var view = this;
			//console.log('onSave view.model', view.model);

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
		close: function() {
			this.off();
			this.model.off();
			this.moves.off();
			this.departments.off();
			this.bedsCollection.off();
		},

		render: function() {
			var view = this;

			view.$el.html($.tmpl(view.template, view.model.toJSON()));

			view.ui = {};
			view.ui.$saveButton = view.$el.find('.save');
			view.ui.$department = view.$el.find('.Departments');
			view.ui.$beds = view.$el.find('.beds');


			UIInitialize(view.el);
			this.disableSaveButton();

			//view.model.connect("movedFromUnitId", "departments", view.$el);
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
