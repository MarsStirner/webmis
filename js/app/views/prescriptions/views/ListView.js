define(function(require) {
	var list = require('text!../templates/list.html');
	var BaseView = require('./BaseView');

	return BaseView.extend({
		template: list,
		initialize: function(){
			this.collection.on('reset', function(){
				if(this.collection.length){
					this.render();
				}else{
					this.renderNoResults();
				}
			}, this);
			this.collection.on('fetch', this.renderOnFetch, this);
		},
		renderNoResults: function(){
			this.$el.html('Ничего не нашли.');
		},
		renderOnFetch: function(){
			console.log('onFetch', this.cid, this.$el.html());

			this.$el.html('Ищем...');
		},
		data: function(){
			var data = {};
			data.items = this.collection.toJSON();
			console.log('data', data)
			return data;
		}
	});

});
