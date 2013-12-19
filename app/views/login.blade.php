@extends('layouts.home')


@section('content')
<div class="login-container">
	<div class="center">
		<h1>
			<i class="icon-leaf green"></i>
			<span class="red">Shop Rewards</span>
			<span class="white">Application</span>
		</h1>
		<!-- <h4 class="blue">&copy; JC Ricaro</h4> -->
	</div>
	<div class="space-6"></div>
	<div class="position-relative">
		<div id="login-box" class="login-box visible widget-box no-border">
			<div class="widget-body">
				<div class="widget-main">
					<h4 class="header blue lighter bigger">
						<i class="icon-coffee green"></i>Please enter the following
					</h4>

					<div class="space-6"></div>

					<form id="loginForm">
						<fieldset>
							<label class="block clearfix">
								<span class="block input-icon input-icon-right">
									<input type="text" name="username" class="form-control" placeholder="Username" />
									<i class="icon-user"></i>
								</span>
							</label>

							<label class="block clearfix">
								<span class="block input-icon input-icon-right">
									<input type="password" name="password" class="form-control" placeholder="Password" />
									<i class="icon-lock"></i>
								</span>
							</label>

							<div class="space"></div>

							<div class="clearfix">
								<label class="inline">
									<input type="checkbox" class="ace" />
									<span class="lbl">Remember Me</span>
								</label>

								<button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="loginButton">
									<i class="icon-key"></i>
									Login
								</button>
							</div>

							<div class="space-4"></div>
						</fieldset>
					</form>
				</div>
				<div class="toolbar clearfix">
					<div>
						<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
							<i class="icon-arrow-left"></i>
							I forgot my password
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop