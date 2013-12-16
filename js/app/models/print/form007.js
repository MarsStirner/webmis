define(function () {
	App.Models.PrintForm007 = Model.extend({
		urlRoot: function () {
			var url = DATA_PATH + 'reports/f007?';
			
			if (this.get('departmentId')) {
				url += '&filter[departmentId]=' + this.get('departmentId');
			}
			//NOT USED
			if (this.get('beginDate')) {
				url += '&filter[beginDate]=' + this.get('beginDate');
			}
			if (this.get('endDate')) {
				url += '&filter[endDate]=' + this.get('endDate');
			}
			if (this.get('bedProfiles') && this.get('bedProfiles').length) {
				var bpFilter = '&filter[profileBed]=';
				url += bpFilter + this.get('bedProfiles').join(bpFilter);
			}
			return url;
		}
	});

	return App.Models.PrintForm007;
});
