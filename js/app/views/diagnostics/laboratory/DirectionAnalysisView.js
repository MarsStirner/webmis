define(function(require) {
	var analysisTemplate = require('text!templates/diagnostics/laboratory/direction-analysis.html');
	var Analysis = require('models/diagnostics/laboratory/Analysis');

	var AnalysisView = Backbone.View.extend({
		tagName: 'tr',
		// className: 'context-menu-'+this.cid,
		events: {
			'change .cito': 'onCitoChange',
			'change .select_date': 'setPlannedEndDate',
			'change .select_time': 'setPlannedEndDate',
			'change .tests-checkbox': 'onTestSelect',
			'click .icon': 'onArrowClick',
			'click .title2': 'onTitleClick'
		},
		initialize: function(options) {
			//console.log('options', options);
			this.$el.attr('data-code', this.model.get('code'));
			this.$el.attr('data-cid', this.model.cid);
			this.$el.addClass('context-menu-' + this.cid);

		},

		analysisData: function() {
			//console.log('this.model',this.model)
			var data = _.extend(this.model.toJSON(), {
				cid: this.model.cid,
				tests: this.model.getTests()
			});
			return data;
		},

		onTestSelect: function(event) {
			var $target = $(event.target);
			var name = $target.val();
			var value = $target.prop('checked');
			if (value) {
				$target.parents('li').addClass('selected');
			} else {
				$target.parents('li').removeClass('selected');
			}
			this.model.setProperty(name, 'isAssigned', "" + value);
		},

		onTitleClick: function() {
			//console.log('onTitleClick');
		},

		onCitoChange: function() {
			var view = this;
			var value = this.ui.$cito.prop('checked');

			view.model.setProperty('urgent', 'value', "" + value);

		},

		setPlannedEndDate: function() {
			var view = this;
			var rawDate = this.ui.$date.val();
			var rawTime = this.ui.$time.val();

			var date = moment(rawDate, 'DD.MM.YYYY').format('YYYY-MM-DD');
			var time = rawTime + ':00';

			view.model.setProperty('plannedEndDate', 'value', date + ' ' + time);

			if (!view.ui.$select.prop('checked')) {
				view.ui.$select.prop('checked', true).trigger('change');
			}

		},

		onArrowClick: function(e) {
			var $target = $(e.target);


			if ($target.hasClass('icon-open')) {
				this.collapse();
			} else {
				this.expand();
			}

		},

		triggerIcons: function(select) {
			if (select) {
				this.ui.$icons.removeClass('closed').addClass('open');
			} else {
				this.ui.$icons.removeClass('open').addClass('closed');
			}
		},

		triggerTestsList: function(select) {
			if (select) {
				this.ui.$tests.show();
			} else {
				this.ui.$tests.hide();
			}
		},

		expand: function() {
			//console.log('expand');
			this.triggerTestsList(true);
			this.triggerIcons(true);

		},
		collapse: function() {
			//console.log('collapse');
			this.triggerTestsList(false);
			this.triggerIcons(false);

		},

		render: function() {
			var view = this;


			this.$el.html(_.template(analysisTemplate, this.analysisData(), {
				variable: 'data'
			}));


			view.ui = {};
			view.ui.$date = view.$el.find(".select_date");
			view.ui.$time = view.$el.find(".select_time");
			view.ui.$cito = view.$el.find(".cito");
			view.ui.$select = view.$el.find(".select");
			view.ui.$tests = view.$el.find(".tests");
			view.ui.$icons = view.$el.find(".icons");


			view.ui.$date.datepicker();
			view.ui.$date.datepicker("setDate", "+1");

			view.ui.$time.mask("99:99").timepicker({
				showPeriodLabels: false
			});

			$.contextMenu({
				autoHide: true,
				selector: '.context-menu-' + view.cid,
				callback: function(key, options) {
					//var m = "clicked: " + key + " " + options.$trigger.data("cid");

					//console.log(arguments, options.$trigger.data("cid"));
				},
				items: {
					"select": {
						name: "Выбрать все",
						callback: function() {
							//console.log('select all')
							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', true)
								.trigger('change');
						}
					},
					"deselect": {
						name: "Снять выделение",
						callback: function() {
							//console.log('deselect all')

							$('.context-menu-' + view.cid + ' .tests ')
								.find('input:checkbox').prop('checked', false)
								.trigger('change');

						}
					}
				}
			});


			return this;
		},

		close: function() {
			this.ui.$date.datepicker('destroy');

		}
	});

	return AnalysisView;

});
