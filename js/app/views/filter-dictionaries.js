define(["views/filter"], function () {
	App.Views.FilterDictionaries = App.Views.Filter.extend ({
		ready: function () {
			App.Views.Filter.prototype.ready.call(this);

			if ( this.options.dictionaries ) {
				_.each( this.options.dictionaries, this.loadDictionary, this );
			}
		},

		loadDictionary: function ( dictionary ) {
			dictionary.collection.on( "reset", this.renderDictionary, dictionary );
			dictionary.collection.fetch();
		},

		renderDictionary: function () {
			var dictionary = this,
				element = $( "#" + dictionary.elementId );

			if ( !dictionary.collection.isEmpty() ) {
				dictionary.collection.each( function (m) {
					$( "<option/>" )
						.attr("value", dictionary.getValue(m))
						.text( dictionary.getText(m) )
						.appendTo( element );
				} );

				element.data( "styled-select", false );
				$( "div.DDList", element.parent() ).remove();
				UIInitialize( element.parent() );
			}
		}
	});
});
