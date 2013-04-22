/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/consultation.tmpl",
	"mixins/PopupMixin",
	"collections/doctors",
	"collections/doctors-free"], function(tmpl, popupMixin) {

	return View.extend({
		template: tmpl,
		className: "popup",

		events: {
			//"click .ShowHidePopup": "close",
			"change .Persons": "onPersonChange",
			"change .Specs": "onSpecChange",
			"click .itemSelectTime": "onTimeChange",
			"click .FreeDoctors li": "onPersonFreeChange",
			"selectDate": "onDateChange"
		},

		initialize: function() {
			_.bindAll(this);
			this.persons = new App.Collections.Doctors();
			this.persons.on("reset", this.onPersonsLoaded, this);
			this.persons.fetch();

			this.personsFree = new App.Collections.DoctorsFree();
			this.personsFree.on("reset", this.onPersonsFreeLoaded, this);

			// Получаем справочник специальностей врачей
			this.specs = new App.Collections.DictionaryValues("", {
				name: "specialities"
			});
			this.specs.on("reset", this.onSpecsLoaded, this);
			this.specs.fetch();

			//this.availableDates = new Collection([{date: new Date}]);
			this.currentDate = new Date();
			this.currentTime = "";
		},

		onPersonsLoaded: function(coll) {
			//this.$(".Persons").append($("<option/>", {text: "...", value: ""}));

			// TODO: remove after backend fix
			this.persons.each(function(p) {
				p.get("specs").set("id", Math.floor((Math.random() * 4) + 1));
			});

			this.personsJSON = this.persons.toJSON();
			this.addPersons(this.personsJSON);

			this.$(".Persons").select2("enable");
		},

		addPersons: function(persons) {

			_(persons).each(function(p) {

				this.$(".Persons").append($("<option/>", {
					"text": p.name.raw,
					"value": p.id
				}).data("specs-id", p.specs.id));
			}, this);
		},

		onPersonsFreeLoaded: function(coll) {
			this.$(".FreeDoctors li").remove();
			this.addPersonsFree(this.personsFree.toJSON());
		},

		addPersonsFree: function(persons) {

			_(persons).each(function(p) {

				this.$(".FreeDoctors ul").append($("<li/>", {}).append($("<a/>", {
					"text": p.name.raw,
					"href": "#"
				})).data("id", p.id));
			}, this);
		},

		onSpecsLoaded: function(coll) {
			//this.$(".Specs").append($("<option/>", {text: "...", value: ""}));
			_(this.specs.toJSON()).each(function(s) {
				this.$(".Specs").append($("<option/>", {
					"text": s.value,
					"value": s.id
				}));
			}, this);

			this.$(".Specs").select2("enable");
		},

		// Обработчик события выбора врача
		onPersonChange: function(event) {
			var selectedPerson = this.$(".Persons").find("option:selected"),
				personSpec = selectedPerson.data("specs-id");

			if (personSpec) {
				this.$(".Specs").select2("val", personSpec);

				this.showPersonTime();
			}
		},

		// Обработчик события выбора свободного врача
		onPersonFreeChange: function(event) {
			var target = $(event.target).parent();
			idPerson = $(event.target).data("id");

			if (!target.hasClass("Active")) {
				$(".FreeDoctors .Active").removeClass("Active");
				target.addClass("Active");
				this.$(".Persons").select2("val", idPerson);
				this.showPersonTime();
			} else {
				return false;
			}
		},

		// Обработчик события выбора даты в календаре
		onDateChange: function(dateText) {
			dateText = dateText || new Date();
			this.currentDate = Core.date.toInt(dateText);
			this.showPersonTime();
			this.showPersonFree();
		},

		// Обработчик события выбора времени
		onTimeChange: function(timeText) {
			this.currentTime = timeText;
			this.showPersonFree();
		},

		// Метод для отображения времени врача
		showPersonTime: function() {
			var person;
			person = this.getSelectedPerson();

			if (!_.isUndefined(person)) {
				this.$(".SelectTime").fadeOut(function() {
					//Здесь реализуем логику по получению списка времени консультаций данного врача
				}).fadeIn();
			}

			return person;
		},

		// Метод для отображения списка свободных врачей
		showPersonFree: function() {
			var spec;
			spec = this.getSelectedSpec();

			if (!_.isUndefined(spec)) {
				this.personsFree.setParams({
					filter: {
						beginDate: 100000000,
						endDate: 1604606400000
					}
				});
				this.personsFree.fetch();

				this.$(".FreeDoctors").fadeOut(function() {
					//Здесь реализуем логику по получению списка свободных врачей
				}).fadeIn();
			}

			return spec;
		},

		onSpecChange: function(event) {
			var selectedSpec = this.$(".Specs").select2("val");
			this.$(".Persons").select2("val", "").find("option:not(:first)").remove();

			if (selectedSpec) {
				var personsBySpec = _(this.personsJSON).filter(function(p) {
					return parseInt(p.specs.id) === parseInt(selectedSpec);
				}, this);

				this.addPersons(personsBySpec);
				this.showPersonFree();
			} else {
				this.addPersons(this.personsJSON);
				this.$(".FreeDoctors").fadeOut();
			}
		},

		// Метод который возвращает объект типа App.Models.Doctor если врач выбран
		// или undefined в противном случае
		getSelectedPerson: function() {
			var idPerson;
			idPerson = parseInt(this.$(".Persons").find("option:selected").val());
			return this.persons.find(function(person) {
				return person.get("id") === idPerson;
			});
		},

		// Метод который возвращает объект типа App.Models.DictionaryValue если выбрана специальность врача
		// или undefined в противном случае
		getSelectedSpec: function() {
			var idSpec;
			idSpec = parseInt(this.$(".Specs").find("option:selected").val());
			return this.specs.find(function(spec) {
				return spec.get("id") === idSpec;
			});
		},

		render: function() {
			//if ($(this.$el.parent().length).length === 0) {
				//this.$el.html($.tmpl(this.template, {}));
				this.$saveButton = this.$el.find('.save');

				this.$saveButton.button("disable");


				this.$("#dp").datepicker({
					onSelect: function(dateText) {
						$(this).trigger("selectDate", dateText);
					}
				});

				this.$("a").click(function(event) {
					event.preventDefault();
				});

				this.$(".select2").width("100%").select2({
					placeholder: "Выберите значение",
					allowClear: true
				});

				if (!this.$(".Persons").find("option").length) {
					this.$(".Persons").select2("disable");
				}

				if (!this.$(".Specs").find("option").length) {
					this.$(".Specs").select2("disable");
				}

				//TODO: remove this line
				this.onSpecsLoaded(this.specs);
			//}

			return this;
		},

	}).mixin([popupMixin]);


});
