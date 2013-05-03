//
// AppRouter
//
define(function(require, exports, module) {
  var Backbone = require("backbone"),
    ProjectListView = require("local/project/project-list-view");

  return Backbone.Router.extend({
    initialize: function() {
      // ルータを生成
    },

    start: function() {
      Backbone.history.start();

      if (!this.projectListView) {
        this.projectListView = new ProjectListView({
          el: "#content",
        });
      }
      this.projectListView.render();
    },
  });
});
