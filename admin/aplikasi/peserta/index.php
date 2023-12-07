<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Data Peserta</h3>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
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
						</tr>
					</thead>
					<tbody>
						<?php
						include "../koneksi.php";
						$no = 0;
						$query = "SELECT * FROM dosen_peserta";
						$hasil = mysqli_query($koneksi, $query);
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
								<!-- <td>
									<button class="btn btn-info btn-sm" id="btn-todo">Edit</button>
									<button class="btn btn-warning btn-sm" id="btn-todo">Hapus</button>
								</td> -->
							</tr>
						<?php
						}
						mysqli_close($koneksi);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
