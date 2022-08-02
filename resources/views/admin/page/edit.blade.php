@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Sửa trang - {{$data->title}}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Sửa trang</li>
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
				<div class="col-md-12 col-lg-8">
					<!-- general form elements -->
					<div class="card card-primary">
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{URL::to('dashboard/page/edit/'.$data->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="card-body">
								<div class="alert alert-warning alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo!</h5>
									Trang sẽ xuất hiện ở menu trang chủ
								</div>
								<div class="form-group">
									<label for="name">Tên trang</label>
									<input type="text" id="name" class="form-control" value="{{$data->title}}" name="name">
								</div>
								<div class="form-group">
									<label for="summernote">Nội dung</label>
									<textarea type="text" id="summernote" class="form-control" name="description" placeholder="Nội dung bài viết">{{$data->description}}</textarea>
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
								<button type="submit" class="btn btn-primary">Cập nhật</button>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
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