define(function(require) {
	var template = require('text!../templates/date-range.html');
	var BaseView = require('./BaseView');
	var rivets = require('rivets');

	return BaseView.extend({
		template: template,
		initialize: function() {

			if (!this.model.get('dateRangeMin')) {
				this.model.set('dateRangeMin', moment().startOf('day').format('X'));
				this.model.set('dateRangeMax', moment().startOf('day').add('days', 1).format('X'));
			}
		},
		data: function(){
			console.log('dateRange data',this.model.toJSON());
			return this.model.toJSON();
		},
		afterRender: function() {
			this.ui = {};
			this.ui.$dateRangeMin = this.$el.find("#dateRangeMin");
			this.ui.$dateRangeMin.datepicker();

			this.ui.$dateRangeMax = this.$el.find("#dateRangeMax");
			this.ui.$dateRangeMax.datepicker();

			// this.ui.$dateRangeType = this.$el.find("#dateRangeType");
			// this.ui.$dateRangeType.buttonset();

			rivets.formatters.date = {
				read: function(value) {
					var output = moment(value, 'X').format('DD.MM.YYYY');
					return output;
				},
				publish: function(value) {
					var output = moment(value, 'DD.MM.YYYY').format('X');
					return output;
				}
			}

			rivets.bind(this.el, {
				filter: this.model
			});
		}

	});

});
