<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Siswa</h4>
		</div>
		<div class="modal-body">
			<form action="/siswa/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label>ID SISWA</label>
					<input type="text" class="form-control" value="{{$siswa->id_siswa}}" readonly name="id_siswa">
				</div>
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" class="form-control" id="" value="{{$siswa->id_user}}" readonly name="id_user">
				</div>
				<div class="form-group">
					<label>Ruang</label>
					<select name="id_ruang" class="form-control">
						@foreach($ruang as $row2)
						<option value="{{$row2->id_ruang}}" @if($row2->id_ruang == $siswa->ruang_id_ruang) selected @endif>{{$row2->id_ruang}} - {{$row2->nama_ruang}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Nama Lengkap</label>
					<input type="text" class="form-control" id="" name="nama" value="{{$siswa->nama_siswa}}" required>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" name="email" value="{{$user->email}}" value="{{old('email')}}" required>
				</div>
				<div class="form-group">
					<label for="">FOTO</label>
					<input type="file" class="form-control" name="avatar">
				</div>
				<div class="form-group">
					<input type="checkbox" name="cek" value="cek"> Ceklis Jika Ingin Mengubah
				</div>
				<div class="form-group">
					<label for="">Jenis Kelamin</label>
					<select name="jk" class="form-control">
						<option value="L" @if($siswa->jk == 'L') selected @endif>Laki-Laki</option>
						<option value="P" @if($siswa->jk == 'P') selected @endif>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" value="{{$siswa->tgl_lahir}}" required>
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
