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

		.field label {
			display: block;
		}
		.field input {
			width: 80%;
			line-height:1.5em;
		}

		#notifications .message {
			background: pink;
			border: 1px solid red;
			padding:0.5em;
		}
		</style>
	</head>
	<body>
		<div id="notifications"></div>
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
		<p><a href="#" class="page-add">add page</a></p>
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

		<script type="text/template" id="page-add-form">
		<form>
			<div class="field">
				<label>Title</label>
				<input type="text" id="title" />
			</div>
			<div class="field">
				<label>Content</label>
				<input type="text" id="content" />
			</div>
			<div class="field">
				<label>href</label>
				<input type="text" id="href" />
			</div>
			<div class="field">
				<button>Add</button>
			</div>
		</form>
		</script>

		<script type="text/template" id="notifications-template">
			<div class="message"><%= message %></div>
		</script>

		<script src="/js/lib/jquery-1.9.1.min.js"></script>
		<script src="/js/lib/underscore-min.js"></script>
		<script src="/js/lib/backbone-min.js"></script>
		<script src="/js/lib/backbone.marionette.min.js"></script>

		<script src="/js/app/app.js"></script>
		<script src="/js/app/nav.module.js"></script>
		<script src="/js/app/notification.module.js"></script>
		<script>

	    $(document).ready(function(){
			MyApp.start({navItems:[
					{text: 'foo', href: 'foo-page', content: 'foo page content'}, 
					{text: 'bar', href: 'bar-page', content: 'bar page content'}
			]});
		});

		</script>
	</body>
</html>