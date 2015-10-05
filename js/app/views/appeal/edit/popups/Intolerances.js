define(function (require) {
    var popupMixin = require('mixins/PopupMixin');
    var tmplDrugIntolerance = require("text!templates/patient-edit/drug-intolerance.tmpl");
    var DrugIntoleranceView = View.extend({
		className: "DoubleLineBlock",

		template: tmplDrugIntolerance,

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
			var drugIntoleranceJSON = this.model.toJSON();
			drugIntoleranceJSON.cid = this.model.cid;

			this.$el.hide();

			this.$el.html($.tmpl(this.template, drugIntoleranceJSON));

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

		render: function() {
			this.$el.empty();
			this.triggerView = undefined;

			this.collection.each(this.addOne, this);

			return this;
		}

    }).mixin([popupMixin]);
});
