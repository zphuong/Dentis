@extends('admin.template')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Cập nhật số lượng thẻ</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Cập nhật số lượng thẻ</li>
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
					<div class="small-box bg-success">
						<div class="inner">
							<h3>{!!$amount->amount!!}</h3>
							<p>Thẻ bảo hành trong kho</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">Cập nhật <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Thẻ bảo hành mới sẽ được cộng dồn với thẻ cũ vì vậy chỉ cần nhập số lượng thẻ mới</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{URL::to('dashboard/card/update')}}">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Số lượng</label>
									<input type="number" id="name" class="form-control" placeholder="Nhập số lượng" name="amount">
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Cập nhật</button>
								</div>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">
				</div>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>	
@endsection