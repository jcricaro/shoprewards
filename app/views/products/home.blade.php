@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			List of your Actions
		</div>
		<div class="table-responsive">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="col-xs-2">EAN</th>
						<th>Title</th>
						<th class="col-xs-2">Price</th>
						<th class="col-xs-2 hidden-480">Date</th>
						<th class="col-xs-1"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $row)
					<tr>
						<td>{{ $row->ean }}</td>
						<td>{{ $row->title }}</td>
						<td>{{ $row->price }}</td>
						<td class="hidden-480">{{ date("M d Y", strtotime($row->created_at)) }}</td>
						<td>
							<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
								<a class="green" href="{{ url('product/'.$row->id.'/edit') }}">
									<i class="icon-pencil bigger-130"></i>
								</a>

								<a class="red delete" href="#" data-id="{{ $row->id }}">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>

							<div class="visible-xs visible-sm hidden-md hidden-lg">
								<div class="inline position-relative">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
										<i class="icon-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
										<li>
											<a href="{{ url('product/'.$row->id.'/edit') }}" class="tooltip-success" data-rel="tooltip" title="Edit">
												<span class="green">
													<i class="icon-edit bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-error delete" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="icon-trash bigger-120"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="space-4"></div>

<a href={{ url('product/create'); }} class="btn btn-primary pull-right"><i class="icon icon-plus"></i> Add Product</a>

@stop

@section('scripts')

{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/js/jquery.dataTables.bootstrap.js') }}
{{ HTML::script('assets/js/bootbox.min.js') }}

<script type="text/javascript">
	jQuery(function($) {
		var oTable1 = $('#table').dataTable({
			"aoColumns": [
			null,null, null, null,
			{
				"bSortable": false
			}
			]
		});
	});

	$(".delete").on("click", function() {
		var self = this;
		bootbox.confirm("Are you sure?", function(result) {
			if(result) {
				$.ajax({
					url: "{{ url('product') }}" + "/" + $(self).data('id'),
					type: 'DELETE',
					success: function(data) {
						if(data.status) {
							location.reload();
						}
					},
					dataType: 'json'
				});
			}
		});
		return false;
	});

</script>
@stop