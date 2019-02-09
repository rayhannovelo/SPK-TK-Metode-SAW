            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_tk/tambah_tk')?>'"><i class="fa fa-plus"></i> Tambah TK</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama TK</td>
                                            <td>Kecamatan</td>
                                            <td>Status TK</td>
                                            <td>Jumlah Guru</td>
                                            <td>Jumlah Kelas</td>
                                            <td>Biaya Pendaftaran</td>
                                            <td>Biaya SPP</td>
                                            <td>Akreditasi</td>
                                            <td>Jarak (KM)</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_tk != NULL) foreach($daftar_tk as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_tk']; ?></td>
                                            <td><?php echo $value['kecamatan']; ?></td>
                                            <td><?php echo $value['status_tk']; ?></td>
                                            <td><?php echo $value['jumlah_guru']; ?></td>
                                            <td><?php echo $value['jumlah_kelas']; ?></td>
                                            <td><?php echo $value['biaya_pendaftaran']; ?></td>
                                            <td><?php echo $value['biaya_spp']; ?></td>
                                            <td><?php echo $value['akreditasi']; ?></td>
                                            <td><?php echo $value['jarak']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_tk/edit_tk/'.$value['id_tk'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data TK akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_tk/hapus_tk/'.$value['id_tk'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>