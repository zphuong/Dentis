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
							<img src="data:image/png;base64, {!!$qrCode!!}" class="pb-3">
							<a href="data:image/png;base64, {!!$qrCode!!}" download="{{$name}}.png">
								<button class="btn btn-outline-primary"><i class="fa fa-download"></i> Tải hình ảnh về </button>
							</a>
							<div class="callout callout-danger">
								<h5>Cập nhật bảo hành khách hàng thành công</h5>
								<p>Tải hình ảnh mã QR để in vào thẻ bảo hành nếu bạn thay đổi mã bảo hành</p>
							</div>
						</div>
					</div>
					<!-- /.card -->

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-12 col-lg-6">
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