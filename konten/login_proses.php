<?php
	session_start();
	include "../koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$jenis = $_POST['jenis'];

	// Koneksi ke database menggunakan mysqli
	$conn = new mysqli($host, $user, $pass, $db);

	// Periksa koneksi
	if ($conn->connect_error) {
	    die("Koneksi Gagal: " . $conn->connect_error);
	}

	// Lindungi dari SQL Injection
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	$query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND jenis='$jenis'";
	$result = $conn->query($query);

	if ($result) {
		$cek = $result->num_rows;

		if ($cek) {
			$_SESSION['nim'] = $username;
			?>
			<script language="JavaScript">
				alert('<?php echo "Login Berhasil! Halo ".$_POST['jenis']; ?>');
				<?php if ($_POST['jenis'] == 'mahasiswa') { ?>
					document.location='../mahasiswa/index.php';
				<?php }elseif ($_POST['jenis'] == 'dosen') { ?>
					document.location='../dosen/index.php';
				<?php } elseif ($_POST['jenis'] == 'pimpinan') { ?>
					document.location='../pimpinan/index.php';
				<?php } elseif ($_POST['jenis'] == 'lppm') { ?>
					document.location='../lppm/index.php';
				<?php }else{ ?>
					document.location='../';
				<?php } ?>
			</script>
			<?php
		} else {
			echo $conn->error;
			?>
			<script language="JavaScript">
				alert('Login Gagal!');
				document.location='../index.php?ap=login';
			</script>
			<?php
		}
	} else {
		echo $conn->error;
	}

	// Tutup koneksi
	$conn->close();
?>
