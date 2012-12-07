/**
 * User: FKurilov
 * Date: 26.07.12
 */
define(function () {
	App.Models.KLADREntry = Model.extend({
		defaults: {
			code: "",
			sock: "",
			value: "",
			index: ""
		},
		getTitle: function () {
			return this.get("sock") + " " + this.get("value");
		}
	});

	App.Collections.KLADREntries = Collection.extend({
		model: App.Models.KLADREntry,

		initialize: function (models, options) {
			this.cachedEntries = {};

			this.setLevel(options.level);
			this.setParentCode(options.parent);

			this.childName = options.childName;

			this.on("reset", this.cacheEntrySet, this);
		},

		setLevel: function (level) {
			this.level = level;
		},

		getLevel: function () {
			return this.level;
		},

		setParentCode: function (parent) {
			if (parent) this.parent = parent;
			return this;
		},

		getParentCode: function () {
			return this.parent || "";
		},

		url: function () {
			return DATA_PATH + "dictionary?limit=100&dictName=KLADR&filter[level]=" + this.getLevel() + "&filter[parent]=" + this.getParentCode();
		},

		fetch: function () {
			this.trigger("fetch:start");

			if (this.cachedEntries[this.getLevel() + "_" + this.getParentCode()]) {
				/*console.log(
					"calling from cache",
					this.getLevel() + "_" + this.getParentCode(),
					this.cachedEntries,
					this.cachedEntries[this.getLevel() + "_" + this.getParentCode()]
				);*/
				this.reset(this.cachedEntries[this.getLevel() + "_" + this.getParentCode()]);
			} else if (this.getParentCode() || this.getLevel() === "republic") {
				return Collection.prototype.fetch.call(this);
			} else {
				return this.reset([]);
			}
		},

		cacheEntrySet: function () {
			if (!this.cachedEntries[this.getLevel() + "_" + this.getParentCode()] && this.toJSON().length) {
				this.cachedEntries[this.getLevel() + "_" + this.getParentCode()] = this.toJSON();
				/*console.log("cached entries", this.toJSON(), this.cachedEntries);*/
			}
		}
	});

	App.Models.KLADR = Model.extend({
		defaults: {
			republics: [],
			districts: [],
			cities: [],
			localities: [],
			streets: []
		},

		relations: [
			{
				type: Backbone.HasMany,
				key: "republics",
				collectionOptions: function () { return {level: "republic", childName: "districts"}},
				relatedModel: App.Models.KLADREntry,
				collectionType: App.Collections.KLADREntries
			},
			{
				type: Backbone.HasMany,
				key: "districts",
				collectionOptions: function () { return {level: "district", childName: "cities"}},
				relatedModel: App.Models.KLADREntry,
				collectionType: App.Collections.KLADREntries
			},
			{
				type: Backbone.HasMany,
				key: "cities",
				collectionOptions: function () { return {level: "city", childName: "localities"}},
				relatedModel: App.Models.KLADREntry,
				collectionType: App.Collections.KLADREntries
			},
			{
				type: Backbone.HasMany,
				key: "localities",
				collectionOptions: function () { return {level: "locality", childName: "streets"}},
				relatedModel: App.Models.KLADREntry,
				collectionType: App.Collections.KLADREntries
			},
			{
				type: Backbone.HasMany,
				key: "streets",
				collectionOptions: function () { return {level: "street"}},
				relatedModel: App.Models.KLADREntry,
				collectionType: App.Collections.KLADREntries
			}
		]
	});

	App.Models.KLADR.LEVELS_ORDER = [
		"republic",
		"district",
		"city",
		"locality",
		"street"
	];

	return App.Models.KLADR;
});