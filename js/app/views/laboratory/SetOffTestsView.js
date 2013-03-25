define([ 'text!templates/appeal/edit/popups/set-of-tests.tmpl',
    'models/diagnostics/SetOfTests'],
    function (setOfTestsViewTemplate, SetOfTests) {

        var SetOfTestsView = View.extend({
            template: setOfTestsViewTemplate,
            el: 'ul',
            initialize: function () {
                var view = this;

                view.collection = view.options.collection;
                view.collection.setParams({
                    sortingField: "name",
                    sortingMethod: "asc"
                })

                view.collection.on('reset', function () {
                    view.render();
                });

                pubsub.on('lab-selected tg-parent:click', function (labCode) {
                    view.$el.html('');
                });

                pubsub.on('load-group-tests', function (code) {
                   // console.log('load-group-tests')

                    view.$el.html('');
                    view.collection.fetch({data: {
                        'patientId': view.options.patientId,
                        'filter[code]': code
                    }});
                });


                view.testCollection = view.options.testCollection;


            },
            loadTest: function (code, callback) {
                var view = this;

                var setOfTests = new SetOfTests({code: code, patientId: view.options.patientId});

                setOfTests.on('change', function (event, model) {
                    //console.log('event,model', event, model)
                    var tree = setOfTests.getTree();

                    callback(tree);
                    //console.log('tree',tree)

                    view.testCollection.add(setOfTests.toJSON());

                    console.log('view.testCollection add', view.testCollection)
                });
//
                setOfTests.fetch();

            },

            removeTest: function (code) {
                var view = this;

                var model = view.testCollection.filter(function (model) {
                    return model.get('code') == code;
                });

                //console.log('removeTest',model)

                view.testCollection.remove(model);
                console.log('view.testCollection remove', view.testCollection)
            },


            render: function () {
                var view = this;
                //console.log('render .lab-tests-list',view.collection.toJSON())

                view.$el.html('<div class="lab-tests-list"></div>');

                view.$('.lab-tests-list').dynatree({
                    clickFolderMode: 2,
                    noLink: true,
                    checkbox: true,
                    onCustomRender: function (node) {
                        var html = '';


                        html += '<span class="title-col" style="width: 325px;display: inline-block;">';

                        //html += "<a class='dynatree-title' href='#'>";

                        html += node.data.title;
                        //html += "</a>";
                        html += '</span>';

                        if (node.data.noCustomRender) {

                            return html;

                        }

                        html += '<span class="sito-col" style="width:50px;display: inline-block;">';

                        html += '<input  type="checkbox" val="" name="sito" />';
                        html += '</span>';

                        html += '<span class="time-col" style="width:150px;display: inline-block;">';

                        html += '<div class="DataTime" style="display: inline-block;font-size: 9px;">';

                        html += '<div class="DatePeriod SingleDate">' +
                            '<div class="FromTo">' +
                            '<input type="text"  id="date' + node.data.key + '" name="date" placeholder="дд.мм.гггг" class="SelectDate" data-mindate="0">' +
                            '</div><i class="DateIcon Icon"></i></div>';

                        html += '<div class="SingleTime" style="width: 4.5em;margin: 0 2em 0 .5em;display: inline-block;vertical-align: middle;">' +
                            '<input type="text" id="time' + node.data.key + '" class="HourPicker" value="07:00" data-relation="#date' + node.data.key + '" name="time" placeholder="чч:мм" required="required">' +
                            '</div>';

                        html += '</div>';
                        html += '</span>'

                        return html;
                    },
                    onRender: function (node, nodeSpan) {
                        //console.log(node, nodeSpan)
                        UIInitialize($(nodeSpan));


                        $(nodeSpan).find(".SelectDate").datepicker("setDate", "+1");

                        $(nodeSpan).find(".HourPicker").mask("99:99");

                        var $citoCheckbox = $(nodeSpan).find("input[name='sito']");

                        $citoCheckbox.on('click', function (e) {
                            if (node.data.code) {
                                pubsub.trigger('test:cito:changed', node.data.code, $citoCheckbox.prop('checked'));
                            }
                        });
                    },
                    fx: { height: "toggle", duration: 200 },
                    autoFocus: false,
                    onBlur: function (node) {


                        setTimeout(function () {
                            var $dateInput = $(node.span).find('#date' + node.data.key);
                            var time = $(node.span).find('#time').val();

                            var date = $.datepicker.formatDate("yy-mm-dd", $dateInput.datepicker("getDate"));
                            pubsub.trigger('test:date:changed', node.data.code, date);

                            //console.log('onblur',date,time, arguments);

                        }, 100);


                    },
                    onClick: function (node, event) {
                        //event.preventDefault();
//
//                        if(event.target.name == 'sito'){
//                            var $checkbox = $(event.target);
//                            //$checkbox.prop('checked',true)
//                            console.log('checkbox', $checkbox,$checkbox.prop('checked'));
//
//
//                            console.log('checkbox', $checkbox,$checkbox.prop('checked'));
////                            $checkbox.attr('checked',!$checkbox.is(':checked')).addClass('blablabla');
//                        }
//
//                        console.log('onclick',arguments);
                    },
                    onFocus: function () {
                        // console.log('onFocus',arguments);
                    },
                    onSelect: function (select, node) {
                        var code = node.data.code;
                        //console.log('select', select, node)

                        if (select && code) {
                            view.loadTest(code, function (tree) {
                                node.addChild(tree);
                                //node.expand(true);
                            });
                        }

                        if (!select && code) {
                            view.removeTest(code);
                            node.removeChildren();
                        }
                    },

                    children: view.collection.toJSON()
                });

                //UIInitialize(this.el);
                return view;
            }

        });


        return SetOfTestsView;

    });
