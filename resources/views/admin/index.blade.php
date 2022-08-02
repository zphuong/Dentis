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
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">

          <div class="small-box bg-info">
            <div class="inner">
              <h3>{!!$customer!!}</h3>
              <p>Bệnh nhân đang còn bảo hành</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{URL::to('dashboard/insurance/all')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-success">
            <div class="inner">
              <h3>{!!$card->amount!!}</h3>
              <p>Thẻ bảo hành trong kho</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{URL::to('dashboard/card')}}" class="small-box-footer">Cập nhật <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{!!$old_customer!!}</h3>
              <p>Bệnh nhân hết bảo hành</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{URL::to('dashboard/insurance/old-customer')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{!!$contact_customer!!}</h3>
              <p>Khách hàng yêu cầu liên hệ</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{URL::to('dashboard/insurance/contact')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          {{-- table --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bệnh nhân và bảo hành</h3>
              <div class="card-tools">
                <form action="{{URL::to('dashboard/insurance/search')}}">
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

            <div class="card-body table-responsive p-0">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Mã bảo hành</th>
                    <th>Tên khách hàng</th>
                    <th>Điện thoại</th>
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
                    <td>{{$value->description}}</td>
                    <td>{{$value->end_date}} ( Còn {{$value->so_ngay}} ngày)</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>Mã bảo hành</th>
                  <th>Tên khách hàng</th>
                  <th>Điện thoại</th>
                  <th>Chi tiết</th>
                  <th>Bảo hành</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer clearfix">
           {{ $data->links() }}
         </div>
       </div>
       {{-- table --}}
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