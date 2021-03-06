/**
 * User: FKurilov
 * Date: 22.08.12
 */
define(["models/thesaurus-term"], function () {
	App.Collections.ThesaurusTerms = Collection.extend({
		model: App.Models.ThesaurusTerm,

		initialize: function (models, options) {
			if (options) this.parentGroupId = options.parentGroupId;
		},

		url: function () {
			var path = DATA_PATH + "dir/thesaurus/";
			if (this.parentGroupId) {
				path += "?filter[groupId]=" + this.parentGroupId;
			}
			if (this.code) {
				var splitter = path.slice(-1) == '/' ? '?' : '&';
				path += (splitter + "filter[code]=" + this.code);
			}
			return path;
		}
	});

	return App.Collections.ThesaurusTerms;
});
