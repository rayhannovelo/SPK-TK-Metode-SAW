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
                                            <td>Nama Pengirim</td>
                                            <td>Waktu Kirim</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_kuesioner != NULL) foreach($daftar_kuesioner as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama']; ?></td>
                                            <td><?php echo $value['waktu_kirim']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-success dim" onclick="location.href='<?php echo site_url('daftar_kuesioner/detail_kuesioner/'.$value['id_daftar_kuesioner'])?>'" type="button"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data TK akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_kuesioner/hapus_kuesioner/'.$value['id_daftar_kuesioner'])?>'" type="button"><i class="fa fa-trash"></i></button>
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