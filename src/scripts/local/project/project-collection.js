//
// ProjectCollection
//
define(function(require, exports, module) {
  var Backbone = require("backbone");

  return Backbone.Collection.extend({
    url: "/workspace/tprefix/index.php/api/project/",
  });
});
