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
            <li class="breadcrumb-item active">Bệnh nhân hết bảo hành</li>
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
              <h3 class="card-title">Bệnh nhân hết bảo hành</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Mã BH</th>
                    <th>Tên bệnh nhân</th>
                    <th>Điện thoại</th>
                    <th>Sản phẩm</th>
                    <th>Chi tiết</th>
                    <th>Bảo hành</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $value)
                  <tr>
                    <td>{{$value->code}}</td>
                    <td>{{$value->name}}</td>
                    <td><a href="tel:{{$value->phone}}">{{$value->phone}}</a></td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->end_date}}  ( Hết hạn bảo hành )</td>
                    </tr>
                  </tr>
                  @endforeach 
                </tbody>
                <tfoot>
                 <tr>
                  <th>Mã BH</th>
                  <th>Tên bệnh nhân</th>
                  <th>Điện thoại</th>
                  <th>Sản phẩm</th>
                  <th>Chi tiết</th>
                  <th>Bảo hành</th>
                </tr>
              </tfoot>
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