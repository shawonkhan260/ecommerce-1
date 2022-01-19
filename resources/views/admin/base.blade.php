<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Azzara Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('admin/assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset('admin/assets/css/fonts.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/azzara.min.css')}}">
@yield('extra_css')


</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="{{Route("dashboard")}}" class="logo">
					<img src="{{asset('admin/assets/img/logoazzara.svg')}}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('admin.navbar')
			<!-- End Navbar -->
		</div>

@include('admin.sidebar')


@yield('base')



	</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Moment JS -->
<script src="{{asset('admin/assets/js/plugin/moment/moment.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('admin/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Google Maps Plugin -->
<script src="{{asset('admin/assets/js/plugin/gmaps/gmaps.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Azzara JS -->
<script src="{{asset('admin/assets/js/ready.min.js')}}"></script>
{{-- extra js --}}
@yield('extra_js')
@if (session('status'))
<script>
    swal("{{session('status')}}","","success");
</script>

@endif
</body>
</html>
