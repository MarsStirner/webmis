define(function(require) {
	var commonData = require('mixins/commonData');

	var Analysis = Model.extend({
		initialize: function(options) {
			this.code = options.code;
			this.patientId = options.patientId;
			this.deferred = this.fetch();

		},



		getTests: function() {
			var self = this;

			var tests = this.get('group')[1].attribute;

			var testsList = [];

			_.each(tests, function(test) {

				if (test.type == "String") {
					var select = false;
					var unselectable = false;

					self.setProperty(test.name, 'isAssigned', 'true');
					//console.log(test.name, self.getProperty(test.name, 'isAssigned'))

					if (self.getProperty(test.name, 'isAssignable') == 'false') {
						unselectable = true;
					}

					if (self.getProperty(test.name, 'isAssigned') == 'true') {
						select = true;
					}

					testsList.push({
						title: test.name,
						unselectable: unselectable,
						select: select
					});

				}

			});


			return testsList;
		},

		url: function() {
			return DATA_PATH + "dir/actionTypes?filter[mnem]=LAB&filter[code]=" + this.code + "&patientId=" + this.patientId;
		},

		parse: function(raw) {
			return raw.data[0];
		}

	}).mixin([commonData]);

	return Analysis;

});
