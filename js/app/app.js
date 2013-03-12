MyApp = new Backbone.Marionette.Application();

MyApp.addRegions({
    headerRegion: "header",
    mainRegion: "section.main",
    sidebarRegion: "section.aside",
    footerRegion: "footer"
});

MyApp.addInitializer(function(options){

    MyApp.data = options;

    var sideNavView = new MyApp.SideNavView({
		collection: MyApp.data.navItems
	});

	var defaultContentView = new MyApp.defaultContentView();
	var defaultFooterContentView = new MyApp.defaultFooterContentView();
	var defaultHeaderContentView = new MyApp.defaultHeaderContentView();

	MyApp.mainRegion.show(defaultContentView);
	MyApp.footerRegion.show(defaultFooterContentView);
	MyApp.sidebarRegion.show(sideNavView);
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

	// side nav
MyApp.NavLink = Backbone.Model.extend({});
MyApp.NavLinks = Backbone.Collection.extend({
	model: MyApp.NavLink
});

MyApp.SideNavItemView = Backbone.Marionette.ItemView.extend({
	template: '#sidebar-nav-item',
	tagName: 'li'
});

MyApp.SideNavView = Backbone.Marionette.CompositeView.extend({
	template:'#sidebar-nav',
	itemView: MyApp.SideNavItemView,
	itemViewContainer: 'ul',
	tagName: 'nav'
});





