//окошко с деревом лабтестов
define(function(require) {

	//var setOfTestsViewTemplate = require('text!templates/appeal/edit/popups/set-of-tests.tmpl');
	//var SetOfTests = require('models/diagnostics/SetOfTests');
	//var nodeTestTmpl = require('text!templates/diagnostics/laboratory/node-test.html');
	var listTemplate = require('text!templates/diagnostics/laboratory/test-list.html');
	var ItemView = require('views/diagnostics/laboratory/LabGroupTestView');

	var SetOfTestsView = View.extend({
		el: 'ul',
		initialize: function() {
			var view = this;

			view.collection.on('reset', function() {
				view.render();
			});

			view.collection.on('fetch', function() {
				console.log('view.collection',view.collection)
				view.renderOnFetch();
			});

			view.collection.on('change', function() {
				console.log('view.collection',view.collection);

			});

			pubsub.on('lab:click group:parent:click group:click', function() {
				view.$el.html('');
			});

			pubsub.on('group:click', function(code) {
				view.collection.fetch({
					data: {
						'patientId': view.options.patientId,
						'filter[code]': code
					}
				});
			});

			//view.testCollection = view.options.testCollection;

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
			console.log('renderAll', testsData, view);

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


	return SetOfTestsView;

});
