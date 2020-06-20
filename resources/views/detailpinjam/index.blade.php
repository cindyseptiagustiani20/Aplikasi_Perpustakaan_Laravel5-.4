@extends('layout.master')
@section('title')
Detail Peminjaman
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="panel">
				<div class="panel-heading">
					<center>
						<h3 class="panel-title">Peminjaman - {{$peminjaman->id_peminjaman}}</h3>
					</center>
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Jumlah Peminjaman</b> <a class="pull-right">{{$peminjaman->detail_pinjam->count()}}</a>
							</li>
							<li class="list-group-item">
								<b>Barang Kembali</b> <a class="pull-right">{{$kembali->count()}}</a>
							</li>
							<li class="list-group-item">
								<b>Barang Di Pinjam</b> <a class="pull-right">{{$pinjam->count()}}</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-footer">
					<a href="/peminjaman" class="btn btn-block btn-info">Back</a>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>ID DETAIL</th>
									<th>ID BUKU</th>
									<th>JUMLAH PINJAM</th>
									<th>STATUS PEMINJAMAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($peminjaman->detail_pinjam as $row)
								<tr>
									<td>{{$row->id_detail}}</td>
									<td>{{$row->buku->id_buku}} - {{$row->buku->nama_buku}}</td>
									<td>{{$row->jml}}</td>
									<td>
										@if($row->status_pinjam == '0')
										<label class="label label-info">Sedang Dipinjam</label>
										@endif
										@if($row->status_pinjam == '1')
										<label class="label label-success">Sudah Dikembalikan</label>
										@endif
									</td>
									<td>
										@if($now == $peminjaman->tgl_pinjam || $now <= $tgl_pinjam)
										<a class="btn btn-danger delete" id="{{$row->id_detail}}"><i class="fa fa-trash"></i></a>
										@endif
										@if($now > $tgl_pinjam)
										<span>No Action ...</span>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Detail Peminjaman - {{$peminjaman->id_peminjaman}}</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-user"></i> {{$peminjaman->user->id_user}} - {{$peminjaman->user->nama_user}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-12">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Form Pemilihan Buku</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<table class="table table-striped" id="dataTable2">
							<thead>
								<tr>
									<th>ID BUKU</th>
									<th>FOTO</th>
									<th>JUDUL BUKU</th>
									<th>KATEGORI</th>
									<th>STOK</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($buku as $row2)
								<tr>
									<td>{{$row2->id_buku}}</td>
									<td>
										@if($row2->foto == '')
										{{'Tidak Ada Foto'}}
										@endif
										@if($row2->foto != "")
										<img src="{{$row2->getFoto()}}" alt="" width="150">
										
										@endif
									</td>
									<td>{{$row2->nama_buku}}</td>
									<td>{{$row2->id_kategori}} - {{$row2->kategori->nama_kategori}}</td>
									<td>{{$row2->jumlah}}</td>
									<td>
										@if($detail->where('id_peminjaman', $peminjaman->id_peminjaman)->where('id_buku', $row2->id_buku)->where('status_pinjam', '0')->count() <= 0)

										@if($now == $peminjaman->tgl_pinjam || $now <= $tgl_pinjam)
										<form action="/detail_pinjam/create" method="POST" role="form" class="form-inline">
											{{csrf_field()}}
											<input type="hidden" name="id_detail" value="{{autonumber('detail_pinjam', 'id_detail', 3, 'DP')}}">
											<input type="hidden" name="id_buku" value="{{$row2->id_buku}}">
											<input type="hidden" name="id_peminjaman" value="{{$peminjaman->id_peminjaman}}">

											<button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Pinjam</button>
										</form>
										@endif
										@if($now < $peminjaman->tgl_pinjam)
										<label class="label label-warning">Waktu Peminjaman Belum Di Mulai</label>
										@endif
										@if($now >= $tgl_pinjam)
										<label class="label label-info">Waktu Peminjaman Selesai</label>
										@endif
										@endif
										@if($detail->where('id_peminjaman', $peminjaman->id_peminjaman)->where('id_buku', $row2->id_buku)->where('status_pinjam', '0')->count() > 0)
										<label class="label label-danger">Anda Telah Meminjam Buku</label>
										@endif
									</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Buku</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-book"></i> Total Buku - {{$buku->count()}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
	</div>

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
	$(document).ready(function(){
		$("#dataTable").on("click",".delete", function(){
			var id_detail = $(this).attr("id");
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
					window.location="/detail_pinjam/"+id_detail+"/delete";
				}
			});
		});
	});
</script>
@endsection