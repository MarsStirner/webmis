define(["text!templates/pages/prints.tmpl",
	"models/patient",
	"models/print/appeal",
	"models/dynamic/examination-old",
	"models/print/form007",
	"views/print"], function (template){

	return App.Views.Prints = View.extend ({
		events: {
			"click .Actions.PrintAppeal": "showPrintAppeal",
			"click .Actions.PrintPatient": "showPrintPatient",
			"click .Actions.Print007": "showPrint007",
			"click .Actions.PrintConsentExam": "showPrintConsentExam",
			"click .Actions.PrintExam": "showPrintExam"
		},

		showPrint007: function(){
			var Form = new App.Models.PrintForm007({
				id: $("#department-id" ).val()
			});

			new App.Views.Print({
				model: Form,
				template: "processing-agreement"
			});
			Form.fetch();
		},

		showPrintPatient: function(){
			var Patient = new App.Models.Patient({
				id: $("#patient-id" ).val()
			});
			new App.Views.Print({
				model: Patient,
				template: $("#template-name" ).val().length ? $("#template-name" ).val() : "processing-agreement"
			});
			Patient.fetch();
		},

		showPrintAppeal: function(){
			var PrintAppeal = new App.Models.PrintAppeal({
				id: $("#appeal-id" ).val()
			});
			new App.Views.Print({
				model: PrintAppeal,
				template: $("#template-name" ).val().length ? $("#template-name" ).val() : "003"
			});
			PrintAppeal.fetch();
		},

		showPrintConsentExam: function(){
			var Patient = new App.Models.Patient({
				id: $("#patient-id" ).val()
			});
			new App.Views.Print({
				model: Patient,
				template: $("#template-name" ).val().length ? $("#template-name" ).val() : "consent_to_the_examination"
			});
			Patient.fetch();
		},

		showPrintExam: function(){
			var examId    = $("#exam-id").val();
			var patientId = $("#patient-id").val();
			var appealId  = $("#appeal-id").val();

			var templateName = $("#template-name").val();

			var exam = new App.Dynamic.ExaminationOld({id: examId});

			exam.on("change", function () {
				var summaryAttrs = exam.toJSON()[0]["group"][0]["attribute"];

				var examName       = summaryAttrs[1]["properties"][0]["value"];
				var examEndDate    = summaryAttrs[3]["properties"][0]["value"];
				var examDoctorName = [
					summaryAttrs[4]["properties"][0]["value"],
					summaryAttrs[5]["properties"][0]["value"],
					summaryAttrs[6]["properties"][0]["value"]
				].join(" ");
				var examDoctorSpecs = summaryAttrs[7]["properties"][0]["value"];

				var data = {
					patientId: patientId,
					appealId: appealId,
					examId: examId,
					examName: examName,
					examEndDate: examEndDate,
					examDoctorName: examDoctorName,
					examDoctorSpecs: examDoctorSpecs,
					attributes: exam.getFilledAttrs()
					/*_(exam.getFlatAttrs())
						.map(function (a, k) { return {name: k, value: a}; })
						.filter(function (a) { return a.value && a.value.length && a.value !== "0.0"; })*/
				};

				console.log(data);

				new App.Views.Print({
					data: data,
					template: templateName.length ? templateName : "examination"
				});
			}, this);

			exam.fetch();
		},

		render: function(){
			this.$el.append(template);
			return this
		}
	});
});