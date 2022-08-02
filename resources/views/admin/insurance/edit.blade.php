@extends('admin.template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chỉnh sửa bệnh nhân: {{$dataUser->name}} - {{$dataUser->code}} </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa bệnh nhân</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 col-lg-6">
          <!-- general form elements -->
          <div class="card card-danger">
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{URL::to('dashboard/insurance/edit/'.$dataUser->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="code">Mã bảo hành</label>
                      <input type="text" id="code" class="form-control" placeholder="Mã bảo hành" name="code" value="{{$dataUser->code}}">
                      @error('code')
                      <span style="color:red">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label for="name">Tên bệnh nhân</label>
                      <input type="text" id="name" class="form-control" placeholder="Nhập tên khách" name="name" value="{{$dataUser->name}}">
                      @error('name')
                      <span style="color:red">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" id="phone" class="form-control" placeholder="Số điện thoại" name="phone" value="{{$dataUser->phone}}">
                  @error('phone')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Nhập email" name="email" value="{{$dataUser->email}}">
                  @error('email')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="address">Địa chỉ</label>
                  <input type="address" id="address" class="form-control" placeholder="Địa chỉ bệnh nhân" name="address" value="{{$dataUser->address}}">
                  @error('address')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="id_product">Sản phẩm</label>
                      <select class="form-control" name="id_product" name="id_product" value="{{$dataUser->id_product}}">
                        @foreach($product as $product)
                        <option value="{{$product->id}}" @if($product->id == $dataUser->id_product) selected @endif>{{$product->product_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ngày kết thúc bảo hành</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="end_date"value="{{$dataUser->end_date}}">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      @error('end_date')
                      <span style="color:red">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="address" id="description" class="form-control" placeholder="Số răng, vị trí, ..." name="description" value="{{$dataUser->description}}">
                  @error('description')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
              <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12 col-lg-6">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Mã bảo hành</th>
                <th>Tên bệnh nhân</th>
                <th>Điện thoại</th>
                <th>Bảo hành</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{$value->code}}</td>
                <td>{{$value->name}}</td>
                <td><a href="tel:{{$value->phone}}">{{$value->phone}}</a></td>
                <td>{{$value->end_date}} ( Còn {{$value->so_ngay}} ngày)</td>
              </tr>
              @endforeach 
            </tbody>
          </table>
          <div class="card-footer clearfix">
            {{$data->links()}}
          </div>
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script type="text/javascript">
  function check_code(value) {
    var bao_hanh = $(value).val(); 
    $.ajax({
     type:'POST',
     url:'/dashboard/insurance/ajax',
     success:function(data) {
      $("#msg").html(data.msg);
    }
  });
  }
</script>
@endsection