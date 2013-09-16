define(function(require) {
    var popupMixin = require('mixins/PopupMixin');
    var Docs4closing = require('models/Docs4closing');
    var Results = require('collections/Results');

    var template = require('text!templates/appeal/edit/popups/close-appeal-popup.html');

    return View.extend({
        initialize: function() {
            //console.log('initialize close appeal popup', this);

        },
        //template:'',
        events: {
            'click .save': 'onSave',
            'change #results':'validate'
        },
        validate: function(){
            //console.log(this.ui.$results.val())
            if(this.ui.$results.val() != '...'){
                this.ui.$saveButton.button('enable');
            }else{
                this.ui.$saveButton.button('disable');
            }
        },
        onSave: function() {
            var self = this;
           // console.log('onSave');
            this.ui.$saveButton.button('disable');

            var hour = this.ui.$appealCloseTime.timepicker('getHour');
            var minute = this.ui.$appealCloseTime.timepicker('getMinute');
            var date = this.ui.$appealCloseDate.datepicker('getDate');
            var closeDate = moment(date).minutes(minute).hours(hour).valueOf();

            this.appeal = this.options.appeal;
            var appealId = this.options.appeal.get('id');

            var closeDocs = this.ui.$closeDocs.prop('checked');

            var resultId = this.ui.$results.val();
            var resultText = this.$('option:selected', this.ui.$results).text()

            var when;
            if (closeDocs) {
                when = $.when(closeAppealDocs(), vacateBed(), closeAppeal());
            } else {
                when = $.when(vacateBed(), closeAppeal());
            }



            when.then(function() {
                pubsub.trigger('appeal:closed',{
                    closed: true,
                    closeDate: closeDate,
                    resultText: resultText
                });
                self.close();

            }, function() {
                console.log('ошибка', arguments);
            })

            function closeAppealDocs() {
                //закрываем документы
                return $.ajax({
                    url: '/api/v1/appeals/' + appealId + '/docs/close?execDate=' + closeDate,
                    dataType: 'jsonp',
                    type: 'GET',
                    success: function() {
                        pubsub.trigger('noty', {
                            text: 'Закрыли документы',
                            type: 'success'
                        });
                        //console.log('success close docs', arguments);
                    }
                });
            };

            function vacateBed() {
                var closeBedDate = closeDate - (60*60*1000);//какой-то хак от Марины Владимировны, для поддержки НТК
                //выписка с койки
                return $.ajax({
                    url: '/api/v1/appeals/' + appealId + '/bed/vacate?execDate=' + closeBedDate,
                    dataType: 'jsonp',
                    type: 'GET',
                    success: function(data) {
                        if(data){
                            pubsub.trigger('noty', {
                                text: 'Выписали с койки',
                                type: 'success'
                            });
                        }

                        //console.log('success close bed', arguments);
                    }
                });
            }


            function closeAppeal() {
                //выписка с истории болезни
                return $.ajax({
                    url: '/api/v1/appeals/' + appealId + '/close',
                    data: {execDate:closeDate,resultId: resultId},
                    dataType: 'jsonp',
                    type: 'GET',
                    success: function() {
                        pubsub.trigger('noty', {
                            text: 'Закрыли историю болезни',
                            type: 'success'
                        });
                        //console.log('success close appeal', arguments);
                    }
                });
            }


        },

        data: function(){
            var data = {};

            data.doctorId = this.options.appeal.get('execPerson').id;

            data.docs = this.docs4closing.toJSON();
            data.appealId = this.options.appeal.get('id');

            return data;
        },

        render: function() {
            var self = this;

            this.ui = {};

            this.ui.$saveButton = this.$el.closest(".ui-dialog").find('.save');

            this.ui.$saveButton.button('disable');

            this.docs4closing = new Docs4closing();
            this.docs4closing.appealId = this.options.appeal.get('id');

            this.docs4closing.on('change', function() {

                console.log('docs4closing', this.docs4closing.toJSON());
                this.$el.html(_.template(template, this.data(),{variable:'data'}));

                this.ui.$appealCloseDate = this.$('.appeal-close-date');
                this.ui.$appealCloseTime = this.$('.appeal-close-time');
                this.ui.$closeDocs = this.$('.close-docs');

                var datetime = new Date();
                this.ui.$appealCloseDate.datepicker();
                this.ui.$appealCloseDate.datepicker("setDate", datetime);
                this.ui.$appealCloseTime.timepicker();
                this.ui.$appealCloseTime.timepicker("setTime", datetime);

                //if (this.docs4closing.get('allDocs')) {
                    //this.ui.$saveButton.button('enable');

                    this.results = new Results();
                    this.results.fetch({
                        data: {
                            appealId: self.options.appeal.get('id')
                        }
                    }).done(function() {
                        self.ui.$results = self.$('#results');

                        self.results.each(function(item) {
                            console.log('item', item);
                            self.ui.$results.append($("<option/>", {
                                "text": item.get('name'),
                                "value": item.get('id')
                            }));

                        }, self);

                        self.ui.$results.select2();

                    });

                //}


            }, this);

            this.docs4closing.fetch();


            return this;
        }


    }).mixin([popupMixin]);



});
