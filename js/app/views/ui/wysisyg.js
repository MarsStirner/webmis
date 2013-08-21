/**
 * User: FKurilov
 * Date: 21.08.13
 */
define(function (require) {
	var template = require("text!templates/ui/wysisyg.html");
	var $el = $(template);

	function applyFormat (e) {
		e.preventDefault();

		switch($(this).data('role')) {
			case 'h1':
			case 'h2':
			case 'p':
				document.execCommand('formatBlock', false, $(this).data('role'));
				break;
			default:
				document.execCommand($(this).data('role'), false, null);
				break;
		}
	}

	$("a", $el).css({"text-decoration":"none", "padding": ".3em", "font-size": "1.2em"}).on("click", applyFormat);

	return {
		showAt: function (field) {
			$el.detach().prependTo($(field));
		},
		hide: function () {
			$el.detach();
		}
	};
});