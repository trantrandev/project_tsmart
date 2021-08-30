<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/feathericon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="error-page">

	<div class="main-wrapper">
		<div class="error-box">
			<h1>404</h1>
			<img class="img-error img-fluid" src="{{ asset('img/error-403.png') }}" alt="Not Found">
			<h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! Không tìm thấy trang!</h3>
			<p class="h4 font-weight-normal">Trang bạn yêu cầu không tìm thấy.</p>
			<a href="{{ route('dashboard') }}" class="btn btn-primary">Trở lại</a>
		</div>
	</div>


	<script src="{{ asset('js/jquery-3.5.1.min.js') }} js/jquery-3.5.1.min.js"></script>

	<script src="{{ asset('js/popper.min.js') }} js/popper.min.js"></script>
	<script src="{{ asset('js/bootstrap.min.js') }} js/bootstrap.min.js"></script>

	<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>