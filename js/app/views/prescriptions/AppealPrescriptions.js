define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/prescriptions.html');

	var BaseView = require('./views/BaseView');
	var Prescriptions = require('./collections/Prescriptions');
	var ListView = require('./views/appeal/ListView');
	var ActionsView = require('./views/appeal/ListActionsView');




	return BaseView.extend({
		className: 'ContentHolder',
		template: template,
		initialize: function() {
			var self = this;
			console.log('init a', this.options);

			this.collection = new Prescriptions();

			this.listView = new ListView({
				collection: this.collection
			});

			this.actionsView = new ActionsView({
				appealId: this.options.appealId
			});

			this.addSubViews({
				'.list': this.listView,
				'.actions': this.actionsView
			});

			this.collection.fetch({data:{
				eventId: this.options.appealId
			}});


		}

	});

});
