/**
 * User: FKurilov
 * Date: 09.06.12
 */
define([//"models/doctor"
 ], function () {
//	var DiagnosticName = Model.extend({
//		defaults: {name: ""}
//	});
//	var DiagnosticStatus = Model.extend({
//		defaults: {name: ""}
//	});

	App.Models.LaboratoryDiag = Model.extend({
		defaults: {
			directionDate: 0,
			diagnosticDate: 0,
			diagnosticName: {},
			cito: false,
			assignPerson: {},
			execPerson: {},
			status: {}
		},

		sync: function (method, model, options) {
			//console.log('options',options)
			options = options || {};
			options.dataType = "jsonp";
			options.contentType = 'application/json';

			console.log('sync',model)
			switch (method.toLowerCase()) {
				case 'read':
					options.url = DATA_PATH + 'diagnostics/laboratory/' + model.id;
					break;
//				case 'create':
//					options.url = DATA_PATH + 'diagnostics/' + model.eventId + '/laboratory';
//					options.data = JSON.stringify({
//						requestData:{},
//						data:[model.toJSON()]
//					});
//					break;
//				case 'update':
//					options.url = DATA_PATH + 'diagnostics/' + model.eventId + '/laboratory';
//					options.data = JSON.stringify({
//						requestData:{},
//						data:[model.toJSON()]
//					});
//					break;
				case 'delete':
					options.url = DATA_PATH + 'diagnostics/' + model.eventId + '/laboratory/remove';
					options.type = 'PUT';
					options.data = JSON.stringify({
						//requestData:{},
						data: [{'id':model.get('id')}]
					});

					break;
			}

			Backbone.sync(method, model, options);
		},

		destroy: function(options) {

			options = options ? _.clone(options) : {};
			var model = this;
			var success = options.success;

			var destroy = function() {
				model.trigger('destroy', model, model.collection, options);
			};

			options.success = function(model, resp, options) {
				//if (options.wait || model.isNew()) destroy();
				if (success) success(model, resp, options);
			};

//			if (this.isNew()) {
//				options.success(this, null, options);
//				return false;
//			}

			var xhr = this.sync('delete', this, options);
			if (!options.wait) destroy();
			return xhr;
		}

//		relations: [
//			{
//				type: Backbone.HasOne,
//				key: "diagnosticName",
//				relatedModel: DiagnosticName
//			},
//			{
//				type: Backbone.HasOne,
//				key: "status",
//				relatedModel: DiagnosticStatus
//			},
//			{
//				type: Backbone.HasOne,
//				key: "assignPerson",
//				relatedModel: App.Models.Doctor
//			},
//			{
//				type: Backbone.HasOne,
//				key: "execPerson",
//				relatedModel: App.Models.Doctor
//			}
//		],

//		parse: function ( data ) {
//			var labDiag = new App.Models.LaboratoryDiag;
//			data = data.data ? data.data : data;
//
//			return Core.Objects.mergeAll(labDiag.toJSON(), data)
//		}
	});

	return App.Models.LaboratoryDiag
});
