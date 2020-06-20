<?php
function DeleteRuang($id)
{
	$conn = mysqli_connect('localhost', 'root', '', '1-perpussmk');
	$query = "SELECT * FROM siswa WHERE id_ruang = '$id'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)) {

		$query2 = "SELECT * FROM peminjaman WHERE id_user = '".$row['id_user']."'";
		$result2 = mysqli_query($conn, $query2);
		while ($row2 = mysqli_fetch_assoc($result2)) {
			$query3 = "DELETE FROM detail_pinjam WHERE id_peminjaman = '".$row2['id_peminjaman']."'";
			mysqli_query($conn, $query3);

			$query4 = "DELETE FROM peminjaman WHERE id_peminjaman = '".$row2['id_peminjaman']."'";
			mysqli_query($conn, $query4);
		}

		$query5 = "DELETE FROM users WHERE id_user = '".$row['id_user']."'";
		mysqli_query($conn, $query5);
	}
}
?>