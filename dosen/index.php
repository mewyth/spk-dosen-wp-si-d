<?php
session_start();
include "../koneksi.php";

$nim = $_SESSION['nim'];
$qry = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$nim' AND jenis='mahasiswa'");
$us = mysqli_fetch_array($qry);

$cek = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nip='$nim'");
$r = mysqli_num_rows($cek);

if ($r > 0) {
    header("Location: http://localhost/spk_dosen/dosen/home.php?aksi=nilai");
} elseif ($r == 0) {
    $cek_p = mysqli_query($koneksi, "SELECT * FROM dosen_peserta WHERE nip='$nim'");
    $rp = mysqli_num_rows($cek_p);

    if ($rp > 0) {
        header("Location: http://localhost/spk_dosen/dosen/home.php?aksi=daftar");
    } else {
        header("Location: http://localhost/spk_dosen/dosen/home.php");
    }
}
?>
