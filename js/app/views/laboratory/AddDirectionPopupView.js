/**
 * User: FKurilov
 * Date: 25.06.12
 */
//попап создания направления на лабисследование
define([
	"text!templates/appeal/edit/popups/laboratory.tmpl",
	"mixins/PopupMixin",
	"collections/diagnostics/Labs",
	"views/laboratory/LabsView",

	"collections/diagnostics/LabGroups",
	"views/laboratory/LabGroupsView",

	"collections/diagnostics/LabGroupTests",
	"views/laboratory/LabGroupTestsView",

	"views/ui/SelectView",
	"views/ui/MkbInputView"],

function(
tmpl,
popupMixin,
LabsCollection,
LabsCollectionView,

GroupsCollection,
GroupsView,

GroupTestsCollection,
GroupTestsView,

SelectView,
MkbInputView) {

	var LaboratoryPopup = View.extend({
		template: tmpl,
		className: "popup",

		events: {
			"click .ShowHidePopup": "close"
		},
		initialize: function() {
			_.bindAll(this);

			var view = this;



			//юзер
			view.doctor = {
				name: {
					first: Core.Cookies.get("doctorFirstName"),
					last: Core.Cookies.get("doctorLastName")
				}
			};

			view.data = {
				'doctor': view.doctor
			};


			view.appeal = view.options.appeal;
			console.log('appeal', view.appeal);


			var TestCollection = Collection.extend({
				url: DATA_PATH + 'appeals/' + this.appeal.get('id') + '/diagnostics/laboratory',
				updateAll: function() {
					var collection = this;
					options = {
						dataType: "jsonp",
						contentType: 'application/json',
						success: function(data, status) {
							console.log('updateAll success', arguments);
							if (status == 'success') {
								collection.trigger('updateAll:success', arguments);
							} else {
								//collection.trigger('updateAll:error',status);
							}
						},
						error: function(x, status) {

							var response = $.parseJSON(x.responseText);
							collection.trigger('updateAll:error', response);
							console.log('updateAll error', response.exception, response.errorCode, response.errorMessage, arguments);
						},
						data: JSON.stringify({
							data: collection.toJSON()
						})
					};

					return Backbone.sync('create', this, options);
				}

			});

			view.testCollection = new TestCollection();


			view.testCollection.on('add remove reset', function() {
				view.saveButton(view.testCollection.length);
				console.log('testCollection changed', view.testCollection);
			}, view);

			view.testCollection.on('updateAll:success', function() {
				pubsub.trigger('lab-diagnostic:added');

				view.close();
			});

			view.testCollection.on('updateAll:error', function(response) {
				pubsub.trigger('noty', {
					text: 'Ошибка: ' + response.exception + ', errorCode: ' + response.errorCode,
					type: 'error'
				});
			});


			//диагнозы из госпитализации
			view.appealDiagnosis = view.appeal.getDiagnosis();

			//лаборатории
			view.labsCollection = new LabsCollection();

			view.labsCollection.setParams({
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.labsCollectionView = new LabsCollectionView({
				collection: view.labsCollection
			});

			view.depended(view.labsCollectionView);


			//группы лаб.исследований
			view.groupsCollection = new GroupsCollection();

			view.groupsCollection.setParams({
				'filter[view]': 'tree',
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.groupsView = new GroupsView({
				collection: view.groupsCollection
			});


			view.depended(view.groupsView);


			//лаб.исследования из определённой группы
			view.groupTestsCollection = new GroupTestsCollection();

			view.groupTestsCollection.setParams({
				sortingField: "name",
				sortingMethod: "asc"
			});

			view.groupTestsView = new GroupTestsView({
				collection: view.groupTestsCollection,
				patientId: view.options.appeal.get('patient').get('id'),
				testCollection: view.testCollection
			});

			view.depended(view.groupTestsView);

			//инпут классификатора диагнозов
			view.mkbInputView = new MkbInputView();
			view.depended(view.mkbInputView);


			pubsub.on('group:click parent-group:click', function() {
				view.testCollection.reset();
			}, view);


		},

		initFinanseSelect: function() {
			var view = this;
			var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

			var financeDictionary = new App.Collections.DictionaryValues([], {
				name: 'finance'
			});

			//financeDictionary.fetch();

			view.financeSelect = new SelectView({
				collection: financeDictionary,
				el: view.$('#finance'),
				initSelection: appealFinanceId
			});

			view.depended(view.financeSelect);
		},

		saveButton: function(enabled) {
			var $saveButton = this.$el.closest(".ui-dialog").find('.save');

			if (enabled) {
				$saveButton.button("enable");
			} else {
				$saveButton.button("disable");
			}

		},

		onSave: function() {
			var view = this;

			//надо: юзер меняет данные, вью отражает изменение данных в модели

			var tree = view.$('.lab-tests-list2').dynatree("getTree");


			var selected = _.filter(tree.toDict().children, function(node) {
				return node.select === true;
			});

			var $startDateInput = $('#start-date');
			var startDate = moment($startDateInput.datepicker("getDate")).format('YYYY-MM-DD');
			var $startTimeInput = $('#start-time');
			var startTime = $startTimeInput.val() + ':00';


			//console.log('onSave tree selected', selected);


			view.testCollection.forEach(function(model) {


				var modelTree = _.find(selected, function(node) {
					return node.code == model.get('code');
				});

				var $dateInput = view.$('#date' + modelTree.key);
				var date = moment($dateInput.datepicker("getDate")).format('YYYY-MM-DD');

				var $timeInput = view.$('#time' + modelTree.key);
				var time = $timeInput.val() + ':00';

				var $citoInput = view.$('#cito' + modelTree.key);
				var cito = $citoInput.prop('checked');

				//console.log('node inputs', date, time, cito);

				var selected_params = _.filter(modelTree.children, function(node) {
					return node.select === true;
				});

				var group = model.get('group');


				//выбранные тесты
				//console.log('modelTree ', model.get('group'), modelTree, selected_params);
				_.each(selected_params, function(param) {
					_.each(group[1].attribute, function(attribute, index) {
						if (attribute.name == param.title) {
							group[1].attribute[index].properties[1].value = 'true';
						}
					});
				});

				view.setParam(model, 'doctorFirstName', 'value', view.doctor.name.first);
				view.setParam(model, 'doctorLastName', 'value', view.doctor.name.last);
				view.setParam(model, 'doctorMiddleName', 'value', '');
				view.setParam(model, 'urgent', 'value', cito);
				view.setParam(model, 'plannedEndDate', 'value', date + ' ' + time);
				view.setParam(model, 'assessmentDate', 'value', startDate + ' ' + startTime);
				var mkbId = view.$("input[name='diagnosis[mkb][code]']").data('mkb-id');
				view.setParam(model, 'Направительный диагноз', 'valueId', mkbId);

				view.setParam(model, 'finance', 'value', $($('#finance option:selected')[0]).val());

				model.set('group', group);

			});
			view.testCollection.updateAll();

		},

		setParam: function(model, attributeName, propertyName, value) {

			var group = model.get('group');

			var find = false;
			_.each(group, function(g, groupIndex) {
				_.each(g.attribute, function(a, attributeIndex) {
					if (a.name == attributeName) {
						_.each(a.properties, function(p, propertyIndex) {
							if (p.name == propertyName) {
								console.log('нашли', groupIndex, attributeIndex, propertyIndex);
								group[groupIndex].attribute[attributeIndex].properties[propertyIndex]['value'] = value;
								find = true;
							}

						});

						if (!find) { //нет нужного проперти, вставляем его
							group[groupIndex].attribute[attributeIndex].properties.push({
								name: propertyName,
								value: value
							});
							//console.log('не нашли', groupIndex, attributeIndex, group[groupIndex].attribute[attributeIndex].properties);
						}

					}
				});
			});

			model.set('group', group);

			//console.log('setParam', attributeName, propertyName, value, group);

		},



		renderNested: function(view, selector) {
			var $element = (selector instanceof $) ? selector : this.$el.find(selector);
			view.setElement($element).render();
		},

		// open: function() {
		// 	this.$el.dialog("open");
		// },

		close: function() {
			var view = this;
			this.$el.dialog("close");
			this.$el.remove();

			view.labsCollectionView.close();
			view.groupsView.close();
			view.groupTestsView.close();
			view.mkbInputView.close();
			view.financeSelect.close();

		},

		render: function() {
			var view = this;

			//if ($(view.$el.parent().length).length === 0) {

			view.$el.html($.tmpl(this.template, {
				doctor: this.doctor
			}));



			view.renderNested(view.labsCollectionView, ".labs");
			view.labsCollection.fetch();

			view.renderNested(view.groupsView, ".groups");

			view.renderNested(view.groupTestsView, ".group-tests");

			view.renderNested(view.mkbInputView, ".mbk");

			//селект вида оплаты
			view.initFinanseSelect();



			//установка диагноза
			if (view.appealDiagnosis) {
				view.$("input[name='diagnosis[mkb][diagnosis]']").val(view.appealDiagnosis.get('mkb').get('diagnosis'));
				view.$("input[name='diagnosis[mkb][code]']").val(view.appealDiagnosis.get('mkb').get('code'));
				view.$("input[name='diagnosis[mkb][code]']").data('mkb-id', view.appealDiagnosis.get('mkb').get('id'));
			}


			UIInitialize(this.el);


			//Дата и время создания
			var now = new Date();
			this.$("#start-date").datepicker("setDate", now);
			this.$("#start-time").val(('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2)).mask("99:99").timepicker({
				showPeriodLabels: false
			});

			// //попап
			// $(view.el).dialog({
			// 	autoOpen: false,
			// 	width: "116em",
			// 	modal: true,
			// 	dialogClass: "webmis",
			// 	title: "Создание направления",
			// 	onClose: view.close,
			// 	buttons: [{
			// 		text: "Сохранить",
			// 		click: this.onSave,
			// 		"class": "button-color-green save"
			// 	}, {
			// 		text: "Отмена",
			// 		click: this.close
			// 	}]
			// });

			//до того как выбран тест кнопка сохранить не активна
			this.$el.closest(".ui-dialog").find('.save').button("disable");


			return view;
		}

	}).mixin([popupMixin]);

	return LaboratoryPopup;
});
