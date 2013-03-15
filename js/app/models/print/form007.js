define([
	
], function () {

	App.Models.PrintForm007 = Model.extend({
		initialize: function(){
			console.log(this)
		},
		urlRoot: function(){
			//checkForErrors(this.get("id"), "Form 007 required department id");
			return DATA_PATH + "reports/f007?filter[departmentId]="+ this.get('departmentId')+"&filter[beginDate]="+ this.get('beginDate')+"&filter[endDate]="+this.get('endDate') ;
		}
	});

	return App.Models.PrintForm007;
} );
