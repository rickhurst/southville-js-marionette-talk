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

		<script type="text/template" id="page-header-content">
		<p><%= text %></p>
		</script>

		<script type="text/template" id="page-main-content">
		<p><%= content %></p>
		</script>

		<script src="/js/lib/jquery-1.9.1.min.js"></script>
		<script src="/js/lib/underscore-min.js"></script>
		<script src="/js/lib/backbone-min.js"></script>
		<script src="/js/lib/backbone.marionette.min.js"></script>

		<script src="/js/app/app.js"></script>
		<script src="/js/app/nav.module.js"></script>
		<script>

	    $(document).ready(function(){
			MyApp.start({navItems:[
					{text: 'foo', href: 'foo-page', content: 'foo page content'}, 
					{text: 'bar', href: 'bar-page', content: 'bar page content'}
			]});
		});

		</script>
		<!-- example 5 showing router dynamic page content view -->
	</body>
</html>