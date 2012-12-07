define([
	
], function () {

	App.Models.PrintForm007 = Model.extend({
		urlRoot: function(){
			checkForErrors(this.get("id"), "Form 007 required department id");
			return DATA_PATH + "seventhform/"+ this.get("id")
		}
	});

	return App.Models.PrintForm007;
} );