<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | PerpusSMK</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
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
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content" style="width: 90%!important;">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('assets/book.png')}}" alt="Klorofil Logo" style="width: 50px; height: 50px;"></div><h3>PerpusSMK</h3>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="/postlogin" method="POST">
								{{csrf_field()}}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" placeholder="Email" name="email" required autofocus>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" placeholder="Password" name="password" required>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" onclick="ShowPass()">
										<span>Show Password</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Welcome To PerpusSMK</h1>
							<p>Silahkan Login Terlebih Dahulu</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
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
	<script>
		function ShowPass() {
			var x = document.getElementById('signin-password');
			if (x.type === "password") {
				x.type = "text";
			}
			else{
				x.type = "password";
			}
		}
	</script>
	@if(session('sukses'))
	<script type="text/javascript">
		swal('Berhasil', '{{session("sukses")}}', 'success');
	</script>
	@endif
	@if(session('gagal'))
	<script type="text/javascript">
		swal('Gagal', '{{session("gagal")}}', 'error');
	</script>
	@endif
</body>

</html>
