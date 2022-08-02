@extends('admin.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tìm kiếm bệnh nhân</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Kết quả tìm kiếm bệnh nhân</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body row pb-0">
              <div class="col-6">

              </div>
              <div class="col-6">
                <form action="{{URL::to('dashboard/insurance/search')}}">
                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Nhập mã bảo hành" name="code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Mã bảo hành</th>
                    <th>Tên bệnh nhân</th>
                    <th>Điện thoại</th>
                    <th>Sản phẩm</th>
                    <th>Chi tiết</th>
                    <th>Bảo hành</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($value as $value)
                  <tr>
                    <td>{{$value->code}}</td>
                    <td>{{$value->name}}</td>
                    <td><a href="tel:{{$value->phone}}">{{$value->phone}}</a></td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->end_date}} ( Còn {{$value->so_ngay}} ngày)</td>
                    <td><a href="{{URL::to('dashboard/insurance/edit/'.$value->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
                      <a href="{{URL::to('dashboard/insurance/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr>
                  </tr>
                  @endforeach 
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection