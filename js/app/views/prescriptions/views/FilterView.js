define(function (require) {
    var BaseView = require('./BaseView');
    var DateRangeView = require('./DateRangeView');
    var SelectView = require('./SelectView');
    var rivets = require('rivets');
    var template = require('text!../templates/filter.html');
    require('collections/departments');
    var AdministrationMethod = require('collections/AdministrationMethod');

    return BaseView.extend({
        template: template,
        events: {
            'keyup #doctor-name': 'onKeyUp',
            'keyup #drug-name': 'onKeyUp',
            'keyup #pacient-name': 'onKeyUp',
            'click #clear-filter': 'clearFilter'
        },

        initialize: function () {
            var self = this;
            this.listenTo(this.model, 'change', this.filter);
            this.listenTo(this.model, 'change', this.setUrlParams);

            this.model.set(this.getUrlParams());

            this.dateRangeView = new DateRangeView({
                model: this.model
            });

            this.administration = new AdministrationMethod();

            this.administrationView = new SelectView({
                collection: this.administration,
                model: this.model,
                modelKey: 'administrationId'
            });


            this.departments = new App.Collections.Departments();
            this.departments.setParams({
                filter: {
                    hasBeds: true
                },
                limit: 0,
                sortingField: 'name',
                sortingMethod: 'asc'
            });

            this.departmentsView = new SelectView({
                collection: this.departments,
                model: this.model,
                modelKey: 'departmentId'
            });

            this.administration.fetch()
                .done(function () {});

            this.departments.fetch()
                .done(function () {});


            this.addSubViews({
                '#date-range': this.dateRangeView,
                '#departments': this.departmentsView,
                '#administration': this.administrationView
            });

        },

        clearFilter: function () {
            this.model.set({
                'pacientName': '',
                'doctorName': '',
                'drugName': '',
                'departmentId': 'not-selected',
                'administrationId': 'not-selected'
            })
        },

        onKeyUp: function (e) {
            // $target = this.$(e.target);
            // var value = $target.val();
            // if(value && value.length > 2){
            // 	$target.trigger('change');
            // }
            // console.log('keyup', $target.val());
        },

        getUrlParams: function () {
            return Core.Url.extractUrlParameters();
        },

        setUrlParams: function () {
            var params = $.param(this.model.toJSON());
            App.Router.navigate('prescriptions/?' + params);
        },

        filter: function () {
            var filter = this.model.toJSON();

            if (_.isObject(this.lastXHR)) {
                // прерываем предыдущий запрос если он не успел выполнится
                if (this.lastXHR && this.lastXHR.readyState != 4) {
                    this.lastXHR.abort('stale');
                }
            }

            this.collection.filter = filter;
            this.lastXHR = this.collection.fetch({
                data: filter,
                processData: true
            });
        },

        afterRender: function () {

            rivets.bind(this.el, {
                filter: this.model
            });
            this.$('button')
                .button();

        }
    });

});
