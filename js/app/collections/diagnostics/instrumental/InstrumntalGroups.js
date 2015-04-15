define(function(require) {

	var Group = Model.extend();


	var InstrumentalGroups = Collection.extend({

		model: Group,

		orgStructFilter: '&filter[orgStruct]=1',

		patientId: 0,

		extractResult: function(groups, result, criteriaRE, testTargetProp) {
			// console.log(groups, result, criteriaRE, testTargetProp)

			_.each(groups, function(model) {
				if (!model.children) {
					_.each(testTargetProp, function(targetProp){
						if(criteriaRE.test(model[targetProp])){
							result.push(model);
						}
					});

				}
				if (model.children && (model.children.length > 0)) {
					this.extractResult(model.children, result, criteriaRE, testTargetProp);
				}
			}, this);
		},

		search: function(criteria) {
			this.lastCriteria = criteria;
			this.trigger('search');

			if (!this.originalModels) {
				this.originalModels = this.toJSON();
			}
			if (this.lastCriteria && (this.lastCriteria.length>1)) {//&& (this.lastCriteria.length>2)
				var criteriaRE = new RegExp(this.lastCriteria, "i");
				var result = [];
				this.extractResult(this.originalModels, result, criteriaRE, ["code","title"]);
				this.reset(result);
			} else {
				this.reset(this.originalModels);
			}

		},

		getOrgStructFilter: function() {
            if (!Core.Cookies.get('userDepartmentId')) {
                return "&filter[orgStruct]=0";
            } else {
                return this.orgStructFilter;
            }
        },

        getPatientId: function() {
        	if (this.patientId > 0) {
        		return "&patientId="+this.patientId;
        	} else {
        		return "";
        	}
        },

		// initialize: function(models, options){
		//	console.log('init instrumentalgroup', options, arguments);
		// 	//this.parents = options.parents;

		// },

		url: function() {
			var orgStruct = this.getPatientId() ? '' : this.getOrgStructFilter();
			return DATA_PATH + "dir/actionTypes?filter[mnem]=DIAG" + this.getPatientId() + orgStruct;
		},

		/**
		 * конвертирует данные в нужный нам формат дерева, для dynatree
		 * @param  {array} data
		 * @return {array}
		 */
		convertToTree: function(data) {
			var convertToTree = arguments.callee;

			return _.map(data, function(item) {
				var node = {};

				node.title = item.name;
				node.code = item.code;
				node.icon = false;

				if (item.groups && item.groups.length) {
					node.children = convertToTree(item.groups);
					node.isFolder = true;
				}

				return node;
			});
		},

		/**
		 * удаляет из дерева элементы у которых нет дочерних элементов
		 * @param  {array} tree древовидная структура из convertToTree
		 * @return {array}
		 */
		onlyParents: function(tree) {
			var results = [];
			var onlyParents = arguments.callee;

			_.each(tree, function(item, index, list) {

				if (item.children && item.children.length) {
					item.children = onlyParents(item.children);
					results[results.length] = item;
				}

			});

			return results;
		},

		setOrgStructFilter: function(value) {
			this.orgStructFilter = "&filter[orgStruct]="+value;
            this.fetch();
		},

		parse: function(raw) {
			var tree = [];

			tree = this.convertToTree(raw.data);
//			console.log('this.parents', this.parents);
			// if (this.parents) {
			// 	tree = this.onlyParents(tree);
			// }


			return tree;
		}

	});


	return InstrumentalGroups;

});
