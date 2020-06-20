@extends('layout.master')
@section('title')
	Dashboard
@endsection
@section('content')
	<center>
		<h1 style="margin-top: 15%;">WELCOME TO PERPUSSMK</h1>
		<hr width="50%">
		<label>{{auth()->user()->id_user}} - {{auth()->user()->nama_user}}</label>
	</center>
@endsection
@section('footer')
@if(session('sukses'))
<script type="text/javascript">
	swal('Berhasil', '{{session("sukses")}}', 'success');
</script>
@endif
@endsection