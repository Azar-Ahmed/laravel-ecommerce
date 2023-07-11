<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Admin Dashboard eCommerce">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="{{asset('admin_assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{asset('admin_assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

	<link href='{{asset('admin_assets/plugins/data-tables/datatables.bootstrap5.min.css')}}' rel='stylesheet'>
	<link href='{{asset('admin_assets/plugins/data-tables/responsive.datatables.min.css')}}' rel='stylesheet'>

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{asset('admin_assets/css/ekka.css')}}" rel="stylesheet" />

	<!-- FAVICON -->
	<link href="{{asset('admin_assets/img/favicon.png')}}" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		
		<!-- LEFT MAIN SIDEBAR -->
        @include('admin/includes/sidebar')


		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
            @include('admin/includes/header')

			<!-- CONTENT WRAPPER -->
            @yield('container')
            <!-- End Content Wrapper -->

			<!-- Footer -->
            @include('admin/includes/footer')

		

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	<!-- Common Javascript -->
	<script src="{{asset('admin_assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('admin_assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('admin_assets/plugins/simplebar/simplebar.min.js')}}"></script>
	<script src="{{asset('admin_assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('admin_assets/plugins/slick/slick.min.js')}}"></script>

	<!-- Chart -->
	<script src="{{asset('admin_assets/plugins/charts/Chart.min.js')}}"></script>
	<script src="{{asset('admin_assets/js/chart.js')}}"></script>

	<!-- Google map chart -->
	<script src="{{asset('admin_assets/plugins/charts/google-map-loader.js')}}"></script>
	<script src="{{asset('admin_assets/plugins/charts/google-map.js')}}"></script>

	<!-- Date Range Picker -->
	<script src="{{asset('admin_assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('admin_assets/js/date-range.js')}}"></script>

	
	<!-- Datatables -->
	<script src='{{asset('admin_assets/plugins/data-tables/jquery.datatables.min.js')}}'></script>
	<script src='{{asset('admin_assets/plugins/data-tables/datatables.bootstrap5.min.js')}}'></script>
	<script src='{{asset('admin_assets/plugins/data-tables/datatables.responsive.min.js')}}'></script>

	<!-- Option Switcher -->
	<script src="{{asset('admin_assets/plugins/options-sidebar/optionswitcher.js')}}"></script>

	<!-- Ekka Custom -->
	<script src="{{asset('admin_assets/js/ekka.js')}}"></script>
	<script>
		$(document).ready(function () {
			setTimeout(function() {
                $('.message').fadeOut('fast');
            }, 3000);
		});
	</script>
	@yield('custom_script')

</body>

</html>