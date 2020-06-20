<ul class="nav">
	<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
	@if(auth()->user()->level == '0')
	<li><a href="/user"><i class="lnr lnr-users"></i> <span>Data User</span></a></li>
	<li><a href="/siswa"><i class="lnr lnr-user"></i> <span>Data User Siswa</span></a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-copy"></i> <span>Master Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse ">
			<ul class="nav">
				<li><a href="/ruang" class="">Data Ruangan</a></li>
				<li><a href="/kategori" class="">Data Kategori</a></li>
				<li><a href="/buku" class="">Data Buku</a></li>
				<li><a href="/peminjaman" class="">Data Peminjaman</a></li>
				<li><a href="/pengembalian" class="">Data Pengembalian</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-cogs"></i> <span>Sistem Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages2" class="collapse ">
			<ul class="nav">
				<li><a href="/profile" class="">Profile</a></li>
				<li><a href="/logout2" class="">Logout</a></li>
			</ul>
		</div>
	</li>						
</ul>
	@endif
	@if(auth()->user()->level == '1')
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-copy"></i> <span>Master Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse ">
			<ul class="nav">
				<li><a href="/kategori" class="">Data Kategori</a></li>
				<li><a href="/buku" class="">Data Buku</a></li>
				<li><a href="/peminjaman" class="">Data Peminjaman</a></li>
				<li><a href="/pengembalian" class="">Data Pengembalian</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-cogs"></i> <span>Sistem Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages2" class="collapse ">
			<ul class="nav">
				<li><a href="/profile/{{auth()->user()->id_user}}" class="">Profile</a></li>
				<li><a href="/logout2" class="">Logout</a></li>
			</ul>
		</div>
	</li>						
</ul>
	@endif
	@if(auth()->user()->level == '2')
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-copy"></i> <span>Master Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse ">
			<ul class="nav">
				<li><a href="/peminjaman" class="">Data Peminjaman</a></li>
				<li><a href="/pengembalian" class="">Data Pengembalian</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-cogs"></i> <span>Sistem Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages2" class="collapse ">
			<ul class="nav">
				<li><a href="/profile" class="">Profile</a></li>
				<li><a href="/logout" class="">Logout</a></li>
			</ul>
		</div>
	</li>						
</ul>
	@endif
	