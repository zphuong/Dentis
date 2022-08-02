function golink(t, n) {
    var a = window.location.href;
    "" == n && (n = void 0), -1 == a.indexOf("?page=dta_sanpham&do=search") && (a = "?page=dta_sanpham&do=search"), a = updateurl(a, t, n), window.location.href = a
}

function updateurl(t, n, a) {
    var i = new RegExp("([?&])" + n + "=.*?(&|#|$)", "i");
    if (void 0 === a) return t.match(i) ? t = (t = (t = t.replace(i, "$1$2")).replace("&&", "&")).slice(0, t.lastIndexOf("&")) : t;
    if (t.match(i)) return t.replace(i, "$1" + n + "=" + a + "$2");
    var e = "";
    return -1 !== t.indexOf("#") && (e = t.replace(/.*#/, "#"), t = t.replace(/#.*/, "")), t + (-1 !== t.indexOf("?") ? "&" : "?") + n + "=" + a + e
}

function updateads(t) {
    var n = "pid=" + t + "&action=updateads";
    $.ajax({
        type: "POST",
        url: "action.php",
        data: n,
        success: function(t) {}
    })
}

function kiemtramail(t) {
    return reemail = /^\w+(\.\w+)*@\w+(\.\w+){1,3}$/, !!reemail.test(t)
}

function isEmail(t) {
    return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(t)
}

function isPhone(t) {
    return /^([0-9]{8,13})+$/.test(t)
}

function checkinput(t, n) {
    var a = $("#" + t).val();
    return "" == a ? ($("#" + t).addClass("noempty"), 1) : ("Phone" != n || isPhone(a)) && ("Email" != n || isEmail(a)) ? 0 : ($("#" + t).addClass("noempty"), 1)
}

function checkpass(t, n) {
    return t.length < 6 ? ($("#txtPass").addClass("noempty"), 1) : n != t ? ($("#txtRePass").addClass("noempty"), 1) : 0
}
$(function() {
    $("span.lang").on("click", function() {
        var t = "lang=" + $(this).attr("value") + "&action=lang";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: t,
            context: this,
            success: function(t) {
                window.location.reload(0)
            }
        })
    }), $(".boxsearch").on("click", ".btnSearch", function() {
        var t = "find",
            n = $(this).parents(".boxsearch").find("input[name='cboDanhmuc']").attr("val"),
            a = $(this).parents(".boxsearch").find("input[name='cboThuonghieu']").attr("val"),
            i = $(this).parents(".boxsearch").find("input[name='cboKhoanggia']").attr("val"),
            e = ($(this).parents(".boxsearch").find("input[name='cboKichthuoc']").attr("val"), $(this).parents(".boxsearch").find("input[name='cboMausac']").attr("val"), $(this).parents(".boxsearch").find("input[name='txtKeyword']").val()),
            o = $(this).parents(".boxsearch").find("input[name='cboTinhthanh']").attr("val"),
            c = $(this).parents(".boxsearch").find("input[name='cboBedroom']").attr("val"),
            s = $(this).parents(".boxsearch").find("input[name='cboBathroom']").attr("val"),
            l = "";
        n && 0 != n && (t = t + "&danhmuc=" + n, l = l + " and (Listcat like '%" + n + "%')"), o && 0 != o && (t = t + "&location=" + o, l = l + " and TinhthanhId=" + o), c && 0 != c && (t = t + "&bedroom=" + c, l = l + " and Text1=" + c), s && 0 != s && (t = t + "&bathroom=" + s, l = l + " and Text2=" + s), a && 0 != a && (t = t + "&thuonghieu=" + a, l = l + " and ThuonghieuId=" + a), i && 0 != i && (t = t + "&khoanggia=" + i, l = l + " and KhoanggiaId=" + i), "" != e && (t = t + "&keyword=" + e);
        var r = "link=" + t + "&request=" + l + "&keyword=" + e + "&action=urlsearch";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: r,
            context: this,
            success: function(t) {
                window.location.href = t
            }
        })
    })
}), $(".boxcall span").on("click", function() {
    $(".boxcall").hide()
}), $("#content").on("click", ".openform", function() {
    $.ajax({
        type: "POST",
        url: "action.php",
        data: "id=0&action=loadpopup",
        context: this,
        success: function(t) {
            $(".popup").find(".frame").html(t), $(".popup").show()
        }
    }), $(".popup").show()
}), $("#content").on("click", ".contactus .submit", function() {
    var t = $(this).parents(".contactus"),
        n = t.find("input[name='txtTen']").val(),
        a = t.find("input[name='txtDienthoai']").val(),
        i = t.find("input[name='txtEmail']").val(),
        e = t.find("textarea[name='txtMessage']").val(),
        o = t.attr("type"),
        c = $(".urlmyform").val(),
        s = 0;
    if ("Message" != o || 0 != n.length && 0 != a.length && 0 != i.length || (s = 1), "Phone Number" == o && 0 == a.length && (s = 1), "Email" == o && 0 == i.length && (s = 1), 0 == s) {
        var l = "name=" + n + "&phone=" + a + "&email=" + i + "&noidung=" + e + "&type=" + o + "&url=" + c + "&action=contactus";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: l,
            context: this,
            success: function(t) {
                "Error" != t ? (alert("Successful!"), $(".contactus").each(function() {
                    $(this).find("input").val(""), $(this).find("textarea").val("")
                }), "Popup" == o && $(".popup").hide()) : (alert("Error"), window.location.href = "./")
            }
        })
    } else alert("Please fill complete information")
}), $("#content").on("click", ".popup em", function() {
    $(".popup").hide()
}), $(".iconsearch").on("click", function() {
    $("ul.boxsearch").toggle()
}), $("#MobileMenu").on("click", function() {
    $("#menutop ul").toggle()
}), $("#menutop").on("click", "span.level1", function() {
    $(this).parent().find("ul li").toggle()
}), $("#menutop").on("click", "span.level2", function() {
    $(this).parent().find("ul").toggle()
}), $("#menutop li li").mouseover(function() {
    $("#menutop li").removeClass("current"), $(this).parents("#menutop li").addClass("current")
}), $(".cboselect").each(function() {
    var t = $(this).find("ul li[value=0]").text();
    $(this).find("input").attr({
        placeholder: t,
        readonly: "readonly"
    })
}), $(".cboselect").on("click", "input", function(t) {
    $(".cboselect ul.selected").slideUp("fast");
    var n = $("input[name='cboDanhmuc']").attr("val");
    if ("cboThuonghieu" == $(this).attr("name") && 3 == n) return !1;
    $(this).parents("li").find("ul").addClass("selected").slideToggle("fast"), t.stopPropagation()
}), $(".cboselect").on("click", "li", function() {
    var t = $(this).attr("value"),
        n = $(this).text();
    $(this).parents("li").find("input").attr("val", t).val(n), $(this).parents(".cboselect").find("ul").slideUp("fast")
}), $(document).click(function() {
    $(".cboselect ul.selected").slideUp("fast")
}), $("#slider").pogoSlider({
    autoplay: !0,
    autoplayTimeout: 5e3,
    displayProgess: !0,
    preserveTargetSize: !0,
    targetHeight: 500,
    responsive: !0
}).data("plugin_pogoSlider"), $("img.lazy").unveil(100), $(".fb-like").show(), $(".timkiem").on("click", "span", function() {
    var t = $(this).parents(".timkiem").find("input").val();
    if ("" != t) {
        var n = "find&keyword=" + (t = t.split(" ").join("+"));
        window.location.href = n
    }
}), $(".addtocart").on("click", "span", function() {
    var t = $(this).attr("proid"),
        n = $(this).attr("priceid"),
        a = $(this).text();
    if (0 != t && "" != t && "THÃŠM VÃ€O GIá»Ž HÃ€NG" == a) {
        var i = "proid=" + t + "&priceid=" + n + "&action=addtocart";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: i,
            context: this,
            success: function(t) {
                $(this).text("ÄÃƒ CHá»ŒN MUA").addClass("current"), $(this).parents(".addtocart").find("a").show()
            }
        })
    }
}), $(".cboTinhthanh").on("change", function() {
    var t = $(this).val();
    if (0 != t) {
        var n = "id=" + t + "&action=searchquanhuyen";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: n,
            context: this,
            success: function(t) {
                $(".cboQuanhuyen").html(t)
            }
        })
    } else $(".cboQuanhuyen").html('<option value="0">Chá»n quáº­n huyá»‡n</option>'), $(".cboPhuongxa").html('<option value="0">Chá»n phÆ°á»ng xÃ£</option>')
}), $(".cboQuanhuyen").on("change", function() {
    var t = $(this).val();
    if (0 != t) {
        var n = "id=" + t + "&action=searchphuongxa";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: n,
            context: this,
            success: function(t) {
                $(".cboPhuongxa").html(t)
            }
        })
    } else $(".cboPhuongxa").html('<option value="0">Chá»n phÆ°á»ng xÃ£</option>')
}), $(".cboPhuongxa").on("change", function() {
    var t = $(this).val();
    if (0 != t) {
        var n = "code=" + t + "&action=phiship";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: n,
            context: this,
            success: function(t) {
                var n = $.parseJSON(t);
                $(".reviewcart li.ship .thanhtien").text(n.ship), $(".reviewcart li.last .thanhtien").text(n.tongtien), $("input[name='txtTongtien']").val(n.sotongtien)
            }
        })
    }
}), $(".listcart").on("keyup change", "input[name='txtSoluong']", function() {
    var t = $(this).val(),
        n = $(this).parents("li.item").attr("proid");
    $(this).parents("li.item").attr("priceid");
    if (0 != n && "" != n) {
        var a = "proid=" + n + "&soluong=" + t + "&action=updatecart";
        $.ajax({
            type: "POST",
            url: "action.php",
            data: a,
            context: this,
            success: function(t) {
                var n = $.parseJSON(t);
                $(this).parents("li.item").find(".thanhtien").text(n.thanhtien), $(this).parents(".listcart").find("li.last .thanhtien").text(n.tongtien)
            }
        })
    }
}), $(".listcart").on("click", "span.delete", function() {
    var t = "proid=" + $(this).parents("li.item").attr("proid") + "&priceid=" + $(this).parents("li.item").attr("priceid") + "&action=deleteitemcart";
    $.ajax({
        type: "POST",
        url: "action.php",
        data: t,
        context: this,
        success: function(t) {
            $(this).parents("li.item").hide(), $(this).parents(".listcart").find("li.last .thanhtien").text(t)
        }
    })
}), $(function() {
    $("#boxsp li").each(function() {
        $(this).find(".img img").show()
    }), $(".rowfilter").on("click", "ul.selectbox li", function() {
        var t = $(this).attr("value");
        golink($(this).parents(".rowfilter").attr("data"), t)
    }), $(".rowfilter").each(function() {
        var t = $(this).attr("value");
        if (0 != t && "" != t && null != t) {
            var n = "id=" + t + "&action=findname";
            $.ajax({
                type: "POST",
                url: "action.php",
                data: n,
                context: this,
                success: function(t) {
                    $(this).find("p").text(t)
                }
            })
        }
    }), $("input").focusin(function() {
        input = $(this), input.data("place-holder-text", input.attr("placeholder")), input.attr("placeholder", "")
    }), $("input").focusout(function() {
        input = $(this), input.attr("placeholder", input.data("place-holder-text"))
    }), $("img.onerror").attr("onerror", "this.src='images/noimg.png'"), 0 == $("#loadmore").attr("val") && $("#loadmore").hide()
}), $(function() {
    $("ul.selectbox").on("click", function() {
        $("ul.selectbox li").hide(), $(this).find("li").slideToggle(50, "linear")
    }), $(document).mouseup(function(t) {
        var n = $("ul.selectbox");
        n.is(t.target) || 0 !== n.has(t.target).length || n.find("li").hide()
    }), $(".selectbox").on("click", "li", function() {
        var t = $(this).parent().parent(),
            n = $(this).attr("value");
        t.find("input").val(n);
        var a = $(this).text();
        "" != n ? t.find("p").text(a) : t.find("p").text("Click Ä‘á»ƒ chá»n!")
    })
}), $(function() {
    $(".isnumber").on("keyup change", function(t) {
        t.which >= 37 && t.which <= 40 || $(this).val(function(t, n) {
            return n.replace(/\D/g, "")
        })
    }), $("input.required").on("click", function() {
        $(this).removeClass("noempty")
    }), $(".tabContent").show(), $(".tabContent").not(":first").hide(), $("ul.tabs > li:first").addClass("active").show(), $("ul.tabs > li").click(function() {
        return $("ul.tabs > li.active").removeClass("active"), $(this).addClass("active"), $(".tabContent").hide(), $($("a", this).attr("href")).fadeIn("fast"), !1
    })
}), $(function() {
    var t = $("#content");
    $("#nav_up").fadeIn("slow"), $("#nav_down").fadeIn("slow"), $(window).bind("scrollstart", function() {
        $("#nav_up,#nav_down").stop().animate({
            opacity: "0.2"
        })
    }), $(window).bind("scrollstop", function() {
        $("#nav_up,#nav_down").stop().animate({
            opacity: "1"
        })
    }), $("#nav_down").click(function(n) {
        $("html, body").animate({
            scrollTop: t.height()
        }, 800)
    }), $("#nav_up").click(function(t) {
        $("html, body").animate({
            scrollTop: "0px"
        }, 800)
    })
});