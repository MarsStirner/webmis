//примесь для работы  с данными модели в формате commonData
define([], function() {

	return function commonData() {

		this.setDefaults({
			_getGroups: function() {
				return this.get('group');
			},

			_getAttributes: function() {
				var groups = this._getGroups();
				var attributes = [];
				_.each(groups, function(group) {
					_.each(group.attribute, function(attribute) {
						attributes.push(attribute);
					});

				});

				return attributes;
			},

			getProperty: function(attributeName, propertyName) {

				if (!propertyName) propertyName = 'value';

				var attributes = this._getAttributes();

				var attribute = _.find(attributes, function(attr) {
					return attr.name == attributeName;
				});

				if (!attribute) return false;
				// console.log('attribute.properties',attribute.properties)

				var property = _.find(attribute.properties, function(prop) {
					return prop.name == propertyName;
				});

				if (!property) return false;

				var value = property.value;

				return value;
			},
			setProperty: function(attributeName, propertyName, value) {
				var model = this;


				var group = model.get('group');

				var find = false;
				_.each(group, function(g, groupIndex) {
					_.each(g.attribute, function(a, attributeIndex) {
						if (a.name == attributeName) {
							_.each(a.properties, function(p, propertyIndex) {
								if (p.name == propertyName) {
									// console.log('нашли', groupIndex, attributeIndex, propertyIndex);
									group[groupIndex].attribute[attributeIndex].properties[propertyIndex]['value'] = value;
									find = true;
								}
							});

							if (!find) { //нет нужного проперти, вставляем его
								group[groupIndex].attribute[attributeIndex].properties.push({
									name: propertyName,
									value: value
								});
							}

						}
					});
				});

				model.set('group', group);

				console.log('setProperty', attributeName, propertyName, value, group);

			}

		});



	};

});
