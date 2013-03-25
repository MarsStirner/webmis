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
				var view = this;

				view.doctor = {
					name: {
						first: Core.Cookies.get("doctorFirstName"),
						last: Core.Cookies.get("doctorLastName")
					}
				};

				view.appeal = view.options.appeal;
                console.log('appeal',view.appeal);

				var TestCollection = Collection.extend({
                    url : DATA_PATH + 'diagnostics/' + this.appeal.get('id') + '/laboratory',
                    updateAll :  function () {
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

                });

				view.testCollection = new TestCollection();



				view.testCollection.on('add remove reset', function(){
					view.saveButton(view.testCollection.length);
					console.log('testCollection changed', view.testCollection)
				}, view);

				view.testCollection.on('updateAll:success',function(){

					pubsub.trigger('lab-diagnostic:added');
					view.close();

				});


				pubsub.on('load-group-tests tg-parent:click', function(){
					view.testCollection.reset();
				},view);

                pubsub.on('test:date:changed',function(code, date){

                    var model = view.testCollection.find( function(model){
                        return model.get('code')== code;
                    });

                    if(model){
                        var group = model.get('group');
                        group[0].attribute[2].properties[0].value = date + ' 07:00:00';

                        model.set('group', group);
                    }


                    console.log('test-date',code, date);
                });


			},

			initFinanseSelect: function () {
				var view = this;
				var appealFinanceId = view.options.appeal.get('appealType').get('finance').get('id');

				var financeDictionary = new App.Collections.DictionaryValues([], {name: 'finance'});

//				financeDictionary.on('reset', function(){
//					console.log('dictionary',financeDictionary,appealFinanceId,view.options.appeal)
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
                console.log('sd', sd.get("id"));

                this.mkbAttrId = sd.get("id");

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
										code: request.term//,
										//sex: patientSex
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

//							self.setExamAttr({
//								attrId: self.mkbAttrId,
//								propertyType: "valueId",
//								value: ui.item.id,
//								displayText: ui.item.value
//							});

							self.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);
						}
					}).on("keyup", function () {
							if (!$(this).val().length) {
//								self.setExamAttr({
//									attrId: self.mkbAttrId,
//									propertyType: "valueId",
//									value: "",
//									displayText: ""
//								});

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

                    var now = new Date();
                    this.$("#start-date").datepicker("setDate", now);
                    this.$("#start-time").val(now.getHours()+':'+now.getMinutes());


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
//					$saveButton.removeClass('Disabled').attr('disabled', false);
//                    $('.save').on('click', this.onSave);
//				}else{
//					$saveButton.addClass('Disabled').attr('disabled', true);
//				}

			},

			onSave: function () {
				var view = this;
                console.log('onSave',view,view.testCollection);
                view.testCollection.forEach(function(model){

                    var group = model.get('group');
                    var group_0 = group[0];
                    //group_0.attribute[2].properties[0].value ; //assessmentDate
                    group[0].attribute[3].properties[0].value = view.doctor.name.first;//doctorFirstName
                    group[0].attribute[4].properties[0].value = view.doctor.name.last;//doctorLastName
                    group[0].attribute[5].properties[0].value = '';//doctorMiddleName

                    group[0].attribute[7].properties[0].value = true;//urgent


                    var labEndDate = (new Date()).getTime()+(60*60*3)*1000;
                    if (labEndDate) {
                        var end = new Date(labEndDate);

                        var value = $.datepicker.formatDate("yy-mm-dd", end) + " " + end.toTimeString().match( /^([0-9]{2}:[0-9]{2}:[0-9]{2})/ )[0] ;
                        console.log('value',value)

                       // group[0].attribute[2].properties[0].value= value;

                    }


                    //group[1].attribute[3].properties[1].value= this.mkbAttrId;
                    //this.mkbAttrId

                    //group[1].attribute[0].properties[0].value = (new Date()).getTime();
                    console.log(model.get('group'))
                    model.set('group',group);
                    console.log(model.get('group'))

                    console.log(view,view.$("input[name='diagnosis[mkb][code]']").data('mkbAttrId'))
                })
				view.testCollection.updateAll();

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
