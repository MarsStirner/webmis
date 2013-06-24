define(function () {

	return Model.extend({
		url:function(){
			return '/api/v1/dir/quotaType';
		},
		parse: function(raw){
			return {items: raw.data}
		}
	});
});
