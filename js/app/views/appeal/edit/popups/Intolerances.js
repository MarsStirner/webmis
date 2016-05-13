define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var tmplDrugIntolerance = require("text!templates/patient-edit/drug-intolerance.tmpl");
    var DrugIntoleranceView = View.extend({
		className: "DoubleLineBlock",

		template: tmplDrugIntolerance,

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
			this.trigger("drugIntolerance:add", this);
		},

		onRemoveIconClick: function(event) {
			var self = this;

			this.model.collection.remove(this.model);

			this.$el.hide("fast", function() {
				self.remove();
				self.unbind();
			});
		},

        onSave: function(){
            this.close();
        },

		render: function() {
            var self = this;
			var drugIntoleranceJSON = this.model.toJSON();
			drugIntoleranceJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, drugIntoleranceJSON));

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

		onDrugIntoleranceAdd: function(drugIntoleranceView) {
			this.triggerView = drugIntoleranceView;
			this.collection.add({}, {
				at: this.collection.indexOf(this.triggerView.model) + 1
			});
		},

		addOne: function(drugIntolerance) {
			var drugIntoleranceView = new DrugIntoleranceView({
				model: drugIntolerance
			});

			drugIntoleranceView
				.on("drugIntolerance:add", this.onDrugIntoleranceAdd, this)
				.render();

			if (this.triggerView) {
				this.triggerView.$el.after(drugIntoleranceView.el);
			} else {
				this.$el.append(drugIntoleranceView.el);
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
