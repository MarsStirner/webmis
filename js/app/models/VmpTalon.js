define(function() {

	return Model.extend({
		idAttribute: 'id',
		initialize: function(){

			this.on('change:MKB', function(){
				//console.log('MKB',this.get('MKB'));
				if (!this.get('MKB')) {
					this.set('quotaType_id', '');
					this.set('pacientModel_id', '');
				}
			}, this);

			this.on('change:quotaType_id', function(){
				//console.log('quotaType_id',this.get('quotaType_id'));
				if(this.get('quotaType_id')){

				}
				if(!this.get('quotaType_id')){
					this.set('pacientModel_id', '');
				}
			}, this);

			this.on('change:pacientModel_id', function(){
				//console.log('pacientModel_id',this.get('pacientModel_id'));

			}, this);

		},


		urlRoot: function() {
			return '/api/v1/appeals/' + this.appealId + '/client_quoting';
		},
		parse: function(raw) {

			return raw.data;
		}


	})
});
