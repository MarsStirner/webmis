define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var signalInfoTmpl = require('text!templates/appeal/edit/pages/monitoring/signal-info.tmpl');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');
	var ExecPersonAssignmentDialog = require('views/appeal/edit/pages/monitoring/views/ExecPersonAssignmentDialog')

	var Moves = require('collections/moves/moves');
	/**
	 * Блок сигнальной информации о пациенте
	 * @type {*}
	 */
	var SignalInfo = BaseView.extend({
		template: signalInfoTmpl,

		data: function() {
			var data = {
				lastMove: this.moves.last(),
				appeal: shared.models.appeal.toJSON(),
				appealExtraData: Core.Data.appealExtraData.toJSON(),
				days: this.days(),
				canAssign: this.canAssign()
			};
			//console.log('data', data)

			return data;
		},

		events: {
			"click .assign-exec-person": "onAssignExecPersonClick"
		},
		days: function() {
			var days;
			var appealJSON = shared.appealJSON;
			//продолжительность лечения
			if (appealJSON.appealType.requestType.id === 1) {
				//дневной стационар
				days = moment().diff(moment(appealJSON.rangeAppealDateTime.start), "days") + 1;
			} else if (appealJSON.appealType.requestType.id === 2) {
				//круглосуточный стационар
				days = moment().diff(moment(appealJSON.rangeAppealDateTime.start), "days");
			}


			return days;
		},

		initialize: function() {
			var appeal = shared.models.appeal;
			BaseView.prototype.initialize.apply(this);

			this.moves = new Moves();
			this.moves.appealId = appeal.get("id");
			//console.log("fetching moves");
			this.moves.on("reset", this.render, this).fetch();


			appeal.on("change:execPerson", this.onExecPersonDoctorChange, this);

			if (!appeal.get("execPerson").id) {
				pubsub.trigger("noty", {
					text: "Требуется назначить лечащего врача.",
					type: "warning"
				});
			}
		},

		canAssign: function() {
			if (shared.models.appeal.get('closed') || ((Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) || (Core.Data.currentRole() === ROLES.NURSE_DEPARTMENT))) {
				return false;
			} else {
				return true;
			}
		},

		onAssignExecPersonClick: function(event) {
			event.preventDefault();
			this.openExecPersonAssignmentDialog();
		},

		onExecPersonDoctorChange: function() {
			this.render();
		},

		openExecPersonAssignmentDialog: function() {
			new ExecPersonAssignmentDialog().render().open();
		},

		render: function() {
			this.$el.empty().append(this._template(this.data()));

			this.$('.assign-exec-person').button();
			return this;
		}
	});


	return SignalInfo;
});
