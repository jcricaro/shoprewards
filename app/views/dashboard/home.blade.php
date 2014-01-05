@section('content')
<div class="page-header">
	<h1>
		{{ $title }}
	</h1>
</div>

<div class="row">
Purchased points: {{ $purchasedPoints }}
<br/>
Consumed points: {{ $consumedPoints }}
<br/>
Remaining points: {{ $remainingPoints }}
<hr/>
Actions: {{ $actions }}
</div>
@stop