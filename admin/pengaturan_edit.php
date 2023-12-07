<?php
    session_start();
    include "../koneksi.php";

    $r_pd = $_POST['r_pd'];
    $r_pn = $_POST['r_pn'];
    $r_pm = $_POST['r_pm'];

    // Assuming you have a proper connection named $koneksi
    $query = mysqli_query($koneksi, "UPDATE tb_pengaturan SET status = '$r_pd' WHERE pengaturan='pendaftaran'");
    $query2 = mysqli_query($koneksi, "UPDATE tb_pengaturan SET status = '$r_pn' WHERE pengaturan='penilaian'");
    $query3 = mysqli_query($koneksi, "UPDATE tb_pengaturan SET status = '$r_pm' WHERE pengaturan='pengumuman'");

    if ($query && $query2 && $query3) {
        echo "<script>alert('Pengaturan berhasil diubah');document.location='index.php?ap=pengaturan'</script>";
    } else {
        echo mysqli_error($koneksi);
        // echo "<script>alert('Gagal mengubah pengaturan');document.location='index.php?ap=pengaturan'</script>";
    }
?>
