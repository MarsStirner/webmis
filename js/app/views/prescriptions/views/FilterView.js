define(function(require) {
	var BaseView = require('./BaseView');
	var DateRangeView = require('./DateRangeView');
	var rivets = require('rivets');
	var template = require('text!../templates/filter.html');

	return BaseView.extend({
		template: _.template(template),

		initialize: function() {
			this.listenTo(this.model, 'change', this.filter);
			this.listenTo(this.model, 'change', this.setUrlParams);

			this.model.set(this.getUrlParams());

			this.dateRangeView = new DateRangeView({
				model: this.model
			});


			this.addSubViews({
				'.date-range': this.dateRangeView
			});

		},

		getUrlParams: function() {
			return Core.Url.extractUrlParameters();
		},

		setUrlParams: function() {
			var params = $.param(this.model.toJSON());
			App.Router.navigate('prescriptions/?' + params);
		},

		filter: function() {
			// if(this.fetchXhr){
			// 	this.fetchXhr.abort();
			// }

			console.log('filter', this.model.toJSON());

			this.fetchXhr = this.collection.fetch({
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
