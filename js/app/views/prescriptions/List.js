define(function(require) {
	var template = _.template(require('text!views/prescriptions/templates/list-main.html'));

	var BaseView = require('./views/BaseView');

	var Prescriptions = require('./collections/Prescriptions');
	var FilterView = require('./views/FilterView');
	var ListView = require('./views/ListView');


	return BaseView.extend({
		className: 'ContentHolder',
		template: template,
		initialize: function() {
			var self = this;

			this.collection = new Prescriptions();


			this.listView = new ListView({
				collection: this.collection
			});

			this.filterView = new FilterView({
				collection: this.collection,
				model: new Backbone.Model()
			});

			this.addSubViews({
				'.list': this.listView,
				'.filter': this.filterView
			});

			console.log();

			this.filterView.filter();
		}

	});

});
