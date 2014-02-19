define(function (require) {
    var BaseView = require('./BaseView');

    var TreeButton = BaseView.extend({
        events: {
            'click': 'onClick'
        },
        onClick: function (e) {
            console.log('click');
        },
        render: function () {
            return this;
        },
        initialize: function () {
            console.log('init tree button');
        },
        afterRender: function () {
            console.log('afterRender');

            $.contextMenu({
                className: 'webmis-menu',
                determinePosition: function () {
                    // position to the lower middle of the trigger element
                    if ($.ui && $.ui.position) {
                        console.log('ui')
                        // .position() is provided as a jQuery UI utility
                        // (...and it won't work on hidden elements)
                        $menu.css('display', 'block').position({
                            my: "left top",
                            at: "left bottom",
                            of: this,
                            offset: "0 5",
                            collision: "fit"
                        }).css('display', 'none');
                    } else {
                        console.log('no ui')
                        // determine contextMenu position
                        var offset = this.offset();
                        offset.top += this.outerHeight();
                        offset.left += this.outerWidth() / 2 - $menu.outerWidth() / 2;
                        $menu.css(offset);
                    }

                },
                selector: '.print-button',
                trigger: 'left',
                callback: function (key, options) {
                    // var m = "clicked: " + key;
                    // window.console && console.log(m) || alert(m);
                },
                items: {
                    "main": {
                        name: "Лист назначений",
                    },
                    "one": {
                        name: "Лист назначений(Пациент Пациент)",
                        "items": {
                            "fold1a-key1": {
                                "name": "Лист назначений"
                            },
                            "fold1a-key2": {
                                "name": "Мониторинг"
                            }
                        }
                    },

                }
            });
        }
    });

    return TreeButton;
});
