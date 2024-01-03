<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<link rel="canonical" href="{{ url()->current() }}" />
		<meta name="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="keywords" content="Pekan Paralympic Provinsi, Peparprov, Jawa Tengah, Pati"/>
		<meta property="bb:client_area" content="{{ url()->current() }}">
		<meta name="robots" content="index, follow, noodp">
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta property="og:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta property="og:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta property="og:site_name" content="Kartunikah" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="website" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@seven_pion" />
		<meta name="twitter:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta name="twitter:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="twitter:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta itemprop="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati">
		<meta content="NPCI Jawa Tengah" name="author">

		<!-- Title -->
		<title>Peparprov 2023 @yield('title')</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('images/simple-peparpov-2023.png')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Dark css -->
		<link href="{{ asset('assets/css/dark.css')}}" rel="stylesheet" />

		<!-- Skins css -->
		<link href="{{ asset('assets/css/skins.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ asset('assets/css/animated.css')}}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

		<!-- Morris Charts css -->
		<link href="{{ asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" />

		<!-- Data table css -->
		<link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
		
		<!-- Date Picker css -->
		<link href="{{ asset('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet" />

	</head>

	<body class="h-100vh light-mode">

		<div class="page">
			<div class="page-content">
				<div class="container text-center ">
					<img src="{{ asset('assets/images/svgs/404.svg') }}" alt="img" class="w-30 mb-6">
					<h1 class="h3  mb-3 font-weight-bold">Sorry, an error has occured, Requested Page not found!</h1>
					<p class="h5 font-weight-normal mb-7 leading-normal">You may have mistyped the address or the page may have moved.</p>
					<a class="btn btn-primary" href="{{ url('/') }}"><i class="fe fe-arrow-left-circle mr-1"></i>Back to Home</a>
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="{{ asset('assets/js/vendors/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Horizontal js-->
		<script src="{{ asset('assets/plugins/horizontal-menu/horizontal.js')}}"></script>

		<!--Moment js-->
		<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{ asset('assets/js/daterange.js')}}"></script>

		<!--Chart js -->
		<script src="{{ asset('assets/plugins/chart/chart.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/chart/chart.extension.js')}}"></script>

		<!-- ECharts js-->
		<script src="{{ asset('assets/plugins/echarts/echarts.js')}}"></script>
		<script src="{{ asset('assets/js/index2.js')}}"></script>

		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js')}}"></script>

		<!-- Datepicker js -->
		<script src="{{ asset('assets/plugins/date-picker/date-picker.js')}}"></script>
		<script src="{{ asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

		<script src="{{ asset('assets/js/formelementadvnced.js')}}"></script>
		<script src="{{ asset('assets/js/form-elements.js')}}"></script>

	</body>
</html>