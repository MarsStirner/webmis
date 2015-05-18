define(function () {

	return Collection.extend({
		url:function(){
			return '/api/v1/dir/quotaType' + (this.appealId ? '?eventId='+this.appealId : '');
		},
		parse: function(raw){
			return raw.data;//{items: raw.data}
		}
	});
});
