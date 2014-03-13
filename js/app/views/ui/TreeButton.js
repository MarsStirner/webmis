define(function (require) {

    var BaseView = require('views/prescriptions/views/BaseView');

    var TreeButton = BaseView.extend({
        // events: {
        //     'click': 'onClick'
        // },

        // onClick: function (e) {},

        render: function () {
            this.$el.attr('id', this.cid);
            return this;
        },

        getMenuItems: function () {
            return {};
        },

        getMenuCallback: function (key, options) {},

        addMenu: function () {
            console.log('addMenu', this);
            var self = this;

            $.contextMenu('destroy');

            if (_.isEmpty(this.getMenuItems())) {
                this.$el.button().button('disable');
                return;
            } else {
                this.$el.button().button('enable');
            }

            $.contextMenu({
                className: 'webmis-menu',
                position: function (contextMenu, x, y) {
                    var $printButton = contextMenu.$trigger;
                    var left = $printButton.offset().left;
                    var top = $printButton.offset().top + $printButton.innerHeight();

                    contextMenu.$menu.offset({
                        left: left,
                        top: top
                    });
                },
                selector: '#' + self.cid,
                trigger: 'left',
                callback: function (key, options) {
                    self.getMenuCallback(key, options);
                },
                items: self.getMenuItems()
            });

        },

        afterRender: function () {
            this.addMenu();
        }
    });

    return TreeButton;
});
