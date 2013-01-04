/**
 * 
 */
(function() {
	app.views.project.ProjectEditDialog = Backbone.View.extend({
		initialize: function() {
			var source   = $("#project_edit_dialog").html();
			var template = Handlebars.compile(source);
			var context = {};
			var html    = template(context);
			this.$el.append($(html));
			
			this.model = null;
		},
		
		events: {
			"click .submit": "submit",
			"click .cancel": "cancel",
		},
		
		submit: function() {
			var projectNm = this.$("input[name=\"project_nm\"]");
			if (null == this.model) {
				this.model = new app.models.Project();
			}
			this.model.set({project_nm: projectNm.val()});
			this.model.save();
			this.trigger("close");
		},
		
		cancel: function() {
			this.trigger("close");
		},
		
		setModel: function(model) {
			this.model = model;
			console.log(this.model.isNew());
			
			if (!this.model.isNew()) {
				var projectNm = this.$("input[name=\"project_nm\"]");
				projectNm.val(this.model.get("project_nm"));
				this.$(".submit").val("OK")
			}
		},
	});
})();
