@extends('admin.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{url('dashboard/insurance/add')}}" class="btn btn-success btn-sm">
            <i class="nav-icon far fa-plus-square"></i>
            Thêm mới
          </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bệnh nhân và bảo hành</li>
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
              <h3 class="card-title">Bệnh nhân và bảo hành</h3>
              <div class="card-tools">
                <form action="{{url('dashboard/insurance/search')}}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="code" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-bordered table-hover">
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
                  @foreach($data as $value)
                  <tr>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->name }}</td>
                    <td><a href="tel:{{$value->phone}}">{{$value->phone}}</a></td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->end_date}} ( Còn {{$value->so_ngay}} ngày)</td>
                    <td>
                      {{-- <a href="{{ route('insurance.edit.get', ['id' => $value->id]) }}" class="btn btn-info btn-sm"> --}}
                        <a href="{{url('dashboard/insurance/qr/'.$value->id)}}" class="btn btn-warning btn-sm">
                          <i class="fa-solid fa-qrcode"></i>
                        </a>
                        <a href="{{url('dashboard/insurance/edit/'.$value->id)}}" class="btn btn-info btn-sm">
                          Chỉnh sửa
                        </a>
                        <a href="{{url('dashboard/insurance/delete/'.$value->id)}}" class="btn btn-danger btn-sm" on>Xóa</a></td>
                        {{-- lb --}}
                        {{-- lb --}}
                      </tr>
                      @endforeach 
                    </tbody>
                    <tfoot>
                     <tr>
                      <th>Mã bảo hành</th>
                      <th>Tên bệnh nhân</th>
                      <th>Điện thoại</th>
                      <th>Sản phẩm</th>
                      <th>Chi tiết</th>
                      <th>Bảo hành</th>
                      <th>Edit</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer clearfix">
                {{$data->links()}}
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