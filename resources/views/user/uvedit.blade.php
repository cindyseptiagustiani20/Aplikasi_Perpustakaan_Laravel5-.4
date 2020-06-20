<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data User</h4>
		</div>
		<div class="modal-body">
			<form action="/user/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" name="id_user" class="form-control" id="" placeholder="Input field" value="{{$user->id_user}}" readonly>
				</div>
				<div class="form-group">
					<label>Nama User</label>
					<input type="text" class="form-control" name="nama_user" value="{{$user->nama_user}}" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" value="{{$user->email}}" required>
				</div>
				<div class="form-group">
					<label>Avatar</label>
					<input type="file" class="form-control" name="avatar">
				</div>
				<div class="form-group">
					<input type="checkbox" name="cek" value="cek"> Ceklis Jika Ingin Mengubah
				</div>
				<div class="form-group">
					<label>Level</label>
					<select name="level" class="form-control">
						<option value="0" @if($user->level == '0') selected @endif>Administrator</option>
						<option value="1" @if($user->level == '1') selected @endif>Petugas</option>
					</select>
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>