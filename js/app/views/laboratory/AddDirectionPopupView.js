/**
 * User: FKurilov
 * Date: 25.06.12
 */
define(["text!templates/appeal/edit/popups/laboratory.tmpl",
	"collections/diagnostics/Labs",
	"views/laboratory/LabsListView",
	"views/laboratory/TestsGroupListView",
	"views/laboratory/SetOffTestsView",
	"models/diagnostics/SetOfTests",
	"models/diagnostics/laboratory-diag-form",
	"views/ui/SelectView"],
	function (tmpl, Labs, LabsListView, LabTestsListView, SetOffTestsView, SetOfTestsModel, labAnalysisDirection, SelectView) {

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


			},
			renderNested: function (view, selector) {
				var $element = ( selector instanceof $ ) ? selector : this.$el.find(selector);
				view.setElement($element).render();
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

			render: function () {
				var popup = this;

				if ($(popup.$el.parent().length).length === 0) {

					popup.$el.html($.tmpl(this.template, {doctor: this.doctor}));

					var labs = new Labs();
					labs.on('reset', function(){
						popup.labsListView = new LabsListView({collection: labs});
						popup.renderNested(popup.labsListView, ".labs-list-el");
					})
					labs.reset([{
						id: 709,
						groupId: 654,
						code: "15",
						name: "lab"
					}])
//					labs.fetch({success: function () {
//						popup.labsListView = new LabsListView({collection: labs});
//						popup.renderNested(popup.labsListView, ".labs-list-el");
//
//					}});

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


					popup.setOffTests = new SetOfTestsModel();
					popup.setOffTestsView = new SetOffTestsView({model: popup.setOffTests});
					popup.renderNested(popup.setOffTestsView, ".set-off-test-el");


					UIInitialize(this.el);

					$("body").append(this.el);
					$(popup.el).dialog({
						autoOpen: false,
						width: "116em",
						modal: true,
						dialogClass: "webmis"
					});
					//popup.$(".popup #dp").datepicker();
					popup.$("a").click(function (event) {
						event.preventDefault();
					});
				}

				return this;
			},

			onSave: function () {
				var view = this;

				console.log('popup.setOffTests', view.setOffTests)

				var direction = new labAnalysisDirection(view.setOffTests);
				direction.eventId = view.appeal.get('id');
				direction.save({},{
					success: function(model, response, options){
						console.log('success',model, response, options);
						pubsub.trigger('lab-diagnostic:added');
						view.close();

				}
				,error: function(model, xhr, options){
						console.log('error',model, xhr, options);
					}});
			},

			open: function () {
				$(".ui-dialog-titlebar").hide();
				this.$el.dialog("open");
			},

			close: function () {
				$(".ui-dialog-titlebar").show();
				this.$el.dialog("close");
				this.$el.remove();
			}
		});

		return LaboratoryPopup;
	});
