<!doctype html>
<html lang="en">

<head>
	<title>@yield('title') | PERPUSSMK - Aplikasi Perpustakaan SMK</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <link href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/sweetalert-master/src/swetalert.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="padding: 20px!important; width: 260px!important;">
				<center>
					<a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Klorofil Logo" class="img-responsive logo" width="150"></a>
				</center>
			</div>
			<div class="container-fluid">	
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" style="margin-bottom: 0px!important;">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 100%!important;"><img src="{{auth()->user()->getAvatar()}}" class="img-circle" alt="Avatar"> <span>{{auth()->user()->nama_user}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu" style="margin-top: 10px!important;">
								<li><a href="/profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								@if(auth()->user()->level == '0')
								<li><a href="/logout2"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								@endif
								@if(auth()->user()->level == '1')
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								@endif
								@if(auth()->user()->level == '2')
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								@endif
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar" style="padding-top: 88px!important;">
			<div class="sidebar-scroll">
				<nav>
					@include('layout.include.sidemenu')
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				@yield('content')
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
	<script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js')}}"></script>
    @yield('footer')
</body>

</html>
