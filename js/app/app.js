MyApp = new Backbone.Marionette.Application();

MyApp.addRegions({
    headerRegion: "header",
    mainRegion: "section.main",
    footerRegion: "footer"
});

MyApp.addInitializer(function(options){

    MyApp.data = options;

	MyApp.c = new MyApp.Controller();
	MyApp.router = new MyApp.Router({
		controller: MyApp.c
	});

});

MyApp.defaultContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-content'
});

MyApp.defaultFooterContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-footer-content',
	events: {
		'click a.page-add': 'pageAdd'
	},
	pageAdd: function(e){
		e.preventDefault();
		MyApp.router.navigate('page-add', {trigger: true});
	}
});

MyApp.defaultHeaderContentView = Backbone.Marionette.ItemView.extend({
	template:'#default-header-content'
});

MyApp.pageHeaderView = Backbone.Marionette.ItemView.extend({
	template:'#page-header-content'
});

MyApp.pageContentView = Backbone.Marionette.ItemView.extend({
	template:'#page-main-content'
});

MyApp.pageAddFormView = Backbone.Marionette.ItemView.extend({
	template:'#page-add-form',
	initialize: function(){
		this.model = new MyApp.Nav.NavLink()
	},
	ui: {
		'submit' : 'button',
		'title' : 'input#title',
		'content': 'input#content',
		'href': 'input#href'
	},
	events: {
		'click button': "addNewPage"
	},
	addNewPage: function(e){
		e.preventDefault();

		this.model.set('text', this.ui.title.val());
		this.model.set('content', this.ui.content.val());
		this.model.set('href', this.ui.href.val());
		MyApp.Nav.navItems.add(this.model);
	}
});

MyApp.Router = Marionette.AppRouter.extend({
    appRoutes: {
        '': 'defaultContent',
        'page-add': 'showPageAdd'
    }
});

// Base controller.
MyApp.Controller = Marionette.Controller.extend({

	initialize: function(){
		MyApp.listenTo(MyApp.vent, "nav:changePage", this.showPage);
	},

	defaultContent: function(){
		var defaultContentView = new MyApp.defaultContentView();
		var defaultFooterContentView = new MyApp.defaultFooterContentView();
		var defaultHeaderContentView = new MyApp.defaultHeaderContentView();

		MyApp.mainRegion.show(defaultContentView);
		MyApp.footerRegion.show(defaultFooterContentView);
		MyApp.headerRegion.show(defaultHeaderContentView);
	},

	showPage: function(model){
		//console.log(model.get('text'));
		var pageHeaderView = new MyApp.pageHeaderView({
			model: model
		});
		var pageContentView = new MyApp.pageContentView({
			model: model
		});
		MyApp.headerRegion.show(pageHeaderView);
		MyApp.mainRegion.show(pageContentView);
		MyApp.router.navigate(model.get('href'), {trigger: false});
	},

	showPageAdd: function(){

		var pageContentView = new MyApp.pageAddFormView();
		MyApp.mainRegion.show(pageContentView);
	}


});

// After all our initializers have run start the Backbone router
MyApp.on("start", function(options) {
    if (Backbone.history){
        Backbone.history.start({
            pushState: true,
            root: "/"
        });
    }
});

// for debugging to keep track of what events are being fired with what parameters
MyApp.vent.on("all", function(event, params){
    console.log(event);
    console.log(params);
});








