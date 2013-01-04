/**
 * 
 */
(function() {
	app.views.common.FrameWindow = Backbone.View.extend({
		className: "frame_window",
		
		initialize: function() {
			this.container = this.options.container;
			this.contentView = null;
			
			this.build({
				title: this.options.title,
				content: "",
			});
		},
		
		build: function(params) {
			var source   = $("#frame_window").html();
			var template = Handlebars.compile(source);
			var context = {title: params.title, content: params.content};
			var html    = template(context);
			this.$el.html(html);
			return this;
		},
		
		setTitle: function(title) {
			this.$(".title").text(title);
		},
		
		setContentView: function(view) {
			this.contentView = view;
			
			$(this.$el.children(".content")[0]).append(view.$el);
			this.listenTo(view, "close", this.close);
			return this;
		},
		
		render: function() {
			this.container.append(this.$el);
		},
		
		close: function() {
			this.remove();
		},
		
		center: function() {
			var posLeft = this.$el.offset().left;
			var posTop = this.$el.offset();
			var winWidth = $(window).width();
			var winHeight = $(window).height();
			this.$el.css("left", (winWidth - this.$el.width())/2);
			this.$el.css("top", (winHeight - this.$el.height())/2);
		},
	});
})();
