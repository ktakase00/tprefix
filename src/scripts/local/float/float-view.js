//
// FloatView
//
define(function(require, exports, module) {
  var Backbone = require("backbone");

  return Backbone.View.extend({
    initialize: function() {
      this.titleText = this.options.titleText;
    },

    events: {
    },

    render: function() {
      var template = _.template(require("requirejs-text!./float-template.html"));
      var html = template({});
      this.$el.append(html);
      this.$(".float-title").html(this.titleText);
    },
  });
});
