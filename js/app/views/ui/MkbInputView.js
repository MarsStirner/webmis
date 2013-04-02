define([], function() {

	var MkbInput = View.extend({
		events: {
			"click .MKBLauncher": "toggleMKB"
		},

		initialize: function() {
			var view = this;

			view.mkbDirectory = new App.Views.MkbDirectory();
			view.mkbDirectory.on("selectionConfirmed", view.onMKBConfirmed, view);
			view.mkbDirectory.render();

			view.depended(view.mkbDirectory);
		},

		toggleMKB: function(event) {
			event.preventDefault();

			this.mkbAttrId = $(event.currentTarget).data("mkb-examattr-id");

			this.mkbDirectory.open();
		},

		onMKBConfirmed: function(event) {
			var sd = event.selectedDiagnosis;
			//console.log('sd', sd.get("id"));

			this.mkbAttrId = sd.get("id");

			this.$("input[name='diagnosis[mkb][code]']").val(sd.get("code"));
			this.$("input[name='diagnosis[mkb][diagnosis]']").val(sd.get("diagnosis"));
			this.$("input[name='diagnosis[mkb][code]']").data('mkb-id', sd.get("id"));
		},

		onMKBCodeKeyUp: function(event) {
			$(event.currentTarget).val(Core.Strings.toLatin($(event.currentTarget).val()));
		},

		render: function() {
			var view = this;
console.log('jgfhjhfhgjdkhgkjh');
			view.$el.html('render');



			var patientSex = Cache.Patient.get("sex").length ? (Cache.Patient.get("sex") == "male" ? 1 : 2) : 0;

			this.$("input[name='diagnosis[mkb][code]']").autocomplete({
				source: function(request, response) {
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
						success: function(raw) {
							response($.map(raw.data, function(item) {
								return {
									label: item.code + " " + item.diagnosis,
									value: item.code,
									id: item.id,
									diagnosis: item.diagnosis
								};
							}));
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					view.mkbAttrId = $(this).data("mkb-examattr-id");

					view.$("input[name='diagnosis[mkb][diagnosis]']").val(ui.item.diagnosis);
					view.$("input[name='diagnosis[mkb][code]']").val(ui.item.displayText);
					view.$("input[name='diagnosis[mkb][code]']").data('mkb-id', ui.item.id);
				}
			}).on("keyup", function() {
				if (!$(this).val().length) {
					view.$("input[name='diagnosis[mkb][diagnosis]']").val("");
				}
			});

			view.$(".MKBLauncher").button({
				icons: {
					primary: "icon-book"
				}
			});


			return view;

		}

	});

	return MkbInput;
});