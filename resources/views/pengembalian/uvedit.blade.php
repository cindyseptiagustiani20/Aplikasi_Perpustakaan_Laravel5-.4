<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Ubah Status Peminjaman</h4>
		</div>
		<div class="modal-body">
			<form action="/pengembalian/update" method="POST" role="form" id="submit">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID DETAIL PINJAM</label>
					<input type="text" name="id_detail" class="form-control" id="" placeholder="Input field" value="{{$detail->id_detail}}" readonly>
				</div>
				<div class="form-group">
					<label for="">STATUS PEMINJAMAN</label>
					<select name="status_pinjam" id="" class="form-control">
						<option value="0" @if($detail->status_pinjam == '0') selected @endif>
							Sedang Di Pinjam
						</option>
						<option value="1" @if($detail->status_pinjam == '1') selected @endif>
							Sudah Dikembalikan
						</option>
					</select>
				</div>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>