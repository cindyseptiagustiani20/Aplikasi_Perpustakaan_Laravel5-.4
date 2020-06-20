@extends('layout.master')
@section('title')
	User
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data User</h3>
			<div class="right">
				<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Tambah</a>
			</div>
		</div>
		
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-12">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $row)
								<tr>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_user}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-info editpass" data-toggle="modal" id="{{$row->id_user}}" href='#' data-target='editpass'><i class="fa fa-edit"></i> <i class="fa fa-lock"></i></a> <a class="btn btn-danger delete" id="{{$row->id_user}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data User</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-users"></i> Total - {{$user->count()}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		
	</div>

</div>

<div class="modal fade" id="edit">

</div>
<div class="modal fade" id="editpass">

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
			url: "/user/"+id+"/edit",
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
			$("#dataTable").on("click",".edit",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/user/"+m+"/edit",
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
			url: "/user/"+id+"/editpass",
			type: "GET",
			data : {id: id,},
			success: function (ajaxData){
				$("#editpass").html(ajaxData);
				$("#editpass").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function (){
		/*$(".mapeledit").click(function (e){*/
			$("#dataTable").on("click",".editpass",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/user/"+m+"/editpass",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
						$("#editpass").html(ajaxData);
						$("#editpass").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#dataTable").on("click",".delete", function(){
				var id_user = $(this).attr("id");
				swal({
					title: "Yakin",
					text: "Akan Di Hapus??",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete)=>{
					console.log(willDelete);
					if (willDelete) {
						window.location="/user/"+id_user+"/delete";
					}
				});
			});
		});
	</script>
	@endsection



if ($request->hasFile('avatar')) {
    		$request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

    		$user->avatar = $request->file('avatar')->getClientOriginalName();
    	}
    	else {
    		$user->avatar = '';
    	}