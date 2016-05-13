define(function () {
	var TemplateForDocument = Backbone.Model.extend({
		defaults: {
			name: {
				id: null,
				name: "",
				templates: []
			}
		}
	});

	App.Collections.TemplatesForDocument = Collection.extend({
		model: TemplateForDocument,

		url: function () {
			//return "/api/v1/dir/template?actionTypeId="+this.docType;
			return "http://"+CORE_HOST+"/core-ext-war/template?actionTypeId="+this.docType;
		},

		parse: function (data) {
        if (_.isObject(data.actionTemplateList)) {
            return data.actionTemplateList;
        } else {
            return null;
        }
    }
	});

	return App.Collections.TemplatesForDocument;
});
