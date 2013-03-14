<!DOCTYPE html>
<html>
	<head>
		<title>Marionette Demo</title>
		<style>
		body {
			font-size:1.5em;
			font-family:Helvetica;
			padding:1em;
		}

		section.main {
			width: 70%;
			float:left;
		}

		section.aside {
			width:30%;
			float:left;
		}

		footer {
			clear: left;
		}
		</style>
	</head>
	<body>
		<header>
		</header>
		
		<section class="main">
		</section>
		
		<section class="aside">
		</section>

		<footer></footer>

		<script type="text/template" id="default-content">
		<p>Hello World</p>
		</script>

		<script type="text/template" id="default-footer-content">
		<p>Footer content</p>
		</script>

		<script type="text/template" id="sidebar-nav">
		<ul>
		</ul>
		</script>

		<script type="text/template" id="sidebar-nav-item">
		<a href="#"><%= text %></a>
		</script>

		<script type="text/template" id="default-header-content">
		<p>header content</p>
		</script>

		<script src="/js/lib/jquery-1.9.1.min.js"></script>
		<script src="/js/lib/underscore-min.js"></script>
		<script src="/js/lib/backbone-min.js"></script>
		<script src="/js/lib/backbone.marionette.min.js"></script>
		<script>
		MyApp = new Backbone.Marionette.Application();

	    MyApp.addRegions({
	        headerRegion: "header",
	        mainRegion: "section.main",
	        sidebarRegion: "section.aside",
	        footerRegion: "footer"
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

	    var navLinks = new MyApp.NavLinks([
	    	new MyApp.NavLink({text: 'foo'}),
	    	new MyApp.NavLink({text: 'bar'})
	    ]);

	    var defaultContentView = new MyApp.defaultContentView();
	    var defaultFooterContentView = new MyApp.defaultFooterContentView();
	    var defaultHeaderContentView = new MyApp.defaultHeaderContentView();

	    var sideNavView = new MyApp.SideNavView({
	    	collection: navLinks
	    });

	    MyApp.mainRegion.show(defaultContentView);
	    MyApp.footerRegion.show(defaultFooterContentView);
	    MyApp.sidebarRegion.show(sideNavView);
	    MyApp.headerRegion.show(defaultHeaderContentView);

	    $(document).ready(function(){
			MyApp.start();
		});



		</script>
		<!--
		example 2 shows a composite view being populated and rendered in a region
		-->
	</body>
</html>