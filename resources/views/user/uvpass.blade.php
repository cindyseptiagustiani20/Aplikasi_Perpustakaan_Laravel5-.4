<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Ubah Password</h4>
		</div>
		<div class="modal-body">
			<form action="/user/{{$user->id_user}}/passupdate" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Password Lama</label>
					<input type="password" class="form-control" id="x" placeholder="Password Lama" name="pass_lama" required>
				</div>
				<div class="form-group">
					<label for="">Password Baru</label>
					<input type="password" class="form-control" id="y" placeholder="Password Baru" name="pass_baru" required>
				</div>
				<div class="form-group">
					<input type="checkbox" onclick="ShowPass2()">
					<span>Show Password</span>
				</div>
				
			
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>