@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('store') }}">Stores</a>
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
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" class="col-xs-10 col-sm-5" name="title" value="{{ $data->title }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">Description</label>
				<div class="col-sm-9">
					<textarea name="description" placeholder="Description" class="col-xs-10 col-sm-5">{{ $data->description }}</textarea>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address">Address</label>
				<div class="col-sm-9">
					<textarea name="address" placeholder="Address" class="col-xs-10 col-sm-5">{{ $data->address }}</textarea>
				</div>
			</div>

			<div class="clearfix  form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="button" id="save">
						<i class="icon-ok bigger-110"></i>
						Submit
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="icon-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop

@secion('scripts')
<script type="text/javascript">
	jQuery(function($) {
		$("#save").click(function() {
			
		});
	});
</script>
@stop