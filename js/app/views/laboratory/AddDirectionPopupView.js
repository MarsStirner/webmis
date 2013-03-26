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



                function getDiagnosis(diagnosesCollection){
                    if(view.appeal.get('diagnoses').length){
                        //console.log('есть диагнозы',view.appeal.get('diagnoses').toJSON());
                        var model = {};
//                        var priorities = ['final','clinical','admission','assignment'];
//                        var diagnosesModels = [];
//
//                        _.each(priorities,function(priority){
//                            var diagnosis = diagnosesCollection.find(function(model){
//                                return model.get('diagnosisKind') == priority;
//                            });
//
//                            if(diagnosis){
//                                var obj = {};
//                                obj[priority]=diagnosis;
//                                diagnosesModels.push(obj);
//                            }
//
//                        });
//                        console.log('diagnosesModels',diagnosesModels)

                        var admission = diagnosesCollection.find(function(model){
                            return model.get('diagnosisKind') == 'admission';
                        });
                        var assignment = diagnosesCollection.find(function(model){
                            return model.get('diagnosisKind') == 'assignment';
                        });

                        if(assignment && assignment.get('mkb') &&  assignment.get('mkb').get('diagnosis')){
                            model = assignment;
                        }

                        if(admission && admission.get('mkb') &&  admission.get('mkb').get('diagnosis')){
                            model = admission;
                        }

                        //console.log('getDiagnosis',model);

                        return model;

                    }else{
                        return false;
                    }

                }

                view.diagnosis = getDiagnosis(view.appeal.get('diagnoses'));




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


                    //console.log('test-date',code, date);
                });

                pubsub.on('test:cito:changed',function(code, cito){

                    var model = view.testCollection.find( function(model){
                        return model.get('code')== code;
                    });


                    if(model){
                        var group = model.get('group');
                       group[0].attribute[7].properties[0].value = cito;

                        model.set('group', group);
                    }
                    //console.log('model',model);

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
                //console.log('sd', sd.get("id"));

                this.mkbAttrId = sd.get("id");

				this.setExamAttr({
					attrId: this.mkbAttrId,
					propertyType: "valueId",
					value: sd.get("id") || sd.get("code"),
					displayText: sd.get("code") || sd.get("id")
				});

				this.$("input[name='diagnosis[mkb][diagnosis]']").val(sd.get("diagnosis"));
			},

			onMKBCodeKeyUp: function (event) {
				$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
			},

			renderNested: function (view, selector) {
				var $element = ( selector instanceof $ ) ? selector : this.$el.find(selector);
				view.setElement($element).render();
			},
            setExamAttr: function (opts){


//                var examAttr = this.examAttributes.find(function (a) {
//                    return a.get("typeId") == opts.attrId;
//                });

                console.log('setExamAttr',opts );

                var $input = this.$("[data-examattr-id="+opts.attrId+"]");

                if ($input.val() != opts.value || opts.displayText) {
                    $input.val(opts.displayText || opts.value).change();
                }
            },

			render: function () {
				var view = this;

				if ($(view.$el.parent().length).length === 0) {

					view.$el.html($.tmpl(this.template, {doctor: this.doctor}));

					var labs = new Labs();



					labs.fetch({success: function () {
						view.labsListView = new LabsListView({collection: labs});
						view.renderNested(view.labsListView, ".labs-list-el");

					}});

					view.initFinanseSelect();

					this.mkbDirectory = new App.Views.MkbDirectory();
					this.mkbDirectory.on("selectionConfirmed", this.onMKBConfirmed, this);
					this.mkbDirectory.render();

                    var patientSex = Cache.Patient.get("sex").length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;

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

                            console.log('ui.item',ui.item)

							view.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);
                            view.$("input[name='diagnosis[mkb][code]']").val(ui.item.displayText);
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


                    if(view.diagnosis){
                        view.$("input[name='diagnosis[mkb][diagnosis]']").val(view.diagnosis.get('mkb').get('diagnosis'));
                        view.$("input[name='diagnosis[mkb][code]']").val(view.diagnosis.get('mkb').get('code'));
                    }

					view.labTestListView = new LabTestsListView();
					view.renderNested(view.labTestListView, ".lab-test-list-el");

					view.labsTestsCollection = new LabsTestsCollection();
					view.setOffTestsView = new SetOffTestsView({
						collection: view.labsTestsCollection
						,	patientId: view.options.appeal.get('patient').get('id')
						,testCollection: view.testCollection
					});
					view.renderNested(view.setOffTestsView, ".set-off-test-el");


					UIInitialize(this.el);

                    var now = new Date();
                    this.$("#start-date").datepicker("setDate", now);
                    this.$("#start-time").val(now.getHours()+':'+now.getMinutes());


					$("body").append(this.el);
					$(view.el).dialog({
						autoOpen: false,
						width: "116em",
						modal: true,
						dialogClass: "webmis",
						title: "Создание направления"
					});

				}

				return view;
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
               // console.log('onSave',view,view.testCollection);

                var tree = view.$('.lab-tests-list2').dynatree("getTree");
//                tree.serializeArray();
               // console.log('onSave tree',tree,tree.toDict());

                var selected = _.filter(tree.toDict().children, function(node){
                    return node.select == true
                });

                _.each(selected, function(test){
                    //test.code;

                    var selected_params = _.filter(test.children, function(node){
                        return node.select == true;
                    });

                   // console.log('selected_params',selected_params)



                })

                console.log('onSave tree selected',selected);


                view.testCollection.forEach(function(model){


                    var modelTree = _.find(selected, function(node){
                        return node.code == model.get('code')
                    });

                    var selected_params = _.filter(modelTree.children, function(node){
                        return node.select == true;
                    });

                    var group = model.get('group');


                    console.log('modelTree ',model.get('group'), modelTree,selected_params )
                    _.each(selected_params, function(param){
                        console.log(param.title)
                        _.each(group[1].attribute, function(attribute,index){

                            if(attribute.name == param.title){
                                group[1].attribute[index].properties[1].value = 'true';
                            }
                        })

                    })


                    group[0].attribute[3].properties[0].value = view.doctor.name.first;//doctorFirstName
                    group[0].attribute[4].properties[0].value = view.doctor.name.last;//doctorLastName
                    group[0].attribute[5].properties[0].value = '';//doctorMiddleName

                   // group[0].attribute[7].properties[0].value = true;//urgent





                    //group[1].attribute[3].properties[1].value= this.mkbAttrId;
                    //this.mkbAttrId

                    //group[1].attribute[0].properties[0].value = (new Date()).getTime();
                    console.log(model.get('group'))
                    model.set('group',group);
                    console.log('group',model.get('group'))

                    //console.log(view,view.$("input[name='diagnosis[mkb][code]']").data('mkbAttrId'))
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
