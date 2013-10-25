define(function(require) {
	var template = _.template(require('text!../templates/filter.html'));
	var BaseView = require('./BaseView');
	var rivets = require('rivets');

	return BaseView.extend({
		template: template,

		initialize: function() {
			this.listenTo(this.model, 'change', this.filter);
			this.listenTo(this.model, 'change', this.setUrlParams);

			this.model.set(this.getUrlParams());
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

			this.fetchXhr = this.collection.fetch({
				data: this.model.toJSON(),
				processData: true
			});
		},

		afterRender: function() {
			this.ui = {};
			this.ui.$datepicker = this.$el.find("#datepicker");
			this.ui.$datepicker.datepicker();

			rivets.formatters.date = {
				read: function(value) {
					var output = moment(value,'X').format('DD.MM.YYYY');
					console.log('read',value, output)
					return output;
				},
				publish: function(value) {
					var output = moment(value, 'DD.MM.YYYY').format('X');
					console.log('publish',value, output)
					return output;
				}
			}

			rivets.bind(this.el, {
				filter: this.model
			});

		}
	});

});
