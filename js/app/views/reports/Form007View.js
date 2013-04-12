define(["text!templates/reports/f007.html",
	"views/ui/RangeDatepickerView",
	"views/ui/SelectView",
	"collections/departments",
	"models/print/form007"], function(tmpl, RangeDatepickerView, SelectView) {

	return View.extend({
		template: tmpl,
		events: {
			"click .print": "print"
		},

		initialize: function() {
			var view = this;

			this.rangeView = new RangeDatepickerView({
				startTimestamp: 1365681693 - (60 * 60 * 24),
				endTimestamp: 1365681693
			});

			this.departments = new App.Collections.Departments();

			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			this.departmentSelect = new SelectView({
				collection: this.departments,
				el: view.$('#departments'),
				selectText: 'name'
			});

			//this.departments.fetch();

			this.depended(this.departmentSelect);

		},
		initDepartments: function() {
			var view = this;

			//список отделений
			view.departments = new App.Collections.Departments();

			view.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			view.departmentSelect = new SelectView({
				collection: view.departments,
				el: view.$('#departments'),
				selectText: 'name'
			});

			view.depended(view.departmentSelect);

		},

		print: function() {

			console.log('from-date', $("#from-date").datepicker("getDate").getTime());
			console.log('from-date', $("#from-date").datepicker("getDate").getTime());
			console.log('departments', $("#departments :selected").val())

			var form007 = new App.Models.PrintForm007({
				departmentId: $("#departments :selected").val(),
				beginDate: $("#from-date").datepicker("getDate").getTime(),
				endDate: $("#to-date").datepicker("getDate").getTime()
			});


			form007.fetch();
		},
		render: function() {
			console.log('007 render');

			this.$el.html($.tmpl(this.template));

			this.$(".print").button();

			this.$("#range").html(this.rangeView.render().el);
			this.initDepartments();

			return this;
		}

	});
});
