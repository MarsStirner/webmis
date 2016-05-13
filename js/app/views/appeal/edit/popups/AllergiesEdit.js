define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var tmplAllergy = require("text!templates/patient-edit/allergy.tmpl");
    var AllergyView = View.extend({
		className: "DoubleLineBlock",

		template: tmplAllergy,

		events: {
			"click .AddIcon": "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick"
		},

		initialize: function(options) {
			this.model.collection.on("add", this.toggleRemoveIcon, this);
			this.model.collection.on("remove", this.toggleRemoveIcon, this);
		},

		toggleRemoveIcon: function(event) {
			if (this.model.collection)
				this.$(".RemoveIcon").css("display", (this.model.collection.length > 1 ? "inline-block" : "none"));
		},

		onAddIconClick: function(event) {
			this.trigger("item:add", this);
		},

		onRemoveIconClick: function(event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function() {
				self.remove();
				self.unbind();
			});
		},

		render: function() {
			var allergyJSON = this.model.toJSON();
            var self = this;
			allergyJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, allergyJSON));

			UIInitialize(this.el);

			this.toggleRemoveIcon();
			this.$el.fadeIn("fast");

            this.$('input, select').on('change', function(el){
                var key = $(el.currentTarget).data('key');
                if (key == "checkingDate" && $(el.currentTarget).val()) {
                    var val = moment($(el.currentTarget).val(), 'DD.MM.YYYY').format('X') + '000';
                } else {
                    var val = $(el.currentTarget).val();
                }
                self.model.set(key, val);
            });

			return this;
		}
	});
    return View.extend({
        initialize: function(options) {

			this.collection.on("add", this.addOne, this);

			if (this.collection.isEmpty()) {
				this.collection.add({}, {
					silent: true
				});
			}
		},

		onItemAdd: function(itemView) {
			this.triggerView = itemView;
			this.collection.add({}, {
				at: this.collection.indexOf(this.triggerView.model) + 1
			});
		},

		addOne: function(item) {
			var itemView = new AllergyView({
				model: item
			});

			itemView
				.on("item:add", this.onItemAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(itemView.el);
			} else {
                itemView.render();
				this.$el.append(itemView.el);
			}
		},

        onSave: function(){
            Cache.Patient.save();
            this.trigger('close');
            this.close();
        },

		render: function() {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}

    }).mixin([popupMixin]);
});
