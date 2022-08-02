@extends('admin.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <a href="{{url('dashboard/product/add')}}" class="btn btn-success btn-sm">
          <i class="nav-icon far fa-plus-square"></i>
          Thêm mới
        </a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tất cả sản phẩm</li>
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
            <h3 class="card-title">Tất cả sản phẩm</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($result as $key)
                <tr>
                  <td>{{$key->product_name}}</td>
                  <td><img src="../../upload/product/{{$key->image}}" alt="" class="admin-img"></td>
                  <td><a href="{{URL::to('dashboard/product/edit/'.$key->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
                    <a href="{{URL::to('dashboard/product/delete/'.$key->id)}}" class="btn btn-danger btn-sm">Xóa</a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Edit</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer clearfix">
           {{$result->links()}} 
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