@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Cập nhật sản phẩm</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
							<h3 class="card-title">Sản phẩm sẽ được đưa lên trang chủ, hãy cập nhật chỉnh chu nhé!</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{URL::to('dashboard/product/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="name">Tên sản phẩm</label>
									<input type="text" id="name" class="form-control" placeholder="Nhập tên sản phẩm" name="name" value="{{$data->product_name}}">
								</div>
								<div class="form-group">
									<label for="summernote">Mô tả</label>
									<textarea type="text" id="summernote" class="form-control" name="description" placeholder="Mô tả nội dung về sản phẩm">{{$data->description}}</textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Hình ảnh</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="exampleInputFile" name="image"  value="{{$data->image}}">
											<label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text">Upload</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
							</div>
						</div>
						<!-- /.card-body -->
					</form>
				</div>
				<!-- /.card -->

			</div>
			<!--/.col (left) -->
			<!-- right column -->
			<div class="col-md-12 col-lg-6">
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>	
@endsection