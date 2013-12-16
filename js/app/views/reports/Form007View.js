define(["text!templates/reports/f007.html",
	"views/ui/RangeDatepickerView",
	"views/ui/SelectView",
	"views/documents/documents",
	"collections/moves/BedProfilesDir",
	"collections/departments",
	"models/print/form007"
], function(tmpl, RangeDatepickerView, SelectView, Documents, BedProfilesDir) {

	var BedProfileFilter = Documents.Views.Base.extend({
		template: _.template("<div class='span6 bed-profile-list'></div>"),
		initialize: function () {
			this.bedProfilesDir = new BedProfilesDir();
			this.listenTo(this.bedProfilesDir, "selected", this.onBedProfileSelected);
			this.listenTo(this.bedProfilesDir, "deselected", this.onBedProfileDeselected);
		},
		onBedProfileSelected: function (event) {
			this.collection.add(event.bedProfile);
			console.log("bedProfile added");
		},
		onBedProfileDeselected: function (event) {
			this.collection.remove(event.bedProfile.id);
			console.log("bedProfile removed");
		},
		render: function () {
			Documents.Views.Base.prototype.render.call(this, {
				".bed-profile-list": new BedProfileList({collection: this.bedProfilesDir})
			});
		}
	});

	var BedProfileList = Documents.Views.Base.extend({
		template: _.template("<select multiple data-placeholder='Профили коек' class='bed-profiles'><%bedProfiles.each(function(bp){%><option value='<%=bp.id%>'><%=bp.get('name')%></option><%});%></select>"),
		data: function () {
			return {bedProfiles: this.collection};
		},
		initialize: function () {
			this.listenTo(this.collection, "reset", this.onCollectionReset);
			this.collection.fetch();
		},
		onCollectionReset: function () {
			this.render();
		},
		onListChange: function (event) {
			if (event.added) {
				this.collection.trigger("selected", {bedProfile: this.collection.get(event.added.id)});
			} else if (event.removed) {
				this.collection.trigger("deselected", {bedProfile: this.collection.get(event.removed.id)});
			}
		},
		render: function () {
			Documents.Views.Base.prototype.render.apply(this);

			this.$(".bed-profiles")
				.width("100%")
				.select2()
				.on("change", _.bind(this.onListChange, this));
			this.$(".select2-container").css("font-size", "1.2em");
			this.$(".select2-input").css("box-sizing", "content-box");
			this.$(".select2-choices").css({"padding": ".3em"});

			return this;
		}
	});

	/*var BedProfileList = Documents.Views.RepeaterBase.extend({
		template: "<div class='span6'><select multiple class='bed-profiles'></select></div>",
		initialize: function () {

		},
		render: function () {

		}
	});*/

	/*var BedProfileItem = Documents.Views.Base.extend({
		template: "",
		initialize: function () {

		},
		render: function () {

		}
	});*/

	return View.extend({
		template: tmpl,
		events: {
			"click .print": "print"
		},

		initialize: function() {
			var view = this;
			var now = (new Date()).getTime()/1000;

			this.rangeView = new RangeDatepickerView({
				startTimestamp: now - (60 * 60 * 24),
				endTimestamp: now
			});

			this.selectedBedProfiles = new Backbone.Collection([]);

			this.depended(this.rangeView);

			// this.departments = new App.Collections.Departments();

			// this.departments.setParams({
			// 	filter: {
			// 		hasBeds: true
			// 	},
			// 	sortingField: 'name',
			// 	sortingMethod: 'asc'
			// });

			// this.departmentSelect = new SelectView({
			// 	collection: this.departments,
			// 	el: view.$('#departments'),
			// 	selectText: 'name'
			// });

			// //this.departments.fetch();

			// this.depended(this.departmentSelect);
		},

		initDepartments: function() {
			var view = this;

			//список отделений
			view.departments = new App.Collections.Departments();

			view.departments.setParams({
				filter: {
					hasBeds: true
				},
				limit: 0,
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			view.departmentSelect = new SelectView({
				collection: view.departments,
				el: view.$('#departments'),
				selectText: 'name'
			});

			view.depended(view.departmentSelect);
		},

		print: function() {
			var view = this;
			view.$("#iframe").html('');

			var form007 = new App.Models.PrintForm007({
				departmentId: $("#departments :selected").val(),
				beginDate: this.rangeView.range.get('from'),
				endDate: this.rangeView.range.get('to'),
				bedProfiles: this.selectedBedProfiles.pluck("id")
			});

			form007.fetch().done(function() {
				var $iframe = $("<iframe id='myiframe'  name='myiframe' src='/pdf/' style='width: 100%;height: 400px;'></iframe>");
				view.$("#iframe").html($iframe); //.hide();

				var loaded = false;
				$iframe.load(function() {
					if(!loaded){
						loaded = true;
					}else{
						return;
					}
					//создаём форму
					var form = view.make("form", {
						"accept-charset": "utf-8",
						"action": "/pdf/",
						method: "post"
					}); //, style: "visibility: hidden"
					//создаём текстовую область для данных
					var textarea = view.make("textarea", {
						name: "data"
					});
					//создаём поле ввода для имени шаблона
					var input = view.make("input", {
						name: "template",
						value: 'f007'
					});

					// вставляем данные в текстовую область
					textarea.innerHTML = JSON.stringify(form007.toJSON());
					//console.log(JSON.stringify(form007.toJSON()))

					var doc = $("#myiframe").contents()[0];
					$(doc.body).html($(form).append(textarea).append(input)).hide();
					$(doc.body).find('form').trigger('submit');
				});
			});
		},

		render: function() {
			this.$el.html($.tmpl(this.template));
			this.$(".print").button();
			this.$("#range").html(this.rangeView.render().el);
			this.assign({
				".bed-profile-filter": new BedProfileFilter({collection: this.selectedBedProfiles})
			});

			this.initDepartments();

			return this;
		},

		cleanUp: function() {
			this.departmentSelect.cleanUp();
		}
	});
});
