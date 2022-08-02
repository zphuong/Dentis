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
            <li class="breadcrumb-item active">Liên hệ bệnh nhân</li>
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
              <h3 class="card-title">Liên hệ bệnh nhân</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($customer as $value)
                  <tr>
                    <td><a href="tel:{{$value->phone}}">{{$value->phone}}</a></td>
                    <td>
                      @if($value->status==0)
                      <a href="{{URL::to('dashboard/insurance/updatecustomer/'.$value->id)}}" class="btn btn-info btn-sm">Chưa gọi</a>
                      @else
                      <a href="#" class="btn btn-success btn-sm">Đã gọi</a>
                      @endif
                      <a href="{{URL::to('dashboard/insurance/deletecustomer/'.$value->id)}}" class="mr-1 btn btn-danger btn-sm">Xóa</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{$customer->links()}}
          </div>
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