<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['nim'])) {
    echo "<script>alert('Anda belum login');document.location='../index.php' </script> ";
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../../docs-assets/ico/favicon.png">

        <title>SPK Dosen Terbaik </title>

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="../assets/css/main.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../assets/js/hover.zoom.js"></script>
        <script src="../assets/js/hover.zoom.conf.js">
        </script>
        <?php
        $nim = $_SESSION['nim'];
        $qry = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$nim' AND jenis='pimpinan'");
        $us = mysqli_fetch_array($qry);
        ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Static navbar -->
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">SPK Dosen Terbaik</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><?php echo "-- " . $us['nama'] . " ($us[jenis]) -- "; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <?php
        $sq = mysqli_query($koneksi, "SELECT status FROM tb_pengaturan WHERE pengaturan='penilaian'");
        $st = mysqli_fetch_array($sq);
        if ($st['status'] == "0") {
        ?>
            <div class="container pt">
                <div class="row mt">
                    <div class="col-lg-6 col-lg-offset-3 centered">
                        <h3>Sistem Penilaian Belum Dibuka</h3>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container pt">
                <div class="row mt">
                    <form action=nilai.php method="POST">
                        <div class="col-lg-6 col-lg-offset-3 centered">
                            <h3>Pilih Dosen</h3>
                            <hr>
                        </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form role="form">
                            <div class="form-group">
                                <select class="form-control" id="exampleInputEmail1" name="dosen">
                                    <option value="0">pilih dosen</option>
                                    <?php
                                    $sql = "SELECT * FROM dosen_peserta";
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $cek = mysqli_query($koneksi, "SELECT * FROM nilai_pimpinan WHERE nip='$nim' AND id_dosen='$row[id_dosen]'");
                                        $num = mysqli_num_rows($cek);
                                        if ($num > 0) {
                                            echo "<option value='$row[id_dosen]'>$row[nama] (valued)</option>";
                                        } else {
                                            echo "<option value='$row[id_dosen]'>$row[nama]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="Pilih">
                        </form>
                    </div>
                    </form>
                </div><!-- /row -->
            </div><!-- /container -->
    <?php
        }
    }
    ?>

    <!-- +++++ Footer Section +++++ -->

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>STMIK Royal </h4>
                    <p>
                        Kisaran, Asahan, Sumut <br />
                    </p>
                </div><!-- /col-lg-4 -->
            </div>

        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>