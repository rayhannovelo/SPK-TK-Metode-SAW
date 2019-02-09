<?php 
    function rangking($v, $hasil) {
        rsort($v);

        for ($i = 0; $i < count($v); $i++) {
            if($v[$i]['nilai'] == $hasil) {
                return $i + 1;
            }
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

    <title>SPK | Hasil Rekomendasi</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/footable/footable.core.css')?>" rel="stylesheet">

    <style type="text/css">
        .widget a:hover {color: black; background: grey; }
        table {text-align: left}
        html { height: 100%; }
        body {
            min-height:100%; 
            position:relative; 
            padding-bottom:[footer-height] 
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

<section id="hasil" class="container services" style="margin-top: 0">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Kecamatan : <?php echo $kecamatan; ?></h1>
            <div class="navy-line" style="margin-top: 0px;"></div>
            <h1>Berikut Merupakan Hasil Rekomendasi TK:<br/></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <br>
            <center><button onclick="myFunction()" class="btn btn-lg btn-primary">Detail Perhitungan</button></center>
            <div id="hide" style="display: none;">
            <h2 style="text-align: center">Tabel Alternatif Taman Kanak Kanak</h2>
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <td rowspan="2" style="text-align: center;">No</td>
                        <td rowspan="2" style="text-align: center;">Kode Alternatif</td>
                        <td rowspan="2" style="text-align: center;">Nama Alternatif</td>
                        <td colspan="7" style="text-align: center;">Kriteria</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Status TK</td>
                        <td style="text-align: center;">Jumlah Guru</td>
                        <td style="text-align: center;">Jumlah Kelas</td>
                        <td style="text-align: center;">Biaya Pendaftaran</td>
                        <td style="text-align: center;">Biaya SPP</td>
                        <td style="text-align: center;">Akreditasi</td>
                        <td style="text-align: center;">Jarak</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tk as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo 'A'.($key + 1); ?></td>
                        <td><?php echo $value['nama_tk']; ?></td>
                        <td><?php echo $value['status_tk']; ?></td>
                        <td><?php echo $value['jumlah_guru']; ?></td>
                        <td><?php echo $value['jumlah_kelas']; ?></td>
                        <td><?php echo $value['biaya_pendaftaran']; ?></td>
                        <td><?php echo $value['biaya_spp']; ?></td>
                        <td><?php echo $value['akreditasi']; ?></td>
                        <td><?php echo $value['jarak']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2 style="text-align: center">Tabel Rating Kecocokan</h2>
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <td rowspan="2" style="text-align: center;">Kode Alternatif</td>
                        <td colspan="7" style="text-align: center;">Kriteria</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Status TK</td>
                        <td style="text-align: center;">Jumlah Guru</td>
                        <td style="text-align: center;">Jumlah Kelas</td>
                        <td style="text-align: center;">Biaya Pendaftaran</td>
                        <td style="text-align: center;">Biaya SPP</td>
                        <td style="text-align: center;">Akreditasi</td>
                        <td style="text-align: center;">Jarak</td>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $jumlah_tk; $i++) { ?>
                    <tr>
                        <td><?php echo 'A'.($i + 1); ?></td>
                        <td><?php echo $nilai[$i][0]; ?></td>
                        <td><?php echo $nilai[$i][1]; ?></td>
                        <td><?php echo $nilai[$i][2]; ?></td>
                        <td><?php echo $nilai[$i][3]; ?></td>
                        <td><?php echo $nilai[$i][4]; ?></td>
                        <td><?php echo $nilai[$i][5]; ?></td>
                        <td><?php echo $nilai[$i][6]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php 
                $temp = 0;
                for($i = 0; $i < $jumlah_kriteria; $i++) { 
                    for($j = 0; $j < $jumlah_tk; $j++) { 
                        if($nilai[$j][$i] > $temp) {
                            $temp = $nilai[$j][$i];
                        }
                    }
                    $max[$i] = $temp;
                    $temp = 0;
                }
            ?>
            <h2 style="text-align: center">Tabel Kriteria</h2>
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <td style="text-align: center;">No</td>
                        <td style="text-align: center;">Kriteria</td>
                        <td style="text-align: center;">Bobot</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $value['nama_kriteria']; ?></td>
                        <td><?php echo $value['bobot']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2 style="text-align: center">Tabel Faktor Ternormalisasi</h2>
            <table class="table table-bordered" align="center">
                <thead>
                    <tr>
                        <td rowspan="2" style="text-align: center;">Kode Alternatif</td>
                        <td colspan="7" style="text-align: center;">Kriteria</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Status TK</td>
                        <td style="text-align: center;">Jumlah Guru</td>
                        <td style="text-align: center;">Jumlah Kelas</td>
                        <td style="text-align: center;">Biaya Pendaftaran</td>
                        <td style="text-align: center;">Biaya SPP</td>
                        <td style="text-align: center;">Akreditasi</td>
                        <td style="text-align: center;">Jarak</td>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $jumlah_tk; $i++) { ?>
                    <tr>
                        <td><?php echo 'A'.($i + 1); ?></td>
                        <td><?php echo $nilai[$i][0] / $max[0]; ?></td>
                        <td><?php echo $nilai[$i][1] / $max[1]; ?></td>
                        <td><?php echo $nilai[$i][2] / $max[2]; ?></td>
                        <td><?php echo $nilai[$i][3] / $max[3]; ?></td>
                        <td><?php echo $nilai[$i][4] / $max[4]; ?></td>
                        <td><?php echo $nilai[$i][5] / $max[5]; ?></td>
                        <td><?php echo $nilai[$i][6] / $max[6]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                for($i = 0; $i < $jumlah_tk; $i++) { 
                    for($j = 0; $j < $jumlah_kriteria; $j++) { 
                        $r[$i][$j] = $nilai[$i][$j] / $max[$j];
                    }
                }

                for($i = 0; $i < $jumlah_tk; $i++) { 
                    for($j = 0; $j < $jumlah_kriteria; $j++) { 
                        foreach ($kriteria as $key => $value) {
                            if($key == $j) {
                                $temp += $r[$i][$j] * $value['bobot'];
                                break;
                            }
                        }
                    }
                    $v[$i]['nilai'] = $temp;
                    $v[$i]['nama_tk'] = $tk[$i]['nama_tk'];
                    $v[$i]['npsn'] = $tk[$i]['npsn'];
                    $v[$i]['alamat'] = $tk[$i]['alamat'];
                    $v[$i]['status_tk'] = $tk[$i]['status_tk'];
                    $v[$i]['jumlah_guru'] = $tk[$i]['jumlah_guru'];
                    $v[$i]['jumlah_kelas'] = $tk[$i]['jumlah_kelas'];
                    $v[$i]['biaya_pendaftaran'] = $tk[$i]['biaya_pendaftaran'];
                    $v[$i]['biaya_spp'] = $tk[$i]['biaya_spp'];
                    $v[$i]['akreditasi'] = $tk[$i]['akreditasi'];
                    $v[$i]['jarak'] = $tk[$i]['jarak'];
                    $temp = 0;
                }
            ?>
            </div>
            <br>
            <table class="table table-bordered footable toggle-arrow-tiny" style="margin-top: 12px">
                <thead>
                    <tr>
                        <th style="text-align: center;" data-toggle="true" width="150px">Kode Alternatif</th>
                        <th style="text-align: center;">NPSN</th>
                        <th style="text-align: center;">Nama Alternatif</th>
                        <th style="text-align: center;">Alamat</th>
                        <th data-hide="all">Status TK</th>
                        <th data-hide="all">Jumlah Guru</th>
                        <th data-hide="all">Jumlah Kelas</th>
                        <th data-hide="all">Biaya Pendaftaran</th>
                        <th data-hide="all">Biaya SPP</th>
                        <th data-hide="all">Akreditasi</th>
                        <th data-hide="all">Jarak</th>
                        <th style="text-align: center;" width="50px">V</th>
                        <th style="text-align: center;" data-sort-initial="true" width="100px">Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $jumlah_tk; $i++) { ?>
                    <tr>
                        <td><?php echo 'A'.($i + 1); ?></td>
                        <td><?php echo $v[$i]['npsn']; ?></td>
                        <td><?php echo $v[$i]['nama_tk']; ?></td>
                        <td><?php echo $v[$i]['alamat']; ?></td>
                        <td><?php echo $v[$i]['status_tk']; ?></td>
                        <td><?php echo $v[$i]['jumlah_guru']; ?></td>
                        <td><?php echo $v[$i]['jumlah_kelas']; ?></td>
                        <td><?php echo "Rp " . number_format($v[$i]['biaya_pendaftaran'],2,',','.');?></td>
                        <td><?php echo "Rp " . number_format($v[$i]['biaya_spp'],2,',','.');?></td>
                        <td><?php echo $v[$i]['akreditasi']; ?></td>
                        <td><?php echo $v[$i]['jarak']; ?></td>
                        <td><?php echo number_format($v[$i]['nilai'],2,'.',','); ?></td>
                        <td><?php echo rangking($v, $v[$i]['nilai']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>   
        </div>
    </div>
</section>

<section id="" class="" style="margin-top: 180px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
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
<script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/footable/footable.all.min.js')?>"></script>

<script>
    function myFunction() {
        var x = document.getElementById("hide");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    } 

    $(document).ready(function () {
        $('.footable').footable();

        $('.rangking').DataTable({
            "order": [3, "asc"],
            "iDisplayLength": 25,
            "paging":   false,
            "searching": false,
            "info":     false,
            "columnDefs": [ {
                "targets"  : [0,1,2,3]
                // "orderable": false,
            }]
        });

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
