define(function(require) {
	var template = require('text!views/prescriptions/templates/list-main.html');

	var BaseView = require('views/prescriptions/views/BaseView');

	var Prescriptions = require('views/prescriptions/collections/Prescriptions');
	var FilterView = require('views/prescriptions/views/prescriptions/FilterView');
    var ActionsView = require('views/prescriptions/views/prescriptions/ActionsView');
	var ListView = require('views/prescriptions/views/prescriptions/ListView');


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


            this.actionsView = new ActionsView({
                collection:this.collection
            })

			this.addSubViews({
				'.list': this.listView,
				'.filter': this.filterView,
                '.actions': this.actionsView
			});

			///console.log();

			this.filterView.filter();
		}

	});

});
