define(["text!templates/reports/f007.html",
	"views/ui/RangeDatepickerView",
	"views/ui/SelectView",
	"collections/departments",
	"models/print/form007"], function(tmpl, RangeDatepickerView, SelectView) {

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

			this.departments = new App.Collections.Departments();

			this.departments.setParams({
				filter: {
					hasBeds: true
				},
				sortingField: 'name',
				sortingMethod: 'asc'
			});

			this.departmentSelect = new SelectView({
				collection: this.departments,
				el: view.$('#departments'),
				selectText: 'name'
			});

			//this.departments.fetch();

			this.depended(this.departmentSelect);

		},
		initDepartments: function() {
			var view = this;

			//список отделений
			view.departments = new App.Collections.Departments();

			view.departments.setParams({
				filter: {
					hasBeds: true
				},
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
				endDate: this.rangeView.range.get('to')
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
			//console.log('007 render');

			this.$el.html($.tmpl(this.template));

			this.$(".print").button();

			this.$("#range").html(this.rangeView.render().el);
			this.initDepartments();

			return this;
		}

	});
});
