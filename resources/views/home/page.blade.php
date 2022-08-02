@extends('home.template')
@section('content')
<!-- content -->
<div class="main"></div>
<div class="bground">

	<h2>{{$page_detail->title}}</h2>
</div>
<div class="main">
	<div class="khungct">
		{!!$page_detail->description!!}
	</div>

</div>
<!-- content -->
@endsection