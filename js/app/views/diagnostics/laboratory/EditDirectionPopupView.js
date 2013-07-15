/**
 * User: FKurilov
 * Date: 25.06.12
 */

//попап редактирования направления на лабисследование

define(function(require) {
	var tmpl = require('text!templates/diagnostics/laboratory/laboratory-edit-popup.tmpl');
	var popupMixin = require('mixins/PopupMixin');
	var SelectView = require("views/ui/SelectView");
	var test4EditTmpl = require('text!templates/diagnostics/laboratory/node-test4edit.html');
	var MkbInputView = require("views/ui/MkbInputView");
	var PersonDialogView = require('views/ui/PersonDialog');

	return View.extend({
		template: tmpl,
		events: {
			'click #assigner-outer': 'openAssignerSelectPopup',
            "click #executor-outer": "openExecutorSelectPopup"
		},
		initialize: function() {
			_.bindAll(this);

			var view = this;



			// this.data = {
			// 	'assigner': view.assigner
			// }

			view.appeal = view.options.appeal;
			view.diagnosis = view.appeal.getDiagnosis();


			view.model = this.options.model;
			view.model.eventId = view.options.appeal.get('id');
			//console.log('popup init', view.model);

			view.assigner = view.getAssigner();
			view.executor = view.getExecutor();

			//инпут классификатора диагнозов
			view.mkbInputView = new MkbInputView();
			view.depended(view.mkbInputView);

			pubsub.on('assigner:changed', function(assigner) {
				console.log('assigner:changed',arguments, view)
				view.assigner = assigner;
				view.ui.$assigner.val(assigner.name.raw);

			});

            pubsub.on('executor:changed', function(executor) {
            	console.log('executor:changed',arguments, view)
                view.executor = executor;
                view.ui.$executor.val(executor.name.raw);

            });


            console.log('view',view);

		},

        openAssignerSelectPopup: function() {
            this.personDialogView = new PersonDialogView({
                appeal: this.options.appeal,
                title: 'Направивший врач',
                callback: function(person){
                    pubsub.trigger('assigner:changed', person);
                }
            });

            this.personDialogView.render().open();

        },

        openExecutorSelectPopup: function() {
            this.personDialogView = new PersonDialogView({
                appeal: this.options.appeal,
                title: 'Исполнитель',
                callback: function(person){
                    pubsub.trigger('executor:changed', person);
                }
            });

            this.personDialogView.render().open();

        },

		initFinanseSelect: function(elSelector) {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			view.financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			var modelFinanceId = view.model.getProperty('finance');

			view.financeSelect = new SelectView({
				collection: view.financeDictionary,
				el: view.$(elSelector),
				initSelection: modelFinanceId ? modelFinanceId : appealFinanceId
			});

			view.depended(view.financeSelect);

		},

		getAssigner: function() {
			var view = this;

			var assignerLastName = view.model.getProperty('assignerLastName');
			var assignerFirstName = view.model.getProperty('assignerFirstName');
			var assignerMiddleName = view.model.getProperty('assignerMiddleName');
			var assignerId = view.model.getProperty('assignerId');

			return {
				id: assignerId ? assignerId : Core.Cookies.get("userId"),
				name: {
					first: assignerFirstName ? assignerFirstName : Core.Cookies.get("doctorFirstName"),
					last: assignerLastName ? assignerLastName : Core.Cookies.get("doctorLastName"),
					middle: assignerMiddleName ? assignerMiddleName : ''
				}
			};

		},

		getExecutor: function() {
			var view = this;

			var executorLastName = view.model.getProperty('doctorLastName');
			var executorFirstName = view.model.getProperty('doctorFirstName');
			var executorMiddleName = view.model.getProperty('doctorMiddleName');
			var executorId = view.model.getProperty('executorId');

			return {
				id: executorId ? executorId : '',
				name: {
					first: executorFirstName ? executorFirstName : '',
					last: executorLastName ? executorLastName : '',
					middle: executorMiddleName ? executorMiddleName : ''
				}
			};

		},


		modelToTree: function() {
			var view = this;
			var tree = [];
			var root = {};
			root.title = view.model.get('name');
			root.expand = true;
			root.icon = false;
			root.select = true;
			root.unselectable = true;
			var plannedEndDate = moment(view.model.getProperty('plannedEndDate'), "YYYY-MM-DD HH:mm:ss"); //2013-03-30 07:00:00
			console.log('plannedEndDate', plannedEndDate);
			root.date = moment(plannedEndDate).format('DD.MM.YYYY');
			root.time = moment(plannedEndDate).format('HH:mm');

			root.cito = view.model.getProperty('urgent');


			root.children = [];

			var attributes = view.model.get('group')[1].attribute;
			var stringAttributes = _.filter(attributes, function(attr) {
				return attr.type == "String";
			});

			root.children = _.map(stringAttributes, function(attr) {
				return {
					title: attr.name,
					noCustomRender: true,
					icon: false,
					select: attr.properties[0].value == 'true' ? true : false
				};
			});

			return [root];
		},

		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		render: function() {
			var view = this;
			console.log('render', view);

			view.$el.html(_.template(view.template, {
				assigner: view.assigner,
				executor: view.executor
			}));

			view.renderNested(view.mkbInputView, ".mkb");

			view.ui = {};
			view.ui.$mkbDiagnosis = view.$("input[name='diagnosis[mkb][diagnosis]']");
			view.ui.$mkbCode = view.$("input[name='diagnosis[mkb][code]']");
			view.ui.$startDate = view.$("#start-date");
			view.ui.$startTime = view.$("#start-time");
			view.ui.$finance = view.$('#finance');
			view.ui.$assigner = view.$('#assigner');
            view.ui.$executor = view.$('#executor');

			this.$('.change-assigner,.change-executor').button();

			view.$('.edit-tree').dynatree({
				clickFolderMode: 2,
				minExpandLevel: 2,

				generateIds: true,
				noLink: true,
				checkbox: true,
				children: view.modelToTree(),
				onRender: function(node, nodeSpan) {
					//console.log(node, nodeSpan)
					UIInitialize($(nodeSpan));

					$(nodeSpan).find(".HourPicker").mask("99:99").timepicker({
						showPeriodLabels: false
					});

				},
				onCustomRender: function(node) {

					var html = '';
					if (node.data.noCustomRender) {

						html += '<span class="title-col">';
						html += node.data.title;
						html += '</span>';

					} else {

						if (node.data.cito == "true") {
							node.data.checked = 'checked="checked"';
						} else {
							node.data.checked = '';
						}
						html = _.template(test4EditTmpl, node.data);
					}

					return html;
				}
			});



			//Вид оплаты
			view.initFinanseSelect('#finance');



			//Диагноз
			var diagnosis = view.model.getProperty('Направительный диагноз', 'value');
			var diagnosisId = view.model.getProperty('Направительный диагноз', 'valueId');
			if (diagnosis) {
				//console.log('diagnosis',diagnosis);
				diagnosis = diagnosis.split(/\s+/);
				var diagnosisCode = diagnosis[0];
				var diagnosisText = (diagnosis.splice(1)).join(' ');
				view.ui.$mkbDiagnosis.val(diagnosisText);
				view.ui.$mkbCode.val(diagnosisCode);
				view.ui.$mkbCode.data('mkb-id', diagnosisId);
			}


			//Дата и время создания
			var assessmentBeginDate = view.model.getProperty('assessmentBeginDate');
			var date = new Date(assessmentBeginDate);
			view.ui.$startDate.datepicker();
			view.ui.$startDate.datepicker("setDate", date);
			view.ui.$startTime.val(('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});



			return view;
		},

		onSave: function() {
			var view = this;


			var tree = view.$('.edit-tree').dynatree("getTree");


			var startDate = moment(view.ui.$startDate.datepicker("getDate")).format('YYYY-MM-DD');
			var startTime = view.ui.$startTime.val() + ':00';


			var modelTree = tree.toDict().children[0];
			//console.log('modelTree', modelTree)
			var $dateInput = view.$('#date' + modelTree.key);
			var date = moment($dateInput.datepicker("getDate")).format('YYYY-MM-DD');

			var $timeInput = view.$('#time' + modelTree.key);
			var time = $timeInput.val() + ':00';

			var $citoInput = view.$('#cito' + modelTree.key);
			var cito = $citoInput.prop('checked');

			//console.log('node inputs', date, time, cito)

			var selected_params = _.filter(modelTree.children, function(node) {
				return node.select === true;
			});

			var unselected_params = _.filter(modelTree.children, function(node) {
				return node.select === false;
			});

			var group = view.model.get('group');

			//выбранные тесты
			_.each(selected_params, function(param) {
				//view.model.setProperty(param.title, 'isAssigned', "true");
				_.each(group[1].attribute, function(attribute, index) {
					if (attribute.name == param.title) {
						group[1].attribute[index].properties[0].value = 'true';
					}
				});
			});

			_.each(unselected_params, function(param) {
				//view.model.setProperty(param.title, 'isAssigned', "false");
				_.each(group[1].attribute, function(attribute, index) {
					if (attribute.name == param.title) {
						group[1].attribute[index].properties[0].value = 'false';
					}
				});
			});

			view.model.setProperty('doctorFirstName', 'value', view.executor.name.first);
			view.model.setProperty('doctorLastName', 'value', view.executor.name.last);
			view.model.setProperty('doctorMiddleName', 'value', view.executor.name.middle);
			view.model.setProperty('executorId', 'value', view.executor.id);

           view.model.setProperty('assignerFirstName', 'value', view.assigner.name.first);
           view.model.setProperty('assignerLastName', 'value', view.assigner.name.last);
           view.model.setProperty('assignerMiddleName', 'value', view.assigner.name.middle);
           view.model.setProperty('assignerId', 'value', view.assigner.id);


			view.model.setProperty('urgent', 'value', cito);
			view.model.setProperty('plannedEndDate', 'value', date + ' ' + time);
			view.model.setProperty('assessmentBeginDate', 'value', startDate + ' ' + startTime);
			view.model.setProperty('finance', 'value', view.ui.$finance.val());
			if(view.ui.$mkbCode.data('mkb-id')){
				view.model.setProperty('Направительный диагноз', 'valueId', view.ui.$mkbCode.data('mkb-id'));
			}



			console.log('attr',view.model.get('group'))
			view.model.set('group', group);

			view.model.save({}, {
				success: function() {
					pubsub.trigger('lab-diagnostic:added');
					//pubsub.trigger('noty', {text:'Направление обновлено'});
					view.close();
				},
				error: function(a,b,c){
					var errorMessage = (JSON.parse(b.responseText)).errorMessage;

					pubsub.trigger('noty', {text:errorMessage,type:'error'});
					//console.log('save error', (JSON.parse(b.responseText)).errorMessage);

				}
			});



		},

		close: function() {
			this.$el.dialog("close");
			this.$el.remove();
			pubsub.off('assigner:changed');
			pubsub.off('executor:changed');

			this.mkbInputView.close();
			this.financeSelect.close();


		}

	}).mixin([popupMixin]);

});
