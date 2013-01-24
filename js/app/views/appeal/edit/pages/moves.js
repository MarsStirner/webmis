define([
	"text!templates/appeal/edit/pages/moves.tmpl",
	"collections/moves",
	"views/grid",
	"views/paginator",
	"views/appeal/edit/popups/send-to-department",
	"views/appeal/edit/pages/HospitalBedView"
], function (template) {

	App.Views.Moves = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click #new-move": "toggleMoveTypes",
			"click #move-type-list li":"createNewMove"
		},

		initialize: function () {
			this.collection = new App.Collections.Moves();
			this.collection.appealId = this.options.appealId;

			this.grid = new App.Views.Grid({
				collection: this.collection,
				template: "grids/moves",
				gridTemplateId: "#moves-grid-department",
				rowTemplateId: "#moves-grid-row-department",
				defaultTemplateId: "#moves-grid-department-default"
			});

			this.moveTypeConstrs = {
				department: this.newSendToDepartment,
				hospitalbed: this.newHospitalBed
			};

			this.depended(this.grid);

			this.collection.on("reset", function () {
				if (this.options.appeal.isClosed()) {
					//this.grid.$(".EditExam").attr("disabled", true);
				}
			}, this);

			this.collection.fetch();
		},

		toggleMoveTypes: function (event) {
			this.$(".DDList").toggleClass("Active");
			event.stopPropagation();
		},

		createNewMove: function (event) {
			this.$(".DDList").removeClass("Active");
			var moveType = $(event.currentTarget).data("move-type");

			// Вызываем метод для создания соответствующего вида
			if ($.isFunction(this.moveTypeConstrs[moveType])) {
				this.moveTypeConstrs[moveType].call(this, event);
			}
		},

		//Новое мероприятие/направление или перевод в отделение
		newSendToDepartment: function (event) {
			var sendPopUp = new App.Views.SendToDepartment({appeal: this.options.appeal}).render().open();
			sendPopUp.on("closed", function () {
				this.collection.fetch();
			}, this);
		},

		//Новое мероприятие/регистрация на койку
		newHospitalBed: function () {
			var hospitalBed = new App.Views.HospitalBed({appeal: this.options.appeal});
			hospitalBed.setElement(this.el).render();

			App.Router.updateUrl("appeals/" + this.options.appealId + "/hospitalbed/");
		},

		render: function () {
			var self = this;

			var allowToMove = Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST;

			this.$el.html($.tmpl(this.template, {allowToMove: allowToMove, isClosed: self.options.appeal.isClosed()}));
			this.$("#lab-grid").html(this.grid.el);

			// Пэйджинатор
			/*this.paginator = new App.Views.Paginator({
					collection: self.collection
			});
			this.depended(this.paginator);

			this.$el.append(this.paginator.render().el);*/

			//this.sendToDep.render();

			this.delegateEvents();
			this.grid.delegateEvents();
			//this.paginator.delegateEvents();
			//this.sendToDep.delegateEvents();

			return this;
		}
	});

	return App.Views.Moves
});