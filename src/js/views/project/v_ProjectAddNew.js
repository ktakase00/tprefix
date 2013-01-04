/**
 * 
 */
(function() {
	app.views.project.ProjectAddNew = Backbone.View.extend({
		className: "project_add_new",
		
		initialize: function() {
			this.container = this.options.container;
			this.$el.html("<a href=\"javascript:void(0)\">新しいプロジェクト</a>");
		},
		
		events: {
			"click a": "openDialog",
		},
		
		render: function() {
			this.container.append(this.$el);
		},
		
		show: function() {
			this.$el.css("display", "block");
		},
		
		hide: function() {
			this.$el.css("display", "none");
		},
		
		openDialog: function() {
			this.trigger("close_menu");
			var v = new app.views.project.ProjectEditDialog();
			var fw = new app.views.common.FrameWindow({
				container: $("#content"),
				title: "プロジェクトの作成",
			});
			fw.setContentView(v);
			fw.render();
			fw.center();
		},
	});
})();
