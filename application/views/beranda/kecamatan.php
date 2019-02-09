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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK | Beranda</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/blueimp/css/blueimp-gallery.min.css')?>" rel="stylesheet">

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


<section id="kecamatan" class="container services" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Silahkan Pilih Kecamatan Tempat Anda Tinggal:<br/></h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($kecamatan as $key => $value) { ?>
        <div class="col-sm-3">
            <div class="widget <?php warna($key+1); ?> no-padding" style="">
                <div class="p-m" style="text-align: center">
                    <a href="<?php echo site_url('beranda/pengaturan_kriteria/'.urlencode($value['kecamatan']))?>" class="m-xs" style="font-size: 22px; color: white; "><?php echo $value['kecamatan']; ?> <i class="fa fa-sign-in"></i></a>
                    <h3 class="font-bold no-margins">
                        Jumlah TK : <?php echo $value['jumlah_tk']; ?>
                    </h3>
                </div>
            </div>
        </div>
        <?php } ?>
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
<script src="<?php echo base_url('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')?>"></script>

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
