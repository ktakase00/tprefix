/**
 * 
 */
(function() {
	app.views.ProjectItem = Backbone.View.extend({
		initialize: function() {
			this.model = this.options.model;
			this.model.on("reset", this.render, this);
		},
		
		render: function() {
			this.$el.append($("<li>" + this.model.get("project_nm") + "</li>"));
		},
	});
})();
