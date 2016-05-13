define(function(require) {
    var shared = require('views/appeal/edit/pages/monitoring/shared');

    var headerTmpl = require('text!templates/appeal/edit/pages/monitoring/header.tmpl');

    var BaseView = require('views/appeal/edit/pages/monitoring/views/BaseView');
    var CloseAppealView = require('views/appeal/edit/popups/CloseAppealView');

    var ChangeFinance = require('views/appeal/edit/popups/ChangeFinance');

    /**
     * Заголовок страницы
     * @type {*}
     */
    var Header = BaseView.extend({
        template: headerTmpl,
        initialize: function(options){
            BaseView.prototype.initialize.apply(this);
            this.appeal = options.appeal;
        },

        data: function() {
            //console.log('canClose',this.canClose())
            var appeal = this.appeal;
            return {
                appealNumber: appeal.get("number"),
                appealIsUrgent: appeal.get("urgent"),
                appealIsClosed: appeal.get('closed'),
                canClose: this.canClose(),
                finance: appeal.get('appealType').get('finance').get('name'),
                isExecPerson: appeal.get('execPerson').id == Core.Cookies.get('userId')
            };
        },

        events: {
            'click .close-appeal': 'openCloseAppealPopup',
            'click #appealFinanceEdit': 'showFinanceChange',
            'mouseover #appealFinanceEdit': 'mouseOverFinance',
            'mouseout #appealFinanceEdit': 'mouseOutFinance'
        },
        canClose: function() {
            if (this.appeal.get('closed') || ((Core.Data.currentRole() === ROLES.NURSE_RECEPTIONIST) || (Core.Data.currentRole() === ROLES.NURSE_DEPARTMENT))) {
                return false;
            } else {
                return true;
            }
        },

        mouseOverFinance: function() {
            $('#appealFinance').css({
                'text-decoration': 'underline',
                'text-decoration-style': 'dashed'
            });
        },

        mouseOutFinance: function() {
            $('#appealFinance').css('text-decoration', 'none');
        },

        showFinanceChange: function() {
            var appeal = this.appeal;
            var self = this;
            this.changeFinance = new ChangeFinance({
                title: 'Источник финансирования',
                width: '440px',
                saveText: 'Сохранить',
                appeal: appeal,
            });
            this.changeFinance.render().open();
        },

        openCloseAppealPopup: function() {
            //console.log('openCloseAppealPopup');
            this.closeAppealView = new CloseAppealView({
                title: 'Закрытие истории болезни',
                width: '50em',
                saveText: 'Закрыть',
                appeal: shared.models.appeal
            });
            this.closeAppealView.render().open();
        },

        render: function() {
            BaseView.prototype.render.apply(this);
            this.$('.close-appeal').button();
            return this;
        }
    });

    return Header;
});
