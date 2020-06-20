@extends('layout.master')
@section('title')
	Peminjaman
@endsection
@section('content')
@if(auth()->user()->level == '0' || auth()->user()->level == '1')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Peminjaman</h3>
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
									<th>ID PEMINJAMAN</th>
									<th>TANGGAL PINJAM</th>
									<th>TANGGAL KEMBALI</th>
									<th>PEMINJAM</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($peminjaman as $row)
								<tr>
									<td>{{$row->id_peminjaman}}</td>
									<td>{{$row->tgl_pinjam}}</td>
									<td>{{$row->jatuh_tempo}}</td>
									<td>{{$row->user->id_user}} - {{$row->user->nama_user}}</td>
									<td>
										<a href="/peminjaman/{{$row->id_peminjaman}}/detail_pinjam" class="btn btn-success">Detail Pinjam</a> <a href="/peminjaman/{{$row->id_peminjaman}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Peminjaman</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-inbox"></i> Total - {{$peminjaman->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Peminjaman</h4>
			</div>
			<div class="modal-body">
				<form action="/peminjaman/create" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID PEMINJAMAN</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('peminjaman', 'id_peminjaman', 3, 'P')}}" readonly name="id_peminjaman">
					</div>
					<div class="form-group">
						<label for="">TANGGAL PINJAM</label>
						<input type="date" class="form-control" name="tgl_pinjam" id="tanggal_pinjam" autofocus required onchange="tanggal()">
					</div>
					<div class="form-group">
						<label for="">TANGGAL KEMBALI</label>
						<input type="text" class="form-control" name="jatuh_tempo" id="tanggal_kembali" required readonly>
					</div>
					<div class="form-group">
						<label for="">ID USER</label>
						<select name="id_user" id="" class="form-control">
							@foreach($user as $row2)
							<option value="{{$row2->id_user}}">{{$row2->id_user}} - {{$row2->nama_user}}</option>
							@endforeach
						</select>
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
@endif
@if(auth()->user()->level == '2')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Peminjaman Anda</h3>
			<div class="right">
				<i class="fa fa-user"></i> <label>{{auth()->user()->id_user}} - {{auth()->user()->nama_user}}</label>
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
									<th>ID PEMINJAMAN</th>
									<th>TANGGAL PINJAM</th>
									<th>TANGGAL KEMBALI</th>
									<th>PEMINJAMAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($peminjaman as $row)
								<tr>
									<td>{{$row->id_peminjaman}}</td>
									<td>{{$row->tgl_pinjam}}</td>
									<td>{{$row->tgl_kembali}}</td>
									<td>{{$row->user->id_user}} - {{$row->user->nama_user}}</td>
									<td>
										<a href="/peminjaman/{{$row->id_peminjaman}}/detail_pinjam" class="btn btn-success">Detail Pinjam</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Peminjaman</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-inbox"></i> Total - {{$peminjaman->count()}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		
	</div>

</div>
@endif
@endsection
@section('footer')
@if(session('sukses'))
<script>
	swal('Berhasil', '{{session('sukses')}}', 'success');
</script>
@endif
@if(session('gagal'))
<script>
	swal('Gagal', '{{session('gagal')}}', 'error');
</script>
@endif
<script type="text/javascript">
	function getUpdate(id){
		var id = id;
		$.ajax({
			url: "/peminjaman/"+id+"/edit",
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
					url: "/peminjaman/"+m+"/edit",
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
		$(document).ready(function(){
			$("#dataTable").on("click",".delete", function(){
				var id_peminjaman = $(this).attr("id");
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
						window.location="/peminjaman/"+id_peminjaman+"/delete";
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
//tanggal kembali otomatis
function tanggal() {
	var x = document.getElementById("tanggal_pinjam").value;
	var lama = 3;
	var hari = new Date(new Date(x).getTime() + (lama*24*60*60*1000));
	var hari2 = new Date(hari).getFullYear() + "/" + (new Date(hari).getMonth() + 1) + "/"+new Date(hari).getDate();
	document.getElementById("tanggal_kembali").value = hari2;
}
</script>
@endsection