<?php
	session_start();
	include "../koneksi.php";
	
	$nim = $_SESSION['nim'];
	$id_dos = $_POST['id_dosen'];

	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$rata = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;

	$cek = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nip='$nim' AND id_dosen='$id_dos'");
	$num = mysqli_num_rows($cek);
	if ($num > 0 ){
		$query = "UPDATE nilai_dosen SET q1='$q1', q2='$q2', q3='$q3', q4='$q4', q5='$q5', avg='$rata' WHERE nip='$nim' AND id_dosen='$id_dos'";
	}else{
		$query = "INSERT INTO nilai_dosen VALUES (NULL, '$nim', '$id_dos', '$q1', '$q2', '$q3', '$q4', '$q5', '$rata')";
	}

	$sql = mysqli_query($koneksi, $query);

	$j_sql = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE id_dosen = '$id_dos'");
	$jml = mysqli_num_rows($j_sql);
	$sql_nilai = mysqli_query($koneksi, "SELECT SUM(avg) AS avg FROM nilai_dosen WHERE id_dosen = '$id_dos'");
	$n = mysqli_fetch_array($sql_nilai);
	$q1 = $n['avg'];

	$c1 = $q1 / $jml;

	$ins = mysqli_query($koneksi, "UPDATE dosen_peserta SET c2 = '$c1' WHERE id_dosen = '$id_dos'");

	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');document.location='index.php' </script> ";
	} else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}
?>
