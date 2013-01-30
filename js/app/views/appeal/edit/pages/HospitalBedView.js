/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/hospital-bed.tmpl",
	"collections/Beds",
	"collections/moves",
	"models/HospitalBed",
	"collections/departments",
	"views/appeal/edit/pages/BedsView"
], function (template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
			'change select.Departments': 'onSelectDepartment',
			'click .actions.save':'onSave'
		},

		initialize: function () {
			_.bindAll(this);


			this.model = new App.Models.HospitalBed();
			this.model.appealId = this.options.appeal.get("id");
			this.model.set({"clientId": this.options.appeal.get("patient").get("id")},{silent: true});



			//Получаем список отделений со свободными койками
			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();
		},

		//рисуем выпадающий список отделений
		onDepartmentsLoaded: function (departments) {
			this.departmentsJSON = departments.toJSON();
			_(this.departmentsJSON).each(function (d, index) {
				this.$(".Departments").append($("<option/>", {
					"text": d.name,
					"value": d.id
				}));
			}, this);

		},

		getDepartmentId: function () {
			var id = 0;
			id = $('.Departments option:selected').val();
			return id;
		},
		onSelectDepartment: function (event) {
			var departmentId = this.getDepartmentId();
			var that = this;

			if (departmentId) {
				//this.model.set('movedFromUnitId', departmentId);
				var bedsView = new App.Views.Beds({el: this.$('.beds'), departmentId: departmentId});
				bedsView.collection.on("reset", function () {
					$('.beds').empty();
					_.each(bedsView.collection.models, function (model) {
						var bedView = new App.Views.Bed({ model: model });
						$('.beds').append(bedView.render().el);
						bedView.on('bedChecked',function(bedId){
							this.model.set('bedId',bedId);

							console.log(bedId);
						}, that);

					});


				});



			}
		},
		setBed:function(bedId){
			this.model.set('bedId',bedId);

			console.log(bedId);
		},
		onSave:function(){
			//this.model.set({"bedId": 237});
			if (!this.model.get("moveDatetime")) {
				this.model.set("moveDatetime", new Date().getTime());
			}
			this.model.save();
			console.log('save',this.model.isNew());
		},


		render: function () {

			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			UIInitialize(this.el);

			//				this.model.connect("bedId", "beds");
			this.model.connect("movedFromUnitId", "departments", this.$el);
			this.model.connect("patronage", "patronage", this.$el);
			this.model.connect("moveDatetime", this.$("#move-date"), this.$el);


			this.$(".HourPicker").mask("99:99");
			this.$(".Departments").width("100%").select2();

			this.delegateEvents();

			return this;
		}
	});
});
