/**
 * User: FKurilov
 * Date: 25.06.12
 */

define(function(require) {
    var popupMixin = require('mixins/PopupMixin');

    var InstrumentalResearchs = require('collections/diagnostics/instrumental/InstrumentalResearchs');
    var InstrumentalResearchTemplate = require('models/diagnostics/instrumental/InstrumentalResearchTemplate');
    var InstrumntalGroups = require('collections/diagnostics/instrumental/InstrumntalGroups');

    var BFView = require('views/diagnostics/instrumental/InstrumentalPopupBottomFormView');
    var PersonDialogView = require('views/ui/PersonDialog');
    var ResearchGroupsListView = require('views/diagnostics/instrumental/ResearchGroupsListView');
    var ResearchListView = require('views/diagnostics/instrumental/ResearchsListView');
    var ViewModel = require('views/diagnostics/instrumental/InstrumentalPopupViewModel');

    var popupTmpl = require('text!templates/diagnostics/instrumental/instrumental-popup.tmpl');


    var InstrumentalPopup = View.extend({

        template: popupTmpl,
        events: {
            'click #assigner-outer': 'openAssignerSelectPopup',
            'click #executor-outer': 'openExecutorSelectPopup'
        },

        initialize: function(options) {
            var view = this;

            _.bindAll(this);


            this.viewModel = new ViewModel({}, {
                appeal: this.options.appeal
            });

            this.viewModel.on('change:saveButtonState', this.updateSaveButton, this);

            //диагнозы из госпитализации
            this.appealDiagnosis = this.options.appeal.getDiagnosis();

            //список групп исследований
            this.instrumntalResearchs = new InstrumntalGroups();

            this.researchGroupsListView = new ResearchGroupsListView({
                collection: this.viewModel.instrumntalGroups
            });

            this.viewModel.instrumntalGroups.fetch();

            //список исследований в выбранной группе
            this.researchListView = new ResearchListView({
                collection: this.instrumntalResearchs

            });


            this.bfView = new BFView({
                data: this.viewModel.toJSON()
            });
            this.depended(this.bfView);


            pubsub.on('research:selected', function(code) {
                view.viewModel.set('code', code);
                //шаблон данных в формате commonData
                view.testTemplate = new InstrumentalResearchTemplate({}, {
                    code: view.viewModel.get('code'),
                    patientId: view.viewModel.get('patientId')
                });

                view.testTemplate.fetch().done(function() {
                    if (view.testTemplate.getProperty('executorId', 'value') > 0) {
                        var executor = {
                            id: view.testTemplate.getProperty('executorId', 'value'),
                            name: {
                                first: view.testTemplate.getProperty('doctorFirstName', 'value'),
                                middle: view.testTemplate.getProperty('doctorMiddleName', 'value'),
                                last: view.testTemplate.getProperty('doctorLastName', 'value')
                            }
                        }

                        pubsub.trigger('executor:changed', executor);

                    }

                });

                console.log('research:selected', code);
            });

            pubsub.on('research:deselected', function(code) {
                view.viewModel.set('code', '');
                if (view.testTemplate) {
                    view.testTemplate.clear();
                }
                var executor = {
                    id: '',
                    name: {
                        first: '',
                        middle: '',
                        last: ''
                    }
                }

                pubsub.trigger('executor:changed', executor);

                console.log('research:deselected', code);
            });

            pubsub.on('assigner:changed', function(assigner) {
                console.log('assign-person: changed', assigner);

                view.viewModel.set('assignerId', assigner.id);
                view.viewModel.set('assignerFirstName', assigner.name.first);
                view.viewModel.set('assignerMiddleName', assigner.name.middle);
                view.viewModel.set('assignerLastName', assigner.name.last);
                view.$assigner.val(assigner.name.last + ' ' + assigner.name.first + ' ' + assigner.name.middle);

            });

            pubsub.on('executor:changed', function(executor) {
                view.executor = executor;

                view.viewModel.set('executorId', executor.id);
                view.viewModel.set('doctorFirstName', executor.name.first);
                view.viewModel.set('doctorMiddleName', executor.name.middle);
                view.viewModel.set('doctorLastName', executor.name.last);

                view.$executor.val(executor.name.last + ' ' + executor.name.first + ' ' + executor.name.middle);

            });


        },

        openAssignerSelectPopup: function() {
            this.personDialogView = new PersonDialogView({
                title: 'Направивший врач',
                appeal: this.options.appeal,
                callback: function(person) {
                    pubsub.trigger('assigner:changed', person);
                }
            });

            this.personDialogView.render().open();

        },

        openExecutorSelectPopup: function() {
            this.personDialogView = new PersonDialogView({
                appeal: this.options.appeal,
                title: 'Исполнитель',
                callback: function(person) {
                    pubsub.trigger('executor:changed', person);
                }
            });

            this.personDialogView.render().open();

        },

        updateSaveButton: function() {
            this.$saveButton.button().button(this.viewModel.get('saveButtonState'));
        },

        onSave: function() {
            var view = this;

            if (!view.viewModel.get('code')) {
                return;
            }

            // //шаблон данных в формате commonData
            // view.testTemplate = new InstrumentalResearchTemplate({}, {
            //     code: view.viewModel.get('code'),
            //     patientId: view.viewModel.get('patientId')
            // });

            // view.testTemplate.fetch().done(view.saveTest);
            view.saveTest();

        },

        saveTest: function() {
            var view = this;

            view.testTemplate.setProperty('assignerId', 'value', view.viewModel.get('assignerId'));
            //assignerFirstName - имя врача назначившего исследование
            view.testTemplate.setProperty('assignerFirstName', 'value', view.viewModel.get('assignerFirstName'));
            //assignerMiddleName - отчество врача назначившего исследование
            view.testTemplate.setProperty('assignerMiddleName', 'value', view.viewModel.get('assignerMiddleName'));
            //assignerLastName - фамилия врача назначившего исследование
            view.testTemplate.setProperty('assignerLastName', 'value', view.viewModel.get('assignerLastName'));

            view.testTemplate.setProperty('executorId', 'value', view.viewModel.get('executorId'));
            //doctorFirstName - имя врача исполнителя исследование
            view.testTemplate.setProperty('doctorFirstName', 'value', view.viewModel.get('doctorFirstName'));
            //doctorMiddleName - отчество врача исполнителя исследование
            view.testTemplate.setProperty('doctorMiddleName', 'value', view.viewModel.get('doctorMiddleName'));
            // doctorLastName - фамилия врача исполнителя исследование
            view.testTemplate.setProperty('doctorLastName', 'value', view.viewModel.get('doctorLastName'));


            //assessmentDate - дата создания направления на исследование
            var assessmentDate = moment(view.viewModel.get('assessmentDate')).format('YYYY-MM-DD');
            var assessmentTime = view.viewModel.get('assessmentTime') + ':00';
            view.testTemplate.setProperty('assessmentDate', 'value', assessmentDate + ' ' + assessmentTime);

            //plannedEndDate - планируемая дата выполнения иследования
            var plannedDate = moment(view.viewModel.get('plannedDate')).format('YYYY-MM-DD');
            var plannedTime = view.viewModel.get('plannedTime') + ':00';
            view.testTemplate.setProperty('plannedEndDate', 'value', plannedDate + ' ' + plannedTime);

            //finance - идентификатор типа оплаты
            view.testTemplate.setProperty('finance', 'value', view.viewModel.get('finance'));

            //urgent - срочность
            view.testTemplate.setProperty('urgent', 'value', view.viewModel.get('urgent'));

            //идентификатор направительного диагноза
            if (view.viewModel.get('mkbId')) {
                view.testTemplate.setProperty('Направительный диагноз', 'valueId', view.viewModel.get('mkbId'));
            }


            view.viewModel.set('saveButtonState', 'disable');

            //создание направления сейчас реализованно только для группы тестов....
            //поэтому создаём коллекцию и добавляем в неё модель...
            view.tests = new InstrumentalResearchs(null, {
                appealId: view.viewModel.get('appealId')
            });

            view.tests.add(view.testTemplate);

            view.tests.saveAll({
                success: function(raw, status) {
                    view.close();
                    pubsub.trigger('instrumental-diagnostic:added');
                },
                error: function() {

                }
            });

        },

        render: function() {
            var view = this;
            view.renderNested(this.bfView, ".bottom-form");
            view.researchGroupsListView.setElement(this.$el.find('.instrumental-groups'));
            view.researchListView.setElement(this.$el.find('.instrumental-researchs'));

            return this;
        },
        afterRender: function() {
            var view = this;

            view.$assessmentDatepicker = view.$('#start-date');
            view.$assessmentTimepicker = view.$('#start-time');
            view.$instrumentalGroups = view.$('.instrumental-groups');
            view.$instrumentalResearchs = view.$('.instrumental-researchs');
            view.$plannedDatepicker = view.$("#dp");
            view.$plannedTimepicker = view.$("#tp");
            view.$saveButton = view.$el.closest(".ui-dialog").find('.save');
            view.$assigner = view.$("#assigner");
            view.$executor = view.$("#executor");
            view.$mbkCode = view.$("input[name='diagnosis[mkb][code]']");
            view.$mbkDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");

            this.$('.change-assigner,.change-executor').button();


            //установка диагноза
            if (view.appealDiagnosis) {
                console.log('view.appealDiagnosis', view.appeal, view.appealDiagnosis.get('mkb').get('diagnosis'));
                view.$mbkDiagnosis.val(view.appealDiagnosis.get('mkb').get('diagnosis'));
                view.$mbkCode.val(view.appealDiagnosis.get('mkb').get('code'));
                view.$mbkCode.data('mkb-id', view.appealDiagnosis.get('mkb').get('id'));
            }

            view.$plannedDatepicker.datepicker({
                minDate: new Date(),
                onSelect: function(dateText, inst) {
                    view.viewModel.set('plannedDate', moment(dateText, 'DD.MM.YYYY').toDate());
                    var day = moment(view.$(this).datepicker("getDate")).startOf('day');
                    var currentDay = moment().startOf('day');
                    var currentHour = moment().hour();
                    var hour = view.$plannedTimepicker.timepicker('getHour');
                    //если выбрана текущая дата и время в таймпикере меньше текущего, то сбрасываем таймпикер
                    if (day.diff(currentDay, 'days') === 0) {
                        if (hour <= currentHour) {
                            view.$plannedTimepicker.val('').trigger('change');
                        }
                    }
                }
            });

            view.$plannedDatepicker.datepicker("setDate", this.viewModel.get('plannedDate'));

            view.$plannedTimepicker.timepicker({
                onSelect: function(time) {
                    //view.viewModel.set('plannedTime', time)
                },
                defaultTime: 'now',
                onHourShow: function(hour) {
                    var day = moment(view.$plannedDatepicker.datepicker("getDate")).startOf('day');
                    var currentDay = moment().startOf('day');
                    var currentHour = moment().hour();
                    //если выбран текущий день, то часы меньше текущего нельзя выбрать
                    if (day.diff(currentDay, 'days') === 0) {
                        if (hour < currentHour) {
                            return false;
                        }
                    }

                    return true;
                },
                onMinuteShow: function(hour, minute) {
                    var day = moment(view.$plannedDatepicker.datepicker("getDate")).startOf('day');
                    var currentDay = moment().startOf('day');
                    var currentHour = moment().hour();
                    var currentMinute = moment().minute();
                    //если выбран текущий день и час, то минуты меньше текущего времени нельзя выбрать
                    if (day.diff(currentDay, 'days') === 0) {
                        if (hour === currentHour && minute <= currentMinute) {
                            return false;
                        }
                    }
                    return true;
                },
                showPeriodLabels: false,
                showOn: 'both',
                button: '.icon-time'
            });

            view.$plannedTimepicker.val(this.viewModel.get('plannedTime'));

            view.$plannedTimepicker.on('change', function() {
                view.viewModel.set('plannedTime', view.$plannedTimepicker.val());
            });

            view.$('input[name=urgent]').on('change', function() {
                view.viewModel.set('urgent', view.$('input[name=urgent]:checked').prop('checked'));
            });
            view.$('#finance').on('change', function() {
                view.viewModel.set('finance', view.$(view.$('#finance option:selected')[0]).val());
            });
            this.$("input[name='diagnosis[mkb][code]']").on('change', function() {
                view.viewModel.set('mkbId', view.$("input[name='diagnosis[mkb][code]']").data('mkb-id'));
            });


            view.$saveButton.button(view.viewModel.get('saveButtonState'));
            // view.viewModel.on('change', view.updateSaveButton, view);

        },
        close: function(){
                this.$el.dialog("close");
                this.bfView.close();
                this.researchGroupsListView.close();
                this.researchListView.close();
                this.$el.remove();
        }

    }).mixin([popupMixin]);

    return InstrumentalPopup;
});
