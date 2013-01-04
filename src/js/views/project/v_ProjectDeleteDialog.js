/**
 * 
 */
(function() {
	app.views.project.ProjectDeleteDialog = Backbone.View.extend({
		initialize: function() {
			this.model = this.options.model;
			
			var source   = $("#project_delete_dialog").html();
			var template = Handlebars.compile(source);
			var context = {project_nm: this.model.get("project_nm")};
			var html    = template(context);
			this.$el.append($(html));
		},
		
		events: {
			"click .submit": "submit",
			"click .cancel": "cancel",
		},
		
		submit: function() {
			this.model.delete();
			this.trigger("close");
		},
		
		cancel: function() {
			this.trigger("close");
		},
	});
})();
