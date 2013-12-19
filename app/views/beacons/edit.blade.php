@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('beacon') }}">Beacons</a>
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
		<form class="form-horizontal" id="validation-form" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" id="title" class="col-xs-10 col-sm-5" name="title" value="{{ $data->title }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="uuid">UUID</label>
				<div class="col-sm-5">
					<input type="text" placeholder="UUID" id="uuid" class="col-xs-10 col-sm-5" name="uuid" value="{{ $data->uuid }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="major">Major</label>
				<div class="col-sm-5">
					<input type="text" placeholder="Major" id="placeholder" class="col-xs-10 col-sm-5" name="major" value="{{ $data->major }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="minor">Minor</label>
				<div class="col-sm-5">
					<input type="text" placeholder="Minor" id="minor" class="col-xs-10 col-sm-5" name="Minor" value="{{ $data->minor }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="store">Store</label>
				<div class="col-sm-9">
					<select name="store_id" class="select2" value="{{ $data->store_id }}">
						<option></option>
						@foreach($stores as $store)
						<option value="{{ $store->id }}"
							@if($data->store_id == $store->id) selected="selected"@endif>
							{{ $store->title }}
						</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">Description</label>
				<div class="col-sm-9">
					<textarea name="description" id="description" class="col-xs-10 col-sm-5">{{ Input::old('description') }}</textarea>
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
			title: {
				required: true
			},
			uuid: {
				required: true
			},
			major : {
				required: true
			},
			minor : {
				required : true
			},
			store_id : {
				required: true
			}
		},
		submitHandler: function (form) {
			$.ajax({
				url: "{{ url('beacon/'.$data->id) }}",
				type: 'PUT',
				data: $("#validation-form").serialize(),
				dataType: 'json',
				success: function(data) {
					if(data.status) {
						window.location = "{{ url('beacon') }}";
					}
				}
			});
		}

	});
</script>


@stop
