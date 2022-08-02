@extends('home.template')
@section('content')   
<!-- content -->
<div class="main"></div>
<div class="bground">

	<h2>SẢN PHẨM / {{$product->product_name}}</h2>
</div>
{{-- noidung --}}
<div class="khungct">
	<div class="main">

		<div class="cgallery">
			<div class="sp-wrap sp-non-touch" style="display: inline-block;">

				<div class="sp-large"><a href="{{asset('upload/product/'.$product->image)}}" title="PHỤC HÌNH RĂNG SỨ TRÊN IMPLANT" class=".sp-current-big"><img src="{{asset('upload/product/'.$product->image)}}" alt="PHỤC HÌNH RĂNG SỨ TRÊN IMPLANT"></a></div></div>
				<div class="clr10"></div>
			</div>
			<div class="cinfo">
				<h2 class="head">PHỤC HÌNH RĂNG SỨ TRÊN IMPLANT</h2>
				<p class="baohanh"><strong>Thời gian bảo hành:</strong> Từ 3 năm
				</p>

				<p class="danhmuc"><strong>Danh mục:</strong> VitaLab Product</p>
				<div class="hide">
					<p class="nguyenlieu"><strong>Nguyên liệu:</strong></p>
					<ul class="tienich1" value="">

					</ul>
				</div>
				<p></p>
				<form action="{{URL::to('advise')}}">
					<ul class="contactus">
						<li><input type="text" name="phone" placeholder="Số điện thoại"></li>
						<li class="full"><button class="submit" type="submit">Tư vấn</button></li>
					</ul>
				</form>
				@if (session('status'))
					<div class="btn btn-block btn-success">{{session('status')}}</div>
					<?php Session::put('status', null) ?>
				@endif
			</div>

			<div class="clr10"></div>
			<div class="khungct">
				<ul class="tabs"><li class="active"><a href="#ct">Chi tiết</a></li></ul>
				{!!$product->description!!}
			</div>
			<div class="clr10"></div>
			<div class="khungct">
				<h2 class="tieubieu"><span>Sản phẩm liên quan</span></h2>
				<ul class="box">
					@foreach($productRelate as $productRelate)
					<li class="product">
						<a href="{{URL::to('san-pham/'.$productRelate->slug)}}" title="{{$productRelate->product_name}}" class="img flex rotate"><img src="{{asset('upload/product/'.$productRelate->image)}}" data-src="{{asset('upload/product/'.$productRelate->image)}}" alt="{{$productRelate->product_name}}" class="lazy">
						</a><a class="tensp" href="{{URL::to('san-pham/'.$productRelate->slug)}}" title="{{$productRelate->product_name}}"><h3>{{$productRelate->product_name}}</h3></a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<!-- content -->
	@endsection