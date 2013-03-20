define([ 'text!templates/appeal/edit/popups/labs-groups-list-item.tmpl'],
	function (testsGroupTemplate) {

		var TestsGroupView = View.extend({
			template: testsGroupTemplate,

			events: {
				'click': 'click'
			},
//
			click: function (e) {

				var view = this,
				$clicked = view.$(e.target),
				code = $clicked.data('code');

				console.log($clicked.data('code'))


//				view.$('.lab-tests-list li.selected').each(function () {
//					view.$(this).removeClass('selected');
//				});
//
//				$clicked.addClass('selected');


//                view.$el.addClass('selected');

                if($clicked.data('parent') == 'yes'){
                    console.log('щёлкнули по коду', code);
                    pubsub.trigger('group-of-tests', code)
                }else{
                    console.log('надо открыть исследование с кодом', code);
                    pubsub.trigger('load-set-of-tests', code)
                }

			},
//
			render: function () {
				var view = this;
				console.log('render tests', view.model);
				view.$el.html($.tmpl(view.template, view.model.toJSON()));
				return view;
			}

		});


		return TestsGroupView;

	});
