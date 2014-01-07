@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('action') }}">Actions</a>
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
				<label class="col-sm-3 control-label no-padding-right" for="store">Store</label>
				<div class="col-sm-9">
					{{ Form::select('store_id', $stores, $data->store_id, array('class' => 'input-medium select2', 'id' => 'store') )}}
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" id="title" class="col-xs-10 col-sm-5" name="title" value="{{ $data->title }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">Description</label>
				<div class="col-sm-9">
					<textarea placeholder="Description" name="description" id="description" class="col-xs-10 col-sm-5">{{ $data->description }}</textarea>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="value">Value</label>
				<div class="col-sm-5">
					<input type="text" placeholder="Value" id="value" class="col-xs-10 col-sm-5" name="value" value="{{ $data->value }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="trigger_id">Trigger</label>
				<div class="col-sm-9">
					<div class="radio">
						<label>
							{{ Form::radio('trigger', 'p', $data->actionType->trigger == 'p' ? true : false, array('class' => 'ace', 'id' => 'radio_beacon')) }}
							<span class="lbl"> Product &nbsp;
								<select disabled id="product" class="input-medium">
								</select>
							</span>
						</label>
					</div>
					<div class="radio">
						<label>
							{{ Form::radio('trigger', 'b', $data->actionType->trigger == 'b' ? true : false, array('class' => 'ace  col-md-2', 'id' => 'radio_beacon')) }}
							<span class="lbl"> Beacon &nbsp;&nbsp;
								<select disabled id="beacon" class="input-medium">
								</select>
							</span>
						</label>
					</div>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="type">Action type</label>
				<div class="col-sm-9">
					<select name="action" class="input-medium" id="type" value="{{ $data->action }}">
					</select>
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

		$("#radio_product").change(function(e) {
			$("#product").removeAttr('disabled');
			$("#product").attr('name', 'trigger_id');

			$("#beacon").attr('disabled', true);
			$("#beacon").removeAttr('name');


			$("#type").html('<option value="4">Scan</option><option value="5">Favorite</option><option value="6">Buy</option>');
			
		});

		$("#radio_beacon").change(function(e) {
			$("#beacon").removeAttr('disabled');
			$("#beacon").attr('name', 'trigger_id');

			$("#product").attr('disabled', true);
			$("#product").removeAttr('name');

			$("#type").html('<option value="1">Walk In</option><option value="2">Enter Region</option><option value="3">Exit Region</option>');
		});

		$("#store").change(function() {
			var post = {
				store_id : $(this).val()
			}
			$.post("{{ url('store/products') }}", post, function(data) {
				$("#product").html(data.html);
			}, 'json');

			$.post("{{ url('store/beacons') }}", post, function(data) {
				$("#beacon").html(data.html);
			});
		});

		$("#store").trigger("change");
		$("#radio_beacon").trigger("change");
		$("#radio_product").trigger("change");

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
				store_id: {
					required: true
				}
			},
			submitHandler: function (form) {
				$.ajax({
					url: "{{ url('action/'.$data->id) }}",
					type: 'PUT',
					data: $("#validation-form").serialize(),
					dataType: 'json',
					success: function(data) {
						if(data.status) {
							window.location = "{{ url('action') }}";
						}
					}
				});
			}
		});
	});
</script>
@stop