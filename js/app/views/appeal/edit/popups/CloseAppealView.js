define(function(require) {
    var popupMixin = require('mixins/PopupMixin');
    var Docs4closing = require('models/Docs4closing');

    var template = require('text!templates/appeal/edit/popups/close-appeal-popup.html');

    return View.extend({
        initialize: function() {
            console.log('initialize close appeal popup', this);

        },
        //template:'',
        events: {
            'click .save': 'onSave'
        },
        onSave: function() {
            console.log('onSave');
            this.ui.$saveButton.button('disable');

            var hour = this.ui.$appealCloseTime.timepicker('getHour');
            var minute = this.ui.$appealCloseTime.timepicker('getMinute');
            var date = this.ui.$appealCloseDate.datepicker('getDate');
            var closeDate = moment(date).minutes(minute).hours(hour).valueOf();

            var appealId = this.options.appeal.get('id');

            var closeDocs = this.ui.$closeDocs.prop('checked');


            if (closeDocs) {
                //закрываем документы
                $.ajax({
                    url: '/api/v1/appeals/' + appealId + '/docs/close?execDate=' + closeDate,
                    dataType: 'jsonp',
                    type: 'GET',
                    success: function() {
                        console.log('success close docs', arguments);
                    }
                });
            }

            //выписка с койки
            $.ajax({
                url: '/api/v1/appeals/' + appealId + '/bed/vacate?execDate=' + closeDate,
                dataType: 'jsonp',
                type: 'GET',
                success: function() {
                    console.log('success close bed', arguments);
                }
            });

            //выписка с истории болезни
            $.ajax({
                url: '/api/v1/appeals/' + appealId + '/close?execDate=' + closeDate,
                dataType: 'jsonp',
                type: 'GET',
                success: function() {
                    console.log('success close appeal', arguments);
                }
            });



        },
        render: function() {

            this.ui = {};

            this.ui.$saveButton = this.$el.closest(".ui-dialog").find('.save');

            //this.ui.$saveButton.button('disable');

            this.docs4closing = new Docs4closing();
            this.docs4closing.appealId = this.options.appeal.get('id');

            this.docs4closing.on('change', function() {

                console.log('docs4closing', this.docs4closing.toJSON());
                this.$el.html(_.template(template, this.docs4closing.toJSON()));

                this.ui.$appealCloseDate = this.$('.appeal-close-date');
                this.ui.$appealCloseTime = this.$('.appeal-close-time');
                this.ui.$closeDocs = this.$('.close-docs');

                var datetime = new Date();
                this.ui.$appealCloseDate.datepicker();
                this.ui.$appealCloseDate.datepicker("setDate", datetime);
                this.ui.$appealCloseTime.timepicker();
                this.ui.$appealCloseTime.timepicker("setTime", datetime);

                if (this.docs4closing.get('allDocs')) {
                    this.ui.$saveButton.button('enable');
                }


            }, this);

            this.docs4closing.fetch();


            return this;
        }


    }).mixin([popupMixin]);



});
