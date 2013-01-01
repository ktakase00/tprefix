/**
 * 
 */
(function() {
	app.views.ProjectList = Backbone.View.extend({
		tagName: 'ul',
		initialize: function() {
			this.collection = new app.collections.Project();
			this.collection.on("reset", this.render, this);
			this.collection.fetch();
		},
		
		render: function() {
			this.collection.each(function(model) {
				var projectItem = new app.views.ProjectItem({
					el: this.$el,
					model: model,
				});
				projectItem.render();
			}, this);
		},
	});
})();
