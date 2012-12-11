define([
		"models/name",
		"models/address",
		"models/citizenship",
		"models/medical-info/medical-info",
		"collections/id-cards",
		"collections/relations",
		"collections/payments",
		"collections/phones",
		"collections/occupations",
		"collections/disabilities"
	], function () {

	var Name = App.Models.Name.extend({
		validate: function (attrs) {
			var errors = [];
			//attrs = attrs || this.toJSON();
			if (!attrs) {
				if (!this.get("last").length) {
					errors.push({property: "name-last", msg: "Фамилия"});
				}
				if (!this.get("first").length) {
					errors.push({property: "name-first", msg:"Имя"});
				}

				if (errors.length)
					return errors;
			}
		}
	});

	App.Models.Patient = Model.extend ({
		idAttribute: "id",

		defaults: {
			version: "",
			sex: "male",
			patientCode: "",
			birthDate: "",
			birthPlace: "",
			snils: "",
			name: {
				first: "",
				last: "",
				middle: "",
				raw: ""
			},
			address: {},
			payments: [{}],
			relations: [{}],
			idCards: [{}],
			disabilities: [{}],
			occupations: [{}],
			medicalInfo: {},
			citizenship: {}
		},

		urlRoot: DATA_PATH+"patients/",

		url: function () {
			return DATA_PATH + "patients/" + (this.isNew() ? "" : (this.get("id") + "/"));
			//return DATA_PATH + "patients/" + (this.get("id") + "/" || "");
		},

		relations: [
			{
				type: Backbone.HasOne,
				key: "name",
				relatedModel: Name
			},
			{
				type: Backbone.HasOne,
				key: "address",
				relatedModel: "App.Models.Address"
			},
			{
				type: Backbone.HasOne,
				key: "citizenship",
				relatedModel: "App.Models.Citizenship"
			},
			{
				type: Backbone.HasOne,
				key: "medicalInfo",
				relatedModel: "App.Models.MedicalInfo"
			},
			{
				type: Backbone.HasMany,
				key: "phones",
				relatedModel: "App.Models.Phone",
				collectionType: "App.Collections.Phones"
			},
			{
				type: Backbone.HasMany,
				key: "relations",
				relatedModel: "App.Models.Relation",
				collectionType: "App.Collections.Relations"
			},
			{
				type: Backbone.HasMany,
				key: "payments",
				relatedModel: "App.Models.Payment",
				collectionType: "App.Collections.Payments"
			},
			{
				type: Backbone.HasMany,
				key: "disabilities",
				relatedModel: "App.Models.Disability",
				collectionType: "App.Collections.Disabilities"
			},
			{
				type: Backbone.HasMany,
				key: "occupations",
				relatedModel: "App.Models.Occupation",
				collectionType: "App.Collections.Occupations"
			},
			{
				type: Backbone.HasMany,
				key: "idCards",
				relatedModel: "App.Models.IdCard",
				collectionType: "App.Collections.IdCards"
			}
		],

		isSnilsChecksumValid: function () {
			var rawNumbers = this.get("snils").toString().split("");

			if (rawNumbers.length == 0) {
				return true;
			} else if (rawNumbers.length != 11) {
				return false;
			} else if (!_(rawNumbers).any(function (n) { return n != 0; })) {
				return false;
			} else {
				var numbers = rawNumbers.splice(0, 9).reverse();
				var enteredCheckSum = parseInt(rawNumbers.join(""));
				var calculatedCheckSum = 0;
				var checksumValid = false;

				_(numbers).each(function (snilsNum, i) {
					calculatedCheckSum += snilsNum * (i + 1);
				});

				(function testCheckSum (calcCheckSum) {
					if (calcCheckSum < 100) {
						checksumValid = calcCheckSum === parseInt(enteredCheckSum);
					} else if (calcCheckSum === 100 || calcCheckSum === 101) {
						checksumValid = enteredCheckSum.toString() === "00";
					} else {
						testCheckSum(calcCheckSum % 101);
					}
				})(calculatedCheckSum);

				return checksumValid;
			}
		},

		toJSON: function () {
			var json = Model.prototype.toJSON.apply(this);
			json.idCardsShortString = this.getIdCardsShortString();
			return json;
		},

		getIdCardsShortString: function() {
			var idCardsShortString = "";
			this.get("idCards").each(function (idCard){
				if (idCard.get("docType").get('name'))
					idCardsShortString += idCard.get("docType").get("name") + ":" + idCard.get("series") + "-" + idCard.get("number") + " ";
			});

			if (this.get("snils")) {
				idCardsShortString += " СНИЛС: " + this.get("snils");
			}

			if (idCardsShortString.length > 40) {
				idCardsShortString = idCardsShortString.substr(0, 39) + "...";
			}

			return idCardsShortString;
		},

		parse: function ( data ) {
			//костыль злостный
			var newPatient = new App.Models.Patient;

			data = data.data ? data.data : data;

			return Core.Objects.mergeAll( newPatient.toJSON(), data )
		},

		save: function () {
			/*var res = this.get("address").get("residential");
			if (res.get("street").get("code") && !res.get("city").get("code")) {
				if (res.get("district").get("code")) {
					res.get("city").set("code", res.get("district").get("code"));
					res.get("district").set("code", "");
				} else if (res.get("republic").get("code")) {
					res.get("city").set("code", res.get("republic").get("code"));
					res.get("republic").set("code", "");
				}
			}

			_(["street", "city", "district", "locality", "republic"]).each(function (level) {
				if (!res.get(level).get("code"))
					res.set(level, null);
			});

			var reg = this.get("address").get("registered");
			if (reg.get("street").get("code") && !reg.get("city").get("code")) {
				if (reg.get("district").get("code")) {
					reg.get("city").set("code", reg.get("district").get("code"));
					reg.get("district").set("code", "");
				} else if (reg.get("republic").get("code")) {
					reg.get("city").set("code", reg.get("republic").get("code"));
					reg.get("republic").set("code", "");
				}
			}

			_(["street", "city", "district", "locality", "republic"]).each(function (level) {
				if (!reg.get(level).get("code"))
					reg.set(level, null);
			});*/

			if (this.get("address").getAddressesEqual()) {
				this.get("address").get("registered").set(this.get("address").get("residential").toJSON());
			}

			this.get("payments").each(function (payment) {
				if (!payment.get("series") && !payment.get("number")) {
					payment.unset("id");
				}
			});

			this.get("relations").each(function (relation) {
				if (!relation.get("relationType").get("id")) {
					relation.unset("id");
				}
			});

			this.get("phones").remove(this.get("phones").filter(function (phone) {
				return !phone.get("typeId");
			}, this));


			this.get("idCards").each(function (idCard) {
				if (!idCard.get("docType").get("id")) {
					idCard.unset("id");
				}
			});

			if (this.get("payments").length) {

			}

			Model.prototype.save.call(this);
		},

		validate: function (attrs) {
			var errors = [];
			if (!attrs) {
				if (!this.get("birthDate") || isNaN(new Date(parseInt(this.get("birthDate"))).getTime()) || new Date(parseInt(this.get("birthDate"))) > new Date()) {
					errors.push({property: "birthDate", msg:"Дата рождения"});
				}
				if (!this.isSnilsChecksumValid()) {
					errors.push({property: "snils", msg:"СНИЛС"});
				}

				var nameErrors = this.get("name").validate() || [];

				/*var relationsErrors = [];

				this.get("relations").each(function (rel) {
					relationsErrors = _(relationsErrors).union(rel.validate() || []);
				}, this);*/

				var phonesErrors = [];

				this.get("phones").each(function (phone) {
					phonesErrors = _(phonesErrors).union(phone.validate() || []);
				}, this);

				var paymentsErrors = [];

				this.get("payments").each(function (pay) {
					paymentsErrors = _(paymentsErrors).union(pay.validate() || []);
				}, this);

				var idCardsErrors = [];

				this.get("idCards").each(function (idc) {
					idCardsErrors = _(idCardsErrors).union(idc.validate() || []);
				}, this);

				var disabilitiesErrors = [];

				this.get("disabilities").each(function (d) {
					disabilitiesErrors = _(disabilitiesErrors).union(d.validate() || []);
				}, this);

				var medicalInfoErrors = this.get("medicalInfo").validate() || [];

				errors = _(errors).union(nameErrors, phonesErrors, paymentsErrors, idCardsErrors, medicalInfoErrors, disabilitiesErrors);

				if (errors.length) return errors;
			}
		}
	});
});