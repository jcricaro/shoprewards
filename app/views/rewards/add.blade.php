@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('reward') }}">Rewards</a>
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
		<form class="form-horizontal" id="validation-form" role="form" method="post" action="{{ url('reward'); }}">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" class="col-xs-10 col-sm-5" name="title" value="{{ Input::old('title') }}" id="title" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="Store">Store</label>
				<div class="col-sm-9">
					<select name="store_id">
						<option></option>
						@if($stores)
						@foreach($stores as $store)
						<option value="{{ $store->id }}">{{ $store->title }}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="price">Points</label>
				<div class="col-sm-6">
					<input type="text" placeholder="Price" class="col-xs-10 col-sm-5" name="value" value="{{ Input::old('value') }}" id="points" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">Description</label>
				<div class="col-sm-9">
					<textarea placeholder="Description" id="description" name="description" class="col-xs-10 col-sm-5">{{ Input::old('description') }}</textarea>
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
			value: {
				required: true,
				number: true
			},
			store_id : {
				required: true
			}
		}
	});
</script>
@stop