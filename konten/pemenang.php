<div id="ww">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h4>Pemenang Pemilihan Dosen Terbaik</h4>
                <hr>
            </div>

            <div class="row mt">    
                <div class="col-lg-8 col-lg-offset-2">
                    <table class="table" border='1'>
                        <tr>
                            <th>Ranking</th>
                            <th>Nip </th>
                            <th>Nama </th>
                            <th>Jabatan </th>
                        </tr>

                        <?php
                            include "koneksi.php"; // Pastikan file koneksi.php sudah di-include

                            $koneksi = mysqli_connect($host, $user, $pass, $db);

                            $sql = mysqli_query($koneksi, "SELECT * FROM dosen_peserta ORDER BY vektor_v DESC LIMIT 3");
                            $i = 1;
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<tr>
                                        <td> $i </td>
                                        <td> $row[nip] </td>
                                        <td> $row[nama] </td>
                                        <td> $row[jabatan]</td>
                                        </tr>";
                                $i++;
                            }

                            // Tambahkan fungsi mysqli_close jika diperlukan
                            // mysqli_close($koneksi);
                        ?>
                    </table>
                </div>
            </div>  
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /ww -->
