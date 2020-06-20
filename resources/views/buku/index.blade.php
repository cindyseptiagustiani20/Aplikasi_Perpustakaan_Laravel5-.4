@extends('layout.master')
@section('title')
	Buku
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Buku</h3>
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
									<td>ID BUKU</td>
									<td>FOTO</td>
									<td>JUDUL BUKU</td>
									<td>KONDISI</td>
									<td>JUMLAH</td>
									<td>ACTION</td>
								</tr>
							</thead>
							<tbody>
								@foreach($buku as $row)
								<tr>
									<td>{{$row->id_buku}}</td>
									<td>
										@if($row->foto == '')
										<label class="label label-danger">Tidak Ada</label>
										@endif
										@if($row->foto != '')
										<img src="{{$row->getFoto()}}" alt="" width="100">
										@endif
									</td>
									<td>{{$row->nama_buku}}</td>
									<td>{{$row->kondisi}}</td>
									<td>{{$row->jumlah}}</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_buku}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete" id="{{$row->id_buku}}"><i class="fa fa-trash"></i></a>
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
							<span class="panel-note"><i class="fa fa-book"></i> Total - {{$buku->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Buku</h4>
			</div>
			<div class="modal-body">
				<form action="/buku/create" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID BUKU</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('buku', 'id_buku', 3, 'B')}}" name="id_buku" readonly>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select name="id_kategori" id="" class="form-control">
							@foreach($kategori as $row2)
							<option value="{{$row2->id_kategori}}">{{$row2->id_kategori}} - {{$row2->nama_kategori}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" name="nama_buku" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Penulis</label>
						<input type="text" name="penulis" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Penerbit</label>
						<input type="text" name="penerbit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" class="form-control" name="foto" required>
					</div>
					<div class="form-group">
						<label>Kondisi</label>
						<select name="kondisi" id="" class="form-control">
							<option value="Baik">Baik</option>
							<option value="Cukup Baik">Cukup Baik</option>
							<option value="Kurang Baik">Kurang Baik</option>
						</select>
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" class="form-control" name="jumlah" required>
					</div>
					<div class="form-group">
						<label>ID USER</label>
						<input type="text" class="form-control" value="{{auth()->user()->id_user}}" readonly name="id_user">
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
			url: "/buku/"+id+"/edit",
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
					url: "/buku/"+m+"/edit",
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