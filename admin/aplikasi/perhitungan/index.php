<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Perhitungan</h3>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Data Peserta</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <?php
                            for ($i = 1; $i <= 10; $i++)
                                echo "<th>C$i</th>";
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../koneksi.php";
                        $no = 0;
                        $query = "select * from dosen_peserta";
                        $hasil = mysqli_query($koneksi, $query) or die("");
                        while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo "" . $no; ?></td>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['pendidikan']; ?></td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <?php
                                for ($c = 1; $c <= 10; $c++) {
                                    $tb = "c" . $c;
                                ?><td><?php echo round($data[$tb], 2); ?></td><?php
                                                                                }
                                                                            ?>
                            <?php
                        }
                        mysqli_close($koneksi);
                            ?>

                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <center><a href="?ap=hitung&proses=1" class="btn btn-primary">Hitung</a></center>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 1) {
?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Perbaikan Bobot</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bobot</th>
                                    <?php
                                    include "../koneksi.php";
                                    $query = "select * from tb_kriteria";
                                    $hasil = mysqli_query($koneksi, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {

                                    ?>
                                        <th text-algin="center"><?php echo "$data[nama_kriteria]"; ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bobot Awal</td>
                                    <?php
                                    $qr = "select * from tb_kriteria";
                                    $b = mysqli_query($koneksi, $qr) or die("");
                                    while ($r = mysqli_fetch_array($b)) {

                                    ?>
                                        <td align="center"><?php echo "$r[bobot]"; ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td>Bobot Baru</td>
                                    <?php
                                    $arBB = array();
                                    $i = 0;
                                    $sumB = mysqli_query($koneksi, "SELECT SUM(bobot) AS sum FROM tb_kriteria");
                                    $quB = mysqli_fetch_array($sumB);
                                    $jml_bobot = $quB['sum'];
                                    $qr = "select * from tb_kriteria";
                                    $b = mysqli_query($koneksi, $qr) or die("");
                                    while ($r = mysqli_fetch_array($b)) {
                                        $bb = $r['bobot'] / $jml_bobot;
                                        $arBB[$i] = $bb;
                                    ?>
                                        <td align="center"><?php echo round($bb, 4); ?></td>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <?php
        $ps = mysqli_query($koneksi, "select * from dosen_peserta");
        while ($rps = mysqli_fetch_array($ps)) {
            $vkt_s = 1;
            for ($c = 1; $c <= 10; $c++) {
                $tb = "c" . $c;
                $ab = $c - 1;
                $pgkt = pow($rps[$tb], $arBB[$ab]);
                $vkt_s = $vkt_s * $pgkt;
            }
            $upd = mysqli_query($koneksi, "update dosen_peserta set vektor_s = '$vkt_s' where nip = '$rps[nip]'");
        }

        $v = mysqli_query($koneksi, "select sum(vektor_s) as all_vk from dosen_peserta");
        $vk = mysqli_fetch_array($v);
        $all_vk = $vk['all_vk'];

        $ps = mysqli_query($koneksi, "select nip, vektor_s from dosen_peserta");
        while ($rps = mysqli_fetch_array($ps)) {
            $vk_v = $rps['vektor_s'] / $all_vk;
            $up_v = mysqli_query($koneksi, "update dosen_peserta set vektor_v = '$vk_v' where nip='$rps[nip]'");
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hasil Seleksi</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Nama</th>
                                    <th>Normalisasi</th>
                                    <th>Nilai Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rk = 1;
                                $pr = mysqli_query($koneksi, "select nama, vektor_s, vektor_v from dosen_peserta order by vektor_v desc");

                                while ($dt = mysqli_fetch_array($pr)) {
                                    echo "<tr>";
                                    echo "<td>$rk</td>";
                                    echo "<td>$dt[nama]</td>";
                                    echo "<td>" . round($dt['vektor_s'], 4) . "</td>";
                                    echo "<td>" . round($dt['vektor_v'], 4) . "</td>";
                                    echo "</tr>";
                                    $rk++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
<?php
    } else {
        echo "adasda";
    }
}
?>
