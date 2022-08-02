@extends('home.template')
@section('content')   
<!-- content -->
<div class="bground">

    <h2>LIÊN HỆ</h2>
</div>
<div class="main">
    <div class="khungpd">    
        <div class="clr10"></div>
        <div class="lcontact"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9678073887676!2d106.7086266270495!3d10.736964567874297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fa7fbe7c955%3A0x71f65bb4e35e25d7!2sVitalab%20Dental!5e0!3m2!1sen!2s!4v1656177440199!5m2!1sen!2s" width="600" height="560" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <div class="rcontact">
            <p><span style="font-size:28px;"><strong><span style="/*  */#27a993;">CÔNG TY CỔ PHẦN VITALAB</span></strong></span><br>
                <br>
                <span style="font-size:14px;"><img alt="Nhà sản xuất răng sứ hàng đầu" height="16" src="images/placeholder.png" style="max-width:100%" width="16">&nbsp; 297/33 Vĩnh Viễn, Phường 5, Quận 10, TP. Hồ Chí Minh<br>
                    <img alt="Nhà sản xuất răng sứ hàng đầu" height="16" src="images/telephone.png" style="max-width:100%" width="16">&nbsp; <a href="0904294139" style="color: #000"> 0904 294 139</a><br>
                    <img alt="Nhà sản xuất răng sứ hàng đầu" height="16" src="images/envelope.png" style="max-width:100%" width="16">&nbsp; nguyenvanhieulabo@gmail.com<br>
                    <img alt="Nhà sản xuất răng sứ hàng đầu" height="16" src="images/skype.png" style="max-width:100%" width="16">&nbsp; Vitalab</span></p>
                    <form action="{{URL::to('gui-lien-he')}}">
                        <div class="formcontact">

                            <input name="phone" type="text" id="contact_Dienthoai" class="required isnumber" placeholder="Số điện thoại">

                            <input name="email" type="text" id="contact_Email" class="required" placeholder="Email">

                            <input name="name" type="text" id="contact_Ten" class="required" placeholder="Họ và tên">

                            <input name="address" type="text" id="contact_Diachi" placeholder="Địa chỉ">

                            <textarea name="content" id="contact_Noidung" placeholder="Nội dung"></textarea>

                            <p><button id="SubmitContact" type="submit">Gửi yêu cầu tư vấn</button></p>
                            @if (session('status'))
                              <div class="thong-bao">{{session('status')}}</div>
                              <?php Session::put('status', null) ?>
                          @endif
                      </div>
                  </form>
              </div>      
              <div class="clr10"></div>
          </div>
      </div>
      <!-- content -->
      <style type="text/css">
        .lcontact{ width:47%; float:left; text-align:left} .lcontact iframe{ max-width:100%} .lcontact img{ border:0; width:auto; max-width:100%; height:auto; margin-top:10px}
        .rcontact{ width:47%; float:right} .rcontact h2{ font-size:13px; font-weight:bold; text-transform:uppercase; margin:0 0 10px 0; color:#333}
        .rcontact form p{ margin:10px 0}.rcontact form p input[type="text"] { padding: 10px; border: 1px solid #ccc; border-radius: 0; width: 90% }
        .rcontact form p textarea{ padding:5px 10px; border:1px solid #ccc; border-radius:0; width:90%; height:120px;    resize: none;}
        #SubmitContact{ padding: 10px; border: 0; border-radius: 0; background: #d8243e !important; color: #fff; min-width: 120px; text-align: center; cursor: pointer }
        .formcontact input{ padding:1.5% 1%; border:1px solid #ccc; margin-bottom: 10px; width: 98%; margin-top:3px; }
        .formcontact textarea{ padding:1.5% 1%; width: 98%; border: 1px solid #ccc; height: 100px; margin-bottom: 10px ; margin-top:3px;}
        .formcontact strong{ font-weight: normal; font-size: 12px; color: #333 }
        .footer #SubmitContact{ background: none !important }
    </style>
    @endsection