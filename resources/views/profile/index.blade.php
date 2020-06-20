@extends('layout.master')
@section('title')
	User
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					<center>
						<h1 class="panel-title">Profile Saya</h1>
						<br>
						<img src="{{$user->getAvatar()}}" alt="" width="100">
					</center>
				</div>
				<div class="panel-body">
					<table class="table table-bordered" border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td>ID USER</td>
							<td>{{$user->id_user}}</td>
						</tr>
						<tr>
							<td>EMAIL</td>
							<td>{{$user->email}}</td>
						</tr>
						<tr>
							<td>NAMA USER</td>
							<td>{{$user->nama_user}}</td>
						</tr>
						<tr>
							<td>LEVEL</td>
							<td>
								@if($user->level == '0')
								Administrator
								@endif
								@if($user->level == '1')
								Operator
								@endif
								@if($user->level == '2')
								Peminjam
								@endif
							</td>
						</tr>
					</table>
				</div>
				<div class="panel-footer" id="Table">
					<div class="row">
						<div class="col-md-6">
							<a class="btn btn-warning btn-block edit" data-toggle="modal" id="{{$user->id_user}}" href='#' data-target='edit'><i class="fa fa-edit"></i> Edit Profile</a>
						</div>
						<div class="col-md-6">
							<a class="btn btn-info btn-block editp" data-toggle="modal" id="{{$user->id_user}}" href='#' data-target='editp'><i class="fa fa-edit"></i> Edit Password</a>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-3"></div>
	</div>

</div>
<div class="modal fade" id="edit">

</div>
<div class="modal fade" id="editp">

</div>
@endsection
@section('footer')
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
<script type="text/javascript">
	function getUpdate(id){
		var id = id;
		$.ajax({
			url: "/profile/"+id+"/edit",
			type: "GET",
			data : {id: id,},
			success: function (ajaxData){
				$("#edit").html(ajaxData);
				$("#edit").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function (){
		/*$(".mapeledit").click(function (e){*/
			$("#Table").on("click",".edit",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/profile/"+m+"/edit",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
						$("#edit").html(ajaxData);
						$("#edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
<script type="text/javascript">
	function getUpdate(id){
		var id = id;
		$.ajax({
			url: "/profile/"+id+"/editp",
			type: "GET",
			data : {id: id,},
			success: function (ajaxData){
				$("#editp").html(ajaxData);
				$("#editp").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function (){
		/*$(".mapeledit").click(function (e){*/
			$("#Table").on("click",".editp",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/profile/"+m+"/editp",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
						$("#editp").html(ajaxData);
						$("#editp").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
@endsection