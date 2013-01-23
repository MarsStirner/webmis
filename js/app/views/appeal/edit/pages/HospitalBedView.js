/**
 * User: VKondratev
 * Date: 29.11.12
 */

define([
	"text!templates/appeal/edit/pages/hospital-bed.tmpl",
	"models/HospitalBed",
	"collections/departments",
	"views/appeal/edit/pages/ChamberView"
], function (template) {

	App.Views.HospitalBed = View.extend({
		className: "ContentHolder",
		template: template,

		events: {
            'change .Departments':'onSelectDepartment'
		},

		initialize: function () {
            this.model = new App.Models.HospitalBed();

            this.moves = new App.Collections.Moves();
            this.moves.appealId = this.options.appeal.get("id");
            this.moves.on("reset", function () {
                this.model.moveId = this.moves.find(function (move) {
                    return !move.get("admission");
                }).get("id");

                this.model.fetch();
            }, this);

            this.moves.fetch();

//            this.model.save({
//                "clientId": 4433,
//                "movedFromUnitId": 17,
//                "patronage": "Нет"
//            }, {
//                success: function (a, b, c) {
//                    console.log(a, b, c);
//                }
//            });
            //this.model.fetch();

			//this.model.appeal = this.options.appeal;

			//this.model.on("change", this.onHospitalBedChange, this);

			this.departments = new App.Collections.Departments();
			this.departments.setParams({
				filter: {
					hasBeds: true
				}
			});
			this.departments.on("reset", this.onDepartmentsLoaded, this);
			this.departments.fetch();
		},

		onHospitalBedChange: function () {
		},

		onDepartmentsLoaded : function (departments) {
			this.departmentsJSON  = departments.toJSON();
			_(this.departmentsJSON).each(function (d) {
				 this.$(".Departments").append($("<option/>", {
					 "text": d.name,
					 "value": d.id
				 }));
			}, this);
		},
        onSelectDepartment: function(event){
        console.log($('.Departments option:selected').val());
            this.model.fetch();


        },

		onBedsLoaded: function (chambers) {
            console.log('onbedsloaded');
            var that = this;
			var chamberView;
			_.each(chambers, function (ch) {
                //console.log(ch.bedList)
				chamberView = new App.Views.Chamber({
					bedList: ch.bedList
				});

				that.$(".bedsTable tbody").append(chamberView.render().el);
			});
		},

		render: function () {
			this.$el.html($.tmpl(this.template));

//			this.chambers = [{
//                "chamberId": 1,
//                "chamber": null,
//                "bedList": [{
//                    "bedId": 12121,
//                    "busy": "yes"
//                },
//                    {
//                        "bedId": 453496,
//                        "busy": "yes"
//                    }
//                ]},
//				{
//					"chamberId": 2,
//					"chamber": null,
//					"bedList": [
//						{
//							"bedId": 96,
//							"busy": "yes"
//						},
//						{
//							"bedId": 97,
//							"busy": "yes"
//						},
//						{
//							"bedId": 98,
//							"busy": "yes"
//						},
//						{
//							"bedId": 99,
//							"busy": "yes"
//						},
//						{
//							"bedId": 100,
//							"busy": "yes"
//						},
//						{
//							"bedId": 101,
//							"busy": "yes"
//						},
//						{
//							"bedId": 102,
//							"busy": "yes"
//						},
//						{
//							"bedId": 103,
//							"busy": "yes"
//						},
//						{
//							"bedId": 104,
//							"busy": "yes"
//						},
//						{
//							"bedId": 105,
//							"busy": "yes"
//						},
//						{
//							"bedId": 106,
//							"busy": "yes"
//						},
//						{
//							"bedId": 107,
//							"busy": "yes"
//						},
//						{
//							"bedId": 108,
//							"busy": "yes"
//						},
//						{
//							"bedId": 109,
//							"busy": "yes"
//						},
//						{
//							"bedId": 110,
//							"busy": "yes"
//						},
//						{
//							"bedId": 111,
//							"busy": "yes"
//						},
//						{
//							"bedId": 112,
//							"busy": "yes"
//						},
//						{
//							"bedId": 113,
//							"busy": "yes"
//						},
//						{
//							"bedId": 114,
//							"busy": "yes"
//						},
//						{
//							"bedId": 115,
//							"busy": "yes"
//						},
//						{
//							"bedId": 116,
//							"busy": "yes"
//						},
//						{
//							"bedId": 117,
//							"busy": "yes"
//						},
//						{
//							"bedId": 118,
//							"busy": "yes"
//						},
//						{
//							"bedId": 119,
//							"busy": "yes"
//						},
//						{
//							"bedId": 120,
//							"busy": "yes"
//						},
//						{
//							"bedId": 121,
//							"busy": "yes"
//						},
//						{
//							"bedId": 122,
//							"busy": "yes"
//						},
//						{
//							"bedId": 123,
//							"busy": "yes"
//						},
//						{
//							"bedId": 124,
//							"busy": "yes"
//						},
//						{
//							"bedId": 125,
//							"busy": "yes"
//						},
//						{
//							"bedId": 411,
//							"busy": "no"
//						},
//						{
//							"bedId": 412,
//							"busy": "yes"
//						},
//						{
//							"bedId": 413,
//							"busy": "no"
//						}
//					]
//				}
//			];
//			this.onBedsLoaded(this.chambers);

            UIInitialize(this.el);

            this.$(".Departments").width("100%").select2();

            this.delegateEvents();

			return this;
		}
	});
});