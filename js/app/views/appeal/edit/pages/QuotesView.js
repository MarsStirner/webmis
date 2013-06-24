define(function(require) {

	var template = require('text!templates/appeal/edit/pages/quotes.html');
	var VmpTalon = require('models/VmpTalon');
	var QuotaType = require('models/QuotaType');

	var Treatment = require('models/Treatment');
	var PacientModel = require('models/PacientModel');

	return View.extend({
		initialize: function() {
			var self = this;
			this.vmpTalon = new VmpTalon({});
			this.vmpTalon.appealId = this.options.appeal.get('id');


			//this.vmpTalon.on('change',this.getQuotaType, this)
			this.vmpTalon.fetch().done(function(model) {
				console.log('vmptalon', self.vmpTalon);
				if (!self.vmpTalon.get('vmpTalon')) {

					$.when(self.getQuotaType(),self.getTreatment(),self.getPacientModel())
					.done(function(){
						console.log('sfgdjgfahgahgfhga',self.quotaType)
					})
					// self.getQuotaType();
					// self.getTreatment();
					// self.getPacientModel();

				}
				self.render2();
			});

		},
		getQuotaType: function() {
			var self = this;
			this.quotaType = new QuotaType();
			return this.quotaType.fetch()
			//.done(function() {
			// 	console.log('quotaType', quotaType)
			// })
		},
		getTreatment: function() {
			var self = this;
			this.treatment = new Treatment();
			return this.treatment.fetch()
			// .done(function() {
			// 	console.log('treatment', treatment)
			// })
		},
		getPacientModel: function() {
			var self = this;
			this.pacientModel = new PacientModel();
			return this.pacientModel.fetch()
			// .done(function() {
			// 	console.log('pacientModel', pacientModel)
			// })
		},
		render2: function() {
			console.log(this.vmpTalon.toJSON())
			this.$el.html(_.template(template, this.vmpTalon.toJSON()));
			return this;
		},

		render: function() {
			console.log(this.vmpTalon.toJSON())
			//this.$el.html(_.template(template,this.vmpTalon.toJSON()));
			return this;
		}

	});


});
