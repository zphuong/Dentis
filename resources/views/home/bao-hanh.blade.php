@extends('home.template')
@section('content')   
<!-- content -->
<div class="main"></div>
<div class="bground">

	<h2>BẢO HÀNH</h2>
</div>
<div class="khungtim">
	<form action="{{URL::to('tra-cuu')}}">
		<input type="text" name="code" id="timrang" placeholder="NHẬP MÃ TRA CỨU BẢO HÀNH">
		<button class="timrang" type="submit">Tra cứu</button>
	</form>
</div>
</div>
<!-- content -->
@endsection