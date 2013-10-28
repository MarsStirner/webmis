define(function(require) {
	var list = require('text!../templates/list.html');
	var BaseView = require('./BaseView');

	return BaseView.extend({
		template: list,
		initialize: function(){
			this.collection.on('reset', this.render, this);
		},
		data: function(){
			var data = {};
			data.items = this.collection.toJSON();
			console.log('data', data)
			return data;
		}
	});

});
