<?php
    session_start();
    include "../koneksi.php";

    $username = $_POST['user_admin'];
    $password = $_POST['password_admin'];

    // Assuming you have a proper connection named $koneksi
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_admin='$username' AND password_admin='$password'");
    
    if ($query) {
        $cek = mysqli_num_rows($query);

        if ($cek) {
            $_SESSION['admin'] = $username;
            ?>
            <script language="JavaScript">
                alert('Login Berhasil  !'); 
                document.location = 'index.php';
            </script>
            <?php
        } else {
            echo mysqli_error($koneksi);
            ?>
            <script language="JavaScript">
                alert('Login Gagal  !'); 
                document.location = 'index.php';
            </script>
            <?php
        }
    } else {
        // Handle the error, e.g., echo mysqli_error($koneksi);
    }
?>
