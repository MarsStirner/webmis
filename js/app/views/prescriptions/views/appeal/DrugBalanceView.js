define(function(require) {
	var template = require('text!views/prescriptions/templates/appeal/drug-ballance.html');
	var BaseView = require('../BaseView');

	return BaseView.extend({
		template: template,
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
			//console.log('onFetch', this.cid, this.$el.html());

			this.$el.html('Ищем...');
		},
		data: function(){
			var data = {};
			data.items = this.collection.toJSON();
			console.log('balance '+this.cid, data)
			return data;
		}
	});

});
