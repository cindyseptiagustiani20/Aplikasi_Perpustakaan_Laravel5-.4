@extends('layout.master')
@section('title')
User
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Siswa</h3>
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
									<td>ID SISWA</td>
									<td>ID USER</td>
									<td>NAMA LENGKAP</td>
									<td>JENIS KELAMIN</td>
									<td>ACTION</td>
								</tr>
							</thead>
							<tbody>
								@foreach($siswa as $row)
								<tr>
									<td>{{$row->id_siswa}}</td>
									<td>{{$row->id_user}}</td>
									<td>{{$row->nama_siswa}}</td>
									<td>
										@if($row->jk == 'L')
										Laki-Laki
										@endif
										@if($row->jk == 'P')
										Perempuan
										@endif
									</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_siswa}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-info editpass" data-toggle="modal" id="{{$row->id_user}}" href='#' data-target='editpass'><i class="fa fa-edit"></i> <i class="fa fa-lock"></i></a> <a class="btn btn-danger delete" id="{{$row->id_siswa}}"><i class="fa fa-trash"></i></a>
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
							<span class="panel-note"><i class="fa fa-users"></i> Total - {{$siswa->count()}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		
	</div>

</div>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Siswa</h4>
			</div>
			<div class="modal-body">
				<form action="/siswa/create" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label>ID SISWA</label>
						<input type="text" class="form-control" value="{{autonumber('siswa', 'id_siswa', 3, 'S')}}" readonly name="id_siswa">
					</div>
					<div class="form-group">
						<label for="">ID USER</label>
						<input type="text" class="form-control" id="" value="{{autonumber('users', 'id_user', 3, 'U')}}" readonly name="id_user">
					</div>
					<div class="form-group">
						<label>Ruang</label>
						<select name="id_ruang" class="form-control">
							@foreach($ruang as $row2)
							<option value="{{$row2->id_ruang}}">{{$row2->id_ruang}} - {{$row2->nama_ruang}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input type="text" class="form-control" id="" name="nama" required>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="" name="email" required>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="" name="password" required>
					</div>
					<div class="form-group">
						<label for="">FOTO</label>
						<input type="file" class="form-control" name="avatar">
					</div>
					<div class="form-group">
						<input type="checkbox" name="cek" value="cek"> Ceklis Jika Tidak Ada
					</div>
					<div class="form-group">
						<label for="">Jenis Kelamin</label>
						<select name="jk" class="form-control">
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" class="form-control" required>
					</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
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
	function ShowPass2() {
		var x = document.getElementById('x');
		var y = document.getElementById('y');

		if (x.type === 'password' && y.type === 'password') {
			x.type = 'text';
			y.type = 'text';
		}
		else {
			x.type = 'password';
			y.type = 'password';
		}
	}
</script>
<script type="text/javascript">
	function getUpdate(id){
		var id = id;
		$.ajax({
			url: "/siswa/"+id+"/edit",
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
					url: "/siswa/"+m+"/edit",
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
				url: "/siswa/"+id+"/pass",
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
						url: "/siswa/"+m+"/pass",
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
					var id_siswa = $(this).attr("id");
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
							window.location="/siswa/"+id_siswa+"/delete";
						}
					});
				});
			});
		</script>
		@endsection