<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/font-awesome.min.css') }}

	<!--[if IE 7]>
	{{ HTML::style('assets/css/font-awesome-ie7.min.css') }}
	<![endif]-->

	{{ HTML::style('assets/css/ace-fonts.css') }}

	{{ HTML::style('assets/css/ace.min.css') }}
	{{ HTML::style('assets/css/ace-rtl.min.css') }}
	{{ HTML::style('assets/css/ace-skins.min.css') }}

	<!--[if lte IE 8]>
	{{ HTML::style('assets/css/ace-ie.min.css') }}
	<![endif]-->
</head>
<body class="login-layout">
	<div class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>	
	{{ HTML::script('assets/js/jquery-2.0.3.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/ace-extra.min.js') }}

	<script type="text/javascript">
		$("#loginButton").click(function() {
			$.post("{{ URL::to('login/login'); }}", $("#loginForm").serialize(), function(data) {
				if(data.status == true) {
					location.reload();
				}
			}, 'json');
		});
	</script>

</body>
</html>