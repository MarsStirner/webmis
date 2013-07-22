define(function(require) {

	var shared = require('views/appeal/edit/pages/monitoring/shared');

	/**
	 * Модель для таблицы "Мониторинг"
	 * @type {*}
	 */
	var MonitoringInfo = require('views/appeal/edit/pages/monitoring/models/MonitoringInfo');


	/**
	 * Коллекция для таблицы "Мониторинг"
	 * @type {*}
	 */
	var MonitoringInfos = Collection.extend({
		model: MonitoringInfo,

		url: function() {
			return DATA_PATH + "appeals/" + shared.models.appeal.get("id") + "/monitoring";
			//return "/monitoring-info.json";
		},

		getParseMap: function(rawByDate) {
			console.log('rawByDate', rawByDate)
			return _.map(rawByDate, function(rawRow, date) {
				console.log('rawRow, date', rawRow, date)
				return {
					datetime: +date,
					temperature: rawRow["TEMPERATURE"],
					bpras: rawRow["BPRAS"],
					bprad: rawRow["BPRAD"],
					heartRate: rawRow["PULS"],
					spo2: rawRow["SPO2"],
					breathRate: rawRow["RR"],
					state: rawRow["STATE"],
					health: rawRow["WB"],
					weight: rawRow["WEIGHT"],
					growth: rawRow["GROWTH"]

				};
			});
		},
		merge: function(items) {
			items = items.reverse();

			var obj = {};

			_.each(items, function(item) {
				_.each(_.keys(item), function(key) {
					if (!(item[key] === ''  || item[key] === 'weight' || item[key] === 'growth' || typeof item[key] === 'undefined')) {
						obj[key] = item[key]
						//console.log('key', key, item[key],  typeof item[key]);
					}
				});
				console.log('obj', obj)
			});
			console.log('merge', items, obj);
			return obj;
		},

		combine: function(items,combined) {

			if (_.isEmpty(items)) return [];
			items = items.slice();

			var top = _.first(items);
			var startTime = top.datetime;
			var endTime = startTime - (1 * 60 * 60 * 1000);
			var items4combine = [items.shift()];
			var nextItems = [];
			//var combined = [];


			_.each(items, function(item) {
				if (item.datetime <= endTime) {
					items4combine.push(item);
				} else {
					nextItems.push(item);
				}
			});

			combined.push(this.merge(items4combine));
			console.log('combine',combined, this.merge(items4combine));

			if (nextItems.length > 0) {
				this.combine(nextItems,combined);
			}

			return combined;
		},


		parse: function(raw) {
			var rawByDate = {};

			_.each(raw.data, function(param) {
				_.each(param.values, function(paramValue) {
					if (!rawByDate.hasOwnProperty(paramValue.date)) {
						rawByDate[paramValue.date] = {};
					}
					rawByDate[paramValue.date][param.code] = (paramValue.value !== "0.0" ? paramValue.value : "");
				});
			});

			var parsed = this.getParseMap(rawByDate);

			parsed = parsed
				.sort(function(a, b) {

					var adt = a.datetime;
					var bdt = b.datetime;

					if (adt < bdt) return 1;
					else if (adt > bdt) return -1;
					else return 0;
				})
				.filter(function(row) {
					return _.some(row, function(field, fieldName) {
						return fieldName !== "datetime" && field && field.toString().length;
					});
				})
			///.slice(0, 5);

			// console.log(rawByDate);
			console.log('raw', raw);
			console.log('parsed', parsed);
			this.combine(parsed,[]);

			return parsed;
		}
	});


	return MonitoringInfos;



});
