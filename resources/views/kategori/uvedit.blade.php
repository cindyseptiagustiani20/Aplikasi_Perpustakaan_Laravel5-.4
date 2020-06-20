<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Kategori</h4>
		</div>
		<div class="modal-body">
			<form action="/kategori/update" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID KATEGORI</label>
					<input type="text" class="form-control" id="" value="{{$kategori->id_kategori}}" name="id_kategori" readonly>
				</div>
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_kategori}}" required>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea name="keterangan" class="form-control" required>{{$kategori->keterangan}}</textarea>
				</div>
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>