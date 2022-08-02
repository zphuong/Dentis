@extends('home.template')
@section('content')   
<!-- content -->
<div class="main"></div>
<div class="bground">

	<h2>BẢO HÀNH</h2>
</div>
<div class="khungtim">
	<form action="{{URL::to('tra-cuu')}}">
		<input type="text" name="code" id="timrang" placeholder="NHẬP MÃ TRA CỨU BẢO HÀNH, EMAIL HOẶC SĐT">
		<button class="timrang" type="submit">Tra cứu</button>
	</form>
</div>
<div class="xuathtml1">
	<ul class="danhsachrang">
		<li style="font-weight: bold;">
			<div class="code">Mã bảo hành</div>
			<div class="ten">Bệnh nhân</div>
			<div class="sanpham">Sản phẩm</div>
			<div class="motabaohanh">Mô tả</div>
			<div class="ngaylam">Ngày cấp</div>
			<div class="tinhtrangbaohanh">Tình trạng bảo hành</div>
		</li>
		<ul>
			@foreach($data as $data)
			<li>
				<div class="code">{{$data->code}}</div>
				<div class="ten">{{$data->name}}</div>
				<div class="sanpham">{{$data->product_name}}</div>
				<div class="motabaohanh">{{$data->description}}</div>
				<div class="ngaylam">{{$data->start_date}}</div>
				<div class="tinhtrangbaohanh">{{$data->end_date}} ( Còn {{$data->so_ngay}} ngày)</div>
			</li>
			@endforeach
		</ul>
	</ul>
</div>
<!-- content -->
@endsection