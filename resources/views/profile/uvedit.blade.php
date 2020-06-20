<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit User</h4>
		</div>
		<div class="modal-body">
			<form action="/profile/update" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" name="id_user" class="form-control" id="" placeholder="Input field" value="{{$user->id_user}}" readonly>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control" value="{{$user->email}}">
				</div>
				<div class="form-group">
					<label for="">Nama User</label>
					<input type="text" name="nama_user" class="form-control" value="{{$user->nama_user}}">
				</div>
				<div class="form-group">
					<label>Avatar</label>
					<input type="file" class="form-control" name="avatar">
				</div>
				<div class="form-group">
					<input type="checkbox" name="cek" value="cek"> Ceklis Jika Ingin Mengubah
				</div>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>