define(function (require) {
    var BaseView = require('./BaseView');

    var TreeButton = BaseView.extend({
        events: {
            'click': 'onClick'
        },

        onClick: function (e) {
        },

        render: function () {
            return this;
        },

        // initialize: function () {
        // },

        getMenuItems: function () {
            return {};
        },

        getMenuCallback: function(key, options){
        },

        afterRender: function () {
            var self = this;

            $.contextMenu({
                className: 'webmis-menu',
                determinePosition: function () {
                    // position to the lower middle of the trigger element
                    if ($.ui && $.ui.position) {
                        // console.log('ui')
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
                        // console.log('no ui')
                        // determine contextMenu position
                        var offset = this.offset();
                        offset.top += this.outerHeight();
                        offset.left += this.outerWidth() / 2 - $menu.outerWidth() / 2;
                        $menu.css(offset);
                    }

                },
                selector: '.print-button',
                trigger: 'left',
                callback: this.getMenuCallback.bind(this),
                build: function(){
                    return {
                        items: self.getMenuItems()
                    }; 
                }
            });
        }
    });

    return TreeButton;
});
