/**
 * 
 */
(function() {
	app.models.Project = Backbone.Model.extend({
		idAttribute: "project_id",
		urlRoot: '/workspace/tprefix/index.php?r=project/',
		
		initialize: function(){
			
		},
		
		save: function() {
			this.url = this.urlRoot + 'save';
			this.post();
		},
		
		delete: function() {
			this.url = this.urlRoot + 'delete';
			this.post();
		},
		
		post: function() {
			$.post(this.url, this.attributes)
			.done(this.success)
			.fail(this.error);
		},
		
		success: function() {
			$(".project_list").trigger("change");
		},
		
		error: function() {
			alert("error.");
		},
	});
})();
