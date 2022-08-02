@extends('home.template')
@section('content')   
<!-- content -->
<div class="bground">

	<h2>{{$blogDetail->title}}</h2>
</div>

{{-- noidung --}}
<div class="container">
    <p class="breadcrumb"><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="./" itemprop="url"><span itemprop="title">Trang chủ</span>
    </a>
</span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{URL::to('tin-tuc')}}" itemprop="url"><span itemprop="title">Tin tức</span>
</a>
</span>{{$blogDetail->title}}</p>
<div class="container">
    <p class="date">{{$blogDetail->created_at}}</p>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
         {!!$blogDetail->description!!}
     </div>
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
        <h2 class="tieudect">Sản phẩm nổi bật</h2>
        <div class="row"></div>
        @foreach($product as $product)
        <div class="col-12 box-sp">
            <a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}" class="img"><img width="100%" src="{{asset('upload/product/'.$product->image)}}" alt="SỨ CROM-COBAN">
            </a>
            <a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}"><h3>{{$product->product_name}}</h3></a>
            <p></p>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
    <h2 class="tieubieu"><span>Bài viết liên quan</span></h2>
     @foreach($blog as $blog)
     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 new">
         <a href="{{URL::to('tin-tuc/'.$blog->slug)}}" title="{{$blog->title}}" class="img"><img width="100%" src="{{asset('upload/blog/'.$blog->image)}}" alt="{{$blog->title}}">
            <a href="{{URL::to('tin-tuc/'.$blog->slug)}}" title="{{$blog->title}}"><h3>{{$blog->title}}</h3></a>
            <p class="date">{{$blog->created_at}}</p>   
        </a>
    </div>
    @endforeach
</div>
</div>
<!-- content -->
@endsection