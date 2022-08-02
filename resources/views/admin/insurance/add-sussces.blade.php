@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12 col-lg-6">
					<!-- general form elements -->
					<div class="card card-danger">
						<div class="card-body">
							<form action="{{URL::to('dashboard/insurance/add')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="card-body">
									<div class="alert alert-warning alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo!</h5>
										Hãy đảm bảo rằng thông tin của khách hàng luôn được bảo mật
									</div>
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label for="code">Mã bảo hành</label>
												<input type="text" id="code" class="form-control" placeholder="Mã bảo hành" name="code" onchange="check_code(this)">
												@error('code')
												<span style="color:red">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-sm-10">
											<div class="form-group">
												<label for="name">Tên khách hàng</label>
												<input type="text" id="name" class="form-control" placeholder="Nhập tên khách" name="name">
												@error('name')
												<span style="color:red">{{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="phone">Số điện thoại</label>
										<input type="text" id="phone" class="form-control" placeholder="Số điện thoại" name="phone">
										@error('phone')
										<span style="color:red">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" id="email" class="form-control" placeholder="Nhập email" name="email">
										@error('email')
										<span style="color:red">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="address">Địa chỉ</label>
										<input type="address" id="address" class="form-control" placeholder="Địa chỉ khách hàng" name="address">
										@error('address')
										<span style="color:red">{{ $message }}</span>
										@enderror
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="id_product">Sản phẩm</label>
												<select class="form-control" name="id_product" name="id_product">
													@foreach($product as $product)
													<option value="{{$product->id}}">{{$product->product_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ngày kết thúc bảo hành</label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="end_date">
													<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
												@error('end_date')
												<span style="color:red">{{ $message }}</span>
												@enderror
											</div>
											
										</div>
									</div>
									<div class="form-group">
										<label for="description">Mô tả</label>
										<input type="address" id="description" class="form-control" placeholder="Số răng, vị trí, ..." name="description">
										@error('description')
										<span style="color:red">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Thêm vào danh sách bảo hành</button>
								</div>
								<!-- /.card-body -->
							</form>
						</div>
					</div>
					<!-- /.card -->

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-12 col-lg-6">
					<div class="card card-danger">
						<div class="card-body">
							<img src="data:image/png;base64, {!!$qrCode!!}" class="pb-3">
							<a href="data:image/png;base64, {!!$qrCode!!}" download="{{$name}}.png">
								<button class="btn btn-outline-primary"><i class="fa fa-download"></i> Tải hình ảnh về </button>
							</a>
							<div class="callout callout-danger">
								<h5>Đã thêm bảo hành khách hàng thành công</h5>
								<p>Tải hình ảnh mã QR để in vào thẻ bảo hành, mã QR sẽ chứa đường dẫn chứa thông tin khách hàng</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script type="text/javascript">
	function check_code(value) {
		var bao_hanh = $(value).val(); 
		$.ajax({
			type:'POST',
			url:'/dashboard/insurance/ajax',
			success:function(data) {
				$("#msg").html(data.msg);
			}
		});
	}
</script>
@endsection