define(function(require) {
	var template = require('text!templates/summary/summary-main.html');
	require("models/appeal");

	var Documents = require("views/documents/documents");

	var AppealsList = Collection.extend({
		initialize: function(models, options){
			this.patientId = options.patientId;
		},
		url: function(){
			if(!this.patientId){
				throw new Error('Нет айди пациента');
			}
			return '/api/v1/events/?patientId='+this.patientId;
		},
		setPatientId: function(patientId){
			this.patientId = patientId;
		}
	})

	return View.extend({
		initialize: function(){
			var self = this;

			this.appealsList = new AppealsList({},{
				patientId: this.options.patientId
			});

			//this.patient = new App.Models.Patient();

			self.appeal = new App.Models.Appeal();

			this.getPatientAppeals(this.options.patientId).done(function() {
				console.log('appeals', self.appealsList);

				self.firstAppeal = self.appealsList.first();

				if(self.firstAppeal){
					var appealId = self.firstAppeal.get('id');
					self.getAppealById(appealId).done(function() {

						var patient = self.appeal.get("patient");
						patient.fetch().done(function(){
							console.log('appeal', self.appeal);
							self.renderPage(self.appeal, self.appealsList, appealId);
						});
					});
				}

			});

		},
		getPatientAppeals: function(patientId){
			this.appealsList.setPatientId(patientId);
			return this.appealsList.fetch();
		},
		getAppealById: function(id){
			this.appeal.set('id',id);
			return this.appeal.fetch();
		},
		render: function() {
			return this;
		},
		renderPage: function(appeal, events, selectedEventId){
			var html = _.template(template, {
				patientId: this.options.patientId,
				patientName: appeal.get('patient').get('name').get('raw')
			});

			this.listView = new Documents.Summary.List.Layout({
				appealId: appeal.get('id'),
				appeal: appeal,
				patientId: this.options.patientId,
				events: events,
				selectedEventId: selectedEventId

			});

			this.listView.render();
			this.$el.append(html);

			this.$el.find('#summary-list').append(this.listView.el);

			console.log('render page',appeal, this.listView.el);



		}
	});

});
