            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($tk != NULL) foreach ($tk as $value) { ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_tk/edit_tk_form/'.$value['id_tk']); ?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">NPSN :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="npsn" placeholder="NPSN" class="form-control" value="<?php echo $value['npsn']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama TK :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_tk" placeholder="Nama TK" class="form-control" value="<?php echo $value['nama_tk']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kecamatan :</label>
                                            <div class="col-lg-9">
                                                <select name="kecamatan" class="form-control">
                                                    <option>-- Pilih Kecamatan --</option>
                                                    <option value="Alang-alang Lebar" <?php echo $value['kecamatan'] == 'Alang-alang Lebar' ? 'selected' : ''; ?>>Alang-alang Lebar</option>
                                                    <option value="Bukit Kecil" <?php echo $value['kecamatan'] == 'Bukit Kecil' ? 'selected' : ''; ?>>Bukit Kecil</option>
                                                    <option value="Gandus" <?php echo $value['kecamatan'] == 'Gandus' ? 'selected' : ''; ?>>Gandus</option>
                                                    <option value="Ilir Barat I" <?php echo $value['kecamatan'] == 'Ilir Barat I' ? 'selected' : ''; ?>>Ilir Barat I</option>
                                                    <option value="Ilir Barat II" <?php echo $value['kecamatan'] == 'Ilir Barat II' ? 'selected' : ''; ?>>Ilir Barat II</option>
                                                    <option value="Ilir Timur I" <?php echo $value['kecamatan'] == 'Ilir Timur I' ? 'selected' : ''; ?>>Ilir Timur I</option>
                                                    <option value="Ilir Timur II" <?php echo $value['kecamatan'] == 'Ilir Timur II' ? 'selected' : ''; ?>>Ilir Timur II</option>
                                                    <option value="Kalidoni" <?php echo $value['kecamatan'] == 'Kalidoni' ? 'selected' : ''; ?>>Kalidoni</option>
                                                    <option value="Kemuning" <?php echo $value['kecamatan'] == 'Kemuning' ? 'selected' : ''; ?>>Kemuning</option>
                                                    <option value="Kertapati" <?php echo $value['kecamatan'] == 'Kertapati' ? 'selected' : ''; ?>>Kertapati</option>
                                                    <option value="Plaju" <?php echo $value['kecamatan'] == 'Plaju' ? 'selected' : ''; ?>>Plaju</option>
                                                    <option value="Sako" <?php echo $value['kecamatan'] == 'Sako' ? 'selected' : ''; ?>>Sako</option>
                                                    <option value="Seberang Ulu I" <?php echo $value['kecamatan'] == 'Seberang Ulu I' ? 'selected' : ''; ?>>Seberang Ulu I</option>
                                                    <option value="Seberang Ulu II" <?php echo $value['kecamatan'] == 'Seberang Ulu II' ? 'selected' : ''; ?>>Seberang Ulu II</option>
                                                    <option value="Sematang Borang" <?php echo $value['kecamatan'] == 'Sematang Borang' ? 'selected' : ''; ?>>Sematang Borang</option>
                                                    <option value="Sukarami">Sukarami</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status TK :</label>
                                            <div class="col-lg-9">
                                                <select name="status_tk" class="form-control">
                                                    <option>-- Pilih Status --</option>
                                                    <option value="Negeri" <?php echo $value['status_tk'] == 'Negeri' ? 'selected' : ''; ?>>Negeri</option>
                                                    <option value="Swasta" <?php echo $value['status_tk'] == 'Swasta' ? 'selected' : ''; ?>>Swasta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jumlah Guru :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="jumlah_guru" placeholder="Jumlah Guru" class="form-control" value="<?php echo $value['jumlah_guru']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jumlah Kelas :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="jumlah_kelas" placeholder="Jumlah Kelas" class="form-control" value="<?php echo $value['jumlah_kelas']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Biaya Pendaftaran :</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" name="biaya_pendaftaran" placeholder="Biaya Pendaftaran" class="form-control" value="<?php echo $value['biaya_pendaftaran']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Biaya SPP :</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" name="biaya_spp" placeholder="Biaya SPP" class="form-control" value="<?php echo $value['biaya_spp']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Akreditasi :</label>
                                            <div class="col-lg-9">
                                                <select name="akreditasi" class="form-control">
                                                    <option>-- Pilih Akreditasi --</option>
                                                    <option value="A" <?php echo $value['akreditasi'] == 'A' ? 'selected' : ''; ?>>A</option>
                                                    <option value="B" <?php echo $value['akreditasi'] == 'B' ? 'selected' : ''; ?>>B</option>
                                                    <option value="C" <?php echo $value['akreditasi'] == 'C' ? 'selected' : ''; ?>>C</option>
                                                    <option value="Belum Diakreditasi" <?php echo $value['akreditasi'] == 'Belum Diakreditasi' ? 'selected' : ''; ?>>Belum Diakreditasi</option>
                                                    <option value="Tidak Terakreditasi" <?php echo $value['akreditasi'] == 'Tidak Terakreditasi' ? 'selected' : ''; ?>>Tidak Terakreditasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jarak Dari Pusat Kota (Ampera) :</label>
                                            <div class="col-lg-9">
                                                <input type="number" min="1" name="jarak" placeholder="Dalam satuan KM" class="form-control" value="<?php echo $value['jarak']; ?>" required>
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