            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
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
                                            <td>Username</td>
                                            <td>Nama</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Umur</td>
                                            <td>Alamat</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_orang_tua != NULL) foreach($daftar_orang_tua as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['username']; ?></td>
                                            <td><?php echo $value['nama']; ?></td>
                                            <td><?php echo $value['jenis_kelamin']; ?></td>
                                            <td><?php echo $value['umur']; ?></td>
                                            <td><?php echo $value['alamat']; ?></td>
                                            <td>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data Orang Tua akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_orang_tua/hapus_orang_tua/'.$value['id_users'])?>'" type="button"><i class="fa fa-trash"></i></button>
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