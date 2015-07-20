var UI = UI || {};

UI.CustomSelect = function ( $select ){
	var $title, $span, $ul, $content, $input;

	function _render () {
		$title = $("<div/>", { "class": "Title" });
		$span = $("<span/>", { "class": "Actions" });
		$ul = $("<ul/>");
		$content = $("<div/>", { "class": "Content" });

		if ( $select.hasClass("ComboBox") ) {
			$input = $("<input/>", { type: "text", name: $select.attr("name")+"-input", class: "ComboBoxInput" });

			$span.html($input);
		}

		// Составляем список из опшнов селекта
		$select.find ( "option" ).each ( function ()
		{
			var $option = $(this);
			var $li = $("<li/>").html ( $option.html ()).addClass($option.attr("class"));

			// События, вызываемые при выборе элемента списка
			$li.click ( function (){
				$option.prop ( "selected", true ).change().siblings().prop( "selected", false );
				$li.addClass ( "Selected" ).siblings ().removeClass ( "Selected" );

				_setValue($option.html ());
				$select.focus(); // возвращаем фокус селекту
			});

			// Начальная установка выбранного элемента
			if ( $option.prop ( "selected" ) ) {
				$li.addClass ( "Selected" );
			}

			$ul.append ( $li );
		});

		$select.change(function(){
			$select.find ( "option" ).each ( function () {
				var $option = $(this);

				if ( $option.attr ( "selected" ) ) {
					$ul.find("li").eq($option.index()).addClass ( "Selected" ).siblings().removeClass("Selected");
					_setValue ( $option.html () );
				}
			});
		} ).focus(function () {
			$styled.addClass("Focused");
		} ).blur(function (){
			$styled.removeClass("Focused");
		});

		// Особые условия для комбобокса
		if ( $input ) {
			$input.focus(function () {
				$styled.addClass("Focused");
			} ).blur(function (){
				$styled.removeClass("Focused");
			});

			// Правильно расставляем фокусы
			$select.keydown(function(){
				$select.blur();
				$input.focus();
			});

			// Выберем пункт меню, если такой же забили в инпут ручками
			$input.keyup(function(event){
				var value = $input.val();

				$select.find( "option" ).each(function(){
					var $option = $(this);

					if ( jQuery.trim($option.text() ).toLowerCase() == value.toLowerCase() ) {
						$option.prop("selected", true ).siblings().prop( "selected", false );
					}
				});
			});


			// Поведение инпута выбора времени
			if ( $select.hasClass("HourPicker") ) {
				$input.timePicker({
					select: $select
				});
			}
		}
		_setValue( $select.data("string-value") || $ul.find(".Selected").html () );

		var $styled = $("<div/>", { "class": "DDList DDSelect" }).append (
				$title.append ( $span )
		).append (
				$content.append ( $ul )
		);

		$styled.insertAfter ( $select );

		// Инициализация кастомного селекта
		if ( $select.prop ( "disabled" ) ) {
			$styled.addClass ( "Disabled" );
			if ( $input ) {
				$input.prop("disabled", true);
			}
		}

		if ( $select.hasClass ( "Mandatory" ) ) {
			$styled.addClass ( "Mandatory" );
		}

		$select.css ({
			opacity: 0,
			width: 0,
			height: 0,
			position: "absolute"
		});
	}

	function _initialize () {
		// Предотвращаем повторное навешивание событий
		if ( $select.data( "styled-select" ) ) {
			return false
		}
		$select.data ( "styled-select", true );

		_render();
	}

	function _setValue( value ) {
		if ( $select.hasClass("ComboBox") ) {
			$input.val(value);

			return;
		}
		$span.html(value);
	}

	_initialize();
};

/*(function ($) {
	$.fn.WMSelect = function () {
		var $this = this;

		// Get wrapper elements (create if rendering for the first time)
		//--------------------------------------------------------------
		var $wrapper = this.next().is(".DDList.DDSelect") ?
			this.next() :
			$('<div class="DDList DDSelect"/>').insertAfter(this);

		var $title   = $wrapper.find(".Title")[0]   || $('<div class="Title"/>').appendTo($wrapper);
		var $span    = $title.find(".Actions")[0]   || $('<span class="Actions"/>').appendTo($title);
		var $content = $wrapper.find(".Content")[0] || $('<div class="Content"/>').appendTo($wrapper);
		var $ul      = $content.find('ul')[0]       || $('<ul/>').appendTo($content);
		//--------------------------------------------------------------

		console.log(this.find("option"));

		$ul.empty().append(this.find("option").map(function () {
			return $("<li/>")
				.html($(this).html() || "...")
				.attr("data-value", $(this).val())
				.addClass($(this).attr("class"));
		}).get());

		$span.html(this.val() || "...");

		$wrapper.on("click", function () {
			console.log("asd");
			$(this).toggleClass("Active");
		});

		*//*$ul.find("li").on("click", function () {
			$this.val($(this).data("value")).change().focus();

			$("li", $ul).removeClass("Selected");
			$(this).addClass("Selected");
		});*//*

		return this.hide();

		*//*this.find("option").each(function () {
			var $option = $(this);
			var $li = $("<li/>").html($option.html()).addClass($option.attr("class"));

			// События, вызываемые при выборе элемента списка
			$li.click (function () {
				$option.prop ( "selected", true ).change().siblings().prop( "selected", false );
				$li.addClass ( "Selected" ).siblings ().removeClass ( "Selected" );

				_setValue($option.html ());
				$select.focus(); // возвращаем фокус селекту
			});

			// Начальная установка выбранного элемента
			if ( $option.prop ( "selected" ) ) {
				$li.addClass ( "Selected" );
			}

			$ul.append ( $li );
		});*//*
	};
})(jQuery);*/




function UIInitialize (context) {
	/*$(".btn").each(function () {
		if ($(this).hasClass("btn-add")) {
			$(this).button({icons: {primary: "icon-plus icon-color-green"}});
		} else if ($(this).hasClass("btn-print")) {
			$(this).button({icons: {primary: "icon-print"}});
		} else if ($(this).hasClass("btn-filter")) {
			$(this).button({icons: {primary: "icon-filter"}});
		} else {
			$(this).button();
		}
	});*/

	/*var $buttons = $(".btn").button();

	$(".btn-add", $buttons).button("option", "icons", {primary: "icon-plus icon-color-green"});
	$(".btn-print", $buttons).button("option", "icons", {primary: "icon-print"});
	$(".btn-filter", $buttons).button("option", "icons", {primary: "icon-filter"});*/

	$(".date-icon").on("click", function () {
		$(this).prev().datepicker("show");
	});

	$("input.Clearable").on("keyup", function() {
		if ($(this).val().length > 0) {
			$(this).parent().find(".ClearButton").fadeIn(300).css("display","inline-block");
		} else {
			$(this).parent().find(".ClearButton").fadeOut(300);
		}
	});

	$(".ClearButton").on("click", function () {
		$(this).parent().find("input.Clearable").val('').change();
		$(this).fadeOut(300);
	});

	$("select.Styled", context).each(function () {
		//new UI.CustomSelect($(this));
		$(this).width("100%").addClass("select2").select2({minimumResultsForSearch: 6,allowClear: true});
	});

	$(".Combo", context).each(function () {
		var $comboInput = $(this).wrap('<div class="DDList DDSelect ComboWrapper"><div class="Title"><span class="Actions"></span></div></div>');
		var $wrapper = $comboInput.parents(".DDList").append('<div class="Content"><ul></ul></div>');

		if ($comboInput.hasClass("Mandatory")) $wrapper.addClass("Mandatory");

		$wrapper.find("ul").append($comboInput.data("options").split("|").map(function (opt) {
			return $('<li>' + opt + '</li>');
		}));

		$wrapper.on("click", function (event) {
			event.stopPropagation();
			$(".DDList.Active").not ($wrapper).removeClass ( "Active" );
			$(this).toggleClass("Active");
		});

		$wrapper.find("li").on("click", function () {
			$comboInput.val($(this).html()).change();
		});

		$comboInput.on("keyup", function () {
			$wrapper.removeClass("Active");
		});
	});


	$(".DDList:not(.ComboWrapper)", context).each(function () {
		var $title = $(this).children (".Title");

		if ( $title.data ( "show-dd-list" ) )
		{
			return true
		}
		$title.data ( "show-dd-list", true );

		$title.on ("click keydown", function ( event )
		{
			if ( !$title.find(":input" ).length ) {
				event.preventDefault();
			}

			event.stopPropagation ();
			if ( event.keyCode && event.keyCode != 13 ) {
				return true
			}

			var $this = $(this),
				$ddList = $this.closest(".DDList");

			$(".DDList.Active").not ( $ddList ).removeClass ( "Active" );

			$ddList.toggleClass( "Active" );
			$this.siblings( ".Content" ).css ({
				top: $this.height ()
			});
		});
	});

	/*
	*	ShowMore
	 */
	$(".Actions.ShowMore", context).each ( function (){
		var $this = $(this);

		// Предотвращаем повторное навешивание событий
		if ( $this.data ( "show-more" ) ) {
			return false
		}
		$this.data ( "show-more", true );

		$this.click(function()
		{
			var $this = $(this);
			$this.toggleClass("Open");

			var relation = $this.attr("rel");
			if ( relation.length )
			{
				$(relation).find(".More").toggle();

				return false
			}

			$this.findNear(".More:first").toggle();

			return false;
		});
	});

	$(".SelectDate", context ).each(function(){
		var $this = $(this);

		if ( $this.data ( "datepicker" ) )
		{
			return true
		}
		$this.data ( "datepicker", true );


		$this.datepicker( {
			inline: true,
			changeYear: true,
			changeMonth: true,
			maxDate: $this.data("maxdate"),
			minDate: $this.data("mindate"),
			yearRange:  $this.data("yearrange")
		} );

		$this.mask("99.99.9999");

		$this.focus(function () {
			$this.closest(".DatePeriod" ).addClass("Focused");
		} ).blur(function() {
			$this.closest(".DatePeriod" ).removeClass("Focused");
		});

		$this.closest(".FromTo" ).siblings(".DateIcon" ).click(function () {
			if ( $this.is(":disabled") ) {
				return false;
			}
			$("#ui-datepicker-div" ).stop(true, true);
			$this.focus();
		} );
		$this.keydown(function (event) {
			if ( event.keyCode == 40 ) { // DOWN
				$this.datepicker("show");
			}
			if ( event.keyCode == 38 ) { // UP
				$this.datepicker("hide");
			}
		} );

		$this.attr("autocomplete","off");

		var $relation = $($this.data("relation"));

		if ( $relation ) {
			$relation.timePicker();
		}
	});

	$(".Button.Disabled, [disabled]", context ).click(function(event){
		event.preventDefault();
		event.stopPropagation();
		return false
	});

	$('.HasToolTip', context).each(function() {
		var tip = $($(this).data("tooltip-content"));
		var dx = -tip.width()/2 - 35,
			dy = 15;
		tip.css('position', 'absolute');
		tip.hide();

		function position(e) {
			tip.css('left', e.pageX + dx + 'px').css('top', e.pageY + dy + 'px');
		}
		$(this).mousemove(position);

		$(this).hover(function(e) {
			position(e);
			tip.show();
		}, function(e) {
			tip.hide();
		});
	});

	$(".RichText", context).each(function () {
		var $input = $(this).hide();
		var $richtextWrapper = $('<div class="RichTextWrapper"><div contenteditable="true" class="RichText"><br></div></div>');
		var $richtext = $richtextWrapper.find(".RichText");

		if ($input.hasClass("Resizable")) $richtextWrapper.resizable({maxWidth: "100%"});
		if ($input.hasClass("Mandatory")) $richtextWrapper.addClass("Mandatory");
		if ($input.is("textarea")) {
			$richtextWrapper.css({"min-height": "9.6em"});
			$richtext.css({"min-height": "8em"});
		}

		$richtext.html($input.val() || "<br>");

		$richtext.on("input", function () {
			$input.val((($(this).html() === "<br>" || $(this).html() === "<br/>") ? "" : $(this).html().replace("<br>", ""))).change();
		});

		$input.on("change", function () {
			if ($richtext.html().replace("<br>", "") !== $input.val())
				$richtext.html($input.val() || "<br>");
		});

		$(this).before($richtextWrapper);
	});

	$("body .ToolTip").hide();
}


$.fn.timePicker = function (options) {
	return this.each(function(){
		var $input = $(this);

		$input.keydown(function(event){
			var position = Core.getCaretPosition(this);

			var numbers = Core.execAll(/(\d)/g, $input.val())[0];
			var character = String.fromCharCode( event.keyCode );

			if ( /\d|:/i.test(character) ) {
				var numbersArray = numbers.split("");

				var newPosition = position;
				if ( /:/i.test($input.val()) && position > 2 ) {
					newPosition--;
				}

				numbersArray[newPosition] = character;

				$input.val((numbersArray[0] || "0") + (numbersArray[1] || "0") + ":" + (numbersArray[2] || "0") + (numbersArray[3] || "0"));

				if ( position == 2 ) {
					position ++;
				}
				Core.setCaretPosition(this, position+1);

				if ( options && options.select ) {
					options.select.trigger("_update");
				}

				return false
			}
		});
	})
}


$(document).ready(function(){
	UIInitialize(document.body);

	$(".Grid .SortCol").click(function () {
		$(".Grid th").removeClass("Active");
		$(this).parent("th").addClass("Active");
		$(this).parent("th").toggleClass("Desc");
	});

	/*TABS*/
	$(".Tabs li").click(function () {
		$(".Tabs li").removeClass("Active");
		$(this).addClass("Active");
	});



	/*
	// Перенаправляем все внутренние ссылки на контроллер
	$("a[href]").live ( "click",  function ()
	{
		var $this = $(this);

		var path = $this.prop ( "pathname" );

		// Нас интересуют только внутренние ссылки
		if ( path && path.indexOf ("//") < 0 ) {
			window.appRouter.navigate ( path, true );
		}
		return false
	});

	UIInitialize();
	*/

	$(document).click (function ()
	{
		$(".DDList.Active").removeClass ( "Active" );
	});






	$(".ShowHidePopup").click(function () {
		$("#popup-overlay").toggle();
		$(".popup").toggle();
		//$("body").toggleClass("NoScroll");
	});

	$(".ToolTipHolder").click(function () {
		$(".ToolTipHolder").not($(this)).removeClass("Active");
		$(this).toggleClass("Active");
	});




/*
	$(".DrugList td.Active").click(function () {
		$(this).toggleClass("Selected");
		$(".DrugList td.Active").not(this).removeClass("Selected");
	});
*/
/*Смена цветовой схемы*/

	$(".ChangeTheme").click(function () {
			$("html").toggleClass("VarColor");
	});

/*Тезаурус*/

	$(".TezList a").click(function () {
		$(this).toggleClass("Selected");
	});

	$(".EventList input").change(function () {
		$(this).parent("label").toggleClass("Selected");
	});

	UI.ErrorTooltip = View.extend({
		className: "ToolTip",

		template: "<p class='Error'></p>",

		initialize: function (options) {

		},

		showAt: function (el) {
			var $target = $(el);
			this.setPosition($target);
			this.$(".Error").text($target.data("tooltip-text") || "Введены неверные данные");
			this.$el.fadeIn("fast");
		},

		hide: function () {
			this.$el.hide();
		},

		setPosition: function ($target) {
			if ($target.is("select"))
				$target = $target.next();

			var $tip = this.$el;
			var pos = $target.data("tooltip-position") || "right";
			var p = $target.offset();
			var x, y;

			//console.log($target.offset(), $target.width(), $target.height());

			$tip.removeClass("LeftTail BottomTail RightTail TopTail");

			if (pos === "right") {
				$tip.addClass("LeftTail");
				x = p.left + $target.outerWidth(true) + 10;
				y = p.top - $target.height()/2;
			} else if (pos === "top") {
				x = p.left - ($target.outerWidth(true) + ($target.outerWidth(true) - $tip.outerWidth(true)))/2;
				y = p.top - $target.outerHeight(true) - $tip.outerHeight(true);
				$tip.addClass("BottomTail");
			} else if (pos === "left") {
				$tip.addClass("RightTail");
				x = p.left - $target.outerWidth(true) - ($tip.outerWidth(true) - $target.outerWidth(true)) -10;
				y = p.top - $target.height()/2;
			} else if (pos === "bottom") {
				$tip.addClass("TopTail");
				x = p.left - ($target.outerWidth(true) + ($target.outerWidth(true) - $tip.outerWidth(true)))/2;
				y = p.top + $target.outerHeight(true) + 10;
			}

			$tip.css('position', 'absolute').css('z-index', '999').css('left', x + 'px').css('top', y + 'px');

			return $tip;
		},

		render: function () {
			this.$el.html(this.template);

			return this;
		}
	});


/*Календарь*/
	// Datepicker



	/*
	$(".BedList input").change(function () {
		$(this).parent("label").parent("li").toggleClass("Selected");
	});
	*/
});

jQuery.ajaxSetup (
{
	complete: function ()
	{
		setTimeout (UIInitialize, 5000);
	}
});

// Глобальные константы
var GUI_VERSION = "1.4.8";
var CORE_VERSION;

DEBUG_MODE = true;

ROLES = {
	DEFAULT: "default",
	NURSE_RECEPTIONIST: "admNurse",
	DOCTOR_RECEPTIONIST: "admDoctor",
	NURSE_DEPARTMENT: "strNurse",
	DOCTOR_DEPARTMENT: "strDoctor",
	DOCTOR_ANESTEZIOLOG: "anestezDoctor",
	CHIEF: "chief"
};

DEFAULT_ANIMATION_TIME = 300;
//DATA_PATH = "http://10.1.2.106:8080/tmis-ws-medipad/rest/tms-registry/";
DATA_PATH = "/data/";

CORE_HOST = "10.128.225.202:8080";
POLICLINIC_HOST = "10.128.225.200:5555";
APPOINTMENTS_PATH = "http://" + POLICLINIC_HOST + "/schedule/appointment/";
ANAREPORTS_PATH = "http://" + POLICLINIC_HOST + "/anareports/";

// Временная зона по умолчанию
moment.tz.setDefault("Europe/Moscow");

App = {};
App.Models = {};
App.Dynamic = {};
App.Collections = {};
App.Views = {};

//глобальный pub sub
pubsub = _.extend({}, Backbone.Events);


// Загруженная информация
Data = {};
Cache = {};

// use models/mode-base.js instead
Model = Backbone.RelationalModel.extend({
	idAttribute: "_id",

	connect: function (key, $inputs, context) {
		var model = this;

		if (typeof $inputs == "string") {
			$inputs = $(":input[name='" + $inputs + "']", context);
		}

		checkForWarnings($inputs.length ? 1 : null, $inputs.selector + " was not found" + (context ? " in " + context.toArray() : ""));

		function setValue ($input) {
			if (model.clean) {
				model.clean();
			}

			// Вносим изменения для даты
			if ($input.is(".SelectDate")) {
				// Если помимо даты есть ещё и время
				var relation = $input.data("relation");
				if (relation) {
					var $relation = $(relation, context);

					var value = $relation.val();
					if (Core.Date.toInt($input.val() + " " + value) == parseInt(model.get(key), 10)) {
						return false;
					}
				} else {
					if (Core.Date.toInt($input.val()) == parseInt(model.get(key), 10)) {
						return false;
					}
				}
				$input.val(model.get(key) ? Core.Date.format(model.get(key)) : "");

				return true;
			}

			// Если время
			if ($input.is(".HourPicker") && model.get(key)) {
				var DateTime = new Date(model.get(key));
				var formattedTime = Core.Date.zeroFirst(DateTime.getHours()) + ":" + Core.Date.zeroFirst(DateTime.getMinutes());

				if (formattedTime != $input.val()) {
					$input.val(formattedTime);
				}

				return true;
			}

			if ($input.is(":radio")) {
				var $radio = $inputs.filter(":radio");

				if (!model.isNew()) {
					$radio.removeAttr("checked").each(function () {
						var $this = $(this);

						if ($this.val() == model.get(key)) {
							$this.attr("checked", "checked");
							$this.change();
						}
					});
				}

				return true;
			}

			/*if ($input.is("select")) {
			 var founded = false;

			 $input.find("option").each(function () {
			 var $option = $(this);

			 if ($option.val() == model.get(key)) {
			 $option
			 .attr ("selected", "selected")
			 .change()
			 .siblings()
			 .removeAttr("selected");
			 $input.change();

			 founded = true;

			 return false;
			 }
			 });
			 if (!founded) {
			 $input.find("option").eq(0).attr("selected", "selected").change().siblings().removeAttr ("selected");
			 $input.change();
			 }

			 return true;
			 }*/

			if ($input.is(":checkbox")) {
				$input.prop("checked", !!model.get(key));
			}

			if ($input.val() === model.get(key)) {
				return false;
			}

			$input.val(model.get(key)).change();

			return true;
		}

		$inputs.each(function () {
			var $input = $(this);

			$input.data("connect:disconnected", false);

			if ($input.data("connect:model") == model && $input.data("connect:key") == key) {
				return true
			}

			$input.data("connect:model", model);
			$input.data("connect:key", key);

			var relation = $input.data("relation");
			if (relation) {
				var $relation = $(relation, context);
			}

			$input.on("change keyup click _update", function (event) {
				// Это проще, чем удалять и навешивать события каждый раз
				if ($input.data("connect:disconnected")) {
					return;
				}

				var object = {};

				if ($input.is(".SelectDate")) {
					if (relation) {
						var value = $relation.val();

						object[key] = Core.Date.toInt($input.val() + " " + value) || "";
					} else {
						object[key] = Core.Date.toInt($input.val()) || "";
					}
				} else if ($input.is(".HourPicker")) {

					if (relation) {
						// Если модель (а соответственно и поле) пустые — выставляем текущую дату
						if (!model.get(key)) {
							var currentDate = new Date();
							$relation.val(Core.Date.format(currentDate.getTime()));
						}

						$relation.trigger("_update");
					}

					return;
				} else if ($input.is(":checkbox")) {
					object[key] = !!$input.prop("checked");
				} else {
					object[key] = $input.val();
				}

				if (!_.isEmpty(object)) {
					model.set(object);
				}
			});


			model.on("change", function () {
				if ($input.data("connect:disconnected")) {
					return;
				}

				setValue($input);
			});
			setValue($input);
		});
	},

	// Отключение привязки. Не удаляет сами обработчики, но выключает реакцию в них.
	disconnect: function (model, key, $inputs, context) {
		if (typeof $inputs == "string") {
			$inputs = $(":input[name='" + $inputs + "']", context);
		}
		$inputs.each(function () {
			var $input = $(this);

			$input.data("connect:disconnected", true);
		});
	},


	parse: function (data) {
		if (data.requestData && data.requestData.coreVersion) {
			CORE_VERSION = data.requestData.coreVersion;
			VersionInfo.show();
		}
		return data.data ? data.data : data
	},

	fetch: function (options) {
		options = options || {};
		var self = this;

		return Backbone.Model.prototype.fetch.call(self, options);
	},

	// Переопределяем стандартный метод, чтобы JSON не содержал ссылок на другие модели, а парсил вообще всё.
	toJSON: function () {
		return JSON.parse(JSON.stringify(_.clone(this.attributes)))
	},

	sync: function (method, model, options) {
		options.dataType = "jsonp";
		options.url = model.url();
		options.contentType = 'application/json';

		if (method == "create" || method == "update") {
			options.data = JSON.stringify({
				requestData: {},
				data: model.toJSON()
			});
		}
		return Backbone.sync(method, model, options);
	},
	errorHandler: function (model, xhr) {
		if (xhr.responseText && xhr.responseText.length) {
			try {
				var json = JSON.parse(xhr.responseText);

				if (json.errorCode == 3) {
					Core.Cookies.clear();
					window.location.href = "/auth/";
					return;
				} else if (json.errorCode == 261) {
					json.errorMessage += ", обновите страницу."
				}

				if (json && json.errorMessage) {

					showError(json.errorMessage);
					return true;
				}
			} catch (e) {
			}

			showError(xhr.responseText);
		}
	},
	initialize: function () {
		this.on("error", this.errorHandler, this);
	}
});

Collection = Backbone.Collection.extend({
	initialize: function () {
		this._params = {
			filter: {},
			sortingField: "id",
			sortingMethod: "asc",
			limit: 10,
			page: 1,
			recordsCount: 0
		};
	},

	sync: function (method, model, options) {
		options.dataType = options.dataType ? options.dataType : "jsonp";

		return Backbone.sync(method, model, options);
	},

	getParams: function () {
		return this._params
	},
	setParams: function (obj) {
		this._params = $.extend(this._params, obj);

		return this._params
	},


	parse: function (data) {
		checkForWarnings(data.requestData, "requestData was not found in the JSON");
		this.requestData = data.requestData || {};
		this.requestData.filter = this.requestData.filter || {};

		if (data.requestData && this.requestData.coreVersion) {
			CORE_VERSION = data.requestData.coreVersion;
			VersionInfo.show();
		}

		return data.data
	},

	fetch: function (options) {
		options = options || {};

		this.trigger("fetch", this);

		var data = $.extend(this.getParams(), options.data);

		var errorHandler = $.extend(function (model, xhr) {
			// TODO Отрабатывать ошибки
			if (xhr && xhr.responseText && xhr.responseText.length) {
				var json;
				try {
					json = JSON.parse(xhr.responseText);
				} catch (e) {

				}
				if (json && json.errorCode == 3) {
					Core.Cookies.clear();
					window.location.href = "/auth/";
					return;
				}
				showError(xhr.responseText);
			}
		}, options.error);


		return Backbone.Collection.prototype.fetch.call(this, $.extend(options, {
			data: data,
			error: errorHandler
		}));
	}
});

Backbone.View.prototype.assign = function (selector, view) {
	var selectors;
	if (_.isObject(selector)) {
		selectors = selector;
	}
	else {
		selectors = {};
		selectors[selector] = view;
	}
	if (!selectors) return;
	_.each(selectors, function (view, selector) {
		if(view){
			view.setElement(this.$(selector)).render();
		}
	}, this);
};

View = Backbone.View.extend({
	collectionLoaded: function () {
	},
	modelLoaded: function () {
	},
	templateLoaded: function () {
	},

	_dataLoaded: function () {
		this._loadingQueue--;
		if (this.collection) {
			this.collection.off("reset", this._dataLoaded);
			this.collectionLoaded();
		} else if (this.model) {
			this.off("model:loaded", this._dataLoaded);
			this.modelLoaded();
		}


		if (this._loadingQueue < 1) {
			this.ready();
		}
	},
	_templateLoaded: function () {
		this._loadingQueue--;
		this.off("template:loaded", this._templateLoaded);
		this.templateLoaded();

		if (this._loadingQueue < 1) {
			this.ready();
		}
	},
	// Дожид��емся загрузки и шаблона и коллекции
	autoLoadHandler: function () {
		this._loadingQueue = 1;
		if (this.collection) {
			this._loadingQueue = 2;
			this.collection.on("reset", this._dataLoaded, this);
		} else if (this.model) {
			this._loadingQueue = 2;
			this.on("model:loaded", this._dataLoaded, this);
		}

		this.on("template:loaded", this._templateLoaded, this);
	},
	queue: function (queue, callback, context) {
		var queueLength = queue.length;
		var loaded = 0;

		for (var i = 0; i < queueLength; i++) {
			queue[i].context.on(queue[i].event, function handler () {
				loaded++;

				if (loaded >= queueLength) {
					this.context.off(this.event, handler);
					callback.call(context);
				}
			}, queue[i]);
		}
	},

	loadTemplate: function (templateName) {
		var $body = $(document.body),
			view = this;

		Core.Templates.load(templateName, function (template) {
			view.trigger("template:loaded", template);
		});
	},
	init: function () {

	},
	separateRoles: function (role, callback, scope) {
		var userInRole = false;

		if (role instanceof Array) {
			userInRole = role.indexOf(Core.Data.currentRole()) !== -1;
		} else {
			userInRole = Core.Data.currentRole() === role;
		}

		if (userInRole || role == Core.Data.DEFAULT) {
			scope ? callback.call(scope) : callback();
		}
	},
	depended: function (view) {
		if (!this._dependedViews) {
			this._dependedViews = [];
		}
		this._dependedViews.push(view);
	},
	destroy: function () {
		this.undelegateEvents();
		this.$el.remove();
		this.clear();

		delete this
	},
	clearAll: function () {
		_(Data).each(function (view) {
			view.destroy();
		});
		Data = {};
	},
	clear: function () {

		_(this._dependedViews).each(function (view) {
			view.destroy();
		});
		this._dependedViews = [];

	},
	render: function () {
		return this
	},
	assign: function (selector, view) {
		var selectors;
		if (_.isObject(selector)) {
			selectors = selector;
		}
		else {
			selectors = {};
			selectors[selector] = view;
		}
		if (!selectors) return;
		_.each(selectors, function (view, selector) {
			view.setElement(this.$(selector)).render();
		}, this);
	},
	initWithDictionaries: function (dicts, callback, scope, returnAsJSON) {
		if (!dicts || !dicts.length) callback.call(scope);

		var promises = [];
		var dictionaries = {};

		_(dicts).each(function (dict) {
			var dictionary;

			if (dict.fd) {
				dictionary = new App.Models.FlatDirectory().set("id", dict.id);
			} else if (dict.thesaurus) {
				dictionary = new App.Collections.ThesaurusTerms();
				dictionary.parentGroupId = dict.id;
			} else if (dict.collection) {
				dictionary = new dict.collection({data: {limit: 0}});
			} else {
				dictionary = new App.Collections.DictionaryValues([], {name: dict.pathPart});
			}

			if (dict.collection) {
				promises.push(dictionary.fetch({data: {limit: 0}}));
			} else {
				promises.push(dictionary.fetch());
			}
			dictionaries[dict.name] = dictionary;
		});

		$.when.apply($, promises).done(function () {
			if (returnAsJSON) {
				/*dictionaries = _(dictionaries).map(function (d) {
				 return d.toBeautyJSON ? d.toBeautyJSON() : d.toJSON();
				 });*/

				_(dictionaries).each(function (d, key) {
					dictionaries[key] = d.toBeautyJSON ? d.toBeautyJSON() : d.toJSON();
				});
			}

			callback.call(scope, dictionaries);
		});
	}
});

Form = View.extend({
	cancel: function (event) {
		event.preventDefault();
		App.Router.navigate(this.options.referrer, {trigger: true});
	},

	save: function (event, options) {
		if (event) event.preventDefault();

		var readyToSave = this.validate();

		if (readyToSave) {
			this.model.save(options);
		}

		return readyToSave;
	},

	validate: function () {
		var validity = true,
			$firstFoundedError;

		this.$(".Mandatory:not(select,.ComboWrapper)").each(function () {
			var $this = $(this);

			if ($this.hasClass("Combo")) {
				$this.closest(".ComboWrapper").removeClass("WrongField");
			} else {
				$this.removeClass("WrongField");
			}

			var $input;
			if ($this.is(":input"))
				$input = $this;
			else if ($this.hasClass("DDSelect"))
				$input = $this.prev();
			else if ($this.hasClass("select2") || $this.hasClass("RichTextWrapper"))
				$input = $this.next();
			else
				$input = $this.find(":input").eq(0);
			if (!$input.val() || !$input.val().length || $input.hasClass("invalid")) {
				if ($this.hasClass("Combo")) {
					$this.closest(".ComboWrapper").addClass("WrongField");
				} else {
					$this.addClass("WrongField");
				}

				$firstFoundedError = $firstFoundedError || $this;
				if ($firstFoundedError.hasClass("DDSelect"))
					$firstFoundedError = $firstFoundedError.prev();
				else if ($firstFoundedError.hasClass("select2"))
					$firstFoundedError = $firstFoundedError.prev();
				validity = false;
			}
		});

		/*this.$("select.Mandatory").removeClass("WrongField").each(function () {
		 if (!$(this).val()) {
		 $(this).addClass("WrongField");
		 $firstFoundedError = $firstFoundedError || $(this);
		 validity = false;
		 }
		 });*/

		this.$("[data-validate-size]").removeClass("WrongField").each(function () {
			if (parseFloat($(this).val()) > parseFloat($(this).data("maxsize")) || parseFloat($(this).val()) < parseFloat($(this).data("minsize"))) {
				$(this).addClass("WrongField");
				$firstFoundedError = $firstFoundedError || $(this);
				validity = false;
			}
		});

		if ($firstFoundedError) {
			//$firstFoundedError.focus();
			$('html, body').animate({ scrollTop: $($firstFoundedError).offset().top - 30 }, 'fast');
		}

		return validity
	}
});

// НЕ ДУМАЙ ПРО СОХРАНЕНИЕ!
DynamicView = View.extend({
	renderStructure: function (structure) {
		var view = this;

		_.each(structure.group, function (block) {
			var Block = new DynamicViewBlock({
				structure: block
			});

			view.$el.append(Block.render().el);
		});
	},
	initialize: function () {
		this.loadStructure();
		this.on("structure:loaded", this.renderStructure, this);
	},


	loadStructure: function () {
		var view = this;

		$.ajax({
			url: this.url(),
			dataType: "jsonp",
			success: function (json) {
				var data = json.data;

				view.trigger("structure:loaded", data);
			}

		});
	}
});
DynamicViewBlock = View.extend({
	render: function () {
		var view = this;

		_.each(this.options.structure.attribute, function (attribute) {
			var Item = new DynamicViewBlockItem({
				structure: attribute
			});

			view.$el.append(Item.render().el);
		});
		return this
	}
});
DynamicViewBlockItem = View.extend({
	render: function () {
		var view = this;

		view.$el.html("<b>" + this.options.structure.name + "</b>: ");

		_.each(this.options.structure.properties, function (property) {
			if (property.name == "value") {
				view.$el.append(property.value);
			}
		});

		return this
	}
});

//
//	Ошибки и предупреждения
//
function showError (message) {
	var $message = $("<div/>");
	var $iframe = $("<iframe/>").css({
		width: "100%",
		height: "100%"
	}).appendTo($message);

	setTimeout(function () {
		var doc = $iframe.get(0).contentWindow.document;
		doc.write(message);
	}, 1);

	$message.dialog({
		title: "Ошибка!",
		width: 400,
		modal: true
	});
}

function checkForErrors (variables, errorText) {
	if (variables instanceof Array) {
		for (var i = 0; i < variables.length; i++) {

			var variable = variables [i];
			if (variable == undefined || variable == null) {
				throw new Error(errorText);
			}
		}
	}
	else {
		if (variables == undefined || variables == null) {
			throw new Error(errorText);
		}
	}
}
function checkForWarnings (variables, warningText) {
	if (variables instanceof Array) {
		for (var i = 0; i < variables.length; i++) {

			var variable = variables [i];
			if (variable == undefined || variable == null) {
				console.warn(warningText);
			}
		}
	}
	else {
		if (variables == undefined || variables == null) {
			console.warn(warningText);
		}
	}
}


//
//  Расширение тегов jQuery templates
//
$.extend($.tmpl.tag, {
	"phone": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Numbers.makePhone($.encode($1a)));}"
	},
	"formatDate": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Date.format($.encode($1a)));}"
	},
	"formatDateTime": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Date.formatDateTime($.encode($1a)));}"
	},
	"countDays": {
		open: "if($notnull_1){__.push(Core.Date.countDays($.encode($1a)));}"
	},
	"getYear": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Date.getYear($.encode($1a)));}"
	},
	"age": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Date.getAge($.encode($1a)));}"
	},
	"ageString": {
		_default: { $1: "$data" },
		open: "if($notnull_1){__.push(Core.Date.getAgeString($.encode($1a)));}"
	},
	"decorate": {
		open: "if($notnull_1){__.push(Core.Strings.decorate($2));}"
	},
	"plural": {
		open: "if($notnull_1){__.push(Core.Language.plural($2));}"
	}
});


function showThrobber () {
	var $throbber = $('.Throbber');
	$throbber = $throbber.length ? $throbber : $('<div class="Throbber">Загружается</div>').appendTo('body');
	$throbber.fadeIn();
	document.addEventListener("click", disableClickOnLoad,true);
}

function disableClickOnLoad(e){
    e.stopPropagation();
    e.preventDefault();
}

function hideThrobber () {
	$(".Throbber").fadeOut();
	document.removeEventListener("click", disableClickOnLoad,true);
}

var throbberHideTimeout, showErrorTimeout, requestQueue = [];

jQuery.ajaxSetup(
	{
		showThrobberTimeout: null,
		beforeSend: function () {
			clearTimeout(throbberHideTimeout);
			clearTimeout(showErrorTimeout);
			this.showThrobberTimeout = setTimeout(showThrobber, 700);
			showErrorTimeout = setTimeout(function () {
				hideThrobber();
				showError("Превышено время ожидания ответа от сервера. Повторите попытку.");
			}, 240000);
			requestQueue.push(1);
		},
		complete: function () {
			requestQueue.pop();
			if (!requestQueue.length) {
				throbberHideTimeout = setTimeout(hideThrobber, 200);
			}
			clearTimeout(showErrorTimeout);
			clearTimeout(this.showThrobberTimeout);

		},
		error: function () {
			requestQueue.pop();
			throbberHideTimeout = setTimeout(hideThrobber, 200);
			clearTimeout(showErrorTimeout);
			clearTimeout(this.showThrobberTimeout);
		}
	});

VersionInfo = {
	_getElement: function () {
		if (!this._element) {
			this._element = $("<div/>").css({
				position: "fixed",
				bottom: 8,
				right: 8,
				padding: 10,
				opacity: "0",
				fontSize: "10px",
				border: "1px solid #81B5C1",
				background: "#DEEDF2"
			});
			$(document.body).append(this._element);

			var toggler = false;

			this._element
				.hover(
				function () {
					$(this).stop(true, true).animate({
						opacity: 1
					}, DEFAULT_ANIMATION_TIME);
				},
				function () {
					if (!toggler) {
						$(this).stop(true, true).animate({
							opacity: "0"
						}, DEFAULT_ANIMATION_TIME);
					}
				})
				.click(function () {
					toggler = !toggler;
				});
		}
		return this._element
	},

	show: function () {
		if (DEBUG_MODE) {
			var html = "Версия GUI: <b>" + GUI_VERSION + "</b>";

			if (CORE_VERSION) {
				html += "<br/>Версия ядра: " + "<b>" + CORE_VERSION + "</b>";
			}
			this._getElement().html(html);
		}
	},
	hide: function () {
		this._getElement().fadeOut(DEFAULT_ANIMATION_TIME);
	}
};

$(function () {
	VersionInfo.show();
});

Core = {
	Cookies: {
		getAll: function () {
			var pairs = document.cookie.split("; "),
				pair,
				cookies = {};

			for (var i = 0; i < pairs.length; i++) {
				pair = pairs[i].split("=");
				cookies[pair[0]] = unescape(pair[1]);
			}
			return cookies;
		},

		clear: function () {
			var cookies = document.cookie.split(";");

			for (var i = 0; i < cookies.length; i++) {
				var cookie = cookies[i];
				var eqPos = cookie.indexOf("=");
				var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
				document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
			}

			return true
		},

		get: function (name) {
			var cookies = this.getAll();
			return cookies[name];
		},

		set: function (name, value, time) {
			var expire = new Date();
			time = time ? time : 360000024;
			expire.setTime(( new Date() ).getTime() + time);
			document.cookie = name + "=" +  escape(value) + ";expires=" + expire.toGMTString() + "; path=/";
		}
	},

	Data: {
		currentRole: function (value) {
			if (value == undefined) {
				return Core.Cookies.get("currentRole");
			} else {
				Core.Cookies.set("currentRole", value);
			}
		}
	},

	Queue: {
		queuesArray: {},

		add: function (queueName, value) {
			var queue = this.queuesArray [ queueName ];

			if (!(queue instanceof Array)) {
				this.queuesArray [ queueName ] = [];
			}
			this.queuesArray [ queueName ].push(value);
		},

		get: function (queueName) {
			return this.queuesArray [ queueName ]
		},

		remove: function (queueName, value) {
			var queue = this.queuesArray [ queueName ];

			for (var i = 0; i < queue.length; i++) {
				if (queue [i] == value) {
					queue.splice(i, 1);
					break;
				}
			}
		}
	},

	Templates: {
		loadedArray: [],

		/**
		 * Проверка, загружен ли вызываемый шаблон
		 *
		 * @param {String} name
		 *
		 * @return {String}
		 */
		getLoaded: function (name) {
			for (var i = 0; i < this.loadedArray.length; i++) {
				if (this.loadedArray [i].name == name) {
					return this.loadedArray [i].template
				}
			}
			return false
		},

		/**
		 * Загрузка шаблона аяксом
		 *
		 * @param {String} name
		 * @param {Function} callback
		 */
		load: function (name, callback) {
			var self = this;
			var template = this.getLoaded(name);

			if (!template) {
				// TODO: Включить кеширование шаблонов
				$.get("/js/app/templates/" + name + ".tmpl" + "?" + Math.random(), function (data) {
					self.loadedArray.push(
						{
							name: name,
							template: data
						});

					$(document.body).append(data);

					callback(data);
				});
			}
			else {
				callback(template);
			}
		}
	},

	Language: {
		/**
		 * Возвращает правильный падеж для заданного числа
		 *
		 * > plural(1, "рука", "руки", "рук") // рука
		 *
		 * @param {Number} number
		 * @param {String} one    Одна «рука»
		 * @param {String} two    Две «руки»
		 * @param {String} many    Много «рук»
		 *
		 * @return {String}
		 */
		plural: function (number, one, two, many) {
			if (number > 10 && number < 20) {
				return many;
			}

			if (number == 1 || (number % 10) == 1) {
				return one
			}

			if ((number % 10) > 1 && (number % 10) < 5) {
				return two
			}
			else {
				return many
			}
		}
	},

	Objects: {
		/**
		 * Рекурсивно сливает два объекта
		 *
		 * @param source
		 * @param destination
		 */
		mergeAll: function (source, destination) {
			var result = source;

			for (var prop in destination) {
				if (destination.hasOwnProperty(prop)) {
					if (destination[prop] === Object(destination[prop]) && result[prop] === Object(result[prop])) {
						result[prop] = this.mergeAll(result[prop], destination[prop]);
					} else {
						if (destination[prop] != null) {
							result[prop] = destination[prop];
						}
					}

				}
			}


			return result
		}
	},
	
	Numbers: {

		/**
		 * Разбивает число заданным разделителем.
		 *
		 * > separate(10000) // 10 000
		 * > separate(10000, "'") // 10'000
		 * > separate(10000, "'", 2) // 1'00'00
		 *
		 * @param {Number} number
		 * @param {String} [separator]  Разделитель    <пробел>
		 * @param {Number} [counter]  Разделять по <3>
		 *
		 * @return {String}
		 */
		separate: function (number, separator, counter) {
			number = number.toString();
			counter = counter || 3;
			separator = separator || " ";

			var parts = Math.floor(number.length / counter);
			var resultArray = [];

			if (parts > 0) {
				for (var i = 0; i < parts; i++) {
					resultArray[resultArray.length] = number.substring(number.length - counter, number.length);
					number = number.substring(0, number.length - counter);
				}
				if (number.length) {
					resultArray[resultArray.length] = number;
				}

				var result = "";

				// Reversing array and making toString
				var resultArrayLength = resultArray.length;
				for (i = 0; i < resultArrayLength; i++) {
					result += resultArray[resultArrayLength - i - 1];

					// Is not last
					if (i < resultArrayLength - 1) {
						result += separator;
					}
				}
				return result
			}
			else {
				return number
			}

		},
		/**
		 * > makePhone ( "79149990022" ); // +7 914 999 00 22
		 *
		 * @param {String} phone
		 *
		 * @return {String}
		 */
		makePhone: function (phone) {
			var parsePhone = /^(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/i.exec(phone),
				newPhone = phone;

			if (parsePhone) {

				newPhone = "+" + parsePhone [1];
				for (var i = 2; i < parsePhone.length; i++) {
					newPhone += " " + parsePhone [i]
				}
			}
			return newPhone
		}
	},

	Forms: {
		serializeToObject: function ($element) {
			var o = {};

			var $clone = $element.clone();

			if (!$clone.is("form") && !$clone.find("form").length) {
				$clone = $("<form/>").append($clone);
			}

			// Отдельные условия для дэйтпикеров
			$clone.find(".SelectDate, .date-input").each(function () {
				var $this = $(this);
				var relation = $this.data("relation");
				var duplicate = $this.data("duplicate");

				if (relation) {
					$this.val(Core.Date.toInt($this.val() + " " + $clone.find(relation).val()) || "");
				} else {
					$this.val(Core.Date.toInt($this.val()) || "");
				}

				/*if ( duplicate ) {
				 $this.parent().append( $this.clone().attr( "name", duplicate ) );
				 }*/
			});

			// $.clone не копирует значения селектов, присваиваем вручную
			function setSelectValue (i) {
				$clone.find("select").eq(i).val($(this).val());
			}

			$element.filter("select").each(setSelectValue);
			$element.find("select").each(setSelectValue);

			var a = $clone.serializeArray();

			$.each(a, function () {
				this.value = this.value.trim();

				if (this.value.length) {
					if (o[this.name] !== undefined) {
						if (!o[this.name].push) {
							o[this.name] = [o[this.name]];
						}
						o[this.name].push(this.value || "");
					} else {
						o[this.name] = this.value || "";
					}
				}
			});
			return o;
		}
	},

	Strings: {
		decorate: function (whereString, whatString) {
			whereString = whereString + "";
			whatString = (whatString || "") + "";

			var result = whereString;
			var wordsArray = whatString.split(" ");

			if (wordsArray.length) {
				for (var i = 0; i < wordsArray.length; i++) {
					var regExp = new RegExp(wordsArray[i], "i");

					if (regExp.test(whereString)) {
						result = whereString.replace(regExp, function (entry) {
							return "<b>" + entry + "</b>"
						});
						break;
					}
				}
			}

			return result
		},

		toLatin: function (string) {
			var listChars = {
				"Й": "Q", "й": "q", "Ц": "W", "ц": "w", "У": "E", "у": "e", "К": "R", "к": "r", "Е": "T", "е": "t", "Н": "Y",
				"н": "y", "Г": "U", "г": "u", "Ш": "I", "ш": "i", "Щ": "O", "щ": "o", "З": "P", "з": "p", "Х": "{", "х": "[",
				"Ъ": "}", "ъ": "]", "Ф": "A", "ф": "a", "Ы": "S", "ы": "s", "В": "D", "в": "d", "А": "F", "а": "f", "П": "G",
				"п": "g", "Р": "H", "р": "h", "О": "J", "о": "j", "Л": "K", "л": "k", "Д": "L", "д": "l", "Ж": ":", "ж": ";",
				"Э": "\"", "э": "'", "Я": "Z", "я": "z", "Ч": "X", "ч": "x", "С": "C", "с": "c", "М": "V", "м": "v", "И": "B",
				"и": "b", "Т": "N", "т": "n", "Ь": "M", "ь": "m", "Б": "<", "б": ",", "Ю": ">", "ю": "."
			};

			return string.length > 1 ?
				_.map(string,function (c) {
					return listChars[c] || c;
				}).join("") :
				(listChars[string] || string);
		},
		
		endsWith: function (str, chr) {
			return str.length ? str[str.length - 1] === chr : false;
		},

		endsWithPunctuationChar: function (str) {
			var punctChars = [".", ",", "!", "?", ";", ":"];
			var punctCharFound = false;

			for (var i = 0; i < punctChars.length; i++) {
				//console.log(str, punctChars[i], Core.Strings.endsWith(str, punctChars[i]));
				if (Core.Strings.endsWith(str, punctChars[i])) {
					punctCharFound = true;
					break;
				}
			}

			console.log(punctCharFound);

			return punctCharFound;
		},

		startsWith: function (str, chr) {
			return str.length ? str[0] === chr : false;
		},

    collectTextNodes: function (element, texts) {
      for (var child = element.firstChild; child !== null; child = child.nextSibling) {
        if (child.nodeType === 3)
          texts.push(child);
        else if (child.nodeType === 1)
          this.collectTextNodes(child, texts);
      }
    },

    getTextWithSpaces: function (element) {
      var texts = [];
      this.collectTextNodes(element, texts);
      for (var i = texts.length; i-- > 0;)
        texts[i] = texts[i].data;
      return texts.join(' ');
    },

    cleanTextMarkup: function (text) {
      return this.getTextWithSpaces($("<div/>").html(text)[0]);
    }
	},

	Url: {
		getReferrer: function () {
			var referrer = document.referrer || "/";
			referrer = referrer.replace(window.location.protocol + "//" + window.location.host, "");

			return referrer
		},

		extractPage: function (query) {
			var matches = query ? query.match(/^p([0-9]+).*/) : null;
			return matches && matches.length > 1 ? matches[1] : 1;
		},

		compileUri: function (uri, options) {
			return uri.replace(/:([^/]*)/g, function (enter, fragment) {
				checkForErrors(options[fragment], "\"" + fragment + "\" was not found");

				return options[fragment]
			});
		},

		/**
		 * Парсит URL и возвращает объект с GET-параметрами
		 * @return Object Объект, где ключи – это имена параметров, а значения – это значения.
		 */
		extractUrlParameters: function () {
			var query = window.location.search.replace(/^\?/, ""),
				pairs = query.split("&"),
				params = {};

			for (var i = 0; i < pairs.length; i++) {
				var pair = pairs[i].split("=");

				var obj = /(.*?)\[(.*?)\]/i.exec(decodeURIComponent(pair[0]));

				if (obj && obj.length) {
					params[obj[1]] = params[obj[1]] || {};
					params[obj[1]][obj[2]] = decodeURIComponent(pair[1]);
				}
				else {
					if (pair[1]) {
						params[pair[0]] = decodeURIComponent(pair[1]);
					}
				}
			}


			return params == {} ? null : params;
		}
	},

	Date: {
		differenceBetweenDates: function (DateObject1, DateObject2) {
			var date1 = DateObject1.getTime();
			var date2 = DateObject2.getTime();
			var resultDate = date1 > date2 ? date1 - date2 : date2 - date1;

			return {
				date: new Date(resultDate),
				difference: resultDate
			};
		},

		zeroFirst: function (number) {
			var zero = "";
			if (number < 10) {
				zero = "0";
			}

			return zero + number;
		},

		getYear: function (dateString) {
			var date = new Date(parseInt(dateString));
			return date.getFullYear();
		},

		getAge: function (dateString) {
			var date = this.differenceBetweenDates(new Date(parseInt(dateString)), new Date());

			return date.date.getFullYear() - 1970;
		},

		getAgeString: function (dateString) {
			var now = moment();
			var birthDate = moment(parseInt(dateString));

			var years = now.diff(birthDate, 'year');
			var months = now.diff(birthDate, 'month');
			var days = now.diff(birthDate, 'day');


			if (years > 0) {
				if (years < 3) {
					return years + " " + Core.Language.plural(years, "год", "года", "лет") + " и " +
						(months - years * 12) + " " + Core.Language.plural((months - years * 12), "месяц", "месяца", "месяцев");
				} else {
					return years + " " + Core.Language.plural(years, "год", "года", "лет");
				}
			} else {
				if (months < 1) {
					return days + " " + Core.Language.plural(days, "день", "дня", "дней");
				} else {
					return months + " " + Core.Language.plural(months, "месяц", "месяца", "месяцев");
				}
			}
		},

		countDays: function (dateString) {
			var date = this.differenceBetweenDates(new Date(parseInt(dateString)), new Date());

			return Math.floor(date.difference / 1000 / 60 / 60 / 24)
		},

		format: function (dateString) {
			var date = new Date(parseInt(dateString));
			return this.zeroFirst(date.getDate()) + "." + this.zeroFirst(date.getMonth() + 1) + "." + date.getFullYear();
		},

		formatDateTime: function (dateString) {
			var formattedDate = this.format(dateString);

			var date = new Date(parseInt(dateString));
			return formattedDate + " " + this.zeroFirst(date.getHours()) + ":" + this.zeroFirst(date.getMinutes());
		},

		toInt: function (formattedDateString) {
			var dateTime = formattedDateString.split(" "); // separate date from time
			var dateArray = dateTime[0].split(".");

			var date;
			if (dateTime[1]) { // В строке найдено время
				var timeArray = dateTime[1].split(":");
				date = new Date(parseInt(dateArray[2], 10), parseInt(dateArray[1], 10) - 1, parseInt(dateArray[0], 10), parseInt(timeArray[0], 10), parseInt(timeArray[1], 10));
			} else {
				date = new Date(parseInt(dateArray[2], 10), parseInt(dateArray[1], 10) - 1, parseInt(dateArray[0], 10));
			}

			return date.getTime();
		}
	},

	Models: {
		toInputs: function ($inputs, model) {
			var self = this;
			$inputs.each(function () {
				var $this = $(this), name = $this.attr("name"), value = self.getValueByInputName(model, name);
				$this.val(value);
			});
		},

		getValueByInputName: function (model, name) {
			{
				var base, value, subs, sub;
				if (/^.*?\[/.test(name)) {
					base = /^(.*?)\[/.exec(name)[1];
					value = model.get(base);
					subs = name.match(/\[(.*?)\]/g);
					for (var i = 0; i < subs.length; i++) {
						sub = subs[i].replace("[", "").replace("]", "");
						if (!value || !value[sub]) {
							value = "";
							break;
						}
						value = value[sub];
					}
				}
				else {
					value = model.get(name);
				}
				return value;
			}
		}
	},

	execAll: function (regexp, source) {
		var executed,
			resultArray = [""];

		while (executed = regexp.exec(source)) {
			resultArray [0] += executed [0];
			resultArray.push(executed [1]);
		}

		return resultArray
	},

	getCaretPosition: function (input) {
		if ('selectionStart' in input) {
			// Standard-compliant browsers
			return input.selectionStart;
		} else if (document.selection) {
			// IE
			input.focus();
			var sel = document.selection.createRange();
			var selLen = document.selection.createRange().text.length;
			sel.moveStart('character', -input.value.length);
			return sel.text.length - selLen;
		}
	},

	setCaretPosition: function (input, position) {
		if (input.createTextRange) {
			var textRange = input.createTextRange();
			textRange.collapse(true);
			textRange.moveEnd(position);
			textRange.moveStart(position);
			textRange.select();
			return true;
		} else if (input.setSelectionRange) {
			input.setSelectionRange(position, position);
			return true;
		}
	}
};