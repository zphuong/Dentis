@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Blog - Tin tức</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Thêm bài viết</li>
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
						<div class="card-header">
							<h3 class="card-title">Là nơi mà website tương tác với khách hàng của mình</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{URL::to('dashboard/blog/add')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="name">Tiêu đề bài viết</label>
									<input type="text" id="name" class="form-control" placeholder="Nhập tiêu đề bài viết" name="name">
								</div>
								<div class="form-group">
									<label for="summernote">Nội dung bài viết</label>
									<textarea type="text" id="summernote" class="form-control" name="description" placeholder="Nội dung bài viết"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Hình ảnh đại diện</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
											<label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text">Upload</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Thêm bài viết</button>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-12 col-lg-6">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Bài viết</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							@foreach($result as $key)
							<tr>
								<td>{{$key->title}}</td>
								<td>
									<a href="{{URL::to('dashboard/blog/edit/'.$key->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
									<a href="{{URL::to('dashboard/blog/delete/'.$key->id)}}" class="btn btn-danger btn-sm">Xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="card-footer clearfix">
						{{$result->links()}} 
					</div>
				</div>
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</div>
</section>
<!-- /.content -->
</div>	
@endsection