<!DOCTYPE html>
<html>
	<head>
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

		<script src="/js/lib/jquery-1.9.1.min.js"></script>
		<script src="/js/lib/underscore-min.js"></script>
		<script src="/js/lib/backbone-min.js"></script>
		<script src="/js/lib/backbone.marionette.min.js"></script>
		<script>
		MyApp = new Backbone.Marionette.Application();

	    MyApp.addRegions({
	        headerRegion: "header",
	        mainRegion: "section.main",
	        sideBarRegion: "section.aside",
	        footerRegion: "footer"
	    });

	    MyApp.defaultContentView = Backbone.Marionette.ItemView.extend({
	    	template:'#default-content'
	    });

	    var defaultContentView = new MyApp.defaultContentView();

	    MyApp.mainRegion.show(defaultContentView);

	    $(document).ready(function(){
			MyApp.start();
		});



		</script>
	</body>
</html>