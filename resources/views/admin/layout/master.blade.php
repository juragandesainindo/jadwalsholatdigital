<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords"
		content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('adminKit/css/bootstrap.min.css') }}">

	<title>@yield('title')</title>

	<link rel="website icon" type="svg" href="{{ asset('assets/img/logo2.svg') }}">

	<link href="{{ asset('adminKit/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('adminKit/css/dataTables.bootstrap5.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminKit/css/flatpickr.min.css') }}">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	@stack('css')
</head>

<body>
	<div class="wrapper">

		@include('admin.layout.sidebar')

		<div class="main">
			@yield('content')
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<strong>JAM DIGITAL</strong> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									{{ date('d F Y') }}
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<script src="{{ asset('adminKit/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('adminKit/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('adminKit/js/app.js') }}"></script>
	<script src="{{ asset('adminKit/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminKit/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('adminKit/js/flatpickr.js') }}"></script>

	<script>
		$(function() {
	$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
	$("#success-alert").slideUp(1000);
	});});
	</script>

	@stack('js')

</body>

</html>