define([ 'text!templates/appeal/edit/popups/labs-list-item.tmpl'],
	function (testsGroupTemplate) {

		var TestsGroupView = View.extend({
			template: testsGroupTemplate,

			events: {
				'click': 'click'
			},
//
			click: function (e) {
                var view = this;
                view.$el.siblings().removeClass('selected');
                view.$el.addClass('selected');

                if(this.model.get('groups').length){
                    console.log('щёлкнули по коду', this.model.get('code'));
                    pubsub.trigger('group-of-tests', this.model.get('code'))
                }else{
                    console.log('надо открыть исследование с кодом', this.model.get('code'));
                    pubsub.trigger('load-set-of-tests', this.model.get('code'))
                }

			},
//
			render: function () {
				var view = this;
				view.$el.html($.tmpl(view.template, view.model.toJSON()));
				return view;
			}

		});


		return TestsGroupView;

	});
