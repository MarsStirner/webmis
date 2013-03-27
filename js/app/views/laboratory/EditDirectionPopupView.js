/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory-edit-popup.tmpl",
    "views/ui/SelectView"],
    function (tmpl, SelectView) {

        return View.extend({
            template: tmpl,
            className: "popup",

            events: {
                "click .ShowHidePopup": "close",
                "click .save": "onSave",
                "click .MKBLauncher": "toggleMKB"
            },
            initialize: function () {
                var view = this;

                view.doctor = view.getDoctor();


                view.model = this.options.model;
                console.log('popup init', view.model)
            },

            initFinanseSelect: function (elSelector) {
                var view = this;
                var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

                view.financeDictionary = new App.Collections.DictionaryValues([], {name: 'finance'});


                var modelFinanceAttr = _.find(view.model.get('group')[0].attribute, function (attr) {
                    return attr.name == 'finance';
                });
                var modelFinanceName = modelFinanceAttr.properties[0].value;
                var modelFinanceId;


                view.financeSelect = new SelectView({
                    collection: view.financeDictionary,
                    el: view.$(elSelector),
                    initSelection: modelFinanceId ? modelFinanceId : appealFinanceId
                });

                view.depended(view.financeSelect);


                //
                function getModelFinanceId(financeDictionary, modelFinanceName) {

                    modelFinanceName = 'ДМС';

                    if (!modelFinanceName) return false;

                    var financeDictionaryModel = financeDictionary.find(function (model) {

                        return model.get('value') == modelFinanceName;
                    });

                    console.log('financeDictionaryModel', financeDictionaryModel, financeDictionary);


                }


            },

            getDoctor: function () {
                var view = this;

                var doctorLastName = view.getProperty('doctorLastName');
                var doctorFirstName = view.getProperty('doctorFirstName');

                return  {
                    name: {
                        first: doctorFirstName ? doctorFirstName : Core.Cookies.get("doctorFirstName"),
                        last: doctorLastName ? doctorLastName : Core.Cookies.get("doctorLastName")
                    }
                };

            },
            getProperty: function (name) {
                var view = this;

                var attributes = view.model.get('group')[0].attribute.concat(view.model.get('group')[1].attribute);

                var attr = _.find(attributes, function (attribute) {
                    return attribute.name == name;
                });

                if(!attr) return;

                var property = _.find(attr.properties, function (property) {
                    return property.name == 'value';
                });

                if(!property) return;

                var value = property.value;
//
//                if(attr.type == 'Datetime'){
//                }

                return value;
            },

            toggleMKB: function (event) {
                event.preventDefault();

                this.mkbAttrId = $(event.currentTarget).data("mkb-examattr-id");

                this.mkbDirectory.open();
            },
            onMKBConfirmed: function (event) {
                var sd = event.selectedDiagnosis;
                console.log('sd', sd, sd.get("id"));

                this.mkbAttrId = sd.get("id");

                this.setExamAttr({
                    attrId: this.mkbAttrId,
                    propertyType: "valueId",
                    value: sd.get("id") || sd.get("code"),
                    displayText: sd.get("code") || sd.get("id")
                });

                this.$("input[name='diagnosis[mkb][code]']").val(sd.get("code"));
                this.$("input[name='diagnosis[mkb][diagnosis]']").val(sd.get("diagnosis"));
            },

            onMKBCodeKeyUp: function (event) {
                $(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
            },
            setExamAttr: function (opts) {


//                var examAttr = this.examAttributes.find(function (a) {
//                    return a.get("typeId") == opts.attrId;
//                });

                console.log('setExamAttr', opts);

                var $input = this.$("[data-examattr-id=" + opts.attrId + "]");

                if ($input.val() != opts.value || opts.displayText) {
                    $input.val(opts.displayText || opts.value).change();
                }
            },
            modelToTree: function(){
                var view = this;
                var tree = [];
                var root = {};
                root.title = view.model.get('name');
                root.expand = true;
                root.icon = false;
                root.select= true;
                root.unselectable = true;

                root.children = [];

                var attributes = view.model.get('group')[1].attribute;
                var stringAttributes = _.filter(attributes,function(attr){
                    return attr.type == "String";
                });

                root.children = _.map(stringAttributes, function(attr){
                    return {title: attr.name,noCustomRender:true, icon: false}
                });

                return [root];

               // root.cito = view.model.get('group')[0].attribute[8].properties[0].value;
                    console.log('modelToTree',root)
            },

            render: function () {
                var view = this;

                ///if ($(view.$el.parent().length).length === 0) {

                view.$el.html($.tmpl(view.template, {doctor: view.doctor}));

                this.mkbDirectory = new App.Views.MkbDirectory();
                this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
                this.mkbDirectory.render();

                var patientSex = Cache.Patient.get("sex").length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;



                view.$('.edit-tree').dynatree({
                    clickFolderMode: 2,
                    minExpandLevel: 2,

                    generateIds: true,
                    noLink: true,
                    checkbox: true,
                    children: view.modelToTree(),
                    onRender: function (node, nodeSpan) {
                        //console.log(node, nodeSpan)
                        UIInitialize($(nodeSpan));


                        //$(nodeSpan).find(".SelectDate").datepicker("setDate", "+1");

                        $(nodeSpan).find(".HourPicker").mask("99:99");

//                        var $citoCheckbox = $(nodeSpan).find("input[name='sito']");
//
//                        $citoCheckbox.on('click', function (e) {
//                            //.dynatree("option", "autoCollapse", true);
//                            node.data.cito = $citoCheckbox.prop('checked');
//                            if (node.data.code) {
//                                pubsub.trigger('test:cito:changed', node.data.code, $citoCheckbox.prop('checked'));
//                            }
//                        });
                    },
                    onCustomRender: function (node) {
                        var html = '';
                        if (node.data.noCustomRender) {

                            html += '<span class="title-col">';
                            //html += "<a class='dynatree-title' href='#'>";
                            html += node.data.title;
                           // html += "</a>";
                            html += '</span>';

                        }else{
                            html += '<table><tr><td class="title-col">';

                            //html += "<a class='dynatree-title' href='#'>";

                            html += node.data.title;
                            //html += "</a>";
                            html += '</td>';



                            html += '<td class="sito-col" >';

                            html += '<input  type="checkbox" val="" name="cito' + node.data.key + '" id="cito' + node.data.key + '" />';
                            html += '</td>';

                            html += '<td class="time-col" >';

                            html += '<div class="DataTime" style="font-size: 9px;width: 160px;">';

                            html += '<div class="DatePeriod SingleDate">' +
                                '<div class="FromTo">' +
                                '<input type="text"  id="date' + node.data.key + '" name="date' + node.data.key + '" placeholder="дд.мм.гггг" class="SelectDate" data-mindate="0">' +
                                '</div><i class="DateIcon Icon"></i></div>';

                            html += '<div class="SingleTime" style="width: 4.5em;margin: 0 2em 0 .5em;display: inline-block;vertical-align: middle;">' +
                                '<input type="text" id="time' + node.data.key + '" class="HourPicker" value="07:00" data-relation="#date' + node.data.key + '" name="time' + node.data.key + '" placeholder="чч:мм" required="required">' +
                                '</div>';

                            html += '</div>';
                            html += '</td></tr></table>'
}



                        return html;
                    }
                });
                //автокомплит для кода диагноза
                this.$("input[name='diagnosis[mkb][code]']").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "/data/mkbs/",
                            dataType: "jsonp",
                            data: {
                                filter: {
                                    view: "mkb",
                                    code: request.term,
                                    sex: patientSex
                                }
                            },
                            success: function (raw) {
                                response($.map(raw.data, function (item) {
                                    return {
                                        label: item.code + " " + item.diagnosis,
                                        value: item.code,
                                        id: item.id,
                                        diagnosis: item.diagnosis
                                    }
                                }));
                            }
                        });
                    },
                    minLength: 2,
                    select: function (event, ui) {
                        view.mkbAttrId = $(this).data("mkb-examattr-id");

                        view.setExamAttr({
                            attrId: self.mkbAttrId,
                            propertyType: "valueId",
                            value: ui.item.id,
                            displayText: ui.item.value
                        });

                        console.log('ui.item', ui.item)

                        view.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);

                    }
                }).on("keyup", function () {
                        if (!$(this).val().length) {
                            view.setExamAttr({
                                attrId: self.mkbAttrId,
                                propertyType: "valueId",
                                value: "",
                                displayText: ""
                            });

                            view.$("input[name='diagnosis[mkb][diagnosis]']").val("");
                        }
                    });


                //Вид оплаты
                view.initFinanseSelect('#finance');

                UIInitialize(this.el);

                //Диагноз
                var diagnosis = view.getProperty('Направительный диагноз');
                if(diagnosis){
                    diagnosis = diagnosis.split(/\s+/);
                    var diagnosisCode = diagnosis[0];
                    var diagnosisText = (diagnosis.splice(1)).join(' ');
                    view.$("input[name='diagnosis[mkb][diagnosis]']").val(diagnosisText);
                    view.$("input[name='diagnosis[mkb][code]']").val(diagnosisCode);
                }


                //Дата и время создания
                var assessmentBeginDate = view.getProperty('assessmentBeginDate')
                var date = new Date(assessmentBeginDate);
                this.$("#start-date").datepicker("setDate", date);
                this.$("#start-time").val(date.getHours() + ':' + date.getMinutes()).mask("99:99");


                $("body").append(this.el);

                view.$el.dialog({
                    autoOpen: false,
                    width: "116em",
                    modal: true,
                    dialogClass: "webmis",
                    title: "Редактирование направления"

                });


                // }

                return view;
            },

            onSave: function () {
                var popup = this;
                console.log('onsave')

            },

            open: function () {
                this.$el.dialog("open");
                //$(".ui-dialog-titlebar").hide();

            },

            close: function () {
                this.$el.dialog("close");
                //$(".ui-dialog-titlebar").hide();
                this.$el.remove();

            }
        });

    });
