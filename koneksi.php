<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "spk_dosen";

// Buat koneksi menggunakan MySQLi
$koneksi = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}
//else echo "Koneksi berhasil";

// Pilih database
$cek = $koneksi->select_db($db);
if (!$cek) {
    die("Database tidak ditemukan: " . $koneksi->error);
}
//else echo "Database berhasil ditemukan";
?>
