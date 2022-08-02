@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Chỉnh sửa tài khoản quản trị - {{$data->name}}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Chỉnh sửa tài khoản quản trị - {{$data->name}}</li>
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
					<div class="card card-primary">
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{URL::to('dashboard/user/edit/'.$data->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="card-body">
								<div class="alert alert-warning alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo!</h5>
									Tài khoản quản trị viên để quản trị website
								</div>
								<div class="form-group">
									<label for="name">Tên quản trị viên</label>
									<input type="text" value="{{$data->name}}" id="name" class="form-control" placeholder="Nhập tên quản trị viên" name="name">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" value="{{$data->email}}" id="email" class="form-control" placeholder="Email" name="email">
									@error('email')
									<span style="color:red">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="password">Mật khẩu mới</label>
									<input type="password" id="password" class="form-control" placeholder="Mật khẩu" name="password">
									@error('password')
									<span style="color:red">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="password_confirm">Xác nhận mật khẩu</label>
									<input type="password" id="password_confirm" class="form-control" placeholder="Mật khẩu" name="password_confirm">
									@error('password_confirm')
									<span style="color:red">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Cập nhật</button>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<div class="col-md-12 col-lg-6">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Quản trị viên</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data_user as $data_user)
							<tr>
								<td>{{$data_user->name}} ( <a href="mailto:{{$data_user->email}}">{{$data_user->email}}</a>)</td>
								<td>
									<a href="{{URL::to('dashboard/user/edit/'.$data_user->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
									<a href="{{URL::to('dashboard/user/delete/'.$data_user->id)}}" class="btn btn-danger btn-sm">Xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{-- <div class="card-footer clearfix">
						{{$result->links()}} 
					</div> --}}
				</div>
			</div>
			<!-- /.card -->

		</div>
		<!--/.col (left) -->
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>	
@endsection