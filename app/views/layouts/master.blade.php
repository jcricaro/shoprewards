<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Shop Rewards System</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/font-awesome.min.css') }}
	{{ HTML::style('assets/css/dropzone.css') }}
	
	<!--[if IE 7]>
	{{ HTML::style('assets/css/font-awesome-ie7.min.css') }}
	<![endif]-->
	{{ HTML::style('assets/css/jquery-ui-1.10.3.custom.min.css') }}
	{{ HTML::style('assets/css/jquery.gritter.css') }}

	{{ HTML::style('assets/css/ace-fonts.css') }}

	{{ HTML::style('assets/css/ace.min.css') }}
	{{ HTML::style('assets/css/ace-rtl.min.css') }}
	{{ HTML::style('assets/css/ace-skins.min.css') }}

	{{ HTML::script('assets/js/ace-extra.min.js') }}

	<!--[if lte IE 8]>
	{{ HTML::style('assets/css/ace-ie.min.css') }}
	<![endif]-->
</head>
<body>
	<div class="navbar navbar-default" id="navbar">
		<div class="navbar-header pull-left">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<a href="#" class="navbar-brand">
				<small>
					<i class="icon-leaf"></i>
					Shop Rewards System
				</small>
			</a>
		</div>
		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="{{ asset('assets/avatars/user.jpg') }}" alt="Jason's Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							JC
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="">
								<i class="icon-cog"></i>
								Settings
							</a>
						</li>

						<li>
							<a href="#">
								<i class="icon-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>
						<li>
							<a href="{{ url('logout') }}">
								<i class="icon-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>
		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
		</div>


		<div class="sidebar" id="sidebar">
			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
			</script>
			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="icon-signal"></i>
					</button>

					<button class="btn btn-info">
						<i class="icon-pencil"></i>
					</button>

					<button class="btn btn-warning">
						<i class="icon-group"></i>
					</button>

					<button class="btn btn-danger">
						<i class="icon-cogs"></i>
					</button>
				</div>

				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div>

			<ul class="nav nav-list">
				<li class="@if(Request::is('dashboard'))active@endif">
					<a href="{{ url('dashboard') }}">
						<i class="icon-dashboard"></i>
						<span class="menu-text"> Dashboard </span>
					</a>
				</li>

				<li class="@if(Request::is('user') || Request::is('user/*'))active@endif">
					<a href="{{ url('store') }}">
						<i class="icon-user"></i>
						<span class="menu-text"> Users </span>
					</a>
				</li>

				<li class="@if(Request::is('store') || Request::is('store/*'))active@endif">
					<a href="{{ url('store') }}">
						<i class="icon-certificate"></i>
						<span class="menu-text"> Stores </span>
					</a>
				</li>

				<li class="@if(Request::is('points/*') || Request::is('points'))active open@endif">
					<a href="#" class="dropdown-toggle">
						<i class="icon-credit-card"></i>
						<span class="menu-text"> Points </span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@if(Request::is('points'))active@endif">
							<a href="{{ url('points') }}">
								<i class="icon-double-angle-right"></i>
								Overview
							</a>
						</li>
						<li class="@if(Request::is('points/buy'))active@endif">
							<a href="{{ url('points/buy') }}">
								<i class="icon-double-angle-right"></i>
								Buy Points
							</a>
						</li>
					</ul>
				</li>

				<li class="@if(Request::is('action') || Request::is('action/*'))active@endif">
					<a href="{{ url('action') }}">
						<i class="icon-barcode"></i>
						<span class="menu-text"> Actions </span>
					</a>
				</li>

				<li class="@if(Request::is('product') || Request::is('product/*'))active@endif">
					<a href="{{ url('product') }}">
						<i class="icon-shopping-cart"></i>
						<span class="menu-text"> Products </span>
					</a>
				</li>

				<li class="@if(Request::is('beacon/*') || Request::is('beacon'))active@endif">
					<a href="{{ url('beacon') }}">
						<i class="icon-laptop"></i>
						<span class="menu-text"> Beacons </span>
					</a>
				</li>

				<li class="@if(Request::is('reward') || Request::is('reward/*'))active@endif">
					<a href="{{ url('reward') }}">
						<i class="icon-trophy"></i>
						<span class="menu-text"> Rewards </span>
					</a>
				</li>

				<li class="@if(Request::is('analytics/*') || Request::is('analytics'))active open@endif">
					<a href="#" class="dropdown-toggle">
						<i class="icon-bar-chart"></i>
						<span class="menu-text"> Analytics </span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@if(Request::is('analytics'))active@endif">
							<a href="{{ url('analytics') }}">
								<i class="icon-double-angle-right"></i>
								Overview
							</a>
						</li>
						<li class="@if(Request::is('analytics/beacon'))active@endif">
							<a href="{{ url('analytics/beacon') }}">
								<i class="icon-double-angle-right"></i>
								Beacons
							</a>
						</li>
						<li class="@if(Request::is('analytics/path'))active@endif">
							<a href="{{ url('analytics/path') }}">
								<i class="icon-double-angle-right"></i>
								Path
							</a>
						</li>
					</ul>
				</li>
			</ul>

			<div class="sidebar-collapse" id="sidebar-collapse">
				<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
			</div>

			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
			</script>
		</div>



		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>
				@yield('breadcrumb')

				<div class="nav-search" id="nav-search">
					<form class="form-search">
						<span class="input-icon">
							<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
							<i class="icon-search nav-search-icon"></i>
						</span>
					</form>
				</div>
			</div>

			<div class="page-content">
			@yield('content')
			</div>
		</div>
	</div>

	{{ HTML::script('assets/js/jquery-2.0.3.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/ace.min.js') }}
	{{ HTML::script('assets/js/jquery.gritter.min.js') }}

	@yield('scripts')

	<script type="text/javascript">
		@if(Session::has('info'))
		$.gritter.add({
			title: 'Info <i class="icon info"></i>',
			text: "{{ Session::get('info') }}",
			sticky: false,
			time: '',
			class_name: 'gritter-info'
		});
		@endif
		@if(Session::has('error'))
		$.gritter.add({
			title : 'Form Error',
			text: "<ul>@foreach(Session::get('error') as $error)
					<li>{{ $error }}</li>@endforeach
				</ul>",
			image: "{{ asset('assets/avatars/avatar1.png'); }}",
			sticky: false
		});
		@endif
	</script>
</body>
</html>