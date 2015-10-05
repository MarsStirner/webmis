define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var tmplAllergy = require("text!templates/patient-edit/allergy.tmpl");
    var AllergyView = View.extend({
		className: "DoubleLineBlock",

		template: tmplAllergy,

		events: {
			"click .AddIcon": "onAddIconClick",
			"click .RemoveIcon": "onRemoveIconClick",
            'click .save': 'onSave'
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

        onSave: function(){
            console.log('sfdfsdf');
        },

		render: function() {
			var allergyJSON = this.model.toJSON();
			allergyJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, allergyJSON));

			UIInitialize(this.el);

			this.toggleRemoveIcon();
            this.$('.HalfCol, .QuartCol').css({
                'display': 'inline-block',
                'margin-right': '20px',
                'width': '15em'
            })
            $(this.$('.HalfCol')[1]).css({

            });
            $(this.$('.QuartCol')[1]).css({
                'width': '4em',
                'margin-right': '0px'
            });
			this.$el.fadeIn("fast");

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
				this.$el.append(itemView.el);
			}
		},

		render: function() {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}

    }).mixin([popupMixin]);
});
