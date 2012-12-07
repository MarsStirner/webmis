define(["collections/appeals"], function ()
{
	App.Views.AppealsHistory = View.extend({
		template:
			'<ul class="TreatmentHistory"></ul>' +
			'<div class="AllTreatments">' +
				'<a href="/patients/${patient.id}/appeals/">Все обращения пациента</a> <span class="Quant">(${quantity})</span>' +
			'</div>',

		initialize: function () {
			this.appealsHistoryList = new AppealsHistoryList({collection: this.options.appeals});
		},

		render: function () {
			this.$el.html($.tmpl(this.template, {
				quantity: this.options.appeals.length,
				patient: this.options.appeals.patient
			}));

			this.assign({
				".TreatmentHistory": this.appealsHistoryList
			});

			return this;
		}
	});
	
	var AppealsHistoryList = View.extend({
		render: function () {
			_(this.collection.first(5)).each(function (a) {
				var appealsHistoryItem = new AppealsHistoryItem({model: a});
				this.$el.append(appealsHistoryItem.render().el);
			}, this);

			return this;
		}
	});

	var AppealsHistoryItem = View.extend({
		tagName: "li",

		template:
			'<h4><a href="/appeals/${id}/">№ ${number}</a></h4>' +
			'{{if execPerson.department && execPerson.department.name}}${execPerson.department.name}<br>{{/if}}' +
			'{{if execPerson.doctor && execPerson.doctor.name}}' +
				'${execPerson.doctor.name.last} ' +
				'{{if execPerson.doctor.name.first && execPerson.doctor.name.first.length}}${execPerson.doctor.name.first[0]}.{{/if}} ' +
				'{{if execPerson.doctor.name.middle && execPerson.doctor.name.middle.length}}${execPerson.doctor.name.middle[0]}.<br>{{/if}}' +
			'{{/if}}' +
			'{{formatDate rangeAppealDateTime.start}}{{if rangeAppealDateTime.end}} — {{formatDate rangeAppealDateTime.end}}{{/if}}',

		render: function () {
			//this.$el.html( $("#patient-card-page-history-item" ).tmpl( this.model.toJSON() ) );
			this.$el.html($.tmpl(this.template, this.model.toJSON()));

			return this;
		}
	});
} );