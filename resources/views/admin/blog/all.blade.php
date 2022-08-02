@extends('admin.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <a href="{{url('dashboard/blog/add')}}" class="btn btn-success btn-sm">
          <i class="nav-icon far fa-plus-square"></i>
          Thêm mới
        </a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Quản lí bài viết</li>
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
            <h3 class="card-title">Quản lí bài viết</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tiêu đề </th>
                  <th>Hình ảnh</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key)
                <tr>
                  <td>{{$key->title}}</td>
                  <td><img src="../../upload/blog/{{$key->image}}" class="admin-img"></td>
                  <td>
                    <a href="{{URL::to('dashboard/blog/edit/'.$key->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
                    <a href="{{URL::to('dashboard/blog/delete/'.$key->id)}}" class="btn btn-danger btn-sm">Xóa</a></td>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
               <tr>
                <th>Tiêu đề </th>
                <th>Hình ảnh</th>
                <th>Edit</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
         {{$data->links()}} 
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