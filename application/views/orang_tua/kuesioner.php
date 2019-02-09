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
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <form class="m-t" role="form" action="<?php echo site_url('kuesioner/tambah_kuesioner_form/'); ?>" method="post">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead style="text-align: center; font-weight: bold">
                                        <tr>
                                            <td rowspan="2">No. </td>
                                            <td rowspan="2">Pertanyaan</td>
                                            <td colspan="2">Jawaban</td>
                                        </tr>
                                        <tr>
                                            <td width="200px">Ya</td>
                                            <td width="200px">Tidak</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($kuesioner as $key => $value) { ?>
                                        <tr>
                                            <td><input type="hidden" name="id_kuesioner[<?php echo $key ?>]" value="<?php echo $value['id_kuesioner']; ?>"><?php echo $key+1; ?></td>
                                            <td style="text-align: left;"><?php echo $value['pertanyaan']; ?></td>
                                            <td><input type="radio" name="jawaban[<?php echo $key ?>]" value="Ya" checked> Ya</td>
                                            <td><input type="radio" name="jawaban[<?php echo $key ?>]" value="Tidak"> Tidak</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                    <button class="btn btn-w-m btn-primary" type="submit">Kirim</button>
                                </div>
                                </form>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>