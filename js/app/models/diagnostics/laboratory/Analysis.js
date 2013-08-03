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

					var unselectable = false;

					if (self.getProperty(test.name, 'isAssignable') == 'false') {
						unselectable = true;
					}

					//все тесты выбраны по умолчанию, в не зависимости от проперти isAssigned
					self.setProperty(test.name, 'isAssigned', 'true');
					var select = true;

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
