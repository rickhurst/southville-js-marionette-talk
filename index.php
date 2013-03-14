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

		<script type="text/template" id="default-sidebar-content">
		<p>sidebar content</p>
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

	   	MyApp.defaultSidebarContentView = Backbone.Marionette.ItemView.extend({
	    	template:'#default-sidebar-content'
	    });

	   	MyApp.defaultHeaderContentView = Backbone.Marionette.ItemView.extend({
	    	template:'#default-header-content'
	    });

	    var defaultContentView = new MyApp.defaultContentView();
	    var defaultFooterContentView = new MyApp.defaultFooterContentView();
	    var defaultSidebarContentView = new MyApp.defaultSidebarContentView();
	    var defaultHeaderContentView = new MyApp.defaultHeaderContentView();

	    MyApp.mainRegion.show(defaultContentView);
	    MyApp.footerRegion.show(defaultFooterContentView);
	    MyApp.sidebarRegion.show(defaultSidebarContentView);
	    MyApp.headerRegion.show(defaultHeaderContentView);

	    $(document).ready(function(){
			MyApp.start();
		});



		</script>
		<!-- 
	    example 1 - shows basic app setup and itemview rendering in region 
	    -->
	</body>
</html>