			<?php 
				function rangking($v, $hasil) {
			        rsort($v);

			        for ($i = 0; $i < count($v); $i++) {
			            if($v[$i]['nilai'] == $hasil) {
			                return $i + 1;
			            }
			        }
			    }
			?>
			<style type="text/css">
				h2 {text-align: center}
			</style>
			<div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php echo $title ?> Di <?php echo $nama_kecamatan?>
                            </div>
                            <div class="ibox-content">
                                <h2>Tabel Alternatif Taman Kanak Kanak</h2>
								<table class="table table-bordered" align="center">
									<thead>
										<tr>
											<td rowspan="2">No</td>
											<td rowspan="2">Kode Alternatif</td>
											<td rowspan="2">Nama Alternatif</td>
											<td colspan="6">Kriteria</td>
										</tr>
										<tr>
											<td>Status TK</td>
											<td>Jumlah Guru</td>
											<td>Jumlah Kelas</td>
											<td>Biaya Pendaftaran</td>
											<td>Biaya SPP</td>
											<td>Akreditasi</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach($tk as $key => $value) { ?>
										<tr>
											<td><?php echo $key + 1; ?></td>
											<td><?php echo 'A'.($key + 1); ?></td>
											<td><?php echo $value['nama_tk']; ?></td>
											<td><?php echo $value['status_tk']; ?></td>
											<td><?php echo $value['jumlah_guru']; ?></td>
											<td><?php echo $value['jumlah_kelas']; ?></td>
											<td><?php echo $value['biaya_pendaftaran']; ?></td>
											<td><?php echo $value['biaya_spp']; ?></td>
											<td><?php echo $value['akreditasi']; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<br>
								<h2>Tabel Rating Kecocokan</h2>
								<table class="table table-bordered" align="center">
									<thead>
										<tr>
											<td rowspan="2">Kode Alternatif</td>
											<td colspan="6">Kriteria</td>
										</tr>
										<tr>
											<td>Status TK</td>
											<td>Jumlah Guru</td>
											<td>Jumlah Kelas</td>
											<td>Biaya Pendaftaran</td>
											<td>Biaya SPP</td>
											<td>Akreditasi</td>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 0; $i < $jumlah_tk; $i++) { ?>
										<tr>
											<td><?php echo 'A'.($i + 1); ?></td>
											<td><?php echo $nilai[$i][0]; ?></td>
											<td><?php echo $nilai[$i][1]; ?></td>
											<td><?php echo $nilai[$i][2]; ?></td>
											<td><?php echo $nilai[$i][3]; ?></td>
											<td><?php echo $nilai[$i][4]; ?></td>
											<td><?php echo $nilai[$i][5]; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php 
									$temp = 0;
									for($i = 0; $i < $jumlah_kriteria; $i++) { 
										for($j = 0; $j < $jumlah_tk; $j++) { 
											if($nilai[$j][$i] > $temp) {
												$temp = $nilai[$j][$i];
											}
										}
										$max[$i] = $temp;
										$temp = 0;
									}

									for($i = 0; $i < $jumlah_tk; $i++) { 
										for($j = 0; $j < $jumlah_kriteria; $j++) { 
											$r[$i][$j] = $nilai[$i][$j] / $max[$j];
										}
									}

									for($i = 0; $i < $jumlah_tk; $i++) { 
										for($j = 0; $j < $jumlah_kriteria; $j++) { 
											foreach ($kriteria as $key => $value) {
												if($key == $j) {
													$temp += $r[$i][$j] * $value['bobot'];
													break;
												}
											}
										}
										$v[$i]['nilai'] = $temp;
										$v[$i]['nama_tk'] = $tk[$i]['nama_tk'];
										$temp = 0;
									}
								?>

								<br>
								<h2>Hasil Ranking</h2>
								<table class="table table-bordered rangking" align="center">
									<thead>
										<tr>
											<td>Kode Alternatif</td>
											<td>Nama Alternatif</td>
											<td>V</td>
											<td>Rangking</td>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 0; $i < $jumlah_tk; $i++) { ?>
										<tr>
											<td><?php echo 'A'.($i + 1); ?></td>
											<td><?php echo $v[$i]['nama_tk']; ?></td>
											<td><?php echo $v[$i]['nilai']; ?></td>
											<td><?php echo rangking($v, $v[$i]['nilai']); ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>