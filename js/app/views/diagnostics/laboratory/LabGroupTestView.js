define(function(require) {
    var itemTemplate = require('text!templates/diagnostics/laboratory/test-list-item.html');
    var Tests = require('models/diagnostics/laboratory/SetOfTests');

    var ItemView = Backbone.View.extend({
        tagName: 'tr',
        // className: 'context-menu-'+this.cid,
        events: {
            'change .cito': 'onCitoChange',
            'change .select': 'onSelectChange',
            'change .select_date': 'setPlannedEndDate',
            'change .select_time': 'setPlannedEndDate',
            'change .tests-checkbox': 'onTestSelect',
            'click .icon': 'onArrowClick',
            'click .title2': 'onTitleClick'
        },

        onTestSelect: function(event) {
            var $target = $(event.target);
            var name = $target.val();
            var value = $target.prop('checked');
            if (value) {
                $target.parents('li').addClass('selected');
            } else {
                $target.parents('li').removeClass('selected');
            }
            this.model.tests.setProperty(name, 'isAssigned', "" + value);
            //console.log('this.model.tests', this.model.tests);
        },

        onTitleClick: function() {
            //console.log('onTitleClick');
            if (!this.ui.$select.prop('checked')) {
                this.ui.$select.prop('checked', true).trigger('change');
            } else {
                this.ui.$select.prop('checked', false).trigger('change');
            }
        },

        onCitoChange: function() {
            var view = this;
            var value = this.ui.$cito.prop('checked');

            if (view.model.tests) {
                view.model.tests.setProperty('urgent', 'value', "" + value);
                //console.log('onCitoChange', view.model.tests)
            } else {
                view.loadTests().done(function() {
                    view.model.tests.setProperty('urgent', 'value', "" + value);
                    //console.log('onCitoChange load', view.model.tests)
                });
            }

            if (value && !view.ui.$select.prop('checked')) {
                view.ui.$select.prop('checked', true).trigger('change');
            }

            if (value) {
                view.$el.addClass('cito');
            } else {
                view.$el.removeClass('cito');
            }


        },

        onSelectChange: function() {
            if (!this.model.tests) {
                this.loadTests();
            }

            var code = this.model.get('code');
            var select = this.ui.$select.prop('checked');

            this.triggerTestSelection(code, select);

            if (select) {
                this.$el.addClass('selected');
                this.expand();
            } else {
                this.$el.removeClass('selected');
                this.collapse();
            }

            //console.log('onSelectChange', this.collection)



        },

        setPlannedEndDate: function() {
            var view = this;
            var rawDate = this.ui.$date.val();
            var rawTime = this.ui.$time.val();

            var date = moment(rawDate, 'DD.MM.YYYY').format('YYYY-MM-DD');
            var time = rawTime + ':00';

            if (view.model.tests) {
                view.model.tests.setProperty('plannedEndDate', 'value', date + ' ' + time);
            } else {
                view.loadTests().done(function() {
                    view.model.tests.setProperty('plannedEndDate', 'value', date + ' ' + time);
                });
            }

            if (!view.ui.$select.prop('checked')) {
                view.ui.$select.prop('checked', true).trigger('change');
            }

            //console.log('date', rawDate, rawTime);

        },

        onArrowClick: function(e) {
            var $target = $(e.target);


            if ($target.hasClass('icon-open')) {
                this.collapse();
            } else {
                this.expand();
            }

        },

        triggerIcons: function(select) {
            if (select) {
                this.ui.$icons.removeClass('closed').addClass('open');
            } else {
                this.ui.$icons.removeClass('open').addClass('closed');
            }
        },

        triggerTestsList: function(select) {
            if (select) {
                this.ui.$tests.show();
            } else {
                this.ui.$tests.hide();
            }
        },


        triggerTestSelection: function(code, select) {
            var view = this;

            var model = view.collection.find(function(model) {
                return model.get('code') == code;
            });
            //model = model[0];

            model.set('selected', select);

        },

        expand: function() {
            //console.log('expand');
            this.triggerTestsList(true);
            this.triggerIcons(true);

        },
        collapse: function() {
            //console.log('collapse');
            this.triggerTestsList(false);
            this.triggerIcons(false);

        },



        loadTests: function() {
            var view = this;
            if (!view.model.tests) {
                view.model.tests = new Tests({
                    code: this.model.get('code'),
                    patientId: this.options.patientId
                });

                view.model.tests.fetch({
                    success: function() {
                        //console.log('load tests', view.model.tests)
                        if (view.model.tests.getProperty('doctorFirstName', 'value')) {
                            var executor = {
                                id: view.model.tests.getProperty('executorId', 'value'),
                                name: {
                                    first: view.model.tests.getProperty('doctorFirstName', 'value'),
                                    middle: view.model.tests.getProperty('doctorMiddleName', 'value'),
                                    last: view.model.tests.getProperty('doctorLastName', 'value')
                                }
                            }

                            pubsub.trigger('executor:changed', executor);

                        }

                        view.renderTests();
                    }
                });
            }

            return view.model.tests.deferred;

        },
        initialize: function(options) {
            //console.log('options', options);
            this.$el.attr('data-code', this.model.get('code'));
            this.$el.attr('data-cid', this.model.cid);
            this.$el.addClass('context-menu-' + this.cid);

            //this.model.on('change:')

        },

        modelData: function() {
            //console.log('this.model',this.model)
            var data = _.extend(this.model.toJSON(), {
                cid: this.model.cid
            });
            return data;
        },

        renderTests: function() {
            var view = this;

            var data = view.model.tests.getTree();
            view.ui.$tests.html('');
            _.each(data, function(item, key, data) {
                //console.log('item', item, key);
                view.ui.$tests.append(_.template('<li <% if(select){%>class="selected"<%}%> ><label><input class="tests-checkbox" type="checkbox" <% if(select){%>checked="checked"<%}%> value="<%= title%>"/><%= title%></label></li>', item))

            });
            view.$el.find('.tests-checkbox').each(function(){
                $(this).trigger('change');
            })

            view.ui.$icons.addClass('open');


        },
        render: function() {
            var view = this;



            this.$el.html(_.template(itemTemplate, this.modelData(), {
                variable: 'data'
            }));


            view.ui = {};
            view.ui.$date = view.$el.find(".select_date");
            view.ui.$time = view.$el.find(".select_time");
            view.ui.$cito = view.$el.find(".cito");
            view.ui.$select = view.$el.find(".select");
            view.ui.$tests = view.$el.find(".tests");
            view.ui.$icons = view.$el.find(".icons");


            view.ui.$date.datepicker();
            view.ui.$date.datepicker("setDate", "+1");

            view.ui.$time.mask("99:99").timepicker({
                showPeriodLabels: false
            });

            $.contextMenu({
                autoHide: true,
                selector: '.context-menu-' + view.cid,
                callback: function(key, options) {
                    //var m = "clicked: " + key + " " + options.$trigger.data("cid");

                    //console.log(arguments, options.$trigger.data("cid"));
                },
                items: {
                    "select": {
                        name: "Выбрать все",
                        callback: function() {
                            //console.log('select all')
                            $('.context-menu-' + view.cid + ' .tests ')
                                .find('input:checkbox').prop('checked', true)
                                .trigger('change');
                        }
                    },
                    "deselect": {
                        name: "Снять выделение",
                        callback: function() {
                            //console.log('deselect all')

                            $('.context-menu-' + view.cid + ' .tests ')
                                .find('input:checkbox').prop('checked', false)
                                .trigger('change');

                        }
                    }
                }
            });


            return this;
        },
        close: function(){
            this.ui.$date.datepicker('destroy');

        }
    });

    return ItemView;

});
