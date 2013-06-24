define(function () {

	return Model.extend({
		url:function(){
			return '/api/v1/dir/treatment';
		},
		parse: function(raw){
			return {items: raw.data}
		}
	});
});
