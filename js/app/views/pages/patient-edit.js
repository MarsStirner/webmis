define([
	"text!templates/patient-edit/main.tmpl",
	"text!templates/patient-edit/general.tmpl",
	"text!templates/patient-edit/relation.tmpl",
	"text!templates/patient-edit/documents.tmpl",
	"text!templates/patient-edit/policy.tmpl",
	"text!templates/patient-edit/id-card.tmpl",
	"text!templates/patient-edit/medical-info.tmpl",
	"text!templates/patient-edit/drug-intolerance.tmpl",
	"text!templates/patient-edit/allergy.tmpl",
	"text!templates/patient-edit/other.tmpl",
	"text!templates/patient-edit/address.tmpl",
	"text!templates/patient-edit/contact.tmpl",
	"text!templates/patient-edit/quotes.tmpl",
	"models/patient",
	"collections/flat-directories",
	"collections/dictionary-values",
	"collections/departments",
	"collections/quotes",
	"collections/patient-appeals",
	"views/form/abstract-line",
	"views/form/kladr-new",
	"views/mkb-directory",
	"views/menu",
	"views/grid",
	"views/paginator",
	"views/breadcrumbs"
], function (tmplMain,
						 tmplGeneral,
						 tmplRelation,
						 tmplDocuments,
						 tmplPolicy,
						 tmplIdCard,
						 tmplMedInfo,
						 tmplDrugIntolerance,
						 tmplAllergy,
						 tmplOther,
						 tmplAddress,
						 tmplContact,
						 tmplQuotes) {

	/**
	 * //////////////////////////////////
	 * // IMPORTANT
	 * //////////////////////////////////
	 *
	 * Naming conventions for templates:
	 * Form fields that are supposed to be binded to some models attrs
	 * should have 'name' attribute with property chain to bind, use '-' to separate chain parts,
	 * e.g. for model.get("name").get("first") property chain will look like this:
	 * <input name="name-first" ... />
	 * If binding target is collection item use 'cid' property from model in the chain:
	 * <input name="disabilities-${disablityItemCid}-comment" ... />
	 *
	 * To set up input restriction for field use 'data-type="[typeName]"' attribute,
	 *
	 * //TODO: implement setUpInputRestriction method and move restrictions set up there.
	 * //@see App.Views.PatientEdit.setUpInputRestriction for available types (add new here too).
	 *
	 * To set input max-length use 'data-maxlength="[int]"' attribute
	 *
	 * To turn off global binding for field use 'data-subbind="true"'
	 *
	 * @type {*}
	 */

	App.Views.PatientEdit = Form.extend({
		model: App.Models.Patient,

		events: {
			"click  .Actions.Save"  : "onSaveClick",
			"click  .Actions.Cancel": "onCancelClick",
			"click  .Actions.Next"  : "onNextStepClick",
			"click  .Actions.Prev"  : "onPrevStepClick",
			"keyup  :input"         : "onFieldChange",
			"change :input"         : "onFieldChange",
			"change select"         : "onFieldChange"
		},

		template: tmplMain,

		// Subviews hash
		steps: {},

		currentStep: "general",

		initialize: function () {
			this.clearAll();

			var self = this;

			if (!this.options.model) this.model = new App.Models.Patient();

			this.modelIsNew = this.model.isNew();

			this.attachModelHandlers();

			console.log(this.model.toJSON());

			//this.model.on("change:id", this.render, this);

			this.steps.general     = new GeneralView({model: self.model});
			this.steps.documents   = new DocumentsView({model: self.model});
			this.steps.address     = new AddressView({model: self.model});
			this.steps.medicalInfo = new MedicalInfoView({model: self.model.get("medicalInfo")});
			this.steps.other       = new OtherView({model: self.model});
			this.steps.quotes      = new QuotesView({patient: self.model});

			/////////////////////////////////
			/// var newMenu = new NewMenuView({items: self.getMenuStructure()});
			/////////////////////////////////

			this.menuStructure = self.getMenuStructure();

			this.menu = new MenuView({structure: this.menuStructure});

			this.menu.on("step:change", this.changeCurrentStep, this);

			//TODO: replace with structure element!!!
			this.currentStep = this.options.page || "general";
			var ciIndex = this.getCurrentMenuStructureItemIndex();
			this.stepTitle = this.menuStructure[ciIndex].title;
			this.stepUri = this.menuStructure[ciIndex].uri;

			this.breadCrumbs = new App.Views.Breadcrumbs();
			this.breadCrumbs.on("template:loaded", this.setBreadcrumbsStructure, this);

			this.errorToolTip = new UI.ErrorTooltip();
		},

		/*setModel: function (model) {
			this.model = model;
			this.steps.general     = model;
			this.steps.documents   = model;
			this.steps.address     = model;
			this.steps.medicalInfo = model;
			this.steps.other       = model;
		},*/

		changeCurrentStep: function (step) {
			if (this.currentStep != step.name) {
				this.currentStep = step.name;
				this.stepTitle = step.title;
				this.stepUri = step.uri;
				this.render();
			}
		},

		setBreadcrumbsStructure: function () {
			var self = this;

			if (this.model.isNew()) {
				this.breadCrumbs.setStructure([
					App.Router.cachedBreadcrumbs.PATIENTS,
					App.Router.cachedBreadcrumbs.PATIENTS_NEW,
					{title: self.stepTitle, uri: self.stepUri}
				]);
			} else {
				this.breadCrumbs.setStructure([
					App.Router.cachedBreadcrumbs.PATIENTS,
					App.Router.compile(App.Router.cachedBreadcrumbs.PATIENT, self.model.toJSON()),
					App.Router.compile(App.Router.cachedBreadcrumbs.PATIENTS_EDIT, {id: self.model.id}),
					{title: self.stepTitle, uri: self.stepUri}
				]);
			}
			this.breadCrumbs.$("a").addClass("AllowDefault");
			this.$("#page-head").html(this.breadCrumbs.render().el);
		},

		onFieldChange: function (event) {
			var self = this;
			var $field = $(event.currentTarget);

			if ($field.is("select"))
				$field.next().removeClass("WrongField");
			else if ($field.hasClass("hasDatepicker"))
				$field.parents(".DatePeriod").removeClass("WrongField");
			else
				$field.removeClass("WrongField");

			this.errorToolTip.hide();

			if (!$field.data("subbind")) {
				var inputName = $field.attr("name");
				var propertyChain = inputName.split("-");
				var destination;

				if (propertyChain.length > 1) {
					destination = this.model.get(propertyChain.shift());

					while (propertyChain.length - 1) {
						if (typeof destination === 'undefined') {
							console.error("Invalid Property Chain: ", inputName);
							break;
						}
						else if (destination instanceof Backbone.Collection)
							destination = destination.getByCid(propertyChain.shift());
						else
							destination = destination.get(propertyChain.shift());
					}
				} else {
					destination = this.model;
				}

				var key = propertyChain.shift();
				var value;

				if ($field.is(":checkbox")) {
					value = $field.is(":checked");
				} else {
					switch ($field.data("type")) {
						case "date":
							value = Core.Date.toInt($field.val());
							break;
						case "snils":
							value = $field.val().replace(/[^\d.]/g, "");
							break;
						default:
							value = $field.val();
					}
				}
				destination.set(key, value);
			}

			//console.log(destination.toJSON());
		},

		setFieldValues: function () {
			var self = this;
			this.$("input:not(.select2-input),select,textarea").each(function () {
				if (!$(this).data("subbind") && $(this).attr("name")) {
					var inputName = $(this).attr("name");
					var propertyChain = inputName.split("-");
					var source;

					if (propertyChain.length > 1) {
						source = self.model.get(propertyChain.shift());

						while (propertyChain.length - 1) {
							if (typeof source === 'undefined') {
								console.error("Invalid Property Chain: ", inputName);
								break;
							}
							else if (source instanceof Backbone.Collection)
								source = source.getByCid(propertyChain.shift());
							else
								source = source.get(propertyChain.shift());
						}
					} else {
						source = self.model;
					}


					if (source) {
						var key = propertyChain.shift();
						var value = source.get(key);

						switch ($(this).data("type")) {
							case "date":
								value = value ? Core.Date.format(value) : "";
								break;
						}

						if ($(this).is(":radio")) {
							if ($(this).val() == value) {
								$(this).attr('checked', 'checked');
							}
						} else {
							$(this).val(value);
						}

						if ($(this).is(":checkbox")) $(this).attr("checked", !!value);
						//TODO: WAT?
						if ($(this).is("select")) $(this).change();
					} else {
						console.error("Invalid Source Property: ", inputName, self.model);
					}
				}
			});
		},

		onSaveClick: function (event) {
			this.validationErrors = this.checkModelValid();
			if (this.validationErrors) {
				this.render(true);
			} else {
				this.model.save({error: function () {
					console.log(arguments);
				}});
			}
		},

		checkModelValid: function () {
			return this.model.validate();
		},

		toggleValidState: function () {
			//this.$(".WrongField").removeClass("WrongField");

			if (this.validationErrors) {
				var wrongFieldsSelector = _(this.validationErrors).map(function (e) {
					return "[name='" + e.property + "']";
				}).join(",");

				this.$(wrongFieldsSelector).each(function () {
					if (!$(this).data("subbind")) {
						if ($(this).hasClass("hasDatepicker")) {
							$(this).parents(".DatePeriod").addClass("WrongField");
						} else if ($(this).is("select")) {
							$(this).next().addClass("WrongField");
						} else {
							$(this).addClass("WrongField");
						}
					}
				});

				this.$("#errors").fadeIn().find(".WrongFields").text(_(this.validationErrors).pluck("msg").join(", "));
			}
		},

		onCancelClick: function (event) {
			if (this.options.popUpMode) {
				this.trigger("patient:canceled");
			} else {
				App.Router.navigate( this.options.referrer, {trigger:true} );
			}
		},

		onNextStepClick: function (event) {
			var index = this.getCurrentMenuStructureItemIndex();
			if (index < this.menuStructure.length - 1)
				this.changeCurrentStep(this.menuStructure[this.getCurrentMenuStructureItemIndex() + 1]);
			else
				this.changeCurrentStep(this.menuStructure[0]);
		},

		onPrevStepClick: function (event) {
			var index = this.getCurrentMenuStructureItemIndex();
			if (index > 0)
				this.changeCurrentStep(this.menuStructure[this.getCurrentMenuStructureItemIndex() - 1]);
			else
				this.changeCurrentStep(this.menuStructure[this.menuStructure.length - 1]);
		},

		getCurrentMenuStructureItemIndex: function () {
			var currentMenuStructureItem = _(this.menuStructure).find(function (mi) {
				return mi.name === this.currentStep;
			}, this);

			return this.menuStructure.indexOf(currentMenuStructureItem);
		},

		isOnFirstPage: function () {
			return this.getCurrentMenuStructureItemIndex() === 0;
		},

		isOnLastPage: function () {
			return this.getCurrentMenuStructureItemIndex() === this.menuStructure.length - 1;
		},

		render: function (modelValidChecked) {
			var self = this;

			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			if (this.currentView) {
				this.currentView.remove();
				this.currentView.unbind();
				this.currentView.off(null, null, this);
				this.currentView.el = null;
			}

			this.currentView = this.steps[this.currentStep];

			this.$(".ContentHeader").toggle(!this.currentView.noSaveBtn);

			this.assign({
				".LeftSideBar": this.menu,
				".LineBlockHolder": this.currentView
			});

			if (this.options.popUpMode) {
				this.$("#page-head").hide();
			}

			if (this.breadCrumbs.templateLoadComplete) {
				this.setBreadcrumbsStructure();
			}

			$("body").append(this.errorToolTip.render().el);

			this.menu.$("#menu-item-" + this.currentStep).addClass("Active");

			UIInitialize(this.el);

			this.setFieldValues();

			this.$(".ToolTip").hide();

			this.$(".Prev").toggle(!this.isOnFirstPage());
			this.$(".Next").toggle(!this.isOnLastPage());

			this.$("a:not(.AllowDefault), button:not(.AllowDefault)").live("click", function (event) {
				event.preventDefault();
			});

			this.$("input[data-type='snils']").mask("999-999-999 99");

			this.$("input[data-type='phone']").live("keypress", function (event) {
				if (!$(this).data("doNotValidate")) {
					// allow input for [space, (, ), +, -] and digits
					if ([32,40,41,43,45].indexOf(event.which) == -1 && (event.which < 48 || event.which > 57)) {
						event.preventDefault();
						event.stopPropagation();
					}
				}
			});

			this.$(":input").each(function () {
				if ($(this).data("maxlength")) {
					//console.log($(this));
					$(this).on("keypress", function (event) {
						//console.log($(this));
						if ($(this).val().length == $(this).data("maxlength")) {
							event.preventDefault();
							event.stopPropagation();
						}
					});
					$(this).on("change", function (event) {
						if ($(this).val().length > $(this).data("maxlength")) {
							$(this).val($(this).val().substr(0, $(this).data("maxlength")))
						}
					});
				}
			});

			/*if (!modelValidChecked) {
				this.validationErrors = this.checkModelValid();
			}*/

			this.toggleValidState();

			this.$(".WrongField").live("focus", function () {
				self.errorToolTip.showAt(this);
			});

			this.$("input,select").live("blur", function () {
				self.errorToolTip.hide();
			});

			var tabindex = 1;
			this.$('input,select,textarea').each(function() {
				if (this.type != "hidden") {
					var $input = $(this);
					$input.attr("tabindex", tabindex);
					tabindex++;
				}
			});

			this.$(".Save span").text(this.model.isNew() ? "Создать" : "Сохранить");

			return this;
		},

		getMenuStructure: function () {
			var menuStructure;
			if (this.model.isNew()) {
				menuStructure = [
					{name: "general", title: "Основное", uri: "/patients/new/"},
					{name: "documents", title: "Документы", uri: "/patients/new/documents/"},
					{name: "address", title: "Адреса", uri: "/patients/new/address/"},
					{name: "medicalInfo", title: "Мед. особенности", uri: "/patients/new/medicalInfo/"},
					{name: "other", title: "Прочее", uri: "/patients/new/other/"},
					{name: "quotes", title: "Квоты", uri: "/patients/new/quotes/"}
				];
			} else {
				menuStructure = [
					App.Router.compile({name: "general", title: "Основное", uri: "/patients/:id/edit/"}, this.model.toJSON()),
					App.Router.compile({name: "documents", title: "Документы", uri: "/patients/:id/edit/documents/"}, this.model.toJSON()),
					App.Router.compile({name: "address", title: "Адреса", uri: "/patients/:id/edit/address/"}, this.model.toJSON()),
					App.Router.compile({name: "medicalInfo", title: "Мед. особенности", uri: "/patients/:id/edit/medicalInfo/"}, this.model.toJSON()),
					App.Router.compile({name: "other", title: "Прочее", uri: "/patients/:id/edit/other/"}, this.model.toJSON()),
					App.Router.compile({name: "quotes", title: "Квоты", uri: "/patients/:id/edit/quotes/"}, this.model.toJSON())
				];
			}

			return menuStructure;
		},

		attachModelHandlers: function () {
			var self = this;

			this.model.on("sync", function(data){
				//console.log("synced", data);

				if (this.options.popUpMode) {
					this.trigger("patient:created", this.model);
				} else {
					pubsub.trigger('noty', {text:'Карточка пациента ' + (self.modelIsNew ? 'создана' : 'изменена')});
					App.Router.navigate("/patients/"+ this.model.id +"/", {trigger: true});
				}
			}, this);
		}
	});

	// Шаг 1. Основное
	var GeneralView = View.extend({
		template: tmplGeneral,

		events: {
			//"change select[name='sex']": "onSexChange",
			"change input[name='name-middle']": "onMiddleNameChange"
		},

		initialize: function (options) {
			var self = this;
			//this.relationsView = new RelationsView({collection: self.model.get("relations")});

			this.contactsView = new ContactsView({collection: self.model.get("phones")});
		},

		/*onSexChange: function (event) {
			this.relationsView.onSexChange($(event.currentTarget).val());
		},*/

		onMiddleNameChange: function (event) {
			var middleName = this.$("input[name='name-middle']").val();

			if (middleName.length) {
				if(middleName[middleName.length - 1] === "а") {
					this.$("select[name='sex']").val("female").change();
				} else {
					this.$("select[name='sex']").val("male").change();
				}
			}
		},

		render: function () {
			var beautyJSON = this.model.toJSON();

			this.$el.html($.tmpl(this.template, beautyJSON));

			this.assign({
				//"#relations": this.relationsView,
				"#contacts": this.contactsView
			});

			//this.relationsView.onSexChange(this.model.get("sex"));

			return this;
		}
	});

	var ContactsView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);

			if (this.collection.isEmpty()) {
				this.collection.add({}, {silent: true});
			}
		},

		onItemAdd: function (itemView) {
			this.triggerView = itemView;
			this.collection.add({}, {at: this.collection.indexOf(this.triggerView.model) + 1});
		},

		addOne: function (item) {
			var itemView = new ContactView({model: item});

			itemView
				.on("item:add", this.onItemAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(itemView.el);
			} else {
				this.$el.append(itemView.el);
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var ContactView = View.extend({
		className: "DoubleLineBlock",

		template: tmplContact,

		events: {
			"click .AddIcon"     : "onAddIconClick",
			"click .RemoveIcon"  : "onRemoveIconClick",
			"change .ContactType": "onContactTypeChange"
		},

		initialize: function (options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function (event) {
			this.trigger("item:add", this);
		},

		onRemoveIconClick: function (event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		onContactTypeChange: function (event) {
			switch ($(event.currentTarget).val()) {
				case "9":
					this.$(".ContactNumber").prop("placeholder", "name@example.com").data("doNotValidate", true);
					this.$(".ContactNumberLabel").text("Адрес");
					break;
				default:
					this.$(".ContactNumber").prop("placeholder", "+7(xxx)xxx-xx-xx").data("doNotValidate", false);
					this.$(".ContactNumberLabel").text("Номер");

					break;
			}
		},

		render: function () {
			var JSON = this.model.toJSON();
			JSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, JSON));

			UIInitialize(this.el);

			this.toggleRemoveIcon();

			this.$el.fadeIn("fast");

			return this;
		}
	});

	/*var RelationsView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);

			this.relationTypes = new Collection([
				{id:1, leftName: "Мать", rightName: "сын", leftSex: 2, rightSex: 1},
				{id:2, leftName: "Мать", rightName: "дочь", leftSex: 2, rightSex: 2},
				{id:3, leftName: "Отец", rightName: "сын", leftSex: 1, rightSex: 1},
				{id:4, leftName: "Отец", rightName: "дочь", leftSex: 1, rightSex: 2},
				{id:5, leftName: "Приемная мать", rightName: "Приемный сын"	, leftSex: 2, rightSex: 1},
				{id:6, leftName: "Приемная мать", rightName: "Приемная дочь", leftSex: 2, rightSex: 2},
				{id:7, leftName: "Приемный отец", rightName: "Приемный сын"	, leftSex: 1, rightSex: 1},
				{id:8, leftName: "Приемный отец", rightName: "Приемная дочь", leftSex: 1, rightSex: 2},
				{id:9, leftName: "Опекун", rightName: "Опекаемый", leftSex: 0, rightSex: 0},
				{id:10, leftName: "Гос.опекун", rightName: "Опекаемый", leftSex: 0, rightSex: 0},
				{id:11, leftName: "Представитель", rightName: "Представляемый", leftSex: 0, rightSex: 0}
			]);
		},

		onRelationAdd: function (relationView) {
			this.triggerView = relationView;
			this.collection.add({});
		},

		onRelationRemove: function (event) {
			// remove passed model from coll
		},

		onSexChange: function (sex) {
			this.sex = sex;
			var $selects = this.$('select');
			if (sex === "male") {
				$selects.next().find('.right-sex-1').show();
				$selects.next().find('.right-sex-2').hide();
			} else {
				$selects.next().find('.right-sex-2').show();
				$selects.next().find('.right-sex-1').hide();
			}
		},

		addOne: function (relation) {
			var self = this;

			if (relation.get("relationType")) {
				var relationView = new RelationView({
					model: relation,
					relationTypes: self.relationTypes
				});

				relationView
					.on("relation:add", this.onRelationAdd, this)
					.on("relation:remove", this.onRelationRemove, this)
					.render();

				if (this.triggerView) {
					this.triggerView.$el.after(relationView.el);
				} else {
					this.$el.append(relationView.el);
				}

				if (this.sex) this.onSexChange(this.sex);
			} else {
				this.collection.remove(relation);
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var RelationView = View.extend({
		className: "DoubleLineBlock",

		template: tmplRelation,

		events: {
			"click .AddIcon"   : "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick"
		},

		initialize: function (options) {
			if (this.model.get("phones").isEmpty())
				this.model.get("phones").add({});

			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function (event) {
			this.trigger("relation:add", this);
		},

		onRemoveIconClick: function (event) {
			//this.trigger("relation:remove");
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		render: function () {
			var self = this;
			var beautyJSON = this.model.toJSON();
			var phone = this.model.get("phones").first();

			beautyJSON.phone = {number: phone.get("number"), cid: phone.cid};
			beautyJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, {
				relation: beautyJSON,
				relationTypes: self.options.relationTypes.toJSON()
			}));

			this.$el.fadeIn("fast");

			UIInitialize(this.el);

			this.toggleRemoveIcon();

			this.delegateEvents();

			return this;
		}
	});*/

	/*var RelationView = App.Views.AbstractLine.extend({
		model: App.Models.Relation,
		collection: App.Collections.Relations,

		//events: {
			//"change input[name='relation[name]'], input[name='relation[phone]']": "onRelationChange"
		//},

		initialize: function () {
			_.bindAll(this);

			this.relationTypes = new Collection([
				{id:1, leftName: "Мать", rightName: "сын", leftSex: 2, rightSex: 1},
				{id:2, leftName: "Мать", rightName: "дочь", leftSex: 2, rightSex: 2},
				{id:3, leftName: "Отец", rightName: "сын", leftSex: 1, rightSex: 1},
				{id:4, leftName: "Отец", rightName: "дочь", leftSex: 1, rightSex: 2},
				{id:5, leftName: "Приемная мать", rightName: "Приемный сын"	, leftSex: 2, rightSex: 1},
				{id:6, leftName: "Приемная мать", rightName: "Приемная дочь", leftSex: 2, rightSex: 2},
				{id:7, leftName: "Приемный отец", rightName: "Приемный сын"	, leftSex: 1, rightSex: 1},
				{id:8, leftName: "Приемный отец", rightName: "Приемная дочь", leftSex: 1, rightSex: 2},
				{id:9, leftName: "Опекун", rightName: "Опекаемый", leftSex: 0, rightSex: 0},
				{id:10, leftName: "Гос.опекун", rightName: "Опекаемый", leftSex: 0, rightSex: 0},
				{id:11, leftName: "Представитель", rightName: "Представляемый", leftSex: 0, rightSex: 0}
			]);
		},

		onSexChanged: function (e) {
			this.setRelationTypesList($(e.currentTarget).val());
		},

		setRelationTypesList: function (sex) {
			this.sex = sex;
			if (sex === "male") {
				this.$('select[name="relation[type]"]').next().find('.right-sex-1').show();
				this.$('select[name="relation[type]"]').next().find('.right-sex-2').hide();
			} else {
				this.$('select[name="relation[type]"]').next().find('.right-sex-2').show();
				this.$('select[name="relation[type]"]').next().find('.right-sex-1').hide();
			}
		},

		onRelationChange: function () {
			//if (this.$("input[name='relation[name]']").val().length > 0 || this.$("input[name='relation[phone]").val().length > 0) {
				//this.$("input[name='relation[type]']").addClass(" WrongField Mandatory not-valid")
			//}
		},

		clone: function () {
			this.doClone(App.Models.Relation, RelationView).view.setRelationTypesList(this.sex);
		},

		render: function () {
			var view = this;

			this.renderTemplate("#patient-edit-general-relation", this.options.collection, {relationTypes: this.relationTypes.toJSON()});

			this.model.get("relationType").connect("id", "relation[type]", view.$el);

			this.model.get("name").connect("first", "relation[name][first]", view.$el);
			this.model.get("name").connect("last", "relation[name][last]", view.$el);
			this.model.get("name").connect("middle", "relation[name][middle]", view.$el);

			this.model.get("phones").first().connect("number", "relation[phone]", view.$el);

			this.setValidationTargets([
				{
					selector: 'select[name="relation[type]"]',
					triggers: [{selector: 'input,select', events: "change"}],
					//validator: function () { return view.$("input[name='relation[name][first]']").val().length === 0; },
					toolTip: {selector: "#relation-tooltip", position: "top"}
				}
			]);

			return this;
		}
	});*/


	// Шаг 2. Документы
	var DocumentsView = View.extend({
		template: tmplDocuments,

		events: {
			"change select[name='tfoms']": "onTfomsChange",
			"mousedown .TFOMScol .DDSelect": "onTfomsClick"
		},

		initialize: function (options) {
			var self = this;

			this.idCardsView = new IdCardsView({collection: self.model.get("idCards")});

			var docDicts = [
				{name: "tfomses", pathPart: "TFOMS"},
				{name: "insuranceCompanies", pathPart: "insurance"},
				{name: "policyTypes", pathPart: "policyTypes&filter[name]=омс"},
				{name: "docTypes", pathPart: "clientDocument&filter[groupId]=1"}
			];

			/*if (!this.model.get("payments").getOms().length) {
				this.model.get("payments").add({});
			}

			if (!this.model.get("payments").getDms().length) {
				var payment = new App.Models.Payment();
				payment.get("policyType").set("id", 3);
				this.model.get("payments").add(payment);
			}*/

			this.policiesOmsView = new PoliciesView({type: "oms", collection: self.model.get("payments")});
			this.policiesDmsView = new PoliciesView({type: "dms", collection: self.model.get("payments")});

			this.initWithDictionaries(docDicts, this.onDictionariesLoaded, this, true);
		},

		onDictionariesLoaded: function (dictionaries) {
			this.dictionaries = dictionaries;

			this.policiesOmsView.dictionaries = this.dictionaries;
			this.policiesDmsView.dictionaries = this.dictionaries;

			this.render();
		},

		onTfomsClick: function (event) {
			this.selectedTfoms = this.$("select[name='tfoms']").val();
		},

		onTfomsChange: function (event) {
			/*if (this.$("select[name='tfoms']").val() && this.$("select[name='tfoms']").val() !== this.selectedTfoms) {
				if (confirm("При изменении ТФОМС выбранная страховая компания будет сброшена. Продолжить?")) {*/
					this.selectedTfoms = this.$("select[name='tfoms']").val();
					this.$(".SMO").val("").change();
					this.toggleSmo();
				/*} else {
					this.$("select[name='tfoms']").val(this.selectedTfoms).change();
				}
			}*/
		},

		toggleSmo: function () {
			var tfomsId = this.$("select[name='tfoms']").val();

			this.$(".SMO").next().toggleClass("Disabled", !tfomsId);

			if (tfomsId) {
				this.$("li.insuranceCompany").each(function () {
					$(this).hasClass("tfomsid-"+tfomsId) ? $(this).show() : $(this).hide();
				});
			}
		},

		render: function () {
			//this.selectedTfoms = "";

			if (!this.model.get("payments").isEmpty() && this.dictionaries && !this.selectedTfoms) {
				var ic = _(this.dictionaries.insuranceCompanies).find(function (ic) {
					return ic.id == this.model.get("payments").first().get("smo").get("id");
				}, this);

				if (ic && ic.headId)
					this.selectedTfoms = ic.headId;
			}

			/*var beautyPatientJSON = this.model.toJSON();

			var oms = this.model.get("payments").getOms()[0];
			var dms = this.model.get("payments").getDms()[0];

			var omsJSON = oms.toJSON();
			var dmsJSON = dms.toJSON();

			omsJSON.cid = oms.cid;
			dmsJSON.cid = dms.cid;

			beautyPatientJSON.payments = {oms: omsJSON, dms: dmsJSON};*/

			this.$el.html($.tmpl(this.template, {
				patient: this.model.toJSON(),
				selectedTfoms: this.selectedTfoms || "",
				dictionaries: this.dictionaries || {}
			}));

			UIInitialize(this.el);

			this.$(".select2").width("100%").select2();

			this.toggleSmo();

			this.assign({
				"#id-cards": this.idCardsView,
				"#policiesOms": this.policiesOmsView,
				"#policiesDms": this.policiesDmsView
			});

			return this;
		}
	});

	var PoliciesView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);

			if (this.options.type === "oms") {
				if (!this.collection.getOms().length) {
					this.collection.add({});
				}
			} else {
				if (!this.collection.getDms().length) {
					var payment = new App.Models.Payment();
					payment.get("policyType").set("id", 3);
					this.collection.add(payment);
				}
			}
		},

		onModelAdd: function (view) {
			this.triggerView = view;
			var NewModel = new App.Models.Payment();
			if (this.options.type === "dms") {
				NewModel.get("policyType").set("id", 3);
			}
			this.collection.add(NewModel, {at: this.collection.indexOf(this.triggerView.model) + 1});
		},

		addOne: function (model) {
			if (this.options.type == "dms" && model.get("policyType").get("id") == 3 ||
				  this.options.type == "oms" && model.get("policyType").get("id") != 3) {
				var view = new PolicyView({model: model, type: this.options.type, dictionaries: this.dictionaries || {}});

				view
					.on("model:add", this.onModelAdd, this)
					.render();

				if (this.triggerView) {
					this.triggerView.$el.after(view.el);
				} else {
					this.$el.append(view.el);
				}
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var PolicyView = View.extend({
		className: "DoubleLineBlock",

		template: tmplPolicy,

		events: {
			"click .AddIcon"   : "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick"
		},

		initialize: function (options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection) {
				var vis = false;
				if (this.options.type == "dms") {
					vis = this.model.collection.getDms().length > 1;
				} else {
					vis = this.model.collection.getOms().length > 1;
				}
				this.$(".RemoveIcon").css("display", (vis ? "inline-block" : "none"));
			}
		},

		onAddIconClick: function (event) {
			this.trigger("model:add", this);
		},

		onRemoveIconClick: function (event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		render: function () {
			var json = {};

			json.model = this.model.toJSON();
			json.model.cid = this.model.cid;

			json.dictionaries = this.options.dictionaries;

			json.type = this.options.type;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, json));

			UIInitialize(this.el);

			this.$(".select2").width("100%").select2();

			this.toggleRemoveIcon();

			this.$el.fadeIn("fast");

			return this;
		}
	});

	var IdCardsView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);
		},

		onIdCardAdd: function (idCardView) {
			this.triggerView = idCardView;
			this.collection.add({}, {at: this.collection.indexOf(this.triggerView.model) + 1});
		},

		addOne: function (idCard) {
			var idCardView = new IdCardView({model: idCard});

			idCardView
				.on("idCard:add", this.onIdCardAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(idCardView.el);
			} else {
				this.$el.append(idCardView.el);
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var IdCardView = View.extend({
		className: "DoubleLineBlock",

		template: tmplIdCard,

		events: {
			"click .AddIcon"   : "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick",

			"change .DocType": "onDocTypeChange"
		},

		initialize: function (options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function (event) {
			this.trigger("idCard:add", this);
		},

		onRemoveIconClick: function (event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		onDocTypeChange: function (event) {
			this.applyMasks();
		},

		applyMasks: function () {
			/*var $docType = this.$(".DocType");
			var $series  = this.$(".DocSeries");
			var $number  = this.$(".DocNumber");

			var seriesMask = $docType.find("option:selected").data("series-mask");
			var numberMask = $docType.find("option:selected").data("number-mask");

			if (!_.isUndefined(seriesMask) && !_.isUndefined(numberMask)) {
				seriesMask = seriesMask.toString();
				numberMask = numberMask.toString();

				seriesMask = seriesMask.replace("0", "?9");
				numberMask = numberMask.replace("0", "?9");

				if (/^s*$/g.test(seriesMask)) {
					seriesMask = "?" + seriesMask.replace(/s/g, "*");
				}
				if (/^s*$/g.test(numberMask)) {
					numberMask = "?" + numberMask.replace(/s/g, "*");
				}

				$series.val("").mask(seriesMask).attr("disabled", false).removeClass("Disabled");
				$number.val("").mask(numberMask).attr("disabled", false).removeClass("Disabled");
			} else {
				$series.val("").attr("disabled", true).addClass("Disabled");
				$number.val("").attr("disabled", true).addClass("Disabled");
			}*/
		},

		onSeriesKeypress: function (event) {
			if (this.$("input[name$='series']").val().length == this.seriesLength) {
				event.preventDefault();
				event.stopPropagation();
			}
		},

		onNumberKeypress: function (event) {
			if (this.$("input[name$='number']").val().length == this.numberLength) {
				event.preventDefault();
				event.stopPropagation();
			}
		},

		render: function () {
			var idCardJSON = this.model.toJSON();
			idCardJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, idCardJSON));

			UIInitialize(this.el);

			// TODO: REMOVE!!!
			this.$(".DocSeries").mask("?********");
			this.$(".DocNumber").mask("?****************");

			this.toggleRemoveIcon();

			this.$el.fadeIn("fast");

			return this;
		}
	});

	// Шаг 3. Адреса
	var AddressView = View.extend({
		//model: App.Models.Patient,
		addressesEqual: false,

		events: {
			"change #addresses-equal": "onAddressesEqualChange"
		},

		initialize: function () {
			var residential = this.model.get("address").get("residential");
			var registered = this.model.get("address").get("registered");

			this.residentialAddress = new App.Views.KLADR({
				//legend: "Адрес проживания",
				address: residential,
				addressType: "residential"
			});
			this.registeredAddress = new App.Views.KLADR({
				//legend: "Адрес регистрации",
				address: registered,
				addressType: "registered"
			});

			this.addressesEqual = this.model.isNew() ? false : this.model.get("address").getIsEqual();

			this.model.get("address").setAddressesEqual(this.addressesEqual);

			/*this.residentialAddress.on("addressChange", function (e) {
				residential.set(e.key, e.value);
				if (this.addressesEqual) {
					registered.set(e.key, e.value);
				}
				console.log(residential.toJSON(), registered.toJSON());
			}, this);

			this.registeredAddress.on("addressChange", function (e) {
				if (!this.addressesEqual) {
					registered.set(e.key, e.value);
				}
			}, this);*/
		},

		onAddressesEqualChange: function (event) {
			var addressesEqual = Boolean($(event.currentTarget).is(":checked"));

			this.model.get("address").setAddressesEqual(addressesEqual);

			this.addressesEqual = addressesEqual;

			this.toggleAddressesEqual(addressesEqual);
		},

		toggleAddressesEqual: function (addressesEqual) {
			this.registeredAddress.$el.parent().toggle(!addressesEqual);
			this.residentialAddress.$el.parent().find("legend").text(addressesEqual ? "Адрес проживания и регистрации" : "Адрес проживания");
		},

		render: function () {
			var self = this;

			//this.addressesEqual = this.model.isNew() ? false : this.model.get("address").getIsEqual();

			//this.model.get("address").addressesEqual = this.addressesEqual;


			this.$el.html($.tmpl(tmplAddress, {addressesEqual: self.addressesEqual}));

			UIInitialize(this.el);

			this.assign({
				"#residentialAddress": this.residentialAddress,
				"#registeredAddress" : this.registeredAddress
			});

			this.toggleAddressesEqual(this.addressesEqual);

			return this;
		}
	});


	// Шаг 4. Мед.Особенности
	var MedicalInfoView = View.extend({
		template: tmplMedInfo,

		initialize: function (options) {
			this.drugIntolerances = new DrugIntolerancesView({collection: this.model.get("drugIntolerances")});
			this.allergies = new AllergiesView({collection: this.model.get("allergies")});

			var blood = this.model.get("blood");

			blood.on("change", function (b) {
				if (!blood.get("id")) {
					blood.set("group", "");
				}
				//console.log("blood", blood)
			}, this);

			this.initWithDictionaries([{name: "bloodTypes", pathPart: "bloodTypes"}], this.onDictionariesLoaded, this, true);
		},

		onDictionariesLoaded: function (dicts) {
			this.bloodTypes = dicts.bloodTypes;
			this.render();
		},

		render: function () {
			var self = this;

			this.$el.html($.tmpl(this.template, {bloodTypes: self.bloodTypes}));

			this.assign({
				"#drug-intolerances": this.drugIntolerances,
				"#allergies": this.allergies
			});

			UIInitialize(this.el);

			return this;
		}
	});

	var DrugIntolerancesView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);

			if (this.collection.isEmpty()) {
				this.collection.add({}, {silent: true});
			}
		},

		onDrugIntoleranceAdd: function (drugIntoleranceView) {
			this.triggerView = drugIntoleranceView;
			this.collection.add({}, {at: this.collection.indexOf(this.triggerView.model) + 1});
		},

		addOne: function (drugIntolerance) {
			var drugIntoleranceView = new DrugIntoleranceView({model: drugIntolerance});

			drugIntoleranceView
				.on("drugIntolerance:add", this.onDrugIntoleranceAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(drugIntoleranceView.el);
			} else {
				this.$el.append(drugIntoleranceView.el);
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var DrugIntoleranceView = View.extend({
		className: "DoubleLineBlock",

		template: tmplDrugIntolerance,

		events: {
			"click .AddIcon"   : "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick"
		},

		initialize: function (options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function (event) {
			this.trigger("drugIntolerance:add", this);
		},

		onRemoveIconClick: function (event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		render: function () {
			var drugIntoleranceJSON = this.model.toJSON();
			drugIntoleranceJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, drugIntoleranceJSON));

			UIInitialize(this.el);

			this.toggleRemoveIcon();

			this.$el.fadeIn("fast");

			return this;
		}
	});

	var AllergiesView = View.extend({
		initialize: function (options) {
			this.collection.on("add", this.addOne, this);

			if (this.collection.isEmpty()) {
				this.collection.add({}, {silent: true});
			}
		},

		onItemAdd: function (itemView) {
			this.triggerView = itemView;
			this.collection.add({}, {at: this.collection.indexOf(this.triggerView.model) + 1});
		},

		addOne: function (item) {
			var itemView = new AllergyView({model: item});

			itemView
				.on("item:add", this.onItemAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(itemView.el);
			} else {
				this.$el.append(itemView.el);
			}
		},

		render: function () {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}
	});

	var AllergyView = View.extend({
		className: "DoubleLineBlock",

		template: tmplAllergy,

		events: {
			"click .AddIcon"   : "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick"
		},

		initialize: function (options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function (event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function (event) {
			this.trigger("item:add", this);
		},

		onRemoveIconClick: function (event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function () {
				self.remove();
				self.unbind();
			});
		},

		render: function () {
			var allergyJSON = this.model.toJSON();
			allergyJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, allergyJSON));

			UIInitialize(this.el);

			this.toggleRemoveIcon();

			this.$el.fadeIn("fast");

			return this;
		}
	});


	// Шаг 5. Прочее
	var OtherView = View.extend({
		template: tmplOther,

		events: {
			"change select[name$='socialStatus-id']": "onSocialStatusChange",
			"change select[name|='citizenship']"    : "onCitizenshipChange"

		},

		initialize: function (options) {
			if (this.model.get("occupations").isEmpty()) {
				this.model.get("occupations").add({});
			}
			if (this.model.get("occupations").first().get("works").isEmpty()) {
				this.model.get("occupations").first().get("works").add({});
				//console.warn("work created");
			}
			if (this.model.get("disabilities").isEmpty()) {
				this.model.get("disabilities").add({});
			}

			var work = this.model.get("occupations").first().get("works").first();

			if (!work.get("rank")) {
				work.set("rank", {});
			}
			if (!work.get("forceBranch")) {
				work.set("forceBranch", {});
			}

			var firstCitizenship = this.model.get("citizenship").get("first");
			var secondCitizenship = this.model.get("citizenship").get("second");

			firstCitizenship.get("socStatusType").on("change", function (sst) {
				if (!sst.get("id")) {
					firstCitizenship.unset("id");
					//console.log(firstCitizenship);
				}
			}, this);

			secondCitizenship.get("socStatusType").on("change", function (sst) {
				if (!sst.get("id")) {
					secondCitizenship.unset("id");
					//console.log(secondCitizenship);
				}
			}, this);

			var otherDicts = [
				{name: "disabilityTypes", pathPart: "disabilityTypes"},
				{name: "disabilityApprovalDocs", pathPart: "clientDocument&filter[groupId]=7"},
				{name: "citizenships", pathPart: "citizenships"},
				{name: "benefitCategoriesFederal", fd: true, id: 10},
				{name: "benefitCategoriesRegional", fd: true, id: 11},
				//{name: "socialStatuses", fd: true, id: 1},
				{name: "socialStatuses", pathPart: "socStatus"},
				{name: "ranks", fd: true, id: 7},
				{name: "forceBranches", fd: true, id: 6}
			];

			this.initWithDictionaries(otherDicts, this.onDictionariesLoaded, this, true);
		},

		onDictionariesLoaded: function (dicts) {
			this.dicts = {};

			this.dicts.citizenships   = dicts.citizenships.sort(function (a, b) {
				var nameA = a.value.toLowerCase(), nameB = b.value.toLowerCase();
				if (nameA < nameB)
					return -1;
				if (nameA > nameB)
					return 1;
				return 0;
			});
			this.dicts.socialStatuses = dicts.socialStatuses;
			this.dicts.ranks          = dicts.ranks;
			this.dicts.forceBranches  = dicts.forceBranches;

			_(this.dicts.socialStatuses).each(function (socialStatus) {
				switch (socialStatus.id) {
					case 310:
						//Работающий
						socialStatus.dataRelation = ".Occupation.WorkingPlace";
						break;
					case 311:
						//Неработающий
						socialStatus.dataRelation = ".Occupation.CommentOnly";
						break;
					case 312:
						//Неработающий пенсионер
						socialStatus.dataRelation = ".Occupation.CommentOnly";
						break;
					case 313:
						//Дошкольник
						socialStatus.dataRelation = ".Occupation.Preschool";
						break;
					case 314:
						//Учащийся
						socialStatus.dataRelation = ".Occupation.School";
						break;
					case 315:
						//Военнослужащий
						socialStatus.dataRelation = ".Occupation.Military";
						break;
					case 316:
						//Член семьи военнослужащего
						socialStatus.dataRelation = ".Occupation.CommentOnly";
						break;
					case 317:
						//БОМЖ
						socialStatus.dataRelation = ".Occupation.CommentOnly";
						break;
				}
			});

			this.dicts.disabilityTypes           = dicts.disabilityTypes;
			this.dicts.disabilityApprovalDocs    = dicts.disabilityApprovalDocs;
			this.dicts.benefitCategoriesFederal  = dicts.benefitCategoriesFederal;
			this.dicts.benefitCategoriesRegional = dicts.benefitCategoriesRegional;

			//this.benefitCategories = _(dicts.benefitCategoriesFederal).union(dicts.benefitCategoriesRegional);

			this.render();
		},

		onSocialStatusChange: function (event) {
			var $sel = this.$("select[name$='socialStatus-id']");
			var relation = this.$("select[name$='socialStatus-id']").find(":selected").data("relation");

			if ($sel.val() != this.model.get("occupations").first().get("socialStatus").get("id")) {
				// Обнулим все остальные значения инпутов, чтобы их данные не попали в модель
				this.$(".Occupation").hide().find(":input").val("").change();
			}

			this.$(relation).show();
		},

		onCitizenshipChange: function (event) {
			//this.$("")
			if (!$(event.currentTarget).val()) {
				this.model.get($(event.currentTarget));
			}
		},

		render: function () {
			var self = this;

			var json = {
				occCid: self.model.get("occupations").first().cid,
				workCid: self.model.get("occupations").first().get("works").first().cid,
				disCid: self.model.get("disabilities").first().cid,
				//benefitCategories: this.benefitCategories || [],
				/*citizenships: this.citizenships || [],
				socialStatuses: this.socialStatuses,
				ranks: this.ranks,
				forceBranches: this.forceBranches*/
				dicts: self.dicts || {}
			};

			this.$el.html($.tmpl(this.template, json));

			if (this.model.isNew()) {
				this.$("select[name='citizenship-first-socStatusType-id']").val(249).change();
			}

			UIInitialize(this.el);

			this.$(".select2").width("100%").select2();

			/*this.assign({
				"#disabilities": this.disabilities//,
				//"#occupations": this.occupations
			});*/

			return this;
		}
	});


	// Шаг 6. Квоты
	var QuotesView = View.extend({
		events: {
			"click #new-quota": "onNewQuotaClick"
		},

		//noSaveBtn: true,

		template:
			'<li>' +
				'<div class="ContentHeader Clearfix">' +
					'<div class="PageActions">' +
						'<button id="new-quota" class="Styled Button">' +
							'<i class="Icon AddIcon Tiny"></i>' +
							'<span>Добавить талон</span>' +
						'</button>' +
					'</div>' +
				'</div>' +
				'<div id="quotes-grid"></div>' +
				'<div id="empty-alert" class="Hidden"><h4>Не найдено талонов</h4></div>' +
			'</li>',

		initialize: function (options) {
			this.collection = new App.Collections.Quotes();
			this.grid = new App.Views.Grid({
				collection: this.collection,
				template: "grids/quotes",
				gridTemplateId: "#quotes-grid-department",
				rowTemplateId: "#quotes-grid-row-department",
				defaultTemplateId: "#quotes-grid-department-default"
			});

			if (!this.options.patient.isNew()) {
				this.patientAppeals = new App.Collections.PatientAppeals();
				this.patientAppeals.patient = this.options.patient;

				this.patientAppeals.on("reset", function () {
					if (this.patientAppeals.length) {
						this.collection.patientId = this.options.patient.get("id");
						this.collection.appealId = this.patientAppeals.first().get("id");

						this.collection.on("reset", function () {
							this.$("#empty-alert").toggle(!this.collection.length);
						}, this);

						this.collection.fetch();

						this.departments = new App.Collections.Departments();
						this.departments.setParams({
							filter: {
								hasBeds: true
							}
						});
						this.departments.on("reset", this.onDepartmentsReset, this);
						this.departments.fetch();

						this.quotaTypes = new App.Collections.QuotaTypes();
						this.quotaTypes.fetch();

						this.initWithDictionaries([
							{name: "stages", fd: true, id: 32},
							{name: "statuses", pathPart: "quotaStatus"}
						], this.onDictionariesLoaded, this, true);

						Cache.Patient = this.options.patient;
					}
				}, this);

				this.patientAppeals.fetch();
			}
		},

		onDictionariesLoaded: function (dictionaries) {
			this.dictionaries = dictionaries;
			this.dictionaries.stages = _(this.dictionaries.stages).filter(function (stage) {
				return (["1", "3", "4"].indexOf(stage["74"]) !== -1);
			});
			console.log(dictionaries);
			/*this.render();
			UIInitialize(this.el);*/
		},

		onDepartmentsReset: function () {
			console.log(this.departments.toJSON());
			/*this.render();
			UIInitialize(this.el);*/
		},

		onNewQuotaClick: function () {
			console.log("new quota");
			var addQuotaDialog = new AddQuotaView({
				dicts: this.dictionaries,
				patientAppeals: this.patientAppeals.toJSON(),
				departments: this.departments.toJSON(),
				quotaTypes: this.quotaTypes.toJSON(),
				patientSex: this.options.patient.get("sex")
			}).render();

			addQuotaDialog.on("save", function (options) {
				this.collection.fetch();
			}, this);
		},

		openQuota: function (quotaId) {
			console.log(quotaId);

			var addQuotaDialog = new AddQuotaView({
				dicts: this.dictionaries,
				patientAppeals: this.patientAppeals.toJSON(),
				departments: this.departments.toJSON(),
				quotaTypes: this.quotaTypes.toJSON(),
				patientSex: this.options.patient.get("sex"),
				model: this.collection.get(quotaId)
			}).render();

			addQuotaDialog.on("save", function (options) {
				this.collection.fetch();
			}, this);
		},

		render: function () {
			var self = this;

			if (!this.options.patient.isNew()) {
				this.$el.html($.tmpl(this.template));

				this.$("#quotes-grid").empty().append(this.grid.el);

				this.grid.$(".EditQuota").live("click", function (event) {
					event.preventDefault();
					event.stopPropagation();

					var quotaId = $(this).parent().siblings(".QuotaIdHolder").data("quota-id");
					self.openQuota(quotaId);
				});

				// Пэйджинатор
				this.paginator = new App.Views.Paginator({
					collection: self.collection
				});
				this.depended(this.paginator);

				this.$("li").append(this.paginator.render().el);

				if (self.collection.length) {
					this.paginator.ready();
				}

				this.delegateEvents();
				this.grid.delegateEvents();
				this.paginator.delegateEvents();
			} else {
				this.$el.html($.tmpl("<li><h4>Для добавления талона необходимо создать обращение.</h2></li>"));
			}

			return this;
		}
	});

	var AddQuotaView = Form.extend({
		className: "popup",

		events: {
			"click .MKBLauncher": "launchMKB",
			"keyup #quota-diagnosis-code": "onMKBCodeKeyUp",
			"change #quota-talonNumber": "onTalonNumberChange"
		},

		template: tmplQuotes,

		initialize: function (options) {
			_.bindAll(this);

			if (!this.model) this.model = new App.Models.Quota();

			var mkb = this.model.get("mkb");

			this.mkbDir = new App.Views.MkbDirectory();
			/*this.mkbDir.on("selectionConfirmed", function (event) {
				this.selectedMkb = event.selectedDiagnosis;
			}, this);*/

			this.mkbDir.on("selectionConfirmed", function (event) {
				mkb.set({
					code: event.selectedDiagnosis.get("code") || event.selectedDiagnosis.get("id"),
					diagnosis: event.selectedDiagnosis.get("diagnosis")
				});
			}, this);

			mkb.on("change", function () {
				this.$("#quota-diagnosis-code").val(mkb.get("code"));
				this.$("#quota-diagnosis-desc").val(mkb.get("diagnosis"));
			}, this);
		},

		launchMKB: function () {
			this.mkbDir.open();
		},

		onTalonNumberChange: function (event) {
			var talonNumber = $(event.currentTarget).val().replace(/[^\d.]/g, "");

			console.log(talonNumber.length);

			$(event.currentTarget).removeClass("WrongField");

			if (talonNumber.length > 3) {
				if (talonNumber.length != 17) $(event.currentTarget).addClass("WrongField");
			} else {
				$(event.currentTarget).val("");
			}
		},

		render: function () {
			var self = this;
			this.$el.html($.tmpl(this.template, {
				model: this.model.toJSON(),
				dicts: this.options.dicts || {},
				departments: this.options.departments,
				patientAppeals: this.options.patientAppeals,
				quotaTypes: this.options.quotaTypes
			}));

			this.$el.dialog({
				//autoOpen: false,
				width: "86em",
				title: "Добавление талона",
				resizable: false,
				dialogClass: "webmis",
				modal: true,
				buttons: [
					{
						text: self.model.isNew() ? "Добавить" : "Сохранить",
						//class: "Styled Button buttonOK",
						//id: "confirmSelection",
						click: self.onAddClick
					}, {
						text: "Отмена",
						click: self.close
					}
				]
			});

			this.$("a").click(function (event) {
				event.preventDefault();
			});

			UIInitialize(this.el);

			this.$(".select2").width("100%").select2();
			this.$("#quota-talonNumber").mask("99.9999.99999.999");

			this.mkbDir.render();

			var patientSex = self.options.patientSex.length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;

			this.$("#quota-diagnosis-code").autocomplete({
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
					self.model.get("mkb").set({
						id: ui.item.id,
						code: ui.item.value,
						diagnosis: ui.item.diagnosis
					}, {silent: true});

					self.$("#quota-diagnosis-desc").val(ui.item.diagnosis);

					console.log(ui.item ?
						"Selected: " + ui.item.label :
						"Nothing selected, input was " + this.value);
				}
			}).on("keyup", function () {
					if (!$(this).val().length) {
						self.model.get("mkb").set({
							id: "",
							code: "",
							diagnosis: ""
						}, {silent: true});

						self.$("#quota-diagnosis-desc").val("");
					}
				});

			return this;
		},

		onAddClick: function () {
			if (this.validate()) {
				this.model.set({
					"appealNumber": this.$("#quota-appealNumber").val(),
					"talonNumber": this.$("#quota-talonNumber").val(),
					//"stage": this.$("#quota-stage").val(),
					"stage": {
						id: this.$("#quota-stage").val()
					},
					//"request": this.$("#quota-request").val(),
					"request": {
						id: this.$("#quota-request").val()
					},
					/*"mkb": {
						id: this.selectedMkb.get("id") || this.selectedMkb.get("code")
					},*/
					"quotaType": {
						id: this.$("#quota-quotaType").val()
					},
					"department": {
						id: this.$("#quota-department").val()
					},
					"status": {
						id: this.$("#quota-status").val()
					}
				});

				var self = this;

				self.model.save(null, {success: function () {
					console.log("quota saved");
					self.trigger("save");
					self.close();
				}});
			}
		},

		validate: function () {
			var talonNumberLength = this.$("#quota-talonNumber").val().replace(/[^\d.]/g, "").length;
			var talonNumberValid = (talonNumberLength == 17) || (talonNumberLength == 0);

			return Form.prototype.validate.apply(this) && talonNumberValid;
		},

		onMKBCodeKeyUp: function (event) {
			$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
		},

		open: function () {
			this.$el.dialog("open");
		},

		close: function () {
			this.unbind().remove();
		}
	});


	var MenuView = View.extend({
		template: "<ul class='AsideNav'>" +
			"{{each(i, item) structure}}" +
			"<li id='menu-item-${item.name}' data-step='${item.name}' data-uri='${item.uri}' data-title='${item.title}'>" +
			"<a href=''><span>${item.title}</span></a>" +
			"</li>" +
			"{{/each}}" +
			"</ul>",

		events: {
			"click li": "onMenuItemClick"
		},

		onMenuItemClick: function (event) {
			event.preventDefault();
			//if ($(event.currentTarget).data("step") != "address") {
				App.Router.navigate($(event.currentTarget).data("uri"));
				this.trigger("step:change", {
					name: $(event.currentTarget).data("step"),
					uri: $(event.currentTarget).data("uri"),
					title: $(event.currentTarget).data("title")
				});
			//}
		},

		render: function () {
			this.$el.html($.tmpl(this.template, {structure: this.options.structure}));

			return this;
		}
	});

	/*var NewMenuView = View.extend({
		template: "<ul class='AsideNav'></ul>",
		events: {
			"click li": "onMenuItemClick"
		},

		initialize: function (options) {
			this.collection = new Backbone.Collection(options.items);
		},

		onMenuItemClick: function (event) {

		},

		render: function () {
			this.$el.empty().append(this.template);
			this.$(".AsideNav");

			return this;
		}
	});*/

	/*var MenuItemView = View.extend({
		tagName: "li",
		template: "<a href=''><span><%= item.title %></span></a>",

		events: {
			"click": "onClick"
		},

		initialize: function (options) {
			this.model.on("change", this.render, this);
		},

		render: function () {
			this.$el.empty().append(_.template(this.template, this.model.toJSON()));

			return this;
		}
	});*/

	/*var ErrorTooltip = View.extend({
		className: "ToolTip",

		template: "<p class='Error'></p>",

		initialize: function (options) {

		},

		showAt: function (el) {
			var $target = $(el);
			this.setPosition($target);
			this.$(".Error").text($target.data("tooltip-text") || "Введены неверные данные");
			this.$el.fadeIn("fast");
		},

		hide: function () {
			this.$el.hide();
		},

		setPosition: function ($target) {
			if ($target.is("select"))
				$target = $target.next();

			var $tip = this.$el;
			var pos = $target.data("tooltip-position") || "right";
			var p = $target.position();
			var x, y;

			//console.log($target.offset(), $target.width(), $target.height());

			$tip.removeClass("LeftTail BottomTail RightTail TopTail");

			if (pos === "right") {
				$tip.addClass("LeftTail");
				x = p.left + $target.outerWidth(true) + 10;
				y = p.top - $target.height()/2;
			} else if (pos === "top") {
				x = p.left - ($target.outerWidth(true) + ($target.outerWidth(true) - $tip.outerWidth(true)))/2;
				y = p.top - $target.outerHeight(true) - $tip.outerHeight(true);
				$tip.addClass("BottomTail");
			} else if (pos === "left") {
				$tip.addClass("RightTail");
				x = p.left - $target.outerWidth(true) - ($tip.outerWidth(true) - $target.outerWidth(true)) -10;
				y = p.top - $target.height()/2;
			} else if (pos === "bottom") {
				$tip.addClass("TopTail");
				x = p.left - ($target.outerWidth(true) + ($target.outerWidth(true) - $tip.outerWidth(true)))/2;
				y = p.top + $target.outerHeight(true) + 10;
			}

			$tip.css('position', 'absolute').css('z-index', '999').css('left', x + 'px').css('top', y + 'px');

			return $tip;
		},

		render: function () {
			this.$el.html(this.template);

			return this;
		}
	});*/
});
