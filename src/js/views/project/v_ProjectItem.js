/**
 * 
 */
(function() {
	app.views.project.ProjectItem = Backbone.View.extend({
		tagName: "li",
		
		initialize: function() {
			this.container = this.options.container;
			this.model = this.options.model;
			this.model.on("reset", this.render, this);
			this.rendered = false;
		},
		
		events: {
			"mouseover": "mouseOver",
		},
		
		render: function() {
			this.$el.text(this.getText());
			
			if (!this.rendered) {
				this.container.append(this.$el);
				this.rendered = true;
			}
		},
		
		mouseOver: function() {
			this.container.trigger("open_menu", this);
		},
		
		getText: function() {
			return this.model.get("project_nm");
		}
	});
})();
