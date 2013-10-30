define(function(require) {
	var BaseView = require('./BaseView');
	var DateRangeView = require('./DateRangeView');
	var SelectView = require('./SelectView');
	var rivets = require('rivets');
	var template = require('text!../templates/filter.html');
	require('collections/departments');
	var AdministrationMethod = require('collections/AdministrationMethod');

	return BaseView.extend({
		template: template,
		events: {
			'keyup #doctor-name':'onKeyUp',
			'keyup #drug-name':'onKeyUp',
			'keyup #pacient-name':'onKeyUp'
		},

		initialize: function() {
			this.listenTo(this.model, 'change', this.filter);
			this.listenTo(this.model, 'change', this.setUrlParams);

			this.model.set(this.getUrlParams());

			this.dateRangeView = new DateRangeView({
				model: this.model
			});

			this.administration = new AdministrationMethod();

			this.administrationView = new SelectView({
				collection: this.administration,
				model: this.model,
				modelKey: 'administrationId'
			});


			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				limit: 0,
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			this.departmentsView = new SelectView({
				collection: this.departments,
				model: this.model,
				modelKey: 'departmentId'
			});

			this.administration.fetch()
			this.departments.fetch();


			this.addSubViews({
				'#date-range': this.dateRangeView,
				'#departments': this.departmentsView,
				'#administration': this.administrationView
			});

		},

		onKeyUp: function(e){
			$target = this.$(e.target);
			var value = $target.val();
			if(value && value.length > 2){
				$target.trigger('change');
			}
			console.log('keyup', $target.val());
		},

		getUrlParams: function() {
			return Core.Url.extractUrlParameters();
		},

		setUrlParams: function() {
			var params = $.param(this.model.toJSON());
			App.Router.navigate('prescriptions/?' + params);
		},

		filter: function() {
			if (_.isObject(this.lastXHR)) {
				// console.log('filter0', this.lastXHR, this.model.toJSON());
				if (this.lastXHR && this.lastXHR.readyState != 4) {
					this.lastXHR.abort('stale');

				}
				// console.log('filter1', this.lastXHR, this.model.toJSON());
			}


			this.lastXHR = this.collection.fetch({
				data: this.model.toJSON(),
				processData: true
			});
		},

		afterRender: function() {
			rivets.bind(this.el, {
				filter: this.model
			});

		}
	});

});
