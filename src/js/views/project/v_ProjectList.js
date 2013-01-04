/**
 * 
 */
(function() {
	app.views.project.ProjectList = Backbone.View.extend({
		className: "project_list",
		
		initialize: function() {
			this.collection = new app.collections.Project();
			this.collection.on("reset", this.render, this);
			
			this.list = $("<ul></ul>");
			this.addNew = new app.views.project.ProjectAddNew({
				container: this.$el,
			});
			
			var pm = new app.views.project.ProjectMenu();
			this.projectMenu = new app.views.common.FrameWindow({
				container: $("#content"),
				title: "",
			});
			var fw = this.projectMenu;
			fw.setContentView(pm);
			fw.render();
			fw.$el.css("display", "none");
			this.listenTo(pm, "close_menu", this.closeMenu);
			this.listenTo(this.addNew, "close_menu", this.closeMenu);
			
			this.redraw();
		},
		
		events: {
			"mouseover": "mouseOver",
			"mouseout": "mouseOut",
			"change": "redraw",
			"open_menu": "openMenu",
		},
		
		render: function() {
			this.list.empty();
			this.collection.each(function(model) {
				var projectItem = new app.views.project.ProjectItem({
					container: this.list,
					model: model,
				});
				projectItem.render();
			}, this);
			
			if (0 == this.$("ul").size()) {
				this.$el.append(this.list);
			}
			this.addNew.render();
			
			if (0 == this.collection.size()) {
				this.addNew.show();
			}
		},
		
		mouseOver: function() {
			this.addNew.show();
		},
		
		mouseOut: function() {
			if (0 < this.collection.size()) {
				this.addNew.hide();
			}
		},
		
		redraw: function() {
			this.collection.fetch();
		},
		
		openMenu: function(e, item) {
			var fw = this.projectMenu;
			fw.setTitle(item.getText());
			fw.contentView.setModel(item.model);
			fw.$el.css("display", "block");
			
			var posLeft = this.$el.offset().left + this.$el.width();
			var posTop = item.$el.offset().top;
			fw.$el.css("left", posLeft);
			fw.$el.css("top", posTop);
		},
		
		closeMenu: function() {
			this.projectMenu.$el.css("display", "none");
		},
	});
})();
