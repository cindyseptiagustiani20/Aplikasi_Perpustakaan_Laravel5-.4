<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Buku</h4>
		</div>
		<div class="modal-body">
			<form action="/buku/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID BUKU</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$buku->id_buku}}" name="id_buku" readonly>
				</div>
				<div class="form-group">
					<label>Kategori</label>
					<select name="id_kategori" id="" class="form-control">
						@foreach($kategori as $row2)
						<option value="{{$row2->id_kategori}}" @if($buku->id_kategori == $row2->id_kategori) selected @endif>{{$row2->id_kategori}} - {{$row2->nama_kategori}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Judul Buku</label>
					<input type="text" name="nama_buku" class="form-control" value="{{$buku->nama_buku}}" required>
				</div>
				<div class="form-group">
					<label>Penulis</label>
					<input type="text" name="penulis" class="form-control" value="{{$buku->penulis}}" required>
				</div>
				<div class="form-group">
					<label>Penerbit</label>
					<input type="text" name="penerbit" class="form-control" value="{{$buku->penerbit}}" required>
				</div>
				<div class="form-group">
					<label>Foto</label>
					<input type="file" class="form-control" name="foto">
				</div>
				<div class="form-group">
					<input type="checkbox" name="cek" value="cek"> Ceklis Jika Ingin Mengubah
				</div>
				<div class="form-group">
					<label>Kondisi</label>
					<select name="kondisi" id="" class="form-control">
						<option value="Baik" @if($buku->kondisi == 'Baik') selected @endif>Baik</option>
						<option value="Cukup Baik" @if($buku->kondisi == 'Cukup Baik') selected @endif>Cukup Baik</option>
						<option value="Kurang Baik" @if($buku->kondisi == 'Kurang Baik') selected @endif>Kurang Baik</option>
					</select>
				</div>
				<div class="form-group">
					<label>Jumlah</label>
					<input type="number" class="form-control" name="jumlah" value="{{$buku->jumlah}}" required>
				</div>
				<div class="form-group">
					<label>ID USER</label>
					<input type="text" class="form-control" value="{{$buku->id_user}}" readonly name="id_user">
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>