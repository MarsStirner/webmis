define(function(require) {
	var template = require('text!templates/prescriptions/list.html');
	var Prescriptions = require('collections/prescriptions/Prescriptions');
	require('collections/departments');
	var SelectView = require('views/ui/SelectView');

	return View.extend({
		className: 'ContentHolder',
		initialize: function(){
			var self = this;

			this.collection = new Prescriptions();

			this.collection.on('reset', this.render, this);
			this.collection.fetch();



		},

		initDepartments: function() {
			var view = this;

			//список отделений
			view.departments = new App.Collections.Departments();

			view.departments.setParams({
				filter: {
					hasBeds: true
				},
				limit: 0,
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			view.departments.on('reset', function(){
				console.log(view.departments);
			})


				// view.departmentSelect = new SelectView({
				// 	collection: view.departments,
				// 	el: view.$('#departments'),
				// 	selectText: 'name'//,
				// 	//initSelection: view.collection.requestData.filter.departmentId
				// });








		},

		render: function() {
			this.$el.html(_.template(template, {items:this.collection.toJSON()}));

			this.initDepartments();

			return this;
		}
	});

});
