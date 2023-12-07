<?php
session_start();
include "../koneksi.php";
$nim = $_SESSION['nim'];
$qry = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$nim' AND jenis='lppm'");
$us = mysqli_fetch_array($qry);
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
  <script src="../assets/js/hover.zoom.conf.js"></script>

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
  $dosen = isset($_POST['dosen']) ? $_POST['dosen'] : '';

  $sql = mysqli_query($koneksi, "SELECT * FROM dosen_peserta WHERE id_dosen = '$dosen'");
  $row = mysqli_fetch_array($sql);

  $cek = mysqli_query($koneksi, "SELECT * FROM data_lppm WHERE id_dosen='$dosen'");
  $r = mysqli_num_rows($cek);

  if ($r > 0) {
    $b = mysqli_fetch_array($cek);
    $tmp_pn = $b['jml_pn'];
    $tmp_jia = $b['jml_jia'];
    $tmp_ji = $b['jml_ji'];
    $tmp_jna = $b['jml_jna'];
    $tmp_jn = $b['jml_jn'];
    $tmp_jl = $b['jml_jl'];
    $tmp_pl = $b['jml_pl'];
    $tmp_sm = $b['jml_sm'];
    $tmp_pg = $b['jml_pg'];
  } else {
    $tmp_pn = "";
    $tmp_jia = "";
    $tmp_ji = "";
    $tmp_jna = "";
    $tmp_jn = "";
    $tmp_jl = "";
    $tmp_pl = "";
    $tmp_sm = "";
    $tmp_pg = "";
  }
  ?>

  <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
        <h3>Kualifikasi Penelitian Dosen</h3>
        <hr>
        <form role="form" action="input_nilai.php" method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" id="NameInputEmail1" placeholder="Username" name="id_dosen" value="<?php echo $dosen; ?>" readonly="true">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama" value="<?php echo $row['nama']; ?>" readonly="true">
          </div>

          <div class="form-group">
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Penelitian</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_pn" placeholder="* Jumlah penelitan" value="<?php echo $tmp_pn; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Jurnal Internasional Akreditasi</label>
            </div>
            <div class="col-fr col-lg-offset-7">
              <input class="form-control" type="text" name="jml_jia" placeholder="** Jumlah Jurnal Internasional Akreditasi" value="<?php echo $tmp_jia; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Jurnal Internasional</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_ji" placeholder="** Jumlah Jurnal Internasional" value="<?php echo $tmp_ji; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Jurnal Nasional Akreditasi</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_jna" placeholder="** Jumlah Jurnal Nasional Akreditasi" value="<?php echo $tmp_jna; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Jurnal Nasional</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_jn" placeholder="** Jumlah Jurnal Nasional" value="<?php echo $tmp_jn; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Jurnal Lokal</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_jl" placeholder="** Jumlah Jurnal Lokal" value="<?php echo $tmp_jl; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Pelatihan</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_pl" placeholder="* Jumlah Pelatihan" value="<?php echo $tmp_pl; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Seminar</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_sm" placeholder="* Jumlah Seminar" value="<?php echo $tmp_sm; ?>">
            </div>
            <div class="col-lb col-lg-offset-0">
              <label class="pull-left">Jumlah Pengabdian Masyarakat</label>
            </div>
            <div class="col-fr col-lg-offset-6">
              <input class="form-control" type="text" name="jml_pg" placeholder="* Jumlah Pengabdian Masyarakat" value="<?php echo $tmp_pg; ?>">
            </div>
          </div>

          <!-- ... (Bagian input lainnya tetap sama) ... -->

          <br>
          <input type="submit" class="btn btn-success" value="Submit">
        </form>
        <br>
        <table>
          <tr>
            <td align="left"><i>Note :</i></td>
            <td align="left"><i>Form dengan tanda * harus diisi, apabila inputan kosong isi dengan 0</i></td>
          </tr>
          <tr>
            <td></td>
            <td align="left"><i>Form dengan tanda ** harus diisi salah satunya</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

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