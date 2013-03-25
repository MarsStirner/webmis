define([], function () {
	var SetOffTests = Model.extend({
		initialize: function (options) {

			this.code = options.code;
			this.patientId = options.patientId;
		},

		getTree: function () {

			console.log('getTree', this.get('group')[1].attribute)
			var tests = this.get('group')[1].attribute;

			var testList = [];

			_.each(tests, function (test) {

				if (test.type == "String") {


					if (test.properties[0].value == 'false') {
						test.properties[0].value = false;
					} else {
						test.properties[0].value = true;
					}

					testList.push({
						title: test.name,
						icon: false,
						unselectable: !test.properties[0].value,
						select: test.properties[1].value
					});

				}

			})

			var testTree = [
				{
					icon: false,
					title: "тест1",
					select: false,
					unselectable: false,
					onCustomRender: null
				}
			];

			return testList;
		},
		url: function () {
			return DATA_PATH + "actionTypes/laboratory/?filter[code]=" + this.code + "&patientId=" + this.patientId;
		},
		parse: function (raw) {
			return raw.data[0]
		}
	});

	return SetOffTests;

});
