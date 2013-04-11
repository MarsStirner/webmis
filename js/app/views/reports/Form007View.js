define(["text!templates/reports/f007.html",
	"views/ui/RangeDatepickerView",
	"views/ui/SelectView2",
	"collections/departments"], function(tmpl, RangeDatepickerView,SelectView) {

	return View.extend({
		template: tmpl,

		initialize: function() {
			var view=this;

			this.rangeView = new RangeDatepickerView({
				startTimestamp:1365681693-(60*60*24),
				endTimestamp:1365681693
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

			this.departments.fetch();

			this.depended(this.departmentSelect);

		},

		render: function() {
			console.log('007 render');

			this.$el.html($.tmpl(this.template));

			this.$("#range").html(this.rangeView.render().el);

			return this;
		}

	});
});
