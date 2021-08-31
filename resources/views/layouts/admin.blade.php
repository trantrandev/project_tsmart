<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin Tsmart</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/feathericon.min.css') }}">

	{{-- <link rel="stylehseet" href="{{ asset('plugins/datatables/datatables.min.css') }}">	 --}}

	<link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">	

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
</head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="{{ url('dashboard') }}" class="logo"> <img src="{{ asset('img/logo.png') }}" width="50" height="70" alt="logo"> <span class="logoclass">Tsmart</span> </a>
				<a href="index.html" class="logo logo-small"> <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('img/profiles/avatar-02.jpg') }}">
										</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
											<p class="noti-time"><span class="notification-time">4 mins ago</span> </p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="#">
									<div class="media"> <span class="avatar avatar-sm">
										<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('img/profiles/avatar-01.jpg') }}">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">International Software
										Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
										<p class="noti-time"><span class="notification-time">6 mins ago</span> </p>
									</div>
								</div>
							</a>
						</li>
						<li class="notification-message">
							<a href="#">
								<div class="media"> <span class="avatar avatar-sm">
									<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('img/profiles/avatar-17.jpg') }}">
								</span>
								<div class="media-body">
									<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone
									XR</span></p>
									<p class="noti-time"><span class="notification-time">8 mins ago</span> </p>
								</div>
							</div>
						</a>
					</li>
					<li class="notification-message">
						<a href="#">
							<div class="media"> <span class="avatar avatar-sm">
								<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('img/profiles/avatar-13.jpg') }}">
							</span>
							<div class="media-body">
								<p class="noti-details"><span class="noti-title">Mercury Software
								Inc</span> added a new product <span class="noti-title">Apple
								MacBook Pro</span></p>
								<p class="noti-time"><span class="notification-time">12 mins ago</span> </p>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
	</div>
</li>
<li class="nav-item dropdown has-arrow">
	<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ asset('img/profiles/avatar-01.jpg') }}" width="31" alt="Soeng Souy"></span> </a>
	<div class="dropdown-menu">
		<div class="user-header">
			<div class="avatar avatar-sm"> <img src="{{ asset('img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle"> </div>
			<div class="user-text">
				<h6>Soeng Souy</h6>
				<p class="text-muted mb-0">Administrator</p>
			</div>
		</div> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="settings.html">Account Settings</a> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> </div>
	</li>
</ul>	 
</div>
<!-- END HEAD -->

<div class="sidebar" id="sidebar">
	@if (session()->has('module_active'))
	@php
	$module_active = session('module_active');
	@endphp
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="{{ Route::is('dashboard')?'active':null }}"> <a href="{{ url('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Tổng quan</span></a> </li>
				<li class="list-divider"></li>
				<li class="submenu"> <a href="#"><i class="fas fa-columns"></i> <span>Trang </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/post/list') }}">Danh sách </a></li>
						<li><a href="{{ url('admin/post/add') }}">Thêm mới </a></li>
					</ul>
				</li>
				<li class="submenu"> <a href="#"><i class="fas fa-edit"></i> <span>Bài viết </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href=""> Danh sách </a></li>
						<li><a href=""> Thêm mới </a></li>
						<li><a href=""> Danh mục </a></li>
					</ul>
				</li>
				<li class="submenu"> <a href="#"><i class="fas fa-cube"></i> <span> Sản phẩm </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="#list"> Danh sách </a></li>
						<li><a href="#add">Thêm mới </a></li>
						<li><a href="#cat"> Danh mục </a></li>
					</ul>
				</li>
				<li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Bán hàng </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="edit-staff.html"> Đơn hàng </a></li>
					</ul>
				</li>
				<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Khách hàng </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="all-customer.html"> Danh sách </a></li>
					</ul>
				</li>
				<li class="submenu"> <a href="#"><i class="fas fa-laptop"></i> <span> Thống kê </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="all-customer.html"> Danh sách </a></li>
					</ul>
				</li>
				<li class="submenu {{ Request::segment(2)=='user'?'active':null }}"> <a href="{{ url('admin/user/list') }}"><i class="fas fa-key"></i> <span> Tài khoản </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">   
						<li><a class="{{ Route::is('user')?'active':null }}" href="{{ url('admin/user') }}"> Danh sách </a></li>
						<li><a href="{{ url('admin/user/add') }}" class="{{ Route::is('user.add')?'active':null }}" href="{{ url('admin/user/add') }}"> Thêm mới </a></li>
					</ul>
				</li>
				<li> <a href="settings.html"><i class="fas fa-cog"></i> <span>Cấu hình</span></a> </li>
			</ul>
		</div>
	</div>
	@endif
</div>
{{-- END SIDEBAR --}}
<div class="page-wrapper">
	@yield('content')
</div>
{{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('js/chart.mozrris.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>