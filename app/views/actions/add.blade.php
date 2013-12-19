@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('action') }}">Actions</a>
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
		<form class="form-horizontal" id="validation-form" role="form" method="post" action="{{ url('action'); }}">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="store">Store</label>
				<div class="col-sm-9">
					<select name="store_id" class="select2" value="{{ Input::old('store_id') }}">
						<option></option>
						@foreach($stores as $store)
						<option value="{{ $store->id }}">{{ $store->title }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="type">Action type</label>
				<div class="col-sm-9">
					<select name="action" id="type" value="{{ Input::old('action') }}">
						<option value="1">Walk In</option>
						<option value="2">Enter Region</option>
						<option value="3">Exit Region</option>

						<option value="4">Scan</option>
						<option value="5">Favorite</option>

						<option value="6">Buy</option>
					</select>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" id="title" class="col-xs-10 col-sm-5" name="title" value="{{ Input::old('title') }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="uuid">UUID</label>
				<div class="col-sm-5">
					<input type="text" placeholder="UUID" id="uuid" class="col-xs-10 col-sm-5" name="uuid" value="{{ Input::old('uuid') }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="major">Major</label>
				<div class="col-sm-5">
					<input type="text" placeholder="Major" id="placeholder" class="col-xs-10 col-sm-5" name="major" value="{{ Input::old('major') }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="minor">Minor</label>
				<div class="col-sm-5">
					<input type="text" placeholder="Minor" id="minor" class="col-xs-10 col-sm-5" name="minor" value="{{ Input::old('minor') }}" />
				</div>
			</div>

			<div class="space-4"></div>



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
{{ HTML::script('assets/js/jquery.validate.min.js') }}

<script type="text/javascript">
	
</script>
@stop