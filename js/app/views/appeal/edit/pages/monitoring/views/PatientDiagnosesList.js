define(function(require) {
	// var shared = require("views/appeal/edit/pages/monitoring/shared");
	var BaseView = require("views/appeal/edit/pages/monitoring/views/BaseView");

	var patientDiagnosesListTmpl = require("text!templates/appeal/edit/pages/monitoring/patient-diagnoses-list.tmpl");


	/**
	 * Список диагнозов пациента
	 * @type {*}
	 */
	var PatientDiagnosesList = BaseView.extend({
		template: patientDiagnosesListTmpl,

		data: function() {
			return {
				diagnoses: this.collection,
				clinicalDiagnosisExist: this.clinicalDiagnosisExist()
			};
		},

		initialize: function(options) {
			BaseView.prototype.initialize.apply(this);

			this.collection.on("reset", this.render, this); //.fetch();
			this.collection.on("reset", this.checkClinicalDiagnosis, this);
		},

		clinicalDiagnosisExist: function() {
			var diagnoses = this.collection.some(function(model) {
				return _.some(["mainDiagMkb", "assocDiagMkb", "diagComplMkb"], function(diagnosisKind) {
					return diagnosisKind === model.get("diagnosisKind");
				}, this);
			}, this);

			var diff = moment().diff(moment(this.options.appeal.get("rangeAppealDateTime").get("start")), "days");

			return !(!diagnoses && (diff >= 4));
		},

		checkClinicalDiagnosis: function() {
			console.log('this.clinicalDiagnosisExist()',this.clinicalDiagnosisExist())
			if (!this.clinicalDiagnosisExist()) {
				pubsub.trigger("noty", {
					text: "Требуется обоснование клинического диагноза.",
					type: "warning"
				});
			}
		},

		render: function() {

			BaseView.prototype.render.apply(this);


			$(".HasToolTip", this.$el).each(function() {
				var tip = $($(this).data("tooltip-content"));
				var dx = -tip.width() / 2 - 35,
					dy = 15;
				tip.css("position", "absolute");
				tip.hide();

				function position(e) {
					tip.css("left", e.pageX + dx + "px").css("top", e.pageY + dy + "px");
				}

				$(this).mousemove(position);

				$(this).hover(function(e) {
					position(e);
					tip.show();
				}, function(e) {
					tip.hide();
				});
			});

			return this;

		}
	});

	return PatientDiagnosesList;

});
