/***
 * Нотификация
 * http://needim.github.com/noty/
 * pubsub.trigger('noty', {text:'текст сообщения',type:'alert'});
 * pubsub.trigger('noty', {text:'текст сообщения',type:'error'});
 *
 */
	define([], function () {

	var FlashMessage = Backbone.View.extend({
		initialize: function() {
			pubsub.bind('noty', this.showMessage);
			this.render();

		},

		render: function(){
			var noty = $('<div id="noty" >').css({
				'position':'fixed',
				'width':300,
				'z-index':10500,
				'right': 0,
				'top': 0
			});

			$('body').append(noty);

		},
		/***
		 *
		 * @param {object} options
		 * @param {string} options.text - текст
		 * @param {string} options.type - alert,success,error,warning,information,confirmation
		 */
		showMessage: function(options){

			var default_options = {
				text: '',
				type: 'success',
				dismissQueue: true,
				force: true,
				theme: 'defaultTheme',
				modal: false,
				closeWith: ['click'] // ['click', 'button', 'hover']
			};

			var noty_optyons = _.extend(default_options, options );

			$('#noty').noty(noty_optyons);

		}

	});


	return FlashMessage;

});
