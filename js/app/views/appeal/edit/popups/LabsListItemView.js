define([ 'text!templates/appeal/edit/popups/labs-list-item.tmpl'],
	function (labsListItemTemplate) {

		var LabsListItemView = View.extend({
			template: labsListItemTemplate,

			events: {
				'click': 'click'
			},

			click: function (e) {
				console.log('нада фильтровать по коду', this.model.get('code'))
			},

			render: function () {
				var view = this;
				view.$el.html($.tmpl(view.template, view.model.toJSON()));
				return view;
			}

		});


		return LabsListItemView;

	});
