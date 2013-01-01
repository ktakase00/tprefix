/**
 * 
 */
jQuery(function() {
	var fw = new app.views.FloatWindow({
		el: $("#content"),
	});
	fw.build({
		title: "プロジェクト",
		content: "",
	});
	fw.render();
	
	var projectList = new app.views.ProjectList();
	$(fw.entity.children(".content")[0]).append(projectList.$el);
});
