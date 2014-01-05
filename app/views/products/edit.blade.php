@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="{{ url('product') }}">Products</a>
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
	<div class="col-xs-8 widget-container-span">
		<form class="form-horizontal" role="form" id="validation-form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="title">Title</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Title" class="col-xs-10 col-sm-5" name="title" value="{{ $data->title }}" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="price">Price</label>
				<div class="col-sm-9">
					<span class="input-icon">
					<input type="text" placeholder="Price" name="price" value="{{ $data->price }}" />
					<i class="green icon-euro"></i>
					</span>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="ean">EAN</label>
				<div class="col-sm-9">
					<input type="text" placeholder="EAN" class="col-xs-10 col-sm-5" name="ean" value="{{ $data->ean }}" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">Description</label>
				<div class="col-sm-9">
					<textarea name="description" placeholder="Description" class="col-xs-10 col-sm-5">{{ $data->description }}</textarea>
				</div>
			</div>

			<div class="clearfix  form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="save">
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
	<div class="col-xs-4 widget-container-span">
		<div class="widget-box">
			<div class="widget-header">
				<h5>Photos</h5>
				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>

					<a href="#" data-action="close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">


					<div id="dropzone">
						<form action="{{ url('upload/product/'. $data->id) }}" class="dropzone">
							<div class="fallback">
								<input name="file" type="file" multiple="" />
							</div>
						</form>
					</div>

					<div class="space-6"></div>

					<ul class="ace-thumbnails">
						@foreach($data->getPhotos as $image)
						<li>
							<a href="{{ $image->getPath() }}" title="Photo Title" data-rel="colorbox">
								<img alt="150x150" src="{{ $image->getThumbnail() }}" />
								<div class="tags">
									<span class="label-holder">
										<span class="label label-info arrowed-in">Main</span>
									</span>
								</div>
							</a>

							<div class="tools">
								<a href="#">
									<i class="icon-link"></i>
								</a>

								<a href="#">
									<i class="icon-paper-clip"></i>
								</a>

								<a href="#">
									<i class="icon-pencil"></i>
								</a>

								<a href="#">
									<i class="icon-remove red"></i>
								</a>
							</div>
						</li>
						@endforeach
					</ul>
					
					<div class="clearfix"></div>
					
				</div>
			</div>
		</div>
	</div>
</div>

			
@stop

@section('scripts')

{{ HTML::script('assets/js/jquery.validate.min.js') }}
{{ HTML::script('assets/js/dropzone.min.js') }}
{{ HTML::script('assets/js/jquery.colorbox-min.js') }}

<script type="text/javascript">
	jQuery(function($) {

		var colorbox_params = {
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="icon-arrow-left"></i>',
			next:'<i class="icon-arrow-right"></i>',
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = 'auto';
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);

		try {
			$(".dropzone").dropzone({
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 0.5, // MB

				addRemoveLinks : true,
				dictDefaultMessage :
				'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> Drop files</span> to upload \
				<span class="smaller-80 grey">(or click)</span> <br /> \
				<i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
				,
				dictResponseError: 'Error while uploading file!',

				//change the previewTemplate to use Bootstrap progress bars
				previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
			});
			} catch(e) {
				alert('Dropzone.js does not support older browsers!');
		}

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
				ean: {
					required: true
				},
				price: {
					required: true,
					number: true
				}
			},
			submitHandler: function (form) {
				$.ajax({
					url: "{{ url('product/'.$data->id) }}",
					type: 'PUT',
					data: $("#validation-form").serialize(),
					dataType: 'json',
					success: function(data) {
						if(data.status) {
							window.location = "{{ url('product') }}";
						}
					}
				});
			}

		});
	});
</script>
@stop