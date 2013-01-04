/**
 * 
 */
jQuery(function() {
	$("#content").height("300px");
	var fw = new app.views.common.FrameWindow({
		container: $("#content"),
		title: "プロジェクト"
	});
	fw.render();
	
	var projectList = new app.views.project.ProjectList();
	fw.setContentView(projectList);
});
