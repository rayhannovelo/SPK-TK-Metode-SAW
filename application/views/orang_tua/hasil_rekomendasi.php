            <?php 
                function warna($id) {
                    //$id = mt_rand(1,4);

                    if($id % 4 == 1) {
                        echo 'lazur-bg';
                    }elseif($id % 4 == 2) {
                        echo 'red-bg';
                    }elseif($id % 4 == 3) {
                        echo 'navy-bg';
                    }elseif($id % 4 == 0) {
                        echo 'yellow-bg';
                    }
                }
            ?>
            <style type="text/css">
                a:hover {color: black; background: grey; }
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
                                <h2 align="center">Silahkan Pilih Daerah Untuk Hasil Rekomendasi</h2>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <?php foreach ($kecamatan as $key => $value) { ?>
                                <div class="col-lg-3">
                                    <div class="widget <?php warna($key+1); ?> no-padding">
                                        <div class="p-m" style="text-align: center">
                                            <a href="<?php echo site_url('hasil_rekomendasi/kecamatan/'.urlencode($value['kecamatan']))?>" class="m-xs" style="font-size: 24px; color: white; "><?php echo $value['kecamatan']; ?> <i class="fa fa-sign-in"></i></a>
                                            <h3 class="font-bold no-margins">
                                                Jumlah TK : <?php echo $value['jumlah_tk']; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget gray-bg no-padding">
                                        <div class="p-m" style="text-align: center">
                                            <a href="<?php echo site_url('hasil_rekomendasi/semua/')?>" class="font-bold m-xs" style="font-size: 28px; color: black;">Kota Palembang <i class="fa fa-sign-in"></i></a>
                                            <h3 class="font-bold no-margins">
                                                Jumlah TK : <?php echo $jumlah_seluruh_tk; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>