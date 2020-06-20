@extends('layout.master')
@section('title')
	Kategori
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Kategori</h3>
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
									<td>ID KATEGORI</td>
									<td>NAMA KATEGORI</td>
									<td>KETERANGAN</td>
									<td>JUMLAH BUKU</td>
									<td>ACTION</td>
								</tr>
							</thead>
							<tbody>
								@foreach($kategori as $row)
								<tr>
									<td>{{$row->id_kategori}}</td>
									<td>{{$row->nama_kategori}}</td>
									<td>{{$row->keterangan}}</td>
									<td>{{$buku->where('id_kategori', $row->id_kategori)->count()}}</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_kategori}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete" id="{{$row->id_kategori}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Kategori</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-list"></i> Total - {{$kategori->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Kategori</h4>
			</div>
			<div class="modal-body">
				<form action="/kategori/create" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID KATEGORI</label>
						<input type="text" class="form-control" id="" value="{{autonumber('kategori', 'id_kategori', 3, 'K')}}" name="id_kategori" readonly>
					</div>
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" class="form-control" name="nama_kategori" required>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea name="keterangan" class="form-control" required></textarea>
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
			url: "/kategori/"+id+"/edit",
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
					url: "/kategori/"+m+"/edit",
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