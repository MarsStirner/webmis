define([
	"text!templates/appeal/edit/pages/moves.tmpl",
	"collections/moves",
	"views/grid",
	"views/paginator",
	"views/appeal/edit/popups/send-to-department",
	"views/appeal/edit/pages/HospitalBedView"
], function (template) {

	function days_between(date1, date2) {

		// The number of milliseconds in one day
		var ONE_DAY = 1000 * 60 * 60 * 24


		// Calculate the difference in milliseconds
		var difference_ms = Math.abs(date1 - date2)

		// Convert back to days and return
		return Math.round(difference_ms / ONE_DAY)

	}


	App.Views.Moves = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			"click #new-move": "toggleMoveTypes",
			"click #move-type-list li": "createNewMove"
		},

		initialize: function () {
			this.collection = new App.Collections.Moves();
			this.collection.appealId = this.options.appealId;

			this.appealIsClosed = this.options.appeal.closed;

			this.collection.bind('remove', function () {
				this.collection.fetch();
			}, this);

			this.collection.bind('reset', function () {

				if(this.appealIsClosed) return;

				var lastMove = this.collection.last();
				var days = days_between(new Date().getTime(), lastMove.get('admission'));
				var bedDays = days - 1;
				if (bedDays < 0) {
					bedDays = 0;
				}

				if ((lastMove.get('bed') != 'Положить на койку') && (lastMove.get('bed') != null)) {
					lastMove.set('days', days);
					lastMove.set('bedDays', bedDays);
				}


			}, this);


			var allowToMove = ((Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) || ( Core.Data.currentRole() === ROLES.NURSE_DEPARTMENT) );

			var gridTemplateId = "#moves-grid-department",
				rowTemplateId = "#moves-grid-row-department",
				lastRowTemplateId = "#moves-grid-last-row-department",
				defaultTemplateId = "#moves-grid-department-default";

			if (allowToMove && !this.appealIsClosed) {
				gridTemplateId = "#moves-grid-department-with-move";
				rowTemplateId = "#moves-grid-row-department-with-move";
				lastRowTemplateId = "#moves-grid-last-row-department-with-move";
			}

			this.grid = new App.Views.Grid({
				popUpMode: true,
				collection: this.collection,
				template: "grids/moves",
				gridTemplateId: gridTemplateId,
				rowTemplateId: rowTemplateId,
				lastRowTemplateId: lastRowTemplateId,
				defaultTemplateId: defaultTemplateId
			});


			this.moveTypeConstrs = {
				department: this.newSendToDepartment,
				hospitalbed: this.newHospitalBed
			};

			this.depended(this.grid);

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
		/***
		 * Отмена прописки на койке
		 * @param move
		 */
		cancelMove: function (move) {
			var view = this;
			var url = DATA_PATH + 'hospitalbed/' + move.get('id') + '/calloff';

			$.ajax({
				method: 'get',
				url: url,
				dataType: 'jsonp',
				//beforeSend: function(jqXHR, settings){
				//	console.log('jqXHR',jqXHR);
				//	console.log('settings',settings);
				//},
				success: function (data) {
					view.collection.trigger('remove');
					pubsub.trigger('noty', {text: 'Регистрация отменена', type: 'warning'});
				}, error: function (data) {
					pubsub.trigger('noty', {text: 'Ошибка при попытке отменены регистрации', type: 'error'});
				}
			});


		},

		//Новое мероприятие/направление или перевод в отделение
		newSendToDepartment: function (event) {

			var popupTitle = "Направление в отделение";
			var collectionLength = this.collection.length;
			var previousMove = this.collection.models[collectionLength - 2];
			var lastMove = this.collection.models[collectionLength - 1];

			var moveDatetime = lastMove.get('leave') || lastMove.get('admission') || previousMove.get('leave') || previousMove.get('admission');

			if (!lastMove.get('leave') && lastMove.get('admission')) {
				moveDatetime = new Date().getTime();
			}


			var sendPopUp = new App.Views.SendToDepartment({
				appealId: this.options.appeal.get("id"),
				clientId: this.options.appeal.get("patient").get("id"),
				moveDatetime: moveDatetime,
				popupTitle: popupTitle
			}).render().open();
			sendPopUp.on("closed", function () {
				this.collection.fetch();
			}, this);
		},

		//Новое мероприятие/регистрация на койку
		newHospitalBed: function () {
			this.trigger("change:viewState", {type: 'hospitalbed', options: {}});
			App.Router.updateUrl("appeals/" + this.options.appealId + "/hospitalbed/");
		},

		render: function () {

			this.grid.on('grid:rowClick', function (move, event) {
				event.preventDefault();

				if (_.indexOf(event.target.classList, 'cancel-bed-registration') >= 0) {
					this.cancelMove(move);
				}
				if (_.indexOf(event.target.classList, 'bed-registration') >= 0) {
					this.newHospitalBed(move);
				}
			}, this);

			var self = this;
			var allowToMove = ((Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) || ( Core.Data.currentRole() === ROLES.NURSE_DEPARTMENT) );

			this.$el.html($.tmpl(this.template, {allowToMove: allowToMove, isClosed: self.options.appeal.isClosed()}));
			this.$("#lab-grid").html(this.grid.el);

			this.delegateEvents();
			this.grid.delegateEvents();

			return this;
		}
	});

	return App.Views.Moves
});
