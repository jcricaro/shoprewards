@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

<p class="pull-right">
<a href={{ url('reward/create'); }} class="btn btn-primary"><i class="icon icon-plus"></i> Add Reward</a>
</p>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			List of Rewards
		</div>
		@if($data)
		<div class="table-responsive">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Store Name</th>
						<th class="col-xs-2">Points</th>
						<th class="col-xs-2 hidden-480">Date</th>
						<th class="col-xs-1"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $row)
					<tr>
						<td>{{ $row->title }}</td>
						<td>{{ $row->store->title }}</td>
						<td>{{ $row->value }}</td>
						<td class="hidden-480">{{ date("M d Y", strtotime($row->created_at)) }}</td>
						<td>
							<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
								<a class="green" href="{{ url('reward/'.$row->id.'/edit') }}">
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
											<a href="{{ url('reward/'.$row->id.'/edit') }}" class="tooltip-success" data-rel="tooltip" title="Edit">
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
		@endif
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
			null,null, null, null,
			{
				"bSortable": false
			}
			]
		});
	});
</script>
@stop