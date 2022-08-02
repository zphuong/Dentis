@extends('home.template')
@section('content')   
       <!-- content -->
    <div class="main"></div>
    <div class="bground">

        <h2>TIN TỨC</h2>
    </div>
    <div class="khungct">
        <div class="main">
            <div class="motadanhmuc">Nếu bạn muốn liên hệ với chúng tôi về một dịch vụ về một sản phẩm nào đó, hoặc bất cứ điều gì khác, chúng tôi sẵn lòng lắng nghe từ bạn
            </div>
            <div class="clr10"></div>
            <ul class="box">
                @foreach($blog as $value)
                <li class="news">
                    <a href="{{URL::to('tin-tuc/'.$value->slug)}}" title="{{$value->title}}" class="img"><img src="{{asset('upload/blog/'.$value->image)}}" alt="{{$value->title}}">
                    </a>
                    <a href="{{URL::to('tin-tuc/'.$value->slug)}}" title="{{$value->title}}"><h3 style="text-transform: uppercase">{{$value->title}}</h3></a>
                    <p class="date">{{$value->create_at}}</p>
                    <p></p>
                </li>
                @endforeach
            </ul>
             <div class="paginate">
                {{ $blog->links() }}
            </div>
        </div>
    </div>
    </div>
    <!-- content -->
@endsection