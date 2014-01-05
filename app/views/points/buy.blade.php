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

<form method="post" action="{{ url('points/buy') }}">
	<select name="store_id">
		@foreach($stores as $store)
		<option value="{{ $store->id }}">{{ $store->title }}</option>
		@endforeach
	</select>

	<select name="value">
		<option value="1000">1000 points</option>
		<option value="2000">2000 points</option>
		<option value="3000">3000 points</option>
		<option value="4000">4000 points</option>
		<option value="5000">5000 points</option>
	</select>

	<input type="submit" value="Buy" class="btn">
</form>
@stop