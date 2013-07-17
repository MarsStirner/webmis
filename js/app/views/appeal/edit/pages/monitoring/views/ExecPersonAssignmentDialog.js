define(function(require) {
	var shared = require('views/appeal/edit/pages/monitoring/shared');

	var assignExecPersonDialogTmpl = require('text!templates/appeal/edit/pages/monitoring/assign-exec-person-dialog.tmpl');

	var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');

	var Persons = require('views/appeal/edit/pages/monitoring/collections/Persons');

	var AppealExecPerson = require('views/appeal/edit/pages/monitoring/models/AppealExecPerson');

	/**
	 * Диалог назначения врача
	 * @type {*}
	 */
	var ExecPersonAssignmentDialog = BaseView.extend({
		template: assignExecPersonDialogTmpl,

		data: function() {
			return {
				assignMe: this.assignMe
			};
		},

		events: {
			"change input[name='filter-persons']": "onFilterPersonsChange",
			"click .assign-on-me": "onAssignOnMeClick"
		},

		initialize: function(options) {
			BaseView.prototype.initialize.apply(this);
			_.bindAll(this);

			//Все врачи
			this.allPersons = new Persons();
			this.allPersons.setParams({
				limit: 999,
				sortingField: 'lastname'
			});
			this.allPersons.on("reset", this.addAllPersons, this).fetch();

			//Врачи отделения
			this.departmentPersons = new Persons();
			this.departmentPersons.setParams({
				limit: 999,
				sortingField: 'lastname',
				filter: {
					departmentId: shared.models.appeal.get("currentDepartment").id
				}
			});
			this.departmentPersons.on("reset", this.addDepartmentPersons, this).fetch();

			this.assignMe = true;

			if ((Core.Cookies.get("currentRole") === 'nurse-department') || (Core.Cookies.get("currentRole") === 'nurse-receptionist')) {
				this.assignMe = false;
			}

		},

		open: function() {
			this.$el.dialog({
				title: "Назначение лечащего врача",
				modal: true,
				width: "50em",
				dialogClass: "webmis",
				resizable: false,
				buttons: [{
					text: "Назначить",
					click: this.assignExecPerson,
					"class": "button-color-green"
				}, {
					text: "Отмена",
					click: this.close
				}],
				close: this.close
			});

			this.$el.css({
				"min-height": "11em"
			});
		},

		close: function() {
			this.allPersons.off(null, null, this);
			this.departmentPersons.off(null, null, this);
			this.off(null, null, this).remove();
		},

		onFilterPersonsChange: function(event) {
			this.$(".all-persons,.department-persons").select2("val", "");

			var selectedFilter = this.getSelectedFilter();

			if (selectedFilter === "all") {
				this.$(".all-persons.select2-container").show();
				this.$(".department-persons.select2-container").hide();
			} else if (selectedFilter === "dep") {
				this.$(".all-persons.select2-container").hide();
				this.$(".department-persons.select2-container").show();
			}
		},

		onAssignOnMeClick: function(event) {
			event.preventDefault();

			var currentUserId = Core.Cookies.get("userId");

			this.$("input[name='filter-persons'][value='all']").prop("checked", true).change();
			this.$(".all-persons").select2("val", currentUserId).change();
		},

		getSelectedFilter: function() {
			return this.$("input[name='filter-persons']:checked").val();
		},

		assignExecPerson: function() {
			var selectedFilter = this.getSelectedFilter();

			var selectedExecPersonId;

			if (selectedFilter === "all") {
				selectedExecPersonId = this.$(".all-persons").select2("val");
			} else if (selectedFilter === "dep") {
				selectedExecPersonId = this.$(".department-persons").select2("val");
			}

			if (selectedExecPersonId) {
				var appealExecPerson = new AppealExecPerson();
				appealExecPerson.save({
					id: selectedExecPersonId
				});

				shared.models.appeal.set("execPerson", this.allPersons.get(selectedExecPersonId).toJSON());

				this.close();
			}
		},

		addAllPersons: function() {
			this.$(".all-persons").append(this.allPersons.map(function(person) {
				return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
			})).select2("enable");
		},

		addDepartmentPersons: function() {
			this.$(".department-persons").append(this.departmentPersons.map(function(person) {
				return "<option value='" + person.get('id') + "'>" + person.get("name").raw + "</option>";
			})).select2("enable");
		},

		render: function() {
			BaseView.prototype.render.apply(this);

			this.$("#filter-persons-container").buttonset();
			this.$(".all-persons, .department-persons").select2({
				matcher: function(term, text, opt) {
					return text.split(' ')[0].toUpperCase().indexOf(term.toUpperCase()) >= 0
				}
			}).select2("disable");
			this.$(".all-persons").hide();

			return this;
		}
	});

	return ExecPersonAssignmentDialog;

});
