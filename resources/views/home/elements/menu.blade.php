     <h1>Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng</h1>
    <!--top-->
    <div class="rtop">
        <div class="main">

            <div class="left"><span style="font-size:14px;">Hotline: <a href="tel:0904294139" style="color: #fff"> 0904 294 139</a></span>
            </div>
            <div class="right">
                <div class="mxh">
                    <a href="https://www.facebook.com/phongchetaorangvitalab" title="Find Us On Facebook" class="ads"><img src="{{asset('images/17-find-us-on-facebook.png')}}" alt="Find Us On Facebook" />
                    </a>
                    <a href="#" title="Twitter Account" class="ads"><img src="{{asset('images/1-twitter-account.png')}}" alt="Twitter Account" />
                    </a>
                    <a href="#" title="Youtube Account" class="ads"><img src="{{asset('images/3-youtube-account.png')}}" alt="Youtube Account" />
                    </a>
                    <a href="#" title="Gmail" class="ads"><img src="{{asset('images/2-gmail.png')}}" alt="Gmail" />
                    </a>
                </div>
                {{-- <div class="ngonngu">
                    <span class="lang active" value="vi">VN</span>
                    <span class="lang " value="en">EN</span>
                </div> --}}

            </div>
        </div>
    </div>
    <div class="header">
        <div class="main">
            <a href="./" class="logo" title="Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng"><img src="{{asset('images/logo.jpg')}}" alt="Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng">
            </a>
        </div>

    </div>
    <div class="menu">
        <nav id="menutop">

            <div id="MobileMenu">MENU</div>
            <ul>
                <li><a class="active" href="{{URL::to('/')}}" title="Trang chủ">Trang chủ</a>
                </li>
                @foreach($menu as $menu)
                <li>
                    <a href="{{url($menu->slug)}}" title="{{$menu->title}}">{{$menu->title}}</a>
                </li>
                @endforeach
                <li><a class="" href="{{URL::to('/san-pham')}}" title="SẢN PHẨM" value="">SẢN PHẨM</a>
                   {{--  <span class="level1">Next</span>
                    <ul>
                        <li><a href="3s-imlanpt-studio" title="3S Implant Studio">3S Implant Studio</a>
                        </li>

                        <li><a href="3s-lithium-disilicate" title="3S Lithium Disilicate">3S Lithium Disilicate</a>
                        </li>

                        <li><a href="3s-digital" title="3S Digital">3S Digital</a>
                        </li>

                        <li><a href="3s-zirconium" title="3S Zirconium">3S Zirconium</a>
                        </li>

                        <li><a href="san-pham-khac" title="Sản Phẩm Khác">Sản Phẩm Khác</a>
                        </li>

                    </ul> --}}
                </li>

                <li><a class="" href="{{URL::to('/tin-tuc')}}" title="Tin tức" value="">Tin tức</a>

                </li>

                <li><a class="" href="{{URL::to('/bao-hanh')}}" title="Tra cứu bảo hành" value="">Tra cứu bảo hành</a>
                </li>
                <li><a class="" href="{{URL::to('/lien-he')}}" title="Liên hệ" value="">Liên hệ</a>
                </li>
            </ul>

        </nav>
    </div>