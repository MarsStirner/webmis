define(function(require) {
	var template = require('text!../templates/select.html');
	var BaseView = require('./BaseView');
	var rivets = require('rivets');

	return BaseView.extend({
		template: template,
		initialize: function() {
			this.valueProperty = this.options.valueProperty ? this.options.valueProperty : 'id';
			this.textProperty = this.options.textProperty ? this.options.textProperty : 'name';
			this.listenTo(this.collection, 'reset', this.render);
			this.modelKey = 'model.'+this.options.modelKey;

		},

		getValue: function(model){
			return model.get(this.valueProperty);
		},

		getText: function(model){
			return model.get(this.textProperty);
		},
		data: function(){
			// var selected = this.options.valueProperty ? this.options.valueProperty : null;
			var items = this.collection.map(function(item){
				return {
					value: this.getValue(item),
					text: this.getText(item)
				}
			}, this);

			return {
				items: items,
				modelKey: this.modelKey
			}
		},
		afterRender: function() {
			rivets.bind(this.el, {
				model: this.model
			});

		}
	});

});
