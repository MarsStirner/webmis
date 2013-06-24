define(function () {

	return Model.extend({
		url:function(){
			return '/api/v1/dir/pacient_model';
		},
		parse: function(raw){
			return {items: raw.data}
		}
	});
});
