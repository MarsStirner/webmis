/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory.tmpl",
	"collections/diagnostics/Labs",
	"views/laboratory/LabsListView",
	"collections/diagnostics/LabsTests",
	"views/laboratory/TestsGroupListView",
	"views/laboratory/SetOffTestsView",
	"models/diagnostics/SetOfTests",
	"models/diagnostics/laboratory-diag-form",
	"views/ui/SelectView"],
	function (tmpl, Labs, LabsListView,LabsTestsCollection, LabTestsListView, SetOffTestsView, SetOfTestsModel, labAnalysisDirection, SelectView) {

		var LaboratoryPopup = View.extend({
			template: tmpl,
			className: "popup",

			events: {
				"click .ShowHidePopup": "close",
				"click .save": "onSave",
				"click .MKBLauncher": "toggleMKB"
			},
			initialize: function () {
				var popup = this;

				this.doctor = {
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName")
					}
				};

				this.appeal = this.options.appeal;

				this.testCollection = new Backbone.Collection;

				this.testCollection.url = DATA_PATH + 'diagnostics/' + this.appeal.get('id') + '/laboratory';



				this.testCollection.on('add remove', function(){
					this.saveButton(this.testCollection.length);
					console.log('testCollection changed', this.testCollection)
				}, this);

				this.testCollection.on('updateAll:success',function(){

					pubsub.trigger('lab-diagnostic:added');
					popup.close();

				});

				pubsub.on('load-group-tests tg-parent:click', function(){
					popup.testCollection.reset();
				},popup)


			},

			initFinanseSelect: function () {
				var view = this;
				var appealFinanceId = view.options.appeal.get('contract').get('finance').get('id');

				var financeDictionary = new App.Collections.DictionaryValues([], {name: 'finance'});

//				financeDictionary.on('reset', function(){
//					console.log('dictionary',financeDictionary)
//
//				});

				financeDictionary.fetch();

				view.financeSelect = new SelectView({
					collection: financeDictionary,
					el: view.$('#finance'),
					initSelection: appealFinanceId
				});

				view.depended(view.financeSelect);
			},

			toggleMKB: function (event) {
				event.preventDefault();

				this.mkbAttrId = $(event.currentTarget).data("mkb-examattr-id");

				this.mkbDirectory.open();
			},
			onMKBConfirmed: function (event) {
				var sd = event.selectedDiagnosis;
//				this.setExamAttr({
//					attrId: this.mkbAttrId,
//					propertyType: "valueId",
//					value: sd.get("id") || sd.get("code"),
//					displayText: sd.get("code") || sd.get("id")
//				});

				this.$("input[name='diagnosis[mkb][diagnosis]']").val(sd.get("diagnosis"));
			},

			onMKBCodeKeyUp: function (event) {
				$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
			},

			renderNested: function (view, selector) {
				var $element = ( selector instanceof $ ) ? selector : this.$el.find(selector);
				view.setElement($element).render();
			},

			render: function () {
				var popup = this;

				if ($(popup.$el.parent().length).length === 0) {

					popup.$el.html($.tmpl(this.template, {doctor: this.doctor}));

					var labs = new Labs();



					labs.fetch({success: function () {
						popup.labsListView = new LabsListView({collection: labs});
						popup.renderNested(popup.labsListView, ".labs-list-el");

					}});

					popup.initFinanseSelect();

					this.mkbDirectory = new App.Views.MkbDirectory();
					this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
					this.mkbDirectory.render();

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
							self.mkbAttrId = $(this).data("mkb-examattr-id");

							self.setExamAttr({
								attrId: self.mkbAttrId,
								propertyType: "valueId",
								value: ui.item.id,
								displayText: ui.item.value
							});

							self.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);
						}
					}).on("keyup", function () {
							if (!$(this).val().length) {
								self.setExamAttr({
									attrId: self.mkbAttrId,
									propertyType: "valueId",
									value: "",
									displayText: ""
								});

								self.$("input[name='diagnosis[mkb][diagnosis]']").val("");
							}
						});


					popup.labTestListView = new LabTestsListView();
					popup.renderNested(popup.labTestListView, ".lab-test-list-el");

					popup.labsTestsCollection = new LabsTestsCollection();
					popup.setOffTestsView = new SetOffTestsView({
						collection: popup.labsTestsCollection
						,	patientId: popup.options.appeal.get('patient').get('id')
						,testCollection: popup.testCollection
					});
					popup.renderNested(popup.setOffTestsView, ".set-off-test-el");


					UIInitialize(this.el);

					$("body").append(this.el);
					$(popup.el).dialog({
						autoOpen: false,
						width: "116em",
						modal: true,
						dialogClass: "webmis",
						title: "Создание направления"
					});

					popup.$("a").click(function (event) {
						event.preventDefault();
					});
				}

				return this;
			},

			saveButton: function(enabled){
//				var $saveButton = this.$('.save');
//				if(enabled){
//					$saveButton.removeClass('Disabled');
//				}else{
//					$saveButton.addClass('Disabled');
//				}

			},

			onSave: function () {
				var view = this;



				this.testCollection.updateAll =  function () {
					var collection = this;
					options = {
						dataType: "jsonp",
						contentType: 'application/json',
						success: function (status) {
							if(status){
								collection.trigger('updateAll:success');
							}else{
								collection.trigger('updateAll:error');
							}
						},
						data: JSON.stringify({data: collection.toJSON()})
					};

					return Backbone.sync('create', this, options);
				}

				this.testCollection.updateAll();

			},

			open: function () {
				//$(".ui-dialog-titlebar").hide();
				this.$el.dialog("open");
			},

			close: function () {
				//$(".ui-dialog-titlebar").show();
				this.$el.dialog("close");
				this.$el.remove();
			}
		});

		return LaboratoryPopup;
	});
