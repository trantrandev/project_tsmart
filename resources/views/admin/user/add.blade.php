@extends('layouts.admin')
@section('content')
<div class="content container-fluid">
	<form action="{{ url('admin/user/store') }}" enctype='multipart/form-data' method="POST">
		@csrf
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5 clearfix">
						<h3 class="page-title float-left">Thêm tài khoản</h3><button type="submit" name="btn_add" value="add" class="btn btn-primary buttonedit float-right">Thêm vào</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">			
				<div class="row formtype">
					<div class="col-md-6">
						<div class="form-group">
							<label>Họ tên<span class="text-danger"> (*)</span></label>
							<input class="form-control" name="name" type="text" value="{{ old('name') }}">
							@error('name')
							<span class="text-danger mt-1 d-block">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Email<span class="text-danger"> (*)</span></label>
							<input class="form-control" name="email" type="email" value="{{ old('email') }}"> 
							@error('email')
							<span class="text-danger mt-1 d-block">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Mật khẩu <span class="text-danger">(*)</span></label>
							<input class="form-control" name="password" type="password" value=""> 
							@error('password')
							<span class="text-danger mt-1 d-block">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Xác nhận mật khẩu <span class="text-danger">(*)</span></label>
							<input class="form-control" name="confirm" type="password" value=""> 
							@error('confirm')
							<span class="text-danger mt-1 d-block">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Số điên thoại</label>
							<input class="form-control" name="phone" type="number" value="{{ old('phone') }}">
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Giới tính</label>
							<select class="form-control" id="gender" name="gender">
								<option {{ old('gender')=='male'?'selected':null }} value="male">Nam</option>
								<option {{ old('gender')=='female'?'selected':null }} value="female">Nữ</option>
							</select>
						</div>
						<div class="form-group">
							<label>Quyền</label>
							<select class="form-control" id="role" name="role">
								<option>Chọn</option>
								<option>Admin</option>
								<option>Manager</option>
								<option>Staff</option>
								<option>Room Cleaners</option>
								<option>Servants</option>
								<option>Accountant</option>
								<option>Receiptionalist</option>
							</select>
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<textarea class="form-control" rows="2" id="address" name="address"></textarea>
						</div>

						<div class="form-group">
							<label>Hình đại diện</label>
							<div class="custom-file mb-3">
								<input type="file" class="custom-file-input" accept="image/*" id="up-avatar" name="avatar">
								<label class="custom-file-label" for="avatar">Chọn file</label>
							@error('avatar')
							<span class="text-danger mt-1 d-block">{{ $message }}</span>
							@enderror
							</div>
							<img src="{{ asset('img/150.png') }}" style="max-width: 150px;" id="up-img" alt="">
						</div>
						<script>
							$(function() {
								$('#up-avatar').change(function(e) { 
									var name_file = this.files[0].name;
									var x = URL.createObjectURL(e.target.files[0]);  
									$('#up-img').attr("src", x);
									$('.custom-file-label').text(name_file);
								});
							});
						</script>
					</div>
				</div>
			</div>
		</div>			
	</form>
</div>
@endsection
