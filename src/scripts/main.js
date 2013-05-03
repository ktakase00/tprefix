requirejs.config({
  baseUrl: "scripts/",
  paths: {
    "jquery": "components/jquery/jquery",
    "underscore": "components/underscore-amd/underscore",
    "backbone": "components/backbone-amd/backbone",
    "requirejs-text": "components/requirejs-text/text",
    "app-router": "local/app/app-router",
  },
  urlArgs: "bust=" + (new Date()).getTime(),
});

// Start the main app logic.
requirejs(["jquery", "underscore", "backbone", "app-router"],
function($, _, Backbone, AppRouter) {
  $(function() {
    app = new AppRouter();
    app.start();
  });
});
