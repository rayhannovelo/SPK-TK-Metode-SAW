<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK | Pengaturan Kriteria</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

    <style type="text/css">
        .widget a:hover {color: black; background: grey; }
        html { height: 100%; }
        body {
            min-height:100%; 
            position:relative; 
            padding-bottom:[footer-height] 
        }
        .footer { 
            position: absolute; 
            left: 0 ; right: 0; bottom: 0; 
            height:[footer-height] 
        }
    </style>

</head>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('beranda'); ?>">SPK</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="<?php echo site_url('beranda/panduan'); ?>" style="color:#1ab394;">Panduan</a></li>
                        <li><a class="page-scroll" href="<?php echo site_url('beranda'); ?>" style="color:#1ab394;">Beranda</a></li>
                        <li class="active"><a class="page-scroll" href="<?php echo site_url('beranda/kecamatan'); ?>" style="color:#1ab394;">Kecamatan</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>

<section id="kriteria" class="container services" style="margin-top: 0">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Kecamatan : <?php echo $kecamatan; ?></h1>
            <div class="navy-line" style="margin-top: 0px;"></div>
            <h1>Silahkan Isi Kriteria TK Yang Diinginkan<br/></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="m-t" role="form" action="<?php echo site_url('beranda/hasil_rekomendasi/'.urlencode($kecamatan)); ?>" method="post">
                <div class="row form-horizontal">
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Status TK :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="status_tk"  value="1" type="radio" required> Negeri
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="status_tk"  value="2" type="radio"> Swasta
                            </label>
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Jumlah Guru :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="jumlah_guru"  value="1" type="radio" required> 1-3
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_guru"  value="2" type="radio"> 4-7
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_guru"  value="3" type="radio"> 8-11
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_guru"  value="4" type="radio"> 12-15
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_guru"  value="5" type="radio"> > 15
                            </label> 
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Jumlah Kelas :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="jumlah_kelas"  value="1" type="radio" required> 1-2
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_kelas"  value="2" type="radio"> 3-4
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_kelas"  value="3" type="radio"> 5-6
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_kelas"  value="4" type="radio"> 6-7
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jumlah_kelas"  value="5" type="radio"> > 7
                            </label> 
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Biaya Pendaftaran :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="biaya_pendaftaran"  value="5" type="radio" required> 
                                < Rp. 500.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_pendaftaran"  value="4" type="radio"> Rp. 500.000 - Rp. 1.000.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_pendaftaran"  value="3" type="radio"> Rp. 1.000.000 - Rp. 1.500.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_pendaftaran"  value="2" type="radio"> Rp. 1.500.000 - Rp. 2.000.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_pendaftaran"  value="1" type="radio"> > Rp. 2.000.000
                            </label> 
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Biaya SPP :</label>
                        <div class="col-lg-10"> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_spp"  value="5" type="radio" required> 
                                < Rp. 100.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_spp"  value="4" type="radio"> Rp. 100.000 - Rp. 200.000
                            </label>
                            <label class="checkbox-inline"> 
                                <input name="biaya_spp"  value="3" type="radio"> Rp. 200.000 - Rp. 300.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_spp"  value="2" type="radio"> Rp. 300.000 - Rp. 400.000
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="biaya_spp"  value="1" type="radio"> > Rp. 400.000
                            </label> 
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Akreditasi :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="akreditasi"  value="5" type="radio" required> A
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="akreditasi"  value="4" type="radio"> B
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="akreditasi"  value="3" type="radio"> C
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="akreditasi"  value="2" type="radio"> Belum Diakreditasi
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="akreditasi"  value="1" type="radio"> 
                                Tidak Terakreditasi
                            </label> 
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px">
                        <label class="col-lg-2 control-label">Jarak Dari Pusat Kota (Ampera) :</label>
                        <div class="col-lg-10">
                            <label class="checkbox-inline"> 
                                <input name="jarak"  value="5" type="radio" required> 1 - 3 Km
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jarak"  value="4" type="radio"> 4 - 6 Km
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jarak"  value="3" type="radio"> 7 - 9 Km
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jarak"  value="2" type="radio"> 10 - 12 Km
                            </label> 
                            <label class="checkbox-inline"> 
                                <input name="jarak"  value="1" type="radio"> 13 - 15 Km
                            </label> 
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                    <button type="submit" class="btn btn-w-m btn-info">Cari TK <i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>

<section id="" class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg footer">
                <p><strong>Copyright Sistem Pendukung Keputusan TK © 2018</strong><br/>Penerapan Metode Simple Additive Weighting (SAW) Pada Sistem Informasi Sistem Pendukung Keputusan Pemilihan Taman Kanak-Kanak Di Kota Palembang</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/wow/wow.min.js')?>"></script>

<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
