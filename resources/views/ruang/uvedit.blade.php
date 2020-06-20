<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Ruang</h4>
		</div>
		<div class="modal-body">
			<form action="/ruang/update" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID RUANG</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$ruang->id_ruang}}" name="id_ruang" readonly>
				</div>
				<div class="form-group">
					<label>Nama Ruang</label>
					<input type="text" class="form-control" name="nama_ruang" value="{{$ruang->nama_ruang}}" required>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea name="keterangan" class="form-control" required>{{$ruang->keterangan}}</textarea>
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>