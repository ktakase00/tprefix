//
// ProjectListView
//
define(function(require, exports, module) {
  var Backbone = require("backbone"),
    FloatView = require("local/float/float-view"),
    ProjectCollection = require("./project-collection");

  return FloatView.extend({
    initialize: function() {
      FloatView.prototype.initialize.apply(this, arguments);
      this.events = _.extend({}, FloatView.prototype.events, this.events);

      this.titleText = "project";
      this.collection = new ProjectCollection();
      this.collection.on("reset", this.render, this);
      this.collection.fetch({reset: true});
    },

    events: {
      "click .float-content": "clicked",
    },

    render: function() {
      FloatView.prototype.render.apply(this, arguments);
      var floatContent = this.$(".float-content");

      this.collection.each(function(model) {
        floatContent.append(_.template("<div><%- project_nm %></div>",
          {project_nm: model.get("project_nm")}
        ));
      }, this);
    },

    clicked: function() {
      alert("clicked.");
    },
  });
});
