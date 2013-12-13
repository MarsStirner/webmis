define([
	
], function () {

	App.Models.PrintForm007 = Model.extend({
		initialize: function(){
			//console.log(this)
		},
		urlRoot: function(){
			//checkForErrors(this.get("id"), "Form 007 required department id");
			var url;
			if(this.get('departmentId')){
				url = DATA_PATH + "reports/f007?filter[departmentId]="+ this.get('departmentId')+"&filter[beginDate]="+ this.get('beginDate')+"&filter[endDate]="+this.get('endDate') ;
			}else{
				url = DATA_PATH + "reports/f007?filter[beginDate]="+ this.get('beginDate')+"&filter[endDate]="+this.get('endDate') ;
			}
			if (this.get("bedProfiles")) {
				var bpFilter = "&filter[profileBed]=";
				url += bpFilter + this.get("bedProfiles").join(bpFilter);
			}
			return url ;
		}
	});

	return App.Models.PrintForm007;
} );
