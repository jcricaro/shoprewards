@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

{{ $total }}

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
		Points transaction
		</div>
		<div class="table-responsive">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Points</th>
						<th>Amount per point</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $row)
					<tr>
						<td>{{ date("M d Y h:i a", strtotime($row->created_at)) }}</td>
						<td>{{ $row->value }}</td>
						<td></td>
						<td></td>
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
			"aaSorting" : [[ 0, "desc"]],
			"aoColumns": [
			null,null, null, null
			]
		});
	});
</script>
@stop