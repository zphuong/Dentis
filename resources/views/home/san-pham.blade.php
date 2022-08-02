@extends('home.template')
@section('content')   
<!-- content -->
<div class="main"></div>
<div class="bground">

    <h2>SẢN PHẨM</h2>
</div>
<div class="khungct">

    <div class="main">

        <div class="motadanhmuc">Nhằm đáp ứng nhu cầu của khác hàng cũng như khẳng định được giá trị của thương hiệu. VITALAB " không ngừng học hỏi, không ngừng nỗ lực, không ngừng hoàn thiện", ứng dụng nhiều công nghệ hiện đại và hệ thống trang thiết bị tiên tiến nhằm cung cấp cho khách hàng các dịch vụ tốt nhất hiện nay và mang lại hiệu quả cao, giá trị vượt trội đảm bảo sự hài lòng cho khách hàng</div>
        <!---->
        <h2 class="tieudedm"><a href="3s-imlanpt-studio" title="3S Implant Studio">SẢN PHẨM CỦA VITALAB</a></h2>
        <ul class="box">
            @foreach($product as $product)
            <li class="product">
                <a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}" class="img flex rotate">
                    <img src="{{asset('upload/product/'.$product->image)}}" data-src="{{asset('upload/product/'.$product->image)}}" alt="{{$product->product_name}}" class="lazy">
                </a>
                <a class="tensp" href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}"><h3>{{$product->product_name}}</h3>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- content -->
    @endsection