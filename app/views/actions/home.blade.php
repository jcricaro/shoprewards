@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

<p class="pull-right">
<a href={{ url('action/create'); }} class="btn btn-primary"><i class="icon icon-plus"></i> Add Action</a>
</p>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			List of Actions
		</div>
		<div class="table-responsive">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Store</th>
						<th>Name</th>
						<th>Action</th>
						<th>Beacon/Product</th>
						<th>Hits</th>
						<th class="hidden-480">Active</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					@foreach($data as $row)
					<tr>
						<td>{{ $row->store->title }}</td>
						<td>{{ $row->title }}</td>
						<td>{{ $row->actionType->text }}</td>
						<td>{{ $row->trigger->title }}</td>
						<td>{{ $row->hits }}</td>
						<td>Active</td>
						<td>
							<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
								<a class="green" href="#">
									<i class="icon-pencil bigger-130"></i>
								</a>

								<a class="red" href="#">
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
											<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
												<span class="green">
													<i class="icon-edit bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
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

@stop

@section('scripts')

{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/js/jquery.dataTables.bootstrap.js') }}

<script type="text/javascript">
	jQuery(function($) {
		var oTable1 = $('#table').dataTable({
			"aoColumns": [
			null,null,null,null, null, null,
			{
				"bSortable": false
			}
			]
		});
	});
</script>
@stop