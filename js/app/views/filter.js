App.Views.Filter = View.extend ({
	events: {
		"keyup input": "refresh",
		"change input, select, textarea": "refresh",
		"submit form": "submit"
	},

	submit: function () {
		return false
	},

	updateUrl: function () {
		App.Router.updateUrl ( this.options.path, this.collection.getParams());
	},

	refresh: function ( event ) {
		var view = this;
		var $input = $(event.currentTarget);


		if ( this._timeout )
		{
			clearTimeout ( this._timeout );
		}

		var timeout,
			DELAY = 300;

		if ( $input.data("old-value") && $input.data("old-value") == $input.val() ) {
			clearTimeout ( this._timeout );
			return;
		}
		$input.data("old-value", $input.val());

		this._timeout = setTimeout(function() {
			var filter = Core.Forms.serializeToObject( $input.closest("form") );
			view.collection.setParams({
				filter: filter
			});

			if ( _.size(filter) ) {
				view.collection.fetch();
			}else {
				view.collection.reset();
			}
		}, DELAY);
	},

	initialize: function () {

		var params = Core.Url.extractUrlParameters ();

		this.collection.on ( "reset", this.updateUrl, this );

		if ( !_.isEmpty(params) ) {
			this.collection.setParams( params );
			this.collection.fetch();
		}

		if ( this.options.template ) {
			this.on ( "template:loaded", this.ready, this );

			this.loadTemplate( this.options.template );
		}
		else
		{
			this.ready();
		}
	},

	ready: function () {
		var resultObject = {
			requestData: this.collection.getParams() || {}
		};

		this.$el.html ( $(this.options.templateId).tmpl ( resultObject ) );
	},

	render: function () {
		return this
	}
});