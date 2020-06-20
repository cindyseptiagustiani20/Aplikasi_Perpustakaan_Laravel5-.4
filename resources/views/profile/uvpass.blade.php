<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit User</h4>
		</div>
		<div class="modal-body">
			<form action="/profile/{{$user->id_user}}/passupdate" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Password Lama</label>
					<input type="password" class="form-control" name="pass_lama">
				</div>
				<div class="form-group">
					<label for="">Password Baru</label>
					<input type="password" name="pass_baru" class="form-control">
				</div>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>