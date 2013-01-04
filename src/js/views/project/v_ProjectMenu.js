/**
 * 
 */
(function() {
	app.views.project.ProjectMenu = Backbone.View.extend({
		initialize: function() {
			var source   = $("#project_menu").html();
			var template = Handlebars.compile(source);
			var context = {};
			var html    = template(context);
			this.$el.append($(html));
			
			this.model = null;
		},
		
		events: {
			"mouseout": "mouseOut",
			"click .project_property": "openDialog",
			"click .project_delete": "openDeleteDialog",
		},
		
		mouseOut: function(e) {
			var areaLeft = this.$el.offset().left;
			var areaTop = this.$el.offset().top;
			var areaRight = areaLeft + this.$el.width();
			var areaBottom = areaTop + this.$el.height();
			var x = e.clientX;
			var y = e.clientY;
			
			if (x < areaLeft || x > areaRight ||
				y < areaTop || y > areaBottom)
			{
				this.trigger("close_menu");
			}
		},
		
		setModel: function(model) {
			this.model = model;
		},
		
		openDialog: function() {
			this.trigger("close_menu");
			var v = new app.views.project.ProjectEditDialog();
			v.setModel(this.model);
			
			var fw = new app.views.common.FrameWindow({
				container: $("#content"),
				title: "プロパティ",
			});
			fw.setContentView(v);
			fw.render();
			fw.center();
		},
		
		openDeleteDialog: function() {
			this.trigger("close_menu");
			var v = new app.views.project.ProjectDeleteDialog({
				model: this.model,
			});
			
			var fw = new app.views.common.FrameWindow({
				container: $("#content"),
				title: "削除",
			});
			fw.setContentView(v);
			fw.render();
			fw.center();
		},
	});
})();
