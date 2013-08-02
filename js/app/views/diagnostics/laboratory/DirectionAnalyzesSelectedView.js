//окошко с выбранными лабороторными исследованиями
define(function(require) {

	var analyzesListTemplate = require('text!templates/diagnostics/laboratory/direction-analyzes-selected.html');

	var AnalysisView = require('views/diagnostics/laboratory/DirectionAnalysisView');
	var Analysis = require('models/diagnostics/laboratory/Analysis');

	var AnalyzesSelectedView = View.extend({
		el: 'ul',
		initialize: function() {
			var view = this;

			view.analyzes = view.collection;

			view.analyzes.on('reset add remove', function() {
				console.log('view.analyzes', view.analyzes);
				view.render();
			});

			pubsub.on('analysis:click', function(code) {
				// console.log('analysis:click', code);
				var analysis = new Analysis({
					code: code,
					patientId: view.options.patientId
				});

				analysis.fetch({
					success: function() {
						console.log('success', analysis)
						var date = moment(new Date())
						.startOf('day').add('days', 1).add('hours', 7)
						.format('YYYY-MM-DD HH:mm:ss');

						analysis.setProperty('plannedEndDate','value', date);
						view.analyzes.add(analysis);
						view.setExecutorFromAnalysis(analysis);
					}
				});

			});


			this.childViews = [];

		},


		setExecutorFromAnalysis: function(test) {
			if (test.getProperty('doctorFirstName', 'value')) {
				var executor = {
					id: test.getProperty('executorId', 'value'),
					name: {
						first: test.getProperty('doctorFirstName', 'value'),
						middle: test.getProperty('doctorMiddleName', 'value'),
						last: test.getProperty('doctorLastName', 'value')
					}
				}

				pubsub.trigger('executor:changed', executor);

			}
		},



		analyzesData: function() {
			var data = this.analyzes.map(function(model) {
				return _.extend(model.toJSON(), {
					cid: model.cid
				});
			}, this);

			return data;
		},

		renderAll: function(testsData) {
			var view = this;
			//console.log('renderAll', testsData, view);

			view.$el.html(_.template(analyzesListTemplate, {}));
			view.$analyzesList = view.$el.find('tbody.item-container');


			this.analyzes.each(function(model) {
				console.log('analyzes item', model);
				var analysisView = new AnalysisView({
					model: model,
					collection: view.analyzes,
					patientId: view.options.patientId
				});

				view.childViews.push(analysisView);



				view.$analyzesList.append(analysisView.render().el)
			}, this);



		},

		renderNoData: function() {
			this.$el.html('<div class="msg">Нет результатов.</div>');
		},
		renderOnFetch: function() {
			this.$el.html('<div class="msg">Загрузка...</div>');
		},

		render: function() {
			var view = this;
			var analysisData = view.analyzesData();

			if (analysisData.length > 0) {
				view.renderAll(analysisData);
			} else {
				view.renderNoData();
			}

			return view;
		},
		close: function() {
			var view = this;

			pubsub.off('lab:click group:parent:click group:click');
			view.analyzes.off();

			_.each(view.childViews, function(childView){
				console.log('close',view,childView);
				childView.close();
			}, view);

		}

	});


	return AnalyzesSelectedView;

});
