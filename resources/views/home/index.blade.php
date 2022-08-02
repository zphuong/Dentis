@extends('home.template')
@section('content')
<div class="row_slider">
    <div class="left">
        <div class="block-banner-deal">
            <div class="wrap_slider">
                <ul class="slider">
                    <li>
                        <a href="" title="slide 7"><img src="images/banner.png" alt="slide 7" onclick="updateads(16)" />
                        </a>
                    </li>
                    {{-- <li>
                        <a href="" title="slide 5"><img src="images/14-slide-5.jpg" alt="slide 5" onclick="updateads(14)" />
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <style type="text/css">
            .wrap-wrap_slider {
                position: relative;
            }

            ul.slider li {
                width: 100%;
                display: none
            }

            ul.slider li img {
                width: 100%
            }

            ul.slider li:first-child {
                display: block;
            }
        </style>
        <script type="text/javascript">
            $(function() {
                $(".slider li").show();
                $('.slider').bxSlider({
                    mode: 'fade',
                    auto: true,
                    pager: false
                });
            })
        </script>
    </div>
</div>
<div class="main">
    <div class="khungtimrang">
        <div class="searchrang">
            <h2 class="tieude">Nhập mã tra cứu thông tin bảo hành</h2>
            <div class="khungtr">
                <form action="{{URL::to('tra-cuu')}}">
                <input type="text" name="code" id="timrang" placeholder="NHẬP MÃ TRA CỨU BẢO HÀNH, EMAIL HOẶC SĐT">
                <button class="timrang" type="submit">Tra cứu</button>
                </form>
            </div>

        </div>
    </div>
    <div id="popup-container">
        <div id="popup-window">
            <div class="modal-content">
                <a class="close"></a>
                <a href="" class="your-class"></a>
                <div class="xuathtml"></div>
            </div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="gioithieu">
        <div class="left"><span style="font-size:28px;"><strong><span style="color:#19987e;">CHÀO MỪNG BẠN ĐẾN VITALAB</span>
        </strong>
    </span>
    <br />
    <br />
    <br />
    <br />
    <span style="font-size:14px;">Chào mừng quý Nha Sĩ đã kết nối với VITALAB.<br />
        Chúng tôi luôn mong muốn tạo dựng giá trị kết nối lâu dài và cùng nhau tạo ra những sản phẩm tối ưu nhất cho từng bệnh nhân.<br />
        Chúng tôi luôn cập nhật những công nghệ mới nhất để đưa VITALAB nói riêng và ngành công nghiệp sản xuất Răng của Việt Nam nói chung luôn luôn theo kịp với thế giới trong công cuộc cách mạng công nghệ 4.0.<br />
    Để tạo điều kiện cho Bệnh nhân luôn luôn được sử dụng những sản phẩm tối ưu nhất. Chúng tôi luôn luôn đề cao sự kết nối, trao đổi giữa công ty và khách hàng để cùng nhau đem lại lợi ích cao nhất cho Bệnh Nhân.</span>
    <br /> &nbsp;
    <a class="loadmore" href="gioi-thieu">Xem thêm</a>
</div>
<div class="right">
    <video controls="" autoplay="" loop="" muted="">
        <source src="images/11-video-gioi-thieu.mp4" type="video/mp4">
        </video>

    </div>
</div>
</div>
<div class="khungsp">

    <div class="main">
        <h2 class="tieudesp">DỊCH VỤ CỦA CHÚNG TÔI</h2>
        <span class="motatdsp">"Với hệ thống thiết bị hiện đại từ Châu Âu, theo tiêu chuẩn quốc tế. Chúng tôi mang đến cho khách hàng dịch vụ sản phẩm chất lượng vượt trội"</span>
        <ul class="box">
            {{-- product --}}
            @foreach( $product as $product)
            <li class="boxdm">
                <a href="{{URL::to('san-pham/'.$product->slug)}}" class="hinh" title="{{$product->product_name}}"><img src="{{asset('upload/product/'.$product->image)}}" alt="{{$product->product_name}}"></a>
                <div class="info">
                    <div class="so">0{{$product->id}}</div>
                    <div class="chu">
                        <div class="khungtt">
                            <a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                        </div>
                        <div class="mota"><a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}"><span style="font-size:16px; text-transform: uppercase;">SẢN PHẨM CHUYÊN BIỆT {{$product->product_name}}</span><br />
                            <br />
                            {!!$product->description!!}
                        </div>
                        <div class="xemthem">
                            <a href="{{URL::to('san-pham/'.$product->slug)}}" title="{{$product->product_name}}" class="loadmore">Xem thêm</a>
                        </div>
                    </div>
                </li>
                @endforeach
                {{-- product --}}

            </ul>

            <div class="clr10"></div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="rowtexttop">
        <div class="main">
            <div class="gt">
                <div style="text-align: center;"><strong><span style="font-size:48px;"><span style="color:#0012ff;text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;">VITALAB</span></span></strong>
                </div>

                <div>
                    <br />
                    <span style="font-size:14px;"><span style="color:#FFFFFF;">VITALAB DENT luôn ý thức được phục vụ khách hàng bằng sự chủ động tận tâm phục vụ lấy khách hàng làm trung tâm, không ngừng phát triển bằng các dịch vụ chất lượng cao, dễ dàng tiếp cận và đem lại sự thoả mãn nhất cho khách hàng</span></span>
                </div>

                <div style="text-align: center;">&nbsp;</div>
            </div>

            <ul class="texttop">
                <li>
                    <div class="hinh"><img src="images/12-su-hai-long-tuyet-doi.jpg" alt="Sự hài lòng tuyệt đối" />
                    </div>
                    <div class="info">
                        <div class="ten">
                            Sự hài lòng tuyệt đối
                        </div>
                        <p class="mota">VITALAB DENT cam kết mang lại cho khách hàng những sản phẩm tốt nhất và sự hài lòng tuyệt đối khi sử dụng dịch vụ của chúng tôi</p>
                    </div>
                </li>

                <li>
                    <div class="hinh"><img src="images/10-cong-nghe-hien-dai.jpg" alt="Công nghệ hiện đại" />
                    </div>
                    <div class="info">
                        <div class="ten">
                            Công nghệ hiện đại
                        </div>
                        <p class="mota">Chúng tôi sử dụng thế thống trang thiết bị hiện đại và luôn cập nhật công nghệ tiên tiến trong hoạt động sản xuất kinh doanh.</p>
                    </div>
                </li>

                <li>
                    <div class="hinh"><img src="images/9-dich-vu-da-dang.jpg" alt="Dịch vụ đa dạng" />
                    </div>
                    <div class="info">
                        <div class="ten">
                            Dịch vụ đa dạng
                        </div>
                        <p class="mota">VITALAB DENT luôn không ngừng cập nhật su hướng làm đẹp mới nhất để mang đến cho khách hàng những dịch vụ tốt nhât</p>
                    </div>
                </li>

            </ul>
            <div class="lh">
                <div style="text-align: center;"><span style="color:#0012ff;text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;"><span style="font-size:30px;"><strong>LIÊN KẾT&nbsp;VỚI CHÚNG TÔI</strong></span></span>
                </div>

                <ul>
                    <li><span style="color:#0012ff;text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;"><span style="font-size:24px;"><strong><a href="https://www.facebook.com/phongchetaorangvitalab"><img alt="Nhà sản xuất răng sứ hàng đầu" height="64" src="images/fb(2).png" style="max-width:100%" width="64" /></a></strong></span></span>
                    </li>
                    <li><img alt="Nhà sản xuất răng sứ hàng đầu" height="64" src="images/zalo(1).png" style="max-width:100%" width="64" />
                    </li>
                    <li><img alt="Nhà sản xuất răng sứ hàng đầu" height="64" src="images/skybe(1).png" style="max-width:100%" width="64" />
                    </li>
                    <li><img alt="Nhà sản xuất răng sứ hàng đầu" height="64" src="images/youtobe(1).png" style="max-width:100%" width="64" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="khungttt">
        <div class="main">
            <h2 class="tieudesp">TIN TỨC</h2>
            <span class="motatdsp">"Bản tin cập nhật liên tục"</span>
            <div class="wrap-listnews">
                <div class="control"><span id="listnews-prev"></span> <span id="listnews-next"></span>
                </div>
                <ul class="listnews">
                    @foreach($blog as $blog)
                    <a href="{{URL::to('tin-tuc/'.$blog->slug)}}" title="{{$blog->title}}">
                        <div class="hinh"><img src="{{asset('upload/blog/'.$blog->image)}}" alt="{{$blog->title}}" />
                        </div>
                        <div class="ten">
                            <h3 style="text-transform: uppercase;">{{$blog->title}}</h3>
                        </div>
                        <p class="date">{{$blog->created_at}}</p>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            var num = $(".listnews a").length;
            var xscreen = document.getElementById("content").offsetWidth;
            var chunk = 4;
            if (xscreen < 768) {
                chunk = 2;
            }
            if (xscreen < 480) {
                chunk = 2;
            }
            for (var i = 0; i < num; i += chunk) {
                $(".listnews a").slice(i, i + chunk).wrapAll("<li></li>");;
            }
            $(".listnews li").show();
            $('.listnews').bxSlider({
                mode: 'horizontal',
                auto: true,
                pager: false,
                nextSelector: '#listnews-next',
                prevSelector: '#listnews-prev',
                nextText: '<img src="images/btnleft.svg" alt="Next"/>',
                prevText: '<img src="images/btnleft.svg" alt="Prev"/>',
                speed: 1000
            });
        })
    </script>
    <style type="text/css">
        .listnews li {
            display: none
        }

        .listnews li > a {
            display: inline-block;
            position: relative;
            width: 23%;
            margin: 1%;
            float: left;
            padding: 2% 1%;
            box-sizing: border-box;
            background: #fff
        }

        .listnews li .hinh {
            height: 150px;
            overflow: hidden;
        }

        .listnews li .hinh img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .listnews li .motangan {
            margin-top: 10px
        }

        .wrap-listnews {
            position: relative;
            display: flex;
            align-items: center;
            margin: 0 auto
        }

        .wrap-listnews .control {
            position: absolute;
            width: 106%;
            z-index: 1;
            align-items: center;
            padding: 0px;
            display: flex;
            border-radius: 0px;
            margin-left: -3%
        }

        .wrap-listnews .control .wrap-listnews .control #listnews-prev {
            position: absolute;
            left: 0
        }

        .wrap-listnews .control #listnews-next img {
            max-width: 30px;
            transform: rotate(180deg);
        }

        .wrap-listnews .control #listnews-prev img {
            max-width: 30px;
        }

        .wrap-listnews .control #listnews-next {
            right: 0px;
            position: absolute
        }
    </style>
    <div class="main">
        <div class="kw_brand">
            <div class="wrap-logothuonghieu">
                <ul class="logothuonghieu">
                    <a href="logo1" title="logo1" target="_blank">
                        <img src="images/logo1.jpg" alt="logo1" />
                    </a>

                    <a href="logo2" title="logo2" target="_blank">
                        <img src="images/logo2.jpg" alt="logo2" />
                    </a>

                    <a href="logo3" title="logo3" target="_blank">
                        <img src="images/logo3.png" alt="logo3" />
                    </a>

                    <a href="logo4" title="logo4" target="_blank">
                        <img src="images/logo4.png" alt="logo4" />
                    </a>

                    <a href="logo5" title="logo5" target="_blank">
                        <img src="images/logo5.jpg" alt="logo5" />
                    </a>

                    <a href="logo6" title="logo6" target="_blank">
                        <img src="images/logo6.jpg" alt="logo6" />
                    </a>

                    <a href="logo7" title="logo7" target="_blank">
                        <img src="images/logo7.png" alt="logo7" />
                    </a>

                    <a href="logo8" title="logo8" target="_blank">
                        <img src="images/logo8.jpg" alt="logo8" />
                    </a>

                    <a href="logo9" title="logo9" target="_blank">
                        <img src="images/logo9.png" alt="logo9" />
                    </a>

                    <a href="logo10" title="logo10" target="_blank">
                        <img src="images/logo10.png" alt="logo10" />
                    </a>

                    <a href="logo11" title="logo11" target="_blank">
                        <img src="images/logo11.png" alt="logo11" />
                    </a>

                    <a href="logo12" title="logo12" target="_blank">
                        <img src="images/logo12.jpg" alt="logo12" />
                    </a>

                </ul>
            </div>
        </div>

        <script type="text/javascript">
            $(function() {
                var num = $(".logothuonghieu a").length;
                var xscreen = document.getElementById("content").offsetWidth;
                if (xscreen < 768)
                    var chunk = 4;
                else
                    var chunk = 4;
                for (var i = 0; i < num; i += chunk) {
                    $(".logothuonghieu a").slice(i, i + chunk).wrapAll("<li></li>");;
                }

                $(".logothuonghieu li").show();
                $('.logothuonghieu').bxSlider({
                    mode: 'horizontal',
                    auto: true,
                    pager: false,
                    nextSelector: '#logothuonghieu-next',
                    prevSelector: '#logothuonghieu-prev',
                    nextText: '<img src="images/bullet_next.png" alt="Next"/>',
                    prevText: '<img src="images/bullet_prev.png" alt="Prev"/>'
                });
            })
        </script>
        <style type="text/css">
            .kw_brand {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                padding: 30px 0
            }

            .logothuonghieu li {
                display: none
            }

            .logothuonghieu li > a {
                position: relative;
                width: 23%;
                display: inline-block;
                margin: 1%;
                text-align: center
            }

            .logothuonghieu li > a img {
                max-width: 100%;
                max-height: 180px
            }

            .wrap-logothuonghieu {
                width: 100%;
                font-size: 0;
                position: relative;
            }
        </style>
    </div>
    @endsection