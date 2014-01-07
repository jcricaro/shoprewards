@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-user home-icon"></i>
		<a href="{{ url('user') }}">Users</a>
	</li>
	<li class="active">Edit</li>
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
		<form class="form-horizontal" role="form" id="validation-form">
			<div class="form-group">
				{{ Form::label('first_name', 'First Name', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					{{ Form::text('first_name', $data->first_name, array('class' => 'input-medium', 'placeholder' => 'First Name')) }}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					{{ Form::text('last_name', $data->last_name, array('class' => 'input-medium', 'placeholder' => 'Last Name')) }}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('gender', 'Gender', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-6">
					<div class="radio">
					<label>
						{{ Form::radio('gender', 'm', $data->gender == 'm' ? true : false, array('class' => 'ace')) }}
						<span class="lbl"> Male</span>
					</label>
					</div>
					<div class="radio">
					<label>
						{{ Form::radio('gender', 'f', $data->gender == 'f' ? true : false, array('class' => 'ace')) }}
						<span class="lbl"> Female</span>
					</label>
					</div>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('city', 'City', array('class' => 'col-sm-3 control-label no-padding-right')) }}
				<div class="col-sm-9 inline-form">
					{{ Form::text('city', $data->city, array('class' => 'input-medium', 'placeholder' => 'City')) }}
					{{ Form::text('zipcode', $data->zipcode, array('class' => 'input-small', 'placeholder' => 'Zipcode' )) }}
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

{{ HTML::script('assets/js/jquery.validate.min.js') }}

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
				}
			},
			submitHandler: function (form) {
				$.ajax({
					url: "{{ url('user/'.$data->id) }}",
					type: 'PUT',
					data: $("#validation-form").serialize(),
					dataType: 'json',
					success: function(data) {
						if(data.status) {
							window.location = "{{ url('user') }}";
						}
					}
				});
			}

		});
	});
</script>
@stop