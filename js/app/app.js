MyApp = new Backbone.Marionette.Application();

MyApp.addRegions({
    headerRegion: "header",
    mainRegion: "section.main",
    footerRegion: "footer"
});

MyApp.addInitializer(function(options){

    MyApp.data = options;

	var defaultContentView = new MyApp.defaultContentView();
	var defaultFooterContentView = new MyApp.defaultFooterContentView();
	var defaultHeaderContentView = new MyApp.defaultHeaderContentView();

	MyApp.mainRegion.show(defaultContentView);
	MyApp.footerRegion.show(defaultFooterContentView);
	MyApp.headerRegion.show(defaultHeaderContentView);

});

MyApp.defaultContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-content'
});

MyApp.defaultFooterContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-footer-content'
});

MyApp.defaultHeaderContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-header-content'
});

// Base controller.
MyApp.Controller = Marionette.Controller.extend({

});







