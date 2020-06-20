@extends('layout.master')
@section('title')
	Pengembalian
@endsection
@section('content')
@if(auth()->user()->level == '0' || auth()->user()->level == '1')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Pengembalian</h3>
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
									<th>BUKU</th>
									<th>PEMINJAM</th>
									<th>TANGGAL KEMBALI</th>
									<th>DENDA</th>
									<th>STATUS PEMINJAMAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($detail as $row)
								<tr>
									<td>{{$row->id_peminjaman}} - {{$row->id_detail}}</td>
									<td>{{$row->buku->id_buku}} - {{$row->buku->nama_buku}}</td>
									<td>{{$row->peminjaman->user->id_user}} - {{$row->peminjaman->user->nama_user}}</td>
									<td>{{$row->tgl_kembali}}</td>
									<td>Rp. {{number_format($row->denda, 2, ',', '.')}}</td>
									<td>
										@if($row->status_pinjam == '0')
										<label class="label label-info">Sedang Dipinjam</label>
										@endif
										@if($row->status_pinjam == '1')
										<label class="label label-success">Sudah Dikembalikan</label>
										@endif
									</td>
									<td>
										<a class="btn btn-info edit" data-toggle="modal" id="{{$row->id_detail}}" href='#' data-target='edit'>Rubah Status</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Pengembalian</span></div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6 text-right">
									<span class="panel-note"><i class="fa fa-inbox"></i> Total Sedang Di Pinjam - {{$detail->where('status_pinjam', '0')->count()}}</span>
								</div>
								<div class="col-md-6 text-right">
									<span class="panel-note"><i class="fa fa-inbox"></i> Total Sudah Dikembalikan - {{$detail->where('status_pinjam', '1')->count()}}</span>
								</div>
							</div>
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
@endif
@if(auth()->user()->level == '2')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Pengembalian Anda</h3>
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
									<th>BUKU</th>
									<th>NAMA PEMINJAM</th>
									<th>TANGGAL KEMBALI</th>
									<th>DENDA</th>
									<th>STATUS PEMINJAMAN</th>
								</tr>
							</thead>
							<tbody>
								@foreach($detail_pinjam as $row)
								@if($row->peminjaman->id_user == auth()->user()->id_user)
								<tr>
									<td>{{$row->id_peminjaman}} - {{$row->id_detail}}</td>
									<td>{{$row->buku->id_buku}} - {{$row->buku->nama_buku}}</td>
									<td>{{$row->jml}}</td>
									<td>{{$row->peminjaman->id_user}} - {{$row->peminjaman->user->nama_user}}</td>
									<td>{{$row->tgl_kembali}}</td>
									<td>Rp. {{number_format($row->denda, 2, ',', '.')}}</td>
									<td>
										@if($row->status_pinjam == '0')
										<label class="label label-info">Sedang Dipinjam</label>
										@endif
										@if($row->status_pinjam == '1')
										<label class="label label-success">Sudah Dikembalikan</label>
										@endif
									</td>
								</tr>
								@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Pengembalian</span></div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6 text-right">
									<span class="panel-note"><i class="fa fa-inbox"></i> Total Sedang Di Pinjam - {{$detail->where('status_pinjam', '0')->count()}}</span>
								</div>
								<div class="col-md-6 text-right">
									<span class="panel-note"><i class="fa fa-inbox"></i> Total Sudah Dikembalikan - {{$detail->where('status_pinjam', '1')->count()}}</span>
								</div>
							</div>
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
			url: "/pengembalian/"+id+"/edit",
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
					url: "/pengembalian/"+m+"/edit",
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
				var id_inventaris = $(this).attr("id");
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
						window.location="/inventaris/"+id_inventaris+"/delete";
					}
				});
			});
		});
	</script>
	@endsection