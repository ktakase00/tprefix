/**
 * 
 */
(function() {
	app.collections.Project = Backbone.Collection.extend({
		model: app.models.Project,
		url: '/workspace/tprefix/index.php?r=project/list',
	});
})();
