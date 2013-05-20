define(function(require) {
    var itemTemplate = require('text!templates/laboratory/test-list-item.html');
    var Tests = require('models/diagnostics/SetOfTests');

    var ItemView = Backbone.View.extend({
        tagName: 'tr',
        // className: 'context-menu-'+this.cid,
        events: {
            'change .cito': 'onCitoChange',
            'change .select': 'onSelectChange',
            'change .select_date': 'setPlannedEndDate',
            'change .select_time': 'setPlannedEndDate',
            'change .tests-checkbox': 'onTestSelect'
        },

        onTestSelect: function(event) {
            var $target = $(event.target);
            var name = $target.val();
            var value = "" + $target.prop('checked');
            this.model.tests.setProperty(name, 'isAssigned', value);
            console.log('this.model.tests',this.model.tests);
        },

        onCitoChange: function() {
            var value = "" + this.ui.$cito.prop('checked');
            if (this.model.tests) {
                this.model.tests.setProperty('urgent', 'value', value);
            }
        },

        onSelectChange: function() {
            if (!this.model.tests) {
                this.loadTests();

            }

            var code = this.model.get('code');
            var select = this.ui.$select.prop('checked');

            this.triggerTestSelection(code, select);
            console.log('onSelectChange', this.collection)

        },


        triggerTestSelection: function(code, select) {
            var view = this;

            var model = view.collection.filter(function(model) {
                return model.get('code') == code;
            });
            model = model[0];

            console.log('model', model)

            model.set('selected', select);

        },

        setPlannedEndDate: function() {
            var rawDate = this.ui.$date.val();
            var rawTime = this.ui.$time.val();

        },

        loadTests: function() {
            var view = this;

            view.model.tests = new Tests({
                code: this.model.get('code'),
                patientId: this.options.patientId
            });

            view.model.tests.fetch({
                success: function() {
                    view.renderTests();
                }
            });

        },
        initialize: function(options) {
            console.log('options', options);
            this.$el.attr('data-code', this.model.get('code'));
            this.$el.attr('data-cid', this.model.cid);
            this.$el.addClass('context-menu-' + this.cid);

            //this.model.on('change:')

        },

        modelData: function() {
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
                console.log('item', item, key);
                view.ui.$tests.append(_.template('<li><input class="tests-checkbox" type="checkbox" <% if(select){%>checked="checked"<%}%> value="<%= title%>"/><%= title%></li>', item))

            });


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

                    console.log(arguments, options.$trigger.data("cid"));
                },
                items: {
                    "select": {
                        name: "Выбрать все",
                        callback: function() {
                            console.log('select all')
                            $('.context-menu-' + view.cid + ' .tests ')
                            .find('input:checkbox').prop('checked', true)
                            .trigger('change');
                        }
                    },
                    "deselect": {
                        name: "Снять выделение",
                        callback: function() {
                            console.log('deselect all')

                            $('.context-menu-' + view.cid + ' .tests ')
                            .find('input:checkbox').prop('checked', false)
                            .trigger('change');



                            // .each(function(){
                            //     console.log('callback each',arguments)
                            //     $(this).prop('checked', false)
                            // })
                        }
                    }
                }
            });


            return this;
        }
    });

    return ItemView;

});


//console.log('render .lab-tests-list',view.collection.toJSON())

//view.$el.html('<table><tr><td class="title-col"></td><td class="cito-col">cito</td><td class="time-col"></td></tr></table><div class="lab-tests-list2"></div>');


// view.$('.lab-tests-list2').dynatree({
//  clickFolderMode: 2,
//  generateIds: true,
//  noLink: true,
//  checkbox: true,
//  onCustomRender: function(node) {
//      var html = '';

//      if (node.data.noCustomRender) {
//          html = _.template('<span class="title-col"><%=title%></span>', node.data);
//      } else {
//          html = _.template(nodeTestTmpl, node.data);
//      }

//      return html;
//  },

//  onRender: function(node, nodeSpan) {
//      //console.log(node, nodeSpan)
//      var $nodeSpan = $(nodeSpan);
//      UIInitialize($nodeSpan);


//      $nodeSpan.find(".SelectDate").datepicker("setDate", "+1");

//      $nodeSpan.find(".HourPicker").mask("99:99").timepicker({
//          showPeriodLabels: false
//      });

//      var $citoCheckbox = $nodeSpan.find("input[name='cito']");

//      $citoCheckbox.on('click', function(e) {
//          //.dynatree("option", "autoCollapse", true);
//          node.data.cito = $citoCheckbox.prop('checked');
//          if (node.data.code) {
//              pubsub.trigger('test:cito:changed', node.data.code, $citoCheckbox.prop('checked'));
//          }
//      });
//  },
//  fx: {
//      height: "toggle",
//      duration: 200
//  },
//  autoFocus: false,
//  onBlur: function(node) {


//      setTimeout(function() {
//          var $dateInput = $(node.span).find('#date' + node.data.key);
//          var time = $(node.span).find('#time').val();

//          var date = $.datepicker.formatDate("yy-mm-dd", $dateInput.datepicker("getDate"));
//          pubsub.trigger('test:date:changed', node.data.code, date);

//          //console.log('onblur',date,time, arguments);

//      }, 100);


//  },

//  onFocus: function() {
//      // console.log('onFocus',arguments);
//  },

//  onSelect: function(select, node) {
//      var code = node.data.code;
//      //console.log('select', select, node)

//      if (select && code) {
//          view.loadTest(code, function(tree) {
//              node.addChild(tree);
//              //node.expand(true);
//          });
//      }

//      if (!select && code) {
//          view.removeTest(code);
//          node.removeChildren();
//      }
//  },

//  children: view.collection.toJSON()
// });

//UIInitialize(this.el);
