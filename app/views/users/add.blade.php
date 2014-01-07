@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-user home-icon"></i>
		<a href="{{ url('user') }}">Users</a>
	</li>
	<li class="active">Add</li>
</ul>
@stop

@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" role="form" id="validation-form" method="post" action="{{ url('user') }}">
			<div class="form-group">
				{{ Form::label('first_name', 'First Name', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					{{ Form::text('first_name', Input::old('fist_name'), array('class' => 'input-medium', 'placeholder' => 'First Name')) }}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					{{ Form::text('last_name', Input::old('last_name'), array('class' => 'input-medium', 'placeholder' => 'Last Name')) }}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('gender', 'Gender', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					<div class="radio">
					<label>
						{{ Form::radio('gender', 'm', Input::old('gender') == 'm' ? true : false, array('class' => 'ace')) }}
						<span class="lbl"> Male</span>
					</label>
					</div>
					<div class="radio">
					<label>
						{{ Form::radio('gender', 'f', Input::old('gender') == 'f' ? true : false, array('class' => 'ace')) }}
						<span class="lbl"> Female</span>
					</label>
					</div>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('city', 'City', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9 inline-form">
					{{ Form::text('city', Input::old('city'), array('class' => 'input-medium', 'placeholder' => 'City')) }}
					{{ Form::text('zipcode', Input::old('zipcode'), array('class' => 'input-small', 'placeholder' => 'Zipcode' )) }}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9">
					{{ Form::text('email', Input::old('email'), array('class' => 'input-large', 'placeholder' => 'Email') )}}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9">
					{{ Form::password('password', array('class' => 'input-large', 'placeholder' => 'Password', 'id' => 'password') )}}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('repassword', 'Retype Password', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9">
					{{ Form::password('repassword', array('class' => 'input-large', 'placeholder' => 'Retype Password') )}}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('usertype', 'Usertype', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9">
					{{ Form::select('usertype', $usertypes, Input::old('usertype')) }}
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="save">
						<i class="icon-ok bigger-110"></i> Submit
					</button>

					&nbsp; &nbsp; &nbsp;

					<button class="btn" type="reset">
						<i class="icon-undo bigger-110"></i> Reset
					</button>
				</div>
			</div>

		</form>
	</div>
</div>
@stop

@section('scripts')
{{ HTML::script('assets/js/jquery.validate.min.js'); }}

<script type="text/javascript">
jQuery(function($) {
	$("#validation-form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		invalidHandler: function (event, validator) { //display error alert on form submit   
			$('.alert-danger', $('#validate-form')).show();
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
		rules: {
			first_name: {
				required: true
			},
			last_name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			password : {
				required: true
			},
			repassword: {
				required: true,
				equalTo : '#password'
			}
		}
	});

	$.extend(jQuery.validator.messages, {
		equalTo : "Password fields should match"
	});
});
</script>
@stop