@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Thêm sản phẩm</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Thêm sản phẩm</li>
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
						<form action="{{URL::to('dashboard/product/add')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="card-body">
								<div class="alert alert-warning alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo!</h5>
									Phần mô tả sản phẩm không được chèn hình lên đầu tiên
								</div>
								<div class="form-group">
									<label for="name">Tên sản phẩm</label>
									<input type="text" id="name" class="form-control" placeholder="Nhập tên sản phẩm" name="name">
								</div>
								<div class="form-group">
									<label for="summernote">Mô tả</label>
									<textarea type="text" id="summernote" class="form-control" name="description" placeholder="Mô tả nội dung về sản phẩm"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Hình ảnh</label>
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
								<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<div class="col-md-12 col-lg-6">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Tên sản phẩm</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							@foreach($result as $key)
							<tr>
								<td>{{$key->product_name}}</td>
								<td>
									<a href="{{URL::to('dashboard/product/edit/'.$key->id)}}" class="btn btn-info btn-sm">Chỉnh sửa</a>
									<a href="{{URL::to('dashboard/product/delete/'.$key->id)}}" class="btn btn-danger btn-sm">Xóa</a>
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