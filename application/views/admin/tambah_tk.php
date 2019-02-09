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
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_tk/tambah_tk_form/')?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">NPSN :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="npsn" placeholder="NPSN" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama TK :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_tk" placeholder="Nama TK" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kecamatan :</label>
                                            <div class="col-lg-9">
                                                <select name="kecamatan" class="form-control">
                                                    <option>-- Pilih Kecamatan --</option>
                                                    <option value="Alang-alang Lebar">Alang-alang Lebar</option>
                                                    <option value="Bukit Kecil">Bukit Kecil</option>
                                                    <option value="Gandus">Gandus</option>
                                                    <option value="Ilir Barat I">Ilir Barat I</option>
                                                    <option value="Ilir Barat II">Ilir Barat II</option>
                                                    <option value="Ilir Timur I">Ilir Timur I</option>
                                                    <option value="Ilir Timur II">Ilir Timur II</option>
                                                    <option value="Kalidoni">Kalidoni</option>
                                                    <option value="Kemuning">Kemuning</option>
                                                    <option value="Kertapati">Kertapati</option>
                                                    <option value="Plaju">Plaju</option>
                                                    <option value="Sako">Sako</option>
                                                    <option value="Seberang Ulu I">Seberang Ulu I</option>
                                                    <option value="Seberang Ulu II">Seberang Ulu II</option>
                                                    <option value="Sematang Borang">Sematang Borang</option>
                                                    <option value="Sukarami">Sukarami</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status TK :</label>
                                            <div class="col-lg-9">
                                                <select name="status_tk" class="form-control">
                                                    <option>-- Pilih Status --</option>
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jumlah Guru :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="jumlah_guru" placeholder="Jumlah Guru" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jumlah Kelas :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="jumlah_kelas" placeholder="Jumlah Kelas" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Biaya Pendaftaran :</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" name="biaya_pendaftaran" placeholder="Biaya Pendaftaran" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Biaya SPP :</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" name="biaya_spp" placeholder="Biaya SPP" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Akreditasi :</label>
                                            <div class="col-lg-9">
                                                <select name="akreditasi" class="form-control">
                                                    <option>-- Pilih Akreditasi --</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="Belum Diakreditasi">Belum Diakreditasi</option>
                                                    <option value="Tidak Terakreditasi">Tidak Terakreditasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jarak Dari Pusat Kota (Ampera) :</label>
                                            <div class="col-lg-9">
                                                <input type="number" min="1" name="jarak" placeholder="Dalam satuan KM" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>