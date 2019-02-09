            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Edit Kriteria</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($kriteria != NULL) foreach ($kriteria as $k) { ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('kriteria/edit_kriteria_form/'.$k['id_kriteria'])?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="id_kriteria" value="<?php echo $k['id_kriteria']; ?>">
                                                <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" class="form-control" value="<?php echo $k['nama_kriteria']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Bobot Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="bobot" placeholder="Bobot Kriteria" min="0" max="100" class="form-control" value="<?php echo $k['bobot']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>