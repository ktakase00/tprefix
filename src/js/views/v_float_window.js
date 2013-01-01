/**
 * 
 */
(function() {
	app.views.FloatWindow = Backbone.View.extend({
		initialize: function() {
			this.entity = null;
		},
		
		build: function(params) {
			var source   = $("#entry-template").html();
			var template = Handlebars.compile(source);
			var context = {title: params.title, content: params.content};
			var html    = template(context);
			this.entity = $(html);
			return this;
		},
		
		render: function() {
			if (null != this.entity) {
				$(this.el).append(this.entity);
			}
		},
	});
})();
