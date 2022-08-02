<!DOCTYPE html>
<html lang="vi">
<head>
    {{-- $seo->tittle
    $seo->url
    $seo->image --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    @if(isset($seo))
    <title>{{$seo->title}} - Vitalab</title>
    <meta property="og:title" content="{{$seo->title}} - Vitalab" />
    <meta property="og:url" content="{{$seo->url}}" />
    <link rel="canonical" href="{{$seo->url}}" />
    <meta property="og:image" content="{{asset('/upload/'.$seo->image)}}" />
    <meta property="og:description" content="{{$seo->title}} Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng" />
    <meta property="og:site_name" content="{{$seo->title}}" />
    @else
    <title>Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng</title>
    <meta property="og:title" content="Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng" />
    <meta property="og:url" content="http://Vitalab.com/" />
    <link rel="canonical" href="http://Vitalab.com/" />
    <meta property="og:image" content="http://Vitalab.com/logo.jpg" />
    <meta property="og:description" content="Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng" />
    <meta property="og:site_name" content="Vitalab - Chuyên Tư Vấn Sản Xuất Răng Sứ Thẩm Mỹ Chính Hãng" />
    @endif
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="3 days" />


    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/chitiet.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/mobile.css')}}" />
    <script type='application/ld+json'>{ "@context": "http://www.schema.org", "@type": "product", "brand": "3S DENT JSC", "name": "Nhà sản xuất răng sứ hàng đầu", "image": "http://3sdent.com/logo.jpg", "description": "Laboractory No.1 in Ho Chi Minh, Viet Nam", "aggregateRating": { "@type": "aggregateRating", "ratingValue": "4.5", "reviewCount": "360" } } </script>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=305693893593926&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        (function(w, d, u) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p(x, y) {
                if (x == "ready") {
                    w.bindReadyQ.push(y);
                } else {
                    w.readyQ.push(x);
                }
            };
            var a = {
                ready: p,
                bind: p
            };
            w.$ = w.jQuery = function(f) {
                if (f === d || f === u) {
                    return a
                } else {
                    p(f)
                }
            }
        })(window, document)
    </script>
    <meta property="fb:app_id" content="454686591584916" />
    <meta property="fb:admins" content="100000032902914" />
    <script src="{{asset('frontend/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontend/js/jquery.pogo-slider.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontend/js/unveil.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontend/js/kingweb.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontend/js/bxslider.js')}}" type="text/javascript"></script>
</head>

<body id="content">
    @include('home.elements.menu')
    @yield('content')
    @include('home.elements.footer')
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        var s = $(".gioithieu");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top & windowpos <= 1000) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");
            }
        });
    });

    $("#MobileMenu").on("click", function() {
        $("#menutop ul").toggle()
    }), $("#menutop").on("click", "span.level1", function() {
        $(this).parent().find("ul li").toggle()
    }), $("#menutop").on("click", "span.level2", function() {
        $(this).parent().find("ul").toggle()
    }), $("#menutop li li").mouseover(function() {
        $("#menutop li").removeClass("current"), $(this).parents("#menutop li").addClass("current")
    }),
    $(".tabContent").show(), $(".tabContent").not(":first").hide(), $("ul.tabs > li:first").addClass("active").show(), $("ul.tabs > li").click(function() {
        return $("ul.tabs > li.active").removeClass("active"), $(this).addClass("active"), $(".tabContent").hide(), $($("a", this).attr("href")).fadeIn("fast"), !1
    })
</script>

<!-- END: MAIN