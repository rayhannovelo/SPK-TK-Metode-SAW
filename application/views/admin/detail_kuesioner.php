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
                                <h2><?php echo $title ?></h2>
                            </div>
                            <div class="ibox-content">
                                <div class="row form-horizontal">
                                <?php foreach($daftar_kuesioner as $key => $value) { ?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Pengirim :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="<?php echo $value['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Jenis Kelamin :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="<?php echo $value['jenis_kelamin']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Umur :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="<?php echo $value['umur']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Alamat :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="<?php echo $value['alamat']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" align="center">
                                    <thead style="text-align: center; font-weight: bold">
                                        <tr>
                                            <td>No. </td>
                                            <td>Pertanyaan</td>
                                            <td>Jawaban</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($item_kuesioner as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td style="text-align: left;"><?php echo $value['pertanyaan']; ?></td>
                                            <td><?php echo $value['jawaban']; ?></td>
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