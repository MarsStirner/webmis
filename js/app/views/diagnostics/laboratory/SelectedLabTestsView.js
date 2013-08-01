//окошко с деревом лабтестов
define(function(require) {

	var listTemplate = require('text!templates/diagnostics/laboratory/test-list.html');
	var ItemView = require('views/diagnostics/laboratory/LabTestView');

	var Test = require('models/diagnostics/laboratory/SetOfTests');

	var SelectedLabTestsView = View.extend({
		el: 'ul',
		initialize: function() {
			var view = this;

			view.collection.on('reset add remove', function() {
				console.log('view.collection', view.collection);
				view.render();
			});

			pubsub.on('test:click', function(code) {
				// console.log('test:click', code);
				var test = new Test({
					code: code,
					patientId: view.options.patientId
				});

				test.fetch({
					success: function() {
						console.log('success', test)
						view.collection.add(test);
						view.setExecutorFromTest(test);


					}
				});

			});

		},


		setExecutorFromTest: function(test) {
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



		collectionData: function() {
			var data = this.collection.map(function(model) {
				return _.extend(model.toJSON(), {
					cid: model.cid
				});
			}, this);

			return data;
		},

		renderAll: function(testsData) {
			var view = this;
			//console.log('renderAll', testsData, view);

			view.$el.html(_.template(listTemplate, {}));
			view.$tests_list = view.$el.find('tbody.item-container');

			//view.$tests_list.append(_.template(listTemplate , {}));

			this.collection.each(function(model) {
				console.log('collection item', model);
				var itemView = new ItemView({
					model: model,
					collection: view.collection,
					patientId: view.options.patientId
				});

				view.$tests_list.append(itemView.render().el)
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
			var testsData = view.collectionData();

			if (testsData.length > 0) {
				view.renderAll(testsData);
			} else {
				view.renderNoData();
			}

			return view;
		},
		close: function() {

			pubsub.off('lab:click group:parent:click group:click');
			this.collection.off();

		}

	});


	return SelectedLabTestsView;

});
