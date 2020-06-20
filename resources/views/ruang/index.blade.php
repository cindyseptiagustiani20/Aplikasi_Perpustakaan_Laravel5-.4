@extends('layout.master')
@section('title')
	Ruang
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Ruang</h3>
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
									<td>ID RUANG</td>
									<td>NAMA RUANG</td>
									<td>KETERANGAN</td>
									<td>JUMLAH SISWA</td>
									<td>ACTION</td>
								</tr>
							</thead>
							<tbody>
								@foreach($ruang as $row)
								<tr>
									<td>{{$row->id_ruang}}</td>
									<td>{{$row->nama_ruang}}</td>
									<td>{{$row->keterangan}}</td>
									<td>{{$siswa->where('id_ruang', $row->id_ruang)->count()}}</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_ruang}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete" id="{{$row->id_ruang}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Ruang</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-th-large"></i> Total - {{$ruang->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Ruang</h4>
			</div>
			<div class="modal-body">
				<form action="/ruang/create" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID RUANG</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('ruang', 'id_ruang', 3, 'R')}}" name="id_ruang" readonly>
					</div>
					<div class="form-group">
						<label>Nama Ruang</label>
						<input type="text" class="form-control" name="nama_ruang" required>
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
			url: "/ruang/"+id+"/edit",
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
					url: "/ruang/"+m+"/edit",
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
				var id_ruang = $(this).attr("id");
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
						window.location="/ruang/"+id_ruang+"/delete";
					}
				});
			});
		});
	</script>
	@endsection