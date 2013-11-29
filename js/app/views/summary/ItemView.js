define(function(require) {
	var template = require('text!templates/summary/summary-main.html');
	require("models/appeal");

	var Documents = require("views/documents/documents");

	require("models/appeal");

	return View.extend({
		initialize: function(){
			var self = this;

			// this.appealsList = new AppealsList({},{
			// 	patientId: this.options.patientId
			// });
    		this.appeal = new App.Models.Appeal({
				id: this.options.appealId
			});


			this.patient = new App.Models.Patient();
			this.patient.set('id',this.options.patientId);

            $.when(this.patient.fetch(),this.appeal.fetch()).then(function(){
				self.renderPage();
            });

			// self.appeal = new App.Models.Appeal();

			// this.getPatientAppeals(this.options.patientId).done(function() {
			// 	console.log('appeals', self.appealsList);

			// 	self.firstAppeal = self.appealsList.first();

			// 	if(self.firstAppeal){
			// 		var appealId = self.firstAppeal.get('id');
			// 		self.getAppealById(appealId).done(function() {

			// 			var patient = self.appeal.get("patient");
			// 			patient.fetch().done(function(){
			// 				console.log('appeal', self.appeal);
			// 				self.renderPage(self.appeal, self.appealsList, appealId);
			// 			});
			// 		});
			// 	}

			// });

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
				patientName: this.patient.get('name').get('raw')
			});

			this.itemView = new Documents.Summary.Review.Layout({
				patientId: this.options.patientId,
				subId: this.options.docIds.split(','),
                appealId: this.appeal.get('id'),
                appeal: this.appeal
			});

			this.itemView.render();
			this.$el.append(html);

			this.$el.find('#summary-list').append(this.itemView.el);

			console.log('render page',appeal, this.itemView.el);



		}
	});

});
