define(function(require) {
	var template = require('text!templates/chief/index.html');

	return View.extend({
		className: "ContentHolder",
		template: template,
		events: {
			'click #appeals':'openAppeals',
			'click #statements':'openStatements'
		},
		openAppeals: function(){
			App.Router.navigate("appeals/", {trigger: true});
		},
		openStatements: function(){
			App.Router.navigate("statements/", {trigger: true});
		},
		render: function() {
			this.$el.html(_.template(this.template));
			this.ui = {};
			this.ui.$statmentsButton = this.$el.find('#statements');
			this.ui.$appealsButton = this.$el.find('#appeals');

			this.ui.$statmentsButton.button();
			this.ui.$appealsButton.button();
			return this;
		}
	});

});
