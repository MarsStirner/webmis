/**
 * User: FKurilov
 * Date: 25.06.12
 */
define([
	"text!templates/appeal/edit/popups/consultation.tmpl",
	"mixins/PopupMixin",
	"views/ui/MkbInputView",
	"views/ui/SelectView",
	"collections/Schedule",
	"views/consultations/TimetableView",
	"collections/doctors",
	"collections/doctors-free",
	"collections/departments",
	"collections/dictionary-values"], function(tmpl, popupMixin, MkbInputView, SelectView, ScheduleCollection, TimetableView) {

	return View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .test": "test",
			// "change .Persons": "onPersonChange",
			// "change .Specs": "onSpecChange",
			// "click .itemSelectTime": "onTimeChange",
			// "click .FreeDoctors li": "onPersonFreeChange",
			// "selectDate": "onDateChange"
		},

		initialize: function() {
			_.bindAll(this);
			this.assignPersons = new App.Collections.Doctors();
			this.assignPersons.on("reset", this.onPersonsLoaded, this);
			//this.assignPersons.fetch();

			this.persons = new App.Collections.Doctors();
			this.persons.on("reset", this.onPersonsLoaded, this);
			this.persons.setParams({
				limit: 0 //,
				// filter:{
				// 	departmentId: 42
				// }
			});


			// this.personsFree = new App.Collections.DoctorsFree();
			// this.personsFree.on("reset", this.onPersonsFreeLoaded, this);

			// Получаем справочник специальностей врачей
			this.specialities = new App.Collections.DictionaryValues("", {
				name: "specialities"
			});
			this.specialities.setParams({
				sortingField: 'value',
				sortingMethod: 'asc'
			});

			//this.specialities.fetch();

			//this.availableDates = new Collection([{date: new Date}]);
			this.currentDate = new Date();
			this.currentTime = "";

			//инпут классификатора диагнозов
			this.mkbInputView = new MkbInputView();
			this.depended(this.mkbInputView);

			this.financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			//this.financeDictionary.fetch();

			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			//this.departments.fetch();
			//
			this.timetableView = new TimetableView();

		},

		test: function() {
			var self = this;
			this.schedule = new ScheduleCollection();
			this.schedule.fetch({
				url: "/js/app/views/consultations/schedule.json",
				dataType: 'json'
			}).done(function () {

				console.log(self.schedule.getDates(), self.schedule.getTimetable('2012-04-13'), self.schedule, arguments);
				self.renderCalendar();
			});

		},

		renderCalendar: function(){
			var self = this;
			var workDaysFormated = _.map(this.schedule.getDates(), function(day) {
				return moment(day, "YYYY-MM-DD").format();
			}, this);

			function noDisabledDays(date) {
				if (!_.contains(workDaysFormated, moment(date).format())) {
					return [0];
				} else {
					return [1];
				}
			}


			this.$("#dp").datepicker({
				beforeShowDay: noDisabledDays,
				//minDate: new Date(),
				onSelect: function(dateText) {
					var date = moment(dateText, 'DD.MM.YYYY').format('YYYY-MM-DD');
					self.renderTimetable(date);
					

				}
			});
		},

		renderTimetable: function(date){
			var timetable = this.schedule.getTimetable(date);
			this.timetableView.setElement(this.$('#timetable'));
			this.timetableView.render({timetable: timetable});

		},

		onPersonsLoaded: function(coll) {
			console.log('persons', this.persons.length)

			// //this.$(".Persons").append($("<option/>", {text: "...", value: ""}));

			// // TODO: remove after backend fix
			// this.persons.each(function(p) {
			// 	p.get("specs").set("id", Math.floor((Math.random() * 4) + 1));
			// });

			// this.personsJSON = this.persons.toJSON();
			// this.addPersons(this.personsJSON);

			// this.$(".Persons").select2("enable");
		},


		render: function() {

			this.$saveButton = this.$el.find('.save');

			this.$saveButton.button("disable");

			this.renderNested(this.mkbInputView, "#mkb");

			

			this.assignPersonSelect = new SelectView({
				collection: this.assignPersons,
				el: this.$('#assign-person'),
				selectText: 'name.raw'
			});

			this.depended(this.assignPersonSelect);


			this.financeSelect = new SelectView({
				collection: this.financeDictionary,
				el: this.$('#finance')
			});

			this.depended(this.financeSelect);

			this.departmentSelect = new SelectView({
				collection: this.departments,
				el: this.$('#departments'),
				selectText: 'name'
			});

			this.depended(this.departmentSelect);

			this.specialitiesSelect = new SelectView({
				collection: this.specialities,
				el: this.$('#specialities')
			});

			this.depended(this.specialitiesSelect);


			this.$('#consultations').dynatree({
				children: [{
					title: 'Консультации ',
					icon: false,
					children: [{
						title: 'Консультация хирурга',
						icon: false
					}, {
						title: 'Консультация онколога',
						icon: false
					}, {
						title: 'Консультация офтальмолога',
						icon: false
					}]
				}]
			});


			this.persons.on('reset', function() {
				this.persons.each(function(person) {
					///console.log('person.get(name)', person, person.get('name').get('raw'))
					this.$("#persons").append("<li><a href='#'>" + person.get("name").get('raw') + "</a></li>");

				}, this);

			}, this);
			//this.persons.fetch();



			return this;
		},

	}).mixin([popupMixin]);


});
