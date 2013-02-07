define(['text!templates/pages/biomaterials.tmpl'],function(biomaterialsTemplate){

	var Biomaterials = View.extend({
		template:biomaterialsTemplate,
		initialize:function () {},
		render: function(){
			this.$el.html($.tmpl(this.template,{}));
			return this;
		}

	});

	return Biomaterials;

});
